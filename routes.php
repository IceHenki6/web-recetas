<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');

$router->get('/register', 'registration/create.php');
$router->post('/register', 'registration/store.php');

$router->get('/login', 'session/create.php');
$router->post('/session', 'session/store.php');
$router->delete('/session', 'session/destroy.php');

$router->get('/recipes', 'recipes/index.php');
$router->get('/recipes/create', 'recipes/create.php');
$router->post('/recipes', 'recipes/store.php');
$router->get('/recipe', 'recipes/show.php');
$router->get('/recipe/edit', 'recipes/edit.php');
$router->patch('/recipe', 'recipes/update.php');
$router->delete('/recipe', 'destroy.php');
