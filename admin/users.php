<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
adminOnly();

require_once __DIR__. "/templates/header.php";
require_once __DIR__. "/../lib/pdo.php";
require_once __DIR__. "/../lib/user.php";



if (isset($_GET['page'])) {
    $page = (int)$_GET['page'];
} else {
    $page = 1;
}

$users = getUser($pdo, _ADMIN_ITEM_PER_PAGE_, $page);

$totalUser = getTotalUser($pdo);

$totalPages = ceil($totalUser / _ADMIN_ITEM_PER_PAGE_);


?>

<h1 class="py-5">Listes des utilisateurs</h1>
<h3 class="py-3 px-3" style="background: #26577C ; color: #B60071 ;">A faire que s'il y a de mauvais comportements</h3>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Role</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $user) {?>
        <tr>
            <th scope="row"><?=$user['id']?></th>
            <td><?=$user['firstname']?></td>
            <td><?=$user['lastname']?></td>
            <td><?=$user['role'] ?></td>
            <td>
                
                <a href="delete_user.php?id=<?= $user['id'] ?>"
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