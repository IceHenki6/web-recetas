<?php require  base_path('views/partials/head.php') ?>

<main>
    <div class="">
        <h1>Crear receta</h1>

        <form action="/recipes" method="POST" enctype="multipart/form-data">
            <label for="title">Title</label><br>
            <input type="text" name="title" id="name"><br><br>
            
            <label for="category-selector">Seleccionar categoría</label>
            <select name="category-selector" id="category-selector">
                <option value="" selected>--Selecciona una categoria--</option>
                <?php foreach ($categories as $category) : ?>
                    <option value="<?=$category['id']?>"><?=$category['name']?></option>
                <?php endforeach; ?>
            </select>

            <label for="difficulty-selector">Seleccionar dificultad</label>
            <select name="difficulty-selector" id="difficulty-selector">
                <option value="" selected>--Selecciona una dificultad--</option>
                <?php foreach ($difficulties as $difficulty) : ?>
                    <option value="<?=$difficulty['id']?>"><?=$difficulty['name']?></option>
                <?php endforeach; ?>
            </select>


            <label for="duration-selector">Seleccionar duración</label>
            <select name="duration-selector" id="duration-selector">
                <option value="" selected>--Selecciona una duración--</option>
                <?php foreach ($durations as $duration) : ?>
                    <option value="<?=$duration['id']?>"><?=$duration['name']?></option>
                <?php endforeach; ?>
            </select>

            <label for="title">Receta</label><br>
            <textarea name="body" id="body" rows="3"></textarea><br><br>

            
            <label for="tags">Etiquetas: separaradas por comas ","</label>
            <input type="text" name="tags" id="tags" placeholder="parrilla, asado, carne">

            <label for="image">Subir una Imagen</label>
            <input type="file" name="image" accept="image/*">
            <?php if (isset($errors['image'])) : ?>
                <p class="text-red-500 text-xs mt-2"><?= $errors['image'] ?></p>
            <?php endif; ?>

            <button type="submit">Crear</button>
        </form>
    </div>
</main>
<?php require base_path('views/partials/foot.php') ?>