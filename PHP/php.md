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
	a) int - whole number, equivalent C lang ‘long’ . 32Bit. –2,147,483,648 to +2,147,483,647. 
		can be written in decimal, hexadecimal (prefixed with 0x), and
		octal notation (prefixed with 0), and can include + / - signs
	b) float  - real number, eqv to C lang ‘double’. 2.2E–308 to 1.8E+308
	c) string, - series of char. $str="rajesh"; $str[1];  $str{1};	//a
		heredoc- $string = <<<EOK rajesh EOK;
	d)boolean -true or false, case sensitive, ((bool) other datatype) type-casting
3. Compound – object,	
		b)array - collection of key/value pair
			   array use hash tables, which complexity is 0(1).
				
4. special - a) null - variable with no value.
		it has been assigned the constant NULL.
			it has not been set to any value yet.
			it has been unset().	
	b) resource - 	special data type, represent a PHP extension resource such as a database query, an open file, a database connection, and lots of other external types. You will never directly use this type, but will pass to the relevant functions

			Indirect reference variable: $name="rajesh";    $$name="good boy";      echo $rajesh;
			we can declare variable without variable name.	//$var;
			isset() - determine if a variable is set and is not NULL
			unset() - undefined the variable
			empty() -  determine whether a variable is empty
			is_null() -  finds whether a variable is NULL

### SCOPES:
1. Global scope -> need global keyword
2. local scope
3. super global scope
4. static
	```$GLOBALS[] 	$name="rajesh";
				function getname(){
					echo $GLOBALS['name'];		//access outer variable inside function
				}getname();
```

TYPE JUGGLING:
	<?php
	$foo = "1";  // $foo is string (ASCII 49)
	$foo =$foo * 2;   // $foo is now an integer (2)
	$foo = $foo * 1.3;  // $foo is now a float (2.6)
	$foo = 5 * "10 Little Piggies"; // $foo is integer (50)
	$foo = 5 * "10 Small Pigs";     // $foo is integer (50)
	?>

ARRAY:
	1.Indexed array- $varname=array(‘rajesh’,’arun’);
	2.Associate array- $varname=array(1=>’raj’,2=>’arun’); //userdefined key
	3.Multidimensional - $varname = array(2=>array(‘rajesh’))

CONSTANT : (globally accessible)	
		define(‘VAR_NAME,’rajesh’);  
		const VAR_NAME = ‘rajesh’;  		
	-should be called without object using scope resolution operator.  eg.ClassName::VAR_NAME;
	-while extends, it is called using PARENT::var_name ,  
	-we need SELF::var_name instead of $this->var_name while using in same class	

MAGIC CONSTANTS:
	__LINE__ 		return line number
	__FILE__		return filename
	__DIR__		return directory
	__FUNCTION__	return function name
	__CLASS__		return classname
	__TRAIT__		return trait name
	__METHOD__ 	return classname and function name
	__NAMESPACE__	return namespace name

OPERATORS:
	1. Arithmatic operator - +-*/%  a**2=a^2
	2.Assignment operator - +=  -=  *=  /=  %=
	3.Bitwise operator - &(and),|(or),^(xor),~(not),<<(swift left),>>(swift right)
	4.Comparision operator - == === (!=,<>) !== <,>,<=,>=,<=>
	5.Error control operator - @
	6.Executor operator – backticks (` `)
	7.Increment decrement – a++.a--.++a,--a
	8.Logical operator – and,or,!,xor,&&,||
	9.String operator - (.)concatenate dot operator
	10.Array operator - (+)union, (==)equal, ===, !=, <>,!==
	11.Type operator – (instanceof)     eg.objname instanceof classname

	Reference of(&): 	$b=10; $a = &$b;	echo $a;   //10	not a pointer,no new memory just pointing value	

CONDITIONAL:
1.if condition
	if ( condition ){
		body;
	}
2.if-else condition
	if ( condition ){
		body;
	} else {
		body;
	}
3.if-elseif condition
	if ( condition ){
		body;
	} elseif ( condition ){
		body;
	} else {
		body;
	}
4.switch
	switch ( expression ) {
		case value1:
			statement;
			break;
		case default:
			statement;
	}
5.Single line condition
	expression ? Statement1 : statement2;


LOOPS:
1.for loop
 	for ( intialisation; condition; inc/dec) {
		body;
	}
2.while loop
	while ( condition ) {
		body;
	}
3.do-while loop
	do {
 		body;
	} while ( condition )
4.foreach loop
	foreach ( $arrayname as $var) {			//foreach with value
		body;
	}
	foreach ( $arrayname as $key =>  $var){		//foreach with reference
		body; //we can use $key
	}
BREAKS: break; exit(); # totally exit from program die(); #stop when previous error
		goto varname; continue;

