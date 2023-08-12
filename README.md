## Project Description
**Simple blog system written in vanilla PHP**

### How to Run:
this project use nginx and php docker containers utilizing docker compose
1. cd into the docker directory first:
    `cd docker`
2. execute: `docker compose up -d`
3. install the composer packages inside php container:
`docker exec -it php-app bash` -> `composer install`
4. project will be served as `localhost`