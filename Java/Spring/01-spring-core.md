# Spring Framework    

-When: 1998 -2002 by spring.org- Rod johnson  
-Name reason: interface21 is old name  -EJB framework seems like winter, thus spring name came    
-called as Framework of Frameworks  

**Advantages**: loosely coupling, lightweight, easy to test, flexible(configurable)

**MODULES IN SPRING**:  
1. IOC - Spring core - basic, IOC & DI    
2. DAO - Data access/integration - Jdbc orm  
3. MVC - Web mvc - webservice, servlet, mvc pattern implementation, front controller  	 
4. AOP - security, logging, profiling  
5. Test	- junit, testNG  

### IOC container  
-create,manage,wire,configure object. It performs:    
1. **Inversion of control**: bean instantiation/location of dependices using mechanism Service Locator Pattern, loose coupling       
2. **Dependency Injection(DI)**: where object define their dependencies via 

**Two Ways of Injections**: setter/contructor injection  
**Beans**: objects present in IOC container  

**Bean scope**:  
1. Singleton - Default scope, only one bean created and shared per IOC container, not thread safe.    
2. Prototype - new instance will create Each time, the bean requested    
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
@Autowired(requeried=false)| for optional bean loading   
@Required | Bean must be populated at configuration time, otherwise BeanInitializationException  
@Qualifier | when there is two implementation for the interface <br/>```@Autowired @Qualifier("beanB2") private BeanInterface dependency;```
@Lazy | Used along with @Component, bean will be created and initialized only when it is first requested.   
@Value | Indicates default value from property file or hardcode <br/> ```@Value("rajesh") @Value("${value.from.file}") String name;```  
@ConfigurationProperties | behave as @Value, but apply for entire pojo class ```@ConfigurationProperties(prefix="api")``` 

### Spring Rest Annotations:  

Annotation            |Level|Usage
----------------------|---| ---
@Controller           | Class | usually return string, handled by view resolver.  
@ResponseBody         | Method | ```@ResponseBody public Member getMember() { }```  
@RestController       | Class | combo of @Controller+@ResponseBody, usually return json object  
@RequestMapping       | Method | mapping of web request Url path <br/>```@RequestMapping(path="/employees", method=RequestMethod.GET, ```<br/>```consumes="application/json", produces="application/json")```  
@RequestBody          | Arg | ```public void addMember(@RequestBody Member member) { }```
@RequestHeader        | Arg | ```get(@RequestHeader("accept-language") String language){ }```<br/>```void get(@RequestHeader HttpHeaders headers){ }```
@RequestParam         | Arg | ```public void getItem(@RequestParam("username") String username){ }``` <br/>Dont confuse with @Queryparam  
@PathParam            | Arg | ```@GetMapping("/members/{id}") public void getValue(@PathParam("id") String id){ }``` where @Path("/{id}") used
@PathVariable         | Arg | ```@GetMapping("/members/{id}") public void getValue(@PathVariable String id){ }```
@CookieValue          | Arg |  ```public void getCookieValue(@CookieValue "JSESSIONID" String cookie){ }```
@RequestPath          | Arg | same as @RequestParam, but used while having multipart file<br/>```public getItem(@RequestPath("username") String username, @RequestPath MultipartFile  file){ }```
@ResponseStatus       | Method | ```@ResponseStatus(HttpStatus.BAD_REQUEST)```
@CrossOrigin          | Method | ```@CrossOrigin(origins = "http://example.com")```  
@ExceptionHandler     | Method | Handles exception and return values. comes under@ControllerAdvice or @Controller class <br/>```@ExceptionHandler(InvalidLoginException.class)public ModelAndView invalidLogin(){ }```
@ControllerAdvice     | Class | Must declared class if it has methods of @ExceptionHandler, @InitBinder, or @ModelAttribute
@RestControllerAdvice | Class | combines @ControllerAdvice and @ResponseBody  
@Valid                | Arg | addUser(@Valid @RequestBody User user), where support annotations are <br/> @NotBlank,   

@GetMapping :  shortcut for @RequestMapping(method = RequestMethod.GET)  
@PostMapping :  shortcut for @RequestMapping(method = RequestMethod.POST)  
@PutMapping :  shortcut for @RequestMapping(method = RequestMethod.PUT)  
@DeleteMapping :  shortcut for @RequestMapping(method = RequestMethod.DELETE)
@PatchMapping :  shortcut for @RequestMapping(method = RequestMethod.PATCH)


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
