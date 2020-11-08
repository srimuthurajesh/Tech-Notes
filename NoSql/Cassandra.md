Nosql stands for not only sql

Types of Nosql databases:  
 1. Document based - json, xml, excel files. used in content management, real time analtics, product management  
 2. Graph based - used in ML, fraud detection
 3. Column based - has rows and columns. eg. casssadra,dynamodb
 4. Key value pair based

-developed by facebook 2008  
-designed for unstructured or semi structured data  
-Column based store database in Nosql
-store data in form of key-value pairs  
-masterless replication   
-inspired from bigtable and dynamodb  
-writes are faster than other dbs. becz of clustering  
-doesnt support relationship, but can use collection  
-selective replication factor

**Keyspace**: is schema or collection of tables, it will have columnFamily(tables)    


|  Data Type | Constants  |  Description |
|---|---|---|
| ascii  | strings  | Represents ASCII character string  |
| bigint  | bigint  | Represents 64-bit signed long  |
| blob  | blobs  | Represents arbitrary bytes  |
| Boolean  | booleans  | Represents true or false  |
| counter  | integers  | Represents counter column  |
| decimal  | integers, floats  | Represents variable-precision decimal  |
| double  | integers  | Represents 64-bit IEEE-754 floating point  |
| float  | integers, floats  | Represents 32-bit IEEE-754 floating point  |
| inet  | strings  | Represents an IP address, IPv4 or IPv6  |
| int  | integers  | Represents 32-bit signed int  |
| text  | strings  | Represents UTF8 encoded string  |
| timestamp  | integers, strings  | Represents a timestamp  |
| timeuuid  | uuids  | Represents type 1 UUID  |
| uuid  | uuids  | Represents type 1 or type 4  |
| varchar  | strings  | Represents uTF8 encoded string  |
| varint  | integers  | Represents arbitrary-precision integer  |

| Collection  | Description  |
|---|---|
| list  | A list is a collection of one or more ordered elements.  |
| map  | A map is a collection of key-value pairs.  |
| set  | A set is a collection of one or more elements.  |

#### User-defined datatypes
Cqlsh provides users a facility of creating their own data types. Given below are the commands used while dealing with user defined datatypes.

CREATE TYPE − Creates a user-defined datatype.  
ALTER TYPE − Modifies a user-defined datatype.  
DROP TYPE − Drops a user-defined datatype.  
DESCRIBE TYPE − Describes a user-defined datatype.  
DESCRIBE TYPES − Describes user-defined datatypes.  

#### Types of statements in cql:
1. Data defination: create table, alter table, drop table, create keyspace etc  
2. Data Manipulation: inser, delete, update, select etc  
3. Secoundary indexes: create, drop indexes  
4. Materialized views: create, drop, alter materialized views etc  
5. Database roles: create permission, granting permission, creating user etc  
