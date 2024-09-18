<?php require  base_path('views/partials/head.php') ?>

    <main>
        <div class="">
            <h1>Crear receta</h1>

            <form action="/recipe" method="POST">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $recipe['id']?>">

                <label for="title">Title</label><br>
                <input type="text" name="title" id="name" value="<?= $recipe['title']?>"><br><br>

                <label for="title">Receta</label><br>
                <textarea name="body" id="body" rows="3"><?= $recipe['body']?></textarea><br><br>

                <label for="tags">Etiquetas: separaradas por comas ","</label>
                <input type="text" name="tags" id="tags" placeholder="parrilla, asado, carne">
                <button type="submit">Editar</button>
            </form>
        </div>
    </main>
<?php require base_path('views/partials/foot.php') ?>