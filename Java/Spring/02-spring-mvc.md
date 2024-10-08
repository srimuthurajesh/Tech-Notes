# Spring MVC

## Classes involved in mvc
1. Controller - Manages HTTP requests/req
2. DTO (Data Transfer Object) - data between Controller and Service layers
3. Service - Contains the business logic
4. Repository (DAO - Data Access Object) - handles DB crud operations
5. Model - represents data in business logic  
6. Entity - maps db table

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


`@RequestMapping(value = "/hello", method = RequestMethod.GET, params = "name", headers = "Content-Type=application/json",  consumes = "application/json", produces = "application/json", name = "HelloEndpoint")`


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

## Custom validator  
1. Define annotation  
```java
@Constraint(validatedBy = MyCustomValidator.class)
@Target({ ElementType.METHOD, ElementType.FIELD })
@Retention(RetentionPolicy.RUNTIME)
public @interface MyCustomConstraint {
    String message() default "Invalid value";
    Class<?>[] groups() default {};
    Class<? extends Payload>[] payload() default {};
}
```
2. Create the Validator Class  
```java
public class MyCustomValidator implements ConstraintValidator<MyCustomConstraint, String> {
    @Override
    public boolean isValid(String value, ConstraintValidatorContext context) {
        // Custom validation logic
        if (value == null) {
            return false;
        }
    }
}
```
3. Use annotation  
```java
 @NotNull
    @MyCustomConstraint
    private String myField;
```


**Two types of Response @RestController**:  
1.Add Jackdon-bind pom.xml, just return object list  
2.use ResponseEntity<> class - ex: return new ResponseEntity<>(ResBody,HttpCode);  


**File upload:**

```java
@POST
@Consumes(MediaType.MULTIPART_FORM_DATA)
public Response uploadFile(@FormDataParam("file") InputStream uploadedInputStream,@FormDataParam("file") FormDataContentDisposition fileDetail){}
```




## Configuring spring MVC  
- Follows MVC design pattern  

1. XML-Based Configuration -  Load xml bean defination. 
2. Java-Based Configuration - @ComponentScan. 
3. Annotation-Based Configuration - Read @Bean Method signature. 


**1. Configure pom.xml**: add dependency spring-webmvc  

**2. Configure web.xml**

```xml
<web-app>
  <welcome-file-list>
    <welcome-file>index.html</welcome-file>
    <welcome-file>index.jsp</welcome-file>
  </welcome-file-list>	
  
  <!-- servelet declaration -->
  <servlet>
    <servlet-name>dispatcher</servlet-name>
    <servlet-class>org.dispatcher-servlet.xml</servlet-class>
  </servlet>
  
  <!-- servelet declaration, doing servlet mapping -->
  <servlet-mapping>
    <!-- servlet-name + (-sevlet.xml) will get search inside WEB-INF folder-->	
    <servlet-name>dispatcher</servlet-name>
    <url-pattern>/</url-pattern>
    <!-- if >=0 it's create while deployed in server, if <0 then it'll created while someone try to access-->
    <load-on-startup>1</load-on-startup>
    <init-param>
    	<param-name>contextConfigLocation</param-name>
    	<param-value>WEB-INF/customised-frontcontroller-name.xml</param-value>
    </init-param>	
  </servlet-mapping>
  
  <init-param>
    <param-value></param-value>
    <param-value></param-value>
  </init-param>
</web-app>
```

**2a.DispatcherServletInitializer.java** add pom.xml dependency servlet-api

```java
public class DispatcherServletInitializer implments abstractAnnotationConfigDispatcherServletInitializer{
	@Override
	protected Class<?>[] getRootConfigClasses(){
		return null;
	}
	@Override
	protected Class<?>[] getServletConfigClasses(){
		return new Class[]{DispatcherServlet.class};
	}
	@Override
	protected String[] getServletMapping(){
		return new String[]{"/"};
	}
}
```

**3. Configure dispatcher-servlet.xml**

```xml
<beans>
  <context:component-scan base-package="com.controller">
  <mvc:annotation-driven>
  <bean class="org.springframework.web.servlet.view.InternalResourceViewResolver">
    <property name="prefix" value="/WEB-INF/">
    <property name="suffix" value=".jsp">
  </bean>
</beans>
```

**3a. DispatcherServlet.java**

