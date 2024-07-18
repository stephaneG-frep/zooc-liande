<?php 
    require_once __DIR__. "/templates/header.php";
     require_once __DIR__. "/templates/body_pages.php";
     require_once __DIR__. "/lib/image.php";
     
     $images = getImage($pdo);

?>
<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">

        <!-- Les indicateurs (slide actif) du carousel -->
        <div class="carousel-indicators">

            <?php foreach ($images as $image) {?>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to=" $loop->index "
                <?php if(!$loop->index) {'class="active"';} ?> aria-current="true" aria-label="Slide
                $loop->iteration "></button>
            <?php }?>

        </div>

        <!-- Les slides du carousel -->
        <div class="carousel-inner">

            <!-- On parcourt les parties (chunks) de la table "users" -->


            <!-- On ajoute la classe "active" sur le premier slide (chunk) -->
            <div class="carousel-item <?php if($loop->first){' active ';}?>">

                <!-- La row -->


                <!-- On affiche chaque "user" dans une colonne responsive -->
                <?php foreach ($images as $image) {?>

                <img class=" rounded img-fluid" width="800" height="300" src="<?= getImageImage($image['image'])?>"
                    alt="First slide">

                <?php }?>


            </div>


        </div>


        <!-- Les boutons suivant et pécédent -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
</div>



<?php 
   require_once __DIR__. "/templates/footer.php";
?>