<?php

namespace app\models;

class Post
{
    public function getAllPosts() {
        return [
            [
                'id' => '1',
                'name' => 'pinecone',
                'description' => 'i am cat'
            ],
            [
                'id' => '2',
                'name' => 'nathan',
                'description' => 'i love pinecone'
            ]
        ];
    }
}