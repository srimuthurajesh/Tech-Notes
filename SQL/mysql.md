## MYSQL- 
 
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

#### Variable  
1.User defined variable: SET @var_name = value;  SELECT @var_name  
2.Local variable: DECLARE a INT DEFAULT 0;   
3.System variables: predefined variables
```
DELIMITER //  
Create Procedure Test()  
    BEGIN  
        DECLARE A INT DEFAULT 100;  
        DECLARE B INT;  
        DECLARE C INT;  
        DECLARE D INT;  
        SET B = 90;  
        SET C = 45;  
        SET D = A + B - C;  
        SELECT A, B, C, D;  
    END //  
DELIMITER ;  
```

#### User Management  
CREATE USER IF NOT EXISTS rajesh@localhost identified by 'rajesh12345'  
SELECT USER FROM mysql.user  
DROP USER rajesh@localhost, arun@localhost  
UPDATE user SET password = PASSWORD('rajesh12345') WHERE user = 'user_name' AND host = 'host_name'  
GRANT ALL PRIVILEGES ON * . * TO peter@localhost  
GRANT CREATE, SELECT, INSERT ON * . * TO user_name@host_name  
FLUSH PRIVILEGES  
SHOW GRANTS for user_name  
   
#### Database Management:  
CREATE [IF NOT EXIST] DATABASE database_name  
SHOW DATABASES  
DROP [IF EXIST] DATABASE database_name  
MYSQLDUMP -Uroot -Proot database_name > dump.sql  //export   
MYSQLDUMP -Uroot -Proot database_name < dumpsql   //import  

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
	
