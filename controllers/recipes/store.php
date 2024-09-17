<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    if (! Validator::string($_POST['body'], 1, 5000)) {
        $errors['body'] = 'A body of no more than 5000 characters is required';
    }

    if(! Validator::string($_POST['title'], 1, 255)) {
        $errors['title'] = 'A title of no more than 255 characters is required';
    }

    if (!empty($errors)) {
        return view("recipes/create.view.php", [
            'heading' => 'Create Recipe',
            'errors' => $errors
        ]);
    }

    $db->query('INSERT INTO recipes(title, body, user_id) VALUES(:title, :body, :user_id)', [
        'title' => $_POST['title'],
        'body' => $_POST['body'],
        'user_id' => 1
    ]);
    header('location: /recipes');

    die();
}