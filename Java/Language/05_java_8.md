
# Features of Java 8:  
### 1. Lamdbda Expression  (arg)->{body}  
	a) foreach: list.foreach(x){sysout(x)};
 
### 2. Method reference :   
shortcut to lambda expression    
	i) staticMethod reference - className::Method  
	ii) InstanceMethod reference - objectName::Method   
	iii) constructor reference - className:: new   

### 3. Optional  -   
avoid NullpointerException smartly  

### 4. Functional interface  -   
have only on abstract method inside interface. Eg:Runnable  @FunctionInterface . can have default and static method with body
### 5. Default Method -   
default has method body and also static method allowed inside interface  
### 6. Stream API
1. Reducing for loop code using **IntStream**  
 ```
int sumValue = IntStream.rangeClosed(0,4).sum();
 ```
2. Remove duplicates using stream  
```
List<String> names = Array.asList("raj","sam","raj");
List<String> uniqueList = names.stream().distinct().collect(Collectors.toList());
```

### 7. Date time API  

