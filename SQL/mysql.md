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

#### Table Management:
SHOW TABLES
{DESCRIBE | DESC} table_name
CREATE [TEMPORARY ] TABLE [IF NOT EXIST] table_name ( column_name1 data_type(size) [NULL | NOT NULL], ..., PRIMARY KEY, UNIQUE KEY, FOREIGN KEY, CHECK, etc);   
``` CREATE TABLE employee_table( id int NOT NULL AUTO_INCREMENT, name varchar(45) NOT NULL, occupation varchar(35) NOT NULL, age int NOT NULL, PRIMARY KEY (id));  ```  
**Temporary table**: temporary data, visible & accessible for current session  
ALTER TABLE table_name ADD new_column_name column_definition [ FIRST | AFTER column_name ], ...      
ALTER TABLE table_name MODIFY column_name column_definition [ FIRST | AFTER column_name ], ...  
ALTER TABLE table_name DROP COLUMN column_name    
ALTER TABLE table_name CHANGE COLUMN old_name new_name column_definition [ FIRST | AFTER column_name ]    
ALTER TABLE table_name RENAME TO new_table_name  
RENAME old_table TO new_table, old_table2 TO new_table2;  //privilege changes manually, can do for multiple tables, support temporary/view table  
SHOW FULL TABLES //show table_type(base_table,view)  
SHOW TABLES FROM/IN database_name;
TRUNCATE TABLE table_name; SET FOREIGN_KEY_CHECKS=0;  
DROP [ TEMPORARY ] TABLE table_name  
CREATE TABLE SELECT * FROM existing_table_name;  
CREATE TABLE duplicate_table LIKE original_table;  
INSERT new_table_name SELECT * FROM existing_table_name;  
CREATE [OR REPLACE] VIEW view_name AS SELECT columns FROM tables [WHERE conditions];    
ALTER VIEW view_name AS SELECT columns FROM table WHERE conditions;    
DROP VIEW [IF EXISTS] view_name;  

**Type of Lock:** 1.ReadLock(allows user only read) 2.WriteLock(allows user only write)  
LOCK TABLES table_name [READ | WRITE];   
UNLOCK TABLES;  

#### CRUD:  
SELECT * FROM table_name [WHERE Clause] [GROUP BY Clause] [HAVING Clause] [ORDER BY Clause];    
**Operators**: SELECT * FROM table_name WHERE column_name {=,>,<,>=,<=,<>,!=,LIKE} column_value;  
**Logical operators**: SELECT * FROM table_name WHERE colname=colvalue {AND, OR, NOT} colname=colvalu;  
**IN** : SELECT column_name FROM table_name WHERE column_name IN ( Amit , Raghav, Rajeev);  
**BETWEEN**: SELECT column_name FROM table_name WHERE column_name BETWEEN 1,10;
**Distinct**: SELECT DISTINCT column_name FROM table_name [GROUP BY column_name];  
**Top**: SELECT TOP 2 coloumn_name FROM table_name;   //retrive like (0,2)    
**Alias**: SELECT column_name AS user_defined_name FROM table_name;  
**Aggregate Functions**: SELECT {COUNT|AVG|SUM|MIN|MAX}([DISTINCT] column_name) FROM table_name;  
**OrderBy**: SELECT column FROM table ORDER BY {ASC|DECS|RAND()};  
**Limit**: SELECT column FROM table LIMIT 0,1;  
**Null**: SELECT column_name FROM table_name WHERE column_name {IS NULL | IS NOT NULL};  

INSERT INTO table_name (col_name) VALUES ('col_value');  
UPDATE table_name SET column1 = value1, column2 = value2, ... WHERE condition;  
DELETE FROM table_name WHERE condition;  





**Date Functions**:  
datediff()  

#### SQL keys:  
**Primary key**: unique, cannot NULL, only one PK allowed, PK length cannot exceed 900bytes   
CREATE TABLE table_name (column_name, DATA_TYPE.. PRIMARY KEY (COLUMN1));  
CREATE TABLE table_name (column_name, DATA_TYPE.. PRIMARY KEY (COLUMN_1, COLUMN_2, ...));  
**Foreign key**:  
CREATE TABLE table_name (column_name, FOREIGN KEY (column_name) REFERENCES Persons (column_name));  
ALTER TABLE table_name ADD CONSTRAINT column_name FOREIGN KEY(column_name) REFERENCES Students (column_name);    
ALTER TABLE table_name {ROP,DROP} FOREIGN KEY column_name     
**Unique key**:  
CREATE TABLE table_name (column_name int NOT NULL,... UNIQUE (column_name));   
ALTER TABLE table_name ADD UNIQUE (column_name);  
ALTER TABLE table_name DROP INDEX column_name;   




**Mysql Engines:**  
1. InnoDB - current default engine, for concurrecy, transactions, row level locking  
2. mysam  - default engine before mysql 5.5, for speed  
3. heap ex.csv,archieve  
	
