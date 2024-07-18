<?php 
    require_once __DIR__. "/lib/session.php";
    require_once __DIR__. "/lib/panier.php";
    require_once __DIR__. "/lib/pdo.php";
    require_once __DIR__. "/templates/header.php";
    require_once __DIR__. "/templates/body_a_propos.php";

    $erreur = false;

$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh')))
   $erreur=true;

   //récuperation des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
   $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;

   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On vérifie que $p soit un float
   $p = floatval($p);

   //On traite $q qui peut être un entier simple ou un tableau d'entiers
    
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
    
}

if (!$erreur){
   switch($action){
      Case "ajout":
         ajouterArticle($l,$q,$p);
         break;

      Case "suppression":
         supprimerArticle($l);
         break;

      Case "refresh" :
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
         }
         break;

      Default:
         break;
   }
}


?>

<div class="container col-xxl-8 px-4 py-5 text-center">
    <div class="row">
        <div class="col md-4">
            <form method="post" action="panier.php">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Votre Panier</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">Libellé</th>
                            <th scope="row">Quantité</th>
                            <th scope="row">Prix Unitare</th>
                            <th scope="row">Action</th>
                        </tr>
                    </tbody>
                    
                    <?php
    if (creationPanier())
    {
        $nbArticles=count($_SESSION['panier']['libelleProduit']);
        if ($nbArticles <= 0)
        echo "<tr><td>Votre panier est vide </ td></tr>";
        else
        {
            for ($i=0 ;$i < $nbArticles ; $i++)
            {
                echo "<tr>";
                echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
                echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
                echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
                echo "<td><a href=\"".htmlspecialchars("panier.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">XX</a></td>";
                echo "</tr>";
            }

            echo "<tr><td colspan=\"2\"> </td>";
            echo "<td colspan=\"2\">";
            echo "Total : ".MontantGlobal();
            echo "</td></tr>";

            echo "<tr><td colspan=\"4\">";
            echo "<input type=\"submit\" value=\"Rafraichir\"/>";
            echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";

            echo "</td></tr>";
        }
    }
    ?>
                </table>
            </form>
        </div>
    </div>
</div>




<?php
   require_once __DIR__. "/templates/footer.php";
?>