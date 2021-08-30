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

The following docker command will run both the API gateway and Shipment Service API.

```
$ docker-compose up --build
```


### API Routes
| HTTP Method	| Path | Action | Parameter | Desciption  |
| ----- | ----- | ----- | ---- |------------- |
| GET      | /api/get-shipment-time | getDeliveryTime | earth_time=2021-08-27 17:22:40 | API gateway


### API Curl Request

```
 curl -X GET \
  'http://localhost:8003/api/get-shipment-time?earth_time=2021-08-27%2017%3A22%3A40' \
  -H 'cache-control: no-cache' \
  -H 'content-type: application/json'
```

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
