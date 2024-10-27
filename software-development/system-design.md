## High-Level Design (HLD) vs. Low-Level Design (LLD)
> are two phases and each focusing on different levels of system design.

### Key Differences Between HLD and LLD

| Aspect        | High-Level Design (HLD)                   | Low-Level Design (LLD)                                    |
|---------------|-------------------------------------------|-----------------------------------------------------------|
| **Focus**     | System architecture, major components     | Component internals, detailed logic                       |
| **Audience**  | Architects, project managers, senior devs | Developers                                                |
| **Details**   | Modules, data flow, database architecture | Class structure, data structures, API details, DB fields  |
| **Example**   | explain dataflow b/w each services in MS  | explain particular service in MS                          |


### Scaling:

(https://www.youtube.com/watch?v=Nx4bvwU0DqE)[https://www.youtube.com/watch?v=Nx4bvwU0DqE]

-----------------------------------------------------------------
| Horizontal scaling 		|	Vertical scaling                |
|---------------------------|-----------------------------------|
| More number of servers	|	Bigger server				    |
| LoadBalancing required	|	N/a							    |
| Resilient					|   Single point of failure		    |
| Network calls(Rpc)		|	Inter process communication	    |
| Data inconsistence		|	Consistence					    |
| Scales well as user grow	|   Hardware limit				    |
-----------------------------------------------------------------

### Load Balancing

#### Types of distribution  
1. Random
2. Round Robin
3. Random(weight for ram and cpu cycles)

### Important points to consider when system design:
1. Scalability
2. Performance
3. Reliability/Availability
4. Security
5. Maintainability:  documentation and well-organized code.
6. Interoperability: work seamlessly with other systems  
7. Usability: clear user interface.
8. Cost-effectiveness  
