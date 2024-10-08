## PHP - Hypertext-pre-processor
- created by Rasmus Lerdorf in 1995
- originally stood for Personal Home Page.
- Interpreted language (no need to compile)
- we need 3 things to run php 1) php parser(cgi or server module) 2)webserver 3)browser


```<?php     ?>``` tell php parser to start and stop  
```<% %>```, ```<script language=php >``` are deployed in previous versions  
```<? ?>``` it is not preferable, need to change short_open_tag in php.ini  
- If a file is pure php code it is preferable to omit php closing tag at end of file
  
```<?php echo "welcome to php"; ?>```
```<?php  ‘welcome to php’ ?>```

### Comments
1. Single line: ```//comments```  
2. Multiline: ```/* block comments*/```
3. Single line: ```#shell comments```

### Identifiers 
- Anything that has a value is called Identifier- total 77

```__halt_compiler(), abstract, and, array, as, break, callable, case, catch, class, clone, const, continue, declare, default, die(), dom, echo, else, elseif, empty(), enddeclare, endfor, endforeach, endif, endswitch, endwhile, eval(), exit(), extends, final, finally, for, foreach, function, global, goto, include_once, instanceof, insteadof, interface, isset, list, namespace, new, or, print, private, protected, public, require, require_once, return, static, switch, throw, trait, try, unset, use, var, while, xor, yield``` 	

### Datatype : 	
- Loosely typed language, no datatypes syntax
1. Scalar   
	1. int - whole number, equivalent C lang ‘long’ . 32Bit. –2,147,483,648 to +2,147,483,647. 
		- can be written in decimal, hexadecimal (prefixed with 0x), and
		- octal notation (prefixed with 0), and can include + / - signs
	2. float  - real number, eqv to C lang ‘double’. 2.2E–308 to 1.8E+308
	3. string, - series of char. $str="rajesh"; $str[1];  $str{1};	//a
		- heredoc- `$string = <<<EOK rajesh EOK;`
	4. boolean -true or false, case sensitive, ((bool) other datatype) type-casting
3. Compound – object,	
		b)array - collection of key/value pair
			- array use hash tables, which complexity is 0(1).
				
4. special - 
    1. null - variable with no value.
		-it has been assigned the constant NULL.
			- it has not been set to any value yet.
			- it has been unset().	
	2. resource - 	special data type, represent a PHP extension resource such as a database query, an open file, a database connection, and lots of other external types. You will never directly use this type, but will pass to the relevant functions  

			Indirect reference variable: $name="rajesh";    $$name="good boy";      echo $rajesh;  
			we can declare variable without variable name.	//$var;  
#### Important functions:
1. isset() - determine if a variable is set and is not NULL  
2. unset() - undefined the variable   
3. empty() -  determine whether a variable is empty  
4. is_null() -  finds whether a variable is NULL  

### SCOPES:
1. Global scope -> need global keyword
2. local scope
3. super global scope
4. static
```php
$GLOBALS[] 	$name="rajesh";
			function getname(){
				echo $GLOBALS['name'];		//access outer variable inside function
			}getname();
```

### TYPE JUGGLING:

```php	
<?php
	$foo = "1";  // $foo is string (ASCII 49)
	$foo =$foo * 2;   // $foo is now an integer (2)
	$foo = $foo * 1.3;  // $foo is now a float (2.6)
	$foo = 5 * "10 Little Piggies"; // $foo is integer (50)
	$foo = 5 * "10 Small Pigs";     // $foo is integer (50)
?>
```

## ARRAY:
1. Indexed array- $varname=array(‘rajesh’,’arun’);
2. Associate array- $varname=array(1=>’raj’,2=>’arun’); //userdefined key
3. Multidimensional - $varname = array(2=>array(‘rajesh’))

## CONSTANT :   
> (globally accessible)	  

		`define(‘VAR_NAME,’rajesh’);`    
		`const VAR_NAME = ‘rajesh’;` 		
- should be called without object using scope resolution operator.  eg.ClassName::VAR_NAME;
- while extends, it is called using PARENT::var_name ,  
- we need SELF::var_name instead of $this->var_name while using in same class	

## MAGIC CONSTANTS:
1. `__LINE__` 		return line number
2. `__FILE__`		return filename
3. `__DIR__	`	return directory
4. `__FUNCTION__`	return function name
5. `__CLASS__`		return classname
6. `__TRAIT__`		return trait name
7. `__METHOD__` 	return classname and function name
8. `__NAMESPACE__`	return namespace name

