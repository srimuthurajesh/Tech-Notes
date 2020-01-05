**IOC** - is a container, at core of spring framework, create object, wire them, manage them, configure them
1. Bean factory - lazy intialization, no annotated injection support
2. Application context - aggresive intialization, supports annotated injection
 
 - FileSystemXmlApplicationContext\
      ```ApplicationContext context = new FileSystemXmlApplicationContext("file.xml");```\
       ```Employee employee = (Employee) context.getBean("employee");```
- ClassPathXmlApplicationContext - no need full path, but need to CLASSPATH properly\
- WebXmlApplicationContext - will load bean from within the web application

**Steps to create spring bean**:
1. Configure spring bean xml
      ```
      <bean id="beanId" class="com.ClassName">
      </bean>
      ```
2. Create spring container
      ```
      ClassPathXmlApplicationContext context = new ClassPathXmlApplicationContext("bean.xml");
      ```
3. Retrieve bean from container
      ```
       ClassName obj = context.getBean("beanId",ClassName.class);
       InterfaceName obj = context.getBean("beanId",InterfaceName.class);  
      ```
**XML constructor injection**:
1. create constructor injector
  ```
  class ClassName{
    Class2 class2;
    ClassName(Class2 class2){
        this.class2 = class2;
    }
  }
  ```
 2. create xml file
 ```
  <bean id="class2Id" class="com.Class2">
  </bean>
  <bean id="beanId" class="com.ClassName">
    <constructor-arg ref="class2Id">
  </bean>
 ```
 **XML setter injection**:
1. create constructor injector
  ```
  class ClassName{
    Class2 class2;
    void setClass2(Class2 class2){
        this.class2 = class2;
    }
  }
  ```
 2. create xml file
 ```
  <bean id="class2Id" class="com.Class2">
  </bean>
  <bean id="beanId" class="com.ClassName">
      <property name="class2" ref="class2Id">
  </bean> 
```
**XML literal injection**
```
  <bean id="beanId" class="com.ClassName">
      <property name="email" value="sri@gmail.com">
  </bean>
```
**XML property file injection**
1. create properties file
```
foo.email=raj@gmail.com
foo.age=25
```
2. Mention in bean xml
```
<context:property-placeholder location="user.properties">
<bean id="beanId" class="com.ClassName">
  <property name="email" value="${foo.email}">
  <property name="age" value="${foo.age}">
</bean>
```

**Bean scope**:
```
<bean id="" class="" scope="singleton">
<bean id="" class="" scope="prototype">
```
**Bean lifecycle**:
```
<bean id="" class="" init-method="" destroy-method=""> 
```
**Enable Annotaion support**
```
<context:annotation-config />
```
