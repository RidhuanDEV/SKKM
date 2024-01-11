<?php
include '../login/koneksi.php';
require_once "../login/fungsi.php";
$errors = [];
if(!isset($_SESSION['user_id'])){
    header('location:../login/login.php');
}
admin();
if (isset($_POST['submit'])) {

    // Validate input
    $nrp = $_POST['nrp'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $encryptPass = md5($password);
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $lahir = $_POST['lahir'];
    $angkatan = $_POST['angkatan'];
    
    $uploadDirectory = '../data/'.$nrp.'/';
    $nama_foto = isset($_FILES['foto']['name']) ? $_FILES['foto']['name'] : null;
    $tmp_nama_foto = isset($_FILES['foto']['tmp_name']) ? $_FILES['foto']['tmp_name'] : null;

    
    if (!empty($nama_foto) && !empty($tmp_nama_foto)) {
        $destination = $uploadDirectory . $nama_foto;
        
    }
    
    if (empty($nrp)) {
        $errors[] = "foto is required.";
    }
    if (empty($nama_foto)) {
        $errors[] = "NRP is required.";
    }

    if (empty($nama)) {
        $errors[] = "Nama is required.";
    }

    if (empty($password)) {
        $errors[] = "Password is required   .";
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
        $errors[] = "Tahun angkatan is required.";
    }

    // Display errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        // Check if NRP already exists
        $sqlQuery = "SELECT nrp FROM datamahasiswa WHERE nrp = '$nrp'";
        $result = $koneksi->query($sqlQuery);

        if ($result->num_rows == 0) {
            // membuat query
            $querySQL = "INSERT INTO `datamahasiswa` (`nrp`, `nama`, `password`, `alamat`, `email`, `tgl_lahir`,`foto`, `role`,`angkatan`,`nilai`) VALUES ('$nrp','$nama', '$encryptPass','$alamat','$email','$lahir','$nama_foto','user','$angkatan',0)";

            // mengeksekusi query
            $hasil = $koneksi->query($querySQL);
            mkdir("../data/$nrp");
            move_uploaded_file($tmp_nama_foto, $destination);
            // kembali ke halaman index
            header('Location:../admin/index.php');
        } else {
            // NRP already used, display error message
            echo "NRP '$nrp' has already been used. Please choose a different NRP.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href="../assets/goput.css" rel="stylesheet">
</head>
<header class="w-full h-20 bg-slate-900 border flex border-black">
    <div class="w-1/6 h-full justify-center flex items-center ">
        <img src="../assets/LOGOITI.png" alt="ITI" class="w-16 h-16">
    </div>
    <div class="w-5/6 h-full flex">
        <div class="w-5/6 h-full flex items-center">
            <p class="text-white text-3xl font-mono">SATUAN KREDIT KEGIATAN MAHASISWA ITI</p>
        </div>
        <div class="w-1/6 h-full flex items-center justify-center">
            <a href="../admin/index.php"
                class="border-2 border-white p-2 text-white text-2lg font-mono bg-green-500 rounded-3lg ring-offset-white hover:bg-green-600 hover:scale-105 hover:rounded-full active:scale-90">Kembali</a>
        </div>
    </div>
</header>
<body class="bg-white">

    

    <section class="container mx-auto my-2x p-4 bg-white rounded-md shadow-md">
        <h2 class="text-2xl font-bold mb-4">Buat Data Mahasiswa</h2>

        <form action="create.php" method="post"  enctype="multipart/form-data">
            <table class="w-full border-2 border-black">
                <tr>
                    <td class="p-2"><label for="nrp" class="block mb-2 text-lg font-medium text-gray-900">NRP</label></td>
                    <td class="p-2"><input type="number" name="nrp" id="nrp"
                            class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"><label for="nama" class="block mb-2 text-lg font-medium text-gray-900">Nama</label></td>
                    <td class="p-2"><input type="text" name="nama" id="nama"
                            class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"><label for="password" class="block mb-2 text-lg font-medium text-gray-900">Password</label></td>
                    <td class="p-2"><input type="text" name="password" id="password"
                            class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"><label for="alamat" class="block mb-2 text-lg font-medium text-gray-900">Alamat</label></td>
                    <td class="p-2"><textarea name="alamat" id="alamat"
                            class="w-3/4 p-2 border-2 border-black rounded-md" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="p-2"><label for="email" class="block mb-2 text-lg font-medium text-gray-900">Email</label></td>
                    <td class="p-2"><input type="email" name="email" id="email"
                            class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"><label class="block mb-2 text-lg font-medium text-gray-900" for="foto">Upload Foto anda</label></td>
                    <td class="p-2"><input class="block w-3/4 text-lg text-gray-900 border border-black rounded-lg cursor-pointer bg-gray-100 focus:outline-none" id="foto" type="file" name="foto"></td>   
                </tr>
                <tr>
                    <td class="p-2"><label for="lahir" class="block mb-2 text-lg font-medium text-gray-900">Tgl Lahir</label></td>
                    <td class="p-2"><input type="date" name="lahir" id="lahir"
                            class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"><label for="angkatan" class="block mb-2 text-lg font-medium text-gray-900">Tahun Angkatan</label></td>
                    <td class="p-2"><input type="number" name="angkatan" id="angkatan"
                            class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"></td>
                    <td class="p-2"><input type="submit" name="submit" id="submit"
                            class="bg-blue-500 hover:bg-green-500 text-white p-2 px-8 active:scale-95 border border-black rounded-md cursor-pointer">
                    </td>
                </tr>
            </table>
        </form>
    </section>

</body>
<footer class="bg-gray-900 text-center">
    <h3 class="pl-4 pt-4 text-white">Satuan Kredit Kegiatan Mahasiswa (SKKM) Institut Teknologi Indonesia</h3>
    <h3 class="pl-4 pb-4 text-white">&COPY; Copyright 2023 Institut Teknologi Indonesia. All Right Reserved.</h3>
</footer>
</html>