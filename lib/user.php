<?php
function addUser(PDO $pdo, string $firstname, string $lastname, string $email, string $password)
{
    $sql = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`, `role`)
             VALUES (:firstname, :lastname, :email, :password, :role);";
    $query = $pdo->prepare($sql);

    $password = password_hash($password, PASSWORD_DEFAULT);

    $role = 'user';
    $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
    $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':role', $role, PDO::PARAM_STR);
    return $query->execute();
}

function verifyUserLoginPassword(PDO $pdo, string $email, string $password)
{
    $query = $pdo->prepare("SELECT * FROM users WHERE email = :email");       
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);

            if($user && password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
}

function deleteUser(PDO $pdo, int $id):bool
{  
    $query = $pdo->prepare("DELETE FROM users WHERE id = :id");
    $query->bindValue(':id', $id, $pdo::PARAM_INT);
    $query->execute();
    if ($query->rowCount() > 0) {
        return true;
    } else {
        return false;
    }
}

function getTotalUser(PDO $pdo):int
{
    $sql = "SELECT COUNT(*) as total FROM users";
    $query = $pdo->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_ASSOC);

    return $result['total'];
}

function getUserById(PDO $pdo, int $id)
{
  $query = $pdo->prepare("SELECT * FROM users WHERE id = :id");
  $query->bindParam(':id', $id, PDO::PARAM_INT);
  $query->execute();
  return $query->fetch();
}

function getUser(PDO $pdo, int $limit = null) {
    $sql = 'SELECT * FROM users ORDER BY id DESC';

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