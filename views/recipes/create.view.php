<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navbar.php') ?>

<main>
    <div class="container create-recipe">
        <h1 class="create-recipe__title">Crear receta</h1>

        <form class="create-recipe__form" id="create-recipe__form" action="/recipes" method="POST" enctype="multipart/form-data">
            <div class="input-text__container">
                <label for="title">Título</label>
                <input type="text" name="title" id="name" placeholder="Ingresa un título" required>
            </div>



            <section class="select-containers">
                <div class="input-select__container">
                    <label for="category-selector">Seleccionar categoría: </label>
                    <select class="select-box" name="category-selector" id="category-selector" required>
                        <option value="" selected>--Selecciona una categoria--</option>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="input-select__container">
                    <label for="difficulty-selector">Seleccionar dificultad: </label>
                    <select class="select-box" name="difficulty-selector" id="difficulty-selector" required>
                        <option value="" selected>--Selecciona una dificultad--</option>
                        <?php foreach ($difficulties as $difficulty) : ?>
                            <option value="<?= $difficulty['id'] ?>"><?= $difficulty['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>



                <div class="input-select__container">
                    <label for="duration-selector">Seleccionar duración: </label>
                    <select class="select-box" name="duration-selector" id="duration-selector" required>
                        <option value="" selected>--Selecciona una duración--</option>
                        <?php foreach ($durations as $duration) : ?>
                            <option value="<?= $duration['id'] ?>"><?= $duration['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </section>

            <div class="recipe-body__container">
                <label for="body">Receta</label>
                <div id="editor"></div>
                <input type="hidden" name="body" id="body-content">
            </div>


            <div class="input-text__container">
                <label for="tags">Etiquetas: separaradas por comas ","</label>
                <input type="text" name="tags" id="tags" placeholder="parrilla, asado, carne">
            </div>


            <div class="input-image__container">
                <label for="image">Subir una Imagen</label>
                <input type="file" name="image" accept="image/*" required>
                <?php if (isset($errors['image'])) : ?>
                    <p class="text-red-500 text-xs mt-2"><?= $errors['image'] ?></p>
                <?php endif; ?>
            </div>

            <button class="primary-button" type="submit">Crear</button>
        </form>
    </div>
</main>
<?php require base_path('views/partials/foot.php') ?>