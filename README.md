# Take-Home Assignment - Simple Api

##### Project consists of 2 parts: frontend and api

### Requirements
 - php 7.X
 - composer (tested with 1.10.7)

### Setup

#### Api

```sh
$ cd api/
$ composer install
$ env SECRET=<insert secret> \
> env OMDBAPIKEY=<insert api key> \
> php -S 0.0.0.0:8000 router.php
```

#### Frontend

```sh
$ cd frontend/
$ env APIURL=<insert api url> php -S 0.0.0.0:9000 # <insert api url> is something like http://0.0.0.0:8000/
```

#### Docker

```sh
$ docker-compose up
```
