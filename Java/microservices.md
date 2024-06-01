## Types of Architectural patterns

1. Monolithic Architecture - all components are combined into one large single tiered application.  
2. Microservices Architecture - composed of small, loosely coupled, and independently deployable services.  
3. Layered (N-Tier) Architecture - Organizes an application into distinct layers (e.g., presentation, business logic, data access).   
4. Event-Driven Architecture -  A design that centers around the production, detection, and reaction to events.    
5. Service-Oriented Architecture (SOA) - provide reusable business functionalities accessible over a network.  
6. Serverless Architecture - cloud provider dynamically manages the allocation of machine resources.  
7. Microkernel Architecture (Plug-in Architecture) - extendable with additional plug-in modules.  
8. Space-Based Architecture -  Uses the concept of a tuple space for distributed coordination and parallel processing.  
9. Peer-to-Peer (P2P) Architecture - decentralized where each node can act as both a client and a server.  
10. Client-Server Architecture -  Divides the system into client and server roles. 
11. Hexagonal Architecture (Ports and Adapters) -  Emphasizes separation between business logic and external interfaces. 
12. Component-Based Architecture -  Structures an application as a collection of components.  
13. CQRS (Command Query Responsibility Segregation) -  Segregates operations into command (write) and query (read)   
14. Master-Slave Architecture -  one master component controls nultiple slave components, distributing tasks among them.  
15. Pipe-and-Filter Architecture -  Divides a process into a series of components (filters)   
16. Broker Architecture -  Uses middleware (broker) to coordinate communication between decoupled components or services.  
17. Interpreter Architecture -  Defines a virtual machine that interprets commands or instructions for a specific language.  
18. Blackboard Architecture -  Consists of a common knowledge base (blackboard) where different components (knowledge sources) contribute to the solution incrementally.  
19. MVC (Model-View-Controller) Architecture - Separates an app into three interconnected components: model (data), view (UI), and controller (logic).  
20. MVVM (Model-View-ViewModel) Architecture -  Facilitates separation of development of the graphical user interface from the business logic or back-end logic.  


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
Libraries: spring cloud LoadBalancer. 

**Load balancer vs Reverse proxy**: Load balancers focus on distributing traffic ,whereas reverse proxies forward request to backend servers.  

### Rate limiter pattern
> its limit the number of request to microservice. (eg 5call at a time). 

### Fault tolerence
Microservices should be resilient, may have a fallback response. 
Library: resilient4j in spring 

#### Circuit Breakers:
Prevents retrying failures to a failing service after a threshold of failures.  
States: 
Closed - if failure rates are below threshold   
Open - if failure rate are above threashold.   
Half-Open - happens after the wait duration. then repeats from above two condition. 

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

### How to track slower microservices
using zipkin ui. 

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