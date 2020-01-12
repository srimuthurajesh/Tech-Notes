- **Hibernate** : framework for database interactions.
- **ORM tool** : programming technique that maps the object to the data stored in the database.
- **JPA tool** :  provides functionality and standard to ORM tools.

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
2. executeQuery
3. executeUpdate
4. setParameter
5. setFirstResult
6. setMaxResult
```
session.createQuery("from student").list();
session.createQuery("from students where s.lastname='muthu'").list();
session.createQuery("update student set email='rajesh@gmail.com'").executeQuery();
session.createQuery("delete from student s where s.lastname='muthu'").executeUpdate();

```
 