FUNCTION:
	function functionname ( $varname ) { body;}	#pass by value
	function functionname ( &$varname ) { body;}	#pass by reference
	function functionname  ( ...$varname ) { body; }	#variable length parameters
	function functionname ($varname=0) {body;}	#default arguements		
	-same function name should not repeat in php
	Return value by reference:
		function &get_global_variable($name) {
			return $GLOBALS[$name];	
		}
		$num = 10;
		$value =& get_global_variable("num");
		print $value . "\n";
		$value = 20;
		print $num;

	function chaining: $obj->func1()->func2();	// func1 should return $this

COOKIES: text files stored on client computer
	setcookie("cookiename","cookevalue","expirytime",path,url,https,httponly);
	secure way --> setcookie("cookiename","cookevalue","expirytime",'/',null,null,true);
	
	eg: setcookie("name","rajesh","time()-3600");
	$_COOKIE("cookiename");			//getcookies
	setcookie("cookiename",null,expirytime);	//remove cookie

SESSION: creates file in a temp folder in server, 32 hexadecimal number as unique id. A cookie called PHPSESSID is sent to client browser,
	session_start();	
	session_destroy();
	$_SESSION[‘varname’]="deep";

HTTP-superGlobals:
	$_GET[‘varname’];
	$_POST[‘varname’];
	$_REQUEST[‘varname’];

FILES UPLOAD:
	<fom action="" method="post" enctype="multipart/form-data">
		<input type="file" name="image">
$_FILES[‘image’][‘name’],
$_FILES[‘image’][‘type’] 
$_FILES[‘image’][‘size’] 
move_upload_file($_FILES[‘image’][‘temp_name’],’target path’); 

REDIRECTION:
	header(‘Location’:’pagename.php’);
	header(‘Location’:$_SERVER[‘HTTP_REFERER’]);

FILE INCLUSION:
	include(‘filename’);		//throw error if file not exist
	include_once(‘filename’);	//should not repeat
	require(‘filename’);		//not throw error if file not exist
	require_once(‘filname’);	//should not repeat
	


OBJECT ORIENTED PROGRAMMING
-------------------------------------------------------------------------------------------------------------------------------
Class: template to make object, blueprint of properties and behaviours
	class className{
		function __construct(){	//it is called when $obj = new className()
		}
		function __destruct(){	//it is called when $obj=null;
		}
		function __clone(){		//it is called when using clone keyword
		}	
	}
$this – refer property of current class

Object: instance of class
$obj = new className();	
$obj->varnames; $obj->function();
cloning object:  use clone keyword before object to be copied.   		eg $obj2= clone obj1;


ENCAPSULATION:
--------------------------------------------------
|			| Same class |	Derived  |	outside  |
|-----------|------------|-----------|-----------|
|public		| yes		 |	yes		 |  yes 	 |
|private	| yes		 |	no		 |	no		 |
|protected  | yes		 |	yes		 |	no		 |
--------------------------------------------------

- We can access current class variable by $this->variablename;

STATIC:	ex:can maintain count how many objects created for the class by incrementing each time.
	can call without creating object with scope resolution operator.
	We can declare static as private and protected
	Static variable      public static $varname;
	Static method      public static functionname(){
				return obj;	return staticvariable;	}	//should not return normal variable,becz there will be no obj,so cant use $this->variablename
			
	#calling static variables,methods
	classname::methodname(); 	classname::variablename();
	parent :: methodname();	parent :: variablename();
	self::methodname(); 		self::variablename();
	
	Dont use $this for static, its error
	

INHERITANCE: php support 	1.single and 
							2.multilevel inheritance(extend by more than one child)
	we should parent constructor by using parent::__construt();
	if we need parent class function, parent::functionname();	


POLYMORPHISM: abilty to define method in many forms
	method overriding – php does not allowed two same func names. We can use it in inheritance.
	method overloading -  only works with magic functions like _call, __set etc

FINAL keyword will avoid overriding	//act as super keyword
	final method: cannot be overload while being inherited
	final class: cannot be inherited
	Parent::methodname();			// act as super function


ABSTRACTION: hiding the implementation
		have abstract and non abstract function
	abstract classname{	//abstract class must have atleast one abstract class
		abstract function funcname();	// have only function declaration not defination
		function func2(){..... with defination.....}
	}

INTERFACE: 100% abstraction, implements to child class. all function should public
	interface fruit{
	function funcname();
	}
	class apple implments fruit{
		function funcname(){.....}
	}

TRAIT:same like abstract interface.(for multiple inheritance)
	trait A{
		function functionname();----}
	class B{
		user A;}
	$obj = new B(); obj->functionname();

ANONYMOUS FUNCTION:
	$variableName = function(){----};
ANONYMOUS CLASS:
	$obj = (new class{-----functions and vairiables-----});
	
NAMCESPACE: can use same name function and class
	namespace namespacename;
	class class1{ }
		function func1(){------} 
	$obj = new \namespacename\class1();	//creating object using namespace
	\namespacename\func1():	//function calling using namespace

FILE HANDLING: w=write, r=read, a=append
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

MYSQL CONNECTION:
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


