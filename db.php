<?php 
try{
    $username = 'root';
    $password = '';
    $connection = new PDO('mysql:host=localhost;dbname=cruddb',$username,$password);
}catch(PDOException $e){
    echo 'error : '+$e -> getMessage();
}
    


?>