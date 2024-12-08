# Tracking tool

> Creating an end-to-end microservice-based application for tracking enterprise internet leads through multiple stages—design, approval, implementation, testing, and support—requires a structured approach. 



## High level architecture
1. **Java + Spring Boot**: organization/team expertise, community, best for enterprise-grade applications.
2. **REST APIs**: simple CRUD calls, wide support from spring boot
3. **Kafka**: event driven architecture, handles high volume, easy distributed
3. **PostgreSQL**: Data Relationships, Transactional Requirements
4. **Docker & Kubernetes**: Manages the containers, enabling scalability and resilience.
6. **AWS**: Use AWS EKS for Kubernetes, AWS RDS for databases, and other managed services like AWS CloudWatch for monitoring.
7. **Prometheus and Grafana**:  for application-level monitoring.
8. **ELK & Cloudwatch**: ELK for complex logs, and cloudwatch for simple logs  
9. **CI/CD**: Jenkins or AWS CodePipeline  
10. **API Gateway**: AWS API Gateway
11. **Security**: 
12. **BPM tool**: flowable  


## Core Microservices
1. User Service
- Manages user accounts, roles, and permissions.
- Integrates with Microsoft SSO for authentication.
- serves other MS for User and role details

2. Agreement Service
- Handles capturing, updating, and querying leads.
- Tracks the lifecycle status of each lead (e.g., new, in-progress, closed).

3. Serviceability Check Service

4. Design Management Service
- Manages the design phase for each lead.
- Stores design specifications, documents, and comments.
- Allows lead designers to submit and update designs as they progress.

5. Approval Service
- Manages multi-level approval workflows for designs and implementations.
- Integrates with Flowable to define and track approval processes.
- Sends notifications to relevant approvers and updates the lead status based on approval outcomes.

5. Provisioning Service
- Oversees the implementation of approved designs.
- Tracks the progress of tasks involved in implementing each lead.
- Manages task assignments and allows updates to the implementation status.

6. Activation Service
- Conducts and records tests for each implemented design.
- Tracks testing stages, test results, and defects identified.
- Integrates with external tools or provides manual test input capabilities.

8. Notification Service
- Manages notifications and alerts (e.g., email, SMS) to users.
- Sends updates for approvals, task assignments, status changes, and reminders.
- Allows users to set preferences for notification types and channels.

9. Flowable Integration Service
- Integrates with Flowable for orchestrating business processes across services.
- Manages end-to-end process flow by coordinating between microservices.
- Provides an API for triggering, monitoring, and updating workflows.

10. File Management Service
- Manages file storage and retrieval, such as design documents and testing reports.
- Stores files in S3 or a similar storage service and provides secure access.


