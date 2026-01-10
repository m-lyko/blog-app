<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';


class SecurityController extends AppController {

    public function login() {

        // Sprawdzamy, czy żądanie jest metodą GET
        // czyli czy użytkownik otworzył stronę logowania
        if($this->isGet()){
            // zwracamy mu widok formularza logowania i kończymy działanie metody
            return $this->render("login");
            //$this->render("login", ["name"=> "Jan"]);
        }

        // jeśli nie spełnia warunku this->isGet()
        // to poniżej mamy kod dla $this->isPost()

        // Pobieramy dane z tablicy $_POST i przypisujemy do zmiennych
        // ?? '' jeśli są puste to przypisujemy pusty ciąg znaków
        $email = $_POST["email"] ?? '';
        $password = $_POST["password"] ?? '';
        
        $userRepository = new UserRepository();
        
        // szukamy użytkownika w bazie po emailu
        $user = $userRepository->getUser($email);

        // sprawdzamy, czy użytkownik istnieje
        // sprawdzamy zgodność hasła
            // TODO funkcja hashująca
        if(!$user || $user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Nieprawidłowy login lub hasło.']]);
        }

        // zapisujemy użytkownika w sesji
        $_SESSION['user'] = $user->getEmail();

        // przekierowanie na dashboard
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/dashboard");
    }

    public function register() {
        
        // jeśli użytkownik pobiera stronę GET, wtedy od razu renderujemy
        if(!$this->isPost()){
            return $this->render('register');
        }

        // pobranie danych z formularza
        $email = $_POST['email'] ?? '';
        $confirmedEmail = $_POST['confirmedEmail'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmedPassword = $_POST['confirmedPassword'] ?? '';
        $name = $_POST['name'] ?? '';
        $surname = $_POST['surname'] ?? '';

        //walidacja e-mail
        if($email !== $confirmedEmail) {
            return $this->render('register', ['messages' => ['Podane adresy e-mail nie są takie same.']]);
        }

        //walidacja haseł
        if($password !== $confirmedPassword) {
            return $this->render('register', ['messages' => ['Hasła muszą być identyczne!']]);
        }

        // TODO try catch email już jest w bazie
        $userRepository = new UserRepository();
        
        $user = new User($email, $password, $name, $surname);

        $userRepository->addUser($user);

        return $this->render("login", ["message" => "Zarejestrowano uzytkownika pomyślnie."]);
    }

    public function registered() {
        return $this->render("registered");
    }
}