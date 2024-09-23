<?php require  base_path('views/partials/head.php') ?>

<main>
    <div class="">
        <h1>Iniciar Sesión</h1>

        <form action="/session" method="POST">

            <label for="email">Email</label><br>
            <input type="email" name="email" id="email"><br><br>

            <label for="password">Contraseña</label><br>
            <input type="password" name="password" id="password"><br><br>

            <button type="submit">Iniciar Sesión</button>
        </form>
    </div>
</main>
<?php require base_path('views/partials/foot.php') ?>