<?php 
require_once "../login/fungsi.php";
include "../login/koneksi.php";
if(!isset($_SESSION['user_id'])){
    header('location:../login/login.php');
}

if(isset($_POST['ganti'])){
    $foto = $_FILES['foto']['name'];
    $tmp_foto = $_FILES['foto']['tmp_name'];

    if($_SESSION['user_id']['role'] != 'user'){
        $nrp = $_GET['nrp'];
        $query = "SELECT * FROM datamahasiswa WHERE nrp = $nrp";
        $Eksekusi = $koneksi->query($query);
    }else{
        $nrp = $_SESSION['user_id']['nrp'];
        $query = "SELECT * FROM datamahasiswa WHERE nrp = $nrp";
        $Eksekusi = $koneksi->query($query);
    }
    $ganti = mysqli_fetch_assoc($Eksekusi);
    if(is_file("../data/$nrp/".$ganti['foto'])){
        unlink("../data/$nrp/".$ganti['foto']);
        move_uploaded_file($tmp_foto,"../data/$nrp/".$foto);
        $update = "UPDATE datamahasiswa SET `foto` = '$foto' WHERE nrp = $nrp";
        $ekse = $koneksi->query($update);
        clearstatcache();
    }else{
        move_uploaded_file($tmp_foto,"../data/$nrp/".$foto);
        $update = "UPDATE datamahasiswa SET `foto` = '$foto' WHERE nrp = $nrp";
        $ekse = $koneksi->query($update);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil MAHASISWA</title>
    <link rel="stylesheet" href="../assets/goput.css">
    <style>
    @media only screen and (max-width: 1296px) {


* {
    font-size: small;
}
}

@media only screen and (max-width: 1024px) {


* {
    font-size: x-small
}
}
    </style>
</head>
<header class="w-full h-20 bg-slate-900 border flex border-black">
    <div class="w-1/6 h-full justify-center flex items-center ">
        <img src="../assets/LOGOITI.png" alt="ITI" class="w-16 h-16">
    </div>
    <div class="w-5/6 h-full flex">
        <div class="w-5/6 h-full flex justify-center items-center">
            <p class="text-white text-4xl font-mono">SATUAN KREDIT KEGIATAN MAHASISWA ITI</p>
        </div>
        <div class="w-1/6 h-full flex items-center justify-center">
            <a href="../login/logout.php"
                class="border-2 border-white p-2 text-white text-2xl font-mono bg-red-500 rounded-3xl ring-offset-white hover:bg-red-600 hover:scale-105 hover:rounded-full active:scale-90">Logout</a>
        </div>
    </div>
</header>
<body class="w-full h-screen">
    <main class="w-full h-full border border-black rounded-lg flex justify-center items-center">
            <div class="w-1/2 h-full border border-black flex ">
                <div class="w-1/2 h-full border border-black flex justify-start items-center flex-col bg-gray-300">
                    <?php
                        if($_SESSION['user_id']['role'] != 'user'){
                            $nrp = $_GET['nrp'];
                            $query = "SELECT * FROM datamahasiswa WHERE nrp = $nrp";
                            $Eksekusi = $koneksi->query($query);
                        }else{
                            $nrp = $_SESSION['user_id']['nrp'];
                            $query = "SELECT * FROM datamahasiswa WHERE nrp = $nrp";
                            $Eksekusi = $koneksi->query($query);
                        }
                        if ($Eksekusi->num_rows > 0){
                            while($row = $Eksekusi->fetch_assoc()){
                                echo "
                                <div class='w-full h-full flex flex-col justify-center items-center'>
                                <div class=' w-1/2 h-1/2  mt-24 rounded-md flex justify-center items-center bg-cover overflow-hidden flex-col font-bold text-xl'>Foto Profil
                                <img src='../data/$nrp/".$row['foto']."' alt='STUDENT' class='border border-white rounded-md justify-center items-center flex w-auto h-56 overflow-hidden bg-cover'>
                                
                                </div>
                                <div class='w-1/2 h-1/2 p-4 text-xs'>
                                    <form method='post' enctype='multipart/form-data'>
                                        <input type='file' name='foto' id='foto' class='mb-4 cursor-pointer'>
                                        <input type='submit' name='ganti' id='ganti' class='px-8 border-b-4 border-green-600 border-l-2 rounded-md cursor-pointer hover:scale-105 active:scale-100 text-white font-mono p-2 bg-green-400' value='Update&nbsp;Foto'>
                                    </form>
                                </div>
                                </div>
                                ";
                            }
                        }

                    ?>
                </div>
                <div class="w-1/2 h-full border border-black flex-1 bg-slate-800">
                    <div class="p-4">
                    <?php
                    if($_SESSION['user_id']['role'] !== 'user'){
                        $nrp = $_GET['nrp'];
                        $query = "SELECT * FROM datamahasiswa WHERE nrp = $nrp";
                        $Eksekusi = $koneksi->query($query);
                    }else{
                        $nrp = $_SESSION['user_id']['nrp'];
                        $query = "SELECT * FROM datamahasiswa WHERE nrp = $nrp";
                        $Eksekusi = $koneksi->query($query);
                    }
                        if ($Eksekusi->num_rows > 0){
                            while($row = $Eksekusi->fetch_assoc()){
                                if(isset($_POST['password'])){
                                  
                                    header('location:../crud/resetpassword.php');
                                }
                                echo "
                                <div class='bg-gray-100 rounded-xl font-mono px-2 border mt-8 font-bold border-black w-full h-full flex justify-center'>Profil Mahasiswa</div>
                                <div class='bg-gray-100 rounded-xl font-mono py-1 mb-4 mt-8 px-2 border border-black w-full h-full'>
                                    <p>Nama : ".$row['nama']."
                                </div>
                                <div class='bg-gray-100 rounded-xl font-mono py-1 mb-4 mt-4 px-2 border border-black w-full h-full'>
                                    <p>Password : ".$row['password']."
                                </div>
                                <div class='bg-gray-100 rounded-xl font-mono py-1 mb-4 mt-4 px-2 border border-black w-full h-full'>
                                    <p>NRP : ".$row['nrp']."
                                </div >
                                <div class='bg-gray-100 rounded-xl font-mono py-1 mb-4 mt-4 px-2 border border-black w-full h-full'>
                                    <p>Angkatan : ".$row['angkatan']."
                                </div >
                                <div class='bg-gray-100 rounded-xl font-mono py-1 mb-4 mt-4 px-2 border border-black w-full h-full'>
                                    <p>Email : ".$row['email']."
                                </div>
                                <div class='bg-gray-100 rounded-xl font-mono py-1 mb-4 mt-4 px-2 border border-black w-full h-full'>
                                    <p>Lahir : ".$row['tgl_lahir']."
                                </div>
                                ";
                            }
                        }
                        echo"
                        ".($_SESSION['user_id']['role'] !== 'user' ?"
                        <div class='flex w-full h-full justify-between  items-center'>
                            <div class='flex items-center justify-center'>
                                <a href='../crud/resetpassword.php?nrp=".$nrp."' class='border-2 border-white p-2 text-white font-mono bg-red-500 rounded-md ring-offset-white hover:bg-red-600 active:scale-90'>Reset Password</a>
                            </div>
                            <div>
                            <a href='../index.php' class='border-2 border-white p-2 px-8 text-white font-mono bg-green-400 rounded-md ring-offset-white hover:bg-green-600 active:scale-90'>Kembali</a>
                            </div>
                        </div>":"
                        <div class='flex w-full h-full justify-between  items-center'>
                        <div class='flex items-center justify-center'>
                            <a href='../crud/resetpassword.php?' class='border-2 border-white p-2 text-white font-mono bg-red-500 rounded-md ring-offset-white hover:bg-red-600 active:scale-90'>Reset Password</a>
                        </div>
                        <div>
                            <a href='../index.php' class='border-2 border-white p-2 px-8 text-white font-mono bg-green-400 rounded-md ring-offset-white hover:bg-green-600 active:scale-90'>Kembali</a>
                        </div>
                        </div>");
                        ?>
                    </div>
                </div>
            </div>
            <div class="w-1/2 border border-black overflow-auto p-2 h-screen">
            <table class=" overflow-x-auto bg-white">
                    <thead class="bg-slate-800 ">
                        <tr class="text-white">
                            <th class="py-3 border border-solid border-black px-5 ">ID Kegiatan</th>
                            <th class="py-3 border border-solid border-black px-5 ">NRP</th>
                            <th class="py-3 border border-solid border-black px-5 ">Kegiatan</th>
                            <th class="py-3 border border-solid border-black px-5 ">Satuan</th>
                            <th class="py-3 border border-solid border-black px-5 ">Tingkat</th>
                            <th class="py-3 border border-solid border-black px-5 ">Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "../login/koneksi.php";
                            $total = 0;
                            if($_SESSION['user_id']['role'] !== 'user'){
                                $nrp = $_GET['nrp'];
                            }else{
                                $nrp = $_SESSION['user_id']['nrp'];
                            }
                            $daftar = "SELECT * FROM kegiatan1 WHERE nrp = $nrp";
                            $getdaftar = $koneksi->query($daftar);
                            if ($getdaftar->num_rows > 0) {
                                while ($row = $getdaftar->fetch_assoc()) {
                                    echo "
                                <tr class='border-t hover:bg-gray-300' >
                                    <td class='py-3 text-black border border-solid border-black px-5'>1</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["nrp"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["kegiatan"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["satuan"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["tingkat"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["dokumen"] . "</td>
                                </tr>";
                            }
                        } else {
                            $total = $total + 1;
                        } 
                        
                            $daftar = "SELECT * FROM kegiatan2 WHERE nrp = $nrp";
                            $getdaftar = $koneksi->query($daftar);
                            if ($getdaftar->num_rows > 0) {
                   
                                while ($row = $getdaftar->fetch_assoc()) {
                                    echo "
                                <tr class='border-t hover:bg-gray-300' >
                                    <td class='py-3 text-black border border-solid border-black px-5'>2</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["nrp"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["kegiatan"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["satuan"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["tingkat"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["dokumen"] . "</td>
                                </tr>";
                            }
                        } else {
                            $total = $total + 1;
                        } 
                        
                            $daftar = "SELECT * FROM kegiatan3 WHERE nrp = $nrp";
                            $getdaftar = $koneksi->query($daftar);
                            if ($getdaftar->num_rows > 0) {
                                while ($row = $getdaftar->fetch_assoc()) {
                                    echo "
                                <tr class='border-t hover:bg-gray-300' >
                                <td class='py-3 text-black border border-solid border-black px-5'>3</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["nrp"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["kegiatan"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["satuan"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["tingkat"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["dokumen"] . "</td>
                                </tr>";
                            }
                        } else {
                            $total = $total + 1;
                        } 
                        
                            $daftar = "SELECT * FROM kegiatan4 WHERE nrp = $nrp";
                            $getdaftar = $koneksi->query($daftar);
                            if ($getdaftar->num_rows > 0) {
                                while ($row = $getdaftar->fetch_assoc()) {
                                    echo "
                                <tr class='border-t hover:bg-gray-300' >
                                <td class='py-3 text-black border border-solid border-black px-5'>4</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["nrp"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["kegiatan"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["satuan"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["tingkat"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["dokumen"] . "</td>
                                </tr>";
                            }
                        } else {
                            $total = $total + 1;
                        } 
                       
                            $daftar = "SELECT * FROM kegiatan5 WHERE nrp = $nrp";
                            $getdaftar = $koneksi->query($daftar);
                            if ($getdaftar->num_rows > 0) {
                                while ($row = $getdaftar->fetch_assoc()) {
                                    echo "
                                <tr class='border-t hover:bg-gray-300' >
                                <td class='py-3 text-black border border-solid border-black px-5'>5</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["nrp"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["kegiatan"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["satuan"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["tingkat"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["dokumen"] . "</td>
                                </tr>";
                            }
                        } else {
                            $total = $total + 1;
                        } 
                        
                            $daftar = "SELECT * FROM kegiatan6 WHERE nrp = $nrp";
                            $getdaftar = $koneksi->query($daftar);
                            if ($getdaftar->num_rows > 0) {
                                while ($row = $getdaftar->fetch_assoc()) {
                                    echo "
                                <tr class='border-t hover:bg-gray-300' >
                                <td class='py-3 text-black border border-solid border-black px-5'>6</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["nrp"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["kegiatan"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["satuan"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["tingkat"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["dokumen"] . "</td>
                                </tr>";
                            }
                        }else {
                            $total = $total + 1;
                        }
                        if($total == 6){
                            echo "<tr><td colspan='6' class='py-3 text-center text-black border border-solid border-black px-5'>0 results</td></tr>";
                        }
                        $sqlQuery = "SELECT * FROM datamahasiswa WHERE nrp = $nrp";
                        $result = $koneksi->query($sqlQuery);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $querytotalkegiatan = "SELECT SUM(tbl.kegiatan) as kegiatan FROM (SELECT COUNT(kegiatan) AS kegiatan FROM kegiatan1 WHERE nrp = '".$row["nrp"]."' UNION ALL SELECT COUNT(kegiatan) AS kegiatan FROM kegiatan2 WHERE nrp = '".$row["nrp"]."') tbl ;";
                                $results = $koneksi->query($querytotalkegiatan);
                                $keterangan = '';
                            
                                while ($rows = $results->fetch_assoc()){
                                    if($row['angkatan'] == '2018' && $row['nilai'] >= 0 && $rows['kegiatan'] > 5){
                                        $keterangan = 'Lulus';
                                    }else if($row['angkatan'] == '2019' && $row['nilai'] > 29 && $rows['kegiatan'] > 5){
                                        $keterangan = 'Lulus';
                                    }else if($row['angkatan'] == '2020' && $row['nilai'] > 49 && $rows['kegiatan'] > 5){
                                        $keterangan = 'Lulus';
                                    }else if($row['angkatan'] == '2021' && $row['nilai'] > 59 && $rows['kegiatan'] > 5){
                                        $keterangan = 'Lulus';
                                    }else if($row['angkatan'] == '2022' && $row['nilai'] > 79 && $rows['kegiatan'] > 5){
                                        $keterangan = 'Lulus';
                                    }else if($row['angkatan'] == '2023' && $row['nilai'] > 79 && $rows['kegiatan'] > 5){
                                        $keterangan = 'Lulus';
                                    }else {
                                        $keterangan = 'Belum Lulus';
                                    }
                                
                            }
                        }
                        
                        $sqlQuery3 = "SELECT * FROM datamahasiswa WHERE nrp = $nrp";
                        $result3 = $koneksi->query($sqlQuery3);
                        $row = mysqli_fetch_assoc($result3);
                        echo "<tr class='border-t hover:bg-gray-300' >
                        <td class='py-3 text-black border border-solid border-black px-5 font-bold' colspan='4'>Total Nilai SKKM</td>
                        <td class='py-3 text-black border border-solid border-black px-5 font-bold'>".$row['nilai']."</td>
                        <td class='py-3 text-black border border-solid border-black px-5 font-bold'>".$keterangan."</td>
                        </tr>";
                        }
                        ?>
                    
                        </tbody>
                </table>
            </div>
    </main>
</body>
<footer class="bg-gray-900 h-20 text-center">
    <h3 class="pl-4 pt-4 text-white font-serif">Satuan Kredit Kegiatan Mahasiswa (SKKM) Institut Teknologi Indonesia</h3>
    <h3 class="pl-4 text-white font-serif">&COPY; Copyright 2023 Institut Teknologi Indonesia. All Right Reserved.</h3>
</footer>
</html>