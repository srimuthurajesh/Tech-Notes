## Kubernetes

- open source container orchestration tool, in different deployment environments   
- developed by Google    
- High availability & Scalabilty and disaster recovery  


#### Pod:  

- smallest unit in K8s  
- Abstraction over container (agnostic for docker or other containers)  
- usually 1 application in a pod is preferable  
- each pod has its own ip address, it will change for each instance  

#### Service:  
- permanent ip address for each pod  
- also a load balancer  
ConfigMap : file which have config values for each pod  
Secret: same like configMap but base64 encrypted  
