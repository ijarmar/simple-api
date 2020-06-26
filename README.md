# Take-Home Assignment - Simple Api

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
$ env APIURL=<insert api url> php -S 0.0.0.0:9000
```

#### Docker

```sh
$ docker build \
> --build-arg SECRET=<insert secret> \
> --build-arg OMDBAPIKEY=<insert api key> -t api .
```

```sh
$ docker run -d -p 8000:8000 api
```
