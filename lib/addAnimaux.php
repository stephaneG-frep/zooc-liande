<?php

$pdo = new mysqli("mysql:dbname=zoocéliande;host=localhost;charset=utf8mb4", "root", "root");

if ($pdo->connect_error) {
    die('Erreur de connexion a la BDD : ' . $pdo->connect_errno);
}

$sql = "INSERT INTO animaux (category_id, race, name, age, description, image)
         VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $pdo->prepare($sql);
$stmt->bind_param('ssssis', $category_id, $race, $name, $age, $description, $image);

$category_id = $_POST['category'];
$race = $_POST['race'];
$name = $_POST['name'];
$age = $_POST['age'];
$description = ['description'];
$image = $_FILES['image']['name'];

if (is_uploaded_file($_FILES['image']['tmp_name'])) 
{
   move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/images/'.$image);

} else {
    $image = null;
}
$stmt->execute();

if ($stmt->affected_rows > 0) {
    echo 'Animal ajouté';
} else {
    echo "erreur lors de l'ajout : ".$pdo->error;
}
?>

