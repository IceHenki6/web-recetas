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

                <select class="select-box" name="select-category">
                    <option value="" selected>--Selecciona una categoria--</option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['name'] ?>"><?= $category['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <select class="select-box" name="select-difficulty">
                    <option value="" selected>--Selecciona una dificultad--</option>
                    <?php foreach ($difficulties as $difficulty) : ?>
                        <option value="<?= $dificulty['name'] ?>"><?= $dificulty['name'] ?></option>
                    <?php endforeach; ?>
                </select>

                <select class="select-box" name="select-duration">
                    <option value="" selected>--Selecciona una duración--</option>
                    <?php foreach ($durations as $duration) : ?>
                        <option value="<?= $duration['name'] ?>"><?= $duration['name'] ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="primary-button" type="submit">Buscar</button>
            </form>
        </div>

        <div class="recipes-list">
            <?php foreach ($recipes as $recipe) : ?>
                <div class="recipe-card">
                    <img
                        class="recipe-card__image"
                        src="<?= $recipe['image_path'] ?>"
                        alt="imagen representativa de un 
                        <?= $recipe['title'] ?>">
                    <a class="recipe-card__title" href="/recipe?id=<?= $recipe['id'] ?>"><?= htmlspecialchars($recipe['title']) ?></a>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>
<?php require base_path('views/partials/foot.php') ?>