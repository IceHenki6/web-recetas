<?php require base_path('views/partials/head.php') ?>

    <main>
        <div class="">
            <h1>Recetas</h1>

            <ul>
                <?php foreach($recipes as $recipe) : ?>
                    <li>
                        <a href="/recipe?id=<?= $recipe['id']?>"><?= htmlspecialchars($recipe['title'])?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </main>
<?php require base_path('views/partials/foot.php') ?>