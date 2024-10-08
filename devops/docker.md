# Docker

1. [Docker Overview](#docker-overview)
5. [Docker Architecture](#docker-architecture)
6. [Core Components](#core-components)
7. [Docker Commands](#docker-commands)
8. [Dockerfile](#dockerfile)
9. [Docker Hub](#docker-hub)
10. [Image Creation](#image-creation)
11. [Building the Image](#building-the-image)
13. [Docker Compose](#docker-compose)
14. [Docker Volume](#docker-volume)

## Docker Overview 
> Docker is a set of platform as a service products that use OS-level virtualization to deliver software in packages called container  

### OS Architecture
1. Hardware Layer
2. Kernel Layer
3. Application Layer

## Virtualization Techniques:
1. Virtual Machines (VMs) use a Hypervisor to virtualize the kernel layer.
2. Docker uses Docker Engine to perform containerization at the application layer.

## Key Concepts
> In linux os, two version of same software maintains by using Namespace & ControlGroups(cgroups)  

- likewise Docker engine use these feature and perform containerization   

**Namespaces**: allowing multiple instances of the same software to run simultaneously without interference.
**Control Groups** (cgroups): Manage resource allocation (CPU, memory, etc.) for containers.

## Docker Architecture
### Docker Engine
> The Docker Engine is a client-server application that consists of:

1. Server (Docker Daemon or dockerd): Listens for Docker API requests and manages Docker objects.
2. REST API: Communicates over UNIX sockets or a network interface.
3. Command Line Interface (CLI): Users interact with Docker using commands that call the Docker API.

## Core Components
1. **Image**: series of instructions(layers), executed from image's Dockerfile  eg.all artifacts in dockerhub    
2. **Container**: an instance of image or Runtime environment for image  
## Docker Commands

### Docker Options Command

| Command                        | Description                                                                |
|-------------------------------|----------------------------------------------------------------------------|
| `-v, --version`               | Print version information and quit                                          |
| `-D, --debug`                 | Enable debug mode                                                          |
| `--help`                      | Print usage information                                                    |
| `--name`                      | User-defined name for the container. Example: `docker run --name=rajCont redis:alpine` |
| `-d`                          | Detached mode: runs container in the background, even after `ctrl+c`     |
| `-a`                          | Attached mode: prints output to the terminal                                 |
| `-it`                         | Interactive terminal mode                                                   |
| `-e`                          | Set environment variables                                                   |
| `-p`                          | Maps ports from the host to the container                                   |
| `--net`                       | Specifies the network where the container will run                         |

### Image Commands

| Command                                                | Description                                        |
|-------------------------------------------------------|----------------------------------------------------|
| `docker images`                                       | List all images present on the local machine      |
| `docker create [IMAGE]`                               | Create a container layer over the specified image, printing the container ID |
| `docker rmi [IMAGE]`                                  | Remove a Docker image                              |
| `docker start [CONTAINER]`                            | Start the specified container                      |
| `docker run [IMAGE]`                                  | Run an image from local or Docker Hub. Example: `docker run busybox` |
| `docker run [IMAGE]:[VERSION]`                        | Pull a specific version of a Docker image         |
| `docker run --name [CONTAINER] [IMAGE]`              | Run an image with a user-defined container name    |
| `docker run [IMAGE] [COMMAND]`                        | Run a command in a new container                   |
| `docker run -it [CONTAINER] [COMMAND]`                | Run a command in an interactive terminal           |
| `docker run -a [CONTAINER] [COMMAND]`                 | Run a command in attached mode                      |
| `docker run -d [IMAGE]`                               | Run a container in detached mode                   |
| `docker run -p [HOST_PORT]:[CONTAINER_PORT] [CONTAINER]` | Map host port to container port                   |
| `docker exec [CONTAINER] [COMMAND]`                   | Execute a command in an already running container  |
| `docker exec -it [CONTAINER] /bin/bash`               | Open a shell in the running container              |

### Container Commands

| Command                                   | Description                                          |
|-------------------------------------------|------------------------------------------------------|
| `docker ps`                               | Show running containers                              |
| `docker ps -a` or `docker ps --all`     | Show history of all containers                       |
| `docker start -a [CONTAINER]`            | Start and attach to the specified container          |
| `docker --restart [CONTAINER]`           | Restart the specified container                      |
| `docker stop [CONTAINER]`                | Gracefully stop a running container                  |
| `docker kill [CONTAINER]`                | Forcefully stop a running container                  |
| `docker pause [CONTAINER]`               | Pause a running container                            |
| `docker unpause [CONTAINER]`             | Unpause a paused container                           |
| `docker rm [CONTAINER]`                  | Remove a stopped container                           |
| `docker attach [CONTAINER]`              | Attach to a running container's shell                |
| `docker run [HOST_PORT]:[CONTAINER_PORT] [CONTAINER]` | Map ports from host to container              |

### Other Docker Commands

| Command                                   | Description                                          |
|-------------------------------------------|------------------------------------------------------|
| `docker ps --all`                        | List all previously run containers                    |
| `docker run --rm [CONTAINER]`            | Remove container after execution                      |
| `docker system prune`                     | Remove stopped containers and unused resources       |
| `docker inspect [CONTAINER]`             | Show low-level details about a container, like IP    |

### Docker Network Commands

| Command                                    | Description                                          |
|--------------------------------------------|------------------------------------------------------|
| `docker network ls`                        | List all networks                                    |
| `docker network create [NETWORKNAME]`     | Create a new network                                 |
| `docker network create --driver bridge [NETWORKNAME]` | Create a new network with a bridge driver     |

### Docker Network Types

1. **Closed/None/Null Network**: Not allowed to connect to external HTTP.
2. **Bridge Network**: Default network for containers.
3. **Host Network**: Open access to all host machine network connections.
4. **Overlay Network**: Used for Docker Swarm mode, allowing communication between containers on different hosts.

### Example Network Commands

- Run a container with no network:  
  `docker run -d --net none [CONTAINER]`

- Show network details:  
  `docker network ls`  
  Example outputs:
  1. `eth0` - Bridge private  
  2. `lo`   - Loopback      

- Connect a container to a specific network:  
  `docker run --net [NETWORK_NAME] [CONTAINER]`  

- Disconnect a container from a network:  
  `docker network disconnect [NETWORK_NAME] [CONTAINER]`  

- Run a container with the host network:  
  `docker run --net host [CONTAINER]`  


## Dockerfile
> A Dockerfile is a text file containing instructions to assemble a Docker image.  

It consists of three main parts:  
1. **Specify the Base Image**
2. **Commands to Download, Copy, and Install Dependencies**
3. **Startup Command**

### Dockerfile Commands

| Command                                | Description                                                  |
|----------------------------------------|--------------------------------------------------------------|
| `docker build [DOCKERFILE_PATH]`       | Build an image using the Dockerfile from the specified path, generating an image ID. |
| `docker build -t [DOCKER_ID]/[PROJECT_ID]:[VERSION] [DOCKERFILE_PATH]` | Build an image with a customized name. Example: `docker build -t rajDock/redis:latest .` |
| `docker run [IMAGE_NAME]`              | Run a container from the specified image (default version is latest). |
| `docker commit -c 'CMD ["redis-server"]' [RUNNING_CONTAINER_ID]` | Create a new image from an existing running container.      |

### Example Dockerfile

```dockerfile
FROM node:alpine        # Alpine is a lightweight version of an image
COPY ./ ./              # Copy files from the current directory to the container
RUN apt-get update      # Update package index
RUN npm install         # Install dependencies
CMD ["npm", "start"]    # Command to run when the container starts
```

### Dockerfile Instructions:

| Instruction | Description                                                                 | Example                                      |
|-------------|-----------------------------------------------------------------------------|----------------------------------------------|
| `FROM`      | Set the base image.                                                         | `FROM alpine`                                |
| `RUN`       | Executed during the image build process, on top of the current image layer. | `RUN apt-get update`                         |
| `CMD`       | Command executed when the container starts.                                 | `CMD echo 'hello world'`                     |
| `ENTRYPOINT`| Similar to CMD, but cannot be overridden by command line arguments.         | `ENTRYPOINT ["redis-server"]`                |
| `COPY`      | Copy files from the host file system into the container.                    | `COPY composer.json ./`                      |
| `ADD`       | Similar to COPY, but can also copy files from URLs and extract tar files.   | `ADD http://example.com/file.tar.gz ./`      |
| `ENV`       | Set environment variables.                                                  | `ENV name=rajesh`                            |
| `EXPOSE`    | container listens on the specified network ports at runtime.                | `EXPOSE 80/tcp`                              |
| `LABEL`     | Add metadata to the image.                                                  | `LABEL description="this is cool"`           |
| `USER`      | Specify the username or user group to use when running the image.           | `USER user:group`                            |
| `VOLUME`    | Create a mount point with specified path and mark it as holding externally mounted volumes. | `VOLUME /var/log/`           |
| `WORKDIR`   | Set the working directory for any subsequent instructions.                  | `WORKDIR /var/log/`                          |
| `ONBUILD`   | Adds a trigger instruction to image that will be executed at a later time.  | `ONBUILD RUN echo "This runs on build"`      |
| `STOPSIGNAL`| Sets the system call signal that will be sent to the container to stop it.  | `STOPSIGNAL SIGKILL`                         |




## Docker hub:
> cloud-based registry service for sharing and managing Docker image

| Command                                    | Description                                   |
|--------------------------------------------|-----------------------------------------------|
| `docker login --username=rajesh`          | Log in to Docker Hub with the specified username. |
| `docker pull username/imageName`           | Pull an image from Docker Hub to your local machine. |
| `docker push username/imageName`           | Push an image from your local machine to Docker Hub. |
| `docker tag user/image:tag user/image:newtag` | Add a new tag to an existing image.             |
| `docker search searchterm`                 | Search for images on Docker Hub using the specified search term. |


## Image creation  
### Two Ways to Create an Image

1. Using docker commit:  
- To create an image from a running container, use the command:

`docker commit <container_id> <image_name>:<tag>`

2. Using a Dockerfile:
- Create a Dockerfile with the following commands:

```dockerfile
FROM debian:jessie
RUN apt-get update
COPY abc.txt /src/abc.txt
ADD abc.txt /src/abc.txt
WORKDIR /src
USER admin
CMD ["initial command"]
```

## Building the Image
> To build an image from a Dockerfile, use the following command:

`docker build -t <image_name>`
 .
- If you want to rebuild the image without using the cache, use:

`docker build -t <image_name> --no-cache=true`

### Linking Containers
> To link a container to another (e.g., a Redis container), use:

`docker run --link redis <container_id>`


## Docker-compose
> tool that simplifies the process of defining and running multi-container Docker applications. 

- manage services, networks, and volumes in a single file, typically named `docker-compose.yml`.

| Command                               | Description                            |
|---------------------------------------|----------------------------------------|
| `docker-compose -f [YMLFILENAME] up`  | Start services defined in YML file     |
| `docker-compose -f [YMLFILENAME] down`| Stop and remove services               |
| `docker-compose start`                | Start existing services                |
| `docker-compose stop`                 | Stop running services                  |
| `docker-compose pause`                | Pause services                         |
| `docker-compose unpause`              | Resume paused services                 |
| `docker-compose build`                | Rebuild all images                     |
| `docker logs -f [CONTAINERID]`        | View logs for specific container       |
| `docker logs -f [CONTAINERNAME]`      | View logs using container name         |
| `docker-compose ps`                   | List running services                  |
| `docker-compose log [CONTAINER]`      | Show logs for a specific service       |


### docker-compose.yml  
```yaml
version: '3'

services:
  mongodb:
    image: mongo
    ports:
     - "27017:27017"
    environment:  
     - MONGO_INITDB_ROOT_USERNAME=admin  
     - MONGO_INITDB_ROOT_PASSWORD=password
    volumes:
     - db-data:var/lib/mongo/data  
    build: .
    # build from Dockerfile
    context: ./Path
    dockerfile: Dockerfile
    
    volumes:
     - .db-data
 ```
### Explanation
- version: Specifies the version of the Docker Compose file format.
- services: Defines the services (containers) that will be created.
  - mongodb: The name of the service.
    - image: Specifies the Docker image to use for the service.
    - ports: Maps the container port to the host port.
    - environment: Sets environment variables for the container.
    - volumes: Defines volume mappings for persistent data storage.
    - build: Indicates that the service should be built from a Dockerfile located in the specified context.

## Docker Volume  

| Volume Type     | Command Example                                         | Description                                 |
|-----------------|---------------------------------------------------------|---------------------------------------------|
| **Host Volume** | `docker run -v [HOST_DIR]:[CONTAINER_DIR] [CONTAINER]`  | Useful for sharing files between the host and container. |
| **Anonymous Volume**  | `docker run -v [CONTAINER_DIR] [CONTAINER]`       | Automatically managed by Docker; less control over storage. |
| **Named Volume**| `docker run -v [ANYNAME]:[CONTAINER_DIR] [CONTAINER]`   | Creates a named volume for easier data management. |
