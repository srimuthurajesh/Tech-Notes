## Maven 

-project dependency management tool  
-build and run project  
-IDE independent  

**Standard Directory structure**:  
```
my-project->
  pom.xml  
  src->
      main->
          java
          resources
          webapp
      test->
        java
        resources  
  target      
```
src/main/java - java code   
src/main/resorces - properties,config files    
src/main/webapp - jsp,css,js,image etc    
src/test - unit testing   
target - compiled code by maven   

**pom.xml** - project object model, it has  
1. project meta data- projectName, version, filetype(JAR,WAR) etc
2. dependencies- like spring, hibernate etc 
3. plugins- custom task to run: junit test reports  
```xml
<project>
  <modelVersion>4.0.0</modelVersion>
  
  <!-- Project coordinates or project metadata -->
  <!-- Name of company,group,organization -->
  <groupId>com.myApp</groupId>
  <!--  project name -->
  <artifactId>myApp</artifactId>
  <!-- project version -->
  <version>1.0Final</version>
  <packaging>jar</packaging>
  <name>myApp</name>
  
  <properties>
     <project.build.sourceEncoding>UTF-8</project.build.sourceEncoding>
     <!--generate class files works on given java version-->        
     <maven.compiler.target>1.8</maven.compiler.target>
     <!-- java version source code accepted-->
     <maven.compiler.source>1.8</maven.compiler.source>
  </properties>
  
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

**Maven Architypes**: collection of template/started files  
1. maven-architype-quickstart - normal spring core project files  
2. maven-architype-webapp     - have web.xml,index,jsp

Note: m2eclipse plugin should installed of maven support in eclipse 

### REPOSITORY:
**1. Local repository** : c:\Users\<user-dir>\.m2\repository  
**2. Central repository**: https://repo.maven.apache.org/maven2/
**3. Additional repository**: there are other 250 repositories in mvnrepository.com  
-if we need dependencies from other repositories except Central we need to add respository in pom.xml
```xml
<repositories>
  <repository>
    <id>atlassian</id> 
    <name>Atlassian Repository</name>
    <url>https://maven.atlassian.com/content/repositories/atlassian-public</url>
  </repository>
</repositories>
<dependencies>
  <dependency>
    <groupId>com.atlassian.mail</groupId>
    <artifactId>atlassian-mail</artifactId>
    <version>4.0.4</version>
  </dependency>
</dependencies>
```
**4. Private repository**: using  
Archiva - archive.apache.org  
Artifactory - www.jfrog.com  
Nexus - www.sonatype.com  

---

### Maven commands  
Create Java project  
```
mvn archetype:generate 
-DgroupId=org.yourcompany.project 
-DartifactId=application
```  
Create web project  
```
mvn archetype:generate 
-DgroupId=org.yourcompany.project 
-DartifactId=application 
-DarchetypeArtifactId=maven-archetype-webapp
```  
Create archetype from existing project ```mvn archetype:create-from-project```  
**Other Commands:**  
1. clean — delete target directory  
2. validate — checks, if the project is correct  
3. compile — compile source code, classes stored in target/classes  
4. test — run testspackage —  take compiled code and package it in its distributable format, e.g. JAR, WAR  
5. verify — run any checks to verify package is valid and meets quality criteria  
6. install —  install package into local repository  
7. deploy — copies final package to the remote repository
