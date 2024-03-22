### Scaling:

_____________________________________________________________
| Horizontal scaling 		    |	Vertical scaling              |
|---------------------------|-------------------------------|
| More number of servers	  |	Bigger server							    |
| LoadBalancing required	  |	N/a							              |
| Resilient					        | Single point of failure		    |
| Network calls(Rpc)		    |	Inter process communication	  |
| Data inconsistence		    |	Consistence					          |
| Scales well as user grow	| Hardware limit				        |
-------------------------------------------------------------

### Load Balancing
Types of distribution  
1. Random
2. Round Robin
3. Random(weight for ram and cpu cycles)

### Important points to consider when system design:
1. Scalability: should handle increased loads and be able to scale horizontally or vertically as needed.
2. Performance: The system should be designed to perform efficiently and effectively, with minimal latency and response time.
3. Reliability: The system should be reliable and available, with minimal downtime or system failures.
4. Security: The system should be designed with security in mind, including measures to prevent unauthorized access and protect sensitive data.
5. Maintainability: The system should be designed to be easy to maintain and update, with clear documentation and well-organized code.
Interoperability: The system should be designed to work seamlessly with other systems and components, with clear and well-defined interfaces.
Usability: The system should be designed to be user-friendly and intuitive, with a clear and consistent user interface.
Cost-effectiveness: The system should be designed to be cost-effective, with a focus on minimizing development and operational costs while still meeting the requirements.
