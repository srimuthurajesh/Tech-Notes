
# Spring Cloud

### Spring cloud annoatations
1. @EnableConfigServer
2. @EnableEurekaServer  
3. @EnableDiscoveryClient  
4. @EnableCircuitBreaker  
5. @HystrixCommand


## Config server
1. starter pack = spring-cloud-config-server
2. Add **@EnableConfigServer** along with @SpringBootApplication  
3. Add Application.properties.   
  a. server.port=8081  
  b. spring.cloud.config.server.git.uri=github.com, or spring.cloud.config.server.native.searchLocations   
4. Now Can check actuator Url: localhost:8888/application/default will print property source uri and details   

**How to use it**
1. Add **@RefreshScope** along with @SpringBootApplication
2. Add Application.properties   
   a) spring.application.name = config-client  
   b) spring.cloud.config.uri = http://localhost:8888  
Note: we can refresh the cache using actuator  

## API Gateway  

## Service Discovery  
1. starter pack = Eureka server starter  
2. Add **@EnableEurekaServer** along with @SpringBootApplication  
3. Add Application.properties    
  a) server.port=8761  
  b) eureka.client.register-with-eureka=false  
  c) eureka.client.fetch-registry=false  

**How to use it**    
1. Add dependency spring-cloud-netflix-eureka-client in pom.xml  
-then it automatically register with service registry 8761  
