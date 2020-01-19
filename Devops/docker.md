**Docker** is an open-source platform for building distributed software using “containerization

**Installation**
```
sudo apt install docker.io
docker version

sudo curl -L "https://github.com/docker/compose/releases/download/1.25.0\
/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose && \
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
docker kill container_id
docker rm container_id
docker run -i -t -d container_id            #i=interactive, -t=pseudo-tty -d=detach run in background
docker run containerName initial_command
docker exec container_id command            #execute the given command
docker attach container_id                  #enter into shell
docker run host_port:container_port container_id
```
**Docker history**
```
docker ps                                   #list current running containers
docker ps --all                             #list all containers
docker run -rm container_id                 #remove container after executing
docker images                               #list images
docker system prune                         #remove stopped containers
docker inspect container_id                 #low level details like IP
```

**Docker hub:**
```
docker login --username=rajesh
docker pull username/imageName
docker push username/imageName
docker tag user/image:tag user/image:newtag       #add new tag to image
docker search searchterm
```

**Image creation**\
Way 1: ```docker commit container_id imagename:tag```\
Way 2: create Dockerfile
```
FROM debian:jessie
RUN apt-get update
COPY abc.txt /src/abc.txt
ADD abc.txt /src/abc.txt
WORKDIR /src
USER admin
CMD["initial command"]
```
Docker build
```
docker build -t image_name
docker build -t image_name --no-cache=true
```
**Docker link**: ```docker run --link redis container_id```
**yml file:**
```
# docker-compose.yml
version: '2'

services:
  web:
    build: .
    # build from Dockerfile
    context: ./Path
    dockerfile: Dockerfile
    ports:
     - "5000:5000"
    volumes:
     - .:/code
  redis:
    image: redis
```