## OPERATORS:
1. Arithmatic operator - +-*/%  a**2=a^2
2. Assignment operator - +=  -=  *=  /=  %=
3. Bitwise operator - &(and),|(or),^(xor),~(not),<<(swift left),>>(swift right)
4. Comparision operator - == === (!=,<>) !== <,>,<=,>=,<=>
5. Error control operator - @
6. Executor operator – backticks (` `)
7. Increment decrement – a++.a--.++a,--a
8. Logical operator – and,or,!,xor,&&,||
9. String operator - (.)concatenate dot operator
10. Array operator - (+)union, (==)equal, ===, !=, <>,!==
11. Type operator – (instanceof)     eg.objname instanceof classname

- Reference of(&): 	$b=10; $a = &$b;	echo $a;   //10	not a pointer,no new memory just pointing value	

## CONDITIONAL:
1. if condition
	```php
	if ( condition ){
		body;
	}
	```
2. if-else condition
	```php
	if ( condition ){
		body;
	} else {
		body;
	}
	```
3. if-elseif condition
	```php
	if ( condition ){
		body;
	} elseif ( condition ){
		body;
	} else {
		body;
	}
	```
4. switch
	```php
	switch ( expression ) {
		case value1:
			statement;
			break;
		case default:
			statement;
	}
	```
5. Single line condition
	`expression ? Statement1 : statement2;`


## LOOPS:
1. for loop
 	```php
	for ( intialisation; condition; inc/dec) {
		body;
	}
	```
2. while loop
	```php
	while ( condition ) {
		body;
	}
	```
3. do-while loop
	```php
	do {
 		body;
	} while ( condition )
	```
4. foreach loop
	```php
	foreach ( $arrayname as $var) {			//foreach with value
		body;
	}
	foreach ( $arrayname as $key =>  $var){		//foreach with reference
		body; //we can use $key
	}
	```
5. BREAKS: break;   
	- exit(); # totally exit from program die(); #stop when previous error
6. `goto varname; continue;`  

## FUNCTION:
1. pass by value : `function functionname ( $varname ) { body;}`	
2. pass by reference: `function functionname ( &$varname ) { body;}`
3. variable length parameters: `function functionname  ( ...$varname ) { body; }`	
4. default arguements: `function functionname ($varname=0) {body;}`		  

Note: same function name should not repeat in php
5. Return value by reference:
	```php
	function &get_global_variable($name) {
		return $GLOBALS[$name];	
	}
	$num = 10;
	$value =& get_global_variable("num");
	print $value . "\n";
	$value = 20;
	print $num;
	```
6. function chaining: `$obj->func1()->func2();`	// func1 should return $this

## COOKIES: 
> text files stored on client computer

setcookie("cookiename","cookevalue","expirytime",path,url,https,httponly);  
secure way --> setcookie("cookiename","cookevalue","expirytime",'/',null,null,true);  

eg: `setcookie("name","rajesh","time()-3600");`
1. getcookies: `$_COOKIE("cookiename");	`		
2. Remove cookies: `setcookie("cookiename",null,expirytime);`

## SESSION: 
> creates file in a temp folder in server, 32 hexadecimal number as unique id. A cookie called PHPSESSID is sent to client browser,
```php
session_start();	
session_destroy();
$_SESSION[‘varname’]="deep";
```

## HTTP
> superGlobals:
1. $_GET[‘varname’];
2. $_POST[‘varname’];
3. $_REQUEST[‘varname’];

## FILES UPLOAD:

```php
<form action="" method="post" enctype="multipart/form-data">
	<input type="file" name="image">
```

```php
$_FILES[‘image’][‘name’],
$_FILES[‘image’][‘type’] 
$_FILES[‘image’][‘size’] 
move_upload_file($_FILES[‘image’][‘temp_name’],’target path’); 
```

## REDIRECTION:
1. header(‘Location’:’pagename.php’);
2. header(‘Location’:$_SERVER[‘HTTP_REFERER’]);

## FILE INCLUSION:
1. include(‘filename’);		//throw error if file not exist
2. include_once(‘filename’);	//should not repeat
3. require(‘filename’);		//not throw error if file not exist
4. require_once(‘filname’);	//should not repeat
	


# OBJECT ORIENTED PROGRAMMING
## Class 
> template to make object, blueprint of properties and behaviours
	
```php	
	class className{
		function __construct(){	//it is called when $obj = new className()
		}
		function __destruct(){	//it is called when $obj=null;
		}
		function __clone(){		//it is called when using clone keyword
		}	
	}
```
**$this** – refer property of current class  

## Object: 
> instance of class

```php
$obj = new className();	
$obj->varnames; $obj->function();
```
**cloning object**:  use clone keyword before object to be copied.   		eg $obj2= clone obj1;


## ENCAPSULATION:  

|			| Same class |	Derived  |	outside  |
|-----------|------------|-----------|-----------|
|public		| yes		 |	yes		 |  yes 	 |
|private	| yes		 |	no		 |	no		 |
|protected  | yes		 |	yes		 |	no		 |
--------------------------------------------------

- We can access current class variable by $this->variablename;

