<?php

require_once 'AppController.php';

class AccountController extends AppController {

    const MAX_FILE_SIZE = 1024 * 1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/img/users';

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

        require_once __DIR__ . '/../repository/PostRepository.php'; 
        
        $postRepository = PostRepository::getInstance();
        $postsCount = $postRepository->getPostsCountByUser($user->getID());        

        // przygotowanie danych do widoku
        $data = [
            'name' => $user->getName(),
            'surname' => $user->getSurname(),
            'email' => $user->getEmail(),
            'avatar' => $user->getAvatar(),
            'postsCount' => $postsCount
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


            $newEmail = $_POST['email'];
            $confirmedEmail = $_POST['confirmedEmail'];
            
            if(!empty($newEmail) && !empty($confirmedEmail)
                && $newEmail === $confirmedEmail) {
                $email = $newEmail;
            }
            else {
                $email = $user->getEmail();
            }
            
            $newPassword = $_POST['password'];
            $confirmedPassword = $_POST['confirmedPassword'];

            // obsługa zmiany hasła
            if(!empty($newPassword)
                && !empty($confirmedPassword)
                && $newPassword === $confirmedPassword
            ) {
                $password = password_hash($newPassword, PASSWORD_DEFAULT);
            }
            else {
                $password = $user->getPassword();
            }

            // obsługa zmiany zdjęcia profilowego
            $avatarPath = $user->getAvatar();

            if(isset($_FILES['avatar']) && is_uploaded_file($_FILES['avatar']['tmp_name'])) {

                $file = $_FILES['avatar'];
                
                // Walidacja
                if ($file['size'] > self::MAX_FILE_SIZE) {
                    return $this->render('update_account_details', ['messages' => ['Plik jest zbyt duży.']]);
                }            
                
                if(isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
                    return $this->render('update_account_details', ['messages' => ['Nieobsługiwany typ pliku']]);                
                }
                
                $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
                $targetFileName = 'user_' . $user->getID() . '.' . $extension;
                $targetPath = dirname(__DIR__) . '/../public/img/users/' . $targetFileName;
                
                if(move_uploaded_file($file['tmp_name'], $targetPath)) {
                    $avatarPath = 'public/img/users/' . $targetFileName;
                }
            }
             
            
            $userRepository->editUserDetails($user->getID(), $name, $surname, $email, $password, $avatarPath);

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