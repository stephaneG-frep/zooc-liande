<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
adminOnly();

require_once __DIR__. "/templates/header.php";
require_once __DIR__. "/../lib/pdo.php";
require_once __DIR__. "/../lib/animaux.php";



if (isset($_GET['page'])) {
    $page = (int)$_GET['page'];
} else {
    $page = 1;
}

$animaux = getAnimaux($pdo, _ADMIN_ITEM_PER_PAGE_, $page);

$totalAnimaux = getTotalAnimaux($pdo);

$totalPages = ceil($totalAnimaux / _ADMIN_ITEM_PER_PAGE_);


?>

<h1 class="py-5">Listes des animaux</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Race</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($animaux as $animal) {?>
        <tr>
            <th scope="row"><?=$animal['id']?></th>
            <td><?=$animal['race']?></td>           
            <td><a href="animal.php?id=<?= $animal['id'] ?>">Modifier</a>
            <a href="animal.php">Add</a>         
             <a href="animaux_delete.php?id=<?= $animal['id'] ?>" 
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
        <li class="page-item <?php if ($i === $page) { echo "active"; }?>"><a class="page-link" href="?page=<?=$i;?>"><?=$i;?></a></li>
        <?php }?>        
    </ul>
</nav>
<?php }?>

<?php 
require_once __DIR__. "/templates/footer.php";
?>