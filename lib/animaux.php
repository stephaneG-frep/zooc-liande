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
      return _ANIMAUX_IMAGES_FOLDER_.htmlentities($image);
    }
  } 

  function getAnimaux(PDO $pdo, int $limit = null, int $page = null)
   {
    $sql = 'SELECT * FROM animaux ORDER BY id DESC';

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
    $animaux = $query->fetchAll(PDO::FETCH_ASSOC);

    return $animaux;

}

function getTotalAnimaux(PDO $pdo):int
{
    $sql = "SELECT COUNT(*) as total FROM animaux";
    $query = $pdo->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function deleteAnimaux(PDO $pdo, int $id):bool
{  
    $query = $pdo->prepare("DELETE FROM animaux WHERE id = :id");
    $query->bindValue(':id', $id, $pdo::PARAM_INT);
    $query->execute();
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}


function addAnimal(PDO $pdo, int|null $image_id, string $race, string $name, string $age, string $description, string $espece, string|null $image) 
{
    $sql = "INSERT INTO `animaux` (`image_id`, `race`, `name`, `age`, `description`, `espece`, `image`)
            VALUES (:image_id, :race, :name, :age, :description, :espece, :image);";
    $query = $pdo->prepare($sql);
   
    $query->bindParam(':image_id', $image_id, PDO::PARAM_INT);
    $query->bindParam(':race', $race, PDO::PARAM_STR);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':age', $age, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->bindParam(':espece', $espece, PDO::PARAM_STR);
    $query->bindParam(':image', $image, PDO::PARAM_STR);
    return $query->execute();
}
 


