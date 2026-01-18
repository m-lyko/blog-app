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



    public function getPostsCountByUser(int $user_id): int {

        $stmt = $this->database->connect()->prepare(
            '
            SELECT count(*) FROM posts WHERE author = :authorID
            '
        );

        $stmt->bindParam(':authorID', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        return (int) $stmt->fetchColumn();
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
            $post['surname'],
            (int)$post['author']
        );
    }



    public function addPost(Post $post, int $authorID): void
    {
        $date = new DateTime();
        $query = $this->database->connect()->prepare(
            'INSERT INTO posts (title, description, created_at, author)
            values (?, ?, ?, ?)'
        );

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
                $post['surname'],
                $post['author']
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


    
    public function deletePost(int $postID): void
    {
        $stmt =  $this->database->connect()->prepare(
            'DELETE FROM posts WHERE id_posts = :id'
        );
        $stmt->bindParam(':id', $postID, PDO::PARAM_INT);
        $stmt->execute();
    }




    public function updatePost(int $postID, string $title, string $description): void
    {
        $stmt = $this->database->connect()->prepare(
            'UPDATE posts SET title = ?, description = ? WHERE id_posts = ?'
        );
        $stmt->execute([$title, $description, $postID]);
    }
}