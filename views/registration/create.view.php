<?php require  base_path('views/partials/head.php') ?>

    <main>
        <div class="container auth">
            <h1 class="auth-title">Registrate</h1>

            <form class="auth-form" action="/register" method="POST">
                <label for="name">Nombre</label><br>
                <input type="text" name="name" id="name" placeholder="Nombre" required><br><br>
                
                <label for="email">Email</label><br>
                <input type="email" name="email" id="email" placeholder="email@email.com" required><br><br>

                <label for="password">Contraseña</label><br>
                <input type="password" name="password" id="password" required><br><br>

                <button class="primary-button" type="submit">Registrarse</button>
            </form>
        </div>
    </main>
<?php require base_path('views/partials/foot.php') ?>