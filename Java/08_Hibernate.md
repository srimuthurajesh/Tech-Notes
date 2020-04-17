- **Hibernate** : framework for database interactions.
- **ORM tool** : programming technique that maps the object to the data stored in the database.
- **JPA tool** :  provides functionality and standard to ORM tools.
- **dialect** : specify the type of database

1. create persistant class
2. create hiberate.cfg.xml
```
<hibernate-configuration>
    <session-factory>
        <!-- JDBC Database connection settings -->
        <property name="connection.driver_class">com.mysql.cj.jdbc.Driver</property>
        <property name="connection.url">jdbc:mysql://localhost:3306/dbName</property>
        <property name="connection.username">hbstudent</property>
        <property name="connection.password">hbstudent</property>
        <!-- Select our SQL dialect -->
        <property name="dialect">org.hibernate.dialect.MySQLDialect</property>
        <!-- Echo the SQL to stdout -->
        <property name="show_sql">true</property>
    </session-factory>
</hibernate-configuration>
```
3.create main class
```
SessionFactory factory = new Configuration()
                .configure("hibernate.cfg.xml")
                .addAnnotatedCLass(Student.class)
                .buildSessionFactory();
Session session = factory.getCurrentSession();
session.beginTransaction();
session.save(persistantObj);
session.getTransaction().commit();
```
**Annotations:**\
@Entity - make class as entity bean\
@Table - specify details of table. name,catalogue,schema,unique constraints\
@Id - to mention primary key for persistant class\
@GeneratedValue(strategy=GenerationType.IDENTITY)  - also use AUTO,SEQUENCE,TABLE\
@Column - specify details of column. name,length,nullable,unique

**Query interface**: 
1. list 
2. executeUpdate - use for delete & update
3. setParameter - replace :values in query
4. setFirstResult - limit start
5. setMaxResult - limit end
```
Query query = session.createQuery("from student s where lastname=:givenLastName");
query.setParamter("givenLastName","muthu");
query.setFirstResult(5);query.setMaxResult(10);
query.list();
```
**Object status in Hibernate**:
1. Transient - Not associate with session(new object)
2. Persistent - associate with session(while save, saveOrUpdate)
3. Removed - remove(),delete()
4. Detached - removed from session(clear,close)

**Cascade**: apply same operation to related entities
```
@OneToOne(cascade=CascadeType.ALL)  - DETACH,MERGE,PERSIST,REFRESH,REMOVE
```
**Eager & lazy loading:** mention whether to retreive related entities or not
```
@OneToMany(fetch=fetchType.LAZY);
@OneToMany(fetch=fetchType.EAGER)
```
**Unidirection&Bidirectional**: 

**OneToOne,ManyToOne,OneToMany**:
```
@OneToOne
@JoinColumn(name="student_detail_id")
private StudentDetail studentDetail;
```
**ManyToMany**:
```
@ManyToMany
@JoinTable(name="student_join",joinColumns=@JoinColumn(name="student_id"),
                               inverseJoinColumns=@JoinColumn("student_details_id"))

```
