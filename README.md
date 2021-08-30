## Overview

The Main system is the API gateway and the microservice is the shipment service. The entry point will be the API gateway when the user calls the API service. API gateway will do the basic validation and then send the request to the shipment microservice for calculating the lunar shipment time.

## Architecture Diagram

![Architecture Diagram](https://raw.githubusercontent.com/princelonappan/lunar-fashion-project/main/flowchart.png)


## Requirements and dependencies

- PHP >= 7.2
- Lumen 7.0
- Swagger
- Guzzle

## Features

- Shipment Micro Service for calculating the estimate delivery time in LST

## Installation

First, clone the repo:
```bash
$ git clone git@github.com:princelonappan/lunar-fashion-project.git
```

## Running as a Docker container

Both the applications can be run using the docker compose or normal lumen script. 

Running API gateway:

```
$ cd api-gateway
$ docker-compose up --build
```
Running Shipment Microservice:

```
$ cd shipment-service
$ docker-compose up --build
```

### API Routes
| HTTP Method	| Path | Action | Parameter | Desciption  |
| ----- | ----- | ----- | ---- |------------- |
| GET      | /api/get-shipment-time | getDeliveryTime | earth_time=2021-08-27 17:22:40 | API gateway

### Output 


```php
{
    "success": 1,
    "message": "Success",
    "delivery_time": "54-9-18 ∇  4:6:17"
}
```
#### Run Swagger

You can access the Swagger API through the following end point. <br />
```http://localhost:8003/api/documentation```

#### Run the Unit Test

```
$ ./vendor/bin/phpunit
```
