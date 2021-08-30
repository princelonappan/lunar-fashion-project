## Overview

The API gateway will do the primary validation and send to the request to the coresponding microservice.
## Requirements and dependencies

- PHP >= 7.2
- Lumen 7.0

## Installation

First, clone the repo:
```bash
$ git clone git@github.com:princelonappan/lunar-fashion-project.git
```
## Running as a Docker container

Both the applications can be run using the docker compose or normal lumen script. 

Running API gateway:

```
$ docker-compose up --build
```

### API Routes
| HTTP Method	| Path | Action | Parameter | Desciption  |
| ----- | ----- | ----- | ---- |------------- |
| GET      | /api/get-shipment-time | getDeliveryTime | earth_time=2021-08-27 17:22:40 | API gateway

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

The Swagger can be accessed through the following end point. <br />
```/api/documentation```

#### Run the Unit Test

```
$ ./vendor/bin/phpunit
```
