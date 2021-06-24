# Spring Framework    

-application dev framework for javaEE	 
-1998 -2002 by spring.org- Rod johnson  
-interface21 is old name  
-EJB seems like winter, thus spring name came    
-called as framework of frameworks  

**Advantages**: loosely coupling, lightweight, easy to test, flexible(configurable)

**MODULES IN SPRING**:  
1. IOC - Spring core - basic, IOC & DI    
2. DAO - Data access/integration - Jdbc orm  
3. MVC - Web mvc - webservice, servlet, mvc pattern implementation, front controller  	 
4. AOP - security, logging, profiling  
5. Test	- junit, testNG  

### IOC container  
- create,manage,wire,configure object. It performs:    
1. **Inversion of control**: bean instantiation/location of dependices using mechanism Service Locator Pattern, loose coupling       
2. **Dependency Injection(DI)**: where object define their dependencies via 

**Way of Injections**: setter/contructor injection  
**Beans**: objects present in IOC container  

**Bean scope**:  
1. Singleton - Default scope, only one bean created and shared per IOC container, not thread safe.    
2. Proprotype - new instance will create Each time, the bean requested    
3. Request - each HTTP request will have its own instance of bean  
4. Session - bean defined to Http session scope
5. Global-session - bean defined to Http Global session scope   
Syntax:``` <bean id="" class="" scope="singleton">```  @Scope("prototype")   

**Bean Lifecycle**:  
1. XML approach - 		```<bean id="" class="" init-method="" destroy-method=""> ```  
2. default for all bean in beans tag - ```<beans default-init-method="" default-destroy-method=""/>```    
3. Annotation approach- ```@PostContruct  @PreDestroy```  
4. Using interface(not recommended) - implement these interface ``` implements IntializingBean, DisposableBean ```   
-it will force to define afterPropertiesSet(), destroy() methods  

## Annotations to remember:  
### Spring core Annotations

Annotation|usage
--- | --- 
@Configuration | Indicate that a class declares one or more @Bean methods
@Bean | Used inside @Configuration class and indicates that a method produces a bean <br/>```@Bean(name="comp", initMethod="turnOn", destroyMethod="turnOff")``` <br/>```Computer computer(){ return new Computer();  }```
@PreDestroy, @PostConstruct | Alternative way for bean initMethod and destroyMethod.
@ComponentScan("com.controller")| Used with @Configuration and use to know packages of annotated classes
@Component | Spring auto detect our custom beans 
@Service | same like @Component, serve as service  
@Repository | same like @Component, advisable as persistance classes, throws Spring’s DataAccessException    
@PropertySource | class level, along with @Configuration, Adding property file for spring env, <br/>also @PropertySources for multi files  <br/> ```@PropertySource(classpath:rasna-info.properties)```
@Autowired | Automatic injection of beans. from spring 4.3 @Autowired not need for single constrcutor <br/> **Setter injection**:```@Autowired public void setPerson (Person person) {this.person=person;}```<br/> **Constructor injection**:```@Autowired public Customer (Person person) { this.person=person;}``` <br/> **Property injection**: @Autowired Person person;  //not preferred     
@Required | Bean must be populated at configuration time, otherwise BeanInitializationException  
@Qualifier | when there is two implementation for the interface <br/>```@Autowired @Qualifier("beanB2") private BeanInterface dependency;```
@Lazy | Used along with @Component, bean will be created and initialized only when it is first requested.   
@Value | Indicates default value from property file or hardcode <br/> ```@Value("rajesh") @Value("${value.from.file}") String name;```  

### Spring Rest Annotations:  

Annotation|Level|Usage
--- |---| ---
@Controller | Class | capable of handling multiple request mappings.  
@RestController | Class | consists @Controller,@ResponseBody, handles Req/Res  
@RequestMapping | Method | mapping of web request Url path <br/>```@RequestMapping(path="/employees", method=RequestMethod.GET, ```<br/>```consumes="application/json", produces="application/json")```
@RequestBody | Arg | ```public void addMember(@RequestBody Member member) { }```
@RequestHeader | Arg | ```void get(@RequestHeader("accept-language") String language){ }```<br/>```void get(@RequestHeader HttpHeaders headers){ }```
@ResponseBody | Method | ```@ResponseBody public Member getMember() { }```  
@ResponseStatus | Method | ```@ResponseStatus(HttpStatus.BAD_REQUEST)```
@RequestParam | Arg | ```public void getItem(@RequestParam("username") String username){ }``` <br/>Dont confuse with @Queryparam  
@PathParam | Arg | ```@GetMapping("/members/{id}") public void getValue(@PathParam("id") String id){ }```
@PathVariable | Arg | ```@GetMapping("/members/{id}") public void getValue(@PathVariable String id){ }```
@CookieValue | Arg |  ```public void getCookieValue(@CookieValue "JSESSIONID" String cookie){ }```
@CrossOrigin | Method | ```@CrossOrigin(origins = "http://example.com")```  
@ExceptionHandler | Method | handles exception and return values <br/>```@ExceptionHandler(InvalidLoginException.class)public ModelAndView invalidLogin(){ }```

@GetMapping :  shortcut for @RequestMapping(method = RequestMethod.GET)  
@PostMapping :  shortcut for @RequestMapping(method = RequestMethod.POST)  
@PutMapping :  shortcut for @RequestMapping(method = RequestMethod.PUT)  
@DeleteMapping :  shortcut for @RequestMapping(method = RequestMethod.DELETE)
@PatchMapping :  shortcut for @RequestMapping(method = RequestMethod.PATCH)




@WebServlet("/getapi")  - add servlet-api in pom.xml -> create servlet-> putur code in doGet()  
@Transactional : beingtransaction,transaction.commit are not needed.. to enable this we need @EnableTransactionManagement in java file or in xml file //<tx:annotation-driven transaction-manager="myTransactionManager" />	
@Aspect @Before @After @Pointcut   
@EnableWeSecurity  
@ConfigurationProperties


**Annotations:**

@Produces - specify MIME media type  
``@PostMapping(value="/rest/addEmployee",produces={"application/x-www-form-urlencoded","application/json"})``  
@Consumes - array of string of MIME type
@ExceptionHandler - a method to handle all exception with not found html message

**Two types of Response @RestController**:  
1.Add Jackdon-bind pom.xml, just return object list  
2.use ResponseEntity<> class - ex: return new ResponseEntity<>(ResBody,HttpCode);  

**Exception handling**:  
@ExceptionHandler a method to handle exception in controller  
@ControllerAdvise - a class consists of @ExceptionHandler functions  
ErrorResponse body consists of- 1.status,2.msg,3.timestamp   


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
