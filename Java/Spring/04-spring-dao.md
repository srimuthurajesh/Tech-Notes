# Spring JPA

1. [Hibernate Architecture](#hibernate-architecture). 
2. [Hibernate session object lifecycle](#hibernate-session-object-lifecycle)
3. [Annotations](#annotations). 
4. Steps for Hibernate
CRUD Operations in Hibernate
Hibernate Query Language (HQL)
Hibernate Criteria
HQL Examples
Hibernate Mappings
	OneToOne
	OneToMany
	ManyToOne
	ManyToMany
Eager & Lazy Loading
Cascading in Hibernate
Caching in Hibernate
Hibernate Configuration
	DAO Class
	ApplicationContext Configuration (Java)
	Hibernate.cfg.xml (XML)
Index for Miscellaneous Topics
	Second Level Cache
	Query Cache
	Transaction Management
	Enabling Annotations for Transaction Management
	Web Resource Configuration






Note: The default JPA provider for Spring boot is Hibernate

# Hibernate
> framework for database interactions  

- **ORM tool** : maps java object to Database table   
- **JPA tool** :  provides standard methods for ORM tools.
- **dialect** : specify type of database  
- **HQL**: Hibernate query language, DB intependent, works on persistant object instead of tables/columns  


## Hibernate Architecture:  
1. **Configuration object**  
- creates only once during initialization
- load db connection properties from hibernate.cfg.xml/properties file  
- maps javaclasses and DBtables. 
    
2. **SessionFactory object**  
-creates one time, there will be one sessionFactory for one DB    
-created by configuration  
-thread safe  
-heavyweight object  

3. **Session object**  
-created eachtime interact DB
-created by sessionfactory  
-not thread safe, so do close it  
-runtime interface(physical connection) between java and DB,  
 
4. **Trasaction object**  
-unit of work with DB  
-handled by underlying transaction manager and transaction (from JDBC or JTA).  
5. **Query object**- use SQL,HQL string to retrieve data  
6. **Criteria Object**-used only to retreive operation, has additional conditional criterias       
  
### Hibernate Session Object lifecycle:
1. Transient - new instance of pojo  
2. Persistent - associate with session (while save(),update(),persist(),lock(),merge(),saveOrUpdate())  
2a. while get and load() it is in persistent stage    
3. Removed - while remove(),delete()  
4. Detached - closed from session(while clear(),close())  

## Annotations:  
### Entity class Annotation  
1. @Entity - make class as entity bean  
2. @Table - specify details of table. name,catalogue,schema,unique constraints  
3. @Column - specify details of column. name,length,nullable,unique  
	Ex:```@Column(name = "LAST_NAME", unique = false, nullable = false, length = 100)```  
4. @Id - to mention primary key for persistant class  
5. @GeneratedValue(strategy=GenerationType.IDENTITY)  - also use AUTO,SEQUENCE,TABLE  
	a) GenerationType.AUTO- appropreiate stategy for particular DB  
	b) GenerationType.Identity- assign primarykey using db identity column    
	c) GenerationType.SEQUENCE- assign primarykey using db sequence  
	d) GenerationType.TABLE- assign primarykey using underlying DB to ensure uniqueness  
	e) implement org.hibernate.id.IdentifierGenerator and override Serializable generate()  

### Persistance class Annotation 
1. @EnableTransactionManagement - along with @Configuration class, not used if we using spring-data or spring-tx  
2. @Transactional - class level. perform rollback ```@Transactional(rollbackFor = { SQLException.class })```    
so beingtransaction,transaction.commit are not needed.. to enable this we need @EnableTransactionManagement in java file   
or in xml file //<tx:annotation-driven transaction-manager="myTransactionManager" />	  



## CRUD

**CREATE**:  
1. SESSION - session.save(entityObj)  
// we cant directly write insert query, instead we can perform insertion from other table  
2. HQL - session.createQuery("insert into Product(productId,proName,price) select i.itemId,i.itemName,i.itemPrice from Items i where i.itemId= 22");  
3. SQL - session.createSQLQuery("insert into Product value ('raj',25)");  

**RETRIVE**:  
1. SESSION - session.get(Student.class, stdId); session.load(Student.class, stdId);  
	load method: wont hit DB until result object been used,proxy obj, throw exception if result not found  
	get method: surely hit DB eventhough result obj not used, return null if result not found   	
2. HQL - 	
		session.createQuery("from student").list();   
		session.createQuery("from student s where s.name='raj'").list();  
		session.createQuery("from student s where s.id=:id").setParameter("id",2).list(); // replace :id by given param  
		session.createQuery("from student s where s.name=:name").setString("name","raj").list(); // set string datatype 
		session.createQuery("from student s where s.name=:name").setProperties(stuObj).list(); // param value auto pick     
		Query query = session.createQuery(hql);session.createQuery("from student s where s.name=?").setParameter(0,"raj").list(); 	// can replace by position ? symbol
		query.setFirstResult(1);				// limit start  
		query.setMaxResults(10); 				// limit end  
	
