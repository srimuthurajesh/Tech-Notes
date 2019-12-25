Java SE\
Java EE - servelets, web projects\ 
Java ME\

```
class MyServlet extends HttpServlet{
  public void service(HttpServletRequest req,HttpServletResponse res){
    int i = Integer.parseInt(req.getParameter("i"));
    int j = Integer.parseInt(req.getParameter("j"));
    k = i + j;
    PrintWriter output = res.getWriter();
    out.println(k);
  }
}
```
