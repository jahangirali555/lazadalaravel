<?php

class PostSeeder extends Seeder {

    public function run()
    {
        DB::table('posts')->delete();

        Post::create(array(
            'id' => 1,
            'title' => 'Post About HTML/CSS',
        ));

        Post::create(array(
            'id' => 2,
            'title' => 'Post About PHP',
        
        ));

        Post::create(array(
            'id' => 3,
            'title' => 'Post About PHP/MySQL',

        ));

        Post::create(array(
            'id' => 4,
            'title' => 'Post About MongoDB',

        ));

        Post::create(array(
            'id' => 5,
            'title' => 'Post About jQuery',

        ));
    }

}