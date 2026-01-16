<?php

require_once 'AppController.php';

class AccountController extends AppController {

    public function viewDetails() {

        // jeśli użytkownik nie jest zalogowany
        if(!isset($_SESSION['user_email'])) {
            header("Location: /login");
            exit();
        }

        // przygotowanie danych do widoku
        $data = [
            'name' => $_SESSION['user_name'],
            'surname' => $_SESSION['user_surname'],
            'email' => $_SESSION['user_email']
        ];

        // przekazujemy powyższą tablicę jako drugi arg
        return $this->render('view_account_details', $data);
    }
}