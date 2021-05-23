## Kubernetes
- open source container orchestration tool for manageing microservices or contanierized application     
- developed by Google    
- provides resiliant infrastrcuture, zero downtime deployment, automatic rollback, scalling  
- provides self healing which consists of auto-placement, auto-restart, auto replication and scaling of container based on metrics       

## Components of k8s:
Master :  
          1. kube-apiserver(gateway, authentication)   
          2. etcd storage(key value store, cluster state info which used by master processes)   
          3. kube-controller-manager(detects cluster state changes, maintain no downtime)  
          4. cloud-controller-manager  
          5. kube scheduler(which node new pod should schedule)  
**Node** : kubelet, kube proxy  

**Minikube**:1 node k8s cluster for local dev testing    
**Kubectl**: cli to interact with minikube cluster  

#### Pod:  
- smallest unit in K8s & **abstract** one or more containers and **encapsulate** container, storage resources, neworkId, other configs  

#### Service:  
- permanent ip address for each pod  
- also a load balancer  
ConfigMap : file which have config values for each pod  
Secret: same like configMap but base64 encrypted  

3 things must be installed
1. Container runtime(like Docker)  
2. Kubelet (interacts container and node, assign resources for nodes)    
3. kube proxy (forward the request) 


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
