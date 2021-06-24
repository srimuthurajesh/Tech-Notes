
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

## Service Discovery  
1. starter pack = Eureka server starter  
2. Add **@EnableEurekaServer** along with @SpringBootApplication  
3. Add Application.properties    
  a) server.port=8761  
  b) eureka.client.register-with-eureka=false  
  c) eureka.client.fetch-registry=false  f  

**How to use it**    
1. Add dependency spring-cloud-netflix-eureka-client in pom.xml  
-then it automatically register with service registry 8761   
2. Add **@LoadBalanced** along with ```@Autowired RestTemplate restTemplate;```
-Loadbalance happen at client side  
3. use restTemplate.getForObject("http://<spring.application.name>", String.class);  
-no need to hardcode url, instead use app name  


## API Gateway  - Routing  
1. Starter pack - spring-cloud-zuul, spring-discovery-client, spring-web, actuator  
2. Add Application.properties  
```
eureka.instance.preferIpAddress=true
eureka.client.registerWithEureka=true
eureka.client.fetchRegistry=true
eureka.client.serviceUrl.defaultZone=http://localhost:8761/eureka  
managment.endpoints.web.exposure.include= info,health,routes  
spring.application.name=zuul-gateway  
```
3. Add **@EnableZuulProxy**, **@EnableDiscoveryClient** alons with @SpringBootApplication  

## Circuite Breaker  
call RestTemplate via circuit breaker  
```
@Autowired
private RestTemplate restTemplate;
@Autowired
private CircuitBreakerFactory circuiteBreakerFactory;

public String getService(){
  CircuitBreaker cb = circuiteBreakerFactory.create("nameserivcebreaker");
  return cb.run(() -> restTemplate.getForObject("http://localhost:8082", String.class), throwable -> return "fallback");
}
@Bean  
public RestTemplate restTemplate(){
  return new RestTemplate();
}
```
