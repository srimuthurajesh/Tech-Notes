Java SE\
Java EE servelets, web projects\
Java ME

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
<xml>
<web-app>
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

service() - handle both get post\
doGet() - handle get method\
doPost() - handle post method\


**Call servlet from another servlet:**
``` 
    req.setAttribute("a","3");   //use res.getAttribute("a"); in another servlet
    RequestDispatcher rd = req.getRequestDispatcher("anotherServeletName"); 
    rd.forward(req,res); 
```

**Redirect**:
```
req.setAttribute("a","3");   //use res.getAttribute("a"); in another servlet 
req.sendRedirect("servletName");  // in browser url get changed
```

**Session**:
```
HttpSession session = res.getSession();
session.setAttribute("K","3");
session.setAttribute("k");
session.removeAttribute("k");
```

**Cookies**
```
Cookie cookie = new Cookie("k",k);
res.addCookie(cookie);
Cookie cookie[] = res.getCookies();
```

**ServletContext**
```
<context-param>
  <param-name>username</param-name>
  <param-value>muthu</param-value>
</context-param>  

ServletContext ctx = getServletContext();
String username = ctx.getInitParameter("username");
```
**ServletConfig**
```
<servlet>
  <servlet-name>add</servlet-name>
  <servlet-class>com.AddServlet</servlet-class>
  <init-param>
    <param-name>username<param-name>
    <param-value>muthu<param-value>
  </init-param>
</servlet>
ServletConfig ctx = getServletConfig();
String username = ctx.getInitParameter("username");
```

**Annotations** :
@WebServlet("/url")
