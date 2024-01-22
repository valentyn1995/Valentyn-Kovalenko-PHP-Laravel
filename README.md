# Students & courses Laravel (Setup guide)

1. Select a directory
```sh
cd <path directory_for_repository>
```
2. Clone repo and select a branch
```sh
git clone -b main https://github.com/valentyn1995/Valentyn-Kovalenko-PHP-Laravel.git
```
3. Build Docker image and run Docker container
```sh
docker-compose up -d --build
```
4. Write data from files to database
```sh
 - docker-compose exec -it app bash
```
```sh
 - php artisan migrate
```
```sh
 - php artisan add:data
```
```sh
 - exit
```
5. Run application in browser
```sh
http://localhost:5000
```
6. Run API in browser
- List of groups(JSON)
```sh
http://localhost:5000/api/v1/group/show?format=json
```
- List of groups(XML)
```sh
http://localhost:5000/api/v1/group/show?format=xml
```
- List of course(JSON)
```sh
http://localhost:5000/api/v1/course/showCourse?format=json
```
- List of course(XML)
```sh
http://localhost:5000/api/v1/course/showCourse?format=xml
```
- Student on course(JSON)
```sh
http://localhost:5000/api/v1/course/show_students_on_course/1?format=json
```
- Student on course(XML)
```sh
http://localhost:5000/api/v1/course/show_students_on_course/1?format=xml
```
- Student without course(JSON)
```sh
http://localhost:5000/api/v1/course/show_all_students_without_course/1?format=json
```
- Student without course(XML)
```sh
http://localhost:5000/api/v1/course/show_all_students_without_course/1?format=xml
```
7. Run tests
```sh
docker-compose exec -it app php artisan test
```
8. Run Swagger documentation
```sh
docker-compose exec -it app php artisan l5-swagger:generate
```
```sh
http://localhost:5000/api/documentation
```

