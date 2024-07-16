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
require_once('../lib/category.php');


$errors = [];
$messages = [];
$categorie = [
    'espece' => '',
];

if (isset($_POST['addCategorie'])) {
    

    if (!$errors) {
        $res = addCategorie($pdo, $_POST['espece']);
        
        if ($res) {
            $messages[] = 'La categorie a bien été sauvegardée';
        } else {
            $errors[] = 'La categorie n\'a pas été sauvegardée';
        }
    }
    $categorie = [
        'espece' => $_POST['espece'],
    ];

}

?>
<div class="container col-xxl-8 px-4 py-5 text-center">
    <h1 style="color:lightblue">Ajouter de categorie</h1>


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

    <form method="POST" >

        <div class="mb-3">
            <label for="category" class="form-label">Categorie :</label>
            <textarea name="category" id="category" cols="30" rows="5"
                class="form-control"><?= $categorie['espece']; ?></textarea>
        </div>
        <input type="submit" value="Enregistrer" name="addCategorie" class="btn btn-primary">


    </form>
</div>
<?php
require_once('templates/footer.php');
?>