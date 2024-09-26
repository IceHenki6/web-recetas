<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['user_id'];

$categories = $db->query('SELECT * FROM categories')->findAll();
$difficulties = $db->query('SELECT * FROM difficulty')->findAll();
$durations = $db->query('SELECT * FROM duration')->findAll();

$recipe = $db->query('SELECT * FROM recipes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($recipe['user_id'] === $currentUserId);

view('recipes/edit.view.php', [
    'heading' => 'Edit Recipe',
    'errors' => [],
    'recipe' => $recipe,
    'categories' => $categories,
    'difficulties' => $difficulties,
    'durations' => $durations
]);