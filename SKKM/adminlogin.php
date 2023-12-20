<?php
include 'koneksi.php';
require_once "fungsi.php";
siswa();
admin();
if(isset($_POST['login'])){

   $username = mysqli_real_escape_string($koneksi, $_POST['username']);
   $pass = mysqli_real_escape_string($koneksi, $_POST['password'])  ;

   $select = mysqli_query($koneksi, "SELECT * FROM `admin` WHERE username = '$username' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row;
        header('location:index.php');
        exit();
   }else{
       echo "<script type='text/javascript'>alert('Username atau Password Salah !');</script>";
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Page</title>
    </head>
    <style>
        .login{
            display: flex;
            align-items: center;
            min-height: 100vh;
            border: 2px solid black;
            justify-content: center;
            padding: 20px;
            gap: 10px;
        }
        .login form{
            border: 2px solid grey;
            width: 500px;
            height: 400px;
            border-radius: 10px;
            padding: 50px;
        text-align: center;

    }
    .login h3{
        font-family: Arial, Helvetica, sans-serif;
    }
    .login form input{
        margin: 10px 0;
        width: 200px;
        padding: 12px 14px;
        border-radius: 10px;
    }
</style>
<body>
    <div class="login">
        <form action="" method="post">
            <h3>Login Page</h3>
            <input type="text" name="username" id="username" placeholder="Username"><br>
            <input type="password" name="password" id="password" placeholder="Password"><br>
            <input type="submit" name="login" id="login" value="Login">
            <p>Login Sebagai Siswa ? <a href="login.php">Siswa</a></p>
        </form>
    </div>
</body>
</html>