```java
@Configuration
@EnableWebMvc //it is <mvc:annotaion-driven/>
@ComponentScan(basePackages="org.myApp")
public class DispatcherServlet(){
	@Bean
	public ViewResolver viewResolver(){
		InternalResourceViewResolver viewResolver = new InternalResourceViewResolver();
		viewResolver.prefix("WEB-INF/view/");
		viewResolver.suffix(".jsp");
		return viewSolver;
	}
}
```

**4. Create controller class**

```java
@Controller  
public class HelloController {  
@RequestMapping("/display")  
    public String display()  
    {  
        return "index";  
    }     
}  
```

---

**HANDLER MAPPING**:- Helps to choose controller
1. BeanNameUrlHandlerMapping
2. SimpleUrlHandlerMapping
3. ControllerClassNameHandlerMapping
4. DefaultAnnotationHandlerMapping 
	
**VIEW RESOLVER**:- Maps view name to actual views
1. InternalBasedViewResolver
2. XmlViewResolver
3. ResourceBundleViewResolver
4. UrlBasedViewResolver
5. VelocityViewResolver
      
**Model interface:**

```java
public String display(Model m){
  m.addAllAttributes(Collection<?> arg);
  m.addAttribute("attributeName",attributeValue);
  return "pageName";
}

```

**ModelAndView class:**

```java
public ModelAndView display(){
  ModelAndView m = new ModelAndView("pageName");
  m.addObject("objectName",objValue);
  return m;
}
```

---

### Annotaions:  
1. **@Controller** - 	indicates class as a web request handler.
			it consists of @Component,@Target(value=TYPE),@Retention(value=RUNTIME),@Documented	
2. **@RequestMapping** - handles http request and map to controler methods(or class) 

```java
@RequestMapping(value={"/display","/show"})   //handles multiple url
@RequestMapping(method = RequestMethod.GET)   //handles based on http get,post,delete,put,patch
@RequestMapping()                             //handles default url
@GetMapping(value=".display")                 //shortcuts. also use PostMapping,PutMapping,DeleteMapping,PatchMapping
```

3. **@RequestParam** - get request parameters

```java
@RequestMapping(value = "user") 
String display(@RequestParam("id") String personId)       //id will come in post parameters
String display(@RequestParam(value="id",required = false, defaultValue = "John") String personId)
```

4. **@PathVariable** - extracts value from url

```java
@RequestMapping(value = "user/{id}") 
String display(@PathVariable("id") String personId)      
```

5. **@SessionAttribute**:

6. **@Qualifier("beanName")**: avoid ambiguity




## for java config class

> A Java class that uses annotations to configure and manage Spring beans and their dependencies, providing a type-safe and more maintainable alternative to XML-based configuration.



1. Add maven dependency

2. Configure Web Application Initializer:
3. Create a class that extends AbstractAnnotationConfigDispatcherServletInitializer to replace web.xml.
```java
public class DispatcherServletInitializer extends AbstractAnnotationConfigDispatcherServletInitializer {

    @Override
    protected Class<?>[] getRootConfigClasses() {
        return null;
    }

    @Override
    protected Class<?>[] getServletConfigClasses() {
        return new Class[]{WebConfig.class};
    }

    @Override
    protected String[] getServletMappings() {
        return new String[]{"/"};
    }
}

```
3. Configure dispatcherservelet
```java
@Configuration
@EnableWebMvc // Equivalent to <mvc:annotation-driven/>
@ComponentScan(basePackages = "com.controller") // Scans for components (e.g., @Controller)
public class WebConfig implements WebMvcConfigurer {

    @Bean
    public ViewResolver viewResolver() {
        InternalResourceViewResolver viewResolver = new InternalResourceViewResolver();
        viewResolver.setPrefix("/WEB-INF/views/");
        viewResolver.setSuffix(".jsp");
        return viewResolver;
    }

    @Bean
    public DataSource dataSource() {
        HikariConfig config = new HikariConfig();
        config.setDriverClassName("com.mysql.cj.jdbc.Driver");
        config.setJdbcUrl("jdbc:mysql://localhost:3306/mydatabase");
        config.setUsername("myuser");
        config.setPassword("mypassword");
        config.setMaximumPoolSize(10);
        return new HikariDataSource(config);
    }

    @Bean
    public JdbcTemplate jdbcTemplate(DataSource dataSource) {
        return new JdbcTemplate(dataSource);
    }

    @Bean
    public DataSourceTransactionManager transactionManager(DataSource dataSource) {
        return new DataSourceTransactionManager(dataSource);
    }
}
```
remainings steps are same 