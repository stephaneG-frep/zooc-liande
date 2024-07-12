<?php
    require_once __DIR__. "/templates/header.php";
    require_once __DIR__. "/templates/body_pages.php";
    require_once __DIR__. "/lib/user.php";

    $errors = [];
    $messages = [];

    

    if (isset($_POST['addUser'])) {
        
        $res = addUser($pdo, $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['password']);

        if ($res) {
            $messages[] = "Inscription réussie";
        } else {
            $errors[] = "Désolé l'inscription n'a pas réussie";
        }
        
    }
    
?>

<div class="container">
    <h1>Inscription</h1>

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


    <form action="" method="post">

         <div class="mb-3">
            <label for="text" class="form-label">Votre Prénom : </label>
            <input type="text" name="firstname" id="firstname" class="form-control">
        </div>

        <div class="mb-3">
            <label for="text" class="form-label">Votre Nom : </label>
            <input type="text" name="lastname" id="lastname" class="form-control">
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Votre Email : </label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Votre mot-de-passe : </label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <input type="submit" value="Enregister" name="addUser" class="btn btn-primary">

    </form>
</div>






<?php
    require_once __DIR__. "/templates/footer.php";
?>