# PHP API Example
Simple example of a PHP API

## Description
This project was spawned simply because I wanted to gain a better understanding both of APIs in general as well as REST oriented architecture. I've followed my understanding of REST APIs as best I can, helped by various blogs and specifically a post from [Creating-a-restful-api-with-php/](http://coreymaynard.com/blog/creating-a-restful-api-with-php/).

Additional help from [Building REST API for legacy PHP Projects](https://www.toptal.com/php/building-rest-api-for-legacy-php-projects);

## Features
- [x] Support `CRUD` operations with a PHP REST API
- [ ] Simple authentication
- [ ] ISO-8601 DateTime format

## Usage
Requests are handled based on the HTTP Request type in a manner closely corresponding to typical CRUD operations.

- Create => `POST`
- Read => `GET`
- Update => `PUT`
- Delete => `DELETE`

Example usage:

```bash
curl GET http:[SEVER_IP]/api/[VERSION]/info
curl GET http://127.0.0.1/api/v1/info
```

_Disclaimer: This project is intended for learning purposes only and should not be thought of otherwise. I recognize that there are inevitable security failures, many of which I have no desire to fix for the purposes of this project._
