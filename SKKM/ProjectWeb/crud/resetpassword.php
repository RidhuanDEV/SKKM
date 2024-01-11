<?php
require_once "../login/fungsi.php";
include "../login/koneksi.php";
if(!isset($_SESSION['user_id'])){
    header('location:../login/login.php');
}
if($_SESSION['user_id']['role'] == 'admin' || $_SESSION['user_id']['role'] == 'admin_pka' ){
    $nrp = $_GET['nrp'];
}else{
    $nrp = $_SESSION['user_id']['nrp'];
}
if(isset($_POST['reset'])){
    $passwordlama = $_POST['passwordlama'];
    $passwordbaru = $_POST['passwordbaru'];
    $encryptPass = md5($passwordlama);
    $encryptPassnew = md5($passwordbaru);

    $Query = "SELECT * FROM datamahasiswa WHERE nrp = $nrp";
    $Eksekusi = $koneksi->query($Query);
    if(mysqli_num_rows($Eksekusi) > 0){
        $row = mysqli_fetch_assoc($Eksekusi);
    if($_SESSION['user_id']['role'] != 'admin' && $_SESSION['user_id']['role'] != 'admin_pka' ){
        if($encryptPass === $row['password']){
            $update = "UPDATE datamahasiswa SET `password` = '$encryptPassnew' WHERE `nrp` = $nrp";
            $EksekusiUpdate = $koneksi->query($update);
            header('location:../login/logout.php');
        }else{
            echo "<script type='text/javascript'>alert('Password Lama anda Salah');</script>";
        }
    }else {
        $update = "UPDATE datamahasiswa SET `password` = '$encryptPassnew' WHERE `nrp` = $nrp";
        $EksekusiUpdate = $koneksi->query($update);
        header('location:../admin/index.php');
    }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="../assets/goput.css">
</head>
<style>
    *{
       color: white;
    }
</style>
<body>
    <div class="w-full h-screen flex justify-center items-center bg-cover" style="background-image: url(../assets/reset.jpg)">
        <div class="w-1/4 h-1/2">
            <div class="flex justify-center mb-4 text-2xl font-mono">
            <h3>Reset Password</h3>
            </div>
            <?php
           
                echo ($_SESSION['user_id']['role'] != 'admin' && $_SESSION['user_id']['role'] != 'admin_pka'?"
                <form class='text-left font-medium flex flex-col gap-[16px]' method='post'>
                    <div class='flex flex-col'>
                        <label class='mb-2' for='passwordlama'>Password Lama</label>
                        <input type='text' id='passwordlama'
                            class='border rounded-md bg-transparent border-white p-2'
                            name='passwordlama' placeholder='Password Lama' required />
                    </div>

                    <div class='flex flex-col'>
                        <label class='mb-2' for='PasswordBaru'>Password</label>
                        <div class='relative'>
                            <input type='PasswordBaru' id='PasswordBaru'
                                class='border rounded-md border-white p-2 mb-8 bg-transparent w-full'
                                name='passwordbaru' placeholder='Password Baru' required />
                        </div>

                        <button type='submit' name='reset'
                            class='border rounded-md border-white p-2 bg-transparent w-full hover:text-blue-400 hover:border-blue-400 active:scale-95'>Reset</button>
                    </div>
            </form>":"
                <form class='text-left font-medium flex flex-col gap-[16px]' method='post'>
                <div class='flex flex-col'>
                <label class='mb-2' for='PasswordBaru'>Password</label>
                <div class='relative'>
                    <input type='PasswordBaru' id='PasswordBaru'
                        class='border rounded-md border-white p-2 mb-8 bg-transparent w-full'
                        name='passwordbaru' placeholder='Password Baru' required />
                </div>

                <button type='submit' name='reset'
                    class='border rounded-md border-white p-2 bg-transparent w-full hover:text-blue-400 hover:border-blue-400 active:scale-95'>Reset</button>
                </div>
                </form>")
            ;
            ?>
        </div>
    </div>
</body>
</html>