## Overview

The Shipment Microservice is used to estimate the arrival time of product in Lunar colony. The input will be in UTC and the service will be returned as Lunar Standard Time (LST)

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

Running Shipment Microservice:

```
$ docker-compose up --build
```

#### Run the Unit Test

```
$ ./vendor/bin/phpunit
```
