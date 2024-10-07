## Python

1. [Python I/O](#python-io)
2. [Indentation, Comments, Escape chars](#indentation)
5. [Keywords, Variables](#keywords)
7. [Data Types](#data-types)
9. [Operators](#operators)
10. [Conditional Statements](#conditional-statements)
11. [Loop Statements](#loop-statements)
12. [Functions](#functions)
13. [Class & Object](#class--object)
14. [Inheritance](#inheritance)
15. [Modules](#modules)
16. [File Handling](#file-handling)
17. [Exception Handling](#exception-handling)
18. [Multithreading](#multithreading)
19. [Multiprocessing](#multiprocessing)
20. [Debugging](#debugging)

### Overview
>  interpreted, object-oriented, high-level programming language with dynamic typed
- created by Guido van Rossum on 1991.  
Misc Note: `Python` does not refer to the snake, but comes from the BBC comedy series `Monty Python’s Flying Circus`.

### Python I/O
1. Input: `x = input("Enter something: ")`  	
2. Output: `print("Hello, World!")` 

### Indentation  
> Important Note: Python is indentation-sensitive, meaning indentation is mandatory to define blocks of code.

### Comments:	
1. Single line comment: `#shell comment`  
2. Multi line/docstring: `"""This is a multi-line comment"""` or `'''multi-line comment'''`

### Escape Characters. 
Backslashes \ are used to insert special characters in a string.    
1. \', \" for quotes
2. \t for a tab
3. \n for a new line
4. \\ for a backslash

### Keywords  
35 keywords in python  
`['False', 'None', 'True', 'and', 'as', 'assert', 'async', 'await', 'break', 'class', 'continue', 'def', 'del', 'elif', 'else', 'except', 'finally', 'for', 'from', 'global', 'if', 'import', 'in', 'is', 'lambda', 'nonlocal', 'not', 'or', 'pass', 'raise', 'return', 'try', 'while', 'with', 'yield']`

### Variables:
> name given to a memory location  

```
a=7
print(a)
```

### Data Types:  
#### 1. Number: 
- integer: `a=10`
- float: `a=10.0` 
- complex: `a=10+1j`  	  

#### 2. Dictionary : key value pair  
 `d = {1:'Jimmy', 2:'Alex', 3:'john', 4:'mike'}`  

#### 3. Boolean :
`true/false`  

#### 4. Set: unique values 
`set1 = {'James', 2, 3,'Python'}`

#### 5. string  
> A sequence of characters, defined using single or double quotes. 

`a='rajesh'`  

#### 6. list & tuples: 
- List: Mutable sequence: `lst = ["hi", "Python", 2]`
- Tuple: Immutable sequence: `tup = ("hi", "Python", 2)`    
Example tuple functions: `len(tuple)`  



### Typecasting:  
> allows you to convert data from one type to another:

1. string to int `int('22')`    
2. int to float `float(2)`      
3. float to string `str(3.1)`   

Note: Use type(object) to find the type of an object.   `type(object)`  

### Operators:  

| Arithmetic Operators  | Example	|  
|-----------------------|---------------|
| Exponent				| 2 ** 3 = 8	|
| Modulus/Remainder		| 22 % 8 = 6	|
| Integer division		| 22 // 8 = 2	|
| Division				| 22 / 8 = 2.75	|
| Multiplication		| 3 * 3 = 9		|
| Subtraction			| 5 - 2 = 3		|
| Addition				| 2 fzaq``+ 2 = 4|

|  Other Operators		| Symbols  					|  
|-----------------------|-------------------------------|  
| Arithmetic Operator  	| ** + - * / % ** // **  	|  
| Relational Operator  	| ** <, <=, >, >=, ==, != ** |  
| Logical Operator  	| ** and, or, not **  		|  
| Assignment Operator  	| ** a += 4 **  			|  
| Inc and Dec Operator  | Not supported		  		|
| Tenary Operator		| 'kid' if age < 18 else 'adult'|
| Identity Operator  	| ** is, is not **  		|  
| Bitwise Operator 		| ** &, <<, >>, >>> **  	|  
| Membership operators  | ** in, not in **  		|
| Walrus Operator		| print(my_var:="Hello")	|

	
### Conditional Statements:  
1. If
```
if 5 > 2:
    print("True")
``` 
2. If else
```
if 5 > 2:
    print("True")
else:
    print("False")
```
2. If elif: 
```
if 5 > 2:
    print("True")
elif 5 < 2:
    print("False")
``` 
3. Switch:  
```
match response_code:
	case 200:
		print("OK")
	case 201:
		print("Created")
	case _:
		print("invalid")
```
   
### Loop Statements:
1. For    
```
for n in lists:
	print(n)	
```
2. For else: else block execute when break used inside for  
3. While
```
while counter < 10:  
	counter = counter + 3  
```
3. Loop control statement: break, continue, pass
4. Range: starts from 0, increments by 1
```
for i in range(5):
	print('printed {i}')
```
5. sys.exit(): exit from script
   
### Functions:
> Functions in Python are defined using the def keyword:

```
def functionName(arg1,arg2=defaultVal):
	#function body
	return something
```	
### Function calling:   
1. without arg key word: `functionName('val1','val2')`  
2. with arg key word: `functionName(arg2='val1',arg1='val2')`  
for code readability, no need arg order    
3. Variable-length arguments (*args)`def add(*num)	#can be called add(1),add(1,2), add(1,2,3)`
4. Anonymous(lamda) function: `func = lambda x: x + 1`
5. Global statement: `global variableName=5`    #to make changes in global variable inside function  	
			
## Class & Object:
> classes define the blueprint for creating objects.

```
class ClassName:
	num = 4
	def __init__(self):
		print('this is constructor')
	def add(self,x):
		self.num = self.num + x
obj = ClassName()		#creating object
obj.num					#accessing variable
obj.add(3)	 			#accessing function	
```

### Inheritance:
> acquires properties from parent to child class

Note: Python supports single and multiple inheritance.  
```	
	class Parent():
	class Child(Parent):	#child inherited parent	if overriding occurs, current class func overrides parent class function
	class StepParent:
	class Child(Parent,StepParent):	#multiple inheritance, if overriding occurs, 1st arg override 2nd arg
```	
		
### Modules:
>  allow you to organize code into separate files.

```
import my_module
my_module.function_name()
my_module.variable_name

from my_module import function_name
```

Types of import:	
1. import myModule as mx		#we can use module as mx
2. from myModule import variableName	#import particular variables from module  
Note: dir(myModule)				#print all functions available in that module		

### File Handling:

#### Modes:
1. r - Read
2. w - Write (overwrite)
3. a - Append
4. x - Create (if file doesn't exist)
5. t - Text mode
6. b - Binary mode

### File reading	  
```
file = open('file.txt', 'rt')
content = file.read()
file.close()
```
### File Writing  
```
file = open('file.txt', 'w')
file.write("New text")
file.close()
```

### Using OS  
```
import os
os.remove('file.txt')
```	

### Exception Handling:
```
	try:
		number = int(input("What is your fav number?"))
		print(18/number)
	except ValueError:
		print('Make sure you are entering a number')
	except ZeroDivisionError:
		print('Dont enter Zero')
	except:
		print('something error, but i dunno what')				
	finally:
		print('it will print finnaly, whatever happended')
```

### Multithreading:
	
```
import threading
class MyThread(threading.Thread):
    def run(self):
        print(threading.currentThread().getName())

thread1 = MyThread(name="Thread 1")
thread2 = MyThread(name="Thread 2")

thread1.start()
thread2.start()
```	

### Multiprocessing: 
```
import multiprocessing
def my_function():
    print("Hello from process")

process1 = multiprocessing.Process(target=my_function)
process1.start()
process1.join()
```	
### Debugging:
```
	import logging
	logging.debug('program starts')
	logging.debug('program ends')	
```
	
### Json
1. Json encode: `json_dumps(dictVariable)`
2. Json decode: `json_loads(string)`

### Iterator:
itr = iter(obj)		#we can call next value by using   next(itr)

### Generator: 
> simple way to create an iterator

```
	def gen():
		yield "one"
		yeild "two"
	Now we can gen as iterator 	
```
### Commandline arguments:
```
	parser = argparse.ArgumentParser()
	parser.add_arguement("firstargName")
	args =parser.parse_args()
	print(arg.firstargName)
```
### For Loop

### 1. Enumerate:
The `enumerate()` function allows you to loop through a list while keeping track of the index position:

```
presidents = ["Washington", "Adams", "Jefferson", "Madison", "Monroe", "Adams", "Jackson"]
for num, name in enumerate(presidents, start=1):
    print(presidents[num])
```
2. ZIP:
	```	
		colors = ["red", "green", "blue", "purple"]
		ratios = [0.2, 0.3, 0.1, 0.4]
		for color, ratio in zip(colors, ratios):
			print("{}% {}".format(ratio * 100, color))	
	```