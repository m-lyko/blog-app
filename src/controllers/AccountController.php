<?php

require_once 'AppController.php';

class AccountController extends AppController {

    public function viewDetails() {

        return $this->render('view_account_details');
    }
}