<?php

require_once 'AppController.php';

class DetailsController extends AppController {

    public function index(){

        return $this->render("details");
    }

}