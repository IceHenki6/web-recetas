<div class="container navbar">
    <div>
        <nav>

            <ul class="nav-list">
                <li class="<?= isUrl('/') ? 'nav-item nav-active' : 'nav-item'?>"><a href="/">Inicio</a></li>
                <li class="<?= isUrl('/recipes') ? 'nav-item nav-active' : 'nav-item'?>"><a href="/recipes">Recetas</a></li>
                <li class="<?= isUrl('/my-recipes') ? 'nav-item nav-active' : 'nav-item'?>"><a href="#">Mis Recetas</a></li>
                <li class="<?= isUrl('/about') ? 'nav-item nav-active' : 'nav-item'?>"><a href="/about">Sobre Nosotros</a></li>
            </ul>
        </nav>
    </div>

    <div class="navbar-auth">
        <a href="/login" id="log-in">Iniciar Sesión</a>
        <a href="/register" class="primary-button">Registrarse</a>
    </div>
</div>