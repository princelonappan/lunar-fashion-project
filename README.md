## Overview

The Main system is API gateway and the microservice is shipment service. The entry point will be the API gateway when the user calls the API service. API gateway will do the basic validation and then send the request to the shipment microservice for calculating the lunar shipment time.


## Requirements and dependencies

- PHP >= 7.2
- Lumen 7.0
- 

## Features

- Shipment API Service for calculating the estimate delivery time.

## Installation

First, clone the repo:
```bash
$ git clone git@github.com:hasib32/rest-api-with-lumen.git
```

## Running as a Docker container

Both the applications can be run using the docker compose or normal lumen script. 

Running API gateway:

```
$ cd api-gateway
$ docker-compose up --build
```
Running API gateway:

```
$ cd shipment-service
$ docker-compose up --build
```

### API Routes
| HTTP Method	| Path | Action | Parameter | Desciption  |
| ----- | ----- | ----- | ---- |------------- |
| GET      | /api/get_shipment_time | getDeliveryTime | earth_time=2021-08-27 17:22:40 | Lunar Shipment Time

### Output 

You can do basic JSON output mutation using ```output``` property of an action. Eg.
```php
{
    "success": 1,
    "message": "Success",
    "delivery_time": "54-9-18 ∇  4:6:17"
}
```
#### Run Swagger

You can access the Swagger API through the following end point. <br />
```/api/documentation```

```
$ cd rest-api-with-lumen
$ php artisan swagger-lume:generate
$ php artisan swagger-lume:publish
$ cp -a vendor/swagger-api/swagger-ui/dist public/swagger-ui-assets
```
#### Run the Unit Test

```
$ ./vendor/bin/phpunit
```
