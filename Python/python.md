## Python
> widely-used, interpreted, object-oriented, and high-level programming language with dynamic typed
- created by Guido van Rossum on 1991.  
- python means large snake, comes from BBC tv comedy sketch series called Monty Python’s Flying Circus.   

Output: ```print("Hello, World!")```  
Input: ```x=input();```  	

Note: Indentation mandatory.  
### Comments:	
1. Single line comment: #shell comment
2. Multi line/docstring: """.......""" or '''.......'''

### Escape Characters. 
> Use backslashes (\): \' \" \t \n \\			

### Keywords  
35 keywords in python  
```['False', 'None', 'True', 'and', 'as', 'assert', 'async', 'await', 'break', 'class', 'continue', 'def', 'del', 'elif', 'else', 'except', 'finally', 'for', 'from', 'global', 'if', 'import', 'in', 'is', 'lambda', 'nonlocal', 'not', 'or', 'pass', 'raise', 'return', 'try', 'while', 'with', 'yield']```

### Variables:
> name for the memory location  
```
a=7
print(a)
```

### Data Types:  
1. Number: integer(```a=10```), float(```a=10.0```), complex(```a=10+1j```)	  
2. Dictionary : key value pair ```d = {1:'Jimmy', 2:'Alex', 3:'john', 4:'mike'}```
3. Boolean : true/false
4. Set: unique values ```set1 = {'James', 2, 3,'Python'} ```
5. string: works with single/double quote  
6. list, tuples: (```tup=["hi", "Python", 2]```#index works)
**Important functions in tuple**:
len(tuple)  



### Typecasting:  
int('22') #conv string to int   
float(2)  #conv int to float  
str(3.1)  #conv float to string   

### Operators:  

| Arithmetic Operators  | Example	|  
|-----------------------|---------------|
| Exponent		| 2 ** 3 = 8	|
| Modulus/Remainder	| 22 % 8 = 6	|
| Integer division	| 22 // 8 = 2	|
| Division		| 22 / 8 = 2.75	|
| Multiplication	| 3 * 3 = 9	|
| Subtraction		| 5 - 2 = 3	|
| Addition		| 2 + 2 = 4	|

|  Operators		| Symbols  			|  
|-----------------------|-------------------------------|  
| Arithmetic Operator  	| ** + - * / % ** // **  	|  
| Relational Operator  	| ** <, <=, >, >=, ==, != **  	|  
| Logical Operator  	| ** and, or, not **  		|  
| Assignment Operator  	| ** a += 4 **  		|  
| Inc and Dec Operator  | Not supported		  	|
| Tenary Operator	| 'kid' if age < 18 else 'adult'|
| Identity Operator  	| ** is, is not **  		|  
| Bitwise Operator 	| ** &, <<, >>, >>> **  	|  
| Membership operators  | ** in, not in **  		|
| Walrus Operator	| print(my_var:="Hello")	|

	
### Condition Statements:  
1. If: ```if 5>2: ``` 
2. If else: ```if 5>2: else:```  
2. If elif: ```if 5>2: elif 5<2: ```  
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
**Syntax**:  
```
def functionName(arg1,arg2=defaultVal):
	...function body...	
	return something
```	
**function calling**:   
1. without arg key word: ```functionName('val1','val2')```     
2. with arg key word: ```functionName(arg2='val1',arg1='val2')```	#code readability, no need arg order  
3. variable lenght arguement(*): ```def add(*num)	#can be called add(1),add(1,2), add(1,2,3)```
4. Anonymous(lamda) function: ```func = lamda arg1: ...fun body...```
5. Global statement: ```global variableName=5```    #to make changes in global variable inside function  	
			
CLASSES & OBJECTS:
	class ClassName:
		num = 4
		def __init__(self):
			print('this is constructor')
		def add(self,x):
			self.num = self.num + x
	obj = ClassName()		#creating object
	obj.num					#accessing variable
	obj.add(3)	 			#accessing function	

INHERITANCE:
	class Parent():
	class Child(Parent):	#child inherited parent	if overriding occurs, current class func overrides parent class function
	class StepParent:
	class Child(Parent,StepParent):	#multiple inheritance, if overriding occurs, 1st arg override 2nd arg
	
		
MODULES:
	import myModule
	myModule.functionName()		#access function
	myModule.varName			#access variable
	import myModule as mx		#we can use module as mx
	dir(myModule)				#print all functions available in that module		
	from myModule import variableName	#import particular variables from module

FILE HANDLING:
	x=create, r=read, a=append, w=write
	t=textMode, b=binaryMode
	fileObj = open('filaName.text',rt)
	fileObj.read()						#return entire file text
	fileObj.read(n)						#return n number of chars from file
	fileObj.readline()					#we can read line by line, by calling it after and after
	for x in fileObj					#loop each line by using file object	
	fileObj = open('fileName.txt','a')
	fileObj.write('text')				#append text to existing file	
	fileObj = open('fileName.txt','w')
	fileObj.write('text')				#overwrite text to existing file
	fileObj = open('newFile.txt','x')	#new file will be created
	fileObj = open('newFile.txt','w')	#create new file if doesnt exist
	fileObj.close()						#close file object
	import os
	os.remove('fileName.txt')			#delete file
	os.path.exists('fileName.txt')		#check file exist
	os.rmdir('folderPath')				#remove directory
	
EXCEPTION HANDLING:
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

MULTITHREADING:
	import threading
	class ClassName(threading.Thread):
		def run(self):
			for _ in range(10):
				print(threading.currentThread().getName())	
	x=ClassName(name="sending")
	y=ClassName(name="receiving")
	x.start()		#it triggers run function
	y.start()		#it triggers run function
	
	ANOTHER WAY:
	t1 = threading.Thread(target=func1,args(args1))
	t2 = threading.Thread(target=func2,args(args1))
	t1.start()
	t2.start()
	t1.join()
	t2.join()

MULTIPROCESSING
	import multiprocessing
	p1 = multiprocessing.Process(target=func1,args(args1))	
	p1 = multiprocessing.Process(target=func2,args(args1))	
	p1.start()
	p2.start()
	p1.join()
	p2.join()
	
DEBUGGING:
	import logging
	logging.debug('program starts')
	logging.debug('program ends')	
	
	
JSON
json_dumps(dictVariable)		#json encode
json_loads(string)				#json decode

__name__
it will give "__main__" if it called from actual page
it will give "__anotherPageName__" if it called from another page


ITERATOR:
itr = iter(obj)		#we can call next value by using   next(itr)

GENERATOR: simple way to create an iterator
	def gen():
		yield "one"
		yeild "two"
	Now we can gen as iterator 	

COMMANDLINE ARGUEMENT:
	parser = argparse.ArgumentParser()
	parser.add_arguement("firstargName")
	args =parser.parse_args()
	print(arg.firstargName)
	
Find type of object; using syntax   type(object)
FORLOOP: 
	ENUMERATE:
		presidents = ["Washington", "Adams", "Jefferson", "Madison", "Monroe", "Adams", "Jackson"]
		for num, name in enumerate(presidents, start=1):
			print(presidents[num])
	ZIP:
		colors = ["red", "green", "blue", "purple"]
		ratios = [0.2, 0.3, 0.1, 0.4]
		for color, ratio in zip(colors, ratios):
			print("{}% {}".format(ratio * 100, color))	
