<?php require  base_path('views/partials/head.php') ?>
<?php require  base_path('views/partials/navbar.php') ?>
    <main>
        <div class="">
            <h1><?= $recipe['title'] ?></h1><br><br>
            <p><?= $recipe['body'] ?></p>
            <br><br>
            <a href="/recipe/edit?id=<?= $recipe['id']?>">Edit</a>
            <br>
            <form action="/recipe" method="POST">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $recipe['id']?>">
                <button type="submit">Delete</button>
            </form>
        </div>
    </main>
<?php require base_path('views/partials/foot.php') ?>
