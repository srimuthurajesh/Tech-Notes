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
> Oops is a programming paradigm(style), based on concept of object & class  

**Adv of oops**: easy to extend/improve, code reusability, readability
### Example: 
- to understand class object. take shapes as class and box is shape model    
**Attribute** are characteristics of Box ie:length, breadth, height   
**Methods** are abilities/functionalities of Box. eg: calculateVolume(){l*b*h}    

## Class  
> template or blueprint for object (defines variable and methods) ie:noun & verbs    

### Types of Classes:
1. Regular class
1. Nested class : OuterClass.InnerClass obj = outerObject.new InnerClass();   
2. Nested static: OuterClass.NestedStaticClass obj = new OuterClass.NestedStaticClass();   
3. Anonymous : A obj = new A(){//class body};    

### Steps to create immutable class: 
1. Make class & variables as final.
2. Use parameterized constructor to initialize variables.
3. Provide only getters (no setters).
4. Return a copy of objects in the clone() method.

##### Common class Exceptions:
1. **NoClassDefFoundError**: Class present at compiletime but missing at runtime.    
2. **ClassNotFoundException**: Occurs during runtime, Class.forName() or loadClass(   

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
>  created and used only omce without assigning    

`new ClassName().functionName();`  

### Methods of Object class:  
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
**Finalize() Method** : Called before Garbage Collector  
Note: finalize method deprecated in java9 & removed in java18. use  `AutoCloseable` and `try-with-resources`         
cause OutOfMemoryError     

## Methods  
> block of code that perform specific task.
> it has methodName, arguments, returnType & returnValue  

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

#### Super keyword:  
1. super.variablename;    
2. super.methodname();    
3. super();  - explicitly call a specific constructor of the parent class  
Note: When child constructor is called, parent constructor is executed first automatically without super().  

## Polymorphism  
> ability to define a method(&constructor) in many forms     

1. Method overriding : same method name, same no. of arguements, same type ie.static/compiletime  
2. Method overloading : same method name, diff no. of arguements, diff type ie.dynamic/runtime  

#### Method overriding Scenarios:     
1. Covariant Return Type - allowed     
	`ParentClass getValue(){} -> ChildClass getValue(){}`  
2. Subclass or without Exceptions:  allowed  
	`int getValue() throws IOException{} -> int getValue() throws FileNotFoundException{}`     
	`int getValue() throws IOException{} -> int getValue(){}`   
3. Access Modifiers - same or narrow access allowed 
	`protected void show()-> public void show()`    
4. Static method:  method hiding will happen not overriding 
	`static void show(){} -> static void show(){} `
5. Synchroniezed method: allowed, no effect    
	` synchronized void execute() {} -> void execute() {} `  
6. Varargs Methods: allowed  
	`void log(String... messages) {} -> void log(String... messages) {}`

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

