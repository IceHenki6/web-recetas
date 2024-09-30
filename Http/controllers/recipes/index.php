<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$categories = $db->query('SELECT * FROM categories')->findAll();
$difficulties = $db->query('SELECT * FROM difficulty')->findAll();
$durations = $db->query('SELECT * FROM duration')->findAll();

$query = "SELECT r.id, r.title, r.image_path, r.created_at, c.name AS category, d.name AS difficulty, dur.name AS duration
            FROM recipes r
            INNER JOIN difficulty d ON r.difficulty_id = d.id
            INNER JOIN duration dur ON r.duration_id = dur.id
            INNER JOIN categories c ON r.category_id = c.id
            WHERE 1 = 1";


if (isset($_GET['search'])) {
    $category = $_GET['select-category'];
    $difficulty = $_GET['select-difficulty'];
    $duration = $_GET['select-duration'];

    $params = [];

    //dd($category);
    if($category !== "") {
        $query .= " AND c.name = :category";
        $params[':category'] = $category;
    }

    if($difficulty !== "") {
        $query .= " AND d.name = :difficulty";
        $params[':difficulty'] = $difficulty;
    }

    if($duration !== "") {
        $query .= " AND dur.name = :duration";
        $params[':duration'] = $duration;
    }

    $recipes = $db->query($query, $params)->findAll();
} else {
    $recipes = $db->query($query)->findAll();
}



view('recipes/index.view.php', [
    'heading' => 'Recetas',
    'recipes' => $recipes,
    'categories' => $categories,
    'difficulties' => $difficulties,
    'durations' => $durations
]);
