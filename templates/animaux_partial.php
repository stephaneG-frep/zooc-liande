<div class="col-md-4 my-2 d-flex">
            <div class="card">
                <div class="card-header" style="background: #3A8891;">
                    <img src="<?=getAnimauxImage($animal['image']);?>" alt="<?=$animal['race'] ?>" width="300" height="400"
                        class=" card-img-bottom rounded rounded-4">
                </div>
                <div class="card-body" style="background: #799351;">
                    <h3 class="card-title" style="color: #EAECCC ;">Je m'appel <?=$animal['name']?> et j'ai <?=$animal['age'] ?> ans</h3>
                    <hr>
                   
                    <a href="on_animal.php?id=<?=$animal['id'];?>" class="btn btn-primary">Voir</a>
                </div>
            </div>
        </div>