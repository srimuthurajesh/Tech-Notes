**Docker** is an open-source platform for building distributed software using “containerization

**Installation**
```
sudo apt install docker.io
docker version

sudo curl -L "https://github.com/docker/compose/releases/download/1.25.0/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose && \
sudo chmod +x /usr/local/bin/docker-compose
docker-compose --version
```
- **Layer**: a set of read-only files or commands that describe how to set up the underlying system
- **Image**: an immutable layer that forms the base of the container.
- **Container**: an instance of the image, muttable layer
- **Registry:** a storage and content delivery system used for distributing Docker images.
- **Repository:** a collection of related Docker images, often different versions of the same application.

**Docker Running**:
```
docker run container_id                     #if not available in local it will get from registry 
docker start container_id
docker stop container_id
docker pause container_id
docker unpause container_id
docker run -i -t -d container_id            #i=interactive, -t=pseudo-tty -d=detach run in background
docker run containerName initial_command
docker exec container_id command            #execute the given command
```
**Docker history**
```
docker ps --all                             #list all containers
docker ps                                   #list current running containers
docker run -rm container_id                 #remove container after executing
docker images                               #list images
docker system prune                         #remove stopped containers
```
