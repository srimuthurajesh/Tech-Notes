## SQL- Structured query language

-row is called as “record”  
-each block are called as “cells” or “fields”  
-unique value: can be more than one  
-primary value: only one  

| Tables        | Are           | Cool  |
| ------------- |:-------------:| -----:|
| col 3 is      | right-aligned | $1600 |
| col 2 is      | centered      |   $12 |
| zebra stripes | are neat      |    $1 |

 
**DDL Data Definition Language**: create, modify struture of database  
1. Create   
2. Alter  
3. Truncate   
4. Drop   
5. Rename  

**DML Data Manipuulation Language**: CRUD  
1. insert   
2. select  
3. update  
4. delete   
	
**DCL Data Control Language**: roles & permission  
1. Grant  
2. Revoke  

**TCL Transactoin Control Language**: for transactions  
1. Commit  
2. Rollback  
3. savepoint  
4. set transaction

**Mysql commandline:**
```	mysql –u root –p  
	show databases;  
	use databasename;  
	show tables;
```

**Mysql Engines:**  
1. InnoDB - current default engine, for concurrecy, transactions, row level locking  
2. mysam  - default engine before mysql 5.5, for speed  
3. heap ex.csv,archieve  
	
