<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];
    
    $tags = trim($_POST['tags']);
    $tags = explode(',', $tags);
    $tags = array_map('trim', $tags);
    $tags = array_map('strtolower', $tags);

    //dd($tags);

    if (! Validator::string($_POST['body'], 1, 5000)) {
        $errors['body'] = 'A body of no more than 5000 characters is required';
    }

    if(! Validator::string($_POST['title'], 1, 255)) {
        $errors['title'] = 'A title of no more than 255 characters is required';
    }

    if(! Validator::tags($tags, 10)) {
        $errors['tags'] = 'A maximum number of tags allowed is 10';
    }

    if (!empty($errors)) {
        return view("recipes/create.view.php", [
            'heading' => 'Create Recipe',
            'errors' => $errors
        ]);
    }

    $recipeId = $db->query('INSERT INTO recipes(title, body, user_id) VALUES(:title, :body, :user_id)', [
        'title' => $_POST['title'],
        'body' => $_POST['body'],
        'user_id' => 1
    ])->connection->lastInsertId();


    //loop over tags and check if they already exist, if not, add them to the tags table
    foreach ($tags as $tag) {
        $tagFound = $db->query('SELECT * FROM tags WHERE name = :name', [
            'name' => $tag
        ])->find();

        if (! $tagFound) {
            $tagId = $db->query('INSERT INTO tags (name) VALUES(:name)', [
                'name' => $tag
            ])->connection->lastInsertId();
        }
        
        
        //link tag to recipe
        $db->query('INSERT INTO recipes_tags (recipe_id, tag_id) VALUES(:recipe_id, :tag_id)', [
            'recipe_id' => $recipeId,
            'tag_id' => $tagId ?? $tagFound['id']
        ]);
    }

    header('location: /recipes');

    die();
}