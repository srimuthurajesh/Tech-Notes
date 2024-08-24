# Object oriented programming  

- [Introduction](#introduction)
- [Class](#class)
- [Constructor](#constructor)
- [Object](#object)
- [Methods](#methods)
- [Encapsulation](#encapsulation)
- [Inheritance](#inheritance)
- [Polymorphism](#polymorphism)
- [Abstraction](#abstraction)
- [Other Topics](#other-topics)

## Introduction
> programming paradigm based on concept of object which contains attributes and methods.

**Need of oops**: loose control(easy to extend/improve), avoid code repetative, readability
### Example: 
to understand class object. take shapes as class and box is shape model    
**attributes** are characteristics of Box is length, breadth, heigth  
**methods** are abilities/functionalities of Box. eg: calculateVolume(){l*b*h}  

## Class  
> template or blueprint for object (defines variable and methods) noun & verbs    

### Types of Classes:
1. Regular class
1. Nested class : A.B bObj = Aobj.new B();  
2. Nested static: A.B Bobj = new A.B();  
3. Anonymous : A obj = new A(){.........}  

### Steps to create immutable class: 
1. Mark the class and its variables as final.
2. Use a parameterized constructor to initialize variables.
3. Provide only getters (no setters).
4. Return a copy of objects in the clone() method.

### Common Exceptions:
**ClassNotFoundException**: while Class.forName() or loadClass()   
**NoClassDefFoundError**: class present in compiletime, but not in runtime    

## Constructor  
> special type of method, been called while intialize object     

Note: it has no return type, cannot be final.  

1. Default Constructor. 
2. Parameterized Constructor  

**super()** must call first line of child class constructor  
**this()** will call current class constructor  

## Object  
> instant of a class

``` 
ClassName obj = new ClassName(); //
LHS (heap) reference = RHS (stack) instance
```
### Anonymous object 
> created without assigned to any variable, for one time use.  

new ClassName().functionName();  
new ClassName().variableName = value  

### Methods of object class:  
1. toString()  - String representation of an Object 
2. hashCode() - JVM generates a unique number, used for hash based DS. 
3. equals(Object obj) - Compares the given object to “this” object 
4. getClass() - Returns the class object of “this” object 
	Class c = obj.getClass(); c.getClassName();
5. finalize() -  called just before an object is garbage collected
6. clone() - returns a new object
7. wait(), notify() notifyAll()  - related to Concurrency 

### 4 ways to create object  
1. New keyword
2. clone()   
3. class.forName("classname").newInstance();
4. Deserialization while readObject()
	
### Garbage collection  
> Automatic memory management that destroys objects that are no longer referenced.  

- uses Mark and Sweep algorithm    
- System.gc(); invokes garbage collection.  
#### Ways Garbage Collection is Triggered:
	1. while nullfying the object     rajesh obj1=new rajesh();    obj1=null;  
	2. while assigning reference to other         obj1=obj2  
	3. while using anonymous object  
**Finalize() Method** : Called before GC  
**Memory leak**:  objects no longer used, unable removed by garbage collector. cause OutOfMemoryError. Solution: Memory management tools   

## Methods  
> block of code that perform specific task.
> it has name,argument and return type

**Varargs** : Allows passing a variable number of arguments to a method  
`void methodname(int ...a){//use as a[];} ` 

## Encapsulation:   
> hiding data

### Access Modifiers:  
1. Public- Any class any package  
2. Default- Specific package - default if no specifier mentioned  
3. private - Specified Class  
4. protected –subsiding class(inheritance)  

### Non Access Modifiers:  
1. final - cannot be overrided/modified/extended  
2. abstract - does not have method body, cannot create object directly    
3. static - belong to class rather object   
4. transient - attribute&methods skipped while serialization  
5. synchronized - can access by one thread at a time  
6. volatile - value not cached for thread level rather in Main memory level

Note: we cannot use private, protected in class, but we can use in innerclass 

## Inheritances  
> one class acquires the properties of another class.  

### Types of Inheritance
1. Single inheritance
2. Multilevel inheritance
3. Hierarchical inheritance

Note: When a child class constructor is called, the parent class constructor is executed first.
#### Super keyword*:  
1. super.variablename;    
2. super.methodname();    
3. super();  


## Polymorphism  
> ability to define a method(&constructor) in many forms     

1. Method overriding : same method name, same no. of arguements, same type ie.static/compiletime  
2. Method overloading : same method name, diff no. of arguements, diff type ie.dynamic/runtime  

#### Method overriding Scenarios:     
1. Return Type  
	i) Incompatible Return Type: not allowed  
	`int getValue(){} -> String getValue(){}`
	ii) Same Return Type: allowed 
	`int getValue(){}} -> int getValue(){}`   
	iii) Covariant Return Type - allowed   
	`ParentClass getValue(){} -> ChildClass getValue(){}`  
	   
2. Throws Exception   
	i) Broader or new Exceptions: not allowed  
	`int getValue() throws IOException{} -> int getValue() throws Exception{}`   
	ii) Same exception  - allowed
	`int getValue() throws IOException{} -> int getValue() throws IOException{}`   
	iii) Subclass Exceptions:  allowed
	`int getValue() throws IOException{} -> int getValue() throws FileNotFoundException{}`   
	iv) No Exceptions: allowed  
	`int getValue() throws IOException{} -> int getValue(){}`   
3. Access Modifiers
	i) Same or Broader Access Level - allowed  
	`protected void display() {} -> public void display() {}`  
	ii) Narrower Access Level - not allowed 
	`public void display() {} -> protected void display() {}`	
4. Final method: 
     `public final void calculate() {} -> public void calculate() {} // Not allowed`
5. Static method:
	`public static void show(){} -> public static void show(){} // Method hiding, not overriding`
6. Synchroniezed method: synchronized keyword does not affect method overriding  
	`public synchronized void execute() {} -> public void execute() {} // Allowed`  
7. Varargs Methods: allowed
	`public void log(String... messages) {} -> public void log(String... messages) {}`

## Abstraction  
> Hiding the implementation  

1. Abstract(0 to 100% ) 
2. Interface (100%) - variables are public static final by default, methods are public abstract  
	a) Normal interface  
	b) Marker interface - empty body eg:cloneable, serializable  
	c) Functional interface - have only one method declaration  
	d) defualt access modfier, method which has body	  


## Other Topic
### Relationship
1. IS-A relationship. also called as inheritance    
eg: Circle(child class) IS A Shape(parent class)    
2. HAS-A reltionship. also called as association.    
eg  Circle(class) HAS A radius(attribute)  
eg: Circle(class) HAS A CalculationUtil(class)  

#### Forms of Association:    
1. Aggregation  - week bond  
eg: Car HAS A MusicPlayer  
2. Composition  - strong bond  
eg: Car HAS A Engine  

