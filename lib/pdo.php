<?php
try
{
  $pdo = new PDO("mysql:dbname=zoocéliande;host=localhost;charset=utf8mb4", "root", "root"); //MAMP

  //$pdo = new PDO("mysql:dbname=zoocéliande;host=localhost;charset=utf8mb4", "root", ""); //XAMPP
}
catch (Exception $e)
{
       die('Erreur : ' . $e->getMessage());
}