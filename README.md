## To Run This Project: 

1. Download or clone this project
2. Rename .env.example to .env 
3. composer update
4. php artisan key:generate 
5. php artisan migrate
6. php artisan db:seed --class=PermissionTableSeeder
7. php artisan db:seed --class=CreateAdminUserSeeder
8. php artisan serve

Access By: 
http://localhost:8000/

Login with following credential:
Email: admin@gmail.com
Password: 123456

## CSEB5123 Advanced Web Application Development
Final Project

This project utilised the following packages: -
K UI Template 
Breeze Package 
Spatie Roles and Permissions Package
