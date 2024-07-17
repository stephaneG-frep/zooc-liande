<?php

function getImage(PDO $pdo, int $limit = null, int $page = null) 
{
    $sql = 'SELECT * FROM images ORDER BY id DESC';

    if ($limit && !$page) {
        $sql .= ' LIMIT :limit';
    }
    if ($page) {
      $sql .= " LIMIT :offset, :limit";
    }
    
    $query = $pdo->prepare($sql);

    if ($limit) {
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    }
    if ($page) {
      $offset = ($page - 1) * $limit;
      $query->bindValue(":offset", $offset, PDO::PARAM_INT);
    }
    
    $query->execute();
    $images = $query->fetchAll(PDO::FETCH_ASSOC);
    return $images;
}

function getImageById(PDO $pdo, int $id)
  {
    $query = $pdo->prepare("SELECT * FROM images WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
  }

function getImageImage(string|null $image)
  {
    if ($image === null) {
      return _ASSETS_IMG_PATH_."groupe.jpg";
    } else {
      return _ANIMAUX_IMAGES_FOLDER_.htmlentities($image);
    }
  }  

function getTotalImage(PDO $pdo):int
  {
      $sql = "SELECT COUNT(*) as total FROM images";
      $query = $pdo->prepare($sql);
      $query->execute();
      $result = $query->fetch(PDO::FETCH_ASSOC);
  
      return $result['total'];
  }

function deleteImage(PDO $pdo, int $id):bool
  {  
      $query = $pdo->prepare("DELETE FROM images WHERE id = :id");
      $query->bindValue(':id', $id, $pdo::PARAM_INT);
      $query->execute();
      if ($query->rowCount() > 0) {
          return true;
      } else {
          return false;
      }
  }

function addImage(PDO $pdo, string $name, string $image) {
    $sql = "INSERT INTO `images` (`name`, image)
            VALUES (:name, :image);";
    $query = $pdo->prepare($sql);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':image', $image, PDO::PARAM_STR);
  
    $query->execute();
    if ($query->rowCount() > 0) {
      return true;
  } else {
      return false;
  }

}

function newImage(PDO $pdo, string $name, string $image)
{
  $sql = "INSERT INTO `images`(name, image)
          VALUES (?, ?)";
  $query = $pdo->prepare($sql);
  $query->bindParam('ss', $name, $image);
  $query->execute();
}