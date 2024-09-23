<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];


$form = LoginForm::validate([
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

$signedIn = (new Authenticator)->attempt($email, $password);

if (!$signedIn) {
    $form->error('email', 'No matching account found for these credentials')->throw();
}

redirect('/');