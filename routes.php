<?php

$router->get('/', 'index.php');
$router->get('/about', 'about.php');

$router->get('/register', 'registration/create.php')->only('guest');
$router->post('/register', 'registration/store.php')->only('guest');

$router->get('/login', 'session/create.php')->only('guest');
$router->post('/session', 'session/store.php')->only('guest');
$router->delete('/session', 'session/destroy.php')->only('auth');

$router->get('/recipes', 'recipes/index.php');
$router->get('/recipes/create', 'recipes/create.php')->only('auth');
$router->post('/recipes', 'recipes/store.php')->only('auth');
$router->get('/recipe', 'recipes/show.php');
$router->get('/recipe/edit', 'recipes/edit.php')->only('auth');
$router->patch('/recipe', 'recipes/update.php')->only('auth');
$router->delete('/recipe', 'destroy.php')->only('auth');
