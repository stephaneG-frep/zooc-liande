<?php
require_once __DIR__. "/../lib/config.php";
require_once __DIR__. "/../lib/session.php";
adminOnly();

require_once __DIR__. "/../lib/pdo.php";
require_once __DIR__. "/../lib/tools.php";
require_once __DIR__. "/../lib/animaux.php";
require_once __DIR__. "/../lib/category.php";
require_once __DIR__. "/templates/header.php";

$errors = [];
$messages = [];
$animal = [
   'category_id' => '',
   'race' => '',
   'name' => '',
   'age' => '',
   'description' => '',
];

$categories = getCategories($pdo);


if (isset($_GET['id'])) {
    //récuperation de l'animal pour modif..
    $animal = getAnimauxById($pdo, $_GET['id']);
    if ($animal === false) {
        $errors[] = "L'animal n'existe pas/ou plus";
    }
    $pageTitle = "Formulaire modification d'animaux";
} else {
    $pageTitle = "Formulaire ajout d'animaux";
}

if (isset($_POST['saveAnimal'])) {

    $fileName = null;
    // si il y a un fichier envoyé
    if (isset($_FILES["file"]["tmp_name"]) && $_FILES["file"]["tmp_name"] != '') {
        $checkImage = getimagesize($_FILES["file"]["tmp_name"]);
        if ($checkImage !== false) {
            // si c'est une image on envoie dans le bon fichier avec prefix unique et slugify
            $fileName = slugify(basename($_FILES["file"]["name"]));
            $fileName = uniqid() . '-' . $fileName;

            if (move_uploaded_file($_FILES["file"]["tmp_name"], dirname(__DIR__). _ANIMAUX_IMAGES_FOLDER_. $fileName )) {
                if (isset($_POST['image'])) {
                    // suppréssion de l'ancienne image par la nouvelle
                    unlink(dirname(__DIR__)._ANIMAUX_IMAGES_FOLDER_ . $_POST['image']);
                }

        } else {
            $errors[] = "Le fichier non ulpoadé";
        }
        } else {
            $errors[] = "Il faut une image";           
        }
    } else {
        // si aucun fichier envoyé
        if (isset($_GET['id'])) {
            if (isset($_POST['delete_image'])) {
                // supprimer image coché image supprimée
                unlink(dirname(__DIR__)._ANIMAUX_IMAGES_FOLDER_ . $_POST['image']);
            } else {
                $fileName = $_POST['image'];
            }
        }
    }
    // Tous stocker dans un tableau pour afficher les infos et ne pas les perdre si il y a une erreur
    $animal = [
        'category_id' => $_POST['category'],
        'race' => $_POST['race'],
        'name' => $_POST['name'],
        'age' => $_POST['age'],
        'description' => $_POST['description'],
        'image' => $fileName
        ];

     // saugarde si pas erreur
     if (!$errors) {
        if (isset($_GET['id'])) {
            // typage de l'id (int)
            $id = (int)$_GET['id'];

        } else {
            $id = null;
        }
        // On sauvegarde en BDD avec la fonction saveArticle
        $res = saveAnimal($pdo, (int)$_POST["category_id"], $_POST["race"], $_POST["name"], $_POST['age'], $_POST['description'], $fileName, $id);

        if ($res) {
            $messages[] = "Animal bien enregistré";
            // Vider le formulaire
            if (!isset($_GET['id'])) {
                $animal = [
                    'race' => '',
                    'name' => '',
                    'age' => '',
                    'description' => '',
                    'category_id' => '',
                ];
            }
        } else {
            $errors[] = "Animal non enregistré";
        }
    }
}   
?>

<h1><?= $pageTitle; ?></h1>

<?php foreach ($messages as $message) { ?>
<div class="alert alert-success" role="alert">
    <?= $message; ?>
</div>
<?php } ?>
<?php foreach ($errors as $error) { ?>
<div class="alert alert-danger" role="alert">
    <?= $error; ?>
</div>
<?php } ?>
<?php if ($animal !== false) { ?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="race" class="form-label">Race</label>
        <input type="text" class="form-control" id="race" name="race" value="<?= $animal['race']; ?>">
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Nom</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $animal['name']; ?>">
    </div>

    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="text" class="form-control" id="age" name="age" value="<?= $animal['age']; ?>">
    </div>

    <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" id="description" name="description"
            rows="8"><?= $animal['description']; ?></textarea>
    </div>
    
    <div class="mb-3">
        <label for="category" class="form-label">Catégorie</label>
        <select name="category_id" id="category" class="form-select">
            <?php foreach ($categories as $category) { ?>
            <option value="1"
                <?php if (isset($animal['category_id']) && $animal['category_id'] == $category['id']) { ?>selected="selected"
                <?php }; ?>><?= $category['espece'] ?></option>
            <?php } ?>
        </select>
    </div>



    <?php if (isset($_GET['id']) && isset($animal['image'])) { ?>
    <p>
        <img src="<?= _ANIMAUX_IMAGES_FOLDER_ . $animal['image'] ?>" alt="<?= $animal['race'] ?>" width="100">
        <label for="delete_image">Supprimer l'image</label>
        <input type="checkbox" name="delete_image" id="delete_image">
        <input type="hidden" name="image" value="<?=$animal['image']; ?>">
    </p>
    <?php }  ?>
    <p>

        <input type="file" name="file" id="file">
    </p>

    <input type="submit" name="saveAnimal" class="btn btn-primary" value="Enregistrer">

</form>

<?php } ?>



<?php require_once __DIR__. "/templates/footer.php"; ?>