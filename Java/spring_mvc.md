- follows MVC design pattern

**1. Configure web.xml**
```
<web-app>
  <servlet>
    <servlet-name>dispatcher</servlet-name>
    <servlet-class>org.dispatcher-servlet.xml</servlet-class>
  </servlet>
  <servlet-mapping>
    <servlet-name>dispatcher</servlet-name>
    <url-pattern>/</url-pattern>
  </servlet-mapping>
  <init-param>
    <param-value></param-value>
    <param-value></param-value>
  </init-param>
</web-app>
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
