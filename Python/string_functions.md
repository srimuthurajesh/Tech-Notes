string.captilize()	-convert first char to capital  
string.title()		-convert all first letter to uppercase  
string.casefold()	-convert all first lowercase to uppercase  

string.startswith(val,start,end)	-return whether true or false  
string.endswith(val,start,end)		-return whether true or false  

string.find(val,start,end)		-find and return position of the chars  
string.rfind(val,start,end)		-almost same as rindex  
string.index(val,start,end)		-same like find  
string.rindex(val,start,end)		-return last occurance of the word  
string.count("apple",start,end)	-search and return count of apple in given intervel of string  

string.isalpha()		-if alphapets  
string.isdecimel()		-if decimels  
string.iddigit()		-all digits even ^2 exponential  
string.isidentifier()	-return false string starts with number  
string.islower()		-if lowercase  
string.isnumeric()		-0-9  
string.isprintable()	-like #1 are special char cannot printable  
string.isspace()		-if str is space  
string.istitle()		-if start with uppercase  
string.isupper()		-if uppercase  

string.join(("a","b","c")) -join tuples with given string  
string.ljust(count,char)		-justify the string leftside with given char in given count  
string.rjust(count,char)		-justify the string rightside with given char in given count  
string.center(times,chars)	-both side char append on given times  

string.upper()			-convert string to uppercase  
string.lower()			-convert string to lowercase  
string.swapcase()		-swap uppercase and lowercase  
string.lstrip(char)		-trim char leftside of string  
string.rstrip(char)		-trim char rigthside of string  

string.partition(val)	- find first occur of val and return three values of tuple. 1.beforeVal 2.val 3.afterVal  
string.rpartition(val)	- find last occur of val and return three values of tuple. 1.beforeVal 2.val 3.afterVal  

string.replace(oldstr,newstr,count=all)		-replace oldstr with newstr  
string.split(char,spiltcharcount)				-spilt with first occurance of char and return list  
string.rsplit(char,spiltcharcount)				-spilt with last occurance of char and return list  
string.splitlines(withOrwithout\n)				-return tuples with '\n' seperator in string  	  

string.encode('UTF-8')	-encode given text like german to normal text  
string.zfil(length)									-fill with zeros until the size length reaches  
string.expandtabs(spacecount)		-return string with spacecount instead of \t  





string formats
	print("Hello {}, your balance is {}.".format("Adam", 230.2346))
	print("Hello {0}, your balance is {1}.".format("Adam", 230.2346))
	print("Hello {name}, your balance is {blc}.".format(name="Adam", blc=230.2346))
	print("Hello {0}, your balance is {blc}.".format("Adam", blc=230.2346))
	
string format map
	point = {'x':4,'y':-5}
	print('{x} {y}'.format_map(point))
	point = {'x':4,'y':-5, 'z': 0}
	print('{x} {y} {z}'.format_map(point))	
	
maketrans & translate: it is same like string replace
	"rajesh".translate(maketrans("rh","16"))	#return 1ajes6. it perform translation
						
