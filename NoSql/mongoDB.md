# Mongo DB:

### Commands  
```mongod```	- to start the db service  
```mongo```		- to get the db commandline  

```show dbs```		-view all databases    
```use db_name```		-select database, also create database	  
```db```			-show selected database  
```db.drop```			-drop database  
```show collections```	- show tables  in selected database  
```db.collection_name.drop()```  

### Insertion
```db.collection_name.insert( [{“name”:”rajesh”,”password”:”rajesh95”},{“name”:”vivek”,”password”:”vivek95”}] )```

### Selection
```db.collection_name.find()```    
```db.collection_name.find().pretty()```			-print json values with indentation  
```db.collection_name.find().limit(2)```		-select first two values  
```db.collection_name.find().skip(2)```		- leave first two values  
```db.collection_name.find({ $or: [ { “age”:20, “age”:22}] })```  
```db.age_table.find({"age":{$gt:20}})```		- greater than  
```db.age_table.find({"age":{$lt:20}})```		- lower than  
```db.age_table.find({"age":{$gte:20}})```		- greater or equal to  			
```db.age_table.find({"age":{$lte:20}})```		- lower or equal to  
```db.age_table.find({"age":{$ne:20}})```		- not equal to  
```db.age_table.find({"name":"rajesh"},{"name":1,_id:0})```      	condition and show hide 0,1  


### Updation  
```db.collection_name.update({ existed json },{ new json })```  
```db.collection_name.save({ existed json },{ new json })```  


### Deletion
```db.collection_name.remove({json object})```

### Aggregate Functions
```db.collection_name.aggregate({ $group: { _id: “ $age”}, a_user_def_name : ($sum: 1) })```  
```db.collection_name.aggregate({ $group: { _id: “ $gender”}, a_user_def_name : ($avg: $age) })```  

### Index
```db.collection_name.ensureIndex({“age”:21})```		- adding to index  
```db.collection_name.getIndexes()```  
```db.collection_name.find({ json obj}). explain(“executeionStats”)```		- give the flow of search  

### DataTypes:
1. String
2. Integer
3. Boolean
4. Min/Max keys
5. Array
6. Timestamp
7. Object
8. Null
9. Symbol
10. Date
