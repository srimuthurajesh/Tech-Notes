Java SE\
Java EE - servelets, web projects\ 
Java ME\

```
package myproject;
public class MyServlet extends HttpServlet{
  public void service(HttpServletRequest req,HttpServletResponse res){
    int i = Integer.parseInt(req.getParameter("i"));
    int j = Integer.parseInt(req.getParameter("j"));
    int k = i + j;
    PrintWriter out = res.getWriter();
    out.println(k);
  }
}
```
```
<?xml version="1.0" encoding="UTF-8"?>
<web-app xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns="http://java.sun.com/xml/ns/javaee" xsi:schemaLocation="http://java.sun.com/xml/ns/javaee http://java.sun.com/xml/ns/javaee/web-app_3_0.xsd" id="WebApp_ID" version="3.0">
  <display-name>myproject</display-name>
 <servlet>
 	<servlet-name>add</servlet-name>
 	<servlet-class>myproject.AddServelet</servlet-class>
 </servlet>
 <servlet-mapping>
 	<servlet-name>add</servlet-name>
 	<url-pattern>/add</url-pattern>
 </servlet-mapping>
</web-app>
```
