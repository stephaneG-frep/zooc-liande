<?php 
   require_once __DIR__. "/templates/header.php";
   require_once __DIR__. "/templates/body_home.php";


   
?>

<div class="container px-4 py-5" id="custom-cards">
        <h2 class="pb-2 border-bottom">Bienvenu a ZOOCELIANDE...</h2>

        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('uploads/images/elephant.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Pour voir toutes les photos de nos amis</h2>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                            <a href="animaux.php" class="btn btn-primary">Voir les animaux</a>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('uploads/images/maison.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Much longer title that wraps to multiple lines
                        </h2>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                                <a href="hotel.php" class="btn btn-primary">Se loger</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('uploads/images/table.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Quelques petits endrois pour manger </h2>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto">
                            <a href="animaux.php" class="btn btn-primary">La restauration</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once __DIR__."/templates/footer.php"; ?>