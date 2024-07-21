<?php

function getPhoto(PDO $pdo) {
  $sql = 'SELECT * FROM images';
  $query = $pdo->prepare($sql);
  $query->execute();
  return $query->fetchAll();
}

function getSelectImage(PDO $pdo)
{
  $sql = "SELECT animaux.*,
          images.name, images.image
          AS image_complete
          FROM animaux
          INNER JOINT images ON
          animaux.image_id = images.id";
  $query = $pdo->prepare($sql);
  $query->execute();
  return $query->fetchAll(PDO::FETCH_ASSOC);
  
}





