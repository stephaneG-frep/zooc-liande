<?php 

require_once __DIR__. "/lib/animaux.php";
require_once __DIR__. "/lib/image.php";
//require_once __DIR__. "/lib/category.php";
require_once __DIR__. "/lib/tools.php";
require_once __DIR__. "/templates/header.php";
require_once __DIR__. "/templates/body_home.php";

$id = (int)$_GET["id"];


$animal = getAnimauxById($pdo, $id);
//$image = getImageImage($image);






?>
<div class="container">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="<?=getAnimauxImage($animal['image']);?>"
                class="d-block mx-lg-auto img-fluid shadow-lg p-3 mb-5 bg-warning rounded" alt="<?=$animal['race']; ?>"
                width="700" height="500" loading="lazy">
        </div>
        <div class="col-lg-6 py-4 px-4" style=" background-color:cornsilk">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?=$animal["name"]. " ".$animal['age']. " ans" ?>
            </h1>
            <hr>
            <p class="lead"><strong>Son histoire :<?=$animal["description"]; ?></strong></p></br>
            <hr>
            <p class="lead"><strong> Son Espèce :<?=$animal["espece"]; ?></strong></p>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-lg">
        <img src="<?=getAnimauxImage($animal['image']);?>"
            class="d-block mx-lg-auto img-fluid shadow-lg p-3 mb-5 bg-warning rounded" alt="<?=$animal['race']; ?>"
            width="350" loading="lazy">
    </div>
    <div class="col-sm">
        <img src="<?=getAnimauxImage($animal['image']);?>"
            class="d-block mx-lg-auto img-fluid shadow-lg p-3 mb-5 bg-warning rounded" alt="<?=$animal['race']; ?>"
            width="350" loading="lazy">
    </div>
    <div class="col-sm">
        <img src="<?=getAnimauxImage($animal['image']);?>"
            class="d-block mx-lg-auto img-fluid shadow-lg p-3 mb-5 bg-warning rounded" alt="<?=$animal['race']; ?>"
            width="350" loading="lazy">
    </div>
</div>
</div>



<?php require_once __DIR__. "/templates/footer.php"; ?>