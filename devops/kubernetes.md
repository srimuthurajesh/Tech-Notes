## Kubernetes
> open source container orchestration tool for manageing microservices or contanierized application     

- developed by Google 

### Key featues
1. **Resilient Infrastructure**: Ensures availability through automatic scaling, health checks, failover.
2. **Zero-Downtime Deployment**: smooth rollouts and automatic rollbacks during updates.
3. **Self-Healing**: Automatically handles tasks like container placement, restarts, replication, and scaling based on metrics.

## Components of k8s:
### Master Components:

| **Component**              | **Description**                                                                           |
|----------------------------|-------------------------------------------------------------------------------------------|
| kube-apiserver        | Gateway for all requests, responsible for authentication and communication.               |
| **etcd storage**            | Key-value store that holds cluster state information.                                     |
| **kube-controller-manager** | Monitors the cluster state and ensures the desired state is maintained.                   |
| **cloud-controller-manager**| Manages cloud-specific operations (like load balancing, storage) in cloud environments.   |
| **kube-scheduler**          | Decides on which node a new pod should be scheduled based on resource availability.       |


1. **kube-apiserver**: - gateway for all requests, responsible for authentication and communication.
2. **etcd storage**: key-value store that holds cluster state information.
3. **kube-controller-manager**: Monitors the cluster state 
4. **cloud-controller-manager** : Manages cloud-specific operations (like load balancing, storage) while running in cloud .
5. **kube-scheduler**: Decides on which node a new pod should be scheduled based on resource availability

### Node Components:
1. **kubelet**: An agent that runs on each node, ensuring containers are running.
2. **kube-proxy**: Handles network routing and forwarding requests between containers and services.

### Additional Concepts:
#### 1. Minikube: 
> A single-node Kubernetes cluster used for local development and testing.
#### 2. Kubectl: 
> The command-line interface (CLI) tool used to interact with Kubernetes clusters.


## Key Kubernetes Concepts:
#### 1. Pod:  
> The smallest deployable unit in Kubernetes, encapsulating one or more containers, storage resources, network identities, and configuration.  

#### 2. Service:  
> Exposes a pod or a set of pods to the network with a stable IP address. Services also act as load balancers to distribute traffic between pods.

- ConfigMap: A file containing configuration data that can be used by pods.
- Secret: Similar to a ConfigMap but used for storing sensitive information (e.g., passwords) in a base64-encoded format.

#### 3. Deployment:
> Describes the desired state of pods and replica sets in a YAML file, allowing you to manage scaling and updates.

#### 4. ReplicaSet
> Ensures a specified number of pod replicas are running at all times.

#### 5. StatefulSet
> Manages the deployment of stateful applications (e.g., databases).

- Ensures unique network identities and stable storage for each pod instance.

#### 6. PersistentVolume (PV) & PersistentVolumeClaim (PVC)
- PV: Provides persistent storage for Kubernetes.
- PVC: A request for storage by a user, typically bound to a PV.

#### 7. Ingress
> Manages external access to services, usually providing load balancing and SSL termination.

#### 8. Helm
> A package manager for Kubernetes, simplifying application deployment through Helm charts.

#### 9. Horizontal Pod Autoscaler (HPA)
> Automatically scales the number of pods based on CPU usage or custom metrics.

#### 10. DaemonSet
> Ensures that a copy of a pod runs on every node (or specific nodes).

#### 11. Jobs & CronJobs
- Job: Ensures that a specified number of pods run to completion.
- CronJob: Runs jobs at scheduled intervals, similar to cron jobs in Unix/Linux systems.

#### 12. Role-Based Access Control (RBAC)
> Manages permissions within the Kubernetes cluster by defining roles and policies.

#### 13. Namespaces
> Provides a way to divide cluster resources among different users and teams.

#### 14. Minikube
> A single-node Kubernetes cluster for local development and testing.


### Kubernetes Installation Requirements:
1. Container Runtime: Like Docker, responsible for running containers.
2. Kubelet: Communicates with the Kubernetes control plane, manages the container lifecycle on the node.
3. Kube Proxy: Manages network routing and forwarding traffic between services.


