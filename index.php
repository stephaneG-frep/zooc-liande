
<?php
   require_once __DIR__. "/config.php";
   // constante du chemin racine
   define("_ROOTPAPH_", __DIR__);

   spl_autoload_register();

   use App\Controller\Controller;
   

   $controller = new Controller();
   $controller->route();

?>





    





<?php 
    //require_once __DIR__. "/templates/footer.php";
?>