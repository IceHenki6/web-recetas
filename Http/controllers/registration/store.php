<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;


$db = App::resolve(Database::class);

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];

if (! Validator::string($name, 2, 255)) {
    $errors['name'] = 'Por favor, ingrese un nombre valido.';
}

$errors = [];
if (! Validator::email($email)) {
    $errors['email'] = 'Por favor, ingrese una dirección de correo electrónico válida.';
}

if (! Validator::string($password, 8, 255)) {
    $errors['password'] = 'Por favor, ingrese una contraseña de más de 8 caracteres.';
}


if (! empty($errors)) {
    return view('registration/create.view.php', [
        'errors' => $errors
    ]);
}

//check if user already exists
$result = $db->query('SELECT * FROM users WHERE email = :email', [
    'email' => $email
])->find();

//if yes, redirect to a login page
if ($result) {
    redirect('/login');
    exit();
} else {
    $db->query('INSERT INTO users(username, email, password) VALUES(:username, :email, :password)', [
        'username' => $name,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_BCRYPT)
    ]);

    (new Authenticator)->login([
        'email' => $email
    ]);

    header('location: /');
    exit();
}
