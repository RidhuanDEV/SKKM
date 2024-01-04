<?php
$errors = [];

if (isset($_POST['submit'])) {
    include 'koneksi.php';

    // Validate input
    $nrp = $_POST['nrp'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $encryptPass = md5($password);
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $lahir = $_POST['lahir'];
    $angkatan = $_POST['angkatan'];
    
    $nama_gambar = $_FILES['foto']['name'];
    $tmp_nama_gambar = $_FILES['foto']['tmp_name'];

    //menyimpan gambar ke dalam folder
    move_uploaded_file($tmp_nama_gambar,'foto/'.$nama_gambar);

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
            $querySQL = "INSERT INTO `datamahasiswa` (`nrp`, `nama`, `password`, `alamat`, `email`, `tgl_lahir`,`foto`, `role`,`angkatan`,`nilai`) VALUES ('$nrp','$nama', '$encryptPass','$alamat','$nama_gambar','$email','$lahir', 'user','$angkatan',0)";

            // mengeksekusi query
            $hasil = $koneksi->query($querySQL);

            // $querykegiatan1 = "INSERT INTO kegiatan1 (nrp) values ('$nrp')";
            // $querykegiatan2 = "INSERT INTO kegiatan2 (nrp) values ('$nrp')";
            // $querykegiatan3 = "INSERT INTO kegiatan3 (nrp) values ('$nrp')";
            // $querykegiatan4 = "INSERT INTO kegiatan4 (nrp) values ('$nrp')";
            // $querykegiatan5 = "INSERT INTO kegiatan5 (nrp) values ('$nrp')";
            // $querykegiatan6 = "INSERT INTO kegiatan6 (nrp) values ('$nrp')";
            // $query = $querykegiatan1 . ';' . $querykegiatan2 . ';' . $querykegiatan3 . ';' . $querykegiatan4 . ';' . $querykegiatan5 . ';' . $querykegiatan6;

            // $result = $koneksi->multi_query($query);

            // kembali ke halaman index
            header('Location: index.php');
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
    <link href="goput.css" rel="stylesheet">
</head>
<header class="w-full h-20 bg-slate-900 border flex border-black">
    <div class="w-1/6 h-full justify-center flex items-center ">
        <img src="LOGOITI.png" alt="ITI" class="w-16 h-16">
    </div>
    <div class="w-5/6 h-full flex">
        <div class="w-5/6 h-full flex items-center">
            <p class="text-white text-4lg font-mono">SATUAN KREDIT KEGIATAN MAHASISWA ITI</p>
        </div>
        <div class="w-1/6 h-full flex items-center justify-center">
            <a href="index.php"
                class="border-2 border-white p-2 text-white text-2lg font-mono bg-green-500 rounded-3lg ring-offset-white hover:bg-green-600 hover:scale-105 hover:rounded-full active:scale-90">Kembali</a>
        </div>
    </div>
</header>
<body class="bg-white">

    

    <section class="container mx-auto my-2x p-4 bg-white rounded-md shadow-md">
        <h2 class="text-2xl font-bold mb-4">Buat Data Mahasiswa</h2>

        <form action="" method="post">
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
                    <td class="p-2"><label class="block mb-2 text-lg font-medium text-gray-900" for="file_input">Upload file</label></td>
                    <td class="p-2"><input class="block w-3/4 text-lg text-gray-900 border border-black rounded-lg cursor-pointer bg-gray-100 focus:outline-none" aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-lg text-gray-700 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p></td>   
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