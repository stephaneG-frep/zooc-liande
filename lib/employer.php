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

