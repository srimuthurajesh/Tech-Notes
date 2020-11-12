## Docker  
Docker is a set of platform as a service products that use OS-level virtualization to deliver software in packages called container  

Three layers in OS: 1.Hardware, 2.kernel 3.Application  
ie:VM uses -> Hypervisor(virualization) which virualize kernel layer,   
Docker uses -> dockerEngine(containerization) which virtualize OS Application layer     

**Theory:**   
In linux os, two version of same software maintains by using namespace & controlgroups  
likewise Docker engine these feature and perform containerization   

**Image**: series of instructions(layers), executed from image's Dockerfile  eg.all artifacts in dockerhub website are images  
**Container**: an instance of image or Runtime environment for image     
**Dockerfile**: text file of commands to assemble image. consists three parts syntax    
1. Specify base image
2. Commands to download,copy,install dependency
3. Startup command  
```
#Dockerfile Example
FROM node:alphine    #alphine is small size version of an image  
COPY ./ ./  
RUN apt-get update     
RUN npm install  
CMD ["npm start"]
```
**Dockerfile Instructions**:  
1. FROM	-set base image  ex: ```FROM alphine```   
2. RUN 	-executed when create container,executed on top of current image layer ex:```RUN apt-get update```    
3. CMD 	-executed when run container. ex:```CMD echo 'hello world'```    
4. ENTRYPOINT -same like CMD, but not ovverride by commandline command.  
5. COPY	-copy files to container. COPY [FROM_PATH] [TO_PATH] ex:```COPY composer.json /.```   
5. ADD - same as COPY, additionaly has copy from URL, extract tarFile    
7. ENV		-set environment variable ex:```ENV name=rajesh``` ```ENV name rajesh``` ```ENV name=${arg1}```    
8. EXPOSE 	-container listen to this port in runtime ex:```EXPOSE 80/tcp```  
9. LABEL 	-add metadata to image ex:```LABEL description="this is cool"```  
10. USER	-set username/usergroup . USER _user_[:_group_]    
11. VOLUME 	-mount given dir as external mount from container  ex:```VOLUME /var/log/```    
12. WORKDIR -set given path as initial working directory  ex:```WORKDIR /var/log/```  
13. ONBUILD  
14. STOPSIGNAL  

---
## COMMANDS 
### Docker options command
  1. ```-v, --version```  :          Print version information and quit
  2. ```-D, --debug``` :             Enable debug mode    
  3. ```--help```     :          Print usage  
  4. ```--name```: user defined name for container  Ex:docker run --name=rajCont redis:alpine  
  
### Container life cycle commands:  
docker images                   # list all images present in our local machine  
docker run [IMAGE] [COMMAND]   ```Ex: docker run hello-world``` #get image from local or from dockerhub     
docker run -d [IMAGE]  # Detached mode, means dont stop image and tun it in background even after ctrl+c given  
docker run -d [IMAGE] --name [userdefinedName]                  # we can provide name for container    
docker run [IMAGE]:[version] [COMMAND]  # pull particular version of docker image    
Note:docker run = docker create + docker start     

docker create [IMAGE] 	#creates container layer over specified image, print container_id   
docker start -a [CONTAINER]    #start container, -a for print output  
docker stop [CONTAINER] #trigger SIGTERM, thus cleanups happen, proper shutdown    
docker kill [CONTAINER] #trigger SIGKILL, instant shutdown. If stop command take morethan 10s then kill triggers   
docker pause [CONTAINER]
docker unpause [CONTAINER]

### Docker Listing commands
docker imges	# show all image's repository,tags,size  
docker ps  		# show running containers  
docker ps -a  # show history of running containers  

### Docker command commands
docker run [CONTAINER] _command_	```docker run -it busybox sh``` #bustbox with shell terminal access  
docker run -it [CONTAINER] [COMMAND]   #-i=allowInput, -t=beautify   
docker exec [CONTAINER] [COMMAND]            #add command to already running container
docker exec -it [CONTAINER] /bin/bash            #add command to already running container  
docker exec -it [CONTAINER] bash

docker rm [CONTAINER]

docker attach [CONTAINER]                 #enter into shell
docker run [HOST_PORT]:[CONTAINER_PORT] [CONTAINER]

### Docker history commands   
docker ps --all                             #list all previously runned containers  
docker run -rm [CONTAINER]                 #remove container after executing  
docker system prune                         #remove stopped containers  
docker inspect [CONTAINER]                 #low level details like IP  

### Dockerfile commands  
docker build [DOCKERFILE_PATH]		#pick Dockerfile from given dir and build it. generate image_id   
docker build -t [DOCKER_ID]/[PROJECT_ID]:[VERSION] [DOCKERFILE_PATH]   #give customized name for builded image    
```docker build -t rajDock/redis:latest .```  
docker run [IMAGE_NAME]     #version not needed, default version is latest  
docker commit -c 'CMD ["redid-server"]' _running_container_id_     #it will build new image from existing running container  

### Docker network commands  
docker run -p [HOST_PORT]:[CONTAINER_PORT] [CONTAINER] ```docker run -p 8080:8080 rajDock/redis``` 





**Docker hub:**  
docker login --username=rajesh  
docker pull username/imageName  
docker push username/imageName  
docker tag user/image:tag user/image:newtag         #add new tag to image  
docker search searchterm    


**Image creation**  
Way 1: ```docker commit container_id imagename:tag```  
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

## Docker-compose
docker-compose up   
docker-compose down  

docker-compose start  
docker-compose stop  
docker-compose pause  
docker-compose unpause  
docker-compose build          #rebuild all image  

#log  
docker logs -f [CONTAINERID]  
docker logs -f [CONTAINERNAME]  
docker-compose ps  
docker-compose log [CONTAINER]  

**docker-compose.yml:**  
```
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


**Docker network types**:
1. closed/None/Null network - not allowed to connect outer http
2. Bridge network
3. Host network - open & access to all host machine network connection
4. Overlay network - running docker in swarm mode


docker run -d --net none [CONTAINER]  
docker network ls                       #list the networks   
                                        1.eth0 - bridge private   
                                        2.lo   - loopback      
docker network create --driver bridge network_name    #create new network   
docker run --net network_name [CONTAINER]  
docker network diconnect network_name [CONTAINER]  

docker run --net host [CONTAINER]  


**Installation linux**: ```sudo apt install docker.io```
