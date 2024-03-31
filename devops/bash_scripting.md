## Batch Scripting  

| Command | Description |
| ----------- | ----------- |
| ipconfig |  to show network address details| 
| date 	|  to show current date| 
| cal 	|  to show current month calender| 
| top	|  to moniter all process| 
| ps	|  current user process| 
| ps 	|  aux username- process of particular user| 
| pwd	|  present work directory| 

| Script Command | Description |
| ----------- | ----------- |
| sh scriptname.sh |  to run the script| 
| cat scriptname.sh |  to display the script content| 
| vi welcome.sh |  to open script in vi editor| 

Note: a=10 not as a = 10	//space not allowed, will taken as seperate commands  
a="rajesh rockz" not as a=rajesh rockz	//need double quotes

### Basic script
```
#! /bin/bash
echo "hello $LOGNAME"
echo "The host name is `hostname`"
echo "the current working directory is `pwd`"
```

### Control execute time:
at 00:47	//command wil execute at 00:47
min hour dayofmonth month dayofweek process-code

## Variables:	
> is a symbolic name of a defined value

Ex. ```a=10  "a"=symbolic_value	10=value```  
Note: to read value, we need to put $a  

**Types of Variable**: 
1. System variable
2. User defined variable

Export variables: 
	export varname=value
	sh root/root/scriptpath.sh
Unchanged variable:
	varname=value
	readonly varname
Lenght of value: ${#varname}

## User input:
read -p "please enter name" varname  
read -sp "please enter password" varname	//s for silent

## Datatype: 
> declare -i varname

## Arithmatic operators: 
> +-*/% **-exponential
Let: allow simple arithmetic expression		let a=a+1  

## Expression: 
expr 1 + 1	//result 2  expr 2 \* 3  should have space, not as 1+1

## Arithmatic expansion: 
$[a + b] or $((a ** b))  
&&- both sides should execute   
|| second side never executed until it is true  
 
## if Condition:
```
if [ "$a" == "yes" ]
then	
	command or code
else
	command or code
fi
```
## if else if condition:
```
if [condition]
then	
	command or code
elif[condition]
then 
	command or code
else
	command or code
fi
```

## Switch case:
```
case $choice_var in 
a)
echo "first value"
;;
b)
echo "second value" 
;;
*)
echo "this is default"
;;
esac
```	
