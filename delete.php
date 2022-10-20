<?php require 'db.php'; 
$id = $_GET['id'];
$statement = $connection->prepare('DELETE FROM people WHERE id=:id');
if($statement->execute([':id' => $id])){
    header('location:index.php');
}
?>