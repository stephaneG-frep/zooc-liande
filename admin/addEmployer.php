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
require_once('../lib/employer.php');
require_once('../lib/category.php');
require_once('../lib/photo.php');




$errors = [];
$messages = [];
$employer = [
    'firstname' => '',
    'lastname' => '',
    'job' => '',
];

$categories = getCategories($pdo);
$photos = getPhoto($pdo);

if (isset($_POST['addEmployer'])) {
    $fileName = null;
    // Si un fichier a été envoyé
    if(isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
        // la méthode getimagessize va retourner false si le fichier n'est pas une image
        $checkImage = getimagesize($_FILES['file']['tmp_name']);
        if ($checkImage !== false) {
            // Si c'est une image on traite
            $fileName = ($_FILES['file']['name']);
            move_uploaded_file($_FILES['file']['tmp_name'], _ANIMAUX_IMAGES_FOLDER_.$fileName);
        } else {
            // Sinon on affiche un message d'erreur
            $errors[] = 'Le fichier doit être une image';
        }
    }

    if (!$errors) {
        $res = addEmployer($pdo, $_POST['firstname'], $_POST['lastname'], $_POST['job'], $fileName);
        
        if ($res) {
            $messages[] = 'L\'employer a bien été sauvegardée';
        } else {
            $errors[] = 'L\'employer n\'a pas été sauvegardée';
        }
    }
    $employer = [
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'job' => $_POST['job'],
    ];

}

?>
<div class="container col-xxl-8 px-4 py-5 text-center">
    <h1 style="color:lightblue">Ajouter un employer</h1>


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
            <label for="firstname" class="form-label">Prénom :</label>
            <input type="text" name="firstname" id="firstname" class="form-control" value="<?=$employer['firstname']?>">
        </div>

        <div class="mb-3">
            <label for="lastname" class="form-label">Nom :</label>
            <input type="text" name="lastname" id="lastname" class="form-control" value="<?=$employer['lastname']?>">
        </div>

        <div class="mb-3">
            <label for="job" class="form-label">Job :</label>
            <textarea name="job" id="job" cols="30" rows="5"
                class="form-control"><?= $employer['job']; ?></textarea>
        </div>


        <div class="mb-3 mt-4">
            <label for="file" class="form-label">Image</label>
            <input type="file" name="file" id="file">
        </div>
        <input type="submit" value="Enregistrer" name="addEmployer" class="btn btn-primary">


    </form>
</div>
<?php
require_once('templates/footer.php');
?>