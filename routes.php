<?php

$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');

$router->get('/recipes', 'controllers/recipes/index.php');
$router->get('/recipes/create', 'controllers/recipes/create.php');
$router->post('/recipes', 'controllers/recipes/store.php');
$router->get('/recipe', 'controllers/recipes/show.php');
$router->get('/recipe/edit', 'controllers/recipes/edit.php');
$router->patch('/recipe', 'controllers/recipes/update.php');
$router->delete('/recipe', 'controllers/recipes/destroy.php');
