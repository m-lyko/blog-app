<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Post.php';
require_once __DIR__.'/../repository/PostRepository.php';

class PostController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private $postRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository();
    }

    public function addPost()
    {

        // sprawdzenie, czy użytkownik jest zalogowany
        if(!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit;
        }        

        if(
            // czy żądanie jest przesłane metodą post
            $this->isPost()
            // // sprawdza czy w tablicy przesyłanych danych istnieje klucz o nazwie 'tmp_name'
            // && isset($_FILES['file']['tmp_name'])
            // // sprawdza czy plik pod ścieżką tymczasową jest przesłany przez http post
            // && is_uploaded_file($_FILES['file']['tmp_name'])
            // // walidacja danych przez metodę validate
            // && $this->validate($_FILES['file'])
        )
        {
            // walidacja danych wejściowych po stronie serwera
            $title = $_POST['title'];
            $description = $_POST['description'];

            if(empty($title) || empty($description)) {
                $this->messages[] = 'Tytuł i treść nie mogą być puste!';
                return $this->render('add_post', ['messages' => $this->messages]);
            }

            // move_uploaded_file(
            //     $_FILES['file']['tmp_name'],
            //     dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            // );

            // utworzenie nowego obiektu Post z danymi z formularza
            $post = new Post(
                null, // id generuje baza
                $_POST['title'], 
                $_POST['description'],
                null,
                null,
                null
            );

            $this->postRepository->addPost($post, $_SESSION['user_id']);
            // przekierowanie na dashboard
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/dashboard");
            exit;
            
            // return $this->render('posts', 
            //     [
            //         'messages' => $this->messages, 
            //         'posts' => $this->postRepository->getPosts()
            //     ]
            // );
        }

        // renderowanie widoku dodawania postu
        return $this->render('add_post', ['messages' => $this->messages]);
    }

    // private function validate(array $file): bool
    // {
    //     if($file['size'] > self::MAX_FILE_SIZE) {
    //         $this->messages[] = 'Zbyt duży plik.';
    //         return false;
    //     }

    //     if(
    //         !isset($file['type'])
    //         || !in_array($file['type'], self::SUPPORTED_TYPES)
    //     )
    //     {
    //         $this->messages[] = 'Zły typ pliku.';
    //         return false;
    //     }

    //     return true;
    // }
}