**AOP** : Aspects of programming means cross cutting concerns

Note: we should use @EnableAspectJAutoProxy before @Configuration file.

**@Aspect** - declare class 

**Types of Advice:**
1. @Before - 
2. @AfterReturning
3. @AfterThrowing
4. @AfterFinally
5. @AroundAdvice
@Before("execution(public void org.controller.display())")

**@Pointcut**: enable reuse of pointcut
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
**@Order** : gives order of execution to aspect class

**Access method details**:
```
public void display(JointPoint jointPoint){
  MethodSignature methodSig = (MethodSignature) jointPoint.getSignature();
  Object[] args = joinPoint.getArgs();  //get arguements 
}

```