3. SQL -  session.CreateSQLQuery("select name from students").executeUpdate(); 
4. CreateCriteria - read only   
```
Criteria cr = session.createCriteria(Employee.class).list();
Criterion salary = cr.add(Restrictions.eq("salary", 2000)); 
//eq,lt,gt,like,ilike,between,isNull,isNotNull,isEmpty,isNotEmpty  
Criterion name = Restrictions.ilike("firstNname","zara%");  
LogicalExpression orExp = Restrictions.or(salary, name); //eq. or,and    
cr.add( orExp );
cr.setFirstResult(1);				// limit start  
cr.setMaxResults(10); 				// limit end  
cr.addOrder(Order.asc("salary")); //orderBy   
cr.setProjection(Projections.rowCount());  //count*  
cr.setProjection(Projections.countDistinct("firstName"));	//distinct count*  
cr.setProjection(Projections.sum("salary")); //aggregate functions  //min,max,avg   
List<Employee> results = cr.list();  
```

**UPDATE**  
1. SESSION - session.update(entityObj);  
2. HQL - session.CreateQuery("update student set name='raj'").executeUpdate();  
3. SQL - session.CreateSQLQuery("update student set name='raj'").executeUpdate();

**DELETE**  
1. SESSION - session.delete(entityObj);  
2. HQL - session.CreateQuery("delete from student where name='raj'").executeUpdate();
3. SQL - session.CreateSQLQuery("delete from student where name='raj'").executeUpdate();

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

## Mappings

### 1. OneToOne
#### 1a. OneToOne unidirectional: 
between customer and customerCart table  
```
class Customer{
	@OneToOne
	@JoinColumn(name="cart_id")//foreign key column name
	private CustomerCart customerCart;
}
class Cart{
	@Column("cart_id")
	private int cartId;
}
```
```
CREATE TABLE `customer`(
`customer_id` int NOT NULL AUTO_INCREMENT,
`customer_name` varchar(22) DEFAULT NULL,
`cart_id` int,
PRIMARY KEY (`customer_id`),
FOREIGN KEY (`cart_id`) REFERENCES cart(`cart_id`));

CREATE TABLE `cart` (
`cart_id` int NOT NULL AUTO_INCREMENT,
`cart_name` varchar NULL,
PRIMARY KEY(`cart_id`));  
```
#### OneToOne Bidirectional: 
> for hibernate purpose 

```
class Customer{
	@OneToOne(cascade=CascadeType.ALL) 	
	@JoinColumn(name="customerCartId")		//foreign key column name
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

### 2. OneToMany
2a. **OneToMany Bidirectional**:  
```
class Cart{
	@OneToMany(mappedBy="customerCart")
	private List<Product> products;
}
class Products{
	@OneToOne
	@JoinColumn(name="cart_cartId")
	private Customer customer;
}
```

2.b **OneToOne,ManyToOne,OneToMany**:
```
@OneToOne
@JoinColumn(name="student_detail_id")
private StudentDetail studentDetail;
```

### ManyToMany:
```
@ManyToMany
@JoinTable(name="student_join",joinColumns=@JoinColumn(name="student_id"),
                               inverseJoinColumns=@JoinColumn("student_details_id"))

