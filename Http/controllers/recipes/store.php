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

    $imagePath = null;

    //dd($tags);

    if (! Validator::string($_POST['body'], 1, 5000)) {
        $errors['body'] = 'Necesita llenar el campo de la receta y no debe ser de mas de 5000 caracteres';
    }

    if(! Validator::string($_POST['title'], 1, 255)) {
        $errors['title'] = 'Un título de no más de 255 caracteres es requerido.';
    }

    if(! Validator::tags($tags, 10)) {
        $errors['tags'] = 'El número máximo de etiquetas permitido es de 10 etiquetas.';
    }

    // dd($_FILES['image']);

    if (! Validator::image($_FILES['image'])) {
        $errors['image'] = 'Ocurrió un error al subir la imagen.';
    }

    if (! Validator::imageSize($_FILES['image'])) {
        $errors['image'] = 'Límite máximo de tamaño de imagen superado, el tamaño máximo de la imagen debe ser de 2 mb.'; 
    }

    if (! Validator::imageType($_FILES['image'])) {
        $errors['image'] = 'Formato no permitido, el archivo subido debe ser una imagen.'; 
    }

    if (!empty($errors)) {
        return view("recipes/create.view.php", [
            'heading' => 'Crea tu Receta',
            'errors' => $errors
        ]);
    }

    //upload the image
    $targetDir = base_path('uploads');

    $targetFile = $targetDir . '/' . uniqid() . "_" . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        $imagePath = $targetFile;  
    } else {
        $errors['image'] = "Ha ocurrido un error al subir la imagen";
        return view("recipes/create.view.php", [
            'heading' => 'Crear tu Receta',
            'errors' => $errors
        ]);
    }



    $recipeId = $db->query('INSERT INTO recipes(title, body, user_id, image_path) VALUES(:title, :body, :user_id, :image_path)', [
        'title' => $_POST['title'],
        'body' => $_POST['body'],
        'user_id' => 1,
        'image_path' => $imagePath
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