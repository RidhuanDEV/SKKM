<?php 
require_once "fungsi.php";
include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update SKKM Mahasiswa ITI</title>
</head>
<header>
    <h3>Halaman Update SKKM Mahasiswa Institut Teknologi Indonesia</h3>
</header>
<body>
<?php

$id = isset($_GET['kegiatan']) ? $_GET['kegiatan'] : null;

if (isset($_POST['submit'])) {
    $nrp = $_GET['nrp'];
    $kegiatan = $_POST['kegiatan'];
    $Satuan = $_POST['satuan'];
    $nilaiSKKM = $_POST['nilai'];

    // File handling
    $uploadDirectory = 'dokumen/';
    $nama_dokumen = isset($_FILES['dokumen']['name']) ? $_FILES['dokumen']['name'] : null;
    $tmp_nama_dokumen = isset($_FILES['dokumen']['tmp_name']) ? $_FILES['dokumen']['tmp_name'] : null;

    

    if (!empty($nama_dokumen) && !empty($tmp_nama_dokumen)) {
        $destination = $uploadDirectory . $nama_dokumen;
        move_uploaded_file($tmp_nama_dokumen, $destination);
    } else {
        $destination = null; // or provide a default value
    }

    if ($id == 1) {
        // Update database with file path
        $querySQL = "UPDATE kegiatan SET kegiatan = '$kegiatan', satuan = '$Satuan', dokumen = '$destination', `NilaiSKKM` = '$nilaiSKKM' WHERE nrp = '$nrp'";
        $Eksekusi = $koneksi->query($querySQL);
    }
    if ($id == 2) {
        // Update database with file path
        $querySQL = "UPDATE kegiatan2 SET kegiatan = '$kegiatan', satuan = '$Satuan', dokumen = '$destination', `NilaiSKKM` = '$nilaiSKKM' WHERE nrp = '$nrp'";
        $Eksekusi = $koneksi->query($querySQL);
    }
    if ($id == 3) {
        // Update database with file path
        $querySQL = "UPDATE kegiatan3 SET kegiatan = '$kegiatan', satuan = '$Satuan', dokumen = '$destination', `NilaiSKKM` = '$nilaiSKKM' WHERE nrp = '$nrp'";
        $Eksekusi = $koneksi->query($querySQL);
    }
    if ($id == 4) {
        // Update database with file path
        $querySQL = "UPDATE kegiatan4 SET kegiatan = '$kegiatan', satuan = '$Satuan', dokumen = '$destination', `NilaiSKKM` = '$nilaiSKKM' WHERE nrp = '$nrp'";
        $Eksekusi = $koneksi->query($querySQL);
    }
    if ($id == 5) {
        // Update database with file path
        $querySQL = "UPDATE kegiatan5 SET kegiatan = '$kegiatan', satuan = '$Satuan', dokumen = '$destination', `NilaiSKKM` = '$nilaiSKKM' WHERE nrp = '$nrp'";
        $Eksekusi = $koneksi->query($querySQL);
    }
    if ($id == 6) {
        // Update database with file path
        $querySQL = "UPDATE kegiatan6 SET kegiatan = '$kegiatan', satuan = '$Satuan', dokumen = '$destination', `NilaiSKKM` = '$nilaiSKKM' WHERE nrp = '$nrp'";
        $Eksekusi = $koneksi->query($querySQL);
    }
}

    if ($id == 1){
        echo"
        <form method=".'post'." enctype=".'multipart/form-data'.">
    <div>
    <label for='kegiatan'>Kegiatan Keikutsertaan MBKB</label>
    <select name='kegiatan' id='kegiatan' required>
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
    <div>        
        <label for=".'satuan'.">Satuan</label>
        <select name=".'satuan'." id=".'satuan'." required>
            <option value=".'Semester'.">Semester</option>
            <option value=".'Kegiatan'.">Kegiatan</option>
            <option value=".'Tahun'.">Tahun</option>
        </select>
    </div>
    lorem ipsum ___________________________________________________________________________________________________
    <div>
        <label for=".'dokumen'.">Dokumen Bukti</label>
        <input type=".'file'." name=".'dokumen'." id=".'dokumen'." required>
    </div>

    <div>
        <input type=".'submit'." name=".'submit'." id=".'submit'.">Submit</input>
    </div>
    </form>";
    }
    if ($id == 2){
        echo"
        <form method=".'post'." enctype=".'multipart/form-data'.">
    <div>
    <label for='kegiatan'>Kegiatan Keikutsertaan MBKB</label>
    <select name='kegiatan' id='kegiatan' required>
        <option value='Riset Eksakta'>Riset Eksakta</option>
        <option value='Penerapan IPTEK'>Penerapan IPTEK</option>
        <option value='Kewirausahaan'>Kewirausahaan</option>
        <option value='Pengabdian Masyarakat'>Pengabdian Masyarakat</option>
        <option value='Karsa Cipta'>Karsa Cipta</option>
        <option value='Karya Inovatif'>Karya Inovatif</option>
        <option value='Video Gagasan Konstruktif'>Video Gagasan Konstruktif</option>
        <option value='Gagasan Futuristik Tertulis'>Gagasan Futuristik Tertulis</option>
    </select>
    </div>
    <div>        <label for=".'satuan'.">Satuan</label>
        <select name=".'satuan'." id=".'satuan'." required>
            <option value=".'Semester'.">Semester</option>
            <option value=".'Kegiatan'.">Kegiatan</option>
            <option value=".'Tahun'.">Tahun</option>
        </select>
    </div>
    <div>
        <label for=".'dokumen'.">Dokumen Bukti</label>
        <input type=".'file'." name=".'dokumen'." id=".'dokumen'." required>
    </div>

    <div>
        <input type=".'submit'." name=".'submit'." id=".'submit'.">Submit</input>
    </div>
    </form>";
    }
    if ($id == 3){
        echo"
        <form method=".'post'." enctype=".'multipart/form-data'.">
    <div>
    <label for='kegiatan'>Kegiatan Keikutsertaan MBKB</label>
    <select name='kegiatan' id='kegiatan' required>
        <option value='Lomba Akademik'>Lomba Akademik</option>
        <option value='Lomba Non-Akademik'>Lomba Non-Akademik</option>
        <option value='Rekognisi'>Rekognisi</option>
    </select>
    </div>
    <div>        <label for=".'satuan'.">Satuan</label>
        <select name=".'satuan'." id=".'satuan'." required>
            <option value=".'Semester'.">Semester</option>
            <option value=".'Kegiatan'.">Kegiatan</option>
            <option value=".'Tahun'.">Tahun</option>
        </select>
    </div>
    <div>
        <label for=".'dokumen'.">Dokumen Bukti</label>
        <input type=".'file'." name=".'dokumen'." id=".'dokumen'." required>
    </div>

    <div>
        <input type=".'submit'." name=".'submit'." id=".'submit'.">Submit</input>
    </div>
    </form>";
    }
    if ($id == 4){
        echo"
        <form method=".'post'." enctype=".'multipart/form-data'.">
    <div>
    <label for='kegiatan'>Kegiatan Keikutsertaan MBKB</label>
    <select name='kegiatan' id='kegiatan' required>
        <option value='PKKMB'>PKKMB</option>
        <option value='Asisten Dosen/Lab'>Asisten Dosen/Lab</option>
        <option value='Relawan Anti Narkoba'>Relawan Anti Narkoba</option>
        <option value='Satgas PPKS'>Satgas PPKS</option>
        <option value='Panitia Adhoc ITI (Pusat)'>Panitia Adhoc ITI (Pusat)</option>
    </select>
    </div>
    <div>        <label for=".'satuan'.">Satuan</label>
        <select name=".'satuan'." id=".'satuan'." required>
            <option value=".'Semester'.">Semester</option>
            <option value=".'Kegiatan'.">Kegiatan</option>
            <option value=".'Tahun'.">Tahun</option>
        </select>
    </div>
    <div>
        <label for=".'dokumen'.">Dokumen Bukti</label>
        <input type=".'file'." name=".'dokumen'." id=".'dokumen'." required>
    </div>

    <div>
        <input type=".'submit'." name=".'submit'." id=".'submit'.">Submit</input>
    </div>
    </form>";
    }
    if ($id == 5){
        echo"
        <form method=".'post'." enctype=".'multipart/form-data'.">
    <div>
    <label for='kegiatan'>Kegiatan Keikutsertaan MBKB</label>
    <select name='kegiatan' id='kegiatan' required>
        <option value='Pengurus Ormawa (HMPS, UKM, UKK)'>Pengurus Ormawa (HMPS, UKM, UKK)</option>
        <option value='Panitia Kegiatan Ormawa'>Panitia Kegiatan Ormawa</option>
    </select>
    </div>
    <div>        <label for=".'satuan'.">Satuan</label>
        <select name=".'satuan'." id=".'satuan'." required>
            <option value=".'Semester'.">Semester</option>
            <option value=".'Kegiatan'.">Kegiatan</option>
            <option value=".'Tahun'.">Tahun</option>
        </select>
    </div>
    <div>
        <label for=".'dokumen'.">Dokumen Bukti</label>
        <input type=".'file'." name=".'dokumen'." id=".'dokumen'." required>
    </div>

    <div>
        <input type=".'submit'." name=".'submit'." id=".'submit'.">Submit</input>
    </div>
    </form>";
    }
    if ($id == 6){
        echo"
        <form method=".'post'." enctype=".'multipart/form-data'.">
    <div>
    <label for='kegiatan'>Kegiatan Keikutsertaan MBKB</label>
    <select name='kegiatan' id='kegiatan' required>
        <option value='Mengikuti Seminar Sebagai Peserta'>Mengikuti Seminar Sebagai Peserta</option>
        <option value='Mengikuti Workshop hardskill/softskill'>Mengikuti Workshop hardskill/softskill</option>
        <option value='Anggota Organisasi Profesi'>Anggota Organisasi Profesi</option>
        <option value='Sertifikasi'>Sertifikasi</option>
        <option value='Kemampuan Bahasa Inggris (TOEFL minimal 425)'>Kemampuan Bahasa Inggris (TOEFL minimal 425)</option>
    </select>
    </div>
    <div>        <label for=".'satuan'.">Satuan</label>
        <select name=".'satuan'." id=".'satuan'." required>
            <option value=".'Semester'.">Semester</option>
            <option value=".'Kegiatan'.">Kegiatan</option>
            <option value=".'Tahun'.">Tahun</option>
        </select>
    </div>
    <div>
        <label for=".'dokumen'.">Dokumen Bukti</label>
        <input type=".'file'." name=".'dokumen'." id=".'dokumen'." required>
    </div>

    <div>
        <input type=".'submit'." name=".'submit'." id=".'submit'.">Submit</input>
    </div>
    </form>";
    }
    
    
    ?>
    
</body>
</html>