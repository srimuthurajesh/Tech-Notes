# Spring Framework    

- 1998 -2002 by spring.org- Rod johnson  
- **Name reason:** interface21 is old name. EJB framework seems like winter, thus spring name came    
- called as Framework of Frameworks  

**Advantages**: loosely coupling, lightweight, easy to test, flexible(configurable)

## MODULES IN SPRING:  
1. Spring core - basic, IOC & DI    
2. Spring DAO - Data access/integration - Jdbc orm  
3. Spring MVC - Web mvc - webservice, servlet, mvc pattern implementation, front controller  	 
4. Spring AOP - (aspect oriented programming) security, logging, profiling  
5. Spring Test	- junit, testNG  
so many...  

## IOC container  
> core part of the Spring Framework. It helps in managing lifecycle and configuration of objects. 

It performs:    
1. **Inversion of control**: takes control of the bean creation , loose coupling       
2. **Dependency Injection(DI)**: Objects define their dependencies through their constructors or setter methods.     

#### Three Ways of Injections: 
1. Contructor injection  - for mandatory dependencies, but complex
2. Setter injection - simple, partial intialization. 
**Beans**: objects present in IOC container  
3. Field injection 

## Two types of IOC container**     
### 1. Bean factory 
> lazy intialization(bean load when getbean called), no annotated injection support   

```
    BeanFactory factory = new XmlBeanFactory(new ClassPathResource("spring-config.xml"));
    MyBean myBean = (MyBean) factory.getBean("myBean");
```   
### 2. Application context. 
> aggresive intialization, supports annotated injection, superset of BeanFactory  

```
    ApplicationContext context = new ClassPathXmlApplicationContext("spring-config.xml");
    ApplicationContext context = new FileSystemXmlApplicationContext("C:/path/to/spring-config.xml");
    ApplicationContext context = new AnnotationConfigApplicationContext(AppConfig.class);
    WebApplicationContext context = new GenericWebApplicationContext(servletContext);
    MyBean myBean = context.getBean(MyBean.class);
    context.registerShutdownHook();   //a hook ensures that close() method is called when JVM shuts down.  
    context.stop();                   //Temporarily halts application context. restarted by start()    
    context.close();                  //will call preDestroy(), shutdown context, destroy beans  
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




### Beans configuration ways:  
#### 1. XML Configuration  
> in applicationContext.xml. high performance, readability is tuff, complex to write. 

```xml
<beans xmlns="http://www.springframework.org/schema/beans" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.springframework.org/schema/beans http://www.springframework.org/schema/beans/spring-beans.xsd">
    <bean id="car" class="com.example.Car">
        <property name="engine" ref="engine"/> <!-- setter injection. ref means another bean id -->
        <constrctor-args ref="engine"> <!-- constructor injection ref means another bean id-->
    </bean>
    <bean id="engine" class="com.example.Engine"/>
</beans>
```
```
public class Main {
    public static void main(String[] args) {
        ApplicationContext context = new AnnotationConfigApplicationContext(AppConfig.class);
        Car car = context.getBean(Car.class);
        car.start();
    }
}
```
#### 2. Java based  
```
//AppConfig.java
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
```
 ApplicationContext context = new AnnotationConfigApplicationContext(AppConfig.class);
 Car car = context.getBean(Car.class);
```

#### 3. Annotation based   
```
@Configuration
@ComponentScan(basePackages = "com.example.ioc.demo")
public class AnnotationJavaConfig {
}
```
```
ApplicationContext context = new AnnotationConfigApplicationContext(AnnotationJavaConfig.class);
CarInterface car = context.getBean(Car.class);		
```
```
@Component //@services //@Respository
class Car{}
```



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
	

### Exceptions may occur in spring

## Core Spring Framework Exceptions
1. BeanCreationException: bean cannot be created. 
2. NoSuchBeanDefinitionException: bean cannot be found. 
3. BeanInstantiationException: bean instance cannot be created, due to missing or non-visible constructor.   
4. NoUniqueBeanDefinationException: two component with implement same interface, but no @Qualifier/@Primary mentioned.  
5. BeanCurrentlyInCreationException: circular dependency between beans. use @Lazy to solve this.    

## Spring Boot Exceptions
1. ApplicationContextException: error occurs in the application context initialization. if we miss @SpringBootApplication. 
