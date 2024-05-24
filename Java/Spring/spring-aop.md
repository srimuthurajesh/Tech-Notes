# Spring AOP  

> Aspects of programming means cross cutting concerns. 

Note: we should use @EnableAspectJAutoProxy before @Configuration file. 
```<aop:aspectj-autoproxy>``` in xml config file          

**@Aspect** - declare class   

### Types of Advice:  
1. @Before - run before method. 
2. @AfterReturning - run after method(if success). 
3. @AfterThrowing - run after method(if exception). 
4. @AfterFinally - run after method(both success/exception). 
5. @Around - run after and before method (using joinpoint.proceed()). 

```
@Around("execution(public void org.controller.display())")
void aroundMethod(JointPoint jp){
  Object[] args = jp.getArgs();
  sysout("before execution of function");
  Object result = jp.proceed(args);   //method executes
  sysout("after execution of function");
}
```

### @Pointcut 

> enable reuse of pointcut

```
@Pointcut("execution(public void org.controller.display())")
void reuseMethod(){}
@Before("reuseMethod()")
void methodName2(){
}
@Before("reuseMethod()")
void methodName3(){
}
```
### @Order 
> gives order of execution to aspect class

### Access method details. 

```
public void display(JointPoint jointPoint){
  MethodSignature methodSig = (MethodSignature) jointPoint.getSignature();
  Object[] args = joinPoint.getArgs();  //get arguements 
}
```

### LOGGER. 
```
 private Logger log = Logger.getLogger(getClass().getName());
 log.info("log message");
 log.fatal("log message");
 log.debug("log message");
 log.error("log message");
 log.warn("log message");
 log.trace("log message");
```

### Spring security. 
1. Create SecurityWebApplicationInitializer.java. 
```
public class SecurityWebApplicationInitializer extends AbstractSecurityWebApplicationInitializer {
}
```
2. create SecurityConfig.java. 
```
@Configuration
@EnableWebSecurity
public class DemoSecurityConfig extends WebSecurityConfigurerAdapter {	
	@Override
	protected void configure(AuthenticationManagerBuilder auth) throws Exception {
		auth.inMemoryAuthentication().withUser("john").password("secret123").roles("EMPLOYEE");
		auth.inMemoryAuthentication().withUser("mary").password("secret123").roles("MANAGER");
  }
}
```
