# JavaScript Notes

## Table of Contents

- [Overview](#overview)
- [Identifiers](#identifiers--total-48)
- [Variables](#variable)
- [Data Types](#datatype)
- [Arrays](#array)
- [Strings](#string)
- [Numbers](#number)
- [Operators](#operator)
- [Conditions](#conditions)
- [Loops](#loops)
- [Functions](#function)
    - [Closure](#closure)
    - [Arrow Functions](#arrow-function)
    - [Default Parameters](#default-parameter)
    - [Spread Operator](#spread-operatorrest-parameters)
- [Objects](#object)
- [Classes](#class)
- [Call, Apply, Bind](#call-apply-bind)
- [Advanced Object creation](#advance-object-creation)
- [Collections](#collections)
    - [Set](#sets)
    - [Map](#maps)
    - [Weakset](#weaksets)
- [Asynchronous Operations](#asynchronous-operations)
    - [Promises](#promise--resolvereject)
    - [Async Await](#async-await)
- [Error Handling](#error-handling)

## Overview
> Javascript developed by Brendan Eich, Netscape,1995. Mocha->Livescript->javascript

**Developed By**: Brendan Eich at Netscape in 1995.
**Name Evolution**: Mocha → LiveScript → JavaScript.
**Script Tag**: <script type="text/javascript"> — type="text/javascript" is optional.
External JS Files: Can be cached by browsers for faster load times.
Strict Mode: 'use strict'; enables the latest JavaScript features and helps avoid common errors.
JavaScript Characteristics:
Whitespace: Ignored by JavaScript.
Case-Sensitive: Variable names, function names, etc., are case-sensitive.

- Why name as script – it execute as the page loads
- `<script type="text/javascript">` type="text/javascript" is not needed
- External js files can be stored as cache in browsers
- `’use strict’;` to use only latest functionality of javascript versions
- whitespace, case-sensitive



### Identifiers- total 48
```
break,as,any,switch,case,if,throw,else,var,number,string,get,module,type,instanceof,typeof,finally,for,enum,export,while,void,this,new,null,super,catch,let,static,return,true,false
```

### Variable:
> named storage of a data, case sensitive    

1. **var** name="rajesh";     //scope dependent for a function or window object  
2. **let** name="rajesh"    //used as block scope, cannot be re-declared  
3. **const** NAME="rajesh"    //cannot be reassigned, redeclared, requires declaration, immutable  
4. **Template literal**: can use ${name} inside string.   var name = ‘rajesh’;  console.log("my name is ${name}");  
    -  var {name,age,job}={name:"rajesh",age:"22",job:"it"};            console.log(name);    //rajesh

Note:  
- name must contain only letters, digits, or the symbols $ and _.  
- first character must not be a digit.  

### Datatype:
> specifies type of data in a variable

| **Data Type**  | **Range**                | **typeof Return** |
|----------------|--------------------------|-------------------|
| **Number**     | ±9,007,199,254,740,991   | `"number"`        |
| **BigInt**     | No limit                 | `"bigint"`        |
| **String**     | sequence of characters   | `"string"`        |
| **Boolean**    | `true` or `false`        | `"boolean"`       |
| **Undefined**  | undefined                | `"undefined"`     |
| **Null**       | null                     | `"object"`        |
| **Symbol**     | N/A                      | `"symbol"`        |
| **Object**     | key-value pairs          | `"object"`        |
| **Function**   | N/A                      | `"function"`      |

Note: number also support nfinity, -Infinity and NaN


### Array: 
let arr = new Array();  
let arr = [];var arr["name",’age’,’job’]=["rajesh","12",’vetti’];          console.log(arr["name"]); //rajesh  
[1,2,3].includes(2);                //return true false  
[1,2,3].findIndex (2);                //return true false  
#### Array functions:
1. arr.pop();                    //remove last element
2. arr.shift();                   //remove element at begining
3. arr.push(4);                    //insert element at end ,arr is now [1,2,3,4]
4. arr.unshift(0);                    //insert element at beginning ,arr is now [0,1,2,3,4]
5. arr.length;
    
### String:  
"Hello world".include("world");        //return true false  
"Hello world".startswith("H", index);        //return true false    
"Hello world".endswith("d", index);        //return true false  
"sorry ".repeat(100);            //print sorry 100 times  
String.raw"it is not new line /n"        //print as it is - it is not new line /n  

### Number:  
let billion = 2000;      //can written as       let billion = 2e3;  
let millisec = 0.002;    //can written as        let millisec = 2e-3     
Hexad:    alert( 0xff ); // 255    alert( 0xFF ); // 255 (the same, case doesn't matter)  
num.toString(base);     eg.a=3; a.toString(2);    //0011      default base is 10  
Two dots:   directly called from number.      3.toString(2);    //0011  
Infinity (and -infinty) represents great (or less) than anything.      isFinite(number);    //checks whether its not infinity  
NaN represents a non number type                isNan(number);     //checks whether is not number  

### Operator:  
Destructing assignmet: var [a,b]=[1,2];   
                       var sample=[a,b]; sample=[1,2];      a=1,b=2      
    
### Conditions:
if  
if..else  
nested if else if  
switch case  

### Loops:
for  
while  
do...while  
Loop control:   
break:  
continue:  
for...in        for(key in obj){ console.log(obj[key]);}  
for...of        for(arrKey of arr){ console.log(arrVal);}  

### Function:
function functionName(){...body....}  
functionName();    //function calling  
- function cannot be access outside scope
    if(true){function add(){…}} add();//cannot be called, undefined

#### Closure
> closure can remember environment variables in which it was created, allowing it to access variables from that scope even after the outer function has finished executing.

```js
function outerFunction() {
    let outerVariable = "I'm from outer scope!";
    function innerFunction() {
        console.log(outerVariable); // Accessing outerVariable from outerFunction
    }
    return innerFunction; // Returning the inner function
}
const closureFunc = outerFunction(); // outerFunction executes, but innerFunction is still accessible
closureFunc(); // Logs: I'm from outer scope!
```
#### Arrow Function:
let functionName = (parameter)=>{...function body..…};
it does not have its own this object. 
eg:     
```js
var obj = {name:"rajesh",
    getName: function(){ (function(){console.log(this.name)})();  },
    getNameArrow: function(){ (()=>{console.log(this.name)})(); }
}
obj.getNameArrow();        //print rajesh
obj.getName();            //undefined
```
    
#### Default parameter:
1. Primitive    function get(i=1){ return i;}    get(undefined);
2. Array        function get(a=[]){return ...a;}    get([5]);    
3. Object        function get({a=5}={}){return }     x={a:5}; get();    

#### Spread Operator(rest parameters)

```js
function bigNum(a,b, ...argArray){
    //a=1,b=2,arrgArray is an array[3,4,5]
}
```

We can combine two arrays. a=[1,2,3];  b=[4,5];     c= [...a,...b];        //c is [1,2,3,4,5]  
console.log(...a);    //1 2 3  
We can combine two arrays. A=[3,4,5];b=[1,2]; a.push(...b); instead of // Array.prototype.push.apply(a,b);  

Note: this operator also use for shallow copy(only first level not applicable for nested objects)  
```js
var a={name:'UST', age:17};
var b= {...a}; //shallow/new copy
b.age = 18; console.log(a.age);//17
```

### Object:  
1. via constructor `let user = new Object();`  
2. via literal `let user = {};`    
delect user ;    //to delete the object    
- {} means each time new reference allocated  
- can use object key with text, but need to use quotes  
- Objects are muttable

  
**Comparing object** : 1. individual values, 2. json stringify    
**Const object**:     it is changeable, but cannot be reassign  
**Clone object**:    newObj = Object.assign({},oldObj);  
**Garbage collections**: The variable and objects which cannot be reached, get destroyed  

#### Object wrapper:   
    Primitive datatypes is no an object, but a object wrapper is temporarily created while using it functions eg.str.split() . But for null,undefined there is no functions and no object wrapper created.  
eg. str = new String("rajeh"); str.test=5; console.log(str.test);//undefined  


### Class
Es6
```js
function Cricketer(name,age,position){
      this.name=name; this.age=age; this.position=position;
 }
 Cricketer.prototype.changePosition=function(position){
   this.position=position;
 }
var cricketer = new Cricketer("rajesh","22","batting");
console.log(cricketer);
crickter.changePosition("bowler");
console.log(crickter);
```
```js
class Cricketer {
    constructor(name,age,position){
        this.name=name;this.age=age;this.postion=position;
    }
    changePosition(position){
        this.position=position;
   }
}
let crickter = new Crickter("rajesh","2","batting");
console.log(crickter);
crickter.changePosition("bowler");
console.log(cricketer);
```

#### Call Apply Bind:   
These methods are useful for controlling the value of this within a function  
var obj = {num:2};    
var func=function(a,b){ console.log(this.num+a+b);}  
`func.call(obj,1,2);`  //**call** allows you to explicitly set the context (the value of this)   
`func.apply(obj,[1,2]);`  //**apply** same like call but get arguments as array  
`var bound = func.bind(obj);`     bound(1,2);   //**bind** unlike call,apply it won't immediately invoke, instead return a function  

Note: Arrow functions (=>) in JavaScript do not have their own this binding and do not have call, apply, or bind methods.

## Advance Object Creation     
#### create: 
- create an empty object.  Make the given arg object as prototype of the created empty object  
    oldObj = {this.name:"rajesh"}  
    Object.create(oldObj);    //create obj {_proto_:this.name:rajesh………}
eg:
```js
var Car = function(){ this.color='red'; }
Car.prototype.getColor=function(){ return this.color; }
var ToyCar = function(){ };
ToyCar.prototype=Object.create(Car.prototype);
ToyCar.prototype.color='orange';
var obj = new ToyCar();
console.log(obj.getColor());
```
It is real alternative for  
let sayHiMixin = { __proto__: anotherObject}  //but we should nor use __proto__ so we using Object.create

#### Object.setPrototypeOf: 
- same like object create but it works for simple{} object literal not function constructor
```js
    var obj1 = {drive:function(){return ‘i can drive’;},    walk:function(){return ‘i can walk’;}};
    var obj2 = { drive(){return super.drive();}}
    Object.setPrototypeOf(obj2.obj1);    //obj1 will get obj1 as a prototype 
    obj2.walk();        //call walk function in obj1 
    obj1.drive();        //call drive function in obj, because of super object.
```     

#### Object .assign: 
- copy and append object to existing(given) object
```js
    var obj1 = {color:’red’};
    var obj2={}; Object.assign(obj2,obj1);     //1st way to assign
    var obj3 = Object.assign({}.obj1);    //another way to assign
    var obj4 = function(){a,b}{ Object.assign(this,{a,b});}        //also used in constructor
```
- you can merge more than one object eg: Object.assign(obj2, obj1.1,obj1.2)
    
## Collections
### Sets: 
collection of unique values   
```js
    var mySet = new Set();
    mySet.add(1).add(2).delete(1).clear();;
    var mySet = new Set([1,2,3,5,4,4,4,4,4]);    //mySet is 1,2,3,4
    console.log(mySet.size);
    for(val of mySet) { console.log(val);}        //can be iterable
```
can convert Sets to array:     console.log([..new Set([1,2,2,3])]);    
                    Array.from(new Set([12,2,3]));      

### WeakSets:  
can have only as objects   
```js
var myWeakSet = new WeakSet([{a:1},{b:2}]);
myWeakSet.add(1);    //throw error
myWeakSet.add({a:1});
```
### Maps: 
can have more than one object key
```js
var myMap = new Map();
myMap.set(a,’a’).set(b:’b’).set(a:’c’).delete(b);
for(let [key,value] of myMap.entries()){
   console.log(key,value);
}
```
#### Methods:     
```js
    new Map();
    map.set(key,value)
    map.get(key)
    map.has(key)
    map.delete(key)
    map.clear()
    map.size
```
### Class constructor:
Super constructor  
```js
class Car{
   construct(arg){}
   func1(){}
   static func2(){}        //inside static we cannot use this object variables        }
class Honda extends Car{
    constructor(arg){ super(arg);….}        //must call super constructer, otherwise error will occur
    func1();    }
var obj = new Car(arg);
```
##  Asynchronous Operations
### Promise – resolve,reject:
> object represents result of asynchronous operation, 
allowing you to handle success or failure once the operation is complete. 

```js
var promise = new Promise(function(resolve,reject){
    setTimeout(function(){ 
    success=true;
    if(success){resolve(‘result’);}        //wait until resolve function beeing called
    else{reject(‘sorry’);}        },1000);        
});
promise.then( function(resolveResult){ ….handle resolveResult…}).catch(function(rejectResult){….handle reject…});
promise.then( function(resolveResult){ ….handle resolveResult…},function(rejectResult){….handle reject…});
promise.then( null,function(rejectResult){….handle reject…});    //to handle only error
promise.all([promise1, promise2….promisen]);  
```

### Async Await::
```js
var promise1 = new Promise((resolve,reject)=>{setTimeout(resolve("rajesh"),3000);});  
var promise2 = new Promise((resolve,reject)=>{setTimeout(resolve("23"),3000);});  
var promise3 = new Promise((resolve,reject)=>{setTimeout(resolve("not a bad guy"),3000);});  

var callSync=async ()=>{  
    var promresult1 = await promise1;  console.log("his name is :"+promresult1);        //his name is rajesh  
    var promresult2 = await promise2;  console.log("his is :"+promresult2);            //his is 23  
    var promresult3 = await promise3;  console.log("sometimes he is  :"+promresult3);    //his not a bad guy  
return 'success';  
}  
callSync().then((resultText)=>console.log('result is '+resultText));  
```
Await should use only inside async:    syntax: await promiseName; //the js will pause until result come from promise

### Iterator:    
var arr=[1,2];    
var iterator=arr[Symbol.iterator]();  
console.log(iterator.next());        //{value:1,done:false}  
console.log(iterator.next());        //{value:2,done:false}  
console.log(iterator.next());        //{value:undefined,done:true}  

### Generator:    
function *generatorFunc(){ yield 1; yield 2; yield* anotherGenerator(); yield 5;}  
function* anotherGenerator(){yield 3; yield 4;}                                        //each yield is not created until it gets called by next()  
var generator = generatorFunc();        
console.log(generator.next());            //{value:1,done:false}  
console.log(generator.next());            //{value:2,done:false}  
console.log(generator.next());            //{value:3,done:false}      
console.log(generator.next());            //{value:undefined,done:true}  

### Errors:
1. Syntax error-   eg. `Unexpected token`
2. Reference error eg. `a is not defined`
3. Type error      eg. `a is not a function`
                    
### Event Bubbling:  
event listeners fires not only on single element, but also fires from all its Dom parents  
### Event Delegation:   
event listeners fires not only on single element, but also fires from all its Dom decendents   

## Error Handling
> manage error gracefully

```js
try {
  let result = someFunction();
} catch (error) {
  console.log("An error occurred: " + error.message + error.stack + error.name);
} finally {
  console.log("This will always run, even if an error occurs.");
}
```
Throw statement: `throw new Error("Age cannot be negative");`  
Customer error:   `throw new TypeError("This is a type error");`
