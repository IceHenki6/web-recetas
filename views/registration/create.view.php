<?php require  base_path('views/partials/head.php') ?>

    <main>
        <div class="">
            <h1>Registrate</h1>

            <form action="/register" method="POST">
                <label for="name">Nombre</label><br>
                <input type="text" name="name" id="name"><br><br>
                
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email"><br><br>

                <label for="password">Contraseña</label><br>
                <input type="password" name="password" id="password"><br><br>

                <button type="submit">Registrarse</button>
            </form>
        </div>
    </main>
<?php require base_path('views/partials/foot.php') ?>