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

#### 1. Pod:  
**abstract** one or more containers  
**encapsulate** container, storage resources, neworkId, other configs  

#### 2. Service:  
- provides external ip address for each pod and also a load balancer  
ConfigMap : file which have config values for each pod  
Secret: same like configMap but base64 encrypted  

#### 3. Deployment:
- describe state of pod or replica set in yaml file  


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
apiVersion : v1
kind: pod  
metadata:
  name: nginx  
  labels:
     name: nginx
spec:
  containers:
  - name: nginx
    image: ngnix  
    ports:
    - containerPort: 80
---
apiVersion : v1
kind: service  
metadata:
  name: my-nginx  
  labels:
     run: my-nginx
spec:
  port:
  - port: 80
    protocol: TCP  
  selector:
    run: my-nginx
---
apiVersion : apps/v1
kind: Deployment  
metadata:
  name: nginx-deployment  
  labels:~
spec:
  selector:
      matchLabels:
          run: my-nginx
  replicas: 2
  template:
      metadata:
          labels:
              run: my-ngnix
      spec:
          containers:
          - name: my-ngnix
            image: nginx
            ports:
            - containerPort: 80
---

```  
