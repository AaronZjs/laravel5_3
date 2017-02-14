Laravel 5.3 News Demo

2017.2.13

安装

1. 设置 .env mysql数据库和redis地址端口
2. php artisan migrate
3. localhost.com/register 注册管理员
4. 开启 redis-server
/*

composer create-project --prefer-dist laravel/laravel blog "5.3.*"

 php artisan migrate

php artisan make:migration create_articles_table
php artisan make:migration create_cates_table

php artisan make:model Articles;
php artisan make:model Cates;

composer require predis/predis

php artisan make:seeder ArticlesTableSeeder
php artisan make:seeder CatesTableSeeder
php artisan db:seed

https://github.com/AaronZjs/laravel5_3

*/