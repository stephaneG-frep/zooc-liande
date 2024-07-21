<?php 
    require_once __DIR__. "/lib/employer.php";
    require_once __DIR__. "/templates/header.php";
    require_once __DIR__. "/templates/body_pages.php";

     $employers = getEmployer($pdo);
?>

<div class="container px-4 py-5">

    <div class="row text-center">
        <h1 class="display-4 fw-bold " style="color: #F7DB6A;">Nos amis les employés</h1>


        <div class="row mx-2">
    <?php foreach($employers as $key => $employer) {
            include("templates/employes_partial.php");
        }?>
</div>

<!--
<div class="container  px-4 py-5">
    <div class="row text-center">
        <h1 style="color: #F0997D;">Le personnel de notre zoo et aussi une famille </h1>

        
            <div class="col-md-4 my-2 d-flex">
                <div class="card">
                    <div class="card-header" style="background: #3A8891;">
                        <img src="uploads/images/homme2.jpg" alt="image employer" width="300" height="250"
                            class="card-img-bottom rounded rounded-4 ">
                    </div>
                    <div class="card-body" style="background: #799351;">
                        <h3 class="card-title" style="color: #EAECCC ;"> Nasser Phan notre soigneur</h3>
                        <hr>
                        <p class="card-text" style="color: #EAECCC ;">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Fuga nemo natus atque eaque et autem neque sed aut. Sed dicta magnam minus repellat quod facere fuga sit ducimus 
                            alias laborum impedit voluptate corporis illum excepturi consequatur, corrupti reprehenderit quos quaerat,
                             repellendus culpa temporibus quisquam. In ipsa repellendus quia alias quisquam voluptates quae sunt? 
                            Temporibus illo praesentium ratione odit sequi id inventore assumenda necessitatibus rerum porro iure distinctio asperiores,
                             ipsam tempore accusamus obcaecati velit quas officiis iusto ipsa fugiat ad sed laborum voluptatem? Quia optio nemo nesciunt eveniet, officia, 
                            eum expedita perferendis at fugit necessitatibus id quas dolorem. Modi, quod vel? </p>
                        <a href="#" class="btn btn-primary">Voir</a>
                    </div>
                </div>
            </div>
              
            <div class="col-md-4 my-2 d-flex">
                <div class="card">
                    <div class="card-header" style="background: #3A8891;">
                        <img src="uploads/images/homme2.jpg" alt="image employer" width="300" height="250"
                            class="card-img-bottom rounded rounded-4 ">
                    </div>
                    <div class="card-body" style="background: #799351;">
                        <h3 class="card-title" style="color: #EAECCC ;">Harry Stockaths notre vétérinaire </h3>
                        <hr>
                        <p class="card-text" style="color: #EAECCC ;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Fuga nemo natus atque eaque et autem neque sed aut. Sed dicta magnam minus repellat quod facere fuga sit ducimus 
                            alias laborum impedit voluptate corporis illum excepturi consequatur, corrupti reprehenderit quos quaerat,
                             repellendus culpa temporibus quisquam. In ipsa repellendus quia alias quisquam voluptates quae sunt? 
                            Temporibus illo praesentium ratione odit sequi id inventore assumenda necessitatibus rerum porro iure distinctio asperiores,
                             ipsam tempore accusamus obcaecati velit quas officiis iusto ipsa fugiat ad sed laborum voluptatem? Quia optio nemo nesciunt eveniet, officia, 
                            eum expedita perferendis at fugit necessitatibus id quas dolorem. Modi, quod vel?</p>
                        <a href="#" class="btn btn-primary">Voir</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 my-2 d-flex">
                <div class="card">
                    <div class="card-header" style="background: #3A8891;">
                        <img src="uploads/images/homme2.jpg" alt="image employer" width="300" height="250"
                            class="card-img-bottom rounded rounded-4 ">
                    </div>
                    <div class="card-body" style="background: #799351;">
                        <h3 class="card-title" style="color: #EAECCC ;">Nicolas Lalandes notre jardinier</h3>
                        <hr>
                        <p class="card-text" style="color: #EAECCC ;"> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Fuga nemo natus atque eaque et autem neque sed aut. Sed dicta magnam minus repellat quod facere fuga sit ducimus 
                            alias laborum impedit voluptate corporis illum excepturi consequatur, corrupti reprehenderit quos quaerat,
                             repellendus culpa temporibus quisquam. In ipsa repellendus quia alias quisquam voluptates quae sunt? 
                            Temporibus illo praesentium ratione odit sequi id inventore assumenda necessitatibus rerum porro iure distinctio asperiores,
                             ipsam tempore accusamus obcaecati velit quas officiis iusto ipsa fugiat ad sed laborum voluptatem? Quia optio nemo nesciunt eveniet, officia, 
                            eum expedita perferendis at fugit necessitatibus id quas dolorem. Modi, quod vel?</p>
                        <a href="#" class="btn btn-primary">Voir</a>
                    </div>
                </div>
            </div>

    </div>
</div>
    -->


<?php
    require_once __DIR__. "/templates/footer.php";
?>