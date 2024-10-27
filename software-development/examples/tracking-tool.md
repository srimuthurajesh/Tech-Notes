# Tracking tool

> Creating an end-to-end microservice-based application for tracking enterprise internet leads through multiple stages—design, approval, implementation, testing, and support—requires a structured approach. 



## High level architecture
1. **Java + Spring Boot**: organization/team expertise, community, best for enterprise-grade applications.
2. REST APIs + Messaging: Microservices communicate through REST APIs and publish/subscribe to events using Kafka or AWS SNS/SQS.
3. MySQL or PostgreSQL: Each service should have its own database to adhere to the database-per-service principle.
4. Docker: Each service is containerized for isolated environments.
5. Kubernetes: Manages the containers, enabling scalability and resilience.
6. AWS Services: Use AWS EKS for Kubernetes, AWS RDS for databases, and other managed services like AWS CloudWatch for monitoring.

## Core Microservices
