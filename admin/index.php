<?php
require_once __DIR__. "/../lib/config.php";
require_once __DIR__. "/../lib/session.php";
adminOnly();

require_once __DIR__. "/templates/header.php";

?>
<div class="px-4 py-5 text-left">
    <h1 class="display-5 fw-bold text-body-emphasis">Admin du zoo ZOOCELIANDE</h1>
    <p class="lead mb-4">Backoffice du site zoocéliande pour administer les animaux les employés et les utilisateurs</p>
</div>

<?php require_once __DIR__. "/templates/footer.php"; ?>