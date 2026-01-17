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
        $this->postRepository = PostRepository::getInstance();
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
            
        }

        // renderowanie widoku dodawania postu
        return $this->render('add_post', ['messages' => $this->messages]);
    }

    

    public function search()
    {
        // sprawdzenie rodzaju przesyłanych danych
        $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        // obsługa zapytań tylko w formacie JSON
        if($contentType === 'application/json') {
         
            // pobranie surowych danych
            // json nie jest automatycznie (w przeciwieństwie do formularzy $_POST)
            $content = trim(file_get_contents("php://input"));

            // dekodowanie JSONA na tablicę asocjacyjną PHP
            $decoded = json_decode($content, true);

            // ustawienie nagłówka odpowiedzi na JSON
            header('Content-type: application/json');

            // ustawienie kodu statusu HTTP 200
            http_response_code(200);

            // dane pozyskane z przekazania klucza search do metody z repozytorium
            // zamiana wyniku na JSON
            $posts = $this->postRepository->getPostByContent($decoded['search']);

            // foreach($posts as &$post) {
            //     $post['description'] = Post::shortenDescription($post['description']);
            // }

            echo json_encode($posts);
        }
    }

}