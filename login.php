<?php
    require_once __DIR__. "/lib/config.php";
    require_once __DIR__. "/lib/pdo.php";
    require_once __DIR__. "/lib/user.php";
    require_once __DIR__. "/templates/header.php";

    $errors = [];
    $messages = [];


    if (isset($_POST['loginUser'])) {   
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $user = verifyUserLoginPassword($pdo, $email, $password);
        if ($user) {
            session_regenerate_id(true);
            $_SESSION["user"] = $user;
            if ($user['role'] === "user") {
                header("location: index.php");
            } elseif ($user['role'] === "admin") {
                header("location: admin/index.php");
           }
        } else {
            $errors[] = "Email ou mot-de-passe incorrect !!";
        }
    }

?>
   

   
<div class="container col-xxl-8 px-4 py-5 ">
    <h1 class="display-4 fw-bold ">Connexion</h1>

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
            <label for="email" class="form-label">Votre Email : </label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Votre mot-de-passe : </label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <input type="submit" value="Connexion" name="loginUser" class="btn btn-primary">

    </form>
</div>






<?php
    require_once __DIR__. "/templates/footer.php";
?>