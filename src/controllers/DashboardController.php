<?php

require_once 'AppController.php';

class DashboardController extends AppController {

    public function index() {

        // TODO pobrać elementy na dashboard
        // TODO prepare dataset, and display in HTML
        $posts = [
            [
                'id' => 1,
                'title' => 'Wypadek przy Filharmonii',
                'subtitle' => 'Stare miasto najgorzej!',
                'description' => 'Kiedy ostatnio byłam z moją koleżanką...',
                'imageUrlPath' => 'public/img/image3.jpg'
            ],
            [
                'id' => 2,
                'title' => 'Remont na Moście',
                'subtitle' => 'Utrudnienia w ruchu',
                'description' => 'Zarząd Dróg znowu ubiera nas w to...',
                'imageUrlPath' => 'public/img/image2.jpg'
            ],
            [
                'id' => 3,
                'title' => 'Wypadek przy Filharmonii',
                'subtitle' => 'Stare miasto najgorzej!',
                'description' => 'Kiedy ostatnio byłam z moją koleżanką...',
                'imageUrlPath' => 'public/img/image1.jpg'
            ],
            [
                'id' => 4,
                'title' => 'Wypadek przy Filharmonii',
                'subtitle' => 'Stare miasto najgorzej!',
                'description' => 'Kiedy ostatnio byłam z moją koleżanką...',
                'imageUrlPath' => 'public/img/image1.jpg'
            ],
            [
                'id' => 5,
                'title' => 'Wypadek przy Filharmonii',
                'subtitle' => 'Stare miasto najgorzej!',
                'description' => 'Kiedy ostatnio byłam z moją koleżanką...',
                'imageUrlPath' => 'public/img/image2.jpg'
            ],
            [
                'id' => 6,
                'title' => 'Wypadek przy Filharmonii',
                'subtitle' => 'Stare miasto najgorzej!',
                'description' => 'Kiedy ostatnio byłam z moją koleżanką...',
                'imageUrlPath' => 'public/img/image3.jpg'
            ],                                                
        ];

        return $this->render("dashboard", ['posts' => $posts]);
    }
}