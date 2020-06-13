## Docker  
-for building distributed software  
-adopt Microservice architecture    
-alternate for VMs  
ie:VM uses Hypervisor(virualization), Docker uses dockerEngine(containerization)   

**Theory:**   
In linux os, if we need to use two diff version of same software, it maintains namespace & controlgroups 
Namespaceing isolates resource per process  
Controlgroups limits resources per process  
Docker engine creates a linux virtual machine, uses this feature and perform containerization   

**Image**: series of instructions(layers) executed from image's Dockerfile

**Dockerfile**: text file contains command to assemble image. consists three parts syntax    
1. Specify base image
2. Commands to download,copy,install dependency
3. Startup command  

**Instructions inside Dockerfile**:  
FROM	-set base image  ex: ```FROM alphine```   
RUN 	-executed when create container,executed on top of current image layer ex:```RUN apt-get update```  
CMD 	-executed when run container. ex:```CMD echo 'hello world'``` 
ENTRYPOINT -same like CMD, but not ovverride by commandline command. ```ENTRYPOINT echo 'Hello' CMD echo 'world'```  
```docker run cont_id echo 'earth'``` #o/p:Hello earth #cmd is overriden, but entrypoint not overriden  
   

ADD		-
COPY	-copy files to container. COPY <from_path> <to_path> ex:```COPY composer.json /.```
ENV		-set environment variable ex:```ENV name=rajesh``` ```ENV name rajesh``` ```ENV name=${arg1}```  
EXPOSE 	-container listen to this port in runtime ex:```EXPOSE 80/tcp```
LABEL 	-add metadata to image ex:```LABEL description="this is cool"```
STOPSIGNAL
USER	-set username/usergroup . USER <user>[:<group>]  
VOLUME 	-mount given dir as external mount from container  ex:```VOLUME /var/log/```
WORKDIR -set given path as initial working directory  ex:```WORKDIR /var/log/```  
ONBUILD


```
FROM node:alphine    #alphine is small size version of an image  
COPY ./ ./  
RUN apt-get update     
RUN npm install  
CMD ["npm start"]
```
**Container**: an instance of image   


- **Registry:** a storage and content delivery system used for distributing Docker images.
- **Repository:** a collection of related Docker images, often different versions of the same application.

---
## COMMANDS 

**Docker Running commands**:
docker version 			#show version  

docker run <image-name> <command>  
```docker run hello-world``` #get image from local or dockerhub     

**Container life cycle commands**:  
docker run = docker create + docker start     
docker create <image-name> 	#creates container layer over specified image, print container_id   
docker start -a <container-id>    #start container, -a for print output  

docker stop <container-id> #trigger SIGTERM, thus cleanups happen, proper shutdown    
docker kill <container-id> #trigger SIGKILL, instant shutdown. If stop command take morethan 10s then kill triggers   

docker pause container_id
docker unpause container_id

**Docker Listing commands**
docker imges	# show all image's repository,tags,size  
docker ps  		# show running containers  

**Docker command commands**  
docker run <container_id> <command>	```docker run -it busybox sh``` #bustbox with shell terminal access  
docker run -it <container_id> <command>   #-i=allowInput, -t=beautify   
docker exec <container_id> <command>            #add command to already running container  


docker rm container_id

docker attach container_id                  #enter into shell
docker run host_port:container_port container_id

**Docker history commands**  
```
docker ps --all                             #list all previously runned containers
docker run -rm container_id                 #remove container after executing
docker system prune                         #remove stopped containers
docker inspect container_id                 #low level details like IP
```

**Dockerfile commands**:  
docker build <Dockerfile_path>		#pick Dockerfile from given dir and build it. generate image_id   
docker build -t <docker_id>/<project_id>:<version> <Dockerfile_path>   #give customized name for builded image    
```docker build -t rajDock/redis:latest .```  
docker run <customized_image_name>     #version not needed, default version is latest  
docker commit -c 'CMD ["redid-server"]' <running_container_id>     #it will build new image from existing running container  

**Docker network commands**:  
docker run -p <local_port>:<container_port> <container_id> ```docker run -p 8080:8080 rajDock/redis``` 





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
    image: ubuntu
    image: a4bc65fd
```
**Docker-compose**
```
sudo curl -L "https://github.com/docker/compose/releases/download/1.25.0\
/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose && \
sudo chmod +x /usr/local/bin/docker-compose
docker-compose --version

docker-compose up
docker-compose down

docker-compose start
docker-compose stop
docker-compose pause
docker-compose unpause
docker-compose build          #rebuild all image

#log
docker-compose ps
docker-compose log container_id
```

**Docker network types**:
1. closed/None/Null network - not allowed to connect outer http
2. Bridge network
3. Host network - open & access to all host machine network connection
4. Overlay network - running docker in swarm mode

```
docker run -d --net none container_id
docker network ls                       #list the networks 
                                        1.eth0 - bridge private 
                                        2.lo   - loopback    
docker network create --driver bridge network_name    #create new network 
docker run --net network_name container_id
docker network diconnect network_name container_id

docker run --net host container_id

```

**Installation linux**: ```sudo apt install docker.io```
