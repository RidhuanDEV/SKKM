<?php 
require_once "../login/fungsi.php";
include "../login/koneksi.php";
if(!isset($_SESSION['user_id'])){
    header('location:../login/login.php');
}
siswa2();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update SKKM Mahasiswa ITI</title>
    <link href="../assets/goput.css" rel="stylesheet">
</head>
<header class=" justify-center flex items-center w-full h-20 text-center pt-4">
    <h3 class=" text-white text-3xl underline">Halaman Upload SKKM Mahasiswa Institut Teknologi Indonesia</h3>
</header>
<style>
@media only screen and (max-width: 1250px) {


    * {
        font-size: small;
    }
}

* {
    font-family: sans-serif;
}
</style>

<body class="bg-no-repeat bg-cover" style="background-image: url(../assets/background2.avif)">
    <main class=" w-full min-h-screen border justify-center items-center flex border-black">
        <?php
$id = $_GET['kegiatan'];
$Jenis = '';
if(isset($_POST['LombaAkademik'])){
    $Jenis = 'Lomba Akademik';
}else if(isset($_POST['LombaNonAkademik'])){
    $Jenis = 'Lomba Non Akademik';
}else if(isset($_POST['Rekognisi'])){
    $Jenis = 'Rekognisi';
}else if(isset($_POST['Pengurus'])){
    $Jenis = 'Pengurus Ormawa';
}else if(isset($_POST['Panitia'])){
    $Jenis = 'Panitia Ormawa';
}
$errors = [];
if (isset($_POST['submit'])) {
    $nrp = $_SESSION['user_id']['nrp'];
    $kegiatan = $_POST['kegiatan'];
    $Satuan = $_POST['satuan'];
    $nilaiSKKM = 0;
    $tingkat = $_POST['tingkat'];
    if ($tingkat == 'Mahasiswa'){
        $nilaiSKKM = 20;
    }else if ($tingkat == 'Proposal'){
        $nilaiSKKM = 10;
    }else if ($tingkat == 'Lolos Internal'){
        $nilaiSKKM = 20;
    }else if ($tingkat == 'Pendanaan'){
        $nilaiSKKM = 40;
    }else if ($tingkat == 'NASIONAL'){
        $nilaiSKKM = 50;
    }else if ($tingkat == 'provinsi'){
        $nilaiSKKM = 10;
    }else if ($tingkat == 'nasional'){
        $nilaiSKKM = 20;
    }else if ($tingkat == 'internasional'){
        $nilaiSKKM = 40;
    }else if ($tingkat == 'Provinsi'){
        $nilaiSKKM = 15;
    }else if ($tingkat == 'Nasional'){
        $nilaiSKKM = 30;
    }else if ($tingkat == 'Internasional'){
        $nilaiSKKM = 50;
    }else if ($tingkat == 'PKKMB'){
        $nilaiSKKM = 20;
    }else if ($tingkat == 'Asisten Dosen/Lab'){
        $nilaiSKKM = 25;
    }else if ($tingkat == 'Relawan Anti Narkoba'){
        $nilaiSKKM = 10;
    }else if ($tingkat == 'Satgas PPKS'){
        $nilaiSKKM = 10;
    }else if ($tingkat == 'Panitia Adhoc ITI'){
        $nilaiSKKM = 10;
    }else if ($tingkat == 'Anggota'){
        $nilaiSKKM = 5;
    }else if ($tingkat == 'Koordinator'){
        $nilaiSKKM = 15;
    }else if ($tingkat == 'Wakilketua/sekretaris'){
        $nilaiSKKM = 20;
    }else if ($tingkat == 'Ketua'){
        $nilaiSKKM = 25;
    }else if ($tingkat == 'Koordinator/wakil ketua/sekretaris/bendahara'){
        $nilaiSKKM = 10;
    }else if ($tingkat == 'Ketua Pelaksana'){
        $nilaiSKKM = 15;
    }else if ($kegiatan == 'Mengikuti Seminar Sebagai Peserta'){
        $nilaiSKKM = 5;
    }else if ($kegiatan == 'Mengikuti Workshop hardskill/softskill'){
        $nilaiSKKM = 10;
    }else if ($kegiatan == 'Anggota Organisasi Profesi'){
        $nilaiSKKM = 15;
    }else if ($kegiatan == 'Sertifikasi'){
        $nilaiSKKM = 20;
    }else if ($kegiatan == 'Kemampuan Bahasa Inggris (TOEFL minimal 425)'){
        $nilaiSKKM = 20;
    }
    
    // Display errors
    
    
    // File handling
    $uploadDirectory = "../data/$nrp/";
    $nama_dokumen = isset($_FILES['dokumen']['name']) ? $_FILES['dokumen']['name'] : null;
    $tmp_nama_dokumen = isset($_FILES['dokumen']['tmp_name']) ? $_FILES['dokumen']['tmp_name'] : null;

    
    if (!empty($nama_dokumen) && !empty($tmp_nama_dokumen)) {
        $destination = $uploadDirectory . $nama_dokumen;
        if(is_file($destination)){
            $errors[] = "harap ajukan dokumen yang berbeda !";
        }else{
        
        }
    } else {
        $destination = null; // or provide a default value
    }
    
    if (empty($kegiatan)) {
        $errors[] = "kegiatan is required.";
    }
    if (empty($tingkat)) {
        $errors[] = "Tingkat is required.";
    }
    if (empty($destination)) {
        $errors[] = "Dokumen is required.";
    }
    if (!empty($errors)) {
            // echo "<script type='text/javascript'>alert('Mohon isi semua persyaratan dengan benar ! ~~~~~~~~~~~~~~ Harap Cek Persyaratan Pengajuan SKKM Terlebih dahulu !');</script>";
        foreach ($errors as $eror){
            echo $eror;
        }
        }else{
    // Update database with file path
    $querySQL = "INSERT INTO penyimpanan (`nrp`,`id`,`kegiatan`,`satuan`,`tingkat`,`dokumen`,`NilaiSKKM`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($querySQL);
    $stmt->bind_param("sssssss", $nrp, $id, $kegiatan, $Satuan, $tingkat, $nama_dokumen, $nilaiSKKM);
    
    // Execute the statement
    $Eksekusi = $stmt->execute();
    
    // Check for errors
    if (!$Eksekusi) {
        die("Query execution failed: " . $koneksi->error);
    }
    
    // Close the statement
    $stmt->close();
    
    move_uploaded_file($tmp_nama_dokumen, $destination);
    header('location:../mahasiswa/halamansiswa.php');
    move_uploaded_file($tmp_nama_dokumen, $destination);
    header('location:../mahasiswa/halamansiswa.php');
}

}   
    
    

    if ($id == 1){
        echo"
    <div class ='p-10 block w-1/2 min-h-screen border bg-transparent rounded-xl '>
        <form id='myForm' method=".'post'." enctype=".'multipart/form-data'.">
        <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full text-xl flex'>
            <label for='kegiatan' class='p-1 pr-20'>Program Kreativitas Mahasiswa</label>
            <select name='kegiatan' id='kegiatan' class='border-2 border-black w-96 cursor-pointer' required>
                <option value='Magang'>Magang</option>
                <option value='KKN'>KKN</option >
                <option value='Mengajar di Sekolah'>Mengajar di Sekolah</option>
                <option value='Pertukaran Mahasiswa'>Pertukaran Mahasiswa</option>
                <option value='Penelitian / Riset'>Penelitian / Riset</option>
                <option value='Wirausaha'>Wirausaha</option>
                <option value='Studi Independen'>Studi Independen</option>
                <option value='Proyek Kemanusiaan'>Proyek Kemanusiaan</option>
            </select>
        </div>
        <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full text-xl flex'>
            <label for=".'satuan'." class='p-1 pr-60'>Satuan</label>
            <select name=".'satuan'." id=".'satuan'." class='border-2 border-black w-96 cursor-pointer' required>
                <option value=".'Semester'.">Semester</option>
            </select>
        </div>
        <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full gap-32 text-xl flex'>
            <label for=".'tingkat'.">Tingkat MBKM</label>
            <select name=".'tingkat'." id=".'tingkat'." required class=' w-96 border-2 border-black cursor-pointer'>
            <option value=".'Mahasiswa'.">Mahasiswa</option>
            </select>
        </div>
        <div class='flex items-center justify-center w-full'>
            <label for='dokumen' class='flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600'>
                <div class='flex flex-col items-center justify-center pt-5 pb-6'>
                    <svg id='svg' class='w-8 h-8 mb-4 text-gray-500 dark:text-gray-400' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 16'>
                        <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2'/>
                    </svg>
                    <img src='../assets/filesvg.svg' alt='' id='filesvg' class='hidden'>
                    <p  class='mb-2 text-sm text-gray-500 dark:text-gray-400'><span id='uploads' class='font-semibold'>Click to upload</span> </p>
                    <p id='dokumens' class='text-xs text-gray-500 dark:text-gray-400'>(Maksimum. 45mb)</p>
                </div>
                <input  name=".'dokumen'." id='dokumen' type='file' class='hidden' />
            </label>
        </div> 
            
            
        <div class = 'p-2 my-8 w-24 h-10 items-center justify-center flex border-2 border-white bg-green-300 active:bg-red-400 shadow-2xl rounded-md text-center font-bold hover:underline hover:border-black hover:cursor-pointer'>
            <input type=".'submit'." name=".'submit'." id=".'submit'." value=".'Upload'." class='p-4 cursor-pointer'></input>
        </div>
        <div class = 'p-2 my-8 w-24 h-10 items-center justify-center flex border-2 border-white active:bg-green-300 bg-red-400 shadow-2xl rounded-md text-center font-bold hover:underline hover:border-black hover:cursor-pointer'>
            <a href='../mahasiswa/halamansiswa.php'>Kembali</a>
        </div>
        </form>
    </div>";
    }
    if ($id == 2){
        echo"
    <div class ='p-10 block w-1/2 min-h-screen border bg-transparent rounded-xl '>
        <form id='myForm' method=".'post'." enctype=".'multipart/form-data'.">
            <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full text-xl flex'>
                <label for='kegiatan' class='p-1 pr-20'>Program Kreativitas Mahasiswa</label>
                <select name='kegiatan' id='kegiatan' class='border-2 border-black w-96 cursor-pointer' required>
                    <option value='Riset Eksakta'>Riset Eksakta</option>
                    <option value='Penerapan IPTEK'>Penerapan IPTEK</option>
                    <option value='Kewirausahaan'>Kewirausahaan</option>
                    <option value='Karsa Cipta'>Karsa Cipta</option>
                    <option value='Pengabdian Masyarakat'>Pengabdian Masyarakat</option>
                    <option value='Karya Inovatif'>Karya Inovatif</option>
                    <option value='Video Gagasan Konstruktif'>Video Gagasan Konstruktif</option>
                    <option value='Gagasan Futuristik Tertulis'>Gagasan Futuristik Tertulis</option>
                </select>
            </div>
        <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full text-xl flex'>
            <label for=".'satuan'." class='p-1 pr-60'>Satuan</label>
            <select name=".'satuan'." id=".'satuan'." class='border-2 border-black w-96 cursor-pointer' required>
                <option value=".'Semester'.">Semester</option>
                <option value=".'Kegiatan'.">Kegiatan</option>
                <option value=".'Tahun'.">Tahun</option>
            </select>
        </div>
        <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full gap-32 text-xl flex'>
            <label for=".'tingkat'.">Tingkat Prestasi</label>
            <select name=".'tingkat'." id=".'tingkat'." required class=' w-96 border-2 border-black cursor-pointer'>
                <option value=".'Proposal'.">Proposal</option>
                <option value=".'Lolos Internal'.">Lolos Internal</option>
                <option value=".'Pendanaan'.">Pendanaan</option>
                <option value=".'NASIONAL'.">Nasional</option>
            </select>
        </div>
        <div class='flex items-center justify-center w-full'>
            <label for='dokumen' class='flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600'>
                <div class='flex flex-col items-center justify-center pt-5 pb-6'>
                    <svg id='svg' class='w-8 h-8 mb-4 text-gray-500 dark:text-gray-400' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 16'>
                        <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2'/>
                    </svg>
                    <img src='../assets/filesvg.svg' alt='' id='filesvg' class='hidden'>
                    <p  class='mb-2 text-sm text-gray-500 dark:text-gray-400'><span id='uploads' class='font-semibold'>Click to upload</span> </p>
                    <p id='dokumens' class='text-xs text-gray-500 dark:text-gray-400'>(Maksimum. 45mb)</p>
                </div>
                <input  name=".'dokumen'." id='dokumen' type='file' class='hidden' />
            </label>
        </div> 
            
            
        <div class = 'p-2 my-8 w-24 h-10 items-center justify-center flex border-2 border-white bg-green-300 active:bg-red-400 shadow-2xl rounded-md text-center font-bold hover:underline hover:border-black hover:cursor-pointer'>
            <input type=".'submit'." name=".'submit'." id=".'submit'." value=".'Upload'." class='p-4 cursor-pointer'></input>
        </div>
        <div class = 'p-2 my-8 w-24 h-10 items-center justify-center flex border-2 border-white active:bg-green-300 bg-red-400 shadow-2xl rounded-md text-center font-bold hover:underline hover:border-black hover:cursor-pointer'>
            <a href='../mahasiswa/halamansiswa.php'>Kembali</a>
        </div>
        </form>
    </div>";
    }
    if ($id == 3){
        $buttonClicked = isset($_POST['button_clicked']) ? $_POST['button_clicked'] : '';

        // Check which button was clicked and apply background color
        $LombaAkademikColor = ($buttonClicked === 'LombaAkademik') ? 'background-color: rgb(74 222 128);' : '';
        $LombaNonAkademikColor = ($buttonClicked === 'LombaNonAkademik') ? 'background-color: rgb(74 222 128);' : '';
        $RekognisiColor = ($buttonClicked === 'Rekognisi') ? 'background-color: rgb(74 222 128);' : '';
            echo"
        <div class ='p-10 block w-1/2 h-auto border bg-transparent rounded-xl '>
            <form method=".'post'." enctype=".'multipart/form-data'.">
        <div class='rounded-md bg-white p-2 my-8 justify-center items-center flex border h-24 w-full'>
            <div class=''>
            <p class='pl-4 text-xl'>Keaktifan Organisasi Kemahasiswaan</p>
            </div>
            <div class='gap-4 flex'>
                <input type='submit' name='LombaAkademik' id='LombaAkademik' value='Lomba-Akademik' class='p-2 border-2 border-black rounded-md hover:bg-green-300 hover:cursor-pointer shadow-xl font-bold' required style='$LombaAkademikColor'></input>
                <input type='submit' name='LombaNonAkademik' id='LombaNonAkademik' value='Lomba-Non-Akademik' class='p-2 border-2 border-black rounded-md hover:bg-green-300 hover:cursor-pointer shadow-xl font-bold' required style='$LombaNonAkademikColor'></input>
                <input type='submit' name='Rekognisi' id='Rekognisi' value='Rekognisi' class='p-2 border-2 border-black rounded-md hover:bg-green-300 hover:cursor-pointer shadow-xl font-bold' required style='$RekognisiColor'></input>
            </div>
        </div>
        
    <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full text-xl flex'>
        <label for=".'satuan'." class='p-1 pr-60'>Satuan</label>
        <select name=".'satuan'." id=".'satuan'." class='border-2 border-black w-96 cursor-pointer' required>
            <option value=".'Semester'.">Semester</option>
            <option value=".'Kegiatan'.">Kegiatan</option>
            <option value=".'Tahun'.">Tahun</option>
        </select>
    </div>";
    if($Jenis == 'Lomba Akademik'){
        echo "
    <div class='rounded-md p-2 bg-white my-8 pl-1 gap-32 w-full text-xl flex'>
        <input type='hidden' name='kegiatan' id='kegiatan' value='Lomba&nbsp;Akademik'>
        <label for=".'tingkat'.">Tingkat Lomba Akademik</label>
        <select name=".'tingkat'." id=".'tingkat'." required style='width:300px;' class=' border-2 border-black cursor-pointer'>
            <option value='Provinsi'>Provinsi</option>
            <option value='Nasional'>Nasional</option>
            <option value='Internasional'>Internasional</option>
        </select>
    </div>";
    } else if($Jenis == 'Lomba Non Akademik'){
    echo "
    <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full gap-28 text-xl flex'>
        <input type=".'hidden'." name=".'kegiatan'." id=".'kegiatan'." value=".'Lomba&nbsp;Non&nbsp;Akademik'.">
        <label for=".'tingkat'.">Tingkat Lomba Non Akademik</label>
        <select name=".'tingkat'." id=".'tingkat'." required style='width:280px;' class='border-2 border-black cursor-pointer'>
            <option value='provinsi'>Provinsi</option>
            <option value='nasional'>Nasional</option>
            <option value='internasional'>Internasional</option>
        </select>
    </div>";
    } else if($Jenis == 'Rekognisi'){
        echo "
    <div style='gap:180px;' class='rounded-md p-2 bg-white my-8 pl-1.5 w-full text-xl flex'>
        <input type=".'hidden'." name=".'kegiatan'." id=".'kegiatan'." value=".'Rekognisi'.">
        <label for=".'tingkat'.">Tingkat Rekognisi</label>
        <select name=".'tingkat'." id=".'tingkat'." required style='width:320px;' class=' border-2 border-black cursor-pointer'>
            <option value='Nasional'>Nasional</option>
            <option value='Internasional'>Internasional</option>
            <option value='Provinsi'>Provinsi</option>
        </select>
    </div>";
    }
    echo"
    <div class='flex items-center justify-center w-full'>
    <label for='dokumen' class='flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600'>
        <div class='flex flex-col items-center justify-center pt-5 pb-6'>
            <svg id='svg' class='w-8 h-8 mb-4 text-gray-500 dark:text-gray-400' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 16'>
                <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2'/>
            </svg>
            <img src='../assets/filesvg.svg' alt='' id='filesvg' class='hidden'>
            <p  class='mb-2 text-sm text-gray-500 dark:text-gray-400'><span id='uploads' class='font-semibold'>Click to upload</span> </p>
            <p id='dokumens' class='text-xs text-gray-500 dark:text-gray-400'>(Maksimum. 45mb)</p>
        </div>
        <input name=".'dokumen'." id='dokumen' type='file' class='hidden' />
    </label>
</div> 


<div class = 'p-2 my-8 w-24 h-10 items-center justify-center flex border-2 border-white bg-green-300 active:bg-red-400 shadow-2xl rounded-md text-center font-bold hover:underline hover:border-black hover:cursor-pointer'>
    <input type=".'submit'." name=".'submit'." id=".'submit'." value=".'Upload'." class='p-4 cursor-pointer'></input>
</div>
<div class = 'p-2 my-8 w-24 h-10 items-center justify-center flex border-2 border-white active:bg-green-300 bg-red-400 shadow-2xl rounded-md text-center font-bold hover:underline hover:border-black hover:cursor-pointer'>
<a href='../mahasiswa/halamansiswa.php'>Kembali</a>
</div>
    <input type='hidden' name='button_clicked' id='button_clicked' value=''>
</form>
</div>";
    }
    if ($id == 4){
        echo"
    <div class ='p-10 block w-1/2 min-h-screen border bg-transparent rounded-xl '>
    <form id='myForm' method=".'post'." enctype=".'multipart/form-data'.">
    <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full text-xl flex'>
            <label for='kegiatan' class='p-1 pr-20'>Kegiatan Non Lomba</label>
            <select name='kegiatan' id='kegiatan' class='border-2 border-black w-96 cursor-pointer' required>
                <option value='PKKMB'>PKKMB</option>
                <option value='Asisten Dosen/Lab'>Asisten Dosen/Lab</option>
                <option value='Relawan Anti Narkoba'>Relawan Anti Narkoba</option>
                <option value='Satgas PPKS'>Satgas PPKS</option>
                <option value='Panitia Adhoc ITI (Pusat)'>Panitia Adhoc ITI (Pusat)</option>
            </select>
    </div>
    <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full text-xl flex'>
        <label for=".'satuan'." class='p-1 pr-60'>Satuan</label>
        <select name=".'satuan'." id=".'satuan'." class='border-2 border-black w-96 cursor-pointer' required>
            <option value=".'Semester'.">Semester</option>
            <option value=".'Kegiatan'.">Kegiatan</option>
            <option value=".'Tahun'.">Tahun</option>
        </select>
    </div>
    <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full gap-32 text-xl flex'>
        <label for=".'tingkat'.">Tingkat Prestasi</label>
        <select name=".'tingkat'." id=".'tingkat'." required class=' w-96 border-2 border-black cursor-pointer'>
            <option value=".'Mahasiswa'.">Mahasiswa</option>
        </select>
    </div>
    <div class='flex items-center justify-center w-full'>
        <label for='dokumen' class='flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600'>
            <div class='flex flex-col items-center justify-center pt-5 pb-6'>
                <svg id='svg' class='w-8 h-8 mb-4 text-gray-500 dark:text-gray-400' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 16'>
                    <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2'/>
                </svg>
                <img src='../assets/filesvg.svg' alt='' id='filesvg' class='hidden'>
                <p  class='mb-2 text-sm text-gray-500 dark:text-gray-400'><span id='uploads' class='font-semibold'>Click to upload</span> </p>
                <p id='dokumens' class='text-xs text-gray-500 dark:text-gray-400'>(Maksimum. 45mb)</p>
            </div>
            <input  name=".'dokumen'." id='dokumen' type='file' class='hidden' />
        </label>
    </div> 
        
        
    <div class = 'p-2 my-8 w-24 h-10 items-center justify-center flex border-2 border-white bg-green-300 active:bg-red-400 shadow-2xl rounded-md text-center font-bold hover:underline hover:border-black hover:cursor-pointer'>
        <input type=".'submit'." name=".'submit'." id=".'submit'." value=".'Upload'." class='p-4 cursor-pointer'></input>
    </div>
    <div class = 'p-2 my-8 w-24 h-10 items-center justify-center flex border-2 border-white active:bg-green-300 bg-red-400 shadow-2xl rounded-md text-center font-bold hover:underline hover:border-black hover:cursor-pointer'>
        <a href='../mahasiswa/halamansiswa.php'>Kembali</a>
    </div>
    </form>
    </div>";
    }
    if ($id == 5){
    $buttonClicked = isset($_POST['button_clicked']) ? $_POST['button_clicked'] : '';

    // Check which button was clicked and apply background color
    $pengurusColor = ($buttonClicked === 'Pengurus') ? 'background-color: rgb(74 222 128);' : '';
    $panitiaColor = ($buttonClicked === 'Panitia') ? 'background-color: rgb(74 222 128);' : '';
        echo"
    <div class ='p-10 block w-1/2 h-auto border bg-transparent rounded-xl '>
        <form method=".'post'." enctype=".'multipart/form-data'.">
    <div class='rounded-md bg-white p-2 my-8 justify-center items-center flex border h-24 w-full'>
        <div class=''>
        <p class='pl-4 text-xl'>Keaktifan Organisasi Kemahasiswaan</p>
        </div>
        <div class='gap-4 flex'>
            <input type='submit' name='Pengurus' id='Pengurus' value='Pengurus-Ormawa' class='p-4 border-2 border-black rounded-md hover:bg-green-300 hover:cursor-pointer shadow-xl font-bold' required style='$pengurusColor'></input>
            <input type='submit' name='Panitia' id='Panitia' value='Panitia-Kegiatan-Ormawa' class='p-4 border-2 border-black rounded-md hover:bg-green-300 hover:cursor-pointer shadow-xl font-bold' required style='$panitiaColor'></input>
        </div>
    </div>
   
    <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full text-xl flex'>
        <label for=".'satuan'." class='p-1 pr-60'>Satuan</label>
        <select name=".'satuan'." id=".'satuan'." class='border-2 border-black w-96 cursor-pointer' required>
            <option value=".'Semester'.">Semester</option>
            <option value=".'Kegiatan'.">Kegiatan</option>
            <option value=".'Tahun'.">Tahun</option>
        </select>
    </div>";
  
    if($Jenis == 'Pengurus Ormawa'){
        echo "
    <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full gap-28 text-xl flex'>
        <input type=".'hidden'." name=".'kegiatan'." id=".'kegiatan'." value=".'Pengurus&nbsp;Ormawa&nbsp;(HMPS,UKM,UKK)'.">
        <label for=".'tingkat'.">Tingkat Pengurus Ormawa</label>
        <select name=".'tingkat'." id=".'tingkat'." required class='w-96 border-2 border-black cursor-pointer'>
            <option value=".'Anggota'.">Anggota</option>
            <option value=".'Koordinator'.">Koordinator</option>
            <option value=".'Wakilketua/sekretaris'.">Wakilketua/sekretaris</option>
            <option value=".'Ketua'.">Ketua</option>
        </select>
    </div>";
    }else if($Jenis == 'Panitia Ormawa'){
        echo "
    <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full gap-8 text-xl flex'>
        <input type=".'hidden'." name=".'kegiatan'." id=".'kegiatan'." value=".'Panitia&nbsp;Kegiatan&nbsp;Ormawa'.">
        <label for=".'tingkat'.">Tingkat Panitia Kegiatan Ormawa</label>
            <select name=".'tingkat'." id=".'tingkat'." required class='border-2 border-black cursor-pointer'>
                <option value=".'Anggota'.">Anggota</option>
                <option value=".'Koordinator/wakil ketua/sekretaris/bendahara'.">Koordinator/wakilketua/sekretaris/bendahara</option>
                <option value=".'Ketua Pelaksana'.">Ketua</option>
            </select>
    </div>";
    }
    echo "
    <div class='flex items-center justify-center w-full'>
        <label for='dokumen' class='flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600'>
            <div class='flex flex-col items-center justify-center pt-5 pb-6'>
                <svg id='svg' class='w-8 h-8 mb-4 text-gray-500 dark:text-gray-400' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 16'>
                    <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2'/>
                </svg>
                <img src='../assets/filesvg.svg' alt='' id='filesvg' class='hidden'>
                <p  class='mb-2 text-sm text-gray-500 dark:text-gray-400'><span id='uploads' class='font-semibold'>Click to upload</span> </p>
                <p id='dokumens' class='text-xs text-gray-500 dark:text-gray-400'>(Maksimum. 45mb)</p>
            </div>
            <input  name=".'dokumen'." id='dokumen' type='file' class='hidden' />
        </label>
    </div> 


    <div class = 'p-2 my-8 w-24 h-10 items-center justify-center flex border-2 border-white bg-green-300 active:bg-red-400 shadow-2xl rounded-md text-center font-bold hover:underline hover:border-black hover:cursor-pointer'>
        <input type=".'submit'." name=".'submit'." id=".'submit'." value=".'Upload'." class='p-4 cursor-pointer'></input>
    </div>
    <div class = 'p-2 my-8 w-24 h-10 items-center justify-center flex border-2 border-white active:bg-green-300 bg-red-400 shadow-2xl rounded-md text-center font-bold hover:underline hover:border-black hover:cursor-pointer'>
    <a href='../mahasiswa/halamansiswa.php'>Kembali</a>
    </div>
    <input type='hidden' name='button_clicked' id='button_clicked' value=''>
    </form>
    </div>";
    } 
    if ($id == 6){
    echo"
    <div class ='p-10 block w-1/2 min-h-screen border bg-transparent rounded-xl '>
    <form id='myForm' method=".'post'." enctype=".'multipart/form-data'.">
        <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full text-xl flex'>
            <label for='kegiatan' class='p-1 pr-20'>Pengembangan Karir</label>
            <select name='kegiatan' id='kegiatan' class='border-2 border-black w-96 cursor-pointer' required>
                <option value='Mengikuti Seminar Sebagai Peserta'>Mengikuti Seminar Sebagai Peserta</option>
                <option value='Mengikuti Workshop hardskill/softskill'>Mengikuti Workshop hardskill/softskill</option>
                <option value='Anggota Organisasi Profesi'>Anggota Organisasi Profesi</option>
                <option value='Sertifikasi'>Sertifikasi</option>
                <option value='Kemampuan Bahasa Inggris (TOEFL minimal 425)'>Kemampuan Bahasa Inggris (TOEFL minimal 425)</option>
            </select>
        </div>
        <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full text-xl flex'>
        <label for=".'satuan'." class='p-1 pr-60'>Satuan</label>
        <select name=".'satuan'." id=".'satuan'." class='border-2 border-black w-96 cursor-pointer' required>
                <option value=".'Semester'.">Semester</option>
                <option value=".'Kegiatan'.">Kegiatan</option>
                <option value=".'Tahun'.">Tahun</option>
            </select>
        </div>
        <div class='rounded-md p-2 bg-white my-8 pl-1.5 w-full gap-32 text-xl flex'>
            <label for=".'tingkat'.">Tingkat Prestasi</label>
            <select name=".'tingkat'." id=".'tingkat'." required class=' w-96 border-2 border-black cursor-pointer'>
            <option value='MAHASISWA'>Mahasiswa</option>
            </select>
        </div>
        <div class='flex items-center justify-center w-full'>
            <label for='dokumen' class='flex flex-col items-center justify-center w-full h-56 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600'>
                <div class='flex flex-col items-center justify-center pt-5 pb-6'>
                    <svg id='svg' class='w-8 h-8 mb-4 text-gray-500 dark:text-gray-400' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 16'>
                        <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2'/>
                    </svg>
                    <img src='../assets/filesvg.svg' alt='' id='filesvg' class='hidden'>
                    <p  class='mb-2 text-sm text-gray-500 dark:text-gray-400'><span id='uploads' class='font-semibold'>Click to upload</span> </p>
                    <p id='dokumens' class='text-xs text-gray-500 dark:text-gray-400'>(Maksimum. 45mb)</p>
                </div>
                <input  name=".'dokumen'." id='dokumen' type='file' class='hidden' />
            </label>
        </div> 


    <div class = 'p-2 my-8 w-24 h-10 items-center justify-center flex border-2 border-white bg-green-300 active:bg-red-400 shadow-2xl rounded-md text-center font-bold hover:underline hover:border-black hover:cursor-pointer'>
        <input type=".'submit'." name=".'submit'." id=".'submit'." value=".'Upload'." class='p-4 cursor-pointer'></input>
    </div>
    <div class = 'p-2 my-8 w-24 h-10 items-center justify-center flex border-2 border-white active:bg-green-300 bg-red-400 shadow-2xl rounded-md text-center font-bold hover:underline hover:border-black hover:cursor-pointer'>
    <a href='../mahasiswa/halamansiswa.php'>Kembali</a>
    </div>
    </form>
    </div>";
    }

    ?>
        <script>
        document.getElementById('dokumen').addEventListener("change", function() {
            var fullPath = document.getElementById('dokumen').value;
            if (fullPath) {
                var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath
                    .lastIndexOf('/'));
                var filename = fullPath.substring(startIndex);
                if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                    filename = filename.substring(1);
                }
                document.getElementById("dokumens").innerHTML = filename;
                document.getElementById("uploads").innerHTML = 'Click to Change File';
                const svg = document.querySelector("#svg");
                const filesvg = document.querySelector("#filesvg");
                const namedokumen = document.querySelector("#dokumens");
                svg.classList.add('hidden');
                filesvg.classList.remove('hidden');
                namedokumen.classList.remove('text-xs')
                namedokumen.classList.add('font-semibold')
            }
        });

        function confirmUpdateSKKM() {
            const KegiatanElement2 = document.querySelector('#Panitia');
            const KegiatanElement1 = document.querySelector('#Pengurus');
            KegiatanElement2.classList.remove("bg-red-400")
            KegiatanElement2.classList.add("bg-green-400")
            KegiatanElement1.classList.remove("bg-green-400")
        }

        function activeClassHandler() {
            const KegiatanElement1 = document.querySelector('#Pengurus');
            const KegiatanElement2 = document.querySelector('#Panitia');
            KegiatanElement1.classList.add("bg-green-400")
            KegiatanElement1.classList.remove("bg-red-500")
            KegiatanElement2.classList.remove("bg-green-400")
        }
        let a = document.getElementById('LombaAkademik')
        let b = document.getElementById('LombaNonAkademik')
        let c = document.getElementById('Rekognisi')
        let d = document.getElementById('Pengurus')
        let e = document.getElementById('Panitia')
        if (a) {
            a.addEventListener('click', function() {
                document.getElementById('button_clicked').value = 'LombaAkademik';
            });
        }
        if (b) {
            b.addEventListener('click', function() {
                document.getElementById('button_clicked').value = 'LombaNonAkademik';
            });
        }
        if (c) {
            c.addEventListener('click', function() {
                document.getElementById('button_clicked').value = 'Rekognisi';
            });
        }
        if (d) {
            d.addEventListener('click', function() {
                document.getElementById('button_clicked').value = 'Pengurus';
            });
        }
        if (e) {
            e.addEventListener('click', function() {
                document.getElementById('button_clicked').value = 'Panitia';
            });
        }
        </script>
    </main>

</body>
<footer class="bg-gray-900 h-20 text-center">
    <h3 class="pl-4 pt-4 text-white">Satuan Kredit Kegiatan Mahasiswa (SKKM) Institut Teknologi Indonesia</h3>
    <h3 class="pl-4 text-white">&COPY; Copyright 2023 Institut Teknologi Indonesia. All Right Reserved.</h3>
</footer>

</html>