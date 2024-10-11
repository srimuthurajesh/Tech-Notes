### Scaling:

(https://www.youtube.com/watch?v=Nx4bvwU0DqE)[https://www.youtube.com/watch?v=Nx4bvwU0DqE]

| Horizontal scaling 		|	Vertical scaling            |
|---------------------------|-------------------------------|
| More number of servers	|	Bigger server				|
| LoadBalancing required	|	N/a							|
| Resilient					|   Single point of failure		|
| Network calls(Rpc)		|	Inter process communication |
| Data inconsistence		|	Consistence					|
| Scales well as user grow	|   Hardware limit				|

### Load Balancing
Types of distribution  
1. Random
2. Round Robin
3. Random(weight for ram and cpu cycles)

### Important points to consider when system design:
1. Scalability
2. Performance
3. Reliability/Availability
4. Security
5. Maintainability:  documentation and well-organized code.
6. Interoperability: work seamlessly with other systems  
7. Usability: clear user interface.
8. Cost-effectiveness  


## Database
1. RDBMS
2. Nosql(Non relational DB)
    | Type                  | Examples           | Description                          | Data                                      |
    |-----------------------|--------------------|--------------------------------------|-------------------------------------------|
    | **Key-Value Pair**    | Redis, DynamoDB    | Suitable for simple lookups.         | `"user123": "John Doe"`                   |
    | **Graph Store**       | Neo4j, AWS Neptune | Stores as nodes & relationships.     | `(User: John) -[FRIEND]-> (User: Jane)`   |
    | **Column Store**      | Cassandra          | Stores in columns,for read-heavy ops.| `plaintext row_key column1 column2 column3 user123 name:John email:john@example.com phone:1234567890 `|
    | **Document Store**    | MongoDB            | Stores as documents ie.JSON/BSON.    | `{"id": "123", "name": "John Doe"}`       |
