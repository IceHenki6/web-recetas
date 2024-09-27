<?php require  base_path('views/partials/head.php') ?>

<main>
    <div class="container auth">
        <h1 class="auth-title">Iniciar Sesión</h1>

        <form class="auth-form" action="/session" method="POST">

            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" placeholder="email@email.com" required>
            <?php if (isset($errors['email'])) : ?>
                <p class="error-message"><?= $errors['email'] ?></p>
            <?php endif; ?><br><br>


            <label for="password">Contraseña</label><br>
            <input type="password" name="password" id="password" required>
            <?php if (isset($errors['password'])) : ?>
                <p class="error-message"><?= $errors['password'] ?></p>
            <?php endif; ?><br><br>


            <button class="primary-button" type="submit">Iniciar Sesión</button>
        </form>
    </div>
</main>
<?php require base_path('views/partials/foot.php') ?>