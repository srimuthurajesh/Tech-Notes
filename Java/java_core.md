## Java
JDK - Compiler + libraries\
JRE - Interpreter + JVM\
JVM - execute byte code to machine code
```
import java.Io.*;	//this package used while code in notepad
class Hello{
	public static void main(String[]args){
		System.out.println(“hii rajesh kanna”); 
	} 
}
```
Input & Output
```
import java.util.Scanner ;
Scanner input = new Scanner(Sytem.in);
a=input.nextInt();

System.out.println(); //print only one line and move to next line
System.out.print(); //print line and remain in same line we have to give \n
System.out.printf(“%d”,$i); //print string stream
```

**Escape sequences:**  \n 	\t	 \’	 \”	 \\ 	\b	 \f	 

**Comments:** 
1. Singleline: // 
2. Multiline: /*.. */ 
3. Documentation: /**…\*/

**Packages:**  Collection of similar classes, interfaces and sub packages.
1. built-in packages 	
2. userdefined  ```import pkg1 [.pkg2].(classname | *); //import java.io.*;```

how to compile: javac -d directory javafilename.java\ 	
how to run: java myppack.javafilename\
how to define a package in that program: package packagename;\
how to import package: import packagename.*;\
how to import using fully qualified name without import keyword: package classname;

**Keywords:** Predefined meaning (53) words.\
**Constant:** Non changeable, immutable. Declare as final static.\
**Variable:**  Basic unit of storage 
1. Local variable : Declare inside a method
2. Instant variable: Declare inside class
3. Static variable: Declare as static have only one copy

**Datatype:** Predefined memory storage

| Name        | Length           | Size  |
| ------------- |:-------------:| -----:|
| byte      | -128 to 127| 1 byte |
| short      | -32,768 to 32,768 | 2 byte |
| int      | -+2,14,74,83,648 | 4 byte |
| long      | -+9,22,33,72,03,68,54,775 | 8 byte |
| float      | . after 6 digit| 4 byte |
| double      | . after 15 digit| 8 byte |
| char      | A-Z a-z 0-9 0-127ASCII| 2 byte |
| boolean      | 0 1| depends on jvm |

**Typecasting:**  Convert one datatype to another
```int a = (int) 3.14;	//3``` \
Byte -> short -> int -> long -> float -> double

**Array:** Group of similar datatype variables to a variable name
```
int rajesh[]; 
rajesh=new int[3]; 
(or) int rajesh[]=new int[3];
```

**String:**  class represents sequence of char
- implements Serializable, Comparable and CharSequence interfaces
- *String creation*: 
 	1. String - by string literal or new keyword 
 	2. StringBuffer - mutable, thread safe
 	3. StringBuilder - mutable, no thread safe, efficient
- *String comparision*: 
	1. ```s1.equals(s2);```  check for each char are same or not
	2. ```s1==s2;```  check address is same or not
	3. ```s1.compareTo(s2);``` compare string lexicographically.
- *String tokenizer*: break a string into tokens
```
StringTokenizer st = new StringTokenizer("my name is raj");
while(st.hasMoreTokens()){
	st.nextToken(); //prints //my //name //is //raj
}

```

**Operators** :

|  Operators| Symbols  |
|--|--|
|Arithmetic Operator  |**+ - * / %**  |
|Relational Operator  |**<, <=, >, >=, ==, !=**  |
|Logical Operator  |**&&(AND), \|\| (OR), !(NOT)**  |
|Assignment Operator  |**a += 4**  |
|Inc and Dec Operator  |**a++,a--,++a,--a**  |
|Conditional Operator  |**exp1? exp2: exp3;**  |
|Bitwise Operator  |** &, !, ~, <<, >>, >>>**  |
|Special Operator  |**instanceof, (.)**  |

**Enum** :  group of constant( final,static)
```
enum Level {
  LOW,
  MEDIUM,
  HIGH
}
Level myVar = Level.MEDIUM;
```
**Null** : case sensitive, not falls under any type, null==null is true

**Decisions making**:

        1. if(con){ exp1; }
        2. if(con){ exp1; } else{ exp2; }
        3. if(con){ exp1; }else if(condition2){ exp2; }else{ exp3; }
        4. Tenary operator-condition ? expersion 1: expersion 2;

