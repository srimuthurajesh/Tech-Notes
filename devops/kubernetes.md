## Kubernetes
> open source container orchestration tool for manageing microservices or contanierized application     

- developed by Google 

### Key featues
1. **Resilient Infrastructure**: Ensures availability through automatic scaling, health checks, failover.
2. **Zero-Downtime Deployment**: smooth rollouts and automatic rollbacks during updates.
3. **Self-Healing**: Automatically handles tasks like container placement, restarts, replication, and scaling based on metrics.

## Components of k8s:
### Master Components:
#### 1. kube-apiserver: 
> The gateway for all requests to the Kubernetes cluster, responsible for authentication and communication.

2. etcd storage: A key-value store that holds cluster state information and is used by Kubernetes components for coordination.
3. kube-controller-manager: Monitors the cluster state and ensures that the desired state is maintained (e.g., replication, node management).
4. cloud-controller-manager: Manages cloud-specific operations (like load balancing, storage) for Kubernetes clusters running in cloud environments.
5. kube-scheduler: Decides on which node a new pod should be scheduled based on resource availability and constraints.


### Node Components:
1. kubelet: An agent that runs on each node, ensuring containers are running in a pod.
2. kube-proxy: Handles network routing and forwarding requests between containers and services in the cluster.

### Additional Concepts:
1. Minikube: A single-node Kubernetes cluster used for local development and testing.
2. Kubectl: The command-line interface (CLI) tool used to interact with Kubernetes clusters.


## Kubernetes Objects:
#### 1. Pod:  
> The smallest deployable unit in Kubernetes, encapsulating one or more containers, storage resources, network identities, and configuration.  

#### 2. Service:  
> Exposes a pod or a set of pods to the network with a stable IP address. Services also act as load balancers to distribute traffic between pods.

- ConfigMap: A file containing configuration data that can be used by pods.
- Secret: Similar to a ConfigMap but used for storing sensitive information (e.g., passwords) in a base64-encoded format.

#### 3. Deployment:
> Describes the desired state of pods and replica sets in a YAML file, allowing you to manage scaling and updates.

### Kubernetes Installation Requirements:
1. Container Runtime: Like Docker, responsible for running containers.
2. Kubelet: Communicates with the Kubernetes control plane, manages the container lifecycle on the node.
3. Kube Proxy: Manages network routing and forwarding traffic between services.


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


#### Yaml Configuration:  
1. Pod Configuration:

```
apiVersion: v1
kind: Pod  
metadata:
  name: nginx  
  labels:
    name: nginx
spec:
  containers:
  - name: nginx
    image: nginx  
    ports:
    - containerPort: 80
```

2. Service Configuration:

```
apiVersion: v1
kind: Service  
metadata:
  name: my-nginx  
  labels:
    run: my-nginx
spec:
  ports:
  - port: 80
    protocol: TCP  
  selector:
    run: my-nginx
```

3. Deployment Configuration:

```
apiVersion: apps/v1
kind: Deployment  
metadata:
  name: nginx-deployment  
  labels:
    run: my-nginx
spec:
  replicas: 2
  selector:
    matchLabels:
      run: my-nginx
  template:
    metadata:
      labels:
        run: my-nginx
    spec:
      containers:
      - name: my-nginx
        image: nginx
        ports:
        - containerPort: 80

```