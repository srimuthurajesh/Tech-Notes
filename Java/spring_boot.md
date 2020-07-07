## SPRING BOOT  

**Commands:**  
mvn spring-boot:run    // only if maven locally installed  
mvnw spring-boot:run // if maven not installed   
mvn package // to make jar file in taget folder  
java -jar app.jar  // to run jar file  

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

**List of Dependices available:**
spring-boot-starter-web : it consists of tomcat,validation,jackson-databind,spring-webmvc   
spring-boot-devtools : fast restarts, LiveReload  
spring-boot-starter-data-jpa : JPA API using Spring DataRepository and Hibernate  
database driver - h2,mysql etc  

**@SpringBootApplication**  
-combines of @Configuration,@EnableAutoConfiguraion,@ComponentScan    
-scan its current package/subpackage for componentscan controllers   
-to mention explict packages use @SpringBootApplication(scanBasePackages={"org.cont","com.cont"})  

**Application.properties** : src/resources/  
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
// actuator  
management.endpoints.web.exposure.include=*  
management.endpoints.web.exposure.exclude=beans,mapping  // endpoints to exclude  
management.endpoints.web.base-path=/actuatorSample // http://localhost:8080/actuatorSample/health   
connection.pool.initialPoolSize=5
connection.pool.minPoolSize=5
connection.pool.maxPoolSize=20
connection.pool.maxIdleTime=3000

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

 