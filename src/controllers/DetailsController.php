<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/PostRepository.php';

class DetailsController extends AppController {

    public function index(){

        if(!isset($_SESSION['user_email'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
            exit;
        }        

        $postRepository = new PostRepository();

        // pobranie id z parametru GET
        $id = $_GET['id'] ?? null;

        // jeśli nie ma id → dashboard
        if(!$id) {
            header("Location: /dashboard");
            exit();
        }

        $post = $postRepository->getPost($id);

        if(!$post) {
            $this->render("404");
            return;
        }

        // przekazanie obiektu post do widoku
        return $this->render("details", ['post' => $post]);
    }

}