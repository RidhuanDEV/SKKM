<?php

require_once "fungsi.php";
siswa();
if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Sistem Informasi SKKM ITI</title>
    <!-- Include Tailwind CSS -->
    <link href="golput.css" rel="stylesheet">
</head>
<style>
span{
    font-weight:bold;
}
p{
    padding-left: 16px;
    padding-top: 14px;
    padding-right: 16px;
}
table, th, td {
  border: 1px solid black;
}
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


* {
    font-family: sans-serif;
}
</style>
<header class="w-full h-20 bg-slate-900 border flex border-black">
    <div class="w-1/6 h-full justify-center flex items-center ">
        <img src="LOGOITI.png" alt="ITI" class="w-16 h-16">
    </div>
    <div class="w-5/6 h-full flex">
        <div class="w-5/6 h-full flex items-center">
            <p class="text-white text-4xl font-mono">SATUAN KREDIT KEGIATAN MAHASISWA ITI</p>
        </div>
        <div class="w-1/6 h-full flex items-center justify-center">
            <a href="logout.php"
                class="border-2 border-white p-2 text-white text-2xl font-mono bg-red-500 rounded-3xl ring-offset-white hover:bg-red-600 hover:scale-105 hover:rounded-full active:scale-90">Logout</a>
        </div>
    </div>
</header>


