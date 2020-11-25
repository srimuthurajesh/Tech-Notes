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

3 things must be installed
1. Container runtime(like Docker)  
2. Kubelet (interacts container and node, assign resources for nodes)    
3. kube proxy (forward the request) 

Four processes in Master node  
1. Api server (gateway, authentication)  
2. Scheduler (which node new pod should schedule
3. Controller manager (detects cluster state changes, maintain no downtime)  
4. etcd (key value store, cluster state info which used by master processes)  

Minikube:1 node k8s cluster for local dev testing    
Kubectl: cli to interact with minikube cluster  

#### Kubectl commands:  
kubectl get pod  
kubectl get nodes
kubectl get deployment  
kubectl create deployment nginx-depl --image=ngnix  
kubectl get replicaset  
kubectl edit deploymenet [deploymentName]     # will get aurogenerated config file for the deployment  
kubectl logs [podName]   
kubectl describe pod [podName]  # more informations like list of state changes  
kubectl exec -it [podName] -- bin/bash  
kuebectl delete deployment [deploymentName]  
kubectl apply -f [yaml fileName]  
kubectl delete -f [yaml fileName]  


#### Yaml Configuration file:  
```
apiVersion : apps/v1
kind: Deployment  
metadata:
  name: nginx-deployment  
  labels:~
spec:
  replicas: 2
  selector: ~
  template: ~  
```  
