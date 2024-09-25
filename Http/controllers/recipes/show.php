<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$recipe = $db->query('SELECT * FROM recipes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

$category = $db->query('SELECT * FROM categories WHERE id = :id', [
    'id' => $recipe['category_id']
])->findOrFail();

$difficulty = $db->query('SELECT * FROM difficulty WHERE id = :id', [
    'id' => $recipe['difficulty_id']
])->findOrFail();

$duration = $db->query('SELECT * FROM duration WHERE id = :id', [
    'id' => $recipe['duration_id']
])->findOrFail();

view('recipes/show.view.php', [
    'heading' => $recipe['title'],
    'recipe' => $recipe,
    'category' => $category,
    'difficulty' => $difficulty,
    'duration' => $duration
]);