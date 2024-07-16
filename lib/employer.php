<?php


  function getEmployerById(PDO $pdo, int $id)
  {
    $query = $pdo->prepare("SELECT * FROM employers WHERE id = :id");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    return $query->fetch();
  }

  // retourne les images
  function getEmployerImage(string|null $image)
  {
    if ($image === null) {
      return _ASSETS_IMG_PATH_."groupe.jpg";
    } else {
      return _ANIMAUX_IMAGES_FOLDER_.$image;
    }
  } 

  function getEmployer(PDO $pdo, int $limit = null) {
    $sql = 'SELECT * FROM employers ORDER BY id DESC';

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

function getTotalEmployer(PDO $pdo):int
{
    $sql = "SELECT COUNT(*) as total FROM employers";
    $query = $pdo->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function deleteEmployer(PDO $pdo, int $id):bool
{  
    $query = $pdo->prepare("DELETE FROM employers WHERE id = :id");
    $query->bindValue(':id', $id, $pdo::PARAM_INT);
    $query->execute();
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

function addEmployer(PDO $pdo, string $firstname, string $lastname, string $job, string|null $image) {
  $sql = "INSERT INTO `employers` (`firstname`, `lastname`, `job`, `image`)
          VALUES (:firstname, :lastname, :job, :image);";
  $query = $pdo->prepare($sql);
  $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
  $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
  $query->bindParam(':job', $job, PDO::PARAM_STR);
  $query->bindParam(':image', $image, PDO::PARAM_STR);
  return $query->execute();
}

