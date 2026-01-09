<?php

require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/DashboardController.php';
require_once 'src/controllers/DetailsController.php';
require_once 'src/controllers/AccountController.php';

class Routing {

    // Tablica konfiguracji: mapuje adres URL (np. 'login') na konkretną klasę i metodę
    public static $routes = [
        'login' => [
            'controller' => "SecurityController",
            'action' => "login"
        ],
        'register' => [
            'controller' => "SecurityController",
            'action' => "register"
        ],
        'registered' => [
            'controller' => "SecurityController",
            'action' => "registered"
        ],
        'dashboard' => [
            'controller' => "DashboardController",
            'action' => "index"
        ],
        'details' => [
            'controller' => "DetailsController",
            'action' => "index"
        ],
        'account' => [
            'controller' => "AccountController",
            'action' => "viewDetails"
        ]
    ];

    public static function run(string $path){
    
    //TODO na podstawie sciezki sprawdzamy jaki HTML zwrocic
    switch($path) {
        case 'login':
        case 'register':
        case 'registered':
        case 'dashboard':
        case 'details':
        case 'account':
            // Pobieramy nazwę klasy z tablicy $routes (np. "SecurityController")
            // Tworzymy nowy obiekt tej klasy (new SecurityController)
            $controller = new Routing::$routes[$path]['controller'];
            // Pobieramy nazwę metody do uruchomienia (np. "login")
            $action = Routing::$routes[$path]['action'];
            // Wywołujemy tę metodę na stworzonym obiekcie (np. $controller->login())
            $controller->$action(); 
            break;
        default:
            include 'public/views/404.html';
            break;
    }
    }

}