<?php
require_once "fungsi.php";
include "koneksi.php";
$id = $_GET['id'];
if(isset($id)){
    $nrp = $_GET['nrp'];
    $QuerySKKM = "SELECT * FROM penyimpanan where nrp = $nrp";
    $result = $koneksi->query($QuerySKKM);
    $row = $result->fetch_assoc();
    $nrpms = $row['nrp'];
    $kegiatan = $row['kegiatan'];
    $satuan = $row['satuan'];
    $tingkat = $row['tingkat'];
    $nama_dokumen = $row['dokumen'];
    $nilaiSKKM = $row['NilaiSKKM'];
    $cekdatamahasiswa = "SELECT * FROM datamahasiswa WHERE nrp = '$nrp'";
    $resultms = $koneksi->query($cekdatamahasiswa);
    if($resultms->num_rows>0){
        $query = "INSERT INTO kegiatan$id VALUES ('$nrpms','$kegiatan','$satuan','$tingkat','$nama_dokumen','$nilaiSKKM')";
        $result = $koneksi->query($query);
        $deletequery = "DELETE FROM `penyimpanan` where `nrp` = '$nrpms' and `kegiatan` = '$kegiatan' and `satuan`= '$satuan' and `dokumen` = '$nama_dokumen'";
        $deleteq = $koneksi->query($deletequery);
    }else{
        echo "<script type='text/javascript'>alert('Data tidak dapat di setujui karena akun mahasiswa telah di hapus. Silahkan Tolak Data Tersebut!');</script>";
    }
}else{
    $nrp = $_GET['nrp'];
    $QuerySKKM = "SELECT * FROM penyimpanan where nrp = $nrp";
    $result = $koneksi->query($QuerySKKM);
    $row = $result->fetch_assoc();
    $nrpms = $row['nrp'];
    $kegiatan = $row['kegiatan'];
    $satuan = $row['satuan'];
    $tingkat = $row['tingkat'];
    $nama_dokumen = $row['dokumen'];
    $nilaiSKKM = $row['NilaiSKKM'];
    $deletequery = "DELETE FROM `penyimpanan` where `nrp` = $nrpms and `kegiatan` = '$kegiatan' and `satuan`= '$satuan' and `dokumen` = '$nama_dokumen'";
    $deleteq = $koneksi->query($deletequery);
    unlink('dokumen/'.$nama_dokumen);
    
}
?>
<script>
history.back()
</script>