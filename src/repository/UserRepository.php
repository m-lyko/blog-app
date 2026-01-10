<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class UserRepository extends Repository {

    public function addUser(User $user) 
    {
        // znaki ? to placeholdery (ważna kolejność!)
        $query = $this->database->connect()->prepare(
            'INSERT INTO users (name, surname, email, password)
            VALUES (?, ?, ?, ?)'
        );

        // wykonanie zapytania
        $query->execute(
            [
                $user->getName(),
                $user->getSurname(),
                $user->getEmail(),
                $user->getPassword()
            ]
        );
    }

    public function getUser(string $email): ?User 
    {
        // wywołanie funkcji prepare() - "przygotuj, ale jeszcze nie wywołuj"
        $query = $this->database->connect()->prepare(
            '
            SELECT * FROM public.users WHERE email = :email;
            '
        );

        // w miejscu gdize jest znacznik email w zapytaniu wstaw wartość z $email
        // PDO::PARAM_STR - informacja dla bazy, że przesyłane dane są tekstem
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        
        // wykonanie zapytanie
        $query->execute();

        // pobranie wyniku jako tablicy asocjacyjnej
        $user = $query->fetch(PDO::FETCH_ASSOC);

        // jeśli użytkownik nie istnieje → null
        if($user == false){
            return null;
        }

        // tworzymy obiekt User i uzupełniamy danymi z bazy
        return new User(
            $user['email'],
            $user['password'],
            $user['name'],
            $user['surname']
        );
    }

    // public function getAllUsers(): ?
    // dokończyć
}