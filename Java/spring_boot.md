## SPRING BOOT  

### Features:
**Auto Configuration** - It as lot of default configurations.  
**Starter dependencies** -  
1. spring-boot-starter-web : it consists of tomcat,validation,jackson-databind,spring-webmvc   
2. spring-boot-devtools : fast restarts, LiveReload  
3. spring-boot-starter-data-jpa : JPA API using Spring DataRepository and Hibernate  
4. database driver - h2,mysql etc  

**Actuator** - 
1) List beans configures in runtime   
2) can view auto configuration decisions  
3) View Env variable, commandline args, application properties  
	a) http://localhost:8080/actuator/health =>UP or DOWN    
	b) http://localhost:8080/actuator/env => port, active profile  
	c) http://localhost:8080/actuator/beans => list of beans Eg:HelloController in Demo  
	d) http://localhost:8080/actuator/configprops => list all properties Eg:ApiConfig in Demo  
	e) http://localhost:8080/actuator/mappings => list all end poitns: Eg:/hello mappings  

**Commands:**  
mvn spring-boot:run    // only if maven locally installed  
mvnw spring-boot:run // if maven not installed   
mvn package // to make jar file in taget folder  
java -jar app.jar  // to run jar file  

### Annotations:
1. **@SpringBootApplication**  
-combines of @Configuration,@EnableAutoConfiguraion,@ComponentScan    
-scan its current package/subpackage for componentscan controllers   
-to mention explict packages use @SpringBootApplication(scanBasePackages={"org.cont","com.cont"})  
2. 

### Application.properties   
-File path: src/resources/  
-https://docs.spring.io/spring-boot/docs/current/reference/html/appendix-application-properties.html   

foo.name=rajesh  // can use @Value("${foo.name}")   
server.port=8080  
spring.dataSource.url=jdbc:mysql://localhost:3306/test  
spring.dataSource.username=sa  
spring.dataSource.password=sa    
spring.jpa.show-sql=true
spring.jpa.generate-ddl=update  
server.servlet.context-path=/myapp   // http://localhost:8080/myapp/  
server.servlet.session.timout=15m  
//**Actuator**   
management.endpoints.web.exposure.include=*  			// Enable all actuator endpoints  
management.endpoints.web.exposure.exclude=beans,mapping  	// endpoints to exclude  
management.endpoints.web.base-path=/actuatorSample 		// http://localhost:8080/actuatorSample/health   
connection.pool.initialPoolSize=5  
connection.pool.minPoolSize=5  
connection.pool.maxPoolSize=20  
connection.pool.maxIdleTime=3000  
//**Spring profiles**    
spring.profiles.active=qa    //then spring will consider application-qa.properties file
//also give it via -D in commandline

---

**Spring boot dev tools**: Autoreload  
-Add dependency spring-boot-devtools in pom.xml  
-these folder will not autoreload: /META-INF,/resources,/static,/public,/templates  
spring.devtools.restart.additional-paths = /path-to-folder  
spring.devtools.restart.exclude=static/**,public/**	//You can also configure folders to exclude    

**Spring boot Actuator**: monitor,manage spring application, provides endpoints like \/actuator/health.   
add dependency spring-boot-starter-actuator in pom.xml  

**Database operation**  
-automatic configure dataSource based on:  
1.Jdbc db driver:mysql-connecter-java  
2.Spring ORM: spring-boot-started-data-jpa  
3.DB connection from application.properties  

-create beans for DataSource,EntityManager  
-get session object from entityManager: ```Session session = entityManager.unwrap(Session.class);```  

we can use EntityManager:
1. via hibernate api methods - support HQL, save(),get()/load(),createQuery(),saveOrUpdate(),delete()     
2. via JPA api methods: support JPQL, persist(),find(),createQuery(),merge(),remove()   
3. via spring data JPA : create interface DAO and extends JpaRepository<Employee, Integer>     
automatic implementation of deleteById(int empId), findAll(), save(Employee emp), findById();  
```
public interface EmployeeDaoJpaRepository extends JpaRepository<Employee, Integer> {
    /**
     *  
     * These function automatically get implemented no need to write logic  
     * public boolean deleteById(int empId);
        public List<Employee> findAll(); 
        public void save(Employee emp);
    	public Employee findById();
     */
}
```
**3a. Spring data rest**: no need of controllers  
a)add pom.xml spring-boot-starter-data-rest  
b)create entity class Employee  
c)create interface DAO and extends JpaRepository<Employee, Integer>     
```
@RespositoryRestResource(path="employees")   //usually plural lowercase of entity class  
public interface EmployeeDaoJpaRepository extends JpaRepository<Employee, Integer> {
``` 
thats all, REST application is ready. employees/{empId} etc we can access...   
spring.data.rest.base-path=/magicapi  // configure basepath for endpoints *localhost/magicapi/employees*     
spring.data.rest.default-page-size=10  // *localhost/magicapi/employees?page=3* // will give limit 21 to 30   
spring.data.rest.max-page-size=4       //only four pages allowed menas 40 records allowed   

*localhost/magicapi/employees?sort=lastName*  // sort ascending based on lastName   
*localhost/magicapi/employees?sort=lastName,desc*  // sort descending based on lastName  
*localhost/magicapi/employees?sort=firstName,lastName,desc*  // sort ascending firstname then lastname   
-will provide meta data with response like size,totalElements,totalPages,number   
-will provide Natheos details like, history links   

### Exception Handling  
@ControllerAdvice : exception class annotation   
@ExceptionHandler(value = ProductNotfoundException.class) : method annotation   
 
### Spring security  
Browser -> **Security interceptor**(Default login page) -> spring controller

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

**Standard springboot folder structure**:  
```
>mvnw - perform mvnw spring-boot:run    
>mvnw.cmd - perform clean compile test  
>pom.xml 
>src
	>main
		>java  - java files  
		>resources  
			>static - has html css js img. dont use webapp folder  
			>templates - for Themeleaf, FreeMaker, Mustache  
			application.properties
	>test  
		>java - test files   
```		

### Spring Logging:
SpringConreoller -> slf4j -> logback  
```
Logger log = LoggerFactory.getLogger(HelloController.class);  
logger.info("it is log info");  

logging.level.root=DEBUG
logging.level.com.rajesh=DEBUG
```

Seperate logging configuration xml file: logback-spring.xml or logback.xml
