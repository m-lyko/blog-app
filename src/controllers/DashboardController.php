<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repository/PostRepository.php';

class DashboardController extends AppController {

    private $postRepository;

    public function __construct()
    {
        $this->postRepository = new PostRepository;
    }

    public function index() {

        // sprawdzenie, czy użytkownik jest zalogowany
        if(!isset($_SESSION['user_email'])) {
            // jeśli nie → odsyłamy do logowania
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit; // zatrzymanie skryptu
        }

        $posts = $this->postRepository->getPosts();

        $this->render("dashboard", ['posts' => $posts]);
    }
}