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

Accedemos a la imagen y actualizamos

```
docker exec -ti <ID IMAGEN> bash

apt update
apt upgrade
apt install -y phpmyadmin
```

Seguimos este minitutorial para instalar phpmyadmin dentro del docker `https://pimylifeup.com/raspberry-pi-phpmyadmin/`

Para finalizar el tutorial he creado el usuario `username` con contraseña `password` ( Soy experto en seguridad informatica :D ) para acceder a phpmyadmin
