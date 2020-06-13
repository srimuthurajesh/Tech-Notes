## SQL- 
>Structured query language


 
1. **DDL Data Definition Language**: create, modify struture of database  
CREATE, ALTERr, TRUNCATE, DROP, RENAME  

2. **DML Data Manipuulation Language**: CRUD  
INSERT, SELECT, UPDATE, DELETE   
	
3. **DCL Data Control Language**: roles & permission  
GRANT,  REVOKE    

4. **TCL Transactoin Control Language**: for transactions  
COMMIT, ROLLBACK, SAVEPOINT, SET TRANSACTION  

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
	
