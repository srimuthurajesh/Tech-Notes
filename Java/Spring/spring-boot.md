# Spring Boot  

> simplifies Java app development by providing pre-configured setups for creating standalone, microservice-based applications.

## Features of spring boot:
1. [Starter dependencies](#starter-dependencies)
2. [Actuator](#actuator)
3. Embedded server
4. [Cli tool](#cli-)
5. [Spring dev tools](#spring-boot-dev-tools)
6. [Application Properties](#applicationproperties-file)



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


### Actuator: 
> provides production-ready features like monitoring, metrics, health checks, and application insights   

| Actuator Endpoint      		| Description                                      |
|-------------------------------|--------------------------------------------------|
| `/actuator/health`            | Displays the health status of the application.   |
| `/actuator/env`               | Displays environment properties (e.g., active profiles, system properties). |
| `/actuator/beans`             | Lists all Spring beans in the application.       |
| `/actuator/mappings`          | Displays all HTTP request mappings and associated controllers. |
| `/actuator/metrics`           | Provides metrics such as JVM memory usage, thread counts, etc. |
| `/actuator/info`              | Displays custom application information such as build version, description, etc. |
| `/actuator/configprops`       | Lists all configuration properties used in the application. |
| `/actuator/loggers`           | Allows querying and modifying log levels of application loggers. |
| `/actuator/threaddump`        | Displays a thread dump of the JVM.                |
| `/actuator/scheduledtasks`    | Displays information about scheduled tasks in the application. |
| `/actuator/auditevents`       | Provides information about application audit events (if auditing is enabled). |
| `/actuator/heapdump`          | Provides a heap dump of the JVM.                  |
| `/actuator/jvm`               | Displays JVM-related metrics like memory usage, garbage collection stats. |
| `/actuator/httptrace`         | Displays HTTP request/response trace (similar to a recent log). |
| `/actuator/conditions`        | Lists all the conditions and their status that were evaluated during application startup. |

#### Steps to enable actuater:  
1. Add dependencies `spring-boot-starter-actuator`.  
2. Add it in appliction.properties  
`management.endpoints.web.exposure.include=*`  			// Enable all actuator endpoints  
`management.endpoints.web.exposure.exclude=beans,mapping`  	// endpoints to exclude  
`management.endpoints.web.base-path=/actuatorSample` 		// http://localhost:8080/actuatorSample/health  



### CLI :    

| Command                                                           | Description                                                        	|
|-------------------------------------------------------------------|--------------------------------------------------------------------|
| `mvn spring-boot:run`                                           	| Runs the Spring Boot application using Maven.                      |
| `mvnw spring-boot:run`                                           	| if maven not installed                      							|
| `mvn clean install`                                             	| Cleans and installs the project in the local Maven repository.     |
| `mvn install -DskipTests`                                       	| Installs the project without running the tests.                    |
| `mvn dependency:tree`                                             | Displays the dependency tree of your project.                       |
| `mvn clean validate`                                            	| Validates the project setup and dependencies.                      |
| `mvn spring-boot:run -Dspring.profiles.active=dev`               	| Runs the application with a specific Spring profile (e.g., dev).   |
| `mvn archetype:generate -DgroupId=com.example -DartifactId=myapp`	| Generates a new Spring Boot project using Spring Initializr.       |

Command to run jar : `java -jar app.jar`  

### Annotations:
1. **@SpringBootApplication**  
-combines of `@Configuration` + `@EnableAutoConfiguraion` + `@ComponentScan`    
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

### Auto Configuration
> configures your Spring app based on libraries(pom.xml) & properties(application.properties)

Note: in legacy we use @Configuration in class    
To Disable : `spring.autoconfigure.exclude=org.springframework.boot.autoconfigure.jdbc.DataSourceAutoConfiguration`

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
1. CrudRepository  - provides save(), findById(), findAll(), delete()  
2. PagingAndSortingRepository - findAll(Pageable pageable) and findAll(Sort sort). extends CrudRespository
3. JpaRepository - Adds JPA-specific functionality to PagingAndSortingRepository. flush(), saveAndFlush(), deleteInBatch()
4. Repository - marker interface, base for spring jpa, no CRUD methods  
5. QueryByExampleExecutor - findOne(Example<S>), findAll(Example<S>), and count(Example<S>)
6. MongoRepository
7. ElasticsearchRepository
8. CassandraRepository
9. Neo4jRepository, CouchbaseRepository
10. ReactiveCrudRepository

| Repository Interface         | Purpose                              | Best Use Case                        |
|------------------------------|--------------------------------------|--------------------------------------|
| `CrudRepository`             | Basic CRUD functionality            | Applications needing basic data access. |
| `PagingAndSortingRepository` | Adds pagination and sorting         | When pagination/sorting is required. |
| `JpaRepository`              | Full JPA-specific functionality     | Advanced JPA operations and custom queries. |
| `Repository`                 | Marker interface                    | Custom repository definitions.       |
| `QueryByExampleExecutor`     | Query-by-example support            | Simplified queries without defining methods. |
| `MongoRepository`            | MongoDB operations                  | Applications using MongoDB.          |
| `ElasticsearchRepository`    | Elasticsearch operations            | Full-text search and analytics.      |
| `CassandraRepository`        | Cassandra operations                | Applications using Cassandra.        |
| `Neo4jRepository`            | Neo4j graph database operations     | Applications with graph databases.   |
| `CouchbaseRepository`        | Couchbase operations                | Applications using Couchbase.        |
| `ReactiveCrudRepository`     | Reactive CRUD functionality         | Reactive programming use cases.      |



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

