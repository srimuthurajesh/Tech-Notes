
# Spring security  
Browser -> **Security interceptor**(Default login page) -> spring controller


## Flow of spring security. 
Http  ->. 
1. Basic authentication filter
	BasicAuthenticationFilter.java:doFilterInternal(). 
	converts HttpServelet into authentication object.  
2. Authentication manager interface.
	- default impl is ProiderManager.java:authenticate()
	- this impl will have list of authenticationProviders, 
	- where it will check whether its supports() current authentication obj. 

3. Authentication Provider. 
	a) AnonymousAuthenticationProvider- anonymous users. 
	b) DaoAuthenticationProvider - Uses UserDetailsService     
	c) LdapAuthenticationProvider - retrieves user details & authorities from LDAP directory.   
	d) JaasAuthenticationProvider. - JAAS-compliant authentication. 
	d) PreAuthenticatedAuthenticationProvider. - external identity provider, OAUTH2 or saml. SSO. 
	e) RememberMeAuthenticationProvider - handle token generation and validation.  
	f) JwtAuthenticationProvider - WT-based authentication. 

spring.security.user.name=root  
spring.security.user.password=root 

```	
@Configuration
@EnableWebSecurity
public class WebSecurityConfig extends WebSecurityConfigurerAdapter {
	@Override
	protected void configure(HttpSecurity http) throws Exception {
		http
			.authorizeRequests()
				.antMatchers("/", "/home").permitAll()
				.anyRequest().authenticated()
				.and()
			.formLogin()
				.loginPage("/login")
				.permitAll()
				.and()
			.logout()
				.permitAll();
	}

	@Bean
	@Override
	public UserDetailsService userDetailsService() {
		UserDetails user =
			 User.withDefaultPasswordEncoder()
				.username("user")
				.password("password")
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