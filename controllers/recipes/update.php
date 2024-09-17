<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

$recipe = $db->query("SELECT * FROM recipes WHERE id = :id", [
    'id' => $_POST['id']
  ])->findOrFail();
  
authorize($recipe['user_id'] === $currentUserId);

$errors = [];

if (! Validator::string($_POST['body'], 1, 5000)) {
    $errors['body'] = 'A body of no more than 5000 characters is required';
}

if (! Validator::string($_POST['title'], 1, 255)) {
    $errors['title'] = 'A title of no more than 255 characters is required';
}

if (!empty($errors)) {
    return view("recipes/edit.view.php", [
        'heading' => 'Edit Recipe',
        'errors' => $errors,
        'recipe' => $recipe
    ]);
}

$db->query('UPDATE recipes SET title = :title, body = :body WHERE id = :id', [
    'title' => $_POST['title'],
    'body' => $_POST['body'],
    'id' => $_POST['id']
]);
header('location: /recipes');

die();
