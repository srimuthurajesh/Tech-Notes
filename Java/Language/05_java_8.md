
# Features of Java 8:  
### 1. Lamdbda Expression   
(arg)->{body}    
Anonymous method to implement functional interface  
	a) foreach: list.foreach(x){sysout(x)};  
	b) Predicate<?>  test()  
	c) IntFunction(int value)
 
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
```
Optional<String> checkNull =  Optional.ofNullable(str);  
if (checkNull.isPresent()) { sysout(str)} 
```
### 4. Functional interface  -   
should have only one abstract method. Eg:Runnable @Comparator .   
-can have default and static method with body  
-use @FunctionalInterface and make any interface as Functional interface  

### 5. Default Method -   
default has method body and also static method allowed inside interface  

### 6. Stream API
-process collections  
#### Source operations:
1. Stream<Int> intStream = listInt.stream();  

#### Intermediate Operations:
1. map: returns a stream consists results of applying the given function    
 ```List square = listNumber.stream().map(x->x*x).collect(Collectors.toList());```  
2. filter: select elements as per the Predicate passed as argument.    
```List result = listNames.stream().filter(s->s.startsWith("S")).collect(Collectors.toList());```    
3. sorted: The sorted method is used to sort the stream.  
```List result = listNames.stream().sorted().collect(Collectors.toList());```    

#### Terminal Operations:  
1. collect: return the result      
```Set square = number.stream().map(x->x*x).collect(Collectors.toSet());```       
2. forEach: iterate through every element of the stream.  
```number.stream().map(x->x*x).forEach(y->System.out.println(y));```        
3. reduce: reduce elements stream to a single value. it takes a BinaryOperator as a parameter.     
```int even = number.stream().filter(x->x%2==0).reduce(0,(ans,i)-> ans+i);```      



Reducing for loop code using **IntStream**  ```int sumValue = IntStream.rangeClosed(0,4).sum(); ```  
Remove duplicates using stream ```List<String> uniqueList = names.stream().distinct().collect(Collectors.toList());```  

### 7. Date time API  
-thread-safe: removed setters of Date api  
-new operations - added new methods for Date api  

