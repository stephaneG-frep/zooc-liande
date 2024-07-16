<?php
require_once __DIR__ . "/../lib/config.php";
require_once __DIR__ . "/../lib/session.php";
adminOnly();

require_once __DIR__. "/templates/header.php";
require_once __DIR__. "/../lib/pdo.php";
require_once __DIR__. "/../lib/employer.php";



if (isset($_GET['page'])) {
    $page = (int)$_GET['page'];
} else {
    $page = 1;
}

$employers = getEmployer($pdo, _ADMIN_ITEM_PER_PAGE_, $page);

$totalEmployer = getTotalEmployer($pdo);

$totalPages = ceil($totalEmployer / _ADMIN_ITEM_PER_PAGE_);


?>

<h1 class="py-5">Listes des Employers</h1>

<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Job</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($employers as $employer) {?>
        <tr>
            <th scope="row"><?=$employer['id']?></th>
            <td><?=$employer['firstname']?></td>
            <td><?=$employer['lastname']?></td>
            <td><?=$employer['job']?></td>
            <td>
                <a href="addEmployer.php">Add</a>
                <a href="employer_delete.php?id=<?= $employer['id'] ?>"
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