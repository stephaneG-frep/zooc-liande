<?php 

require_once __DIR__. "/lib/employer.php";
require_once __DIR__. "/lib/category.php";
require_once __DIR__. "/lib/tools.php";
require_once __DIR__. "/templates/header.php";
require_once __DIR__. "/templates/body_home.php";

$id = (int)$_GET["id"];
$employer = getEmployerById($pdo, $id);



?>
<div class="container">
    <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
        <div class="col-10 col-sm-8 col-lg-6">
            <img src="<?=getEmployerImage($employer['image']);?>" class="d-block mx-lg-auto img-fluid shadow-lg p-3 mb-5 bg-warning rounded"
             alt="<?=$employer['job']; ?>" width="700"
                height="500" loading="lazy">
        </div>
        <div class="col-lg-6 py-4 px-4" style=" background-color:cornsilk">
            <h1 class="display-5 fw-bold text-body-emphasis lh-1 mb-3"><?=$employer["firstname"]. " ".$employer['lastname']; ?></h1>
            <hr>
            <p class="lead" ><strong><?=$employer["job"]; ?></strong></p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <img src="<?=getEmployerImage($employer['image']);?>" class="d-block mx-lg-auto img-fluid shadow-lg p-3 mb-5 bg-warning rounded"
             alt="<?=$employer['job']; ?>" width="350"
                loading="lazy">
        </div>
        <div class="col-sm">
            <img src="<?=getEmployerImage($employer['image']);?>" class="d-block mx-lg-auto img-fluid shadow-lg p-3 mb-5 bg-warning rounded" 
            alt="<?=$employer['job']; ?>" width="350"
                loading="lazy">
        </div>
        <div class="col-sm">
            <img src="<?=getEmployerImage($employer['image']);?>" class="d-block mx-lg-auto img-fluid shadow-lg p-3 mb-5 bg-warning rounded" 
            alt="<?=$employer['job']; ?>" width="350"
                loading="lazy">
        </div>
    </div>
</div>



<?php require_once __DIR__. "/templates/footer.php"; ?>