**Looping**:

        1. while(con){ body; }
        2. do{ body }while(condition);
        3. for(intialize counter;test condition;inc or dec counter){ body; }
        4. switch(varible){case constant: operation; break;default: operation;break;}
        5. break; 	//get out of loop
        6. continue;	//back to continue next loop
        7. continue loop_label;		loop_label;{exp}
        8. goto label_name; 		label_name:{exp}
        9. break label_name;		label_name:{exp}
        10. For each loop(Datatype var: iterable)

**Static** : create only one time, called without reference
1. static variable -     ```className.variableName;```
2. static method -    ```className.functionName();``` 
3. static import-       
4. static object -      ``` import static java.lang.System.out;```
5. static class - only nested class can be static
6. static block - ```static {}``` //execute while class get loaded
-empty block { } inside class, runs after static block & before constructor
-```class.forName(" ");``` executes static block & load class

**Final** :  assigned only once, mostly in constructor directly
1. final variable - cannot changed  ```final int maxSpeed =100;```
2. final method - cannot overriden 
3. final class - cannot extend, immutable   
Note: finalize() - called just before an object is garbage collected. overrides to dispose system resources, perform clean-up, minimize memory leaks.

 **Wrapper class**:  wrap around primitive datatype & give object appearence. \
 Advantages: 
 - call by reference supports only in object
 - serialization supports object
 - collection framework
 - java util package 
 \*Autoboxing:* int into integer
``` 
int a=20;
Integer i = Integer.valueOf(a); (or) Integer i =a;
```
 *Unboxing* : integer into int
 ```
 Integer a = new Integer(3);
 int i = a.intValue(a);  (or) int j=a;
 ```
 
---

**Object oriented programming**
**Class**: template or blueprint for object (contains states & behaviour)
1. Nested class : A.B bObj = Aobj.new B();
2. Nested static: A.B Bobj = new A.B();
3. Anonymous : A obj = new A(){.........}
4. Lamda expression: functional interface - have only 1 method
	``` 
	interface A {void show();}
	A obj = new A()->{....}`
	```
**Constructor** : used to intinalize the object, has no return type, must have the class name.cannot inherited, cannot make constructor final 	

**Object**:   instant of a class
``` 
ClassName obj = new ClassName(); //
LHS (heap) reference = RHS (stack) instance

```
*Anonymous object* : one time use.
```
new ClassName().functionName();
new ClassName().variableName = value`
```
*Functions of object class:*

	1. toString()  - String representation of an Object 
	2. hasCode() - JVM generates a unique numbe
	3. equals(Object obj) - Compares the given object to “this” object 
	4. getClass() - Returns the class object of “this” object ``` Class c = 		obj.getClass(); c.getClassName();```
	5. finalize() -  called just before an object is garbage collected
	6. clone() - returns a new object
	7. wait(), notify() notifyAll()  - related to Concurrency 

*4 ways to create object :*

	1. New keyword
	2. clone()   
	3. class.forName("classname").newInstance();
	4. Deserialization while readObject()
	
*Garbage collection*: automatic destruction, if no references to an object exist
									System.gc(); invoke farbage collection.
it is caused by three ways: 

	1. while nullfying the object     rajesh obj1=new rajesh();    obj1=null;
	2. while assigning reference to other         obj1=obj2
	3. while using anonymous object
*Finalize()* : Called before GC

**Methods**: lines of instruction inside a block with a name and arguement
pass by reference: done by passing object
var-arg :  void methodname(int...a){//use as a[];}

**Encapsulation**: 

	1. Public- Any class any package
	2. private - Specified Class
	3. protected –subsiding class(inheritance)
	4. Default- Specific package - default if no specifier mentioned
Note: we cannot use private, protected in class, but we can use in innerclass 

**Inheritances IS-A**: one class acquires the properties of another class. 
if I call a constructor of child class, first parent class constructors will execute than only base class constructor
1. Single inheritance
2. Multilevel inheritance
3. Hierarchical inheritance
*Super keyword* :  ```super.variablename; super.methodname(); super();```

**Polymorphism**: ability to define a method(constructor) in many forms\
*Method overriding* : same method name, same no. of arguements\
*Method overloading* : same method name, diff no. of arguements

**Abstraction** : Hiding the implementation

	1. Abstract(0 to 100% ) 
	2. Interface (100%) 
					a) Normal interface
					b) Marker interface - empty body
					c) Functional interface - have only one method declaration

