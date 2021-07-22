->Developed at AT&T bell laboratories in 1972 by Dennis Ritchie. 
	
FIRST PROGRAM:
	#include<stdio.h>		//preprocessor command which tell compiler to include stdio.h file 
	int main(){				//c program starts from main function
		printf("Hello world!");
		return 0;			//will return 0 for os
	}	
	
KEYWORDS:(44 keywords)
auto,break,case,char,const,Continue,default,do,Double,extern,Float,for,goto,If,Inline,Int,long,register,short,Signed,sizeof,static,Struct,switch,typedef,union,unsigned

VARIABLES:
	1.global- which is defines outer main function, 2.local - inside main function
	variable_types:
	a) Primary:	1.Integeral- int (1byte), char (2byte)
				2. Floating- float (4byte), double (8byte) 
	b) Secondary:
				Signed char (1 byte) -128 to 127 %c
				Unsigned char(1 byte) 0 to 255 %c
				Short signed int (2 byte) -32,768 to 32,768 %d
				Short unsigned int(2 byte) 0 to 65535 %u
				Signed int (2 byte) -32,768 to 32,768 %d
				Unsigned int (2 byte) 0 to 65535 %u
				Long signed int (4 byte) -2,147,483,648 to 2,147,483,648 %Ld
				Long unsigned int (4 byte) 0 to 4294967295 %lu
				Float(4 byte) -3.4e38 to 3.4e38 %f
				Double(8 byte) -1.7e308 to -1.7e308 %lf
				Long double(10 byte) -1.7e4938 to 1.7e4932 %lf
	*float value=4e10   //4 power10
	*sizeof(value)// it will print bytes occupied by value
	*null character	// ’\0’
	Typedef: rename a datatype, syntax: typedef int rajesh;   rajesh a=10;//rajesh become int

OPERATORS: 
	1) Arithmetic operators			+-*/%
	2) Relational operators			<, <=,>,>=, ==,! =,Take !a>=400 as a<=400.
	3) Logical operators			&&(and),||(or),!(not) is for bytes
	4) Assignment operators			x+=y is x=x+y
	5) Increment decrement operators	++,--
	6) Conditional operators(ternary)	condition?exp1:exp2;
	7) Bitwise operators			&(and),|(or),^(xor),~(1s compliment), <<(left),>>(rigth)		                
	8) Special operators		comma, sizeof, pointer, member selection
	9) Typecasting  			z=x(float)/y(float) where x and y is int
	
	
FLOW CONTROL:
	if
	if ..else
	if ..else if
	switch(i){case 1:printf(1); default:printf("default");}

LOOPS:
	while
	do..while
	for(int i=0;i<n;i++)	
	goto error;   error: printf("error");
	break;
	continue;

INPUT OUTPUT:
	1.formatted - scanf(); printf(); fscan(); fprint();
	2.unformatted - getc(variable);getchar(variable);gets(variable); putc(variable); putchar(variable) puts(variable);
	Conditional statements
		%c	character
		%d 	integer
		%s	string
		%f	float
		%p  pointer

ARRAY: collection of similar datatype
	int a[5]; int a[]={1,2,3,4,5};
	a) one dimensional, b) two dimensional, c) three dimensional
	
STRING: array of character
	char name[] = "rajesh";
	char name[5] = {"r","a","j","e","s","h"}
	

POINTER: variable contains address of another variable
	int *a; a=&b;  a=0;//null pointer or default
	*a=55; printf("%d",&b);//55
	
	printf("%d",*a);	
	address type will be whole number(2 byte)
	pointer's subraction allowed but other math operation not allowed in c
	
FUNCTION:set of instruction that are used to perform specified tasks
	int getName(int arg){
		return 3;
	}
	1.arg pass by reference - func(&a);   int func(int *arg){....}	
	2.arg pass by value
		 	
STRUCTURE: storing different datatype in one variable
	struct student{
		int rollno;
		char name[];
	}
	struct student rajesh = {1,"rajesh"};		 	

UNION: same like strucutre but memory allocation difference and takes half of struct size
	union student{
		int rollno;
		char name[];
	}
	union student rajesh = {1,"rajesh"};		 	

FILE HANDLING:
	FILE *fpointer;
	Fpointer=fopen(“rajesh.txt”,”w”);     //r-read, w-write, a-edit
			 	
STANDARD LIBRARY HEADER:
	#include<stdio.h> 	- prinf,scanf,getchar,putchar
	#include<stdlib.h> 	- number rconversion, memory alloc, exit and system, quick sort 
	#include<float.h> 	- system liit for flot type
	#include<math.h> 	- mathematical function
	#include<assert.h> 	- assertions 
	#include<ctype.h> 	- character class tests
	#include<limits.h> 	- system limit for integral types
	#include<setjmp.h> 	- non local jumps
	#include<signal.h> 	- signal and error handling
	#include<stdarg.h> 	- variable length parameter list
	#include<string.h> 	- string function
	#include<time.h> 	- date and time functions
	#include<conio.h> 	- clrscr(), getch(), getche() etc  	
	
MEMORY ALLOCATION:
	char *description; description=malloc(100*sizeof(char));  //now we can use description variable as 
	realloc(descrciption, 100*sizeof(char));
