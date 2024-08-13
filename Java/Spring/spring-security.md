
# Spring security  
> highly customizable authentication and authorization framework.


### Flow  
Browser -> Security interceptor -> spring controller

## Flow of Spring Security

### HTTP Request Flow:
#### 1. Basic Authentication Filter  
   - Class: `BasicAuthenticationFilter`  
   - Method: `doFilterInternal()`  
   - Description: Converts HttpServletRequest into an Authentication object.

#### 2. Authentication Manager Interface 
   - Default Implementation: `ProviderManager`  
   - Method: `authenticate()`  
   - Description:   
		1. The default implementation (`ProviderManager`) has a list of `AuthenticationProvider` instances. 
		2. It checks whether each `AuthenticationProvider` supports the current `Authentication` object.

#### 3. Authentication Providers
	1. JwtAuthenticationProvider - Web token-based authentication.
	2. PreAuthenticatedAuthenticationProvider - Supports external identity providers such as OAuth2 or SAML for Single Sign-On (SSO).
	3. DaoAuthenticationProvider - Uses `UserDetailsService` to retrieve user details.
	4. OAuth2AuthenticationProvider - Handles authentication using OAuth2 tokens.
  
## Spring Security Configurations

### 1. UserDetailsService Implementations
```	
@Configuration
@EnableWebSecurity
public class SecurityConfig {
    @Bean
    public SecurityFilterChain securityFilterChain(HttpSecurity http) throws Exception {
        // default Spring Security login and logout pages
       	http
            .authorizeHttpRequests()
                .requestMatchers("/", "/home").permitAll()
                .anyRequest().authenticated()
                .and()
            // default spring login/logout page
			.formLogin().permitAll().and()
            .logout().permitAll();

			// custom login/logout page
			.formLogin().loginPage("/custom-login").permitAll().and()
            .logout().logoutUrl("/custom-logout")
				
			
			// redirect page after logout
			.logout().logoutSuccessUrl("/login?custom-logout")
				.deleteCookies("JSESSIONID").invalidateHttpSession(true)
				.permitAll();
	
        return http.build();
    }
	
	// Custom user details service
    // If this method is not provided, Spring Security will use the default credentials from application.properties:
    /*
        spring.security.user.name=admin
        spring.security.user.password=password
    */
	@Bean
    public UserDetailsService userDetailsService() {
		PasswordEncoder passwordEncoder = new BCryptPasswordEncoder();
        UserDetails user = User.builder()
                               .username("user")      //our custom username
                               .password(passwordEncoder().encode("password")) // out custom password 
                               .roles("USER")
                               .build();
        return new InMemoryUserDetailsManager(user);
    }
}

```
```
@Configuration
@EnableWebSecurity
@EnableGlobalMethodSecurity(prePostEnabled = true)
public class SecurityConfig extends WebSecurityConfigurerAdapter {

	@Autowired
	private UserDetailsService userDetailsService;

	@Override
	protected void configure(AuthenticationManagerBuilder auth) throws Exception {
		auth.userDetailsService(userDetailsService).passwordEncoder(encodePWD());
	}

	@Override
	protected void configure(HttpSecurity http) throws Exception {
		http.csrf().disable();

		http.authorizeRequests().antMatchers("/rest/**").authenticated().anyRequest().permitAll().and()
				.authorizeRequests().antMatchers("/secure/**").authenticated().anyRequest().hasAnyRole("ADMIN").and()
				.formLogin().permitAll();

	}

	@Bean
	public BCryptPasswordEncoder encodePWD() {
		return new BCryptPasswordEncoder();
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
