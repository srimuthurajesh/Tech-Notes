**Docker** is an open-source platform for building distributed software using “containerization

**Installation**
```
apt install docker.io
docker version
sudo curl -L "https://github.com/docker/compose/releases/download/1.25.0/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose && \
sudo chmod +x /usr/local/bin/docker-compose
docker-compose --version
```

```
docker run containerName
docker run -i -t -d containerName           #i=interactive, -t=pseudo-tty -d=detach run in background
docker run containerName firstCommand
docker ps --all                         #list all containers
docker ps                               #list current running containers
docker images                           #list images
docker system prune                     #remove stopped containers

```
