Test Description:

Using one of the modern PHP frameworks (Laravel, Symfony 3, etc), you should implement a JSON-RESTful API (not JSON-RPC), which should provide CRUD access to two resources without any security check:
Post (with fields like: title and body)
Tags (with only name field), many-to-many relation with posts

Additional methods for API:
Select all posts by tag or tags
Count posts by tag or tags
After any post is created, the system should send an email to the email address specified in a configuration file. After any post has been removed, the system should log information about it.

Platform Intro:
Framework: Laravel 4.2
Database: MySQL
Mail: Pretend Mode (Add Email Information in config/constants.php to utilize email option)



/*-----------  Documentation (How to use it):   ----------------*/


1: Download the source files or clone it using git.

2: Create a database in mysql-phpmyadmin using 'post_tag_laravel'.

3: Open 'Composer', and type " php artisan migrate " command to run migrations.

4: After that, type " php artisan db:seed " command to execute seeding.

5: Now use your web-services testing application e.g. Postman

6: Try below mentioned URLs to perform testing:


# 1:
- Post (Create New Post with Tags): Params (title:string, tags:array) 
http://localhost/lazadalaravel/api/service/v1/post

- Get (Get All Posts)
http://localhost/lazadalaravel/api/service/v1/post

- Get (Get one post by ID) - [Parameter: post_id]
http://localhost/lazadalaravel/api/service/v1/post/{post_id}

- Delete (Delete post by ID) - [Parameter: post_id]
http://localhost/lazadalaravel/api/service/v1/post/{post_id}

# 2:
- Get (Get Post by Tag Name): URL Param (name:string) 
http://localhost/lazadalaravel/api/service/v1/tag/{tag name}

# 3:
- Get (Get Post by Tag Name): URL Param (name:string) 
http://localhost/lazadalaravel/api/service/v1/tag/count/{tag name}


Thank-You!
Regards,
Jahangir Ali Khan