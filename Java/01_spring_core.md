### SPRING  
-application dev framework for javaEE	 
-1998 -2002 by spring.org- Rod johnson  
-interface21 is old name  
-EJB seems like winter, thus spring name came    
-called as framework of frameworks  

Advantages: loosely coupling, lightweight, easy to test, flexible(configurable)

**MODULES IN SPRING**:  
1. IOC - Spring core - basic, IOC & DI    
2. DAO - Data access/integration - Jdbc orm  
3. MVC - Web mvc - webservice, servlet, mvc pattern implementation, front controller  	 
4. AOP - security, logging, profiling  
5. Test	- junit, testNG  

-------------------------------------------------------------------------------------------------------------------------------
**IOC container** - create,manage,wire,configure object. It performs:    
1. **Inversion of control**: bean instantiation/location of dependices using mechanism Service Locator Pattern, loose coupling       
2. **Dependency Injection(DI)**: where object define their dependencies via 

**Way of Injections**: setter/contructor injection  
**Dependcies of Injection**: literal, object, collection  
**Beans**: objects present in IOC container  

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

**Annotations to remember**:  
@Controller  - for controller classes  
@RequestMapping  - URI mapping for controller classes  
@ResponseBody - sending object as Response  
@pathVariable - for mapping dynamic value from URI to handler method arg   
@Autowired    
@Component   
@Qualifier("beanName")  - to avoid ambiguos with same class name   
@Bean  
@Configuration   
@ComponentScan("com.controller")    
@PropertySource("classpath:rasna-info.properties")   
@Value()  
@WebServlet("/getapi")  - add servlet-api in pom.xml -> create servlet-> putur code in doGet()  
@Service -* same as component, jused for service layer  
@Repository- *same as component, used for persistance layer, translates any persistence related exceptions into a Spring’s DataAccessException  
@PostContruct   
@PreDestroy   
@Transactional : beingtransaction,transaction.commit are not needed.. to enable this we need @EnableTransactionManagement in java file or in xml file //<tx:annotation-driven transaction-manager="myTransactionManager" />	
@Aspect @Before @After @Pointcut   
@EnableWeSecurity  
