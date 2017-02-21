## Test

Documentation (How to use it):
1: Download the source files or clone it using git.
2: Create a database in mysql-phpmyadmin using 'post_tag_laravel'.
3: Open 'Composer', and type " php artisan migrate " command to run migrations.
4: After that, type " php artisan db:seed " command to execute seeding.
5: Now use your web-services testing application e.g. Postman
6: Try below mentioned URLs to perform testing:

# 1:
- Post (Create New Post with Tags): Params (title:string, tags:array) 
http://localhost/lasadza/project_post_tag/api/service/v1/post

# 2:
- Get (Get Post by Tag Name): URL Param (name:string) 
http://localhost/lasadza/project_post_tag/api/service/v1/tag/{tag name}

# 3:
- Get (Get Post by Tag Name): URL Param (name:string) 
http://localhost/lasadza/project_post_tag/api/service/v1/tag/count/{tag name}


Thank-You!
Regards,
Jahangir Ali Khan