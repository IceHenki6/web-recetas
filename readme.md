# Recetas al Plato

"Recetas al Plato" es una página web de recetas simple que permite a usuarios explorar recetas creadas por otros usuarios, asi como registrarse en el sitio y crear sus propias recetas utilizando un rich text editor para dar el formato deseado al texto de las mismas. Al crear una receta el usuario puede asignarle una categoría, dificultad, y un tiempo estimado de duración para la preparación, todo esto luego puede ser utilizado por otros usuarios para buscar y filtrar las recetas.

## 1. Tecnologías utilizadas:
- PHP 8.3
- Server: Apache (XAMPP)
- DB: MariaDb (XAMPP)
- Bibliotecas:
    - QuillJs rich text editor

## 2. Funcionalidades del proyecto
### 2.1 Administración de recetas
Los usuarios registrados y auntenticados pueden realizar las operaciones de crear, editar y eliminar recetas (CRUD). Las recetas consisten de un título, un cuerpo (la receta propiamente dicha), categoría, dificultad, y duración. Estos tres últimos atributos pueden ser seleccionados por el usuario mediante opciones ya provistas en la página de creación de recetas. Además el usuario puede subir una imagen representativa de la receta.
### 2.2 Autenticación y autorización
Los usuarios pueden registrarse e iniciar sesión al sitio web, los usuarios pueden editar o eliminar únicamente las recetas creadas por ellos mismos.
### 2.3 Búsqueda y filtrado de recetas
En la página que muestra todas las recetas, los usuarios pueden, mediante una barra de búsqueda y menúes "dropdown", buscar recetas por nombre, categoría, dificultad, y duración.
### 2.4 Rich text editor
Los usuarios disponen de un editor de texto incorporado (QuillJs) que les permite dar formato al texto de la receta.

![](/public/images/homepage.png)
![](/public/images/recipes.png)
![](/public/images/create-recipe.png)

## 3. Instalación
### 3.1 Clonar repositorio
```bash
git clone https://github.com/IceHenki6/web-recetas.git
cd web-recetas
```
### 3.1 Configurar la base de datos en MySql/MariaDb
Utiliza tu herramienta para gestionar bases de datos favorita para importar el archivo SQL o utiliza los siguientes comandos:
```SQL
CREATE DATABASE recipes-website;
```
```bash
mysql -u youruser -p blog_database < database/recipes-website.sql
```
### 3.2 Configura el proyecto
Haz una copia del archivo config-example.php, cambiale el nombre a config.php e ingresa las credenciales
```php
<?php
return [
    'database' => [
        'host' => 'localhost',
        'port' => 3306, //número del puerto de MySql/MariaDb
        'dbname' => 'recipes-website',
        'charset' => 'utf8mb4'
    ]
];
//Si tu base de datos posee nombre de usuario y contraseña debe agregarse en el archivo config.php
```

### 3.3 Ejecuta el proyecto
Ejecuta el proyecto de la manera apropiada a tu entorno de desarrollo o bien con el comando
```bash
php -S localhost:8000 -t public 
```

## 4 Estructura de la base de datos
- recipes: Contiene información de las recetas
- users: Contiene información de los usuarios
- categories: categorías de las recetas (desayunos, almuerzos, cenas, etc...)
- difficulty: dificultad de la receta (baja, media, alta)
- duration: duraciones aproximadas para la preparación de la receta (menos de 30 minutos, 30-60 minutos, más de 60 minutos)

### 4.1 Estructura de la tabla recipes:
```SQL
CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `body` longtext NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `difficulty_id` int(11) NOT NULL,
  `duration_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
)
```
### 4.2 Estructura de la tabla users:
```SQL
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
)
```
### 4.3 Estructura de la tabla categories:
```SQL
CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) 
```
### 4.5 Estructura de la tabla difficulty:
```SQL
CREATE TABLE `difficulty` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
)
```
### 4.6 Estructura de la tabla duration:
```SQL
CREATE TABLE `duration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
)
```

## 5 Futuras mejoras
- **Etiquetas**: Durante el desarrollo del proyecto se implementó parcialmente el uso de etiquetas para las recetas, el usuario podía agregar etiquetas que considere adecuadas para la misma, para que luego otros usuarios puedan buscar recetas mediante el uso de etiquetas. En la base de datos se implementaron las tablas correspondientes para funcionalidad. La funcionalidad de las etiquetas fue descartada debido a que de momento es considerada una complejidad innecesaria, pero más adelante se podría volver a implementar de una manera más eficiente y que mejore la experiencia de usuario
- **Panel de administrador**: Un panel que permita a un usuario administrador agregar, editar, y eliminar tanto recetas como usuarios
- **Perfiles de usuario**: Permitir a los usuarios agregar una foto de perfil y poder editar su información de perfil (nombre, e-mail)
- **Califiación de recetas**: Permitir a los usuarios registrados dar una calificación a las recetas



