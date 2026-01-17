<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Post.php';

class PostRepository extends Repository {

    private static $instance = null;

    private function __construct()
    {
        parent::__construct();
    }

    public static function getInstance(){

        if(self::$instance == null){
            self::$instance = new PostRepository();
        }
        return self::$instance;
    }

    public function getPost(int $id): ?Post
    {
        $query = $this->database->connect()->prepare(
            '
            SELECT * FROM v_posts_details   
            WHERE
                id_posts = :id
           '                
        );

        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

        $post = $query->fetch(PDO::FETCH_ASSOC);

        if($post == false) {
            return null;
        }

        return new Post(
            $post['id_posts'],
            $post['title'],
            $post['description'],
            $post['avatar'],
            $post['name'],
            $post['surname']
        );
    }

    public function addPost(Post $post, int $authorID): void
    {
        $date = new DateTime();
        $query = $this->database->connect()->prepare(
            'INSERT INTO posts (title, description, created_at, author)
            values (?, ?, ?, ?)'
        );

        // dodać dodawania autora posta

        $query->execute(
            [
                $post->getTitle(),
                $post->getDescription(),
                $date->format('Y-m-d H:i:s'),
                $authorID
            ]
        );
    }

    public function getPosts(): array
    {
        $result = [];

        $query = $this->database->connect()->prepare(
            '
            SELECT * FROM v_posts_details
            '        
        );

        $query->execute();
        $posts = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($posts as $post) {
            $result[] = new Post(
                $post['id_posts'],
                $post['title'],
                $post['description'],
                $post['avatar'],
                $post['name'],
                $post['surname']
            );
        }

        return $result;
    }

    public function getPostByContent(string $searchString): array
    {
        $searchString = '%' . strtolower($searchString) . '%';

        $query = $this->database->connect()->prepare(
            'SELECT * FROM v_posts_details 
            WHERE LOWER(title) LIKE :search
            OR LOWER(description) LIKE :search
            OR LOWER(name) LIKE :search'
        );

        $query->bindParam(':search', $searchString, PDO::PARAM_STR);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
}