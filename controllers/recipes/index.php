<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$query = 'SELECT * FROM recipes';

if (isset($_GET['search']) || isset($_GET['select'])) {
    if ($_GET['select'] !== '') {
        $filter = "
            INNER JOIN recipes_tags rt ON recipes.id = rt.recipe_id
            INNER JOIN tags t ON rt.tag_id = t.id
            WHERE 
                t.name = :tag_name 
                AND recipes.title LIKE :title
        ";
        $query .= $filter;
        $recipes = $db->query($query, [
            'tag_name' => $_GET['select'],
            'title' => '%' . $_GET['search'] . '%'
        ])->findAll();

        dd($recipes);
    } else {
        $filter = "
            WHERE title LIKE :title
        ";
        $query .= $filter;

        $recipes = $db->query($query, [
            'title' => '%' . $_GET['search'] . '%',
        ])->findAll();

        dd($recipes);
    }
} else {
    $recipes = $db->query($query)->findAll();
}



view('recipes/index.view.php', [
    'heading' => 'Recetas',
    'recipes' => $recipes
]);