## STATIC:	
> ex:can maintain count how many objects created for the class by incrementing each time.
	
	- can call without creating object with scope resolution operator.
	- We can declare static as private and protected

1. Static variable      `public static $varname;`
2. Static method      
```php 
	public static functionname(){
	return obj;	return staticvariable;	}	//should not return normal variable,becz there will be no obj,so cant use $this->variablename
```
			
3. calling static variables,methods
	- classname::methodname(); 	classname::variablename();
	- parent :: methodname();	parent :: variablename();
	- self::methodname(); 		self::variablename();
	
Note: Dont use $this for static, its error
	

## INHERITANCE: 
1. single and 
2. multilevel inheritance(extend by more than one child)
	
	- we should parent constructor by using parent::__construt();
	- if we need parent class function, parent::functionname();	


## POLYMORPHISM: 
> abilty to define method in many forms
	
1. method overriding – php does not allowed two same func names. We can use it in inheritance.
2. method overloading -  only works with magic functions like _call, __set etc

## FINAL 
> keyword will avoid overriding	//act as super keyword

1. final method: cannot be overload while being inherited
2. final class: cannot be inherited
3. Parent::methodname();			// act as super function


## ABSTRACTION: 
> hiding the implementation
		
		- have abstract and non abstract function
```php
	abstract classname{	//abstract class must have atleast one abstract class
		abstract function funcname();	// have only function declaration not defination
		function func2(){..... with defination.....}
	}
```

## INTERFACE: 
> 100% abstraction, implements to child class. all function should public
	
```php	
	interface fruit{
	function funcname();
	}
	class apple implments fruit{
		function funcname(){.....}
	}
```

## TRAIT:
> same like abstract interface.(for multiple inheritance)

```php
	trait A{
		function functionname();----}
	class B{
		user A;}
	$obj = new B(); obj->functionname();
```

## ANONYMOUS FUNCTION:
`$variableName = function(){----};`

## ANONYMOUS CLASS:
`$obj = (new class{-----functions and vairiables-----});`
	
## NAMCESPACE: 
> can use same name function and class

```php
	namespace namespacename;
	class class1{ }
		function func1(){------} 
	$obj = new \namespacename\class1();	//creating object using namespace
	\namespacename\func1():	//function calling using namespace
```

## FILE HANDLING: 
- w=write, r=read, a=append  
			$handle = fopen(‘filename’,’w’);  
	write:	fwrite($handle,’something’);  
			fgets($handle’);	//string  
 			fgetc($handle);	//char	  
			foeof($handle);	//endofline  
			fclose($handle);  
	read:	$read = file(‘filename’);	//return each line in array  
			echo fread(fopen(‘filename’),filesize(‘filename’))  
	delete:	unlink(‘filename’);  
	rename: rename(‘oldname’,’newname’);  
	opendirectory:	$handle = opendir(‘dirname’);	while(readir(‘filename’)){-----------}	  

## MYSQL CONNECTION:
```php	
	$conn =mysqli_connect(‘localhost’,’root’,’password’,’dbname’);
	$result= mysqli_query($conn,$query);
	echo mysqli_num_rows($result); //return num of rows
	$row=mysqli_fetch_array($result,MYSQLI_BOTH); // MYSQLI_NUM  // MYSQLI_ASSOC
	$obj=mysqli_fetch_obj($result);
	$row=mysqli_fetch_row($result);

	$mysqliObj = new mysqli(‘localhost’,’usrename’,’password’,’dbname’);
	$result=$mysqli->query($query);
	$row=$result->fetch_array($query);

	$lastid = mysqli_insert_id($conn);
```

## AUTOLOADING:

```php	
	import file having below function, and create object directly use it
	spl_autoload_register(function($var){
		include $var.’php’;
	});
	
	spl_autoload_register('functionName');	//write the loader function seperately

	function __autoload($funName){
		require_once($_SERVER["DOCUMENT_ROOT"] . "/classes/$class_name.php")
	}
```

## NAMESPACE: - 
> can use same class/function name in same file

```php
	namespace class1;
	class Hello{} function Hii(){}

	namespace class2;
	class Hello{} function Hii(){}

	$obj = new class1\Hello();	 class1\Hii():
	$obj = new class2\Hello();	 class1\Hii():
```

## MAGIC METHODS:
1. __set();			- while writing data inaccessible property
2. __get();			-while reading data
3. __isset();			-triggered while called isset() empty()
4. __unset();			-invoke when unsert() used
5. __construct()
6. __destruct()
7. __call()
8. __callstatic()
9. __sleep()
10. __wakeup()
11. __tostring()		-when echo the object
12. __invoke()
13. __set_state()		- print object
14. __clone()
15. __debugInfo()		- it will call, when using var_dump($obj), we can modify what should print 
16. __invoke()			- call when we simple calling object with ();	

