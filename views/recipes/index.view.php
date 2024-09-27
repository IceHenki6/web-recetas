<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navbar.php') ?>
<main>
    <div class="container all-recipes">
        <h1 class="all-recipes__title">Recetas</h1>
        <div class="all-recipes__filter">
            <form action="/recipes" method="GET">
                <div class="filter-search__container">
                    <span class="material-symbols-outlined">
                        search
                    </span>
                    <input type="text" name="search" id="search" placeholder="Buscar...">
                </div>

                <select class="select-box" name="select">
                    <option value="" selected>--Selecciona una categoria--</option>
                    <option value="asado">asado</option>
                    <option value="carne">carne</option>
                    <option value="parrilla">parrilla</option>
                </select>
                <button class="primary-button" type="submit">Buscar</button>
            </form>
        </div>

        <div class="recipes-list">
            <?php foreach ($recipes as $recipe) : ?>
                <div class="recipe-card">
                    <img class="recipe-card__image" src="<?= $recipe['image_path'] ?>" alt="imagen representativa de un <?= $recipe['title'] ?>">
                    <a class="recipe-card__title" href="/recipe?id=<?= $recipe['id'] ?>"><?= htmlspecialchars($recipe['title']) ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
<?php require base_path('views/partials/foot.php') ?>