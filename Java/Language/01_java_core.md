## Java

- **JDK** is (JRE+devTools) - For developer contains javac,debugging tools,archieve tool(jar), javadoc  
- **JRE** is (JVM+lib) - For layman users to run java program  
- **JVM** is Interpreter execute byte code to machine code, contins JustInTime compiler  
- **ClassLoader**: part of JRE, loads class file to JVM  

Java is not fully oops language, due usage of primitive datatypes.

``` 
import java.Io.*;	//this package used while code in notepad  
import java.util.Scanner ;
class Hello{
  public static void main(String[]args){
    Scanner input = new Scanner(Sytem.in);
    a=input.nextInt();
    System.out.println(); //print only one line and move to next line
    System.out.print(); //print line and remain in same line we have to give \n
    System.out.printf(“%d”,$i); //print string stream
  } 
}
```
### Comments:    
1. Singleline: (//) 
2. Multiline: (/*.. */) 
3. Documentation: (/**…\*/)  

### Packages:   
Collection of similar classes, interfaces and sub packages.  
```import pkg1 [.pkg2].(classname | *); //import java.io.*;```  

### Commands
- how to compile: ```javac -d directory javafilename.java```   	
- how to run: ```java myppack.javafilename```  
- how to define a package in that program: ```package packagename;```  
- how to import package: ```import packagename.\*;```  
- how to import using fully qualified name without import keyword: ```package classname```;  

**Keywords:** Predefined meaning (53) words.  
**Constant:** Immutable. Declare as final static.  eg: static final double PI=3.14   
if it is declared as private inside a class, it can be redeclare in another class  

**Variable:**  Basic unit of storage  1.**Local variable**:inside method 2.**Instant variable**:inside clas 3.**Static variable**:Declared as static  
**Datatype:** Predefined memory storage  
byte = -+128| 1 byte   
short = -+32,768 | 2 byte   
int = -+2,14,74,83,648 | 4 byte   
long = -+9,22,33,72,03,68,54,775 | 8 byte  
float = . after 6 digit| 4 byte   
double = . after 15 digit| 8 byte   
char = A-Z a-z 0-9 0-127ASCII| 2 byte   
boolean = 0 1| depends on jvm   

Binary can be represent as adding "0b"   ex: int a = 0b011;  
Hexadecimel can be represnt as adding "0x" ex: int a = 0x2A;  
**Typecasting:**  Convert one datatype to another
1.implicit casting    2.explicit casting
```int a = (int) 3.14;	//3```   
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
	3. ```s1.compareTo(s2);``` compare string lexicographically. ie <0,>0
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
|Bitwise Operator  |** &, <<, >>, >>>**  |
|Special Operator  |**instanceof, (.)**  |
|Unary Operator  |**~, !**  |  
```
int a=10; int b=-9;  
System.out.println(~a);//-11 (minus of total positive value which starts from 0)    
System.out.println(~b);//9 (positive of total minus, positive starts from 0)   
```  
Arithmetic operator order: System.out.println(10*10/5+3-1*4/2);  is 21  
Left shift operator: 10<<2 is 10\*2^2= 40   
Right shift operator: 10>>2 is 10/2^2= 2    , when negative number it will -2
Bitwise operator & : (a>1&b<3) second condition also been check, where && wont go to second condition   
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
7. Instance block { } inside class, runs after static block & before constructor
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
 - can use null value \ *Autoboxing:* primitive into wrapper- it uses cache value
``` 
int j=1;
Integer i = Integer.valueof(j);  or Integer i =j;
```
 *Unboxing* : wrapper into primitive
 ```
 Integer i = new Integer(7);
 int = i.intValue();  or  int j=i;
 ```
 **Generics**: parameterized types

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
3. error - OutOfMemory, StackOverFlow.  
```
try{
	throw new exception_name(“”);        
}
catch(exception e){ }
catch(arithmeticException|Exception e){} //this is multicatch
finally{}// occur for sure even though exception handled or not.
```
**Throws** :  void methodName throws Exception{ }



---

**Annotations**:
1. Built-In Java Annotations used in Java code
 - @Override
 - @SuppressWarnings
 - @Deprecated
2. Built-In Java Annotations used in other annotations
 - @Target
 - @Retention
 - @Inherited
 - @Documented

**Regex**:  
**^[a-zA-Z][a-zA-Z0-9]{8,19}**  
Where  
^ represents the start of the regex   
[a-zA-Z] represents that the first character must be an alphabet  
[a-zA-Z0-9] represents the alphanumeric character  
{8,19} represents that the length of the password must be in between 8 and 20.
```
import java.util.regex.*;  
System.out.println(Pattern.matches(".s", "as")); //line 4  
```
**Features of Java 8**:  
1. Lamdbda Expression  (arg)->{body}
2. Method reference : shortcut to lambda expression    
	i) staticMethod reference - className::Method  
	ii) InstanceMethod reference - objectName::Method   
	iii) constructor reference - className:: new   
4. Optional  - avoi NullpointerException smartly  
5. Functional interface  - have only on abstract method inside interface. Eg:Runnable  @FunctionInterface . can have default and static method with body
6. Default Method - default has method body and also static method allowed inside interface  
7. Stream API
8. Date time API  
