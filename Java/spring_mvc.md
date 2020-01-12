- follows MVC design pattern
**Configure web.xml**
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
