<?php

 require_once __DIR__. "/lib/addAnimaux.php";
 require_once __DIR__. "/lib/pdo.php";
 require_once __DIR__. "/lib/category.php";
 require_once __DIR__. "/lib/tools.php";
 require_once __DIR__. "/templates/header.php";

 ?>

<div class="container py-4 px-4">
    <h1>Ajouter un animal</h1>
    <form action="addAnimaux.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="race" class="form-label">Race</label>
            <input type="text" class="form-control" id="race" name="race" required>
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="text" class="form-control" id="age" name="age" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="8" required></textarea>
        </div>

        <div class="mb-3">
            <label for="category_id">Categorie</label>
            <select name="category_id" id="category_id" required>
                <option value="1">Félin</option>
                <option value="2">Singe</option>
                <option value="3">Oiseau</option>
                <option value="4">Herbivore</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" accept="image/*">

            <button type="submit">Ajouter</button>
        </div>
    </form>
</div>

<?php
    require_once __DIR__. "/templates/footer.php";
?>