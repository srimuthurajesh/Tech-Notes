# Spring Framework    

- 1998 -2002 by spring.org- Rod johnson  
- **Name reason:** interface21 is old name. EJB framework seems like winter, thus spring name came    
- called as Framework of Frameworks  

**Advantages**: loosely coupling, lightweight, easy to test, flexible(configurable)

**MODULES IN SPRING**:  
1. Spring core - basic, IOC & DI    
2. Spring DAO - Data access/integration - Jdbc orm  
3. Spring MVC - Web mvc - webservice, servlet, mvc pattern implementation, front controller  	 
4. Spring AOP - security, logging, profiling  
5. Spring Test	- junit, testNG  
so many...  

### IOC container  
- create,manage,wire,configure object. It performs:    
1. **Inversion of control**: bean instantiation/location of dependices using mechanism Service Locator Pattern, loose coupling       
2. **Dependency Injection(DI)**: where object define their dependencies via constructor parameters or setter methods,   

**Two Ways of Injections**: setter/contructor injection  
**Beans**: objects present in IOC container  

### Beans configured ways:  
1. **XML** - in applicationContext.xml. 
```
<beans xmlns="http://www.springframework.org/schema/beans" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.springframework.org/schema/beans http://www.springframework.org/schema/beans/spring-beans.xsd">
    <bean id="car" class="com.example.Car">
        <property name="engine" ref="engine"/>
    </bean>
    <bean id="engine" class="com.example.Engine"/>
</beans>
```
2. **Java configuration class** - in AppConfig.java.  
```
@Configuration
public class AppConfig {
    @Bean
    public Car car() {
        return new Car(engine());
    }
    @Bean
    public Engine engine() {
        return new Engine();
    }
}
```
3. **Java code**. 
```
public class Main {
    public static void main(String[] args) {
        ApplicationContext context = new AnnotationConfigApplicationContext(AppConfig.class);
        Car car = context.getBean(Car.class);
        car.start();
    }
}
```

**Bean scope**:  
1. Singleton - Default scope, only one bean created and shared per IOC container, not thread safe.    
2. Prototype - new instance will create Each time, the bean requested    
3. Request - each HTTP request will have its own instance of bean  
4. Session - bean defined to Http session scope
5. Global-session - bean defined to Http Global session scope   
Syntax:  
XML Configuration: `<bean id="" class="" scope="singleton">`. 
Annotation Configuration: `@Scope("prototype")`. 

**Bean Lifecycle**:  
1. XML approach - 		```<bean id="" class="" init-method="" destroy-method=""> ```  
2. default for all bean in beans tag - ```<beans default-init-method="" default-destroy-method=""/>```    
3. Annotation approach- ```@PostContruct  @PreDestroy```  
4. Using interface(not recommended) - implement these interface ``` implements IntializingBean, DisposableBean ```   
-it will force to define afterPropertiesSet(), destroy() methods  

## Annotations to remember:  

### 1. Spring core Annotations
Annotation                  | Usage                                                                     |Level
----------------------------| --------------------------------------------------------------------------| ---
@Configuration              | Indicates a class declares one or more @Bean methods.                     | Class
@Bean                       | Indicate that method produces a bean.                                     | Method
@PostConstruct              | method executed after bean initialization.                                | Method
@PreDestroy                 | method executed before bean destruction.                                  | Method
@ComponentScan("com")       | Specifies the packages to be scanned for annotated classes.               | Class
@Component                  | Indicates that a class is a spring bean                                   | Class
@Service                    | Indicate service classes, Identical to @Component                         | Class
@Repository                 | Inticate DAOimpl/persistence classes, Identical to @Component             | Class
@Autowired                  | Enables bean injection for @Component,@Service,@Repository                | Field/Method/Constructor
@Autowired(required=false)  | Spring'll not fail if bean not found, instead assign null.                | Field/Method/Constructor
@PropertySource             | Specifies a property file @PropertySource("classpath:app.properties")     | Class
@Value                      | inject values from @PropertySource file  @Value("${my.custom.property}")  | Field
@Required                   | Ensures bean property must be populated otherwise thrownException         | Field/Method/Constructor
@Qualifier                  | give bean id, avoid ambiquity when multi implementation exist             | Field/Parameter
@Lazy                       | Delays bean creation and intialized when it is first requested.           | Class/Method
@ConfigurationProperties    | Specifies configuration properties for entire POJO classes.               | Class



