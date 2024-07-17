<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
adminOnly();

require_once __DIR__. "/templates/header.php";
require_once __DIR__. "/../lib/pdo.php";
require_once __DIR__. "/../lib/image.php";



if (isset($_GET['page'])) {
    $page = (int)$_GET['page'];
} else {
    $page = 1;
}

$images = getImage($pdo, _ADMIN_ITEM_PER_PAGE_, $page);

$totalImage = getTotalImage($pdo);

$totalPages = ceil($totalImage / _ADMIN_ITEM_PER_PAGE_);


?>

<h1 class="py-5">Listes des Images</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($images as $image) {?>
        <tr>
            <th scope="row"><?=$image['id']?></th>
            <td><?=$image['name']?></td>
            <td><?=$image['image']?></td>
            <td>
                <a href="uploadImage.php">Add</a>
                <a href="image_delete.php?id=<?= $image['id'] ?>"
                    onclick="return confirm('Êtes-vous sûr de vouloir supprimercet animal ?')">Supprimer</a>
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