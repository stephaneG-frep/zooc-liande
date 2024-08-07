<?php
require_once('../lib/config.php');
require_once('../lib/session.php');
adminOnly();

require_once('templates/header.php');
require_once('../lib/pdo.php');
require_once('../lib/tools.php');
require_once('../lib/image.php');



$errors = [];
$messages = [];
$image = [
    'name' => '',
];

if (isset($_GET['id'])) {
    //récuperation de l'article pour modif..
    $image = getImageById($pdo, $_GET['id']);
    if ($image === false) {
        $errors[] = "L'image n'existe pas/ou plus";
    }
    $pageTitle = "Formulaire modification d'image";
} else {
    $pageTitle = "Formulaire ajout d'image";
}



if (isset($_POST['modif_image'])) {
    $fileName = null;
    // Si un fichier a été envoyé
    if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
        // la méthode getimagessize va retourner false si le fichier n'est pas une image
        $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if ($checkImage !== false) {
            // Si c'est une image on traite
            $fileName = uniqid().'-'.slugify($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], _SAVE_ANIMAUX_IMG_.$fileName);
       
        } else {
            // Sinon on affiche un message d'erreur
            $errors[] = 'Le fichier doit être une image';
        }
    }

    if (!$errors) {
        $res = modif_image($pdo, $_POST['name'], $fileName);
        
        if ($res) {
            $messages[] = 'L\'image a bien été sauvegardée';
        } else {
            $errors[] = 'L\'image n\'a pas été sauvegardée';
        }
    }
    $image = [
        'name' => $_POST['name'],
        
    ];

}

?>
<h1><?=$pageTitle; ?></h1>

<div class="container col-xxl-8 px-4 py-5 text-center">
    <h1 style="color:lightblue">Modifier une image</h1>


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
            <label for="name" class="form-label">Nom :</label>
            <textarea name="name" id="name" cols="30" rows="5"
            class="form-control"><?=$image['name'];?></textarea>
        </div>

        <div class="mb-3 mt-4">
            <label for="file" class="form-label">Image</label>
            <input type="file" name="file" id="file">
        </div>
        <input type="submit" value="Enregistrer" name="modif_image" class="btn btn-primary">
        
    </form>
</div>
<?php
require_once('templates/footer.php');
?>