<?php
include '../login/koneksi.php';
require_once "../login/fungsi.php";
admin();
siswa();
if(isset($_POST['login'])){
    $NRP = mysqli_real_escape_string($koneksi, $_POST['nrp']);
    $pass = mysqli_real_escape_string($koneksi, $_POST['password']);
    $encryptPass = md5($pass);

   $select = mysqli_query($koneksi, "SELECT * FROM `datamahasiswa` WHERE nrp = '$NRP' AND password = '$encryptPass'") or die('query failed');

   if(mysqli_num_rows($select)  > 0){
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row;
        header('location:../mahasiswa/halamansiswa.php');
        die();
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
    <title>Pusat Informasi SKKM ITI</title>
    <link rel="stylesheet" href="../assets/goput.css">
</head>
<style>
@media only screen and (max-width: 1250px) {


    * {
        font-size: small;
    }

    @media only screen and (max-width: 1024px) {


        * {
            font-size: x-small;
        }
    }
}
</style>
<header class="w-full h-20 bg-slate-900 border flex border-black">
    <div class="w-1/6 h-full justify-center flex items-center ">
        <img src="../assets/LOGOITI.png" alt="ITI" class="w-16 h-16">
    </div>
    <div class="w-5/6 h-full flex pl-32">
        <div class="w-5/6 h-full flex items-center">
            <p class="text-white text-4xl font-mono">SATUAN KREDIT KEGIATAN MAHASISWA ITI</p>
        </div>
       
    </div>
</header>
<body>
    <div class="w-full min-h-screen flex">
        <div
            class="w-3/5 min-h-screen flex justify-center text-center items-center bg-gradient-to-r from-gray-500 to-gray-800">
            <div class="p-6 w-3/4 h-3/4  bg-gradient-to-r from-gray-700 to-gray-600 rounded-2xl">
                <h2 class="font-mono text-5xl text-white">SELAMAT DATANG</h2>
                <h3 class="font-mono text-4xl text-white">di Pusat Informasi SKKM ITI</h3>
                <div class="w-full py-4 flex justify-center items-center"><img src="../assets/output-onlinepngtools.png"
                        alt="info.png" class="w-1/2 h-1/2 mr-4 ">
                    <h4 class="font-mono text-3xl text-white">Silahkan Login Terlebih Dahulu</h4>
                </div>

                <div class="flex justify-center">
                    <div
                        class="w-2/5 h-full flex justify-center items-center rounded-md bg-gray-200 mt-4 hover:bg-black hover:text-white">
                        <a href="adminlogin.php" class="w-4/5 h-full pl-2 font-mono">Halaman Login Admin</a><a
                            href="adminlogin.php" class="w-1/8 py-1"><img src="../assets/enter-svgrepo-com.svg" alt=">"
                                class="w-6 h-6 rounded-2xl bg-gray-200 hover:bg-white"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-2/5 min-h-screen flex justify-center items-center ">
            <div id="Forms" class="flex flex-col gap-y-6 text-center w-9/12 p-8 rounded-2xl shadow-2xl">
                <h3 class="font-mono text-2xl">Mahasiswa</br> Institut Teknologi Indonesia</h3>
                <form class="text-left font-medium flex flex-col gap-[16px]" method="post">
                    <div class="flex flex-col">
                        <label class="mb-2" for="nrp">NRP</label>
                        <input type="text" id="nrp"
                            class="border rounded-md border-gray-400 hover:border-black focus:border-black p-2"
                            name="nrp" placeholder="Masukkan NRP" required />
                    </div>

                    <div class="flex flex-col">
                        <label class="mb-2" for="password">Password</label>
                        <div class="relative">
                            <input type="password" id="password"
                                class="border rounded-md border-gray-400 hover:border-black focus:border-black p-2 w-full"
                                name="password" placeholder="Masukkan password" required />
                        </div>
                        <div class="pt-4 font-medium flex">
                            <p class="">Ada Kendala Saat Login ? Hubungi</p><a href="https://wa.me/082113472156" target="_blank" class="pl-4 text-red-500 hover:text-blue-500 hover:underline">ADMIN</a>
                        </div>
                        <button type="submit" name="login"
                            class="mt-4 text-center font-sans p-2  bg-blue-500 shadow-xl hover:bg-green-500 text-white active:scale-105 transition-all rounded-md  ">Login</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</body>
<footer class="bg-gray-900 text-center">
    <h3 class="pl-4 pt-4 text-white">Satuan Kredit Kegiatan Mahasiswa (SKKM) Institut Teknologi Indonesia</h3>
    <h3 class="pl-4 pb-4 text-white">&COPY; Copyright 2023 Institut Teknologi Indonesia. All Right Reserved.</h3>
</footer>

</html>