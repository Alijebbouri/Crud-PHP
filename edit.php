<?php require 'header.php'; ?>
<?php require 'db.php'; 
    $id = $_GET['id'];
    $sql = 'SELECT * FROM people WHERE id=:id';
    $statement = $connection->prepare($sql);
    $statement->execute([':id' => $id ]);
    $person = $statement->fetch(PDO::FETCH_OBJ);

?>
<?php 
if(isset($_POST['send'])){
    $user = $_POST['name'];
    $email = $_POST['email'];
    $updateData = $connection -> prepare('update people set name=:name ,email=:email where id=:id');
    if($updateData -> execute([':id' => $id ,':name'=>$user,':email'=>$email])){
        echo 'update sussces ';
        header('location:index.php');
    }else {
        echo 'Failed';
    }
}
?>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h2>Create a person</h2>
            </div>
            <div class="card-body">
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text"value="<?= $person -> name?>" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" value="<?= $person -> email?>" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <button type='submit' name='send' class="btn btn-info">Create a person</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>  