# Java

> High level, widely used, general purpose programming language.

- [History](#history)
- [Basic Java program](#basic-java-program)
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



## History
- In 1991, Created at Sun Microsystems, by James gosling. renames from Oak to java 1995.
- Write Once, Run Anywhere
- lot of oppurtunities, already lot of projects using java  

**Other lang** : Code -> Compiler -> Machine code  
**Java lang** : Code -> Compiler -> Interpreter(JVM) -> Machine code  

**JDK** is (JRE+devTools) - For developer contains javac,debugging tools,archieve tool(jar), javadoc   
**JRE** is (JVM+lib) - For layman users to run java program  
**JVM** is Interpreter execute byte code to machine code, contains JustInTime compiler  

**Byte code**: low level representation of source code, not readable  
**JIT**: Just-In-Time (JIT) compiler, a component of JVM, that efficiently compiles bytecode into native machine code  
**ClassLoader**: part of JRE, loads class file to JVM    

1. how to compile: `javac -d directory javafilename.java`           	
2. how to run: `java myppack.javafilename`         

## Basic Java program
```java 
import java.util.Scanner;
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
> Predefined meaning (68) words. [Keywords list](#keywords-list) 

## Java I/O
1. Output  
 	print with new line: `System.out.println("Hellow world");`  
	print without new line: `System.out.print("Hellow world");`  
2. Input

```java
import java.util.Scanner;
public static void main(String[] args){
	Scanner scanner = new Scanner(System.in);
	String name = scanner.nextLine();
		int age = scanner.nextInt();
		char ch = scanner.next.charAt(0);
	}
```


## Datatype:  
> defines type of data, ie.Predefined memory storage

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

```java
int a=10; int b=-9;  
System.out.println(~a);//-11 (minus of total positive value which starts from 0)    
System.out.println(~b);//9 (positive of total minus, positive starts from 0)   
```  
Arithmetic operator order: `System.out.println(10*10/5+3-1*4/2);`  is 21  
Left shift operator: `10 << 2 is 10 * 2^2 = 40`  
Right shift operator: `10 >> 2 is 10 / 2^2 = 2`    , when negative number it will -2
Bitwise operator & : (a>1&b<3) second condition also been check, where && wont go to second condition   


## Control statements:
> control flow of program

| Name				| defination  				| syntax																	|  
|-------------------|---------------------------|---------------------------------------------------------------------------|  
| If 				| control code 				| `if(con){ exp1; }` 														|
| If-else 			| alternative for two ifs 	| `if(con){ exp1; } else{ exp2; }` 											|
| If-elseif 		| for more than one else  	| `if(con){ exp1; }else if(condition2){ exp2; }else{ exp3; }` 				|
| Tenary operator 	| short form of ifelse 		| `condition ? expersion 1: expersion 2;` 									|
| Switch case 		| use lookup table 			| `switch(varible){case constant: operation; break;default: operation;break;}`  |

Note: long float double and custom classes cannot be use in switch   

## Looping statements:
> repeat the execution

| Name					| defination  							| syntax									|  
|-----------------------|---------------------------------------|-------------------------------------------|  
| while 				| iterates as long as condition true  	| `while(con){ body; }` 					|	 
| do-while 				| executes atleast once  				| `do{ body }while(condition);`				|		 
| for-loop 				| |`for(intialize counter;test condition;inc or dec counter){ body; }`				|
| break 				| get out of loop 						| `break;` 									|
| continue 				| back to continue next loop 			| `continue;`	 							|
| continue with label	| Skips to next iteration of labeled loop | `continue loop_label;` 					| 
| goto  				| Jumps to a labeled statement 			| `goto label_name;`						| 
| labelled break		| Exits a labeled loop 					| `break label_name;`						| 
| For-each 				| Iterates over elements of collection 	| `for (DataType var : iterable) { body; }`	| 


## Array:    
> Group of similar datatype refered by single variable name

#### Array Creation:
1. Declaration: `int a[];`  `int[] a;`   
2. Declaration with size: `int[] a = new int[4];`    
3. Giving values: `int[] a = new int[]{1,2,3,4};` or `int[] a = {1,2,3,4};`. 
4. Method return value: `return new int[]{1,2};`   

**Multi Dimensional arrays**: array of arrays. int a[][]; //used to define matrix    

### Arrays Important methods:   
1. `Arrays.toString(arr);`  		
2. `Arrays.equals(arr1, arr2);`    
3. `Arrays.asList(arr);`      	//conver array into immutable raw list 
4. `Arrays.sort(arr);`   		//use mergeosrt for object, and quick sort fro primitive datatype   
5. `Arrays.sort(arr, new Comparator());`    
6. `Arrays.binarySearch(arr, searchValue);`    
7. `Arrays.compare(intArr, intArr1);`    
8. `Arrays.copyOf(arr, 10);` 	//create new clone array, also with initial size   
9. `Arrays.copyOfRange(intArr, 1, 3);`   


## String:  
> sequence of char, immutable, uses double quotes. 

- implements Serializable, Comparable and CharSequence interfaces  

### String creation:    
1. String - by string literal 
2. new String() - create new space from string pool  
3. new String().intern() - used to return value from string pool     
4. StringBuffer - mutable, thread safe  
5. StringBuilder - mutable, no thread safe, efficient  

### String comparision:    
1. `s1.equals(s2);`  check for each char are same or not   
2. `s1==s2;`  check address is same or not  
3. `s1.compareTo(s2);` compare string lexicographically. ie <0,>0  

### String methods:
1. `charAt(int index)`
2. `length()` 
3. `isEmpty()`   
4. `toUpperCase()`, `toLowerCase()`
5. `str1.equals(str2)`, `str1.equalsIgnoreCase(str2)`
6. `compareTo(str)`, `compareToIgnoreCase(str)` - Lexicographical comparison
7. `contains(str)`  
8. `startsWith(prefix)`, `endsWith(suffix)` 
9. `trim()` - Removes whitespace from front and back.
10. `indexOf(String str)`, `lastIndexOf(String str)`
11. `replace(str1, str2)`- replace all occurrences of str1 with str2.
12. `substring(int beginIndex, int endIndex)`
13. `split(String regex)`
14. `join(delimiter, str2)`
15. `format(String format, Object... args)`-format string with arguments        |
16. `matches(regex)` 


## Static:  
> create only one time, called without reference

1. static variable - `className.variableName;`
2. static method -   `className.functionName();` 
3. static import-   `import static java.lang.Math.PI;`    
4. static class - only nested class can be static
5. static block - `static {}` //execute while class get loaded
6. Instance block `{ }` inside class, runs before constructor & after static block   
Note: we can call static using obj also.

## Final:  
> assigned only once, cannot modify once it assigned

1. final variable - cannot changed  `final int maxSpeed =100;`
2. final method - cannot overriden 
3. final class - cannot extend, immutable   
Note: finalize() - called just before an object is garbage collected. overrides to dispose system resources, perform clean-up, minimize memory leaks.

## Constant: 
> Immutable. Declare as final static.  eg: static final double PI=3.14

Note: if it is declared as private inside a class, it can be redeclare in another class  

## Enum:  
> group of constant( final,static)

```java
enum Level { LOW, MEDIUM, HIGH }
Level myVar = Level.MEDIUM;
```
## Null: 
> case sensitive, not falls under any type, null==null is true

## Typecasting:  
> Convert one datatype to another

1. Up casting - lower to higher data type    
2. Down casting - higher to lower data type. 
`int a = (int) 3.14;	//3`.   
Casting Order : Byte -> short -> int -> long -> float -> double  
Convert to String: `String.valueOf(33); //"33"`

Note: typecasting char to int will give unicode. A=65, a=97  
## Packages & import: 
> Collection of similar classes, interfaces and sub packages.

Syntax : `import pkg1 [.pkg2].(classname | *);`.   
 import java.io.*;`.   
Define package in program: `package packagename;`      
how to import whole package: `import packagename.\*;`      
Note: we can use fully qualified name.   
`java.util.List<> list = new java.util.ArrayList<String>();`  	

## Wrapper class:  
 > wrap around primitive datatype & give object appearence

- generics support only object

1. **Autoboxing**: primitive into wrapper- it uses cache value
```java
int j=1;
Integer i = Integer.valueof(j);  or Integer i =j;
```
2. **Unboxing**: wrapper into primitive
```java
 Integer i = new Integer(7);
 int = i.intValue();  or  int j=i;
 ```

## Generics:   
> parameterized types

Adv: 1.Type safety, 2.Typecast not needed, 3.Compilertime checking  
```java
class MyGen<T>{  
	T obj;  
	void add(T obj){this.obj=obj;}  
	T get(){return obj;}  
}  
```

## Serialization: 
> mechanism of writing obj into byte stream, implement serializable marker interface

Note: it is gonna depreacted not recommended due to security vulnerablities.   
Data exchange formats: JSON, XML. these are alternatives for native serialization. 

```java
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
```java
Scanner scanner = new Scanner(fileObj);  
while (scanner.hasNextLine()) {  System.out.println(dataReader.nextLine());  }  
```  

## Exception handling:  
> Handles Unexpected event that terminate program

1. Checked expception - checked at compile time. ex: ioexception, sqlexception, FileNotFoundException   
2. Unchecked exception - not checked at compile time. ex:nullpointerexception  
3. Error - OutOfMemory, StackOverFlow.  
```java
try {
    throw new Exception("Custom exception message");        
} catch (Exception e) {
    // Handle the exception
} catch (ArithmeticException | NullPointerException e) { 
    // This is a multi-catch block
} finally {
    // Code that always executes, regardless of whether an exception was thrown or not
    // Note: `finally` will not execute if the JVM exits (e.g., System.exit()) or if there's a system crash.
}
```
**Throws** :  indicates caller functions of that method  to handling that exception.  void methodName throws Exception{ }

**Custom Exception class**
```java
class InvalidAgeException extends Exception{  
 InvalidAgeException(String s){  
  super(s);  
 }  
}  
```

| **Exception Type**              | **Description**                                                                 | **Checked/Unchecked** |
|----------------------------------|---------------------------------------------------------------------------------|-----------------------|
| **IOException**                  | Occurs when an input-output operation fails or is interrupted.                  | Checked               |
| **SQLException**                 | Indicates a database access error or other issues with SQL.                     | Checked               |
| **FileNotFoundException**        | Thrown when a file with the specified pathname does not exist.                  | Checked               |
| **ClassNotFoundException**       | Thrown when trying to load a class that cannot be found.                        | Checked               |
| **NullPointerException**         | Thrown when an application attempts to use null where an object is required.    | Unchecked             |
| **ArrayIndexOutOfBoundsException**| Occurs when trying to access an array index that is out of bounds.              | Unchecked             |
| **ArithmeticException**          | Occurs during illegal arithmetic operations, such as division by zero.          | Unchecked             |
| **IllegalArgumentException**     | Thrown when a method receives an illegal argument.                              | Unchecked             |
| **NumberFormatException**        | Occurs when trying to convert a string into a number but the string is not valid.| Unchecked             |
| **ClassCastException**           | Thrown when trying to cast an object to a subclass it is not an instance of.    | Unchecked             |
| **OutOfMemoryError**             | Thrown when the JVM cannot allocate more memory.                                | Error                 |
| **StackOverflowError**           | Thrown when the stack space is exhausted, usually due to deep or infinite recursion.| Error              |
| **NoClassDefFoundError**         | Occurs when the JVM or class loader cannot find a required class definition during runtime.| Error       |


## Annotations:
> metadata that provides data about a program to compiler  

1. Built-In Java Annotations used in Java code
 - @Override: Indicates method is intended to override method in parent class
 - @SuppressWarnings: ignore specific warnings 
 - @Deprecated: indicating code may be removed in future versions
 - @SafeVarargs: indicates method with varargs 
2. Built-In Java Annotations used in other annotations
 - @Target
 - @Retention
 - @Inherited
 - @Documented - ensure class is available in javadoc

### Custom annotation
```java
//optional- specifies where annotation can be applied
@Target(ElementType.METHOD) 
//optional- SOURCE, CLASS, RUNTIME // specify where it is accessible
@Retention(RetentionPolicy.RUNTIME) 
@interface MyAnnotation {
    String value(); int number() default 0;
}
@MyAnnotation(value = "example", number = 5)
public void myMethod() { // method implementation }

```
## Regex:    
**^[a-zA-Z][a-zA-Z0-9]{8,19}**  
- Where  ^ represents the start of the regex   
- [a-zA-Z] represents that the first character must be an alphabet  
- [a-zA-Z0-9] represents the alphanumeric character  
- {8,19} represents that the length of the password must be in between 8 and 20.

```
str.matches("[a-z]+"); //return boolean
System.out.println(Pattern.matches(".s", "as")); //line 4  
```

| Regex		| Description                             | Example             | Matches                                      |
|-----------|-----------------------------------------|---------------------|----------------------------------------------|
| `.`       | Any single character                    | `"a.b"`             | `"aab"`, `"a-b"`, `"a*b"`, etc.            |
| `*`       | 0 or more occurrences                   | `"a*"`              | `"a"`, `"aa"`, `""` (empty string), etc.   |
| `+`       | 1 or more occurrences                   | `"a+"`              | `"a"`, `"aa"`, `"aaa"`, but not `""`       |
| `?`       | 0 or 1 occurrence                       | `"a?"`              | `""` (empty string) or `"a"`               |
| `{n}`     | Exactly `n` occurrences                 | `"a{3}"`            | `"aaa"`                                    |
| `{n,}`    | `n` or more occurrences                 | `"a{2,}"`           | `"aa"`, `"aaa"`, `"aaaa"`, etc.            |
| `{n,m}`   | Between `n` and `m` occurrences         | `"a{2,4}"`          | `"aa"`, `"aaa"`, `"aaaa"`                 |
| `[abc]`   | Any one of the listed characters        | `"[abc]"`           | `"a"`, `"b"`, `"c"`                        |
| `[^abc]`  | Any character except listed ones        | `"[^abc]"`          | `"d"`, `"1"`, etc.                         |
| `(a|b)`   | Either `a` or `b`                       | `"(cat|dog)"`       | `"cat"` or `"dog"`                         |
| `\d`      | Any digit                               | `"\d"`              | `"1"`, `"2"`, `"9"`, etc.                 |
| `\D`      | Any non-digit character                 | `"\D"`              | `"a"`, `"!"`, `" "`, etc.                 |
| `\w`      | Any word character                      | `"\w"`              | `"a"`, `"Z"`, `"9"`, `"_"`, etc.         |
| `\W`      | Any non-word character                  | `"\W"`              | `"!"`, `" "`, `"@"`, etc.                 |
| `\s`      | Any whitespace character                | `"\s"`              | `" "`, `"\t"`, `"\n"`, etc.               |
| `\S`      | Any non-whitespace character            | `"\S"`              | `"a"`, `"1"`, `"!"`, etc.                 |

## Keywords List
1. **Access Modifiers:** private, public, protected
2. **Data Types:** boolean, byte, short, int, long, float, double, char, enum
3. **Control Flow:** if, else, switch, for, while, do, break, continue, return, case, default
4. **Oops:** abstract, class, interface, extends, final, implements, interface, instanceof, new, package, super, this
5. **Exception Handling:** try, catch, finally, throw, throws
7. **Module System:** exports, import, module, opens, provides, requires, to, uses
9. **Others**: _ , record
10. **For future use**: strictfp, goto
11. **Variable modifier**: volatile, transient
12. **Method modifier**: native, synchronized, static
