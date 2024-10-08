# Spring AOP  

> Aspects of programming means cross cutting concerns. 

Note: we should use @EnableAspectJAutoProxy before @Configuration file. 
`<aop:aspectj-autoproxy>` in xml config file          

## Defination
Aspect: class which define pointcuts and advices  
Advice: behaviour that executes at join point. 
Join point : argument value of the aop method
Pointcut: expression language of AOP that matches join points, enable reuse of pointcut



**@Aspect** - declare class   

### Advice
> Advice represents an action taken by an aspect at a particular join point. 

#### Types of Advice:  
1. @Before - run before method. 
2. @After - run after method. 
3. @AfterReturning - run after method(if success). `void afterReturningMethod(Object result)`
4. @AfterThrowing - run after method(if exception). `void afterThrowingMethod(Exception ex)`
5. @Around - run after and before method (using joinpoint.proceed()). `void aroundMethod(ProceedingJoinPoint jp)`

```java
@Aspect
@Component
public class AOPsample {
  @Around("execution(public void org.controller.display())")
  void aroundMethod(ProceedingJoinPoint jp){
    Object[] args = jp.getArgs();
    sysout("before execution of function");
    Object result = jp.proceed(args);   //method executes
    sysout("after execution of function");
  }
}
```


### @Pointcut 

> expression language of AOP that matches join points, enable reuse of pointcut

```java
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

```java
public void display(JointPoint jointPoint){
  MethodSignature methodSig = (MethodSignature) jointPoint.getSignature();
  Object[] args = joinPoint.getArgs();  //get arguements 
}
```

### LOGGER. 
```java
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
```java
public class SecurityWebApplicationInitializer extends AbstractSecurityWebApplicationInitializer {
}
```
2. create SecurityConfig.java. 
```java
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
