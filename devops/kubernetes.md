## Kubernetes
> open source container orchestration tool for manageing microservices or contanierized application     

- developed by Google 

### Key featues
1. **Resilient Infrastructure**: Ensures availability through automatic scaling, health checks, failover.
2. **Zero-Downtime Deployment**: smooth rollouts and automatic rollbacks during updates.
3. **Self-Healing**: Automatically handles tasks like container placement, restarts, replication, and scaling based on metrics.

## Components of k8s:
### Master Components:

| **Component**               | **Description**                                                                           |
|-----------------------------|-------------------------------------------------------------------------------------------|
| **kube-apiserver**          | Gateway for all requests, responsible for authentication and communication.               |
| **etcd storage**            | Key-value store that holds cluster state information.                                     |
| **kube-controller-manager** | Monitors the cluster state and ensures the desired state is maintained.                   |
| **cloud-controller-manager**| Manages cloud-specific operations (like load balancing, storage) in cloud environments.   |
| **kube-scheduler**          | Decides on which node a new pod should be scheduled based on resource availability.       |


### Node Components:

| **Term**       | **Description**                                                                           |
|----------------|-------------------------------------------------------------------------------------------|
| **kubelet**    | An agent that runs on each node, ensuring containers are running.                          |
| **kube-proxy** | Handles network routing and forwarding requests between containers and services.           |

### Additional Concepts:

| **Term**     | **Description**                                                                 |
|--------------|---------------------------------------------------------------------------------|
| **Minikube** | A single-node Kubernetes cluster used for local development and testing.        |
| **Kubectl**  | The command-line interface (CLI) tool used to interact with Kubernetes clusters. |


## Key Kubernetes Concepts:

| **Component**                        | **Description**                                         |
|--------------------------------------|---------------------------------------------------------|
| **Pod**                              | Basic unit with containers.                            |
| **Service**                          | Exposes and balances traffic.                          |
| **ConfigMap**                        | Stores configuration data for pods.                    |
| **Secret**                           | Stores sensitive, encrypted data.                      |
| **Deployment**                       | Manages pod scaling and updates.                       |
| **ReplicaSet**                       | Ensures specified pod replicas are running.            |
| **StatefulSet**                      | Manages stateful applications with stable storage.     |
| **PersistentVolume (PV)**            | Provides persistent storage.                           |
| **PersistentVolumeClaim (PVC)**      | Requests and binds to PV storage.                      |
| **Ingress**                          | Manages external access and balancing.                 |
| **Helm**                             | Kubernetes package manager.                            |
| **Horizontal Pod Autoscaler (HPA)**  | Auto-scales pods based on usage.                       |
| **DaemonSet**                        | Runs a pod on every node.                              |
| **Job**                              | Runs pods until completion.                            |
| **CronJob**                          | Schedules jobs at intervals.                           |
| **Role-Based Access Control (RBAC)** | Manages cluster permissions and roles.                 |
| **Namespaces**                       | Divides cluster resources among teams.                 |


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