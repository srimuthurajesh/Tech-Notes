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
**IOC** - create,manage,wire,configure object  
-performs **Inversion of control**: bean instantiation/location of dependices using mechanism Service Locator Pattern, loose coupling       
-performs **Dependency Injection(DI)**: where object define their dependencies via 

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

**Steps to create spring bean**:  
1. Configure spring bean xml  	*<bean id="beanId" class="com.ClassName"></bean>  
2. Create spring container 		*ApplicationContext context = new ClassPathXmlApplicationContext("bean.xml");  
3. Retrieve bean from container *ClassName obj = (className)context.getBean("beanId");  
   
**XML attributes**:   
Setter injection : <property name="color" value="red"/>   
Constructor injection: <constructor-arg name="soda" value="True"/>  
Object injection : <property name="color" ref="anotherBeanName"/>  

**Autowire attribute**: <bean id="rasna" class="Rasna" autowire="constructor">  
-no need to write object injection <property name="color" ref="anotherBeanName"/>  
-no need to use @Autowired  
1. byType  
2. byName 
3. constructor
4. default 
 
**Bean scope**:  
1. Singleton - Default scope, only one bean created and shared per IOC container.    
2. Proprotype - each time new bean will created  
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

**Enable Annotaion support**  
1. Add this tag in XML - ```<context:annotation-config />```  
2. Or add this tag in XML - ```<bean class="org.springframework.context.annotation.CommonAnnotationBeanPostProcessor">```  

**Annotations**:  
@Autowired   
@Component  
@Qualifier("beanName")  
@Bean  
@Configuration  
@PostContruct  
@PreDestroy  
@ComponentScan("com.controller")   
@PropertySource("classpath:rasna-info.properties")