---

**Input/Ouput**
**Serialization** : mechanism of writing obj into byte stream, implement serializable marker interface
```
FileOuputStream file = new FileOutputStream(filename);
ObjectOuputStream out = new ObjectOuputStream(file);
out.writeObject(object); out.close(); file.close();

FileInputStream file = new FileInputStream(filename);
ObjectInputStream in = new ObjectInputStream(file);
in.readObject();  //new object create 
```


---

**Exception handling**:  Unexpected event that terminate program
1. checked expception - ioexception, sqlexception
2. unchecked exception - nullpointerexception
3. error - virtual machine error
```
try{
	throw new exception_name(“”);        
}
catch(exception e){ }
catch(arithmeticException|Exception e){} //this is multicatch
finally{}// occur for sure even though exception handled or not.
```
*Throws* :  void methodName throws Exeception{ }


---

**Muti threading**: concurrent execution, subset process
```
1. class MyClass implements Runnable{
2 .class MyClass extend Thread{
	public void run(){}
}
MyClass obj = new MyClass(); 
obj.start(); //run func will execute
```
*Difference states of Thread :*

	1. New - obj of thread created but start not yet called
	2. Runnable - start called but no cpu available, so not running
	3. Running - start called running
	4. Blocked/waiting - wait for i/o or another thread
	5. Terminated/Dead - completed
	
*Priority of a Thread*: (Range 1-10) (default-5)
```
threadObj.setPriority(8);
threadObj.setPriority(Thread.MIN_PRIORITY) //1
threadObj.setPriority(Thread.MAX_PRIORITY) //10
threadObj.setPriority(Thread.NORM_PRIORITY) //5
```
*Synchronized method* - prevent multiple thread execute on it\
*Synchronized block* - synchronized(){ }\
*Static synchronization* - synchronized static void func(){  }\
*Join* : wait for particular thread to complete
```thread3.join(); thread4.join(200); //wait for 200ms```\
*Yield* : change thread Running to Runnable, give chance to other wait thread\
*Sleep* : ```Thread.sleep(1000);``` //goes to runnable for given time\
*Executer service* : provide thread pool
```
ExecutorService execService = Executor.newCacheThreadPool();
ExecutorService execService = Executor.newFixedThreadPool();
ExecutorService execService = Executor.newSingleThreadPool();
```
Methods in multithreading:
```
threadObj.start()- start thread by calling run method
tObj.getName()- Get thread’s name
threadObj.getPriority()-Get thread priority
threadObj.isAlive()- check if thread is running
threadObj.join()-wait for thread to terminate
threadObj.wait()- notify and wake up thread
```
*Inter thread co operation*:  sync threads communicate with each other by:
1. wait-causes current thread to release lock wait until  notify(), notifyall()
2. notify()-wakes up a single thread that waiting for object monter 
3. notifyAll()- wakes up all threads that waiting for object monter

---

**Collections** : framework/container to access prepackaged data structure.
1. *List*
	- 	ArrayList	- dynamic array
	- 	LinkedList - dynamic array with insertion efficient
	- 	Vector - thread safe, same like arraylist
2. *Queue* - FIFO
	- 	Priority queue 
	- 	ArrayDeque 
	- 	ArrayBlocking queue
3. *Set* - does not allow duplicate
	- 	Hashset 
	- 	LinkedHasedSet
	- 	treeSet	
4. *Map* - has string as key
	-	HashMap - No null allowed
	-	HashTable - Null allowed, slow, thread safe
	-	TreeMap
	-	NavigableMap


**Annotations**:
1. Built-In Java Annotations used in Java code
	a. @Override
	b. @SuppressWarnings
	c. @Deprecated
2. Built-In Java Annotations used in other annotations
	a. @Target
	b. @Retention
	c. @Inherited
	d. @Documented