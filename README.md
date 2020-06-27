# Take-Home Assignment - Simple Api

##### Project consists of 2 parts: frontend and api

## Requirements
 - php 7.X
 - composer (tested with 1.10.7)

## Setup (Local)

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
## Setup (Docker)

#### Docker-compose

```sh
$ docker-compose up
```

## API Endpoints
 - `/auth` - get the jwt for endpoints requiring authorizaiton
 - `/getMovie` - (requires Authorizaiton bearer token) gets info about the movie, supports almost all available parameters from https://www.omdbapi.com/
 - `/getBook` - (requires Authorizaiton bearer token)  gets info about a specific books, supports almost all available parameters from https://openlibrary.org/dev/docs/api/books
 
 ## Functionality
 API works as a reverse proxy with jwt authentication. Frontend is a demo application for the api.
