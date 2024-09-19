<?php require base_path('views/partials/head.php') ?>

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
        <ul>
            <?php foreach ($recipes as $recipe) : ?>
                <li>
                    <a href="/recipe?id=<?= $recipe['id'] ?>"><?= htmlspecialchars($recipe['title']) ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</main>
<?php require base_path('views/partials/foot.php') ?>