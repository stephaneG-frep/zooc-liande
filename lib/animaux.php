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
    return $query->fetchAll(PDO::FETCH_ASSOC);
    

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

function modifAnimal(PDO $pdo, int $category, string $race, string $name, string $age, string $description, string|null $image, int $id = null):bool
{
   
        // UPDATE
        $query = $pdo->prepare("UPDATE `animaux` SET `category_id` = :category_id, `race` = :race, `name` = :name,
                                `age` = :age, `description` = :description, `image` = :image,
                                WHERE `id` = :id;");
        $query->bindValue(':id', $id, $pdo::PARAM_INT);

    
        $query->bindValue(':category_id', $category, $pdo::PARAM_INT);
        $query->bindValue(':race', $race, $pdo::PARAM_STR);
        $query->bindValue(':name', $name, $pdo::PARAM_STR);
        $query->bindValue(':age', $age, $pdo::PARAM_STR);
        $query->bindValue(':description', $description, $pdo::PARAM_STR);
        $query->bindValue(':image', $image, $pdo::PARAM_STR);
        
        return $query->execute();


        $res = $query->execute();
    if ($res) {
        if ($id) {
            return $id;
        } else {
            return $pdo->lastInsertId();
        }
    } else {
        return false;
    }
    
}

function addAnimal(PDO $pdo, int $category_id, int|null $image_id, string $race, string $name, string $age, string $description, string|null $image) {
    $sql = "INSERT INTO `animaux` (`category_id`, `image_id`, `race`, `name`, `age`, `description`, `image`)
            VALUES (:category_id, :image_id, :race, :name, :age, :description, :image);";
    $query = $pdo->prepare($sql);
    $query->bindParam(':category_id', $category_id, PDO::PARAM_INT);
    $query->bindParam(':image_id', $image_id, PDO::PARAM_INT);
    $query->bindParam(':race', $race, PDO::PARAM_STR);
    $query->bindParam(':name', $name, PDO::PARAM_STR);
    $query->bindParam(':age', $age, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);
    $query->bindParam(':image', $image, PDO::PARAM_STR);
    return $query->execute();
}
 


