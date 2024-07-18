<?php 
    require_once __DIR__. "/templates/header.php";
     require_once __DIR__. "/templates/body_pages.php";
     require_once __DIR__. "/lib/image.php";

     
     $images = getImage($pdo);

?>




<div id="photo_Du_Zoo" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">


    <?php foreach ($images as $image)  {?>
        <?php $i=0; if ($i==0) {$set_ = 'active'; } else {$set_ = '';} {  ?>
        <div class="carousel-item <?=$set_; ?>  text-center">
            <img class=" rounded img-fluid" width="800" height="300" src="<?= getImageImage($image['image'])?>"
                alt="First slide">
        </div>
        <div class="card-body" style="background: #799351;">
            <h3 class="card-title" style="color: #EAECCC ;"><?=$image['name']?></h3>
            <hr>

        </div>

        <?php $i++; } ?>
    <?php }?>
    </div>


<a class="carousel-control-prev" href="#photo_Du_Zoo" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
</a>

<a class="carousel-control-next" href="#photo_Du_Zoo" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
</a>
</div>


<?php 
   require_once __DIR__. "/templates/footer.php";
?>