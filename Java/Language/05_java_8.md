
# Features of Java 8:  

1. [Lambda Expression](#1-Lambda-expression)
2. [Method reference](#2-method-reference)
3. [Optional](#3-optional)
4. [Functional interface](#4-functional-interface)
5. [Default Method](#5-default-method)
6. [Stream API](#6-stream-api)
7. [Date time API](#7-date-time-api)
8. [StringJoiner class](#8-stringjoiner-class)

### 1. Lambda Expression   
- implementation of functional interface or to use less code    
**Syntax**: ```(argument-list) -> {body}```
Some lambda expression:    
a) foreach: list.foreach(x){sysout(x)};  
b) Predicate<?>  test()  
c) IntFunction(int value)


### 2. Method reference   
- able to assign a method/constructor to functional interface   
i) staticMethod reference - className::Method  
ii) InstanceMethod reference - objectName::Method   
iii) constructor reference - className:: new   
```
class Hello{
  public static void main(String[] args){
    // Normal lampda expression  	
    BiFunction<Integer, Interger, Double> biFunction = (x1, x2) -> (x1 + x2).doubleValue();
    
    // Using Static Method reference  
    BiFunction<Integer, Interger, Double> biFunction = Hello::addNumbers;
    biFunction.apply(3,4);
    
    // Using Constructor reference
    PersonFactory personFactory = Person::new;
    Person personObj = personFactory.create("John", 30);

    // Using Instance method reference
    BiFunction<Integer, Interger, Double> biFunction = personObj::addNumbers;
    biFunction.apply(3,4);

  }
  private static Double addNumbers(Interger a, Interger b){
    return a+b.doubleValue();	
  }
  Hello(String name, int age) {
        this.name = name;
        this.age = age;
    }
}
@FunctionalInterface
interface PersonFactory {
    Person create(String name, int age);
}
```

### 3. Optional   
- forcing the caller to handle the null check, this is achieved by wrapping the value with Optional  
uses to avoid NullpointerException smartly   
```
Optional<String> getName(){
  return Optional.ofNullable(this.name);
}
Optional<String> checkNull = getName();  
if (checkNull.isPresent()) { sysout(str)} 
String name = checkNull.orElse("hii");
String name = checkNull.orElseGet(() -> getRandomName());
checkNull.ifPresent((x)->{  });
checkNull.ifPresentOrElse((x)->{  }, ()->{ });
```

### 4. Functional interface   
should have only one abstract method. Eg:Runnable @Comparator .   
-can have default and static method with body  
-use @FunctionalInterface and make any interface as Functional interface  

### 5. Default Method   
default has method body and also static method allowed inside interface  

### 6. Stream API
- stream means a continuos flow of data.  

| Source Operation                              | Defination                  |
|-----------------------------------------------|-----------------------------|
| list.stream()                                 | Collection stream           |
| list.parallelStream()                         | Parallel collection stream  |
| Arrays.stream(arr) or Stream.of(arr)          | Array stream                |
| str.chars()                                   | Character code stream       |
| Stream.empty()                                | Empty stream creation       |
| Stream.generate(()->{return 'raj'}).limit(5)  | infinite stream generation  |
| Stream.iterate(1, n -> n + 1).limit(5);       | Unary operator stream       |
| Files.lines(Paths.get("path"));               | File lines stream           |

| Intermediate Operation    | Definition                            |
|---------------------------|---------------------------------------|
| `map()`                   | Transform each element.               |
| `filter()`                | Select elements based on a predicate. |
| `distinct()`              | Remove duplicate elements.            |
| `sorted()`                | Sort elements.                        |
| `limit()`                 | Limit the number of elements.         |
| `skip()`                  | Skip a specified number of elements.  |
| `flatMap()`               | Map and flatten elements.             |



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
<style>body{background-color:#1e1e1e;color:#d4d4d4}h1,h2,h3,h4,h5,h6{color:#e6e6e6}p{color:#d4d4d4}a{color:#4ec4e4}pre{background-color:#2b2b2b;color:#d4d4d4;border:1px solid #3a3a3a;padding:10px;overflow-x:auto}code{background-color:#2b2b2b;color:#d4d4d4;padding:2px 4px;border-radius:4px}.markdown-body table tr,.markdown-body table tr:nth-child(2n){background-color:#333}.highlight{background-color:#333}.markdown-body .highlight pre, .markdown-body pre{background-color:#555}ul,ol{color:#d4d4d4}blockquote{background-color:#333;color:#d4d4d4;padding:10px;margin:0}hr{border-color:#444}table{border-collapse:collapse;width:100%}th,td{border:1px solid #444;padding:8px}th{background-color:#2b2b2b;color:#d4d4d4}img{filter:invert(1)}</style>