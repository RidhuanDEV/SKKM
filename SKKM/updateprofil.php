<?php
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
    $password = $_POST['password'];
    $encryptPass = md5($password);
    $alamat = $_POST['alamat'];
    $email = $_POST['email'];
    $lahir = $_POST['lahir'];
    $angkatan = $_POST['angkatan'];

     // membuat query

        $querySQL = "UPDATE datamahasiswa SET nrp = '$nrp',nama = '$nama',password = '$encryptPass',alamat = '$alamat',email = '$email',tgl_lahir = '$lahir',angkatan = '$angkatan' WHERE nrp = '$id'";
        $Eksekusi = $koneksi->query($querySQL);

        
        if ($Eksekusi) {
            echo "Update successful!";
        } else {
            echo "Error updating record: " . $koneksi->error;
        }


        // kembali ke halaman index
        header('Location: halamanadmin.php');
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-white">

    <header class="bg-blue-500 p-4 text-white">
        <h1 class="text-2xl pb-2">Halaman Tambah Data</h1>
        <nav>
            <a href="index.php" class="text-white border-2 border-white rounded-lg p-4 flex justify-center hover:bg-green-300">Home</a>
        </nav>
    </header>

    <section class="container mx-auto my-2x p-4 bg-white rounded-md shadow-md">
        <h2 class="text-xl font-bold mb-4">Input Data Mahasiswa</h2>

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
                    <td class="p-2"><label for="password" class="block">Password</label></td>
                    <td class="p-2"><input type="text" name="password" id="password" value="<?php echo $row['password']?>"
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

</html>
