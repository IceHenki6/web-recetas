<?php require  base_path('views/partials/head.php') ?>
<?php require  base_path('views/partials/navbar.php') ?>
<main>
    <div class="container show-recipe">
        <h1 class="show-recipe__title"><?= $recipe['title'] ?></h1>
        <div class="show-recipe-image-and-info">
            <img class="show-recipe__image" src="<?= $recipe['image_path'] ?>" alt="">
            <div class="info-container">
                <div class="info-items__container">
                    <div class="info-item">
                        <span class="material-symbols-outlined">
                            menu_book
                        </span>
                        <p><strong>Categoría: </strong><?= $category['name'] ?></p>
                    </div>

                    <div class="info-item">
                        <span class="material-symbols-outlined">
                            <span class="material-symbols-outlined">
                                local_dining
                            </span>
                        </span>
                        <p><strong>Dificultad: </strong><?= $difficulty['name'] ?></p>
                    </div>

                    <div class="info-item">
                        <span class="material-symbols-outlined">
                            timer
                        </span>
                        <p><strong>Duración: </strong><?= $duration['name'] ?></p>
                    </div>
                </div>
            </div>
        </div>



        <div class="show-recipe__body"><?= $recipe['body'] ?></div>
        <?php if ($_SESSION['user'] ?? false) : ?>
            <?php if (($_SESSION['user']['user_id'] === $recipe['user_id'])) : ?>
                <div class="show-recipe__controls">
                    <a class="secondary-button" href="/recipe/edit?id=<?= $recipe['id'] ?>">
                        <span class="material-symbols-outlined">
                            edit
                        </span>
                        Editar
                    </a>
                    <form action="/recipe" method="POST">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="id" value="<?= $recipe['id'] ?>">
                        <button class="primary-button" type="submit">
                            <span class="material-symbols-outlined">
                                delete
                            </span>
                            Borrar
                        </button>
                    </form>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</main>
<?php require base_path('views/partials/foot.php') ?>