## GLOBAL VARIABLE:
1. $GLOBALS		
2. $_SERVER		
3. $_REQUEST
4. $_POST
5. $_GET
6. $_FILES
7. $_ENV
8. $_COOKIE
9. $_SESSION	
10. $php_errormsg
11. $HTTP_RAW_POST_DATA
12. $http_response_header
13. $argc -> number of arg passed to script
14. $argv	-> array of arg passed to script


## SERVER VARIABLES:
1. $_SERVER[‘PHP_SELF’]			-filename with drectory
2. $_SERVER[‘SERVER_NAME’]			-name of host
3. $_SERVER[‘HTTP_HOST’]			-return host headers
4. $_SERVER[‘HTTP_REFERER’]		-complete url
5. $_SERVER[‘HTTP_USER_AGENT’]		-browser platform details
6. $_SERVER[‘SCRIPT_NAME’]			-current script filename
7. $_SERVER[‘GATEWAY_INTERFACE’]	-version of cgi
8. $_SERVER[‘SERVER_ADDR’]			-ip of host
9. $_SERVER[‘SERVER_SOFTWARE’]		-server identification string(apache/2.2.24)
10. $_SERVER[‘SERVER_PROTOCOL’]		-name and revision of port (HTTP/1.1)
11. $_SERVER[‘REQUEST_METHOD’]		-GET,POST
12. $_SERVER[‘REQUEST_TIME’]		- timestamp of request time
13. $_SERVER[‘QUERY_STRING’]		-return if query string exist
14. $_SERVER[‘HHTP_ACCEPT’]			-accept header of request
15. $_SERVER[‘HTTPS’]				-true false if https
16. $_SERVER[‘REMOTE_ADDR’]			-ip of user
17. $_SERVER[‘REMOTE_HOST’]			-hostname of user
18. $_SERVER[‘REMOTE_PORT’]			-port used on user machine
19. $_SERVER[‘SCRIPT_FILENAME’]		-seradmine directive 
20. $_SERVER[‘SERVER_NAME’]			- absolute filepath of script  
21. $_SERVER[‘SERVER_PORT’]			-return port 80
22. $_SERVER[‘SERVER_SIGNATURE’]	-server version virtual host script
23. $_SERVER[‘PATH_TRANSLATED’]		-file system path of current 
24. $_SERVER[‘SCRIPT_URI’]			-Url of current page

## MAIL: 
`mail($to,$subject,$body,$header);`

## XML: 
`simplexml_load_file(‘xmlfile’);`

## JSON:	
`encode(), decode`

## SERIEALIZE: 
`serialize($obj); unserialize(string);		//make the obj into string, and we can use it with own values`


## TYPES OF EXCEPTION:
```
THROWABLE
	ERROR -notice,fatal,warning
		Arithmatic Error
			divisionByZeroError
		AssertionError
		ParseError
		TypeError
	
	EXCEPTION
		ClosedGeneralException
		DOMException
		ErrorException
		IntlException
		LogicException
			BadFunctionalException
			BadMethodcallException
			Domain exception
			invalid arguement exeception
			Lengthexception
			OutOfRangeException
		pharException
		ReflectionException
		Runtime Exception
			mysqli_sql_exception
			outOfBoundException
			OverflowException
			PDOException
			RangeException
			UnderFlowException
			UnExpectedValueException
```
### ERROR REPORTING:
1. error_reporting = 0 //make E_ALL
2. ini_set(‘error_reporting’,’E_ALL’);

### TYPES OF ERROR:
1. Notice – small, non-critical error  (E_NOTICE, E_USER_NOTICE)
2. warning- error does not terminate script (E_WARNING, E_CORE_WARNING, E_COMPILE_WARNING, E_USER_WARNING, E_DEPRECATED, E_USER_DEPRECATED)
3. Fatal error -  critical error, cause script to terminate (E_ERROR, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR, E_RECOVERABLE_ERROR)
4. Parse error – syntax error (E_PARSE)
5. Strick standard notices - suggestions	(E_STRICT)
	
## EXCEPTION HANDLING:
	
```php	
	try{
	}
	catch (Exception $e){ var_dump($e->getTrace();)
	}
	Custom exception:
	try{
	throw new rajeshexception();
	}
	catch (rajeshException $e){	}
```

## WEBSERVICE:
### JSON
	
```php
	header('Content-type: text/json');
	echo json_encode(array("name"=>"rajesh"));
```

### XML 

```php
$xml = new SimpleXMLElement("<student />");
$xml->addChild("name","rajesh");
$xml->addChild("age","23");
$dom = dom_import_simplexml($xml)->ownerDocument;
$dom->formatOutput = true;
echo $dom->saveXML();
```
##### xml result in page source

```xml
<?xml version="1.0"?>
<student>
	<name>rajesh</name>
	<age>23</age>
</student>	
```
	
