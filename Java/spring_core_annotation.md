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
