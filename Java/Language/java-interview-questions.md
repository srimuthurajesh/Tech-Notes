## Core Java:
1. What is JDK, JRE, JVM
2. What is Bytecode?
3. What are types of comments in java?
4. What is identifier?
5. What is literal?
6. What is an expression?
7. What are keywords in java?
8. Write java input/output syntax.
9. What are datatype and its types?
10. Java is not 100% oops language, why?
11. What are variable and its types?
12. What is operators and its types?
13. What is array? and list important methods
14. What is string? and list important methods
15. Why string is not immutable?
13. What is stringbuffer and stringbuilder?
14. What is types of string comparisions?
15. What is String tokenizer?
16. What is static variable, static class?
17. What is static block, when it will execute?
17. What is final variable, final method, final class?
18. What is final, finalize, finally?
19. What is constants?
20. What is enum?
21. Does null is case sensitive? and what return in null==null
22. What is package and import?
23. What is wrapper class and autobox & unboxing? give advantages
24. What is typecasting?
25. What is generics?
26. What is exception handling?
27. What is checked and unchecked exception?
28. What is throw and throws?  
29. When ClassNotFoundException and NoClassDefFoundError occurs?  runtime/compiletime  
30. What is serialization? and syntax


## OOPS:
1. What is constuctor and its types?
1. What is lamda expression?
2. What is interface? and its types.
3. What is marker interface and example.
3. What are the types of access specifier?
4. What are the seven methods of Object class?
5. What are the four ways to create object?
5. What is object cloning?  
6. When garbage collection get triggers?
7. What is method and vararg?
7. What are the types and subtypes of encapsulation?
8. What are inheriance and give its types?
9. What is super and super()?
10. What is polymorphism and its types?
11. What is abstract class?
12. What is interface and its types?
13. What is IS-A and HAS-A relationship?
15. What is shallow and deep copy?   


## MultiThreading:
1. What is multithreading?
2. What is process and thread?
3. What are the 5 different states of lifecycle in Thread
4. What is thread priority? and its values. 
5. What is sychronized method?
6. What is Synchronized block?
7. What is static synchronized?
8. What are the Thread class methods?
9. Explain wait, notify, notifyall
10. What is deadLock, how to avoid?
11. What is race condition?
12. What are the methods available in Thread Object?
13. What is volatile keyword?
14. How do you stop the thread in java?  
15. Explain about ExecuterService?
16. What is Atomic variables. 
17. List and explain thread safe collections 


## Collection:
1. How to calculate new arrayList size? and default size.
2. How does CopyOnWriteArrayList handle modifications?
2. How to convert a collection to iterator?
3. Why String is popular HashMap key in Java?  
4. What is difference between ArrayList & LinkedList? 
5. What is comparable & comparator interface?  
7. What is difference between hashmap and hashtable  
8. What is iterator and list_iterator
9. What is difference between collection and collections  
11. How HashMap handles collision
12. What is the difference between poll() and remove() in queue? 
14. What is the difference between failfast and failsafe iterator?

## Miscellenous questions:
1. Why we overrider hashcode and equals?
2. Why we implements cloneable?  
3. What is static and dynamic classLoading? class.forName(String class_name)  
4. Can you have virtual functions in Java? Y, all non static functions


## Tricky Questions:
1. Is Empty .java file name a valid source file name?
2. If I don't provide any arguments on the command line, then arg will be empty or NULL?
3. What if I write static public void instead of public static void?
4. Is constructor inherited? N
5. Can you make a constructor final/static? no final
5. Can you make a abstract method static? not allowed
6. Default constutor wont work if i give any one constructor explictly? Y
7.  Can we override the private and static methods?N
8. Arrange the order of execution blocks. static,instance,constructor,main
9.  Can we execute a program without main() method?N
10. What if static modifier is removed from main method? NoSuchMethodError
11. Can declare static variables and methods in abstract class?
12. Is method overloading possible with return type, why?N
13. Can we use abstract and final in both method?
14. Can we use static and abstract at same time for a method?
15. Can we make declare an interface method as static?
16. Can interface be final?N
17. Can we use private,protected for members of interface?N
18. What is readonly and writeonly class? 
19. Do i need to import java.lang.package? N default
20. Is it necassary that each try block must be followed by catch block?N finally
21. Can finally block be used without catch?Y
23. Is there any case finally block will not executed?Y System.exit()
24. Can exception be rethrown? Y, only unchecked
25. How many object created in String a = new String("ra");? 2
26. How can we make immutable class in java? make final members and class
27. Can a class have an interface?Y nested interface
28. Can interface have class? Y static implicitly
29. What is System.gc()?
30. What are the 3 ways object be unreferenced?
31. Is it possible to start a thread twice?N
32. Can we call the run() method instead of start()? Y but N
33. Does each thread have its stack in multithreaded programming?Y
34. In which way of object creation constructor not called? clone
35.  Can we import same package/class two times? Y
36. Can there be an abstract method without an abstract class? Y interface

## Output questions:
1.  System.out.println(10 + 20 + "Javatpoint");    //30Javatpoint
2.  System.out.println("Javatpoint" + 10 + 20);   //Javatpoint1020
3. System.out.println(10 * 20 + "Javatpoint");    //200Javatpoint
4. System.out.println("Javatpoint" + 10 * 20);    //Javatpoint200
5. for(int i=0; 0; i++)   //compile time error
6. Will it work, throw 90;catch(int e)? N, it is not throwable
7. Write doubly linked list in java.


## Design patterns:
1. What is factory and abstract factory method?  

## IO Serialization questions:  
1. What is Transient?
2. What is bufferInputStream and bufferOutputStream?  
3. What is FileInputStream and FileOutputStream?  
4. What is Serializable and Externalizable interface?  