docker-memcached
---------------

Docker memcached server generic image source. This is based on `ubuntu:12.04` image.

Image
-----

You can `pull` a ready to use image from Docker
[index](https://index.docker.io/u/wiliamsouza/) running:

```
$ docker pull wiliamsouza/memcached
```

Or build this repository:

```
$ git clone https://github.com/wiliamsouza/docker-memcached.git
$ cd docker-memcached/
$ docker build -t wiliamsouza/memcached .
```

Change `wiliamsouza/memcached` to your Docker index username.

Container
---------

Shell access:

```
$ docker run -p 11211:11211 -i \
-t wiliamsouza/memcached /bin/bash
```

The command above will start a container give you a shell. Don't
forget to start the service running the `startup &` script.

Usage:

```
$ docker run --name memcached -p 11211:11211 -d \
-t wiliamsouza/memcached
```

The command above will start a container and return its ID.
# memcache-ha-test
