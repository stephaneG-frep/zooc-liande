<?php 
    require_once __DIR__. "/templates/header.php";
     require_once __DIR__. "/templates/body_pages.php";
     require_once __DIR__. "/lib/tools.php";
     require_once __DIR__. "/lib/image.php";

    

     if (isset($_GET['page'])) {
        $page = (int)$_GET['page'];
    } else {
        $page = 1;
    }
    
    $images = getImage($pdo, _ADMIN_ITEM_PER_PAGE_, $page);
    
    $totalImage = getTotalImage($pdo);
    
    $totalPages = ceil($totalImage / _ADMIN_ITEM_PER_PAGE_);
    
    

?>

<div class="container px-4 py-5">
    <div class="row text-center">
        <h1 class="display-4 fw-bold" style="color: #F7DB6A;">Les photos</h1>


        <table class="fw-bold" style="color:darkgreen">
            <thead>
                <tr>
                    <th style="background: #C08B5C ;" scope="col">Nom</th>
                    <th style="background: #A4CE95;" scope="col">Image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($images as $image) {?>
                <tr>
                    <td style="background: #FFE194;"><?=$image['name']?></td>
                    <td style="background: #EF6262;"><img src="<?=getImageImage($image['image'])?>" alt="" width="300" height="150"></td>
                    <td>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>

        <?php if ($totalPages > 1) {?>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php for ($i = 1; $i <= $totalPages; $i++) {?>
                <li class="page-item <?php if ($i === $page) { echo "active"; }?>"><a class="page-link"
                        href="?page=<?=$i;?>"><?=$i;?></a></li>
                <?php }?>
            </ul>
        </nav>
        <?php }?>

<?php 
   require_once __DIR__. "/templates/footer.php";
?>