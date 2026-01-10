<?php

class User {
    private $email;
    private $password;
    private $name;
    private $surname;
    private $avatar;
    private $role;

    public function __construct
    (
        string $email, 
        string $password, 
        string $name, 
        string $surname,,
        string $role = 'user',
        $avatar = null
    ) {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
        $this->avatar = $avatar;
    }

    // gettery

    public function getEmail(): string {
        return $this->email;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getSurname(): string {
        return $this->surname;
    }

    public function getRole(): string {
        return $this->role;
    }    

    public function getAvatar(): string {
        return $this->avatar;
    }    
}