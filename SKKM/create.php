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
            $querySQL = "INSERT INTO `datamahasiswa` (`nrp`, `nama`, `password`, `alamat`, `email`, `tgl_lahir`, `role`,`angkatan`,`nilai`) VALUES ('$nrp','$nama', '$encryptPass','$alamat','$email','$lahir', 'user','$angkatan',0)";

            // mengeksekusi query
            $hasil = $koneksi->query($querySQL);

            $querykegiatan1 = "INSERT INTO kegiatan (nrp) values ('$nrp')";
            $querykegiatan2 = "INSERT INTO kegiatan2 (nrp) values ('$nrp')";
            $querykegiatan3 = "INSERT INTO kegiatan3 (nrp) values ('$nrp')";
            $querykegiatan4 = "INSERT INTO kegiatan4 (nrp) values ('$nrp')";
            $querykegiatan5 = "INSERT INTO kegiatan5 (nrp) values ('$nrp')";
            $querykegiatan6 = "INSERT INTO kegiatan6 (nrp) values ('$nrp')";
            $query = $querykegiatan1 . ';' . $querykegiatan2 . ';' . $querykegiatan3 . ';' . $querykegiatan4 . ';' . $querykegiatan5 . ';' . $querykegiatan6;

            $result = $koneksi->multi_query($query);

            // kembali ke halaman index
            header('Location: halamanadmin.php');
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-white">

    <header class="bg-blue-500 p-4 text-white">
        <h1 class="text-2xl pb-2">Halaman Tambah Data</h1>
        <nav>
            <a href="halamanadmin.php" class="text-white border-2 border-white rounded-lg p-4 flex justify-center hover:bg-green-300">Home</a>
        </nav>
    </header>

    <section class="container mx-auto my-2x p-4 bg-white rounded-md shadow-md">
        <h2 class="text-xl font-bold mb-4">Input Data Mahasiswa</h2>

        <form action="" method="post">
            <table class="w-full border-2 border-black">
                <tr>
                    <td class="p-2"><label for="nrp" class="block">NRP</label></td>
                    <td class="p-2"><input type="number" name="nrp" id="nrp" class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"><label for="nama" class="block">Nama</label></td>
                    <td class="p-2"><input type="text" name="nama" id="nama" class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"><label for="password" class="block">Password</label></td>
                    <td class="p-2"><input type="text" name="password" id="password" class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"><label for="alamat" class="block">Alamat</label></td>
                    <td class="p-2"><textarea name="alamat" id="alamat" class="w-3/4 p-2 border-2 border-black rounded-md" cols="30" rows="10" required></textarea></td>
                </tr>
                <tr>
                    <td class="p-2"><label for="email" class="block">Email</label></td>
                    <td class="p-2"><input type="email" name="email" id="email" class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"><label for="lahir" class="block">Tgl Lahir</label></td>
                    <td class="p-2"><input type="date" name="lahir" id="lahir" class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"><label for="angkatan" class="block">Tahun Angkatan</label></td>
                    <td class="p-2"><input type="number" name="angkatan" id="angkatan" class="w-3/4 p-2 border-2 border-black rounded-md" required></td>
                </tr>
                <tr>
                    <td class="p-2"></td>
                    <td class="p-2"><input type="submit" name="submit" id="submit" class="bg-blue-500 hover:bg-green-500 text-white p-2 border border-black rounded-md cursor-pointer"></td>
                </tr>
            </table>
        </form>
    </section>

</body>

</html>
