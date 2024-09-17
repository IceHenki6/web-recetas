<?php require  base_path('views/partials/head.php') ?>

    <main>
        <div class="">
            <h1>Crear receta</h1>

            <form action="/recipes" method="POST">
                <label for="title">Title</label><br>
                <input type="text" name="title" id="name"><br><br>
                <label for="title">Receta</label><br>
                <textarea name="body" id="body" rows="3"></textarea><br><br>

                <button type="submit">Crear</button>
            </form>
        </div>
    </main>
<?php require base_path('views/partials/foot.php') ?>