<?php require 'header.php'; ?>
<?php require 'db.php'; ?>
<?php 
$message = '';
if(isset($_POST['send'])){
    $user = $_POST['name'];
    $email = $_POST['email'];
    $addData = $connection -> prepare('insert into people (name,email) values(:user,:email)');
    $addData -> bindParam('user',$user);
    $addData -> bindParam('email',$email);
    if($addData -> execute()){
        $message = 'succes created';
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
                <?php if(!empty($message)) :?>
                    <div class="alert alert-success">
                        <?php echo $message; ?>
                    </div>
                <?php endif ?>
                <form action="#" method="post">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <button type='submit' name='send' class="btn btn-info">Create a person</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require 'footer.php'; ?>   