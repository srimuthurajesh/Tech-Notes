
# Features of Java 8:  

1. [Default Method](#5-default-method)
2. [Functional interface](#4-functional-interface)
3. [Lambda Expression](#1-Lambda-expression)
4. [Method reference](#2-method-reference)
5. [Optional](#3-optional)
6. [Date time API](#7-date-time-api)
7. [StringJoiner class](#8-stringjoiner-class)
8. [Stream API](#6-stream-api)
  - [Stream problems examples](#stream-problems-examples)
9. [Java11](#java11)

## write jaava 11 fucntionalityeis ples
## Default Method   
default has method body and also static method allowed inside interface  

## Functional interface   
> should have only one abstract method. Eg:Runnable @Comparator .   

- can have default and static method with body  
- use @FunctionalInterface and make any interface as Functional interface  

| Interface           | Structure           | Method      | Example                                                               |
|---------------------|---------------------|-------------|-----------------------------------------------------------------------|
| `Function<T,R>`     | diff type           | .apply()    | Function<String, Integer> lengthFunction = str -> str.length();       |
| `BiFunction<T,U,R>` | diff type           | .apply()    | BiFunction<Integer, Integer, Integer> sumFunction = (a, b) -> a + b;  |
| `UnaryOperator<T>`  | same type           | .apply()    | UnaryOperator<Integer> squareFunction = x -> x * x;                   |
| `BinaryOperator<T>` | same type             | .apply()    | BinaryOperator<String> concatFunction = (a, b) -> a + b;              |
| `Predicate<T>`      | 1 arg return boolean | .test()    | Predicate<Integer> isEven = num -> num % 2 == 0;                      |
| `BiPredicate<T>`    | 2 arg return boolean | .test()    | BiPredicate<String, String> areEqual = (a, b) -> a.equals(b);         |
| `Consumer<T>`       | 1 arg no return type | .accept()  | Consumer<String> printConsumer = str -> System.out.println(str);      |
| `BiConsumer<T,U>`   | 1 arg no return type | .accept()  | BiConsumer<String, String> printTwoStrings = (a, b) -> Sysout(a+""+b);|
| `Supplier<T>`       | no arg return random | .get()     | Supplier<Double> randomSupplier = () -> Math.random();                |

**Primitive Specializations**:

| Primitive int     | Primitive long     | Primitive double     |
|-------------------|--------------------|----------------------|
| IntFunction<R>    | LongFunction<R>    | DoubleFunction<R>    |
| IntConsumer       | LongConsumer       | DoubleConsumer       |
| IntPredicate      | LongPredicate      | DoublePredicate      |
| IntSupplier       | LongSupplier       | DoubleSupplier       |
| IntUnaryOperator  | LongUnaryOperator  | DoubleUnaryOperator  |
| IntBinaryOperator | LongBinaryOperator | DoubleBinaryOperator |
| ToIntFunction<T>  | ToLongFunction<T>  | ToDoubleFunction<T>  |
| ToIntBiFunction<T,U> | ToIntBiFunction<T,U> | ToIntBiFunction<T,U> |

## Lambda Expression   
> block of code that takes parameters and returns a value,   

- often used as an argument to a method or assigned to a variable.   
**Syntax**: ```(argument-list) -> {body}```


## Method reference   
>  can refer existing method implementations as lambdas, using `::`.   

i) staticMethod reference - className::Method  
ii) InstanceMethod reference - objectName::Method   
iii) constructor reference - className::new   
```
class Hello{
  public static void main(String[] args){
    // Normal lampda expression  	
      <Integer, Interger, Double> biFunction = (x1, x2) -> (x1 + x2).doubleValue();
    
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

## Optional   
- forcing the caller to handle the null check, this is achieved by wrapping the value with Optional class. 
- uses to deal with NullpointerException smartly   

### Creation Methods:

| Methods     | Code                          | Description                     |
|-------------|-------------------------------|---------------------------------|
| empty()     | `Optional.empty()`            | Returns empty Optional          |
| of()        | `Optional.of("Hello");`       | Returns Optional, throws Nullpointerexception if value null |
| ofNullable()| `Optional.ofNullable(a.name);`| if u are expecting Nullpointerexception, use this to avoid it, return Optional<Null> |
| isPresent() |	`optionalObj.isPresent()`     |	Checks if value is present      |
| isEmpty()	  | `optionalObj.isEmpty()`       | (Java 9)similar to !isPresent() |

### Transformation and Consumption Methods:

| Methods     | Code                                      | Description                     |
|-------------|-------------------------------------------|---------------------------------|
| get()	      | `optionalObj.get()`	                      | Returns value ifexist or Throws **NoSuchElementException** |
| orElse()	  | `optionalObj.orElse(val)`	                | Returns value if present or provided default value |
| orElseGet()	| `optionalObj.orElseGet(supplier)`         |	Returns value or value obtained from supplier function |
| ifPresent() | `optionalObj.ifPresent(consumer)`         |	execute consumer function if value present |
| ifPresentOrElse() | `optionalObj.ifPresent(consumer, supplier)` |	(Java 9) execute consumer function if value present |



## Date time API  
- thread-safe: removed setters of Date api  
- new operations - added new methods for Date api  

## StringJoiner class
```
StringJoiner str = new StringJoiner(",","[","]"); 	//delimiter, prefix, suffix
str.add("muthu").add("rajesh");    // Output : [muthu,rajesh]
```

## Stream API
> process sequences of elements, such as collections or arrays. 

- enabling functional programming ie.Processing data with functions. 
- **Stream**: means a continuos flow of data, immutable  

#### Source Operation 

| Source Operation          | code                    | return    |
|---------------------------|-------------------------|-----------|
| From list,set,queue,stack | collectionObj.stream()  | Stream<T> |
| From Map                  | map.entrySet.stream()   | Stream<T> |
|                           | map.keySet.stream()     | Stream<T> |
|                           | map.values.stream()     | Stream<T> |
| ParallelStream            | collObj.parallelStream()| Stream<T> |
| From Array                | Stream.of(array), Stream.of("s","a")      | Stream<T> |
| From Array                | Arrays.stream(array)    | only works for(IntStream,DoubleStream,LongStream) & **Object**(Stream<T>)|
| String Streams            | str.chars()             | IntStream i.e UTF-16 code, we need to use boxed() |
| Stream Builders           | Stream.builder()        | Stream<T> s= Stream.builder().add(1).build() |
|                           | Stream.generate()-java10| Stream<Integer> r = Stream.generate(random::nextInteger).limit(10); |
|                           | Stream.iterate() - java9| Stream<Integer> s = Stream.iterate(1, n -> n + 1).limit(10) |
| Streams from Functions    | Stream.ofNullable()     | Stream<String> s = Stream.ofNullable(name);//return empty stream instead of null |
|                           | Stream.concat()         | Stream<String> s = Stream.concat(Stream.of("A"), Stream.of("B"))|
|                           | Stream.empty()          | return empty stream|
| File Streams              | Files.lines(Paths.get("path"))                        ||
| String Streams            | str.codePoints()        | InStream i.e Uni code, used when working with text file |

Note: Only List,Queue,Dequeu,set are directly call `.stream()`, others need `mapEntry().stream()`.    

#### Intermediate Operation

| Intermediate Operation    | Definition                            |
|---------------------------|---------------------------------------|
| `map((a)=>{return a*10})` | Transform each element.               |
| `filter((a)=>{return })`  | Select elements based on a predicate. |
| `flatMap()`               | combination of flat&map, convert stream of stream into single stream |
| `distinct()`              | Remove duplicate for primitive datatypes |
| `sorted()`                | Sort elements.                        |
| `limit(5)`                | Limit the number of elements.         |
| `skip()`                  | Skip upto given index                 |
| `flatMapToInt(String::chars)`| each inner list into a single stream             |
| `peek()`                  | used to debug stream elements         |

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
#### Termination Function

| Termination Function            | Description                                         |
|---------------------------------|-----------------------------------------------------|
| `forEach(System.out::println)`  | Perform an action for each element.                 |
| `count()`                       | Count the number of elements.                       |
| `collect(Collectors.toList())`  | Collect elements into a collection.                 |
| `findFirst()`                   | return Optional so handle orElse()                  |
| `reduce((a, b) -> a + b)`       | return single value, takes BinaryOperator as param  |
| `min()`                         | return min value                                    |
| `max()`                         | return max value                                    |
| `anyMatch()`                    | return boolean if any element matches a predicate   |
| `allMatch()`                    | return boolean if all element matches a predicate   |
| `noneMatch()`                   | return boolean if no elements match a predicate.    |
| `findAny()`                     | Find any element (non-deterministic).               |
| `toArray(String[]::new)`        | return array                                        |
| `average()`                     | only for primitive streams IntStream                |
| `sum()`                         | only for primitive streams IntStream                |
| `mapToInt()`                    | convert obj list into intstream                     |
| `summaryStatistics()`           | only for primitive streams IntStream, we can use .getMax(), getMin() etc                |
| `forEachOrdered()`              |                                                     |

| Collectors Function   | Description                                                                                 |
|-----------------------|---------------------------------------------------------------------------------------------|
| To Collections        | `Collectors.toList()`, `Collectors.toSet()`, `Collectors.toMap()`                           |
| Joining               | `Collectors.joining(",")`                                                                   |
| Summarizing           | `Collectors.summarizingInt(), Collectors.summarizingDouble()`, `Collectors.summarizingLong()` |
| Grouping By           | `Collectors.groupingBy(obj::getYear)` `Collectors.groupingBy(Map.Entry::getValue)`          |
| Partitioning By       | `Collectors.partitioningBy(m-> m.getRating() > 3)`  //map<boolean, obj>                     |
| Averaging             | `Collectors.averagingInt()`, Collectors.averagingDouble(), Collectors.averagingLong()       |
| Reducing              | `Collectors.reducing()`                                                                     |
| Counting              | `Collectors.counting()`                                                                     |
| Uniqueu               | `Collectors.toSet()`                                                                        |

### Grouping By
#### Overloaded methods:
Collectors.groupingBy(classifier, Hashmap::new, toList());  
Make obj : `Collectors.groupingBy(obj::getYear)`.  
Make obj unique: `Collectors.groupingBy(obj::getYear, Collectors.toSet())`.  
Make obj in order: `Collectors.groupingBy(obj::getYear, TreeMap::new, Collectors.toList())`.  

### Stream of primitive types  
IntStream. 
LongStream. 
DoubleStream. 




## Stream problems examples  
1. Reducing for loop code using **IntStream**    
```int sumValue = IntStream.rangeClosed(0,4).forEach(); ```  
2. Remove duplicates using stream   
```List<String> uniqueList = names.stream().distinct().collect(Collectors.toList());```    

### Important Stream interview programs. 
1. Create a program to find the sum of squares of all even numbers from a list of integers using streams.    
```
int[] input = new int[]{1,2,3,4,5};
Arrays.stream(input).filter(x->x%2==0).map(x->x*x).forEach(System.out::println)
```

2. Find max of student age.  
```
int age = list.stream.mapToInt(student::getAge).max();
```

2a. Find second max of student age.  
```
int age = list.stream.mapToInt(student::getAge).skip(1).max();
```

3. Given a list of strings, return a list of unique characters present in all the strings.  
```
 List<String> strings = Arrays.asList("hello", "world", "java");
        Set<Character> uniqueCharacters = strings.stream()
                .flatMapToInt(CharSequence::chars)
                .mapToObj(ch -> (char) ch)
                .collect(Collectors.toSet());
```
4. Group students count by age. 
```
  Map<Integer, Long> m = list.stream().collect(Collectors.groupingBy(Student::getAge,Collectors.counting()));
  m.forEach((age, count) -> System.out.println("Age: " + age + ", Count: " + count));
```
5. Convert a list into map
```
list.stream().collect(Collection.toMap(Function.identity(),Function.identity()));
```


## Java11
1. **var**: allows the compiler to infer the type of a local variable based on the assigned value.
```
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