<?php

function getCategories(PDO $pdo, int $limit = null) {
    $sql = 'SELECT * FROM category ORDER BY id DESC';

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

function getCategorieById(PDO $pdo, int $id)
  {
    $query = $pdo->prepare("SELECT * FROM category WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
  }

function getTotalCategorie(PDO $pdo):int
  {
      $sql = "SELECT COUNT(*) as total FROM category";
      $query = $pdo->prepare($sql);
      $query->execute();
      $result = $query->fetch(PDO::FETCH_ASSOC);
  
      return $result['total'];
  }

function deleteCategorie(PDO $pdo, int $id):bool
  {  
      $query = $pdo->prepare("DELETE FROM category WHERE id = :id");
      $query->bindValue(':id', $id, $pdo::PARAM_INT);
      $query->execute();
      if ($query->rowCount() > 0) {
          return true;
      } else {
          return false;
      }
  }

function addCategorie(PDO $pdo, string $espece) {
    $sql = "INSERT INTO `category` (`espece`)
            VALUES (:espece);";
    $query = $pdo->prepare($sql);
    $query->bindParam(':espece', $espece, PDO::PARAM_STR);
    
    return $query->execute();
  }



