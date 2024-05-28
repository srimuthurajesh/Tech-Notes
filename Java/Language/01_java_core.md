# Java

> High level, widely used, general purpose programming language.

- [History](#history)
- [Basic Java program](#basic-java-program)
	- [Comments](#comments)
	- [Identifiers](#identifiers)
	- [Literals](#literals)
	- [Expression](#expression)
   	- [Seperators](#seperators)
	- [Keywords](#keywords)  
- [Variable](#variable)
- [Datatype](#datatype)
- [Operators](#operators)
- [Control statements](#control-statements)
- [Looping statements](#looping-statements)
- Non Premitive Datatypes
	- [Array](#array)
	- [String](#string)
- Additional Variables
	- [Static](#static)
	- [Final](#final)
	- [Constant](#constant)
	- [Enum](#enum)
- [Null](#null)
- [Typecasting](#typecasting)
- [Packages & Import](#packages--import)
- [Wrapper class](#wrapper-class)
- [Serialization](#serialization)
- [Exception handling](#exception-handling)
- [Annotations](#annotations)
- [Regex](#regex)
- [Keywords List](#keywords-list)



## History
- In 1991, Created at Sun Microsystems, by James gosling. renames from Oak to java 1995.
- Write Once, Run Anywhere
- lot of oppurtunities, already lot of projects using java  

Other: Code -> Compiler -> Machine code  
Java : Code -> Compiler -> Interpreter(JVM) -> Machine code  

**JDK** is (JRE+devTools) - For developer contains javac,debugging tools,archieve tool(jar), javadoc   
**JRE** is (JVM+lib) - For layman users to run java program  
**JVM** is Interpreter execute byte code to machine code, contins JustInTime compiler  

**Byte code**: low level representation of source code, not readable  
**JIT**: Just-In-Time (JIT) compiler, a component of JVM, that dynamically compiles bytecode into native machine code for efficient execution.  
**ClassLoader**: part of JRE, loads class file to JVM    

1. how to compile: `javac -d directory javafilename.java`           	
2. how to run: `java myppack.javafilename`         

## Basic Java program
``` 
import java.util.Scanner ;
class Hello{
  public static void main(String[]args){
    System.out.println("Hello World!");
 } 
}
```

### Comments: 
1. Singleline: (//)
2. Multiline: (/*.. */)
3. Documentation: (/**…\*/)   

### Identifiers: 
> used to name things/identify elements

1. name must be unique
2. should not be in char
3. can start with ($,_,a-z,a-z), but not with 0-9
4. case sensitive, java keywords cannot be used
5. use proper whitespace between keywords and identifiers
6. should be meaningful and prefer camelcase

### Literals: 
> value used in the code

### Expression: 
> combination of variables, identifiers, literals  

### Seperators
1. Parenthesis or Bracket : () -> method, control statement, casting
2. Braces  or Curly bracket: {} -> bodies of class,method,control 
3. Square bracket: [] -> array
4. Colon(:), Semicolon(;), Comma(,), dot(.)
   
### Keywords: 
> Predefined meaning (68) words.  

## Java I/O
1. Output  
 	print with new line: `System.out.println("Hellow world");`  
	print without new line: `System.out.print("Hellow world");`  
2. Input

```
import java.util.Scanner;
PSVM{
	Scanner scanner = new Scanner(System.in);
	String name = scanner.nextLine();
		int age = scanner.nextInt();
		char ch = scanner.next.charAt(0);
	}
```


## Datatype:  
> defined type of data, ie.Predefined memory storage

- Java is not fully oops language, due usage of primitive datatypes.  

### 1. Premitive datatype

|  Name			| Size  | Range  		   			|  2<sup>n</sup> |
|---------------|-------|---------------------------| ---------------|  
| **byte**		| 1byte | -+128            			| 2<sup>8</sup>  |
| **short**		| 2byte | -+32,768         			| 2<sup>16</sup> |   
| **int**		| 4byte | -+2,14,74,83,648 			| 2<sup>36</sup> |   
| **long**		| 8byte | -+9,22,33,72,03,68,54,775 | 2<sup>64</sup> |
| **float**		| 4byte | . after 6 digit   		| 2<sup>36</sup> |
| **double**	| 8byte | . after 15 digit  		| 2<sup>64</sup> |
| **char**		| 2byte | A-Z a-z 0-9 0-127ASCII	| 2<sup>16</sup> | 
| **boolean**	| depends on jvm, 1bit 	| 0 1 		| 2 			 |

Binary can be represent as adding "0b"   ex: int a = 0b011;  
Hexadecimel can be represnt as adding "0x" ex: int a = 0x2A;  
Power can be represent by _e_ ex: float a = 35e3f;  
At the end of float number _f_ or _F_ is necessary otherwise when we use dot(.) it default consider as double   

### 2. Non Premitive datatype  
1. [String](#string)
2. [Array](#Array)
3. Class


## Variable:  
> Named storage location. ie name for the datatype.

1. Declaration: int age;
2. Defination: age = 28;

## Operators:  

> performs mathemetical operations on operands. 

|  Operators 		   	| Symbols 						|  
|-----------------------|-------------------------------|  
| Arithmetic Operator  	| `+ - * / %`  					|  
| Relational Operator  	| `<, <=, >, >=, ==, !=`  		|  
| Logical Operator  	| `&&(AND), \|\| (OR), !(NOT)` 	|  
| Assignment Operator  	| `a += 4`  					|  
| Inc and Dec Operator  | `a++,a--,++a,--a`  			|  
| Conditional Operator  | `exp1? exp2: exp3;`  			|  
| Bitwise Operator  	| `&, <<, >>, >>>`  			|  
| Special Operator  	| `instanceof, (.)`  			|  
| Unary Operator  		| `~, !`  						|    

```
int a=10; int b=-9;  
System.out.println(~a);//-11 (minus of total positive value which starts from 0)    
System.out.println(~b);//9 (positive of total minus, positive starts from 0)   
```  
Arithmetic operator order: ```System.out.println(10*10/5+3-1*4/2);```  is 21  
Left shift operator: `10 << 2 is 10 * 2^2 = 40`
Right shift operator: `10 >> 2 is 10 / 2^2 = 2`    , when negative number it will -2
Bitwise operator & : (a>1&b<3) second condition also been check, where && wont go to second condition   


## Control statements:
> control flow of program

| Name				| defination  				| syntax		|  
|-------------------|---------------------------|----------------|  
| If 				| control code 				| if(con){ exp1; } |
| If-else 			| alternative for two ifs 	| if(con){ exp1; } else{ exp2; } |
| If-elseif 		| for more than one else  	| if(con){ exp1; }else if(condition2){ exp2; }else{ exp3; } |
| Tenary operator 	| short form of ifelse 		| condition ? expersion 1: expersion 2; |
| Switch case 		| use lookup table 			| switch(varible){case constant: operation; break;default: operation;break;}  |

Note: long float double and custom classes cannot be use in switch   

## Looping statements:
> repeat the execution

| Name					| defination  							| syntax								|  
|-----------------------|---------------------------------------|---------------------------------------|  
| while 				| iterates as long as condition true  	| while(con){ body; } 					|	 
| do-while 				| executes atleast once  				|do{ body }while(condition);			|	 
| for-loop 				| |for(intialize counter;test condition;inc or dec counter){ body; }			|
| break 				| get out of loop 						| break; 								|
| continue 				| back to continue next loop 			| continue;	 							|
| continue with label	| Skips to next iteration of labeled loop | continue loop_label; 			| 
| goto  				| Jumps to a labeled statement 			| goto label_name;						| 
| labelled break		| Exits a labeled loop 					| break label_name;						| 
| For-each 				| Iterates over elements of collection 	| for (DataType var : iterable) { body; }| 


## Array:    
> Group of similar datatype refered by single variable name

**Multi Dimensional arrays**: array of arrays. int a[][]; //used to define matrix    
int a[];  
int[] a;    
int[] a = new int[4];    
int[] a = new int[]{1,2,3,4};    
int[] a = {1,2,3,4};

### Arrays Important methods:   
Arrays.asList(arr);      	//conver array into List (collection framework)  
Arrays.sort(arr);   		//use mergeosrt for object, and quick sort fro primitive datatype   
Arrays.sort(arr, new Comparator());    
Arrays.binarySearch(arr, searchValue);    
Arrays.binarySearch(arr, fromIndex, toIndex, searchValue);  
Arrays.compare(intArr, intArr1);    
Arrays.copyOf(arr, 10); 	//create new clone array, also with initial size   
Arrays.copyOfRange(intArr, 1, 3);   
Arrays.hashCode(arr);  		//return hashcode  
Arrays.equals(arr1, arr2);    
Arrays.toString(arr);  		//print array   
List<?> a = Lists.newArrayList(a);   


## String:  
> class represents sequence of char, immutable, uses double quotes

- implements Serializable, Comparable and CharSequence interfaces  

**String creation**:  
- String - by string literal 
- new String() - create new space from string pool  
- new String().intern() - used to return value from string pool     
- StringBuffer - mutable, thread safe  
- StringBuilder - mutable, no thread safe, efficient  

**String comparision**:  
- ```s1.equals(s2);```  check for each char are same or not   
- ```s1==s2;```  check address is same or not  
- ```s1.compareTo(s2);``` compare string lexicographically. ie <0,>0  

**String tokenizer**: break a string into tokens    
```
StringTokenizer st = new StringTokenizer("my name is raj");
while(st.hasMoreTokens()){st.nextToken(); } //prints //my //name //is //raj  
```


## Static :  
> create only one time, called without reference

1. static variable -     ```className.variableName;```
2. static method -    ```className.functionName();``` 
3. static import-       
4. static object -      ``` import static java.lang.System.out;```
5. static class - only nested class can be static
6. static block - ```static {}``` //execute while class get loaded
7. Instance block { } inside class, runs after static block & before constructor
-```class.forName(" ");``` executes static block & load class

## Final :  
> assigned only once, cannot modify once it assigned

1. final variable - cannot changed  ```final int maxSpeed =100;```
2. final method - cannot overriden 
3. final class - cannot extend, immutable   
Note: finalize() - called just before an object is garbage collected. overrides to dispose system resources, perform clean-up, minimize memory leaks.

## Constant: 
> Immutable. Declare as final static.  eg: static final double PI=3.14

Note: if it is declared as private inside a class, it can be redeclare in another class  

## Enum:  
> group of constant( final,static)

```
enum Level { LOW, MEDIUM, HIGH }
Level myVar = Level.MEDIUM;
```
## Null: 
> case sensitive, not falls under any type, null==null is true

## Typecasting:  
> Convert one datatype to another

1. Implicit casting    
2. Explicit casting ```int a = (int) 3.14;	//3```   
Byte -> short -> int -> long -> float -> double

## Packages & import: 
> Collection of similar classes, interfaces and sub packages.

```import pkg1 [.pkg2].(classname | *); //import java.io.*;```  
how to define a package in that program: ```package packagename;```    
how to import package: ```import packagename.\*;```     
how to import using fully qualified name without import keyword: ```package classname```;   

## Wrapper class:  
 > wrap around primitive datatype & give object appearence

 **Advantages:**   
 - call by reference supports only in object
 - serialization supports object
 - collection framework
 - java util package
 - can use null value  

**Autoboxing:** primitive into wrapper- it uses cache value
``` 
int j=1;
Integer i = Integer.valueof(j);  or Integer i =j;
```

**Unboxing** : wrapper into primitive
 ```
 Integer i = new Integer(7);
 int = i.intValue();  or  int j=i;
 ```

## Generics:   
> parameterized types

Adv: 1.Type safety, 2.Typecast not needed, 3.Compilertime checking  
```
class MyGen<T>{  
	T obj;  
	void add(T obj){this.obj=obj;}  
	T get(){return obj;}  
}  
```

## Serialization : 
> mechanism of writing obj into byte stream, implement serializable marker interface

Note: it is gonna depreacted not recommended due to security vulnerablities. 
Data exchange formats: JSON, XML. these are alternatives for native serialization. 

```
FileOuputStream file = new FileOutputStream(filename);
ObjectOuputStream out = new ObjectOuputStream(file);
out.writeObject(object); out.close(); file.close();

FileInputStream file = new FileInputStream(filename);
ObjectInputStream in = new ObjectInputStream(file);
in.readObject();  //new object create 
```

## File handling
> do file operations using File class. 
Stream: series/flow of data. 
1. Byte Stream. Ex: FileInputStream. 
2. Char Stream. Ex: FileWrite. 

#### File Operations:
1. Create file - fileObj.createNewFile();  
2. Get file info - fileObj.exists(), fileObj.getName(), fileObj.getLenght(). 
3. Delete file - fileObj.delete(). 
4. Write file - fileWriterObj.write(). 
5. Read file -  
```
Scanner scanner = new Scanner(fileObj);  
while (scanner.hasNextLine()) {  System.out.println(dataReader.nextLine());  }  
```  

## Exception handling:  
> Unexpected event that terminate program

1. checked expception - ioexception, sqlexception  
2. unchecked exception - nullpointerexception  
3. error - OutOfMemory, StackOverFlow.  
```
try{
	throw new exception_name(“”);        
}
catch(exception e){ }
catch(arithmeticException|Exception e){} //this is multicatch
finally{}// occur for sure even though exception handled or not.
```
**Throws** :  indicates caller functions of that method  to handling that exception.  void methodName throws Exception{ }

**Custom Exception class**
```
class InvalidAgeException extends Exception{  
 InvalidAgeException(String s){  
  super(s);  
 }  
}  
```
**Try with resources:**   resource is as an object that must be closed after finishing the program  
```
try(FileOutputStream fileOutputStream=new FileOutputStream("/home/irfan/scala-workspace/java7-new-features/src/abc.txt")){  
    // -----------------------------Code to write data into file--------------------------------------------//  
        String msg = "Welcome to javaTpoint!";      
        byte byteArray[] = msg.getBytes();  // Converting string into byte array      
        fileOutputStream.write(byteArray);  // Writing  data into file  
        System.out.println("Data written successfully!");  
}catch(Exception exception){  
       System.out.println(exception);  
}  
finally{  
       System.out.println("Finally executes after closing of declared resources.");  
}  
```  
NoClassDefFoundError: runtime, classfile missing at run time. 
ClassNotFoundException: runtime, try to load the class while Class.forName() or loadClass()     

---

## Annotations:
1. Built-In Java Annotations used in Java code
 - @Override
 - @SuppressWarnings
 - @Deprecated
2. Built-In Java Annotations used in other annotations
 - @Target
 - @Retention
 - @Inherited
 - @Documented - ensure class is available in javadoc

## Regex:    
**^[a-zA-Z][a-zA-Z0-9]{8,19}**  
- Where  ^ represents the start of the regex   
- [a-zA-Z] represents that the first character must be an alphabet  
- [a-zA-Z0-9] represents the alphanumeric character  
- {8,19} represents that the length of the password must be in between 8 and 20.
```
import java.util.regex.*;  
System.out.println(Pattern.matches(".s", "as")); //line 4  
```
## Keywords List
#### Strictly Reserved Keywords (51):
1. Access Modifiers: private, public, protected
2. Data Types: boolean, byte, short, int, long, float, double, char
3. Control Flow: if, else, switch, for, while, do, break, continue, return
4. Object-Oriented Programming: abstract, class, extends, final, implements, interface, instanceof, new, package, super, this
5. Exception Handling: try, catch, finally, throw, throws
6. Generics: extends, super
7. Module System: exports, module, opens, provides, requires, to, uses
8. Record System: record
9. Underscore (introduced in Java 9): _

#### Contextually Reserved Keywords (17):
1. const (reserved within enum declarations)
2. goto (not currently used, but reserved for future use)
3. strictfp (reserved for future use)
4. volatile (can be used as a variable modifier)
5. transient (can be used as a variable modifier)
6. native (can be used as a method modifier)
7. synchronized (can be used as a method modifier)
8. assert (can be used in conjunction with the -enableassertions flag)
9. enum (can be used to declare enum types)
10. goto (reserved for future use)
11. interface (can be used to declare interfaces)
12. package (can be used to declare packages)
13. protected (can be used as an access modifier)
14. public (can be used as an access modifier)
15. static (can be used as a variable or method modifier)
16. strictfp (reserved for future use)
17. volatile (can be used as a variable modifier)
