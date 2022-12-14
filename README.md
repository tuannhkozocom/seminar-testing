# SETUP
1. Technical
- Backend: Laravel
  - Package: Spectator
- [Docker]((https://www.digitalocean.com/community/tutorials/how-to-set-up-laravel-nginx-and-mysql-with-docker-compose-on-ubuntu-20-04)): LEMP (nginx, mysql, php)
- CI

2. Create user in laravel
* if you don't want to use `root` account, follow the below command:
- `CREATE USER 'tuannh'@'localhost' IDENTIFIED BY 'tuannh';`
- `GRANT ALL ON *.* TO 'username'@'localhost'`

3. Feature:
- Testing


4. Setup
- `cp .env.example .env`
- `cp .docker.env.example .docker.env`
- `docker-compose up -d`
- `docker exec -it php php artisan key:generate`
- `docker exec -it php php artisan migrate`
- Run http://localhost:9000