| Annotation        | Usage                                                                 | Level    |
|-------------------|-----------------------------------------------------------------------|----------|
| @Controller       | Handle req/res. returns string(view name) used by view resolver       | Class    |
| @ResponseBody     | Converts object to Json/Xml using jackson library                     | Method   |
| @RestController   | combo of @Controller + @ResponseBody                                  | Class    |
| @RequestMapping   | maps html request to methods, based on Httpmethods,content type etc   | Method   |
| @RequestBody      | data from http body, `@RequestBody User user`                         | Argument |
| @RequestHeader    | data from http header, `@RequestHeader("Authorization") String auth`  | Argument |
| @RequestParam     | data from http requestparam                                           | Argument |
| @PathVariable     | data from http url, used in Spring MVC                                | Argument |
| @PathParam        | DONT USE. data from http url, used in JAX-RS framework                | Argument |
| @CookieValue      | data from http cookies `@CookieValue(value = "uname") String name`    | Argument |
| @CrossOrigin      | enables Cross-Origin Resource Sharing (CORS)                          | Method  |
| @GetMapping       | shortcut for @RequestMapping(method = RequestMethod.GET)              | Method  |
| @PostMapping      | shortcut for @RequestMapping(method = RequestMethod.POST)             | Method  |
| @PutMapping       | shortcut for @RequestMapping(method = RequestMethod.PUT)              | Method  | 
| @DeleteMapping    | shortcut for @RequestMapping(method = RequestMethod.DELETE)           | Method  |
| @PatchMapping     | shortcut for @RequestMapping(method = RequestMethod.PATCH)            | Method  |


```@RequestMapping(value = "/hello", method = RequestMethod.GET, params = "name", headers = "Content-Type=application/json",  consumes = "application/json", produces = "application/json", name = "HelloEndpoint")```


### 3. Exception handling. 
| Annotation        | Usage                                                                 | Level    |
|-------------------|-----------------------------------------------------------------------|----------|
| @ControllerAdvice | Defines global exception handlers class, model attributes, data binding| Class   |
| @RestControllerAdvice| Combines @ControllerAdvice and @ResponseBody functionalities.      | Class   |
| @ExceptionHandler | handle exceptions thrown by controllers.                              | Method  |
| @ResponseStatus   | Sets the HTTP status code for the response, while exception           | Method  |

### 4. Validation Annotations. 
| Annotation      | Usage                                                                            | Level    |
|-----------------|----------------------------------------------------------------------------------|----------|
| @Validated      | indicate that the class should be subject to validation constraints.             | class    |
| @Valid          | `@Valid @RequestParam("name") String name`. throws MethodArgumentNotValidException | Argument |
| @NotNull        | Ensures field is not null. `@NotNull(message = "Name cannot be null")`            | Field |
| @NotBlank       | ensure field is not blank ""  `@NotBlank(message = "Name cannot be blank")`       | Field |
| @NotEmpty       | Ensures field is not null or empty.`@NotEmpty(message = "Name cannot be empty")`  | Field |
| @Size           | Validates field's size `@Size(min = 2, max = 30, message = "invalid")`            | Field |
| @Min            | Ensures field value more than given value `@Min(value = 18, message = "invalid"`  | Field |
| @Max            | Ensures field value less than given value `@Max(value = 18, message = "invalid"`  | Field |
| @Email          | Ensure field has valid email format `@Email(message = "Email should be valid")`   | Field |
| @Pattern        | Ensure field matches specified regex `@Pattern(regexp = "^[a-z]+$", message = "Usernam`| Field |
| @Past           | Ensure date is less then today `@Past(message = "invalid")`                         | Field |
| @Future         | Ensure date is more then today `@Future(message = "invalid")`                       | Field |
| @Positive       | number should be positive  `@Positive(message = "invalid")`                         | Field |
| @Negative       | number should be negative `@Negative(message = "invalid")`                          | Field |
| @PositiveOrZero | number should be positive or zero `@PositiveOrZero(message = "invalid")`            | Field |
| @NegativeOrZero | number should be negative or zero `@NegativeOrZero(message = "invalid")`            | Field |


**Two types of Response @RestController**:  
1.Add Jackdon-bind pom.xml, just return object list  
2.use ResponseEntity<> class - ex: return new ResponseEntity<>(ResBody,HttpCode);  


**File upload:**

```
@POST
@Consumes(MediaType.MULTIPART_FORM_DATA)
public Response uploadFile(@FormDataParam("file") InputStream uploadedInputStream,@FormDataParam("file") FormDataContentDisposition fileDetail){}
```

**Two types of IOC container**:     
1. Bean factory - lazy intialization, no annotated injection support    
2. Application context - aggresive intialization, supports annotated injection, superset of BeanFactory  

**Classes of ApplicationContext**:  
1. FileSystemXmlApplicationContext  
2. ClassPathXmlApplicationContext - no need full path, but need to CLASSPATH properly  
3. WebXmlApplicationContext - will load bean from within the web application  
4. AnnotationConfigApplicationContext - support annotation class    

**Types of Spring configurations:**  
1.XML, 2.Java, 3.Annotation  

## XML approach
**Steps to create spring bean(IOC via XML)**:  
1. Configure spring bean.xml  	```<bean id="beanId" class="com.ClassName"></bean>```  
2. Create spring container 	```ApplicationContext context = new ClassPathXmlApplicationContext("bean.xml");```    
3. Retrieve bean from container ```InterfaceName obj = (InterfaceName)context.getBean("beanId");```    

