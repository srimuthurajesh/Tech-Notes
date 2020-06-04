## Maven 

-project dependency management tool  
-build and run project  
-IDE independent  

POM - project object model
```
<project>
  <modelVersion>4.0.0</modelVersion>
  
  <!-- Project coordinates -->
  <!-- Name of company,group,organization -->
  <groupId>com.myApp</groupId>
  <!--  project name -->
  <artifactId>myApp</artifactId>
  <!-- project version -->
  <version>1.0Final</version>
  <packaging>jar</packaging>
  <name>myApp</name>
  
  <dependenices>
    <dependency>
      <groupId>jUnit</groupId>
      <artifactId>jUnit</artifactId>
      <version>3.8.1</version>
      <scope>jUnit</scope>
    </dependency>
  </dependenices>
</project>
```

**Architypes**:
1. maven-architype-quickstart
2. maven-architype-webapp     - have web.xml,index,jsp
