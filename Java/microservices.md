## Types of Architectural patterns

1. Monolithic Architecture - all components are combined into one large single tiered application.  
2. Microservices Architecture - composed of small, loosely coupled, and independently deployable services.  
3. Layered (N-Tier) Architecture - Organizes an application into distinct layers (e.g., presentation, business logic, data access).   
4. Event-Driven Architecture -  A design that centers around the production, detection, and reaction to events.    
5. Service-Oriented Architecture (SOA) - provide reusable business functionalities accessible over a network.  
6. Serverless Architecture - cloud provider dynamically manages the allocation of machine resources.  


### Service Registry.  
> a service maintains a database of other service instances info (name, IPs, ports)

**Problem**: As instances count goes up and down, we cannot track its ip/url/ports by hardcoding it.   
**Solution**: To track those, we use registration and discovery pattern. 
**Steps**:   
    1. Service Registration: Service registers its network details and metadata on startup.  
    2. Service Discovery: other Services query the registry to find the current network location of other services.  
    3. Health Monitoring: The registry at certain time interval(30sec) checks and removes non-responsive services.    

**Popular Service Registries**:
1. Eurekha.   
2. Consul.    
3. Zookeeper.    
4. Etcd.    

### Client side vs service side load balancing
- in client side load balacing there is no need to extra server for load balancing work.   
Note: service registry internally fetches from spring cloud load balancer.   
*Libraries*: spring cloud LoadBalancer.   

**Load balancer vs Reverse proxy**: Load balancers focus on distributing traffic ,whereas reverse proxies forward request to backend servers.  

### Rate limiter pattern
> its limit the number of request to microservice. (eg 5call at a time). 

### Fault tolerence
Microservices should be resilient, may have a fallback response. 
Library: resilient4j in spring 

#### Circuit Breakers:
Prevents retrying failures to a failing service after a threshold of failures.  
States: 
1. Closed - if failure rates are below threshold   
2. Open - if failure rate are above threashold.   
3. Half-Open - happens after the wait duration. then repeats from above two condition.   
Ex: Hystrix or Resilience4j. 
#### Retry Mechanism:
Automatically retries failed requests a specified number of times before giving up.  

#### Timeouts:
Sets a maximum wait time for a service response.

#### Fallbacks:
Provides alternative responses or actions when a service fails.

#### Service Mesh:
Manages service-to-service communication, including fault tolerance features.  
Tools like Istio provide retries, circuit breakers, and observability.

#### Bulkheads:
Isolates different parts of the system to prevent failure in one part from affecting others.

### Inbox-Outbox pattern. 
> ensure reliable message delivery and consistency between services, 

Inbox pattern: 
Outbox pattern: ensures that changes in the Outbox table and sending of messages (events) to other services. 


## The Twelve Factors
1. Codebase - One codebase tracked in revision control, many deploys. 
2. Dependencies - Explicitly declare and isolate dependencies. 
3. Config - Store config in the environment
4. Backing services - Treat backing services as attached resources. 
5. Build, release, run. - Strictly separate build and run stages
6. Processes - Execute the app as one or more stateless processes
7. Port binding - Export services via port binding
8. Concurrency - Scale out via the process model
9. Disposability - Maximize robustness with fast startup and graceful shutdown
10. Dev/prod parity - Keep development, staging, and production as similar as possible
11. Logs - Treat logs as event streams
12. Admin processes - Run admin/management tasks as one-off processes


## JWT
> Json web token

Format Structure: header.payload.signature  
1. Header - consists of type:jwt and algo. 
2. Payload - consists of emailid, createddate, roles, subject. 
3. Signature - signing header payload with public key. 

Note: we need to pass JWT in header as key Authorization and value "Bearer tokenxxxxxxx".  

## Application performance monitering tool (APM)
1. Prometheus : For collecting and soring metrics. 
2. Grafana : for visualizing metrics. 
Integretion with spring boot: using micrometer library, which export metrics from actuator to prometheus. 
Other APM tools: AppDynamics, Datadog, Dynatrace, New Relic. 

## Alerting
1. Prometheus alerting manager
2. Third party APM alerts. 

## Logging tools
1. Log Aggregation : ELK stack(Elastic search, logstash, kibana) to aggregate logs from multiple instances. 
2. Structed logging: JSON format to make logse easier to search and analyse. 

## Distributed tracing
1. zipkin ui or Jaeger: use to track slower microservices, performance bottlneck and latency issues. 
2. Spring cloud sleuth: add trace and span id to logs automatically, easier to trace flow of requests. 

## Distributed transaction
Saga pattern
a) Choreography based. 
b) Orchestrator based - prefered 

## Microservice internal communication
1. Synchronous: Rest or gRPC
2. Asynchronous: message brokers like kafka & RabbitMQ



## How to implement Microservices
1. Define Microservices   
- Identify Boundaries of each microservice based on business capabilities and domains.
- Decompose the Monolith into smaller, manageable services.

2. Choose Technology Stack - Select frameworks that support microservices (e.g., Spring Boot for Java, Flask for Python).
3. Design APIs: REST or gRPC
4. Develop each Services:   
5. Implement Communication Mechanisms: sync or async  
6. Service Discovery and Registration (e.g., Eureka, Consul, Zookeeper)    
7. API Gateway (e.g., Netflix Zuul, Spring Cloud Gateway, NGINX).  
8. Configuration Management: (e.g., Spring Cloud Config, Consul).
9. Implement Fault Tolerance
- Circuit Breakers: Resilience4j or Hystrix  
- Retries and Timeouts: Implement retries and timeouts to handle transient failures.
- Fallbacks: Provide fallback methods to ensure graceful degradation of services.

10. Logging and Monitoring
- Centralized Logging: Use the ELK stack (Elasticsearch, Logstash, Kibana) or Fluentd for aggregating logs.
- Distributed Tracing: ex: Zipkin or Jaeger with Spring Cloud Sleuth.
- Metrics and Monitoring: ex: Prometheus for collecting metrics and Grafana for visualizing them.
11. Security: OAuth2 and JWT   
12. Continuous Integration and Continuous Deployment (CI/CD)  
13. Testing  
- Unit Testing: Write unit tests for individual service components.  
- Integration Testing: Ensure that services work together correctly.  
- Contract Testing: Use tools like Pact to verify that services can communicate correctly based on predefined contracts.  
14. Documentation: Swagger/OpenAPI.  
- Architecture Documentation ex: service dependencies, data flow, and design decisions.  