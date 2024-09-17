<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$recipe = $db->query('SELECT * FROM recipes WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

view('recipes/show.view.php', [
    'heading' => $recipe['title'],
    'recipe' => $recipe
]);