```

**Eager & lazy loading:** mention whether to retreive related entities or not, load chile entity based on Demand  
```
@OneToMany(fetch=fetchType.LAZY);
@OneToMany(fetch=fetchType.EAGER)
```
**Cascading**: apply same operation to related entities or joined tables. Defalt:No cascade      
Ex: @OneToOne(cascade=CascadeType.PERSIST) -> if entity persist/saved, related entity also persist   
@OneToOne(cascade=CascadeType.REMOVE) -> if entity is removed/deleted related entity also deleted     
@OneToOne(cascade=CascadeType.REFRESH) -> if entity refreshed, releated entity wil also refreshed    
@OneToOne(cascade=CascadeType.DETACH) ->  if entity is detached, related entity will also detached   
@OneToOne(cascade=CascadeType.MERGE) ->  if entity is mereged, related entity also merged   
@OneToOne(cascade=CascadeType.ALL) -> all above cascade tpes applied    


## Cache:
 
**First level cache**: default, hold by session object  
**Secound level cache:**  
-hold by session factory  
-data stored in hashmap format eg.<22,{"raj","ECE"}> where primarykey is key and result is value   
-works only for session object, not work for createQuery/createSQLQuery   
-some cache providers are EH(Easy Hibernate), Swarm, OS, JBoss Cache  

Steps to enable 2nd level cache:  
1. in pom.xml add hibernate-ehcache  
2. Add properties in xml   
```
<property name="hibernate.cache.use_second_level_cache">true</property>
<property name="hibernate.cache.provider_class">org.hibernate.cache.EhCacheProvider</property>
<property name="hibernate.cache.region.factory_class">
org.hibernate.cache.ehcache.EhCacheRegionFactory
</property>
```
3. Add annotation in entity class  
```
@Cache(usage=CacheConcurrencyStrategy.READ_ONLY)
/*	1.READ_ONLY: work for readonly operation  
	2.NONSTRICT-READ-WRITE: work for readwrite but one at a time  
	3.READ-WRITE: work for readwrite, can be used simultaneously  
	4.TRANSACTIONAL: work for transaction  
*?
public class Employee {   } 
```  

**Query cache:** data stored as hashmap where query text param is key, result is value 
1. Add properties in xml ```<propertyerty name="hibernate.cache.use_query_cache">true</property>```  
2. Set cache in query ``` Query q=session.createQuery("from employee").setCacheable(true).list();```

## Hibernate configurations
### 1. Java-Based Configuration

1. Define datasource bean in configuration class
```
@Configuration 						
@EnableTransactionManagement  //<tx:annotation-driven transaction-manager="myTransactionManager" />		
public class AppplicationContextConfig {    
	@Bean(name = "dataSource")        							
	public DataSource getDataSource() {     		
	    DriverManagerDataSource dataSource = new DriverManagerDataSource();   
	    dataSource.setDriverClassName("org.h2.Driver");			
		dataSource.setUrl("jdbc:h2:tcp://localhost/~/test3");		
	    dataSource.setUsername("sa");
		dataSource.setPassword("sa"); 
	    return dataSource;
	}
	private Properties getHibernateProperties() {					
	    Properties properties = new Properties();
	    properties.put("hibernate.show_sql", "true");								
	    properties.put("hibernate.dialect", "org.hibernate.dialect.H2Dialect");		
	    properties.put("hibernate.hbm2ddl.auto", "update");							// create | update | validate | create-drop
	    return properties;
	}

	@Autowired
	@Bean(name = "sessionFactory")
	public SessionFactory getSessionFactory(DataSource dataSource) { 
		LocalSessionFactoryBuilder sessionBuilder = new LocalSessionFactoryBuilder(dataSource); 
		sessionBuilder.addProperties(getHibernateProperties());								
		sessionBuilder.scanPackages("com.model");
		sessionBuilder.addAnnotatedClasses(User.class);     									
		return sessionBuilder.buildSessionFactory();
	}
	@Autowired
	@Bean(name = "transactionManager")
	public HibernateTransactionManager getTransactionManager(SessionFactory sessionFactory) {
		HibernateTransactionManager transactionManager = new HibernateTransactionManager(sessionFactory);
		return transactionManager;
	}
}
```
2. Use sessionfactory in DAO class
```
@Repository
public class EmployeeDAO {

    @Autowired
    private SessionFactory sessionFactory;

    @Transactional
    public void save(Employee employee) {
        Session session = sessionFactory.getCurrentSession();
        session.save(employee);
    }
}
```

### 2. XML Configuration
1. Define required beans in xml
```
	<!-- Add support for component scanning -->
	<context:component-scan base-package="com.luv2code.springdemo" />

	<!-- Add support for conversion, formatting and validation support -->
	<mvc:annotation-driven/>

	<!-- Define Spring MVC view resolver -->
	<bean
		class="org.springframework.web.servlet.view.InternalResourceViewResolver">
		<property name="prefix" value="/WEB-INF/view/" />
		<property name="suffix" value=".jsp" />
	</bean>

    <!-- Step 1: Define Database DataSource / connection pool -->
	<bean id="myDataSource" class="com.mchange.v2.c3p0.ComboPooledDataSource"
          destroy-method="close">
        <property name="driverClass" value="com.mysql.cj.jdbc.Driver" />
        <property name="jdbcUrl" value="jdbc:mysql://localhost:3306/web_customer_tracker?useSSL=false&amp;serverTimezone=UTC" />
        <property name="user" value="springstudent" />
        <property name="password" value="springstudent" /> 

        <!-- these are connection pool properties for C3P0 -->
        <property name="minPoolSize" value="5" />
        <property name="maxPoolSize" value="20" />
        <property name="maxIdleTime" value="30000" />
	</bean>  
	
    <!-- Step 2: Setup Hibernate session factory -->
	<bean id="sessionFactory"
		class="org.springframework.orm.hibernate5.LocalSessionFactoryBean">
		<property name="dataSource" ref="myDataSource" />
		<property name="packagesToScan" value="com.luv2code.springdemo.entity" />
		<property name="hibernateProperties">
		   <props>
		      <prop key="hibernate.dialect">org.hibernate.dialect.MySQLDialect</prop>
		      <prop key="hibernate.show_sql">true</prop>
		   </props>
		</property>
   </bean>	  

    <!-- Step 3: Setup Hibernate transaction manager -->
	<bean id="myTransactionManager"
            class="org.springframework.orm.hibernate5.HibernateTransactionManager">
        <property name="sessionFactory" ref="sessionFactory"/>
    </bean>
    
    <!-- Step 4: Enable Transaction Management -->
	<tx:annotation-driven transaction-manager="myTransactionManager" />
	
	<!-- Add support for reading web resources: css, images, js, etc ... -->
	<mvc:resources location="/resources/" mapping="/resources/**"></mvc:resources>
```
2. Use session factory in DAO Class
```
@Repository
public class EmployeeDAO {

    @Autowired
    private SessionFactory sessionFactory;

    @Transactional
    public void save(Employee employee) {
        Session session = sessionFactory.getCurrentSession();
        session.save(employee);
    }
}

```
