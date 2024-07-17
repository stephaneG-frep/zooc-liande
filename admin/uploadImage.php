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
require_once('../lib/image.php');

$errors = [];
$messages = [];
$image = '';

if (isset($_POST['addImage'])) {
    $name = $_POST['name'];

    $image = $_FILES['file']['name'];
    $upload = "../uploads/images/";
    move_uploaded_file($_FILES['file']['tmp_name'], $upload);
     
    
}



?>

<div class="container col-xxl-8 px-4 py-5 text-center">
    <h1 style="color:lightblue">Ajouter une image</h1>


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

    <form  method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="name" class="form-label">Nom :</label>
            <input type="text" name="name" id="name" class="form-control" value="<?=$image['name']?>">
        </div>

        <div class="mb-3 mt-4">
            <label for="file" class="form-label">Image</label>
            <input type="file" name="file" id="file">
        </div>
        <input type="submit" value="Enregistrer" name="addImage" class="btn btn-primary">
        
    </form>
</div>
<?php
require_once('templates/footer.php');
?>