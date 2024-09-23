<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$recipe = $db->query('SELECT * FROM recipes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

view('recipes/edit.view.php', [
    'heading' => 'Edit Recipe',
    'errors' => [],
    'recipe' => $recipe
]);