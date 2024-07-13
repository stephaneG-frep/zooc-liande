<?php 

require_once __DIR__. "/../lib/config.php";
require_once __DIR__. "/../lib/session.php";
adminOnly();

require_once __DIR__. "/../lib/pdo.php";
require_once __DIR__. "/../lib/tools.php";
require_once __DIR__. "/../lib/animaux.php";
require_once __DIR__. "/../lib/category.php";
require_once __DIR__. "/templates/header.php";



$errors = [];
$messages = [];
$recipe = [
   'category_id' => '',
   'race' => '',
   'name' => '',
   'age' => '',
   'description' => '',
];
$categories = getCategories($pdo);

if (isset($_POST['saveAnimal'])) { 
    $fileName = null;
  
    // test si un fichier a été envoyé
    if (isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
         $checkImage = getimagesize($_FILES['file']['tmp_name']);
         if ($checkImage !== false) {
            // si c'est une image on envoie dans le bon fichier avec prefix unique et slugify
            $fileName = uniqid().'-'.slugify($_FILES['file']['name']);

            move_uploaded_file($_FILES['file']['tmp_name'], _ANIMAUX_IMAGES_FOLDER_.$fileName);

         } else {
            // si c'estpas une image (errors)
            $errors[] = "Erreur il faut une image";
         }
    }

    if (!$errors) {

        $res = saveAnimaux($pdo, $_POST['category_id'], htmlentities($_POST['race']), htmlentities($_POST['name']),
                           htmlentities($_POST['age']), htmlentities($_POST['description']), $fileName);
        //$_POST['image'], $_POST['image1'], $_POST['image2'], $_POST['image3']
        if ($res) {
            $messages[] = "L'animal est bien enregistée";
        } else {
            $errors[] = "L'animal n'a pas été enregistrée";
        }
    }  
    
    $recipe = [
        'category_id' => $_POST['category_id'],
       'race' => $_POST['race'],
       'name' => $_POST['name'],
       'age' => $_POST['age'],
       'description' => $_POST['descriptions'],
    ];
}  

?>

<div class="container">
    <?php foreach($messages as $message) {?>
    <div class="alert alert-success">
        <?= $message;?>
    </div>
    <?php }?>


    <?php foreach($errors as $error) {?>
    <div class="alert alert-danger">
        <?= $error;?>
    </div>
    <?php }?>


    <h1>Ajouter ou modifi... une recette</h1>
    <form action="" method="post" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="text" class="form-label">Race</label>
            <input type="text" name="race" id="race" class="form-control" value="<?=$animal['race'] ?>">
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Nom</label>
            <input type="text" name="name" id="name" class="form-control" value="<?=$animal['name'] ?>">
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Age</label>
            <input type="text" name="age" id="age" class="form-control" value="<?=$animal['age'] ?>">
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Déscription</label>
            <textarea name="text" id="description" cols="30" rows="5" class="form-control"><?=$animal['description'] ?></textarea>
        </div>

        
        <div class="mb-3">
            <label for="category" class="form-label">Categories</label>
            <select name="category" id="category" class="form-select">
                <?php foreach($categories as $category) {?>
                <option value="<?= $category['id'];?>" <?php if ($animal['category_id'] == $category['id']) { echo 'selected="selected"'; }?>><?= $category['espece'];?></option>
                <?php }?>
            </select>
        </div>

        <div class="mb-3">
            <label for="file" class="form-label">Images</label>
            <input type="file" name="file" multiple id="file" class="form-control mb-2">
            <input type="file" name="file2" id="file2" class="form-control mb-2">
            <input type="file" name="file3" id="file3" class="form-control mb-2">
            <input type="file" name="file4" id="file4" class="form-control mb-2">




            <p class="form-control">JPG or PNG (MAX. 800x400px) pas plus de 4 images </p>
        </div>
        

        <input type="submit" value="Enregistrer" name="saveAnimal" class="btn btn-primary">

    </form>
</div>

<?php require_once __DIR__. "/templates/footer.php"; ?>