<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
adminOnly();

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/tools.php";
require_once __DIR__ . "/../lib/animaux.php";
require_once __DIR__ . "/templates/header.php";

$animal = false;
$errors = [];
$messages = [];
if (isset($_GET["id"])) {
    $animal =  getAnimauxById($pdo, (int)$_GET["id"]);
}
if ($animal) {
    if (deleteAnimaux($pdo, $_GET["id"])) {
        $messages[] = "L'animal a bien été supprimé";
    } else {
        $errors[] = "Une erreur s'est produite lors de la suppression";
    }
} else {
    $errors[] = "L'animal n'existe pas";
}
?>
<div class="row text-center my-5">
    <h1>Supression d'animaux</h1>
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
</div>

<?php
require_once('templates/footer.php');