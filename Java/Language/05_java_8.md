
# Features of Java 8:  
### 1. Lamdbda Expression   
(arg)->{body}    
Anonymous method to implement functional interface  
	a) foreach: list.foreach(x){sysout(x)};
	b) Predicate<?>  test()
 
### 2. Method reference :   
short versions of lambda expression   
assigning a method to functional interface   
	i) staticMethod reference - className::Method  
	ii) InstanceMethod reference - objectName::Method   
	iii) constructor reference - className:: new   
```
class Hello{
  public static void main(String[] args){
    //Normal lamdpa expression  	
    BiFunction<Integer, Interger, Double> biFunction = (x1, x2) -> (x1 + x2).doubleValue();
    // Using method reference  
    BiFunction<Integer, Interger, Double> biFunction = Hello::addNumbers;
    biFunction.apply(3,4);
  }
  private static Double addNumbers(Interger a, Interger b){
    return a+b.doubleValue();	
  }
```

### 3. Optional  -   
avoid NullpointerException smartly  

### 4. Functional interface  -   
should have only one abstract method. Eg:Runnable @Comparator .   
-can have default and static method with body  
-use @FunctionalInterface and make any interface as Functional interface  

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

