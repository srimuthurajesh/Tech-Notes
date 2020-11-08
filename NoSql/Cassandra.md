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

### Components in cassandra:  
1. Node − place where data get stored  
2. Data center − collection of related nodes   
3. Cluster − component that contains one or more data centers.
4. Commit log − Crash-Recovery Mechanism, every write operation is captured here    
5. Mem-table − memory-resident data structure. data will be store in mem-table  
6. SSTable − when mem-table is full data will written here    
7. Bloom filter − These are nothing but quick, nondeterministic, algorithms for testing whether an element is a member of a set. It is a special kind of cache. Bloom filters are accessed after every query.  


### Keyspace  
- schema or collection of tables.  
- it has two properties 1.replication,2.durable_write(default value is true, not applicable for simple strategy, verify durable_write we can use ```SELECT * FROM system_schema.keyspaces;```)      
Basic attributes are   
1. Replication factor − denotes number of machines in cluster that will receive copies of same data   
2. Replica placement strategy − strategy to place replicas in the ring. its attribtes are    
     - simple strategy (rack-aware strategy),  
     - old network topology strategy (rack-aware strategy), and   
     - network topology strategy (datacenter-shared strategy)   
3. Column families − represent structure of your data. its attributes are  
     - keys_cached − It represents the number of locations to keep cached per SSTable.
     - rows_cached − It represents the number of rows whose entire contents will be cached in memory.
     - preload_row_cache − It specifies whether you want to pre-populate the row cache.
```
CREATE KEYSPACE keyspaceName  
WITH replication = {'class': ‘strategyName’, 'replication_factor' : ‘NoOfReplicas’}  
AND durable_writes = ‘Boolean value’;   
```

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
1. **Data defination**: create table, alter table, drop table, create keyspace etc   
     - CREATE KEYSPACE keyspaceName− Creates a KeySpace in Cassandra.  
     - USE − Connects to a created KeySpace.  
     - ALTER KEYSPACE keyspaceName− Changes the properties of a KeySpace.  
     - DROP KEYSPACE keyspaceName− Removes a KeySpace  
     - CREATE TABLE tableName (column1 name datatype PRIMARYKEY, column2 name data type, PRIMARY KEY ((column1), column2)) 
     - ALTER TABLE tableName ADD/DROP columnName datatype  
     - DROP TABLE tablename    
     - TRUNCATE − TRUNCATE tablename  
     - CREATE INDEX columnName ON tablename(tableName_columnName)     
     - Drop INDEX columnName  
 
2. **Data Manipulation**: inser, delete, update, select etc  
     - INSERT INTO tablename (column1 name, column2 name....) VALUES (value1, value2....) USING option    
     - UPDATE tablename SET column name = new value, column name = value.... WHERE condition  
     - DELETE FROM identifier WHERE condition    
     - SELECT FROM table name WHERE condition  
     - BATCH − Executes multiple DML statements at once. ``` BEGIN BATCH insert stmt/ delete stmt/ update stmt APPLY BATCH ``` 

3. **Secoundary indexes**: create, drop indexes  
     - SELECT − This clause reads data from a table  
     - WHERE − The where clause is used along with select to read a specific data.  
     - ORDERBY − The orderby clause is used along with select to read a specific data in a specific order.  

4. **Materialized views**: create, drop, alter materialized views etc  

5. **Database roles**: create permission, granting permission, creating user etc  

6. **Documented Shell Commands**- cqlsh commands  
     - HELP − Displays help topics for all cqlsh commands.  
     - CAPTURE filepath − Captures output of a command and adds it to a file.  
     - CONSISTENCY − Shows the current consistency level, or sets a new consistency level.  
     - COPY tableName TO filepath − Copies data from Cassandra to given file.  
     - DESCRIBE −  
          - _DESCRIBE keyspaceName_  -  do list of tables  
          - _DESCRIBE tableName_  - do description of table  
          - _DESCRIBE type tableName_ - list all column types  
          - _DESCRIBE TYPES_  - list all user defined datatypes UDT   
     - EXPAND on/off− Beautify the output vertically    
     - EXIT − Using this command, you can terminate cqlsh.  
     - PAGING − Enables or disables query paging.  
     - SHOW host/version     
     - SOURCE fileName − can execute cql commands from mentioned filename    
     - TRACING − Enables or disables request tracing.  
