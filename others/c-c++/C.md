# C
> Developed at AT&T bell laboratories in 1972 by Dennis Ritchie.   
	
### FIRST PROGRAM:  
```c
#include<stdio.h>		//preprocessor command which tell compiler to include stdio.h file   
int main(){				//c program starts from main function  
	printf("Hello world!");
	return 0;			//will return 0 for os
}	
``` 

### KEYWORDS:(44 keywords)  
`auto,break,case,char,const,Continue,default,do,Double,extern,Float,for,goto,If,Inline,Int,long,register,short,Signed,sizeof,static,Struct,switch,typedef,union,unsigned `

### VARIABLES:
1. global- which is defines outer main function  
2. local - inside main function  
 
#### Variable_types:
1. Primary:	
	1. Integeral- int (1byte), char (2byte)  
	2. Floating- float (4byte), double (8byte)  
2. Secondary:
	1. Signed char (1 byte) -128 to 127 %c
	2. Unsigned char(1 byte) 0 to 255 %c  
	3. Short signed int (2 byte) -32,768 to 32,768 %d
	4. Short unsigned int(2 byte) 0 to 65535 %u
	5. Signed int (2 byte) -32,768 to 32,768 %d
	6. Unsigned int (2 byte) 0 to 65535 %u
	7. Long signed int (4 byte) -2,147,483,648 to 2,147,483,648 %Ld
	8. Long unsigned int (4 byte) 0 to 4294967295 %lu
	9. Float(4 byte) -3.4e38 to 3.4e38 %f
	10. Double(8 byte) -1.7e308 to -1.7e308 %lf
	11. Long double(10 byte) -1.7e4938 to 1.7e4932 %lf  
	
*float value=4e10   //4 power10  
*sizeof(value)// it will print bytes occupied by value  
*null character	// ’\0’  
Typedef: rename a datatype, syntax: typedef int rajesh;   rajesh a=10;//rajesh become int  

### OPERATORS: 
1. Arithmetic operators			+-*/%
2. Relational operators			<, <=,>,>=, ==,! =,Take !a>=400 as a<=400.
3. Logical operators			`&&(and),||(or),!(not)` is for bytes
4. Assignment operators			x+=y is x=x+y
5. Increment decrement operators	++,--
6. Conditional operators(ternary)	condition?exp1:exp2;
7. Bitwise operators			`&(and),|(or),^(xor),~(1s compliment), <<(left),>>(rigth)	`	                
8. Special operators		comma, sizeof, pointer, member selection
9. Typecasting  			z=x(float)/y(float) where x and y is int
	
	
### FLOW CONTROL:  
1. if  
2. if ..else  
3. if ..else if  
4. switch(i){case 1:printf(1); default:printf("default");}  

### LOOPS:
1. while
2. do..while
3. for(int i=0;i<n;i++)	
4. goto error;   error: printf("error");
5. break;
6. continue;

### INPUT OUTPUT:
1. formatted - scanf(); printf(); fscan(); fprint();
2. unformatted - getc(variable);getchar(variable);gets(variable); putc(variable); putchar(variable) puts(variable);  

#### Conditional statements  
1. %c	character
2. %d 	integer
3. %s	string
4. %f	float
5. %p  pointer

### ARRAY: 
> collection of similar datatype

`int a[5]; int a[]={1,2,3,4,5};`  
a) one dimensional, b) two dimensional, c) three dimensional
	
### STRING: 
> array of character

```c
char name[] = "rajesh";
char name[5] = {"r","a","j","e","s","h"}
```

### POINTER: 
> variable contains address of another variable

```c
int *a; a=&b;  a=0;//null pointer or default  
*a=55; printf("%d",&b);//55  
printf("%d",*a);  	
```
address type will be whole number(2 byte)  
pointer's subraction allowed but other math operation not allowed in c  
	
### FUNCTION:
> set of instruction that are used to perform specified tasks

```c
int getName(int arg){
	return 3;
}
```
1. arg pass by reference - func(&a);   int func(int *arg){....}	
2. arg pass by value
		 	
### STRUCTURE: 
> storing different datatype in one variable

```c
struct student{
	int rollno;
	char name[];
}
struct student rajesh = {1,"rajesh"};		 	
```

### UNION: 
> same like strucutre but memory allocation difference and takes half of struct size

```c	
union student{
	int rollno;
	char name[];
}
union student rajesh = {1,"rajesh"};		 	
```

### FILE HANDLING:
FILE *fpointer;  
Fpointer=fopen(“rajesh.txt”,”w”);     //r-read, w-write, a-edit
			 	
### STANDARD LIBRARY HEADER:
1. `#include<stdio.h>` 	- prinf,scanf,getchar,putchar
2. `#include<stdlib.h>` 	- number rconversion, memory alloc, exit and system, quick sort 
3. `#include<float.h>` 	- system liit for flot type
4. `#include<math.h>` 	- mathematical function
5. `#include<assert.h>` 	- assertions 
6. `#include<ctype.h>` 	- character class tests
7. `#include<limits.h>` 	- system limit for integral types
8. `#include<setjmp.h>` 	- non local jumps
9. `#include<signal.h>` 	- signal and error handling
10. `#include<stdarg.h>` 	- variable length parameter list
11. `#include<string.h>` 	- string function
12. `#include<time.h>` 	- date and time functions
13. `#include<conio.h>` 	- clrscr(), getch(), getche() etc  	
	
### MEMORY ALLOCATION:
char *description; description=malloc(100*sizeof(char));  //now we can use description variable as   
realloc(descrciption, 100*sizeof(char));  
