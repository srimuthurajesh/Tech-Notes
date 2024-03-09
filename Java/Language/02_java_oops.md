# Object oriented programming  
> it is a programming paradigm like procedural programming paradigm.

### For ex: 
to understand class object. take car as class and tata is brand model    
**attributes** are characteristics of car. eg: start, stop, speedup  
**methods** are abilities functionalities of car. eg: color, seat count  

## Class  
> template or blueprint for object (contains states & behaviour)  

1. Nested class : A.B bObj = Aobj.new B();  
2. Nested static: A.B Bobj = new A.B();  
3. Anonymous : A obj = new A(){.........}  

### Steps to create immutable class: 
> class and variables are final, parameterized constructor, only getters no setters  

Note: ClassNotFoundException=  while Class.forName() or loadClass()   
NoClassDefFoundError=class present in compiletime, but not in runtime    

## Constructor  
> intialize object, no return type, cannot make constructor final.  

**super()** must call first line of child class constructor  
**this()** will call current class constructor  

## Object  
> instant of a class

``` 
ClassName obj = new ClassName(); //
LHS (heap) reference = RHS (stack) instance

```
### Anonymous object 
> for one time use.

new ClassName().functionName();  
new ClassName().variableName = value  

### Functions of object class:  
1. toString()  - String representation of an Object 
2. hashCode() - JVM generates a unique number
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
**var-arg** :  void methodname(int...a){//use as a[];}  

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
	v) synchronized - can access by oone thread at a time  
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
> ability to define a method(constructor) in many forms     

1. Method overriding : same method name, same no. of arguements, also known as static/compiletime  
2. Method overloading : same method name, diff no. of arguements, also known as dynamic/runtime  

## Abstraction  
> Hiding the implementation  

1. Abstract(0 to 100% ) 
2. Interface (100%) - variables are public static final by default, methods are public abstract  
	a) Normal interface  
	b) Marker interface - empty body eg:cloneable, serializable  
	c) Functional interface - have only one method declaration  
	d) defualt access modfier, method which has body	  


