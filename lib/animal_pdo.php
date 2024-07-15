<?php


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
 

/*
function addAnimal(PDO $pdo, int $category, string $race, string $name, string $age, string $description, string|null $image) 
{
    $sql = 'INSERT INTO animaux(race, name, age, description, category_id, image)
            VALUES(?, ?, ?, ?, ?, ?)';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam('ssssis', $race, $name, $age, $description, $category, $image);
    $stmt->execute();
}
*/