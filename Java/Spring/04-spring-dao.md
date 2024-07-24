# Spring DAO

- [Hibernate](#hibernate)
	- [Hibernate vs JDBC](#hibernate-vs-jdbc)
- [Hibernate Architecture](#hibernate-architecture). 
- [Hibernate session object lifecycle](#hibernate-session-object-lifecycle)
- [Annotations](#annotations)  
	- [Entity class annotation](#entity-class-annotation)
		- [Generated Type](#generated-type)
		- [Named query](#named-query)
- [CRUD Operations](#crud)
	- [JPA Repository](#jpa_respository)
		- [Entity Manager - criteria](#entity-manager-criteria)
		- [Entity manager - createquery](#entity-manager-createquery)
	- [Session Object](#session-object)
		- [HQL](#session-hql)
		- [SQL](#session-sql)
		- [Criteria](#session-criteria)
- [Hibernate Configuration](#hibernate-configuration)
	- [XML Configuration](#1-xml-configuration)
	- [Java configuration](#2-java-configuration)
- [Hibernate Mappings](#hibernate-mappings)
	- [OneToOne](#1-onetoone)
	- [OneToMany](#2-onetomany)
	- [ManyToMany](#manytomany)
- [Fetch Types](#fetch-types)
	- [Lazy](#lazy)
	- [Eager](#eager)
- [Cascade](#cascade)
- [Cache](#cache)



Note: The default JPA provider for Spring boot is Hibernate

# Hibernate
> open-source ORM framework, simplifies db interactions/portability.

- **ORM tool** : (Object-Relational Mapping) maps java object to Database table   
- **JPA tool** :  provides standard methods for ORM tools.
- **dialect** : specify type of database  
- **HQL**: Hibernate query language, DB intependent, works on persistant object instead of tables/columns  

### Hibernate vs JDBC

| Feature                       | Hibernate                                     | JDBC                                         |
|-------------------------------|-----------------------------------------------|----------------------------------------------|
| **Abstraction Level**         | Higher-level ORM 								| Lower-level database interaction API         |
| **Query Language**            | HQL (Hibernate Query Language), Criteria API  | Plain SQL                                    |
| **Data Mapping**              | Automatically maps Java objects to database tables | Manual mapping via SQL and result sets        |
| **Caching**                   | Built-in caching mechanisms                   | No built-in caching                          |
| **Transaction Management**    | Built-in, integrated with JTA and Spring      | Needs to be manually handled                 |
| **Lazy Loading**              | Supported                                     | Not supported                                |

#### SQL vs HQL
> Hql has entity name in query syntax, sql will have db table name  

## Hibernate Architecture:  
1. **Configuration object**  
- creates only once during initialization
- load db connection properties from hibernate.cfg.xml/properties file  
- maps javaclasses and DBtables. 
    
2. **SessionFactory object**  
- creates one time, there will be one sessionFactory for one DB    
- thread safe , heavyweight object  

3. **Session object**   
- created eachtime interact DB
- not thread safe, so do close it  
 
4. **Trasaction object**  
- unit of work with DB  
- handled by underlying transaction manager and transaction (from JDBC or JTA).  
5. **Query object**- use SQL,HQL string to retrieve data  
6. **Criteria Object**-used only to retreive operation, has additional conditional criterias       
  
## Hibernate Session Object lifecycle:
1. **Transient** - new instance of pojo ```Cust cust = new Cust();```    
2. **Persistent** - associate with session (while save())  
3. **Removed** - while remove(),delete()  
4. **Detached** - closed from session(while `session.clear()`, `session.close();`,   
manually `session.evict(entity);`, `session.detach(entity);`)   

Note: `session.contain(entity);` will check entity is in persistent stage or not

## Annotations:  
### Entity class Annotation  

| Annotation Name  	| Definition                                            |
|-------------------|-------------------------------------------------------|
| `@Entity`          	| Marks a class as an entity                            |
| `@Table`           	| db table details. name,catalogue,schema,unique constraints|
| `@Id`              	| Marks primary key field                               |
| `@GeneratedValue`	| Defines primary key generation strategy               |
| `@Column`          	| Maps field to column                                  |
| `mappings`       	| @OneToMany, @ManyToOne, @ManyToMany, @ManyToMany      |
| `@JoinColumn`      	| Defines join column for relationships and properties like name |
| `@JoinTable`       	| Defines join table for many-to-many relationships     |
| `@Transient`       	| Excludes field/methods from database mapping          |
| `@NamedQuery`      	| query expressed as alias in metadata of entity class 	|
| `@DynamicUpdate`  | class level, while preparing update query, it takes only changed fields |
| `@DynamicInsert`  | class level, while preparing insert query, it takes only non-null fields |

#### Generated Type
> configures entity primary key generation, conjunction with @Id    

`@GeneratedValue(strategy=GenerationType.AUTO)`

| GenerationType	| Description                             					| Use Case                                      |
|-------------------|-----------------------------------------------------------|-----------------------------------------------|
| `AUTO`            | handled by hibernate, table:hibernate_sequence  			| General use, database-agnostic                |
| `IDENTITY`        | handled by db identity column                            	| Databases that support identity columns       |
| `SEQUENCE`        | assign primarykey using db sequence                       | sequence support (e.g., Oracle, PostgreSQL) |
| `TABLE`           | assign primarykey using underlying DB to ensure uniqueness| Databases without sequence or identity support, legacy systems |

#### Named query
> static query expressed as alias in metadata of entity class.   

Adv: For reusability by alias, maintainability, performance  
```
@NamedQuery(name = "Customer.findByName", query = "SELECT c FROM Customer c WHERE c.name = :name")  
@NamedQueries(value={
	@NamedQuery(name = "Customer.findByName", query = "SELECT c FROM Customer c WHERE c.name = :name")
	})  
class Customer {}  
```

**Using namedquery in Jpa repository:**  
```
@Query(name = "Customer.findByName")
List<Customer> findByName(@Param("name") String name);
```
**Using namedquery in session**    
```
List<Customer> customers = session.createNamedQuery("Customer.findByName", Customer.class)
                                          .setParameter("name", name)
                                          .getResultList();
```

### Persistance class Annotation 

| Annotation                     | Description                                   |
|--------------------------------|-----------------------------------------------|
| `@Repository`                  | Marks class as spring Data repository.        |
| `@Transactional`               | rollback behavior for exceptions              |
| `@Query()` 					 | using in jparepository, Specifies custom query|
| `@Modifying`                   | Mark method that performs a non-read operation. for @Transactional|
| `@Param`                       | Names query method parameter.                 |
| `@Lock`                        | controls concurrent access to data            |
| `@Cacheable`                   | Caches the 	method result.                   |
| `@PersistenceContext`          | Injects an EntityManager.                     |
| `@EnableJpaRepositories`       | not required in spring boot                   |
| `@CacheEvict`                  | Evicts entries from cache.                    |
| `@CachePut`                    | Updates cache with result.                    |
| `@EntityGraph`                 | Defines entity fetching graph.                |
| `@Procedure(procedureName="")` | Calls a stored procedure.                     |
| `@NoRepositoryBean`            | Excludes parent interface as repository, when we extends interface.|
| `@EnableTransactionManagement` | not required in springboot, used in configuration |
| `@Audited`                     | track changes and able to query historical data |
| `@SQLDelete(sql="")`           | soft delete, Custom SQL query while we perform delete() |
| `@Where(clause = "deleted = false")`| works alone with @SQLDelete              |
| `@OptimisticLocking`           | dont lock entire row, only lock @version column |

```
public interface ProductRepository extends JpaRepository<Product, Long> {
	@Modifying
    @Transactional
    @Lock(LockModeType.PESSIMISTIC_WRITE) 
    @Query("select p from Product p where p.id = :id", nativeQuery=false)
    @Audited
	Product findByIdAndNameWithLock(Long id, @Param("name") String name);
}
```

1. @EnableTransactionManagement - along with @Configuration class, not used if we using spring-data or spring-tx  
2. @Transactional - class level. perform rollback ```@Transactional(rollbackFor = { SQLException.class })```    
so beingtransaction,transaction.commit are not needed.. to enable this we need @EnableTransactionManagement in java file   
or in xml file //<tx:annotation-driven transaction-manager="myTransactionManager" />

Note: Transaction is alterntive for session.begin, session.commit, session.rollback  

| Propagation Type  | Description                         | Use Case                                     |
|-------------------|-------------------------------------|----------------------------------------------|
| `REQUIRED`        | Joins or starts a transaction.      | Default, shared transactions.                |
| `REQUIRES_NEW`    | Always starts a new transaction.    | Independent transactions, logging.           |
| `MANDATORY`       | Requires an existing transaction.   | Must run within a transaction.               |
| `NESTED`          | Nested within an existing one.      | Savepoints, nested transactions.             |
| `SUPPORTS`        | Joins if exists, else none.         | Optional transaction context.                |
| `NOT_SUPPORTED`   | Runs outside of transactions.       | Ensure no transaction context.               |
| `NEVER`           | Fails if a transaction exists.      | Must not run within a transaction.           |

## Hibernate Configuration
### 1. XML Configuration
- The primary XML files used are `hibernate.cfg.xml`  

```
<hibernate-configuration>
    <session-factory>
        <property name="hibernate.connection.driver_class">com.mysql.jdbc.Driver</property>
        <property name="hibernate.connection.url">jdbc:mysql://localhost:3306/yourdb</property>
        <property name="hibernate.connection.username">root</property>
        <property name="hibernate.connection.password">password</property>
        <property name="hibernate.dialect">org.hibernate.dialect.MySQLDialect</property>
        <property name="hibernate.show_sql">true</property>
        <property name="hibernate.hbm2ddl.auto">update</property>
    </session-factory>
</hibernate-configuration>
```
```
//even if we didnt give the xml, in default it will pick hibernate-cfg.xml
Configuration configuration = new Configuration().configure("hibernate-cfg.xml");
configuration.addAnnotatedClass(customerentity.class);
SessionFactory sessionFactory = configuration.buildSessionFactory();
Session session = sessionFactory.openSession();
```
### 2. Java Configuration
```
Configuration configuration = new Configuration();
configuration.setProperty("hibernate.connection.driver_class", "com.mysql.jdbc.Driver");
configuration.setProperty("hibernate.connection.url", "jdbc:mysql://localhost:3306/yourdb");
configuration.setProperty("hibernate.connection.username", "root");
configuration.setProperty("hibernate.connection.password", "password");
configuration.setProperty("hibernate.dialect", "org.hibernate.dialect.MySQLDialect");
configuration.setProperty("hibernate.show_sql", "true");
configuration.setProperty("hibernate.hbm2ddl.auto", "update");

// Add annotated classes
configuration.addAnnotatedClass(YourEntity.class);

SessionFactory sessionFactory = configuration.buildSessionFactory();
Session session = sessionFactory.openSession();

```
## CRUD
### JPA_RESPOSITORY

| JpaRepository Method                       | Description                    | Alternative in Hibernate Session                     |
|--------------------------------------------|---------------------------------|------------------------------------------------------|
| `save(S entity)`                           | Saves an entity.                  | `save(Object entity)`                               |
| `saveAll(Iterable<S> entities)`            | Saves all entities.               | `save(Object entity)` (repeat for each entity)      |
| `findById(ID id)`                          | Retrieves entity by ID.           | `get(Class<T> entityClass, Serializable id)`       |
| `findAll()`                                | Returns all entities.             | `createQuery("from Entity")` or `createCriteria()`  |
| `findAllById(Iterable<ID> ids)`            | Returns entities by IDs.          | Use `createQuery` or `createCriteria` with `IN` clause |
| `deleteById(ID id)`                        | Deletes entity by ID.             | `delete(Object entity)` (find first, then delete)   |
| `delete(T entity)`                         | Deletes an entity.                | `delete(Object entity)`                             |
| `deleteAll()`                              | Deletes all entities.             | `createQuery("delete from Entity")`                 |
| `deleteAll(Iterable<? extends T> entities)`| Deletes given entities.           | `delete(Object entity)` (repeat for each entity)    |
| `count()`                                  | Counts all entities.              | `createQuery("select count(*) from Entity")`        |
| `existsById(ID id)`                        | Checks if ID exists.              | `findById(ID id)` (check if result is present)      |
| `flush()`                                  | Flushes changes to database.      | `flush()`                                           |
| `saveAndFlush(S entity)`                   | Saves and flushes entity.         | `save(Object entity)`, followed by `flush()`        |
| `findAll(Sort sort)`                       | Returns sorted entities.          | `createQuery("from Entity order by property")`       |
| `findAll(Pageable pageable)`               | Returns paginated entities.       | Use `setFirstResult()` and `setMaxResults()` in query |
| `findOne(Specification<T> spec)`           | Finds one by specification.       | Use `createQuery` with criteria for one result       |
| `findAll(Specification<T> spec)`           | Finds all by specification.       | Use `createQuery` with criteria                      |
| `findAll(Specification<T> spec, Sort sort)`| Finds and sorts by specification. | Use `createQuery` with criteria and order by clause  |
| `findAll(Specification<T> s, Pageable p)` | Finds and paginates by specification.		| Use `createQuery` with criteria, and paging methods  |
| `count(Specification<T> spec)`             | Counts by specification.          | Use `createQuery("select count(*) from Entity where criteria")` |
| `exists(Specification<T> spec)`            | Checks if exists by specification.| Use `createQuery` with criteria and check if result is present |

#### Entity manager Criteria
```
@PersistenceContext
private EntityManager entityManager;
```
```
CriteriaBuilder cb = entityManager.getCriteriaBuilder();
CriteriaQuery<Employee> cq = cb.createQuery(Employee.class);
Root<Employee> employee = cq.from(Employee.class);
Predicate salaryPredicate = cb.equal(employee.get("salary"), salary);
Predicate namePredicate = cb.like(employee.get("firstName"), firstNamePattern);
Predicate orPredicate = cb.or(salaryPredicate, namePredicate);
cq.where(orPredicate);
return entityManager.createQuery(cq).getResultList();
```
#### Entity manager CreateQuery
```
Query query = entityManager.createQuery("SELECT e FROM Entity e WHERE e.name = :name");
query.setParameter("name", "example");
List<Entity> results = query.getResultList();
```
### Session Object
```
SessionFactory sessionFactory = new Configuration().configure("hibernate-cfg.xml");
ServiceRegistry serviceRegistry = new StandardServiceRegistryBuilder()
		.applySettings(configuration.getProperties())
		.build();
sessionFactory = configuration.buildSessionFactory(serviceRegistry);   
```
```
Session session = HibernateUtil.getSessionFactory().openSession();
session.beginTransaction();
session.getTransaction().commit();
session.close();
```

| Method                               | Description                         | Alternative in JpaRepository         |
|--------------------------------------|-------------------------------------|--------------------------------------|
| `beginTransaction()`                  | Starts a new transaction.          | -                                    |
| `getTransaction()`                   | Retrieves the current transaction.  | -                                    |
| `save(Object entity)`                | Saves an entity.                    | `save(S entity)`                     |
| `update(Object entity)`              | Updates an entity.                  | `save(S entity)`                     |
| `saveOrUpdate(Object entity)`        | Saves or updates an entity.         | `save(S entity)`                     |
| `delete(Object entity)`              | Deletes an entity.                  | `deleteById(ID id)`, `delete(S entity)` |
| `get(Class<T> entityClass, Serializable id)`  | Hits DB, returns `null` if not found. | `findById(ID id)`                     |
| `load(Class<T> entityClass, Serializable id)` | Won’t hit DB until object is used;throws exception if not found. |`getReferenceById(ID id)`|
| `createQuery(String hql)`            | Creates an HQL query.                | `@Query("HQL query")`                |
| `createSQLQuery(String sql)`         | Creates a SQL query.                 | `@Query("SQL query")`                |
| `createCriteria(Class<T> entityClass)` | Creates a Criteria query.          | `@Query` with Criteria API or `QueryDSL` |
| `flush()`                            | Syncs changes to the database.       | -                                    |
| `clear()`                            | Clears the persistence context.      | -                                    |
| `evict(Object entity)`               | Detaches an entity.                  | -                                    |
| `close()`                            | Closes the session.                  | -                                    |
| `isOpen()`                           | Checks if session is open.           | -                                    |
| `contains(Object entity)`            | Checks if entity is managed.         | -                                    |
| `refresh(Object entity)`             | Refreshes entity from database.      | -                                    |
| `merge(Object entity)`               | Merges detached entity into session. | `save(S entity)` (merges implicitly) |
| `getSessionFactory()`                | Gets the session factory.            | `EntityManagerFactory`               |
| `setFlushMode(FlushMode flushMode)`  | Sets the flush mode.                 | `@Transactional` (flush mode can be managed via transaction settings) |
| `getFlushMode()`                     | Gets the current flush mode.         | -                                    |
| `getEntityName(Object object)`       | Gets the entity name.                | -                                    |


#### Session HQL
1. Select - session.createQuery("insert into Product(productId,proName,price) select i.itemId,i.itemName,i.itemPrice from Items i where i.itemId= 22");  
2. Retrival - 	
		session.createQuery("from student s where s.name='raj'").list();  
		session.createQuery("from student s where s.id=:id").setParameter("id",2).list(); // replace :id by given param  
		session.createQuery("from student s where s.name=:name").setString("name","raj").list(); // set string datatype 
		session.createQuery("from student s where s.name=:name").setProperties(stuObj).list(); // param value auto pick     
		Query query = session.createQuery(hql);session.createQuery("from student s where s.name=?").setParameter(0,"raj").list(); 	// can replace by position ? symbol
		query.setFirstResult(1);				// limit start  
		query.setMaxResults(10); 				// limit end  
3. Update - session.CreateQuery("update student set name='raj'").executeUpdate();  
4. Delete - session.CreateQuery("delete from student where name='raj'").executeUpdate();

#### Session SQl
4. Create - session.createSQLQuery("insert into Product value ('raj',25)");  
3. Retrival -  session.CreateSQLQuery("select name from students").executeUpdate(); 
3. Update - session.CreateSQLQuery("update student set name='raj'").executeUpdate();
3. Delete - session.CreateSQLQuery("delete from student where name='raj'").executeUpdate();

#### Session Criteria
> CreateCriteria - programmatically constructing queries for retrieving data       

1. Create criteria Object: `Criteria cr = session.createCriteria(Employee.class).list();`  
2. Adding restriction: `Criterion salary = cr.add(Restrictions.eq("salary", 2000)); `
//eq,lt,gt,like,ilike,between,isNull,isNotNull,isEmpty,isNotEmpty  
Criterion name = Restrictions.ilike("firstNname","zara%");  
LogicalExpression orExp = Restrictions.or(salary, name); //eq. or,and    

3. Additin restriction in criteria: `cr.add( orExp );`
4. Limit start: `cr.setFirstResult(1);`			
5. Limit end: `cr.setMaxResults(10);` 				
6. Order Asc Dec : `cr.addOrder(Order.asc("salary"));`      
7. Count: `cr.setProjection(Projections.rowCount());`    
8. Distinct: `cr.setProjection(Projections.countDistinct("firstName"));`  
9. Aggregate function:min, max,sum,avg `cr.setProjection(Projections.sum("salary"));`   
List<Employee> results = cr.list();  



---

### HQL 
FROM clause: String hql = "FROM Employee"; (or) String hql = "FROM com.hibernatebook.criteria.Employee";  
AS clause: String hql = "FROM Employee AS E"; (or) String hql = "FROM Employee E";  
SELECT clause: String hql = "SELECT E.firstName FROM Employee E";  
WHERE clause: String hql = "FROM Employee E WHERE E.id = 10";  
ORDERBY clause: String hql = "FROM Employee E WHERE E.id > 10 ORDER BY E.salary DESC";  
GROUPBY clause: String hql = "SELECT SUM(E.salary), E.firtName FROM Employee E GROUP BY E.firstName";  
UPDATE clause: String hql = "UPDATE Employee set salary = :salary WHERE id = :employee_id";  
DELETE clause: String hql = "DELETE FROM Employee WHERE id = :employee_id";  
INSERT clause: String hql = "INSERT INTO Employee(firstName, lastName, salary)"+"SELECT firstName, lastName, salary FROM old_employee";

## Hibernate Mappings

### 1. OneToOne
```
class Customer{
	@OneToOne(cascade=CascadeType.ALL) 	
	@JoinColumn(name="customerCart_id")		//foreign key column name
	private CustomerCart customerCart;
}
class CustomerCart{
	private int customerCartId;
	@OneToOne(mappedBy="customerCart", 
			cascade={CascadeType.DETACH, CascadeType.MERGE, CascadeType.PERSIST,
						CascadeType.REFRESH})
	
	private Customer customer;
}
```
```
CREATE TABLE `customer`( `customer_id` int NOT NULL AUTO_INCREMENT, `customer_name` varchar(22) DEFAULT NULL, PRIMARY KEY (`customer_id`),
`cart_id` int, FOREIGN KEY (`cart_id`) REFERENCES cart(`cart_id`));
CREATE TABLE `cart` ( `cart_id` int NOT NULL AUTO_INCREMENT,`cart_name` varchar NULL, PRIMARY KEY(`cart_id`));  
```

### 2. OneToMany
```
class Cart{
	@OneToMany(mappedBy = "cart", cascade = CascadeType.ALL, fetch = FetchType.LAZY)
    private List<Product> products;
}
class Products{
	@ManyToOne
    @JoinColumn(name = "cart_id", nullable = false)
    private Cart cart;
}
```
```
CREATE TABLE Cart (cart_id BIGINT PRIMARY KEY AUTO_INCREMENT);
CREATE TABLE Product (product_id BIGINT PRIMARY KEY AUTO_INCREMENT,
cart_id BIGINT NOT NULL, FOREIGN KEY (cart_id) REFERENCES Cart(cart_id));
```
### 3. ManyToMany:
```
public class Student {
    @ManyToMany(cascade = { CascadeType.PERSIST, CascadeType.MERGE })
    @JoinTable(
        name = "student_course",
        joinColumns = @JoinColumn(name = "student_id"),
        inverseJoinColumns = @JoinColumn(name = "course_id")
    )
    private Set<Course> courses = new HashSet<>();
}
public class Course {
    @ManyToMany(mappedBy = "courses", cascade = { CascadeType.PERSIST, CascadeType.MERGE })
    private Set<Student> students = new HashSet<>();
}

```
## Fetch types
### 1. Lazy
> related entities are loaded only when they are explicitly accessed.  

`@OneToMany(mappedBy = "customer", fetch = FetchType.LAZY)`  
default for @OneToMany and @ManyToMany:  
Note: **LazyInitializationException**: occurs if we try to use get related entities after session close  

### 2. Eager
> related entities are loaded immediately with their parent entity.  
default for @ManyToOne and @OneToOne  


## Cascade
> apply same operation to related entities or joined tables.

Defalt value :No cascade    // need to explicitly call save() for related entity    
Ex: @OneToOne(cascade=CascadeType.PERSIST) -> save()   
1. @OneToOne(cascade=CascadeType.REMOVE) -> delete() - Deletes an entity from the database.    
2. @OneToOne(cascade=CascadeType.REFRESH) -> refresh() - Reloads an entity’s state from the database  
3. @OneToOne(cascade=CascadeType.DETACH) ->  detach() - Disassociates an entity from the persistence context.    
4. @OneToOne(cascade=CascadeType.MERGE) ->  merge() - reattaches the entity to the persistence context  
5. @OneToOne(cascade=CascadeType.ALL) -> all above cascade tpes applied    


## Cache:

### First level cache
>  session-level cache, stores data specific to single session. default cannot be disabled  

Adv: avoid database round-trips.  
### Secound level cache:  
> hold by session factory, shared across multiple sessions.

- data stored in hashmap format eg.<22,{"raj","ECE"}> where primarykey is key and result is value   
- works only for session object, not work for createQuery/createSQLQuery   
- some cache providers are Ehcache(Easy Hibernate), Swarm, OS, JBoss Cache  

#### Steps to enable 2nd level cache:  
1. in pom.xml add hibernate-ehcache  
2. Add properties in xml   

```
<property name="hibernate.cache.use_second_level_cache">true</property>
<property name="hibernate.cache.provider_class">org.hibernate.cache.EhCacheProvider</property>
<property name="hibernate.cache.region.factory_class">org.hibernate.cache.ehcache.EhCacheRegionFactory</property>
```

3. Add annotation in entity class  
```
@Cache(usage=CacheConcurrencyStrategy.READ_ONLY)
@Entity
@Cacheable
@Cache(region = "authors", usage = CacheConcurrencyStrategy.READ_WRITE)
public class Employee {   } 
```  
**Region**- logical grouping of cached data. Each region has its own settings ex:eviction policies, time-to-live, concurrency strategies.    
**CacheConcurrencyStrategy**: defines how cached data is accessed and managed  
	i). READ_ONLY: work for readonly operation  
	ii). NONSTRICT-READ-WRITE: work for readwrite but one at a time  
	iii). READ-WRITE: work for readwrite, can be used simultaneously  
	iv). TRANSACTIONAL: work for transaction  

### Query cache
> data stored as hashmap where query text param is key, result is value 

1. Add properties in xml ```<propertyerty name="hibernate.cache.use_query_cache">true</property>```  
2. Set cache in query ``` Query q=session.createQuery("from employee").setCacheable(true).list();```
