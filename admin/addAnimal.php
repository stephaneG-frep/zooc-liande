<?php
require_once('../lib/config.php');
require_once('../lib/session.php');
adminOnly();


require_once('templates/header.php');
/*
if(!isset($_SESSION['user'])) {
    header('location: home.php'); 
}*/

require_once('../lib/pdo.php');
require_once('../lib/tools.php');
require_once('../lib/animaux.php');
//require_once('../lib/category.php');





$errors = [];
$messages = [];
$animal = [
    'race' => '',
    'name' => '',
    'age' => '',
    'description' => '',
    'espece' => '',
    'image_id' => '',
];


if (isset($_POST['addAnimal'])) {
    $fileName = null;
    // Si un fichier a été envoyé
    if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
        // la méthode getimagessize va retourner false si le fichier n'est pas une image
        $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if ($checkImage !== false) {
            // Si c'est une image on traite
            $fileName = uniqid().'-'.slugify($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], _ANIMAUX_IMAGES_FOLDER_.$fileName);
        } else {
            // Sinon on affiche un message d'erreur
            $errors[] = 'Le fichier doit être une image';
        }
    }

    if (!$errors) {
        $res = addAnimal($pdo, $_POST['image_id'], $_POST['race'], $_POST['name'], $_POST['age'], $_POST['description'], $_POST['espece'], $fileName);
        
        if ($res) {
            $messages[] = 'L\'animal a bien été sauvegardée';
        } else {
            $errors[] = 'L\'animal n\'a pas été sauvegardée';
        }
    }

    $animal = [
        'race' => $_POST['race'],
        'name' => $_POST['name'],
        'age' => $_POST['age'],
        'description' => $_POST['description'],
        'espece' => $_POST['espece'],
        'image_id' => $_POST['image_id'],
    ];

}

?>

<h1><?=$pageTitle; ?></h1>

<div class="container col-xxl-8 px-4 py-5 text-center">
    <h1 style="color:lightblue">Ajouter un animal</h1>


    <?php foreach ($messages as $message) { ?>
    <div class="alert alert-success">
        <?=$message; ?>
    </div>
    <?php } ?>

    <?php foreach ($errors as $error) { ?>
    <div class="alert alert-danger">
        <?=$error; ?>
    </div>
    <?php } ?>

    <form method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="race" class="form-label">Race :</label>
            <input type="text" name="race" id="race" class="form-control" value="<?=$animal['race']?>">
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nom :</label>
            <input type="text" name="name" id="name" class="form-control" value="<?=$animal['name']?>">
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Age :</label>
            <input type="text" name="age" id="age" class="form-control" value="<?=$animal['age']?>">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" cols="30" rows="5"
                class="form-control"><?= $animal['description']; ?></textarea>
        </div>
        <div class="mb-3">
            <label for="espece" class="form-label">Espece</label>
            <textarea name="espece" id="espece" cols="30" rows="5"
                class="form-control"><?= $animal['espece']; ?></textarea>
        </div>


        <div class="mb-3 mt-4">
            <label for="file" class="form-label">Image</label>
            <input type="file" name="file" id="file">
        </div>
        <input type="submit" value="Enregistrer" name="addAnimal" class="btn btn-primary">


    </form>
</div>
<?php
require_once('templates/footer.php');
?>