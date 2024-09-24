<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navbar.php') ?>
<main>
    <div class="">
        <h1>Recetas</h1>
        <form action="/recipes" method="GET">
            <label for="search">Buscar Recetas</label>
            <input type="text" name="search" id="search">
            <select name="select">
                <option value="" selected>--Selecciona una categoria--</option>
                <option value="asado">asado</option>
                <option value="carne">carne</option>
                <option value="parrilla">parrilla</option>
            </select>
            <button type="submit">Buscar</button>
        </form>
        <div class="container recipes-list">
            <?php foreach ($recipes as $recipe) : ?>
                <div class="recipe-card">
                    <img class="recipe-card__image" src="<?= $recipe['image_path']?>" alt="imagen representativa de un <?= $recipe['title']?>">
                    <a class="recipe-card__title" href="/recipe?id=<?= $recipe['id'] ?>"><?= htmlspecialchars($recipe['title']) ?></a>
                </div>
            <?php endforeach; ?>
            <div class="test-item"></div>
            <div class="test-item"></div>
            <div class="test-item"></div>
            <div class="test-item"></div>
            <div class="test-item"></div>
            <div class="test-item"></div>
        </div>
    </div>
</main>
<?php require base_path('views/partials/foot.php') ?>