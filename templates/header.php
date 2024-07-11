<?php
   require_once __DIR__. "/../lib/session.php";
   require_once __DIR__. "/../lib/pdo.php";
   require_once __DIR__. "/../lib/config.php";
   //require_once __DIR__. "/../lib/user.php";

 
   $currentPage = basename($_SERVER['SCRIPT_NAME']);      
  
?>


<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le zoo </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/override-bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>


<div class="container" style="background: #9E4784;">

    <header
        class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="home.php" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
            <img src="uploads/images/logo-zoo.jpg" alt="" width="200" height="100">
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="home.php" class="nav-link px-2 link-secondary">Home</a></li>
            <li><a href="animaux.php" class="nav-link px-2 link-dark">Les animaux</a></li>
            <li><a href="employer.php" class="nav-link px-2 link-dark">Le personnel</a></li>
            <li><a href="#" class="nav-link px-2 link-dark">FAQs</a></li>
            <li><a href="a_propos.php" class="nav-link px-2 link-dark">A-propos</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <button type="button" class="btn btn-outline-primary me-2">Login</button>
            <button type="button" class="btn btn-primary">Sign-up</button>
        </div>
    </header>
</div>

<!-- <body style="background:#125C13;">   /zoo/index.php?controller=animaux&action=show -->
<!-- <body style="background:#1D5B79;"> -->
<!-- <body style="background-image: url('uploads/books/cascade.jpeg');"> -->

    <main>