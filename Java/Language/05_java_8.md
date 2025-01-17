
# Features of Java 8:  

1. [Default Method](#default-method)
2. [Functional interface](#functional-interface)
3. [Lambda Expression](#lambda-expression)
4. [Method reference](#method-reference)
5. [Optional](#optional)  
7. [StringJoiner class](#stringjoiner-class)
8. [Stream API](#stream-api)
  - [Stream problems examples](#stream-problems-examples)
9. [Java11](#java11)
10. [Java versions & features](#java-version--features)


## Default Method   
> allows interface method to have body

Note: for static method, implementation allowed inside interface  

## Functional interface   
> should have only one abstract method ie one functionality.   
Ex:Runnable @Comparator .   

- can have default and static method with body  
- use @FunctionalInterface and make any interface as Functional interface  

| Interface           | arg | return  | Method    | Example                                                               |
|---------------------|-----|---------|-----------|-----------------------------------------------------------------------|
| `Function<T,R>`     | 1   | 1       | .apply()  | Function<String, Integer> lengthFunction = str -> str.length();       |
| `BiFunction<T,U,R>` | 2   | 1       | .apply()  | BiFunction<Integer, Integer, Integer> sumFunction = (a, b) -> a + b;  |
| `UnaryOperator<T>`  | 1   | 1 same  | .apply()  | UnaryOperator<Integer> squareFunction = x -> x * x;                   |
| `BinaryOperator<T>` | 2   | 1 same  | .apply()  | BinaryOperator<String> concatFunction = (a, b) -> a + b;              |
| `Predicate<T>`      | 1   | 1 bool  | .test()   | Predicate<Integer> isEven = num -> num % 2 == 0;                      |
| `BiPredicate<T>`    | 2   | 1 bool  | .test()   | BiPredicate<String, String> areEqual = (a, b) -> a.equals(b);         |
| `Consumer<T>`       | 1   | no      | .accept() | Consumer<String> printConsumer = str -> System.out.println(str);      |
| `BiConsumer<T,U>`   | 1   | no      | .accept() | BiConsumer<String, String> printTwoStrings = (a, b) -> Sysout(a+""+b);|
| `Supplier<T>`       | no  | 1       | .get()    | Supplier<Double> randomSupplier = () -> Math.random();                |

**Primitive Specializations**:
generics not needed, applies for all above functions  
Ex: IntFunction<R>, LongFunction<R>, DoubleFunction<R>

## Lambda Expression   
> anonymous function implements functional interface

Syntax: `(argument-list) -> {body}`
**Legacy Anonymous class**: 
```java
interface Action { void execute(); } 
Action action = new Action() {
    @Override
    public void execute() {
        System.out.println("Action executed!");
    }
};
```

## Method reference   
>  can refer existing method implementations as lambdas, using `::`.   

i) staticMethod reference - className::Method  
ii) InstanceMethod reference - objectName::Method   
iii) constructor reference - className::new   
```java
class Person{
  public static void main(String[] args){
    // Using Instance method reference
    BiFunction<Integer, Interger, Double> biFunction = personObj::addNumbers;
    biFunction.apply(3,4);
  }
  Double addNumbers(Interger a, Interger b){
    return a+b.doubleValue();	
  }
}
```

## Optional   
> forcing the caller to handle the null check, this is achieved by wrapping the value with Optional class. 

- uses to deal with NullpointerException smartly   

**Creation Methods:**  

| Methods     | Code                          | Description                     |
|-------------|-------------------------------|---------------------------------|
| of()        | `Optional.of("Hello");`       | throws NullPointerException if value is null |
| ofNullable()| `Optional.ofNullable(a.name);`| return Optional<Null> if value is null|
| empty()     | `Optional.empty()`            | Returns empty Optional          |

**Conditional Methods:**  

| Methods     | Code                          | Description                     |
|-------------|-------------------------------|---------------------------------|
| isPresent() |	`optionalObj.isPresent()`     |	Checks if value is present      |
| isEmpty()	  | `optionalObj.isEmpty()`       | (Java 9)similar to !isPresent() |

**Transformation Methods:**

| Methods     | Code                                      | Description                     |
|-------------|-------------------------------------------|---------------------------------|
| get()	      | `optionalObj.get()`	                      | Throws **NoSuchElementException** if value not present |
| orElse()	  | `optionalObj.orElse(val)`	                | provided default value if value not present|
| orElseGet()	| `optionalObj.orElseGet(supplier)`         |	value obtained from supplier function, if value not present |

**Consumption Methods:**

| Methods     | Code                                      | Description                     |
|-------------|-------------------------------------------|---------------------------------|
| ifPresent() | `optionalObj.ifPresent(consumer)`         |	execute consumer function if value present |
| ifPresentOrElse() | `optionalObj.ifPresent(consumer, supplier)` |	(Java 9) execute consumer function if value present |


## StringJoiner class
```java
StringJoiner str = new StringJoiner(",","[","]"); 	//delimiter, prefix, suffix
str.add("muthu").add("rajesh");    // Output : [muthu,rajesh]
```

## Stream API
> helps to process sequences of elements   

- enabling functional programming ie.Processing data with functions. 
- **Stream**: means a continuos flow of data, immutable  

#### Source Operations

| Source Operation          | description                   |
|---------------------------|-------------------------------|
| `collectionObj.stream()`  | Stream from collection object |
| `mapObj.entrySet.stream()`| Stream from collection Map    |
| `Arrays.stream(array)`    | generate IntStream,DoubleStream,LongStream |
| `str.chars().stream()`    | need to use mapToObj(c->(Char)c) |
| `Stream.empty()`          | return empty stream|

#### Intermediate Operation

| Operation        | Definition                            |
|------------------|---------------------------------------|
| `map()`          | Transform each element.               |
| `filter()`       | Select elements based on a predicate. |
| `flatMap()`      | combination of flat&map, convert stream of stream into single stream |
| `flatMapToInt()` | converting nested primitive arrays into a single stream of primitives  |
| `flatMapToObj()` | convert primitive to object  |
| `distinct()`     | Remove duplicate for primitive datatypes |
| `sorted()`       | Sort elements.                        |
| `limit(5)`       | Limit the number of elements.         |
| `skip()`         | Skip upto given index                 |
| `boxed()`        | convert premitive stream into wrapped type  |
| `peek()`         | used to debug stream elements         |

##### Sorted
1. sorted(Collections.reverseOrder())    
2. sorted(Comparator.comparingInt(User::getAge))    
3. sorted(Comparator.comparingInt(User::getAge).reversed())  
```java
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
#### Termination Function

| Termination Function            | Description                                         |
|---------------------------------|-----------------------------------------------------|
| `forEach(System.out::println)`  | Perform an action for each element.                 |
| `count()`                       | Count the number of elements.                       |
| `collect(Collectors.toList())`  | Collect elements into a collection.                 |
| `findFirst()`                   | return Optional so handle orElse()                  |
| `reduce((a, b) -> a + b)`       | return single value, takes BinaryOperator as param  |
| `min()`,`max()`,`average()`,`sum()`| return min/max value(only for primitive)  |
| `anyMatch()`,`allMatch()`,`noneMatch()`                    | return boolean if all element matches a predicate   |

| Collectors Function   | Description                                                                                 |
|-----------------------|---------------------------------------------------------------------------------------------|
| To Collections        | `Collectors.toList()`, `Collectors.toSet()`, `Collectors.toMap()`                           |
| Joining               | `Collectors.joining(",")`                                                                   |
| Grouping By           | `Collectors.groupingBy(obj::getYear)` `Collectors.groupingBy(Map.Entry::getValue)`          |
| Partitioning By       | `Collectors.partitioningBy(m-> m.getRating() > 3)`  //map<boolean, obj>                     |
| Averaging             | `Collectors.averagingInt()`, `Collectors.averagingDouble()`, `Collectors.averagingLong()`   |
| Summarizing           | `Collectors.summarizingInt(), Collectors.summarizingDouble()`, `Collectors.summarizingLong()`|
| Reducing              | `Collectors.reducing()` collect(Collectors.reducing(0, Integer::intValue, Integer::sum));   |
| Counting              | `Collectors.counting()`                                                                     |
| To Collections        | `toList()`, `toSet()`, `toMap()` (from Java 16)                                             |

### Grouping By
Syntax `Collectors.groupingBy(classifier, Hashmap::new, toList());`  
1. groupby attribute: `Collectors.groupingBy(obj::getYear)`.  
2. same like 1, but remove duplicates:  `Collectors.groupingBy(obj::getYear, Collectors.toSet())`.  
3. same like 2, but store in treemap: `Collectors.groupingBy(obj::getYear, TreeMap::new, Collectors.toSet())`.  
4. groupby count : `collect(Collectors.groupingBy(Function.identity(),Collectors.counting());`

##### Other Source operations
1. `Stream.of("1","b")`        
2. `Stream.builder().add(1).build()` 
3. `Stream.concat(Stream.of("A"), Stream.of("B"))`
4. `Stream.generate(random::nextInteger).limit(10)` java 10
5. `Stream.iterate(1, n -> n + 1).limit(10)` java9
6. `Stream.ofNullable(name)` java9 //return empty stream instead of null 

###### Other terminal operations
1. `findAny()`                     - Find any element (non-deterministic).               
2. `toArray(String[]::new)`        - return array                                        
3. `mapToInt()`                    - convert obj list into intstream                     
4. `summaryStatistics()`           - only for primitive streams IntStream, we can use .getMax(), getMin() etc                
5. `forEachOrdered()`                                                                  


## Stream problems examples  
1. find the sum of squares of all even numbers      
```java 
Arrays.stream(input)
      .filter(x->x%2==0)
      .map(x->x*x)
      .sum()
```

2. Find second max of student age.  
```java 
int age = list.stream()
              .sorted(Comparator.comparingInt(Employee::getSalary).reversed())
              .skip(1).findFirst();
```
5. Convert a list into map  
```java
list.stream().collect(
    Collection.toMap(Function.identity(),Function.identity()));
```

2a. Convert a matrix into stream
```java
Arrays.stream(matrixInput).flatMapToInt(Arrays::stream).boxed().collect(Collectors.toList())
```
2b. Convert intstream into objects
```java
intStream.flatMapToObj(num -> Stream.of("Number-" + num));
```
3. Find list of unique characters present in all the string.  
```java
listOfStrings.stream()
            .flatMap(str -> str.chars())
            .mapToObj(ch -> (char) ch)
            .collect(Collectors.toSet());
```



8. Sort by salary & name & primitive  
```java
employeeList.stream().sorted(Comparator.comparingInt(Employee::getSalary));
employeeList.stream().sorted(Comparator.comparing(Employee::getName), Comparator.reverseOrder());
Arrays.stream(arr).boxed().sorted(Comparator.reverseOrder());
employeeList.stream().min(Comparator.comparingInt(Employee::getSalary))
```

10. Join given list values with comma
```java
Arrays.stream(names).collect(Collectors.joining(","));
```

12. Get all departments from student obj
```java
studentList.stream().collect(Collectors.groupingBy(Student::getDept)).entrySet().stream().map(value -> value.getKey()).distinct();
studentList.stream().collect(Collectors.groupingBy(Student::getDept, Collectors.counting())).entrySet().stream().max(Map.Entry.comparingByValue()).get();
studentList.stream().collect(Collectors.groupingBy(Student::getDept,Collectors.averagingInt(Student::getAge)));
studentList.stream().collect(Collectors.groupingBy(Student::getDept,Collectors.maxBy(Comparator.comparing(Student::getDept))));
```

13. Find odd even numbers
```java
numbers.stream()
       .collect(Collectors.partitioningBy(n -> n % 2 == 0)); 
```
## Java11
1. **var**: allows the compiler to infer the type of a local variable based on the assigned value.
```java
var result = calculateSum(10, 20);
System.out.println("Sum: " + result); // Output: Sum: 30
public static int calculateSum(int a, int b) {
    return a + b;
}
```  
2. String Methods
  i) "  ".isBlank(); // true
  ii) lines: "Hello\nWorld".lines().forEach(System.out::println);  
  iii) strip(): "  Hello  ".strip(); // "Hello"   
  iv) "Hi".repeat(3); // "HiHiHi"  
3. Optional Enhancements: isEmpty(), orElseThrow()



## Java version & features
Java 8
- Lambda Expressions
- Stream API
- Date and Time API (java.time)
- Optional class
- Default and Static Interface Methods

Java 11
- HTTP Client (Standard)
- Local-Variable Syntax for Lambda Parameters
- String Improvements
- Optional HTTP/2 Client
- Enhanced Core Libraries

Java 17
- Sealed Classes and Interfaces
- Pattern Matching for instanceof
- Records
- Switch Expressions (Enhanced)
- Removed Experimental AOT and JIT Compiler

Java 21
- String Templates (Preview)
- Sequenced Collections
- Pattern Matching for switch and Record Patterns
- Virtual Threads
- Foreign Function and Memory API (Incubator)





