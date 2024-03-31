## Apache AVRO

-serialization system has datatype, docs  
-develeped by Dough cutting father of Hadoop  

**Primitive Types**:  
1. **null**: no value  
2. **boolean**: a binary value  
3. **int**:32-bit signed integer  
4. **float**:single precision(32bit)  
5. **double**:double precision(64bit)  
6. **bytes**:sequence of 8bit unsigned bytes  
7. **string**:unicode chanracter sequence  


**Common fields**:  
- **Name**: name of schema  
- **Namespace**: equivalent to package in java  
- **Doc**: Documentation  
- **Aliases**: Optional other name for schema  
- **Fields**: 
	- Name: name of fields  
	- Doc: documentation for field  
	- Type: datatype for field   
	- Default: assign default value for field  
	
	
Avro schame Example:  
```
{
	"type":"record",
	"namespace":"com.example",
	"name":"Customer",
	"doc":"AVRO schame for customer",
	"fields":{
		{"name":"first_name","type":"string","doc":"for first name"},
		{"name":"age","type":"int","doc":"for customer age"},
		{"name":"got_adhar","type":"boolean","default":true,"doc":"added default value as tru"}
	}
}
```	
