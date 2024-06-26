# Object oriented programming  
> programming paradigm based on concept of object which contains attributes and methods.

**Need of oops**: loose control(easy to extend/improve), avoid code repetative, readability
### For ex: 
to understand class object. take shapes as class and box is shape model    
**attributes** are characteristics of Box is length, breadth, heigth  
**methods** are abilities/functionalities of Box. eg: calculateVolume(){l*b*h}  

## Class  
> template or blueprint for object (defines variable and methods) noun & verbs    

1. Regular class
1. Nested class : A.B bObj = Aobj.new B();  
2. Nested static: A.B Bobj = new A.B();  
3. Anonymous : A obj = new A(){.........}  

### Steps to create immutable class: 
> class and variables are final, parameterized constructor, only getters no setters, return a copy on clone

Note: ClassNotFoundException=  while Class.forName() or loadClass()   
NoClassDefFoundError=class present in compiletime, but not in runtime    

## Constructor  
> special type of method, been called while intialize object,   
Note: it has no return type, we cannot make constructor final.  

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
automatic destruction, if no references to an object exist  
uses Mark and Sweep algorithm    
System.gc(); invoke garbage collection.  
it is caused by three ways:    
	1. while nullfying the object     rajesh obj1=new rajesh();    obj1=null;  
	2. while assigning reference to other         obj1=obj2  
	3. while using anonymous object  
**Finalize() Method** : Called before GC  
**Memory leak**:  objects no longer used, unable removed by garbage collector. cause OutOfMemoryError. Solution: Memory management tools   

## Methods  
> block of code that perform specific task.
> it has name,argument and return type

pass by reference: done by passing object  
**var-arg** :  void methodname(int ...a){//use as a[];}  

## Encapsulation:   
> hiding data

1. Access Modifiers:  
	i) Public- Any class any package  
	ii) Default- Specific package - default if no specifier mentioned  
	iii) private - Specified Class  
	iv) protected –subsiding class(inheritance)  
2. Non Access Modifiers:  
	i) final - cannot be overrided/modified/extended  
	ii) abstract - does not have method body, cannot create object directly    
	iii) static - belong to class rather object   
	iv) transient - attribute&methods skipped while serialization  
	v) synchronized - can access by one thread at a time  
	vi) volatile - value not cached for thread level rather in Main memory level   
Note: we cannot use private, protected in class, but we can use in innerclass 

## Inheritances  
> one class acquires the properties of another class.  

if I call a constructor of child class, first parent class constructors will execute than only base class constructor
1. Single inheritance
2. Multilevel inheritance
3. Hierarchical inheritance
*Super keyword* :  ```super.variablename; super.methodname(); super();```

## Polymorphism  
> ability to define a method(&constructor) in many forms     

1. Method overriding : same method name, same no. of arguements, same type ie.static/compiletime  
2. Method overloading : same method name, diff no. of arguements, diff type ie.dynamic/runtime  

## Abstraction  
> Hiding the implementation  

1. Abstract(0 to 100% ) 
2. Interface (100%) - variables are public static final by default, methods are public abstract  
	a) Normal interface  
	b) Marker interface - empty body eg:cloneable, serializable  
	c) Functional interface - have only one method declaration  
	d) defualt access modfier, method which has body	  


## Relationship
1. IS-A relationship. also called as inheritance    
eg: Circle(child class) IS A Shape(parent class)    
2. HAS-A reltionship. also called as association.    
eg  Circle(class) HAS A radius(attribute)  
eg: Circle(class) HAS A CalculationUtil(class)  

**Forms of Association**:  
1. Aggregation  - week bond  
eg: Car HAS A MusicPlayer  
2. Composition  - strong bond  
eg: Car HAS A Engine  