#### Kubectl commands: 

| Command                                      | Description                                                |
|----------------------------------------------|------------------------------------------------------------|
| `kubectl get pod`                            | Lists all pods in the current namespace.                    |
| `kubectl get nodes`                          | Lists all nodes in the Kubernetes cluster.                  |
| `kubectl get deployment`                     | Lists all deployments in the current namespace.             |
| `kubectl create deployment nginx-depl --image=nginx` | Creates a new deployment with the specified image.  |
| `kubectl get replicaset`                     | Lists all ReplicaSets in the current namespace.             |
| `kubectl edit deployment [deploymentName]`   | Opens the auto-generated YAML configuration file of the deployment for editing. |
| `kubectl logs [podName]`                     | Fetches the logs of the specified pod.                      |
| `kubectl describe pod [podName]`             | Shows detailed information about a pod, including events and status changes. |
| `kubectl exec -it [podName] -- /bin/bash`    | Opens an interactive shell session inside the container running in the pod. |
| `kubectl delete deployment [deploymentName]` | Deletes the specified deployment.                           |
| `kubectl apply -f [yaml fileName]`           | Applies a YAML configuration file to create/update resources. |
| `kubectl delete -f [yaml fileName]`          | Deletes resources defined in the YAML configuration file.   |


### Yaml Configuration:  
#### 1. Pod Configuration:

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
##### Explanation:
- apiVersion: Specifies the version of the Kubernetes API (v1)
- kind: Defines type of object
- metadata: Provides information for the Pod.
  - name: name of the Pod (nginx).
  - labels: Key-value pairs that help in organizing and selecting the Pod (name: nginx).
- spec: Specifies the desired state of the Pod.
  - containers: This section defines the containers that will run in this Pod.
    - name: The container’s name (nginx).
    - image: docker image name.
    - ports: The port that the container will expose (80).

**Summary**: This YAML file defines a Pod named nginx that runs an Nginx web server container, exposing port 80.

#### 2. Service Configuration:

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
##### Explanation:
- apiVersion: The API version for core objects, still v1.
- kind: Specifies this object as a Service.
- metadata: Identifying information for the service.
  - name: The name of the Service (my-nginx).
  - labels: Labels associated with the service (run: my-nginx).
- spec: The specification for the service.
  - ports: Defines which port the service should expose.
    - port: The port that will be exposed to the outside world (80).
    - protocol: The communication protocol used (TCP), which is the standard for web traffic.
  - selector: Selects Pods based on their labels, in this case, any Pod with the label run: my-nginx.

**Summary**: This YAML file defines a Service that exposes port 80 using TCP and directs traffic to Pods with the label run: my-nginx. It acts as a load balancer or a gateway for external traffic to reach the Pods.


#### 3. Deployment Configuration:

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
##### Explanation:
- apiVersion: The version for managing applications (apps/v1).
- kind: Defines this as a Deployment object, which helps manage and scale Pods.
- metadata: Contains identifying information for the deployment.
  - name: The name of the Deployment (nginx-deployment).
  - labels: Labels for organizational purposes (run: my-nginx).
-  spec: The specification for the deployment.
  - replicas: The desired number of Pod replicas (2 Pods will be created).
  - selector: Specifies which Pods this deployment will manage, by matching labels.
    - matchLabels: The label used to identify and manage the Pods (run: my-nginx).
  - template: Defines the Pod template that the deployment will use to create Pods.
    - metadata: The metadata for Pods created by this deployment (with the label run: my-nginx).
    - spec: Describes the containers that will run inside each Pod.
      - containers: Describes the container inside each Pod.
        - name: The name of the container (my-nginx).
        - image: The Docker image to be used (nginx).
        - ports: Exposes port 80 for the container.
**Summary**: This YAML file defines a Deployment that will ensure 2 replicas (copies) of a Pod running an Nginx web server are always up and running. It also allows for easier updates and scaling of Pods.