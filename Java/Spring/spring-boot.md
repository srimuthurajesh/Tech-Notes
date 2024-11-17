# Spring Boot  

> simplifies Java app development by providing pre-configured setups for creating standalone, microservice-based applications.

## Features of spring boot:
1. [Starter dependencies](#starter-dependencies)
2. [Actuator](#actuator)
3. Embedded server
4. [Cli tool](#cli-)
5. [Auto configuration](#auto-configuration)
6. Spring dev tools



### Starter dependencies    
>  pre-defined dependencies that bundle a set of commonly used libraries  

| Starter Dependency                 | Purpose                                              |
|------------------------------------|------------------------------------------------------|
| `spring-boot-starter`              | Core starter, includes auto-configuration and logging. |
| `spring-boot-starter-web`          | it consists of tomcat,validation,jackson-databind,spring-webmvc  |
| `spring-boot-starter-data-jpa`     | For working with databases using JPA and Hibernate.  |
| `spring-boot-starter-security`     | Adds Spring Security for authentication and authorization. |
| `spring-boot-starter-test`         | Includes testing libraries like JUnit, Mockito, and AssertJ. |
| `spring-boot-starter-thymeleaf`    | For server-side rendering using Thymeleaf templates. |
| `spring-boot-starter-actuator`     | Provides production-ready features like health checks and metrics. |
| `spring-boot-starter-mail`         | For sending emails using JavaMailSender.            |
| `spring-boot-starter-validation`   | Includes Bean Validation API for validating user inputs. |
| `spring-boot-starter-aop`          | For aspect-oriented programming (AOP) using Spring AOP. |
| `spring-boot-starter-logging`      | Default logging setup with Logback and SLF4J.       |
| `spring-boot-starter-data-mongodb` | For MongoDB database integration.                  |
| `spring-boot-starter-cache`        | Adds caching support for the application.           |
| `spring-boot-starter-cloud`        | For building cloud-native applications (part of Spring Cloud). |


### spring-boot-devtools
> enhances dev experience by providing features like automatic restarts, live reload, and quick debugging support.

`spring-boot-devtools`

### Actuator: 
> provides production-ready features like monitoring, metrics, health checks, and application insights   

a) http://localhost:8080/actuator/health =>UP or DOWN    
b) http://localhost:8080/actuator/env => port, active profile  
c) http://localhost:8080/actuator/beans => list of beans Eg:HelloController in Demo  
d) http://localhost:8080/actuator/configprops => list all properties Eg:ApiConfig in Demo  
e) http://localhost:8080/actuator/mappings => list all end poitns: Eg:/hello mappings  

#### Steps to enable actuater:  
1. Add dependencies `spring-boot-starter-actuator`.  
2. Add it in appliction.properties  
`management.endpoints.web.exposure.include=*`  			// Enable all actuator endpoints  
`management.endpoints.web.exposure.exclude=beans,mapping`  	// endpoints to exclude  
`management.endpoints.web.base-path=/actuatorSample` 		// http://localhost:8080/actuatorSample/health  

### Auto Configuration
> It has lot of default configurations.  

### CLI :    
`mvn spring-boot:run`    // only if maven locally installed  
`mvnw spring-boot:run` // if maven not installed   
`mvn package` 	// to make jar file in taget folder  
`java -jar app.jar`  // to run jar file  

### Annotations:
1. **@SpringBootApplication**  
-combines of @Configuration,@EnableAutoConfiguraion,@ComponentScan    
-scan its current package/subpackage for componentscan controllers   
-to mention explict packages use @SpringBootApplication(scanBasePackages={"org.cont","com.cont"})  
2. @EnableAutoConfiguration: configure your application based on the dependencies that you have added to your project  
-triggers the auto-configuration process.  
-Spring Boot scans the classpath for dependencies and applies relevant configuration classes  
-These configuration classes define beans and their dependencies.   
-How to disable- `@SpringBootApplication(exclude = {DataSourceAutoConfiguration.class, SecurityAutoConfiguration.class})`
### Application.properties File 
-File path: src/resources/  
-https://docs.spring.io/spring-boot/docs/current/reference/html/appendix-application-properties.html   

foo.name=rajesh  // can use @Value("${foo.name}")   
server.port=8080  
spring.dataSource.url=jdbc:mysql://localhost:3306/test  
spring.dataSource.username=sa  
spring.dataSource.password=sa    
spring.jpa.properties.hibernate.dialect=org.hibernate.dialect.MySQL8Dialect
spring.jpa.show-sql=true
spring.jpa.generate-ddl=update  
server.servlet.context-path=/myapp   // http://localhost:8080/myapp/  
server.servlet.session.timout=15m  
 
connection.pool.initialPoolSize=5  
connection.pool.minPoolSize=5  
connection.pool.maxPoolSize=20  
connection.pool.maxIdleTime=3000  

//Url path 
server.servlet.context-path=/ClientApp

//**Spring profiles**    
spring.profiles.active=qa    //then spring will consider application-qa.properties file
//also give it via -D in commandline

---

### Spring boot dev tools: 
-Autoreload  
-Add dependency spring-boot-devtools in pom.xml  
-these folder will not autoreload: /META-INF,/resources,/static,/public,/templates  
spring.devtools.restart.additional-paths = /path-to-folder  
spring.devtools.restart.exclude=static/**,public/**	//You can also configure folders to exclude    

## Database operation  
-automatic configure dataSource based on:  
1.Jdbc db driver:mysql-connecter-java  
2.Spring ORM: spring-boot-started-data-jpa  
3.DB connection from application.properties  

-create beans for DataSource,EntityManager  
-get session object from entityManager: ```Session session = entityManager.unwrap(Session.class);```  

We can use EntityManager:
#### 1. via hibernate api methods - support HQL, save(),get()/load(),createQuery(),saveOrUpdate(),delete()     
#### 2. via JPA api methods: support JPQL, persist(),find(),createQuery(),merge(),remove()   
#### 3. via spring data JPA : create interface DAO and extends JpaRepository<Employee, Integer>     
automatic implementation of deleteById(int empId), findAll(), save(Employee emp), findById();  
```java
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
#### 4. Spring data rest: no need of controllers  
a)add pom.xml spring-boot-starter-data-rest  
b)create entity class Employee  
c)create interface DAO and extends JpaRepository<Employee, Integer>     
```java
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

### Spring Logging:
SpringConreoller -> slf4j -> logback  

```java
Logger log = LoggerFactory.getLogger(HelloController.class);  
logger.info("it is log info");  

logging.level.root=DEBUG
logging.level.com.rajesh=DEBUG
```
Seperate logging configuration xml file: logback-spring.xml or logback.xml


Cache annotation  
1. @Cacheable
2. @CachePut
3. @CacheEvict
4. @CacheConfig

Scheduler annotation   
1. @Scheduled(fixedDelay=5000)  - end of last execution and the start of next execution is fixed  
2. @Scheduled(fixedRate=5000)  -  beginning of the task execution does not wait for the completion of the previous execution.  
3. @Scheduled(initialDelay=1000,fixedRate=5000)  - executed initially with a delay and then continues with the specified fixed rate.  

## Standard springboot folder structure
  
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

