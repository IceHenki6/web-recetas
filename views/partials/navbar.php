<div class="container navbar">
    <div>
        <nav>
            <ul class="nav-list">
                <li class="<?= isUrl('/') ? 'nav-item nav-active' : 'nav-item' ?>"><a href="/">Inicio</a></li>
                <li class="<?= isUrl('/recipes') ? 'nav-item nav-active' : 'nav-item' ?>"><a href="/recipes">Recetas</a></li>
                <?php if ($_SESSION['user'] ?? false) : ?>
                    <li class="<?= isUrl('/recipes/create') ? 'nav-item nav-active' : 'nav-item' ?>"><a href="/recipes/create">Crear Receta</a></li>
                <?php endif; ?>
                <li class="<?= isUrl('/about') ? 'nav-item nav-active' : 'nav-item' ?>"><a href="/about">Sobre Nosotros</a></li>
            </ul>
        </nav>
    </div>

    <div class="navbar-auth">
        <?php if ($_SESSION['user'] ?? false) : ?>
            <p class="navbar-username"><?= $_SESSION['user']['username']?></p>
            <form action="/session" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <button class="secondary-button">Log Out</button>
            </form>
        <?php else : ?>
            <a href="/login" id="log-in">Iniciar Sesión</a>
            <a href="/register" class="primary-button">Registrarse</a>
        <?php endif; ?>
    </div>
</div>