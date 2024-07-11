<?php


  function getAnimauxById(PDO $pdo, int $id)
  {
    $query = $pdo->prepare("SELECT * FROM animaux WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
  }

  // retourne les images
  function getAnimauxImage(string|null $image)
  {
    if ($image === null) {
      return _ASSETS_IMG_PATH_."groupe.jpg";
    } else {
      return _ZOO_IMG_PATH_.$image;
    }
  } 

  function getAnimaux(PDO $pdo, int $limit = null) {
    $sql = 'SELECT * FROM animaux ORDER BY id DESC';

    if ($limit) {
        $sql .= ' LIMIT :limit';
    }

    $query = $pdo->prepare($sql);

    if ($limit) {
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
    }

    $query->execute();
    return $query->fetchAll();
}


function saveAnimaux(PDO $pdo, int $category_id, string $employer_id, string|null $image_id, string $race, string $name, string $age, string $description, string|null $image) 
{
  $sql = "INSERT INTO `animaux` (`id`, `category_id`, `employer_id`, `image_id`,  `race`, `name`, `age`, `description`, `image`)
           VALUES (NULL, :category_id, :employer_id, :image_id, :race, :name, :age, :description, :image);";
  $query = $pdo->prepare($sql);
  $query->bindParam(':category_id', $category_id, PDO::PARAM_INT);
  $query->bindParam(':employer_id', $employer_id, PDO::PARAM_STR);
  $query->bindParam(':image_id', $image_id, PDO::PARAM_STR);
  $query->bindParam(':race', $race, PDO::PARAM_STR);
  $query->bindParam(':name', $name, PDO::PARAM_STR);
  $query->bindParam(':age', $age, PDO::PARAM_STR);
  $query->bindParam(':description', $description, PDO::PARAM_STR);
  $query->bindParam(':image', $image, PDO::PARAM_STR);
  return $query->execute();
  
}