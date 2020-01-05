**Annotaion**: special label, provide metadata
1. create configuration class
```
@Configuration
@ComponentScan("com.controller")
class Config(){
    @Bean
    Class1 class1(){
      return new Class1();
    }
}
```
2. create & retrieve annotation container
```
AnnotaionConfigApplicationContext context = new AnnotaionConfigApplicationContext(Config.class);
context.getBean("class1", Class1.class);
```

**Annotaions Injection**:
1. Constructor injection
```
    @Autowired
    ClassName(Class2 class2){
       this.class2 = class2. 
    }
```
2. Setter(method) injection -  we can use on any method
```
    @Autowired
    void setClass2(Class2 class2){
       this.class2 = class2. 
    }
```
3. Field injection
```
    @Autowired
    Class2 class;
```

**Various other Annotations**:

**Qualifier**: remove ambiquity of bean name
```
@Autowired
@Qualifier("beanId")
```
**Component**: define the class as bean ```@Component```

**Init-method**: ```@PostContruct```

**Destroy-method**: ```@PreDestroy```