<body class="bg-gray-900">
    <div id="kotak-utama" class="w-full min-h-screen flex overflow-auto ">
        <div id="kotak-kiri" class="w-3/4 h-full block">
            <div class="w-full h-16 flex">
                <nav class="w-full h-16 flex text-white font-semibold">
                    <button onclick="activeClassHandler('beranda')" id="beranda"
                        class="justify-center items-center flex w-1/2 h-full bg-slate-700 hover:bg-slate-700 tracking-wide">
                        Beranda</button>
                    <button onclick="activeClassHandler('skkm')" id="skkm"
                        class="justify-center items-center flex w-1/2 h-full bg-slate-600 hover:bg-slate-700 tracking-wide">
                        Pengajuan SKKM</button>
                </nav>
            </div>
            <div id="beranda-utama" class="opacity-100 w-full overflow-auto h-screen bg-gray-100">
                <!-- Content for kotak-kiri goes here -->
                <p class="text-xl font-bold ">Apa Itu SKKM ?</p>
                <p >Sistem Kredit Kemahasiswaan (SKK) adalah sistem penyelenggaraan kegiatan
                    kemahasiswaan
                    dengan
                    menggunakan satuan kredit kemahasiswaan (SKK) untuk menyatakan beban kegiatan dan pengalaman belajar
                    mahasiswa sebagai salah satu usaha dalam pemenuhan capaian pembelajaran lulusan khususnya unsur
                    sikap dan keterampilan umum.
                </p>
                <p >Satuan kredit kemahasiswaan (SKK), adalah takaran waktu kegiatan kemahasiswaan yang
                    dibebankan pada
                    mahasiswa dalam proses pembelajaran melalui berbagai bentuk kegiatan kurikuler, kokurikuler, dan
                    atau ekstrakurikuler.</p>
                <p class="text-xl font-bold ">Apakah SKKM Wajib ?</p>
                <p >Ya, SKKM merupakan syarat <span >WAJIB</span> bagi Mahasiswa
                    dan Mahasiswi Institut Teknologi Indonesia untuk <span >LULUS</span> kuliah</p>
                <p class="text-xl font-bold ">Persyaratan SKKM ITI</p>
                <p >Untuk memenuhi SKKM Mahasiswa dan Mahasiswi harus memenuhi beberapa persyaratan.
                </p>
                <p >Berikut adalah persyaratan SKKM yang dapat anda baca melalui pdf yang tertera di
                    bawah ini.</p>
                <embed class="pl-4 pt-4 pb-4" type="application/pdf" src="./file/SKKM2023.pdf" width=" 800"
                    height="700"></embed>
            </div>
            
            <div id="beranda-skkm" class="overflow-auto opacity-0 w-0 h-0  bg-gray-100">
                <div class="w-full h-full">
                    <p class="text-xl font-bold">Halaman Pengajuan SKKM</p>
                    <p class="text-lg">Untuk membuat pengajuan SKKM Mahasiswa dapat mengikuti prosedur berikut ini :</p>
                    <p>1. Siapkan bukti dokumen file anda jika anda memiliki hardfile silahkan <span>Scan</span> hardfile tersebut.</p>
                    <p>2. Ikuti syarat pengajuan yang sudah tertera di SK SKKM 2023.</p>
                    <p>3. Isi formulir pengajuan secara lengkap.</p>
                    <p>4. Untuk kegiatan 3 dan 5 anda dapat memilih salah satu kegiatan dengan menekan salah satu tombol yang berisi nama kegiatan anda</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;setelah itu akan muncul formulir yang lengkap.</p>
                    <p>5. Jika pengajuan anda di tolak maka daftar pengajuan SKKM anda akan hilang dari daftar pengajuan dan tidak akan masuk ke daftar SKKM yang telah anda kumpulkan.</p>
                    <p>6. Kumpulkan Point SKKM sebanyak mungkin!, syarat ketentuan Point yang anda harus capai ada di SK SKKM 2023.</p>
                    <p>7. Jika anda melakukan tindakan <span>SPAM/TROLL</span> (mengirim formulir kosong ataupun negatif secara sengaja) anda akan di beri peringatan <span>KERAS</span>!</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp; (Bisa memungkinkan Point anda di kurangi)</p>
                    <p>8. Untuk mengajukan bukti dokumen/sertifikat anda harus mengajukan nya sesuai kegiatan yang ada di SK SKKM 2023</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp; harap di <span>BACA</span> seluruhnya. Misal anda mengikuti Kegiatan <span>MBKM</span> maka anda harus mengisi di kegiatan 1</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp; yang dimana berisi kegiatan yang anda lakukan, jadi dalam pengajuan skkm anda harus menentukan</p>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp; di kegiatan berapa anda harus mengajukan dokumen anda karena terdapat 6 kegiatan (dapat di lihat di <span>SK SKKM 2023</span>).</p>
                    <p>9. Anda dapat mengajukan SKKM di kegiatan yang sama dengan prestasi yang berbeda !</p>
                </div>
                
                
                <div class="w-full px-10 h-full   overflow-auto">
                <span class="pl-4 pb-4">BERIKUT DAFTAR PENGAJUAN ANDA SAAT INI :</span>
                <table class=" overflow-x-auto w-full">
                    <thead class="bg-slate-800">
                        <tr class="text-white">
                            <th class="py-3 border border-solid border-black px-5 ">NRP</th>
                            <th class="py-3 border border-solid  border-black px-5 ">ID</th>
                            <th class="py-3 border border-solid border-black px-5 ">Kegiatan</th>
                            <th class="py-3 border border-solid border-black px-5 ">Satuan</th>
                            <th class="py-3 border border-solid border-black px-5 ">Tingkat</th>
                            <th class="py-3 border border-solid border-black px-5 ">Dokumen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            include "koneksi.php";
                            $nrp = $_SESSION["user_id"]["nrp"];
                            $daftar = "SELECT * FROM penyimpanan WHERE nrp = $nrp";
                            $getdaftar = $koneksi->query($daftar);
                            if ($getdaftar->num_rows > 0) {
                                while ($row = $getdaftar->fetch_assoc()) {
                                    echo "
                                <tr class='border-t hover:bg-gray-300' >
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["nrp"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["id"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["kegiatan"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["satuan"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["tingkat"] . "</td>
                                    <td class='py-3 text-black border border-solid border-black px-5'>" . $row["dokumen"] . "</td>
                                </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='py-3 text-center text-black border border-solid border-black px-5'>0 results</td></tr>";
                        }
                        ?>
                        </tbody>
                </table>
               
                </div>
                <div class=" px-10">
                <span class="pl-4 pb-4">BERIKUT DAFTAR SKKM YANG TELAH ANDA CAPAI :</span>
                <table class=" overflow-x-auto ">
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

                            include "koneksi.php";
                            $total = 0;
                            $nrp = $_SESSION["user_id"]["nrp"];
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
                        $daftar = "SELECT angkatan,nilai FROM datamahasiswa WHERE nrp = $nrp";
                        $getdaftar = $koneksi->query($daftar);
                        while ($nilai = $getdaftar->fetch_assoc()){
                        if($nilai['angkatan'] == '2018' && $nilai['nilai'] >= 0){
                            $keterangan = 'lulus';
                        }else if($nilai['angkatan'] == '2019' && $nilai['nilai'] > 29){
                            $keterangan = 'lulus';
                        }else if($nilai['angkatan'] == '2020' && $nilai['nilai'] > 49){
                            $keterangan = 'lulus';
                        }else if($nilai['angkatan'] == '2021' && $nilai['nilai'] > 59){
                            $keterangan = 'lulus';
                        }else if($nilai['angkatan'] == '2022' && $nilai['nilai'] > 79){
                            $keterangan = 'lulus';
                        }else if($nilai['angkatan'] == '2023' && $nilai['nilai'] > 79){
                            $keterangan = 'lulus';
                        }else {
                            $keterangan = 'tidak lulus';
                        }
                        echo "<tr class='border-t hover:bg-gray-300' >
                        <td class='py-3 text-black border border-solid border-black px-5' colspan='4'>Total Nilai SKKM</td>
                        <td class='py-3 text-black border border-solid border-black px-5'>".$nilai['nilai']."</td>
                        <td class='py-3 text-black border border-solid border-black px-5'>".$keterangan."</td>
                        </tr>";
                        }
                        ?>
                    
                        </tbody>
                </table>
                <div>
                    <div>
                        <p>Pengajuan SKKM dapat anda lakukan di bawah ini sesuai dengan kegiatan yang ada lakukan.</p>
                        <p>Kegiatan 1 : Keikutsertaan MBKM</p>
                        <p>Kegiatan 2 : Program Kreativitas Mahasiswa</p>
                        <p>Kegiatan 3 : Kegiatan Lomba</p>
                        <p>Kegiatan 4 : Kegiatan Non Lomba</p>
                        <p>Kegiatan 5 : Keaktifan Organisasi Mahasiswa</p>
                        <p>Kegiatan 5 : Pengembangan Karir</p>
                        <p>Berikut Link Upload Masing-Masing Kegiatan Anda dapat memilihnya sesuai dengan kriteria di  atas !</p>
                    </div>
                    <div class="flex justify-between w-4/5">
                        <a href="updateskkm.php?kegiatan=1" class="shadow-2xl py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:border-gray-500 hover:text-blue-500 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kegiatan 1</a>
                        <a href="updateskkm.php?kegiatan=2" class="shadow-2xl py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:border-gray-500 hover:text-blue-500 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kegiatan 2</a>
                        <a href="updateskkm.php?kegiatan=3" class="shadow-2xl py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:border-gray-500 hover:text-blue-500 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kegiatan 3</a>
                        <a href="updateskkm.php?kegiatan=4" class="shadow-2xl py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:border-gray-500 hover:text-blue-500 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kegiatan 4</a>
                        <a href="updateskkm.php?kegiatan=5" class="shadow-2xl py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:border-gray-500 hover:text-blue-500 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kegiatan 5</a>
                        <a href="updateskkm.php?kegiatan=6" class="shadow-2xl py-2.5 px-5 me-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-full border border-gray-200 hover:border-gray-500 hover:text-blue-500 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Kegiatan 6</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div id="kotak-kanan" class="w-1/4 h-screen p-2  bg-slate-600 border-collapse">
            <div
                class="w-full h-1/6 border-4 border-slate-600 rounded-xl border-collapse flex justify-center items-center bg-gray-100">
                <p class='text-6xl font-semibold font-mono'>Profile</p>
            </div>
            <div class="w-full h-3/6 border-4 border-collapse border-slate-600 rounded-xl block p-2 bg-gray-100">
                <?php 
                
                echo"
                <div class = 'w-full h-2/3 rounded-md flex justify-center items-center bg-cover overflow-hidden'>
                    <img src='foto/".$_SESSION["user_id"]["foto"]."' alt='STUDENT PHOTOS' class='justify-center items-center flex w-auto h-56 overflow-hidden bg-cover'>
                </div>
                <h4 id='userprofil' class='text-lg font-semibold font-mono'>Nama : ".$_SESSION["user_id"]["nama"]."</h4>
                <h4 id='userprofil' class='text-lg font-semibold font-mono'>NIM : ".$_SESSION["user_id"]["nrp"]."</h4>
                <h4 id='userprofil' class='text-lg font-semibold font-mono'>Tahun Angkatan: ".$_SESSION["user_id"]["angkatan"]."</h4>
                <h4 id='userprofil' class='text-lg font-semibold font-mono'>Email : ".$_SESSION["user_id"]["email"]."</h4>
                ";
            ?>
            </div>
            <div class="w-full flex flex-col h-2/6 p-2 border-4 border-slate-600 rounded-xl bg-gray-100">
                <p>Pertanyaan lebih lanjut dapat melalui :</p>
                <div class=" flex-1 flex flex-col ">
                    <div class="flex  items-center">
                        <a aria-label="skkm.iti.ac.id" href="mailto: abc@example.com"><img alt="Send Mail"
                                src="icons8-email-64.png" class="w-10 h-10"></a>
                        <a href="mailto: abc@example.com">pka.iti.ac.id</a>
                    </div>
                    <div class="flex items-center">
                        <a aria-label="Ridhuan" href="https://wa.me/082113472156"><img alt="Chat on WhatsApp"
                                src="icons8-whatsapp.svg" class="w-10 h-10"></a>
                        <a aria-label="Ridhuan" href="https://wa.me/082113472156">Admin PKA</a>
                    </div>
                    <div class="flex items-center">
                        <a aria-label="Instagram PKA" href="https://www.instagram.com/pka_iti/"><img
                                alt="DM on Instagram" src="icons8-instagram.svg" class="w-10 h-10"></a>
                        <a aria-label="Instagram PKA" href="https://www.instagram.com/pka_iti/">pka_iti</a>
                    </div>
                </div>
                <p >Unduh Persyaratan SKKM ? Klik <a class=" underline hover:text-blue-500" href="./file/SKKM2023.pdf" download>Disini</a>
                </p>
            </div>
            <div class="w-full h-16 flex pt-4 justify-center items-center">
                <a href="profilmahasiswa.php"
                    class="px-8 underline bg py-2 border border-white hover:bg-white hover:text-black rounded-xl text-white active:scale-90">Lihat Profil Saya</a>
            </div>
        </div>
    </div>
</body>
<footer class="bg-gray-900 text-center">
    <h3 class="pl-4 pt-4 text-white">Satuan Kredit Kegiatan Mahasiswa (SKKM) Institut Teknologi Indonesia</h3>
    <h3 class="pl-4 pb-4 text-white">&COPY; Copyright 2023 Institut Teknologi Indonesia. All Right Reserved.</h3>
</footer>

</html>
<script>
function activeClassHandler(target) {
    const dashboardElement = document.querySelector("#beranda");
    const skkmElement = document.querySelector("#skkm");
    const berandaElement = document.querySelector("#beranda-utama");
    const berandaskkmElement = document.querySelector("#beranda-skkm");

    if (target == "beranda") {
        // button active
        dashboardElement.classList.remove("bg-slate-600")
        dashboardElement.classList.add("bg-slate-700")

        // elemen reveal
        skkmElement.classList.remove("bg-slate-700")
        skkmElement.classList.add("bg-slate-600")
        berandaElement.classList.remove("w-0", "opacity-0", "h-0")
        berandaElement.classList.add("w-full", "opacity-100", "h-screen")
        berandaskkmElement.classList.remove("w-full", "opacity-100", "h-screen")
        berandaskkmElement.classList.add("w-0", "opacity-0", "h-0")

    } else if (target == "skkm") {
        // button active
        dashboardElement.classList.add("bg-slate-600")
        dashboardElement.classList.remove("bg-slate-700")

        // elemen reveal
        skkmElement.classList.add("bg-slate-700")
        skkmElement.classList.remove("bg-slate-600")
        berandaskkmElement.classList.add("w-full", "opacity-100", "h-screen")
        berandaskkmElement.classList.remove("w-0", "opacity-0", "h-0")
        berandaElement.classList.remove("w-full", "opacity-100", "h-screen")
        berandaElement.classList.add("w-0", "opacity-0", "h-0")

    }
}
</script>