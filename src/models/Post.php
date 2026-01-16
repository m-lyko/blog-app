<?php

class Post {

    private $id;
    private $title;
    private $description;
    private $avatarPath; 
    private $authorName;
    private $authorSurname;

    public function __construct($id, $title, $description, $avatarPath, $name, $surname)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->avatarPath = $avatarPath;
        $this->authorName = $name;
        $this->authorSurname = $surname;
    }

    public function getID() {
        return $this->id;
    }    

    public function getTitle() {
        return $this->title;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getShortDescription()
    {
        $text = $this->description;
        $limit=12;

        $words = explode(' ', $text);

        if(count($words) > $limit) {
            return implode(' ', array_slice($words, 0, $limit)) . '...';
        }

        return $text;
    }

    public function getAvatarPath()
    {
        if (!$this->avatarPath || $this->avatarPath === 'NULL') {
            return '/public/img/users/default_avatar.svg';
        }
        return $this->avatarPath;
    }

    public function getAuthorName() {
        return $this->authorName;
    }

    public function getAuthorSurname() {
        return $this->authorSurname;
    }
}