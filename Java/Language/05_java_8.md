
# Features of Java 8:  

1. [Lambda Expression](#1-Lambda-expression)
2. [Method reference](#2-method-reference)
3. [Optional](#3-optional)
4. [Functional interface](#4-functional-interface)
5. [Default Method](#5-default-method)
6. [Date time API](#7-date-time-api)
7. [StringJoiner class](#8-stringjoiner-class)
8. [Stream API](#6-stream-api)
  - [Stream problems examples](#stream-problems-examples)

## Lambda Expression   
> block of code that takes parameters and returns a value,   

- often used as an argument to a method or assigned to a variable.   
**Syntax**: ```(argument-list) -> {body}```
Some lambda expression:    
a) foreach: list.foreach(x){sysout(x)};  
b) Predicate<?>  test()  
c) IntFunction(int value)


## Method reference   
- able to assign a method/constructor to functional interface   
i) staticMethod reference - className::Method  
ii) InstanceMethod reference - objectName::Method   
iii) constructor reference - className::new   
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

## Optional   
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

## Functional interface   
should have only one abstract method. Eg:Runnable @Comparator .   
-can have default and static method with body  
-use @FunctionalInterface and make any interface as Functional interface  

## Default Method   
default has method body and also static method allowed inside interface  

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
- **Stream**: means a continuos flow of data.  

#### Source Operation

| Source Operation        | code                    | return    |
|-------------------------|-------------------------|-----------|
| Collection Streams      | collObj.stream()        | Stream<T> |
|                         | collObj.parallelStream()| Stream<T> |
| From elements           | Stream.of("s","a")      | Stream<T> |
| Array Streams           | Arrays.stream(array)    | primitive(IntStream,DoubleStream,LongStream) or Stream<T>|
| String Streams          | str.chars()             | IntStream i.e UTF-16 code |
|                         | str.codePoints()        | InStream i.e Uni code |
| Stream Builders         | Stream.builder()        | Stream<T> s= Stream.builder().add(1).build() |
|                         | Stream.generate()       | Stream<Integer> r = Stream.generate(random::nextInteger).limit(10); |
|                         | Stream.iterate()        | Stream<Integer> s = Stream.iterate(1, n -> n + 1).limit(10) |
| Streams from Functions  | Stream.ofNullable()     | Stream<String> s = Stream.ofNullable(name);//return empty stream instead of null |
|                         | Stream.concat()         | Stream<String> s = Stream.concat(Stream.of("A"), Stream.of("B"))|
|                         | Stream.empty()          | return empty stream|
| File Streams            | Files.lines(Paths.get("path"))                        ||

Note: Only List,Queue,Dequeu,set are directly call `.stream()`, others need `mapEntry().stream()`.    

#### Intermediate Operation

| Intermediate Operation    | Definition                            |
|---------------------------|---------------------------------------|
| `map((a)=>{return a*10})` | Transform each element.               |
| `filter((a)=>{return a%2==0})`| Select elements based on a predicate. |
| `distinct()`              | Remove duplicate for primitive datatypes |
| `sorted()`                | Sort elements.                        |
| `limit(5)`                | Limit the number of elements.         |
| `skip()`                  | Skip upto given index                 |
| `flatMap()`               | each inner list into a single stream             |
| `flatMapToInd(String::chars)`| each inner list into a single stream             |
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
| `reduce((a, b) -> a + b)`       | return single value, takes BinaryOperator as param  |
| `min()`                         | return min value                                    |
| `max()`                         | return max value                                    |
| `anyMatch()`                    | return boolean if any element matches a predicate   |
| `allMatch()`                    | return boolean if all element matches a predicate   |
| `noneMatch()`                   | return boolean if no elements match a predicate.    |
| `findAny()`                     | Find any element (non-deterministic).               |
| `findFirst()`                   | return Optional of first element.                   |
| `toArray(String[]::new)`        | return array                                        |
| `average()`                     | only for primitive streams IntStream                |
| `sum()`                         | only for primitive streams IntStream                                                    |
| `mapToInt()`                    | only for primitive streams IntStream                                                    |
| `forEachOrdered()`              |                                                     |

| Collectors Function   | Description                                                                                 |
|-----------------------|---------------------------------------------------------------------------------------------|
| To Collections        | `Collectors.toList()`, `Collectors.toSet()`, `Collectors.toMap()`                           |
| Joining               | `Collectors.joining("deLimiter")`                                                           |
| Summarizing           | `Collectors.summarizingInt(), Collectors.summarizingDouble()`, Collectors.summarizingLong() |
| Grouping By           | `Collectors.groupingBy(obj::getYear)` `Collectors.groupingBy(Map.Entry::getValue)`          |
| Partitioning By       | `Collectors.partitioningBy(m-> m.getRating() > 3)`  //map<boolean, obj>                     |
| Averaging             | `Collectors.averagingInt()`, Collectors.averagingDouble(), Collectors.averagingLong()       |
| Reducing              | `Collectors.reducing()`                                                                     |
| Counting              | `Collectors.counting()`                                                                     |
| Uniqueu               | `Collectors.toSet()`                                                                        |


### Stream of primitive types  
IntStream. 
LongStream. 
DoubleStream. 




## Stream problems examples  
1. Reducing for loop code using **IntStream**    
```int sumValue = IntStream.rangeClosed(0,4).forEach(); ```  
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
1. Create a program to find the sum of squares of all even numbers from a list of integers using streams.    
```
int[] input = new int[]{1,2,3,4,5};
Arrays.stream(input).filter(x->x%2==0).map(x->x*x).forEach(System.out::println)
```
2. Find max of student age. 
```
int age = list.stream.mapToInt(student::getAge).max();
```

3. Given a list of strings, return a list of unique characters present in all the strings.

```
 List<String> strings = Arrays.asList("hello", "world", "java");

        Set<Character> uniqueCharacters = strings.stream()
                .flatMapToInt(CharSequence::chars)
                .mapToObj(ch -> (char) ch)
                .collect(Collectors.toSet());
```