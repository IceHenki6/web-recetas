<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$categories = $db->query('SELECT * FROM categories')->findAll();
$difficulties = $db->query('SELECT * FROM difficulty')->findAll();
$durations = $db->query('SELECT * FROM duration')->findAll();


view('recipes/create.view.php', [
    'heading' => 'Crear Nueva Receta',
    'errors' => [],
    'categories' => $categories,
    'difficulties' => $difficulties,
    'durations' => $durations
]);