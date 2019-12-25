## Java
JDK - Compiler + libraries
JRE - Interpreter + JVM
JVM - execute byte code to machine code

My first program:
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
**Comments:** 1.Singleline: // 2.Multiline: /*.. */   3.Documentation: /**…\*/
**Packages:**  Collection of similar classes, interfaces and sub packages.
1.built-in packages 	2.userdefined
import pkg1 [.pkg2].(classname | *); //import java.io.*;

how to compile: javac -d directory javafilename.java 	
how to run: java myppack.javafilename
how to define a package in that program: package packagename;
how to import package: import packagename.*;
how to import using fully qualified name without import keyword: package classname;

**Keywords:** Predefined meaning (53) words.
**Constant:** Non changeable, immutable. Declare as final static.
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
```int a = (int) 3.14;	//3```
Byte->short->int->long->float->double

**Array:** Group of similar datatype variables to a variable name
```int rajesh[]; rajesh=new int[3]; (or) int rajesh[]=new int[3];```

**String:**  class represents sequence of char
- implements Serializable, Comparable and CharSequence interfaces
- *String creation*: 
- 1. String - by string literal or new keyword 
- 2. StringBuffer - mutable, thread safe
- 3. StringBuilder - mutable, no thread safe, efficient
- *String comparision*: 
- 1. ```s1.equals(s2);```  check for each char are same or not
- 2. ```s1==s2;```  check address is same or not
- 3. ```s1.compareTo(s2);``` compare string lexicographically.
- *String tokenizer*: break a string into tokens
```
StringTokenizer st = new StringTokenizer("my name is raj");
while(st.hasMoreTokens()){
	st.nextToken(); //prints //my //name //is //raj
}
```
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

 **Wrapper class**:  wrap around primitive datatype & give object appearence. 
 Advantages: 
 -call by reference supports only in object
 -serialization supports object
 -collection framework
 -java util package 
 *Autoboxing:* int into integer
``` 
int a=20;
Integer i = Integer.valueOf(a); (or) Integer i =a;
```
 *Unboxing* : integer into int
 ```
 Integer a = new Integer(3);
 int i = a.intValue(a);  (or) int j=a;
 ```

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
**Object**:   instant of a class
``` 
ClassName obj = new ClassName(); //
(heap) reference = (stack) instance

```
*Anonymous object* : one time use.
```
new ClassName().functionName();
new ClassName().variableName = value`
```
*Functions of object class:*
5. toString()  - String representation of an Object 
6. hasCode() - JVM generates a unique numbe
7. equals(Object obj) - Compares the given object to “this” object 
8. getClass() - Returns the class object of “this” object ``` Class c = obj.getClass(); c.getClassName();```
9. finalize() -  called just before an object is garbage collected
10. clone() - returns a new object
11. wait(), notify() notifyAll()  - related to Concurrency 

*4 ways to create object :*
12. New keyword
13. 
