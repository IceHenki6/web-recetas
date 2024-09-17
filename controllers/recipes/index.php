<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$recipes = $db->query("SELECT * FROM recipes WHERE user_id = 1")-> findAll();

view('recipes/index.view.php', [
    'heading' => 'Recetas',
    'recipes' => $recipes
]);