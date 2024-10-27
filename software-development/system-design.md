## High-Level Design (HLD) vs. Low-Level Design (LLD)
> are two phases and each focusing on different levels of system design.

### 1. High-Level Design (HLD)
> Provides an overview of major components, used as a blueprint  

- **Focus**: Outlines the system's modules, relationships, technologies, data flow, and major components.
- **Audience**: Primarily targeted towards project managers, architects, and senior developers.
- **Deliverables**:
  - System architecture diagram showing different modules and their interactions.
  - Database architecture, showing major entities and relationships.
  - Technology stack (programming languages, frameworks, third-party integrations).
  - High-level data flow diagrams and interface descriptions.
- **Example**: For a microservice application, HLD might include diagrams of each service, their data flow, API endpoints, and a high-level infrastructure outline.

---

## 2. Low-Level Design (LLD)

- **Purpose**: Breaks down the HLD into detailed designs, focusing on the internal workings of each component.
- **Focus**: Specifies internal logic, class structures, functions, and detailed data structures.
- **Audience**: Mainly for developers who will implement the design.
- **Deliverables**:
  - Detailed class diagrams, including attributes, methods, and their relationships.
  - API details (endpoints, request/response formats).
  - Pseudocode or algorithms for complex functions.
  - Database schema with specific tables, fields, indexes, and constraints.
- **Example**: In an LLD for the Lead Service in a microservice system, it would describe the internal classes for handling leads, how data flows through the service, the structure of APIs, and how they handle errors.

---

## Key Differences Between HLD and LLD

| Aspect         | High-Level Design (HLD)                         | Low-Level Design (LLD)                                  |
|----------------|------------------------------------------------|--------------------------------------------------------|
| **Focus**      | System architecture, main components           | Component internals, detailed logic                    |
| **Audience**   | Architects, project managers, senior devs      | Developers implementing the system                     |
| **Details**    | Modules, data flow, database architecture      | Class structure, data structures, API specifics        |
| **Purpose**    | Give an overview of the system                 | Provide precise implementation guidance                |

---

Together, HLD and LLD guide the development team from broad system architecture to detailed implementation, ensuring clarity, consistency, and alignment in software development projects.


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
Types of distribution  
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
