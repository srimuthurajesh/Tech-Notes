# Microservices

1. [Types of Architectural Patterns](#types-of-architectural-patterns)
2. [Service Registry](#service-registry)
3. [API Gateway](#api-gateway)
4. [Load Balancing](#load-balancing)
5. [Rate Limiter Pattern](#rate-limiter-pattern)
6. [Fault Tolerance](#fault-tolerance)
  - [Circuit Breakers](#circuit-breakers)
  - [Retry Mechanism](#retry-mechanism)
  - [Timeouts](#timeouts)
  - [Fallbacks](#fallbacks)
  - [Service Mesh](#service-mesh)
  - [Bulkheads](#bulkheads)
7. [Inbox-Outbox Pattern](#inbox-outbox-pattern)
8. [The Twelve Factors](#the-twelve-factors)
9. [Security](#security)
  - [JWT (JSON Web Token)](#jwt-json-web-token)
10. [Monitering](#application-performance-monitoring-tool-apm)
11. [Alerting](#alerting)
12. [Logging](#logging-tools)
13. [Distributed Tracing](#distributed-tracing)
14. [Distributed Transaction](#distributed-transaction)
15. [Microservice Internal Communication](#microservice-internal-communication)
15. [Connection Pool](#connection-pool)
    - [HTTP Connection Pool](#http-connection-pool)
16. [CI/CD Pipeline Steps](#cicd-pipeline-steps)
17. [How to Implement Microservices](#how-to-implement-microservices)
18. [Interview Questions](#interview-questions)


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

Dependency: 
**Popular Service Registries**:
1.Eurekha, 2.Consul, 3.Zookeeper, 4.Etcd.    

### Api Gateway  
> a service, act as a single entry point that manages, optimizes, and secures client requests to a system of microservices.  

Functions:  Routing, Load Balancing, Authentication and Authorization, Rate Limiting, Caching, Request and Response Transformation, Logging and Monitoring, security 
Dependecny: spring-cloud-starter-gateway  
### Load balancing  
> distributing incoming network traffic across multiple servers  

Dependency: spring-cloud-starter-loadbalancer  

```
@Bean
@LoadBalanced
public RestTemplate restTemplate() {
    return new RestTemplate();
}
```

1. Client-Side: client queries a service registry and do internal load-balancing algorithm and send request  
Libraries: Spring Cloud LoadBalancer  
2. Server-side: client sends a request to load balancer server, in which uses load-balancing algorithm and forward request  
Libraries: AWS Elastic Load Balancing (ELB)  

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

## Security
### JWT
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
### 1. Synchronous
1. Two phase
`client -> coordinator -> participants`
    a) corodinator query participants to vote yes or NO
    b) based on above response, the coorodinator ask to commit or rollback   
    c) if acknoledgement fails again rollback will be intimated  
2. Three phase
> extra pre commit phase, reduce the coordinator went down issue  

### 2. Ashynchronus
Saga pattern
a) Choreography based - each service involved in the saga is responsible for triggering the next action in the process.
b) Orchestrator based - prefered, central coordinator (orchestrator) controls the transaction flow 

## Microservice internal communication
1. Synchronous: Rest or gRPC
2. Asynchronous: message brokers like kafka & RabbitMQ

## Connection Pool
> technique used to manage database connections efficiently by maintaining a pool of reusable connections

## Http Connection Pool
> technique used to manage http connections efficiently by maintaining a pool of reusable connections

Library: Hikari connection pool in spring boot  

## CI/CD pipeline steps
1. Code commit  
2. CI -  
    a) when code pushed, CI kicks automatically  
    b) pull latest code and do sonarqube, unittest, integration test  
    c) if everything pass fine, otherwise notify the team   
3. Build - mvn clean install, and put jar inside docker image and store in registry(eg.jFrog, dockerhub)   
4. CD - kubernetest manifest(deployment.yml) define how app will be deployed in EKS. Then apply manifest.
5. Monitor - Prometheus, Grafana, AWS CloudWatch       


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

## Interview Questions: 
1. What if service registry goes down? 
2. what happen if change a value in config server, does my other services will have that change
3. Where you store the docker images? ACR- amazon cloud registry