**Dependency injection via XML**:   
1. While Setter injection: ```<property name="color" value="red"/>```  
2. While Constructor injection: ```<constructor-arg name="soda" value="True"/>```  
3. While Object injection via setter, constructor:      
```<property name="color" ref="anotherBeanName"/>```  
```<constructor-arg name="color" ref="anotherBeanName"/>```  
4. Via property file:  
```<context:property-placeholder location="classpath:rasna-info.properties"/>```   
```<property name="color" value="${foo.color}"/>```    

**Autowire attribute via XML**: <bean id="rasna" class="Rasna" autowire="constructor">  
-no need to write object injection <property name="color" ref="anotherBeanName"/>, no @Autowired  
1.byType, 2.byName, 3.constructor, 4.default 
 
 ---
 ## Java approach  
 
**Steps to create spring bean(IOC via JAVA)**:  
1. Configure spring Config.java - that has @Configuration 
2. Create spring container 	```ApplicationContext context = new AnnotationConfigApplicationContext(Config.class);```    
3. Retrieve bean from container ```InterfaceName obj = (InterfaceName)context.getBean("beanId");```    

@Bean annotation will be use, beanName will be function name. refer  practise repo.    
@PropertySource("classpath:rasna-info.properties")
  
--- 
## Annotation approach
-no need of bean defination in xml/java config file, we just mention folder to scan  

1. Configre xml or java with folder scan  
```@ComponentScan(basePackages="com.java.drinkMaker")```    
```<context:component-scan base-package="com.luv2code.springdemo"/>```  
2. Create spring container ```ApplicationContext context = new AnnotationConfigApplicationContext(Config.class);```  
3. Retrieve bean from container ```InterfaceName obj = (InterfaceName)context.getBean("beanId");```  

**Annotation Enabling**  
1. Add this tag in XML - ```<context:annotation-config />```  
2. Or add this tag in XML - ```<bean class="org.springframework.context.annotation.CommonAnnotationBeanPostProcessor">```  

@Component - define class as bean    
@Qualifier - give bean id, avoid ambiquity while using autowired  
@Autowired - provides dependency  
@Value() - field injection directly or via property file   
@PropertySource("classpath:rasna-info.properties")
	
---
	
## Http Call  

1. **RestTemplate**  

```
RestTemplate restTemplate = new RestTemplate();
1. Foo foo = restTemplate.getForObject(fooResourceUrl, Foo.class);
2. Foo foo = restTemplate.postForObject(fooResourceUrl, new HttpEntity<>(new Foo("bar")), Foo.class);  
3. restTemplate.delete(entityUrl);
4. ResponseEntity<Foo> response = restTemplate.exchange(fooResourceUrl, HttpMethod.POST, new HttpEntity<>(new Foo("bar")), Foo.class); 
response.getBody();

```
2. **WebClient** : non-blocking client and it belongs to the spring-webflux library. uses spring web reactive   
```
Flux<Foo> fooFlux = WebClient.create().get().uri(fooResourceUrl).retrieve().bodyToFlux(Foo.class);
fooFlux.subscribe(x->sysout(x));
	
(or)

WebClient client = WebClient.builder()
  .baseUrl("http://localhost:8080")
  .defaultCookie("cookieKey", "cookieValue")
  .defaultHeader(HttpHeaders.CONTENT_TYPE, MediaType.APPLICATION_JSON_VALUE) 
  .defaultUriVariables(Collections.singletonMap("url", "http://localhost:8080"))
  .build();
```

### Exceptions may occur in spring

## Core Spring Framework Exceptions
1. BeanCreationException: bean cannot be created. 
2. NoSuchBeanDefinitionException: bean cannot be found. 
3. BeanInstantiationException: bean instance cannot be created, due to missing or non-visible constructor.   
4. NoUniqueBeanDefinationException: two component with implement same interface, but no @Qualifier/@Primary mentioned.  
5. BeanCurrentlyInCreationException: circular dependency between beans. use @Lazy to solve this.    

## Spring Boot Exceptions
1. ApplicationContextException: error occurs in the application context initialization. if we miss @SpringBootApplication. 

## Spring Bean Lifecycle hooks. 
1. BeanFactoryPostProcessor: application context's internal bean factory after its standard initialization but before any bean instances are created.

2. BeanPostProcessor:
postProcessBeforeInitialization(Object bean, String beanName): Custom logic before a bean's initialization callback.  
postProcessAfterInitialization(Object bean, String beanName): Custom logic after a bean's initialization callback.  

3. InitializingBean:
afterPropertiesSet(): Method for custom initialization logic after properties are set.  

4. DisposableBean:  
destroy(): Method for custom cleanup logic before a bean is destroyed.  

5. Custom Init and Destroy Methods:  
initMethod and destroyMethod attributes in @Bean annotation or XML configuration to specify custom initialization and destruction methods.  

6. @PostConstruct: Annotation for a method to be executed after the bean's properties have been set and before it is put into service.  

7. @PreDestroy: Annotation for a method to be executed before the bean is destroyed.  