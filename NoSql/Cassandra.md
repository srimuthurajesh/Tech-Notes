## Cassandra  
Nosql stands for not only sql  
### Types of Nosql databases:  
 1. Document based - json, xml, excel files. used in content management, real time analtics, product management  
 2. Graph based - used in ML, fraud detection
 3. Column based - has rows and columns. eg. casssadra,dynamodb
 4. Key value pair based

### Charateristics of cassandra:      
- highly scalable  
- high performance distributed database  
- designed to handle large amounts of data   
- high availability with no single point of failure     
- Column based storage database  
- fast write speed, because of clustering

**About Cassandra**:
-developed by facebook 2008  
-inspired from bigtable and dynamodb  
-designed for unstructured or semi structured data  
-masterless replication   
-doesnt support relationship, but can use collection  
-selective replication factor

**Data replication**:  
  -one or more nodes act as replication nodes. cassandra returns most recent updated value  
  -Cassandra performs a Read repair in background to update Replicas stale values  
  -Nodes communicate each other using Gossip protocol  
**Keyspace**: is schema or collection of tables, it will have columnFamily(tables)    


#### Data Type:  
text	- Represents UTF8 encoded string  
int	- Represents 32-bit signed int  
ascii	- Represents ASCII character string  
bigint -	Represents 64-bit signed long  
blob	-	Represents arbitrary bytes  
Boolean	-	Represents true or false  
counter - Represents counter column  
decimal	-	Represents variable-precision decimal  
double	- Represents 64-bit IEEE-754 floating point  
float	-	Represents 32-bit IEEE-754 floating point  
inet	- Represents an IP address, IPv4 or IPv6  
timestamp -	Represents a timestamp  
timeuuid - Represents type 1 UUID  
uuid - Represents type 1 or type 4  
varchar - Represents uTF8 encoded string  
varint - Represents arbitrary-precision integer  

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
