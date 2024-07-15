<?php 
    require_once __DIR__. "/templates/header.php";
     require_once __DIR__. "/templates/body_pages.php";
     require_once __DIR__. "/lib/photo.php";

     $images = getPhoto($pdo, $id, $name, $image);

?>
  <div class="container px-4 py-5">

<div class="row text-center">
    <h1 style="color: #F7DB6A;">Les photos</h1>


    <div class="row mx-2">
<?php foreach($images as $key => $image) {
        include("templates/photo_partial.php");
    }?>
</div>

<?php 
   require_once __DIR__. "/templates/footer.php";
?>