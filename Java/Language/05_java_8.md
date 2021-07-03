
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
-wrapping around the object  
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
2. Arrays.stream(arr) or Stream.of(arr);   
3. str.chars()   //return IntStream, contains integer code point values of the characters in the string object

#### Intermediate Operations:
1. map: returns a stream consists results of applying the given function    
 ```List square = listNumber.stream().map(x->x*x).collect(Collectors.toList());```  
2. filter: select elements as per the Predicate passed as argument.    
```List result = listNames.stream().filter(s->s.startsWith("S")).collect(Collectors.toList());```    
3. sorted: The sorted method is used to sort the stream.  
```List result = listNames.stream().sorted().collect(Collectors.toList());```
sorted()  
sorted(Collections.reverseOrder())  
sorted(Comparator.comparingInt(User::getAge))    
```
.sorted(new Comparator<User>() {
            @Override
            public int compare(User o1, User o2) {
                if(o1.getAge() == o2.getAge())
                    return o1.getName().compareTo(o2.getName());
                else if(o1.getAge() > o2.getAge())
                    return 1;
                else return -1;
            }
        })   
```

4. distinct: works for predefined datatype  
```List result = age.stream().distinct().collect(Collectors.toList());```    
5. limit()  
6. skip() - skip upto given index   

#### Terminal Operations:  
1. collect: return the result       
   	a) Collecters.toList    
	b) Collecters.joining("deLimiter")    
	c) Collectors.groupBy(obj::getYear)   //wil return map<int, obj>    
	d) Collectors.averagingInt(obj::getYear)  //will return double  
	e) Collectors.partitioningBy(m-> m.getRating() > 3)   //will return map<boolean, obj>  
```Set square = number.stream().map(x->x*x).collect(Collectors.toSet());```       
2. forEach: iterate through every element of the stream.  
```number.stream().map(x->x*x).forEach(y->System.out.println(y));```   
normal print usage ```list.forEach((k,v)->sysout(k))```       
3. reduce: reduce elements stream to a single value. it takes a BinaryOperator as a parameter.     
```int even = number.stream().filter(x->x%2==0).reduce(0,(ans,i)-> ans+i);```      
4. toArray: return array of streams  
5. min(), max(), count()  
6. findFirst()       


### 7. Date time API  
-thread-safe: removed setters of Date api  
-new operations - added new methods for Date api  

### 8. StringJoiner class
```
StringJoiner str = new StringJoiner(",","[","]"); 	//delimiter, prefix, suffix
str.add("muthu").add("rajesh");    // Output : [muthu,rajesh]
```
#### Stream problems examples  
1. Reducing for loop code using **IntStream**    
```int sumValue = IntStream.rangeClosed(0,4).sum(); ```  
2. Remove duplicates using stream   
```List<String> uniqueList = names.stream().distinct().collect(Collectors.toList());```    
3. Get age greater than 10:   
```list.stream().filter(x->x.getAge()>10).foreach(x->System.out.println(x.getName()))```  
4. Get maximum age :   
```
int maxAge = list.stream().map(x=>x.getAge).max(Integer::compare).get();
list.stream().filter(x->x.getAge==maxAge).foreach(x->System.out.println(x.getName()));
```    
5. Get Average of Array
```
OperationalDouble avg = Arrays.stream(arr).average();
avg.getAsDouble();  
```
6. Join two array using Stream  
```
String[] str = {"a","b"}; String[] str1 = {"c","d"};
Stream.concat(Arrays.stream(str),Arrays.stream(str1)).toArray(size->new String[size]);
```
7. Count the particular chars from string  
```
String name= "rajesh";
name.chars().filter(x->x=='a').count();
```
8. Print object greater than some attreibute  
```
list.stream().filter(i->i<40).collect(Collectors.toList());
```
9. List by frequency
```

```
