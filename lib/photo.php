<?php

function getPhoto(PDO $pdo) {
  $sql = 'SELECT * FROM images';
  $query = $pdo->prepare($sql);
  $query->execute();
  return $query->fetchAll();
}