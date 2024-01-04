<?php
require_once "fungsi.php";
if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}
admin();
$errors = [];
include 'koneksi.php';
    $id = $_GET['nrp'];
    // Check if NRP already exists
    $sqlQuery = "SELECT * FROM datamahasiswa WHERE nrp = '$id'";
    $result = $koneksi->query($sqlQuery);
    $row = mysqli_fetch_assoc($result);
if (isset($_POST['submit'])) {

    // Validate input
    $nrp = $_POST['nrp'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $lahir = $_POST['lahir'];
    $angkatan = $_POST['angkatan'];

     // membuat query
     $sqlQuerys = "SELECT * FROM datamahasiswa WHERE nrp = '$nrp'";
     $results = $koneksi->query($sqlQuery);
        if($results->num_rows == 0){
        $querySQL = "UPDATE datamahasiswa SET nrp = '$nrp',nama = '$nama',alamat = '$alamat',email = '$email',tgl_lahir = '$lahir',angkatan = '$angkatan' WHERE nrp = '$id'";
        $Eksekusi = $koneksi->query($querySQL);
         // kembali ke halaman index
         header('Location: index.php');
        }else{
            echo "<script type='text/javascript'>alert('NRP Tersebut sudah di pakai !');</script>";
           
        }
        
       

       
    }
    if (empty($nrp)) {
        $errors[] = "NRP is required.";
    }

    if (empty($nama)) {
        $errors[] = "Nama is required.";
    }

    if (empty($password)) {
        $errors[] = "Password is required.";
    }

    if (empty($alamat)) {
        $errors[] = "Alamat is required.";
    }

    if (empty($email)) {
        $errors[] = "Email is required.";
    }

    if (empty($lahir)) {
        $errors[] = "Tanggal Lahir is required.";
    }
   
    if (empty($angkatan)) {
        $errors[] = "angkatan is required.";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href="goput.css" rel="stylesheet">
</head>
<header class="w-full h-20 bg-slate-900 border flex border-black">
    <div class="w-1/6 h-full justify-center flex items-center ">
        <img src="LOGOITI.png" alt="ITI" class="w-16 h-16">
    </div>
    <div class="w-5/6 h-full flex">
        <div class="w-5/6 h-full flex items-center">
            <p class="text-white text-4xl font-mono">SATUAN KREDIT KEGIATAN MAHASISWA ITI</p>
        </div>
        <div class="w-1/6 h-full flex items-center justify-center">
            <a href="index.php"
                class="border-2 border-white p-2 text-white text-2xl font-mono bg-green-500 rounded-3xl ring-offset-white hover:bg-green-600 hover:scale-105 hover:rounded-full active:scale-90">Kembali</a>
        </div>
    </div>
</header>

<body class="bg-white">
    <section class="container mx-auto my-2x p-4 bg-white rounded-md shadow-md w-full h-[580px] ">
        <h2 class="text-xl font-bold mb-4">Ubah Data Mahasiswa</h2>

        <form action="" method="post">
            <table class="w-full border-2 border-black">
                <tr>
                    <td class="p-2"><label for="nrp" class="block">NRP</label></td>
                    <td class="p-2"><input type="number" name="nrp" id="nrp" value="<?php echo $row['nrp']?>"
                     class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"><label for="nama" class="block">Nama</label></td>
                    <td class="p-2"><input type="text" name="nama" id="nama" value="<?php echo $row['nama']?>"
                     class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"><label for="alamat" class="block">Alamat</label></td>
                    <td class="p-2"><input type="textarea" name="alamat" id="alamat" value="<?php echo $row['alamat']?>"
                     class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"><label for="email" class="block">Email</label></td>
                    <td class="p-2"><input type="email" name="email" id="email" value="<?php echo $row['email']?>"
                     class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"><label for="lahir" class="block">Tgl Lahir</label></td>
                    <td class="p-2"><input type="date" name="lahir" id="lahir" value="<?php echo $row['tgl_lahir']?>"
                     class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"><label for="angkatan" class="block">Tahun Angkatan</label></td>
                    <td class="p-2"><input type="number" name="angkatan" id="angkatan" value="<?php echo $row['angkatan']?>"
                     class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"></td>
                    <td class="p-2"><input type="submit" name="submit" id="submit" class="bg-blue-500 hover:bg-green-500 text-white p-2 border border-black rounded-md cursor-pointer"></td>
                </tr>
            </table>
        </form>
    </section>

</body>
<footer class="bg-gray-900 text-center w-full">
    <h3 class="pl-4 pt-4 text-white">Satuan Kredit Kegiatan Mahasiswa (SKKM) Institut Teknologi Indonesia</h3>
    <h3 class="pl-4 pb-4 text-white">&COPY; Copyright 2023 Institut Teknologi Indonesia. All Right Reserved.</h3>
</footer>
</html>
