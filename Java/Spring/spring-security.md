# Spring security  

- [What is Spring security](#spring-security-1)
- [Spring Security Flow](#flow)
    - [Basic Authentication Filter](#1-basic-authentication-filter)
    - [Authentication Manager Interface](#2-authentication-manager-interface)
    - [Authentication Providers](#3-authentication-providers)
- [Spring Security Configurations](#spring-security-configurations)
    - [Login and Logout Pages](#1-login-logout-page)
        - [Default Spring Login/Logout Page](#a-default-spring-loginlogout-page)
        - [Custom Login/Logout Page](#b-custom-loginlogout-page)
    - [UserDetailsService Implementations](#2-userdetailsservice-implementations)
        - [User Details from console](#a-default-user-details)
        - [User Details from Application Properties](#b-user-details-from-applicationproperties)
        - [User Details from InMemory](#c-user-details-from-inmemory)
        - [User Details from Database](#d-user-details-from-db)
            - [Using username/password Column](#i-using-usernamepassword-columns)
            - [Using username and custom password](#ii-using-username-and-custom-password-column)
            - [Using custom username & password](#iii-using-custom-username-and-password-column)

- [OAuth2 Single Sign-On (SSO)](#oauth2-sso)
- [Azure Active Directory Integration](#azure-service-directory)
- [JWT (JSON Web Token)](#jwt)
   - [Steps to Implement JWT in Spring Security](#steps-to-implement)



## Spring Security
> highly customizable authentication and authorization framework.


### Flow  
Browser -> Security interceptor -> spring controller

## Flow of Spring Security

### HTTP Request Flow:
#### 1. Basic Authentication Filter  
   - Class: `BasicAuthenticationFilter` Method: `doFilterInternal()`  
   - Description: Converts HttpServletRequest into an Authentication object.

#### 2. Authentication Manager Interface 
   - Default Implementation: `ProviderManager` Method: `authenticate()`  
   - Description:   
		1. The default impl (`ProviderManager`) has list of `AuthenticationProvider` instances. 
		2. It checks whether each `AuthenticationProvider` supports current `Authentication` obj.

#### 3. Authentication Providers
	1. JwtAuthenticationProvider - Web token-based authentication.
	2. PreAuthenticatedAuthenticationProvider - Supports external identity providers such as OAuth2 or SAML for Single Sign-On (SSO).
	3. DaoAuthenticationProvider - Uses `UserDetailsService` to retrieve user details.
	4. OAuth2AuthenticationProvider - Handles authentication using OAuth2 tokens.
  
## Spring Security Configurations
1. extends WebSecurityConfigurerAdapter Still valid but considered legacy after spring security 5.0   
2. using @Beans preferred modern approach. we can use SecurityConfigurer directly and configure via beans. Provides more flexibility 
### 1. Login Logout page
#### a) Default spring login/logout page
```
@Configuration
@EnableWebSecurity
public class SecurityConfig {
    @Bean
    public SecurityFilterChain securityFilterChain(HttpSecurity http) throws Exception {
        http
            .authorizeHttpRequests()
                .requestMatchers("/", "/home").permitAll()
                .anyRequest().authenticated().and()
            .formLogin().permitAll().and()
            .logout().permitAll();
        return http.build();
    }
}
```
#### b) Custom login/logout page
```
@Configuration
@EnableWebSecurity
public class SecurityConfig {
    @Bean
    public SecurityFilterChain securityFilterChain(HttpSecurity http) throws Exception {
        http
            .authorizeHttpRequests()                           
                .requestMatchers("/", "/home").permitAll()
                .anyRequest().authenticated().and()
            .formLogin()
                .loginPage("/custom-login").permitAll().and()
            .logout()
                .logoutUrl("/custom-logout")		
                .logoutSuccessUrl("/custom-login?custom-logout=true")
                .deleteCookies("JSESSIONID").invalidateHttpSession(true)
                .permitAll();
        return http.build();
    }
}
```

### 2. UserDetailsService Implementations
#### a) Default User Details
> username is `user` and password comes in console  

#### b) User Details from Application.properties  
1. spring.security.user.name=user
2. spring.security.user.password=password
3. spring.security.user.roles=USER
 
#### c) User Details from Inmemory

```	
@Configuration
@EnableWebSecurity
public class SecurityConfig {
    @Bean
    public SecurityFilterChain securityFilterChain(HttpSecurity http) throws Exception {
       // refer login logout page topic above  
    }
	@Bean
    public UserDetailsService userDetailsService() {
		PasswordEncoder passwordEncoder = new BCryptPasswordEncoder();
        UserDetails user = User.builder()
                               .username("srimuthurajesh@gmail.com")      
                               .password(passwordEncoder().encode("rajesh123")) 
                               .roles("ADMIN")
                               .build();
        return new InMemoryUserDetailsManager(user);
    }
}
```
#### d) User Details from DB
##### i) Using username/password columns
1. User class Entity
```
@Entity
public class User implements UserDetails {
    @Id
    private Long id;
    private String username;
    private String password;
    private String roles; 
    // Getters and setters
    @Override
    public Collection<? extends GrantedAuthority> getAuthorities() {
        if (roles == null || roles.isEmpty()) 
            return Arrays.asList(); 
        return Arrays.stream(roles.split(",")).map(SimpleGrantedAuthority::new)
            .collect(Collectors.toList());
    }
    @Override
    public boolean isAccountNonExpired() { return true; }
    @Override
    public boolean isAccountNonLocked() { return true; }
    @Override
    public boolean isCredentialsNonExpired() { return true; }
    @Override
    public boolean isEnabled() { return true; }
}
```
2. CustomerUserDetailService
```
@Service
public class CustomUserDetailsService implements UserDetailsService {
    private final UserRepository userRepository;
    public CustomUserDetailsService(UserRepository userRepository) {
        this.userRepository = userRepository;
    }
    @Override
    public UserDetails loadUserByUsername(String username) throws UsernameNotFoundException {
        User user = userRepository.findByUsername(username); //write findByUsername method inside jpa interface
        if (user == null)
            throw new UsernameNotFoundException("User not found");
        return user;
    }
}
```
2. Security config class
```
@Configuration
@EnableWebSecurity
public class SecurityConfig {
    private final CustomUserDetailsService customUserDetailsService;
    public SecurityConfig(CustomUserDetailsService customUserDetailsService) {
        this.customUserDetailsService = customUserDetailsService;
    }
    @Bean
    public SecurityFilterChain securityFilterChain(HttpSecurity http) throws Exception {
        // refer login logout page topic above  }
    @Bean
    public UserDetailsService userDetailsService() { return customUserDetailsService; }
    //we can skip below bean, it will then use NoOpPasswordEncoder.getInstance();
    @Bean
    public PasswordEncoder passwordEncoder() { return new BCryptPasswordEncoder(); }
    @Bean
    public void configure(AuthenticationManagerBuilder auth) throws Exception {
        auth.userDetailsService(customUserDetailsService)
            .passwordEncoder(passwordEncoder());
    }
}
```
4. In html give `<form action="/login" method="post">`

##### ii) Using username and custom password column

1. @Entity class is same as above  
2. Authentication Provider
```
public class BranchLocationAuthenticationProvider implements AuthenticationProvider {
    private final UserDetailsService userDetailsService;
    public BranchLocationAuthenticationProvider(UserDetailsService userDetailsService) {
        this.userDetailsService = userDetailsService;
    }
    @Override
    public Authentication authenticate(Authentication authentication) throws AuthenticationException {
        String username = authentication.getName();
        String branchLocation = (String) authentication.getCredentials();
        UserDetails userDetails = userDetailsService.loadUserByUsername(username);
        if (userDetails == null || !((User) userDetails).getBranchLocation().equals(branchLocation)) 
            throw new BadCredentialsException("Invalid branch location");
        return new UsernamePasswordAuthenticationToken(userDetails, branchLocation, userDetails.getAuthorities());
    }
    @Override
    public boolean supports(Class<?> authentication) {
        return UsernamePasswordAuthenticationToken.class.isAssignableFrom(authentication);
    }
}
```
3. Security Config
```
@Configuration
@EnableWebSecurity
public class SecurityConfig {
    private final CustomUserDetailsService customUserDetailsService;
    public SecurityConfig(CustomUserDetailsService customUserDetailsService) {
        this.customUserDetailsService = customUserDetailsService;
    }
    @Bean
    public SecurityFilterChain securityFilterChain(HttpSecurity http) throws Exception {
       // refer login logout page topic above  }
    @Bean
    public BranchLocationAuthenticationProvider branchLocationAuthenticationProvider() {
        return new BranchLocationAuthenticationProvider(customUserDetailsService);
    }
    @Bean
    public AuthenticationManagerBuilder authenticationManagerBuilder(HttpSecurity http) throws Exception {
        AuthenticationManagerBuilder authenticationManagerBuilder = new AuthenticationManagerBuilder(http.getSharedObject(AuthenticationConfiguration.class).getAuthenticationManager());
        authenticationManagerBuilder.authenticationProvider(branchLocationAuthenticationProvider());
        return authenticationManagerBuilder;
    }
}
```
##### iii) Using custom username and password column
```
@Service
public class CustomUserDetailsService implements UserDetailsService {
    private final UserRepository userRepository;
    public CustomUserDetailsService(UserRepository userRepository) {
        this.userRepository = userRepository;
    }
    @Override
    public UserDetails loadUserByUsername(String email) throws UsernameNotFoundException {
        User user = userRepository.findByEmail(email); // Load user by email
        if (user == null) 
            throw new UsernameNotFoundException("User not found with email: " + email);
        return user;
    }
}
```
## OAuth2 sso. 	
add @EnableOAuth2Sso in main method  
add spring configuration
```
okta.oauth2.issuer= https://dev-165093.okta.com/oauth2/default
okta.oauth2.clientId=0oaz16emnjw4TZVZ0356
okta.oauth2.clientSecret=zEeuINnfu36oNGCWTdmnadAjgT-BtbTu79XdFwe0
spring.main.allow-bean-definition-overriding=true
```

## Azure service directory
1. Create tenant in azure SD component and get tenant id. 
2. Do [App registration] get client id
3. Add client secret, get secret value 
4. Select Id token option in Authentication. 
5. Goto [Active directory] -> [users] -> [create new user/password]. 
6. Create app role in [App registration]-> [app role]
7. Map role and user in [Enterprise application] -> [user&roles].
8 . Add application.yml in spring boot. 
```
	spring:
	cloud:
		azure:
		active-directory:
			enabled: true
			profile:
			tenant-id: <YOUR TENANT ID>
			credential:
			client-id: <YOUR CLIENT ID>
			client-secret: <YOUR CLIENT SECRET>

	server:
	port: 9191
	forward-headers-strategy: native
```

## JWT
> Json web token

Format Structure: header.payload.signature  
1. Header - ex: {"alg":"HS256", "type":"JWT"}  
2. Payload - consists of emailid, createddate, roles, subject. 
3. Signature - signing header payload with public key. 

### Steps to implement
1. Add jwt in pom and create util class
```
@Service
public class JwtUtil {

    private String secret = "javatechie";

    public String extractUsername(String token) {
        return extractClaim(token, Claims::getSubject);
    }

    public Date extractExpiration(String token) {
        return extractClaim(token, Claims::getExpiration);
    }

    public <T> T extractClaim(String token, Function<Claims, T> claimsResolver) {
        final Claims claims = extractAllClaims(token);
        return claimsResolver.apply(claims);
    }
    private Claims extractAllClaims(String token) {
        return Jwts.parser().setSigningKey(secret).parseClaimsJws(token).getBody();
    }

    private Boolean isTokenExpired(String token) {
        return extractExpiration(token).before(new Date());
    }

    private String generateToken(String username) {
		Map<String, Object> claims = new HashMap<>();
        return Jwts.builder().setClaims(claims).setSubject(username).setIssuedAt(new Date(System.currentTimeMillis()))
                .setExpiration(new Date(System.currentTimeMillis() + 1000 * 60 * 60 * 10))
                .signWith(SignatureAlgorithm.HS256, secret).compact();
    }

    public Boolean validateToken(String token, UserDetails userDetails) {
        final String username = extractUsername(token);
        return (username.equals(userDetails.getUsername()) && !isTokenExpired(token));
    }
}
```
2. Exclude the authenticate api which calls generatetoken inside
```
protected void configure(HttpSecurity http) throws Exception {
        http.csrf().disable().authorizeRequests().antMatchers("/authenticate")
                .permitAll().anyRequest().authenticated();
}
```
3. We wil get jwt token when we hit localhost:8080/authenticate. 
4. then we need to pass JWT in header as key Authorization and value "Bearer tokenxxxxxxx".  
5. Add jwt filter by extending OncePerRequestFilter. 
```
@Component
public class JwtFilter extends OncePerRequestFilter {

    @Autowired
    private JwtUtil jwtUtil;
    @Autowired
    private CustomUserDetailsService service;


    @Override
    protected void doFilterInternal(HttpServletRequest httpServletRequest, HttpServletResponse httpServletResponse, FilterChain filterChain) throws ServletException, IOException {

        String authorizationHeader = httpServletRequest.getHeader("Authorization");

        String token = null;
        String userName = null;

        if (authorizationHeader != null && authorizationHeader.startsWith("Bearer ")) {
            token = authorizationHeader.substring(7);
            userName = jwtUtil.extractUsername(token);
        }

        if (userName != null && SecurityContextHolder.getContext().getAuthentication() == null) {

            UserDetails userDetails = service.loadUserByUsername(userName);

            if (jwtUtil.validateToken(token, userDetails)) {

                UsernamePasswordAuthenticationToken usernamePasswordAuthenticationToken =
                        new UsernamePasswordAuthenticationToken(userDetails, null, userDetails.getAuthorities());
                usernamePasswordAuthenticationToken
                        .setDetails(new WebAuthenticationDetailsSource().buildDetails(httpServletRequest));
                SecurityContextHolder.getContext().setAuthentication(usernamePasswordAuthenticationToken);
            }
        }
        filterChain.doFilter(httpServletRequest, httpServletResponse);
    }
}
```
6. Change the configure method , by passing the jwtfilter. 
```
	protected void configure(HttpSecurity http) throws Exception {
        http.csrf().disable().authorizeRequests().antMatchers("/authenticate")
                .permitAll().anyRequest().authenticated()
                .and().exceptionHandling().and().sessionManagement()
                .sessionCreationPolicy(SessionCreationPolicy.STATELESS);
        http.addFilterBefore(jwtFilter, UsernamePasswordAuthenticationFilter.class);;
    }
``
