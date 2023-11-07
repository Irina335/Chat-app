<?php
session_start();

if (!isset($_SESSION['username'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>Chat app- Sign Up</title>
</head>
<body class="d-flex justify-content-center align-items-center vh-100">
    <div class="w-400 p-5 shadow rounded">
        <form method="POST" action="app/http/signup.php">
            <div class="d-flex justify-content-center align-items-center flex-column ">
                <img src="img/logo.png" class="w-25">
                <h3 class="display-4 fs-1 text-center">
                    Sign Up</h3>
            </div>

            <?php if (isset($_GET['error'])) {?>
            <div class="alert alert-warning" role="alert">
                <?php echo htmlspecialchars($_GET['error']);?>
             </div>
            <?php }

                if (isset($_GET['name'])){
                    $name = $_GET['name'];
                }else $name='';

                if (isset($_GET['username'])){
                    $username = $_GET['username'];
                }else $username='';
            
            ?>

            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" value="<?php $name ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User Name</label>
                <input type="text" name= "username"  value="<?php $username ?>" class="form-control">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
                <input type="file" name="pp" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
            <a href="index.php">Sign up</a>
        </form>
    </div>
</body>
</html>
<?php
}else{
    header("Location: home.php");
    exit;
}
?>