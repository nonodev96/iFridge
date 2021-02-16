# iFridge

Vamos a usar una raspberry pi 4 para el desarrollo de este proyecto, ademas esta raspberry pi ya cuenta con varios servicios (openmediavault, DLNA, torrents, etc...) 

Para que el proyecto sea lo más facil de instalar usaremos docker para gestionar mysql y php.

```
https://hub.docker.com/r/joaquindlz/rpi-docker-lamp
```

Intente durante varias horas instalar `nanoninja/docker-nginx-php-mysql` pero da problemas por la arquitectura en la que está definido el proyecto.

Instalamos docker, instalamos el servicio LAMP

```bash
docker pull joaquindlz/rpi-docker-lamp
```

