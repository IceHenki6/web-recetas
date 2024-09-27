<?php require('partials/head.php') ?>
<?php require base_path('views/partials/navbar.php') ?>


<main>
    <div class="container landing">
        <div class="hero-container">
            <div class="hero">
                <h1 class="hero-title">Bienvenido a Recetas al Plato</h1>
                <p class="hero-text">¿Listo para embarcarte en un viaje culinario? En <span class="highlight-name">Recetas al Plato,</span> te ofrecemos una colección de recetas deliciosas, fáciles y llenas de sabor para que disfrutes en casa. Ya seas un chef experimentado o estés dando tus primeros pasos en la cocina, encontrarás inspiración para cada ocasión.</p>
                <a href="/recipes" class="primary-button" id="hero-button">Explorar Recetas</a>
            </div>

            <div class="hero-images">
                <div class="hero-img__container one">
                    <img src="/images/food-image1.jpg" class="hero-img" alt="">
                </div>
                <div class="hero-img__container two">
                    <img src="/images/food-image2.jpg" class="hero-img" alt="">
                </div>
                <div class="hero-img__container three">
                    <img src="/images/food-image3.jpg" class="hero-img" alt="">
                </div>
            </div>
        </div>
    </div>
</main>
<?php require('partials/foot.php') ?>