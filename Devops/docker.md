**Docker** is an open-source platform for building distributed software using “containerization
```
sudo apt install docker.io

docker version
docker run containerName
docker run -i -t -d containerName           #i=interactive, -t=pseudo-tty -d=detach run in background
docker run containerName firstCommand
docker ps --all                         #list all containers
docker ps                               #list current running containers
docker images                           #list images
docker system prune                     #remove stopped containers

```