AUTOLOADING:
	import file having below function, and create object directly use it
	spl_autoload_register(function($var){
		include $var.’php’;
	});
	
	spl_autoload_register('functionName');	//write the loader function seperately

	function __autoload($funName){
		require_once($_SERVER["DOCUMENT_ROOT"] . "/classes/$class_name.php")
	}

NAMESPACE: - can use same class/function name in same file
	namespace class1;
	class Hello{} function Hii(){}

	namespace class2;
	class Hello{} function Hii(){}

	$obj = new class1\Hello();	 class1\Hii():
	$obj = new class2\Hello();	 class1\Hii():


MAGIC METHODS:
	__set();			- while writing data inaccessible property
	__get();			-while reading data
	__isset();			-triggered while called isset() empty()
	__unset();			-invoke when unsert() used
	__construct()
	__destruct()
	__call()
	__callstatic()
	__sleep()
	__wakeup()
	__tostring()		-when echo the object
	__invoke()
	__set_state()		- print object
	__clone()
	__debugInfo()		- it will call, when using var_dump($obj), we can modify what should print 
	__invoke()			- call when we simple calling object with ();	

GLOBAL VARIABLE:
	$GLOBALS		
	$_SERVER		
	$_REQUEST
	$_POST
	$_GET
	$_FILES
	$_ENV
	$_COOKIE
	$_SESSION	
	$php_errormsg
	$HTTP_RAW_POST_DATA
	$http_response_header
	$argc -> number of arg passed to script
	$argv	-> array of arg passed to script


SERVER VARIABLES:
	$_SERVER[‘PHP_SELF’]			-filename with drectory
	$_SERVER[‘SERVER_NAME’]			-name of host
	$_SERVER[‘HTTP_HOST’]			-return host headers
	$_SERVER[‘HTTP_REFERER’]		-complete url
	$_SERVER[‘HTTP_USER_AGENT’]		-browser platform details
	$_SERVER[‘SCRIPT_NAME’]			-current script filename
	$_SERVER[‘GATEWAY_INTERFACE’]	-version of cgi
	$_SERVER[‘SERVER_ADDR’]			-ip of host
	$_SERVER[‘SERVER_SOFTWARE’]		-server identification string(apache/2.2.24)
	$_SERVER[‘SERVER_PROTOCOL’]		-name and revision of port (HTTP/1.1)
	$_SERVER[‘REQUEST_METHOD’]		-GET,POST
	$_SERVER[‘REQUEST_TIME’]		- timestamp of request time
	$_SERVER[‘QUERY_STRING’]		-return if query string exist
	$_SERVER[‘HHTP_ACCEPT’]			-accept header of request
	$_SERVER[‘HTTPS’]				-true false if https
	$_SERVER[‘REMOTE_ADDR’]			-ip of user
	$_SERVER[‘REMOTE_HOST’]			-hostname of user
	$_SERVER[‘REMOTE_PORT’]			-port used on user machine
	$_SERVER[‘SCRIPT_FILENAME’]		-seradmine directive 
	$_SERVER[‘SERVER_NAME’]			- absolute filepath of script  
	$_SERVER[‘SERVER_PORT’]			-return port 80
	$_SERVER[‘SERVER_SIGNATURE’]	-server version virtual host script
	$_SERVER[‘PATH_TRANSLATED’]		-file system path of current 
	$_SERVER[‘SCRIPT_URI’]			-Url of current page

MAIL: mail($to,$subject,$body,$header);
XML: simplexml_load_file(‘xmlfile’);
JSON:	encode(), decode, f
SERIEALIZE: serialize($obj); unserialize(string);		//make the obj into string, and we can use it with own values


TYPES OF EXCEPTION:
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

ERROR REPORTING:
	error_reporting = 0 //make E_ALL
	ini_set(‘error_reporting’,’E_ALL’);

TYPES OF ERROR:
	1.Notice – small, non-critical error  (E_NOTICE, E_USER_NOTICE)
	2.warning- error does not terminate script (E_WARNING, E_CORE_WARNING, E_COMPILE_WARNING, E_USER_WARNING, E_DEPRECATED, E_USER_DEPRECATED)
	3.Fatal error -  critical error, cause script to terminate (E_ERROR, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR, E_RECOVERABLE_ERROR)
	3.Parse error – syntax error (E_PARSE)
	5.Strick standard notices - suggestions	(E_STRICT)
	
EXCEPTION HANDLING:
	try{
	}
	catch (Exception $e){ var_dump($e->getTrace();)
	}
	Custom exception:
	try{
	throw new rajeshexception();
	}
	catch (rajeshException $e){	}
	
WEBSERVICE:
	#JSON
	header('Content-type: text/json');
	echo json_encode(array("name"=>"rajesh"));


	#XML 
	$xml = new SimpleXMLElement("<student />");
	$xml->addChild("name","rajesh");
	$xml->addChild("age","23");
	$dom = dom_import_simplexml($xml)->ownerDocument;
	$dom->formatOutput = true;
	echo $dom->saveXML();

			#xml result in page source
			<?xml version="1.0"?>
			<student>
			  <name>rajesh</name>
			  <age>23</age>
			</student>	
	
	
