<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
adminOnly();

require_once __DIR__ . "/../lib/pdo.php";
require_once __DIR__ . "/../lib/tools.php";
require_once __DIR__ . "/../lib/employer.php";
require_once __DIR__ . "/templates/header.php";

$employer = false;
$errors = [];
$messages = [];
if (isset($_GET["id"])) {
    $employer =  getEmployerById($pdo, (int)$_GET["id"]);
}
if ($employer) {
    if (deleteEmployer($pdo, $_GET["id"])) {
        $messages[] = "L'employer a bien été supprimé";
    } else {
        $errors[] = "Une erreur s'est produite lors de la suppression";
    }
} else {
    $errors[] = "L'employer n'existe pas";
}
?>
<div class="row text-center my-5">
    <h1>Supression d'employer</h1>
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