- Follows MVC design pattern

**1. Configure web.xml**
```
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
    <param-value>WEB-INF/customised-frontcontroller-name.xml</param-value>
  </servlet-mapping>
  
  <init-param>
    <param-value></param-value>
    <param-value></param-value>
  </init-param>
</web-app>
```
**1a.DispatcherServletInitializer.java**
```
public class DispatcherServletInitializer{
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
**2. Configure dispatcher-servlet.xml**
```
<beans>
  <context:component-scan base-package="com.controller">
  <mvc:annotation-driven>
  <bean class="org.springframework.web.servlet.view.InternalResolveViewResolver">
    <property name="prefix" value="/WEB-INF/">
    <property name="suffix" value=".jsp">
  </bean>
</beans>
```
**2a. DispatcherServlet.java**
```
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
**3. Create controller class**
```
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
```
public String display(Model m){
  m.addAllAttributes(Collection<?> arg);
  m.addAttribute("attributeName",attributeValue);
  return "pageName";
}
```
**ModelAndView class:**
```
public ModelAndView display(){
  ModelAndView m = new ModelAndView("pageName");
  m.addObject("objectName",objValue);
  return m;
}
```
---
**Annotaions**:
1. **@Controller** - 	indicates class as a web request handler.
			it consists of @Component,@Target(value=TYPE),@Retention(value=RUNTIME),@Documented	
2. **@RequestMapping** - handles http request and map to controler methods(or class) 
```
@RequestMapping(value={"/display","/show"})   //handles multiple url
@RequestMapping(method = RequestMethod.GET)   //handles based on http get,post,delete,put,patch
@RequestMapping()                             //handles default url
@GetMapping(value=".display")                 //shortcuts. also use PostMapping,PutMapping,DeleteMapping,PatchMapping
```
3. **@RequestParam** - get request parameters
```
@RequestMapping(value = "user") 
String display(@RequestParam("id") String personId)       //id will come in post parameters
String display(@RequestParam(value="id",required = false, defaultValue = "John") String personId)
```
4. **@PathVariable** - extracts value from url
```
@RequestMapping(value = "user/{id}") 
String display(@PathVariable("id") String personId)      
```
5. **@SessionAttribute**:
6. **@Qualifier("beanName")**: avoid ambiguity
