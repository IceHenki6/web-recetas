<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$recipe = $db->query("SELECT * FROM recipes WHERE id = :id", [
    'id' => $_POST['id']
  ])->findOrFail();
  
authorize($recipe['user_id'] === $currentUserId);

$db->query('DELETE FROM recipes WHERE id = :id', [
    'id' => $_POST['id']
]);

header('location: /recipes');
exit();