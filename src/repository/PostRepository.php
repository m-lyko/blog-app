<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Post.php';

class PostRepository extends Repository {

    public function getPost(int $id): ?Post
    {
        $query = $this->database->connect()->prepare(
            'SELECT
                title,
                subtitle,
                description,
                avatar
            FROM public.posts WHERE id = :id'
        );

        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $post = $query->fetch(PDO::FETCH_ASSOC);

        if($post == false) {
            return null;
        }

        return new Post(
            $post['title'],
            $post['subtitle'],
            $post['description'],
            $post['avatar']
        );
    }

    public function addPost(Post $post): void
    {
        $date = new DateTime();
        $query = $this->database->connect()->prepare(
            'INSERT INTO posts (title, description, created_at)
            values (?, ?, ?)'
        );

        // dodać dodawania autora posta

        $query->execute(
            [
                $post->getTitle(),
                $post->getDescription(),
                // $post->getImage(),
                $date->format('Y-m-d H:i:s')
            ]
        );
    }

    public function getPosts(): array
    {
        $result = [];

        $query = $this->database->connect()->prepare(
            '
            SELECT
                p.title,
                p.subtitle,
                p.description,
                u.avatar
            FROM
                posts p
                LEFT JOIN users u ON p.author = u.id
            ORDER BY
                created_at DESC;    
            '        
        );

        $query->execute();
        $posts = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($posts as $post) {
            $result[] = new Post(
                $post['title'],
                $post['subtitle'],
                $post['description'],
                $post['avatar']
            );
        }

        return $result;
    }
}