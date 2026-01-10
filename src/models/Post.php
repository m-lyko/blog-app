<?php

class Post {

    private $title;
    private $subtitle;
    private $description;
    private $avatarPath;

    public function __construct($title, $subtitle, $description, $avatarPath)
    {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->description = $description;
        $this->avatarPath = $avatarPath;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getSubtitle() 
    {
        return $this->subtitle;    
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getAvatarPath()
    {
        if (!$this->avatarPath || $this->avatarPath === 'NULL') {
            return '/public/img/users/user.png';
        }
        return $this->avatarPath;
    }
}