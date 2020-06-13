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


| Datatype        | size(Bytes)           | Signed  | Unsigned  |
| ------------- |:-------------:| -----:|-----:|
| TINYINT      | 1 | -128 to +128 |0 to 255 |
| SMALLINT      | 2      | -+32768 | 0 to 65535 |
| MEDIUMINT | 3      | -+8388608 | 0 to +16777215 |
| INT      | 4 | -+2147483648 | 0 to +4294967295 |
| BIGINT      | 8 | -+9223372036854775808 | 0 to +18446744073709551615 |



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
	
