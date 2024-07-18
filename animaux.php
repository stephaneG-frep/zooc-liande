<?php 
   require_once __DIR__. "/templates/header.php";
   require_once __DIR__. "/templates/body_home.php";
   require_once __DIR__. "/lib/animaux.php";
    
   $animaux = getAnimaux($pdo);
   
?>
<div class="container px-4 py-5">

    <div class="row text-center">
        <h1 class="display-4 fw-bold " style="color: #F7DB6A;">Nos amis les animaux</h1>


        <div class="row mx-2">
    <?php foreach($animaux as $key => $animal) {
            include("templates/animaux_partial.php");
        }?>
</div>


<!--       <div class="col-md-4 my-2 d-flex">
            <div class="card">
                <div class="card-header" style="background: #3A8891;">
                    <img src="uploads/images/lion.jpg" alt="image du lion" width="300" height="400"
                        class=" card-img-bottom rounded rounded-4">
                </div>
                <div class="card-body" style="background: #799351;">
                    <h3 class="card-title" style="color: #EAECCC ;">Titre</h3>
                    <hr>
                    <p class="card-text" style="color: #EAECCC ;">orem ipsum dolor sit amet consectetur adipisicing
                        elit. Maxime mollitia,
                        molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                        numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                        optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
                        obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
                        nihil, eveniet aliquid culpa officia aut! </p>
                    <a href="#" class="btn btn-primary">Voir</a>
                </div>
            </div>
        </div>

       <div class="col-md-4 my-2 d-flex">
            <div class="card">
                <div class="card-header" style="background: #3A8891;">
                    <img src="uploads/images/coco.jpg" alt="image de peroquet" width="300" height="400"
                        class=" card-img-bottom rounded rounded-4">
                </div>
                <div class="card-body" style="background: #799351;">
                    <h3 class="card-title" style="color: #EAECCC ;">Titre</h3>
                    <hr>
                    <p class="card-text" style="color: #EAECCC ;">orem ipsum dolor sit amet consectetur adipisicing
                        elit. Maxime mollitia,
                        molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                        numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                        optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
                        obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
                        nihil, eveniet aliquid culpa officia aut! </p>
                    <a href="#" class="btn btn-primary">Voir</a>
                </div>
            </div>
        </div>

        <div class="col-md-4 my-2 d-flex">
            <div class="card">
                <div class="card-header" style="background: #3A8891;">
                    <img src="uploads/images/panda.jpeg" alt="image de panda" width="300" height="400"
                        class=" card-img-bottom rounded rounded-4">
                </div>
                <div class="card-body" style="background: #799351;">
                    <h3 class="card-title" style="color: #EAECCC ;">Titre</h3>
                    <hr>
                    <p class="card-text" style="color: #EAECCC ;">orem ipsum dolor sit amet consectetur adipisicing
                        elit. Maxime mollitia,
                        molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                        numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                        optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
                        obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
                        nihil, eveniet aliquid culpa officia aut! </p>
                    <a href="#" class="btn btn-primary">Voir</a>
                </div>
            </div>
        </div>
    </div> 

-->
</div>



<?php
    require_once __DIR__. "/templates/footer.php";
?>