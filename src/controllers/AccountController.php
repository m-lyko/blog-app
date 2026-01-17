<?php

require_once 'AppController.php';

class AccountController extends AppController {

    public function viewDetails() {

        // jeśli użytkownik nie jest zalogowany
        if(!isset($_SESSION['user_email'])) {
            header("Location: /login");
            exit();
        }

        // pobrane użytkownika z bazy
        $userRepository = UserRepository::getInstance();
        $user = $userRepository->getUser($_SESSION['user_email']);

        if(!$user) {
            session_destroy();
            header("Location: /login");
            exit();
        }

        // przygotowanie danych do widoku
        $data = [
            'name' => $user->getName(),
            'surname' => $user->getSurname(),
            'email' => $user->getEmail(),
            'avatar' => $user->getAvatar()
        ];

        // przekazujemy powyższą tablicę jako drugi arg
        return $this->render('view_account_details', $data);
    }

    public function changeUserData() {

        if(!isset($_SESSION['user_email'])) {
            header("Location: /login");
            exit();
        }
        
        $userRepository = UserRepository::getInstance();
        $user = $userRepository->getUser($_SESSION['user_email']);

        if(!$user) {
            header("Location: /login");
            exit();
        }

        if($this->isPost()) {
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['email'];
            $newPassword = $_POST['password'];

            if(empty($newPassword)) {
                $password = $user->getPassword();
            }
            else {
                $password = password_hash($newPassword, PASSWORD_DEFAULT);
            }

            $userRepository->editUserDetails($user->getID(), $name, $surname, $email, $password);

            if($email !== $_SESSION['user_email']) {
                $_SESSION['user_email'] = $email;
            }

            header("Location: /account");
            exit();
        }

        $data = [
            'name' => $user->getName(),
            'surname' => $user->getSurname(),
            'email' => $user->getEmail(),
            'avatar' => $user->getAvatar(),
        ];
        
        return $this->render('update_account_details', $data);
    }
}