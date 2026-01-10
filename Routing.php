<?php

require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/DashboardController.php';
require_once 'src/controllers/DetailsController.php';
require_once 'src/controllers/AccountController.php';

class Routing {
    
    // Tablica konfiguracji: mapuje adres URL (np. 'login') na konkretną klasę i metodę
    public static $routes = [
        'login' => [
            'controller' => SecurityController::class,
            'action' => "login"
        ],
        'register' => [
            'controller' => SecurityController::class,
            'action' => "register"
        ],
        'registered' => [
            'controller' => SecurityController::class,
            'action' => "registered"
        ],
        'dashboard' => [
            'controller' => DashboardController::class,
            'action' => "index"
        ],
        'details' => [
            'controller' => DetailsController::class,
            'action' => "index"
        ],
        'account' => [
            'controller' => AccountController::class,
            'action' => "viewDetails"
            ]
        ];
        

        public static function get(string $path, string $controllerAction): void {
            self::$routes[$path] = self::normalize($controllerAction);
        }
    
        public static function post(string $path, string $controllerAction): void {
            self::$routes[$path] = self::normalize($controllerAction);
        }    


        public static function normalize($controllerAction): array {
            if(is_array($controllerAction)) return $controllerAction;
            if(is_string($controllerAction) && str_contains($controllerAction, '@')) {
                [$c, $a] = explode('@', $controllerAction, 2);
                return ['controller' => $c, 'action' => $a];
            }
            return ['controller' => $controllerAction, 'action' => 'index'];
        }

        
        public static function run(string $path){
            
            $path = trim($path, '/');
            if($path === '') {
                $path = 'login';
            }
            
            if(!isset(self::$routes[$path])) {
            include 'public/views/404.html';
            return;
        }
        //TODO na podstawie sciezki sprawdzamy jaki HTML zwrocic
        $route = self::normalize(self::$routes[$path]);
        $controllerName = $route['controller'];
        $action         = $route['action'];

        $controller = new $controllerName();
        $controller->$action();
    }
}