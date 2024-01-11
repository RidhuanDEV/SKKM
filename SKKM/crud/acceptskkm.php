<?php
require_once "../login/fungsi.php";
include "../login/koneksi.php";
$id = $_GET['id'];
if(isset($id)){
    $noreg = $_GET['noreg'];
    $QuerySKKM = "SELECT * FROM penyimpanan where noreg = $noreg";
    $result = $koneksi->query($QuerySKKM);
    $row = $result->fetch_assoc();
    $nrpms = $row['nrp'];
    $kegiatan = $row['kegiatan'];
    $satuan = $row['satuan'];
    $tingkat = $row['tingkat'];
    $nama_dokumen = $row['dokumen'];
    $nilaiSKKM = $row['NilaiSKKM'];
    $cekdatamahasiswa = "SELECT * FROM datamahasiswa WHERE nrp = '$nrpms'";
    $resultms = $koneksi->query($cekdatamahasiswa);
    if($resultms->num_rows>0){
        $query = "INSERT INTO kegiatan$id VALUES ('$nrpms','$kegiatan','$satuan','$tingkat','$nama_dokumen','$nilaiSKKM')";
        $result = $koneksi->query($query);
        $deletequery = "DELETE FROM `penyimpanan` where `noreg` = $noreg";
        $deleteq = $koneksi->query($deletequery);
        $update = "UPDATE datamahasiswa SET `nilai` = `nilai` + $nilaiSKKM WHERE nrp = $nrpms";
        $EksekusiUpdate = $koneksi->query($update);
    }else{
        echo "<script type='text/javascript'>alert('Data tidak dapat di setujui karena akun mahasiswa telah di hapus. Silahkan Tolak Data Tersebut!');</script>";
    }
}else{
    $noreg = $_GET['noreg'];
    $QuerySKKM = "SELECT * FROM penyimpanan where noreg = $noreg";
    $result = $koneksi->query($QuerySKKM);
    $row = $result->fetch_assoc();
    $nrpms = $row['nrp'];
    $kegiatan = $row['kegiatan'];
    $satuan = $row['satuan'];
    $tingkat = $row['tingkat'];
    $nama_dokumen = $row['dokumen'];
    $nilaiSKKM = $row['NilaiSKKM'];
    $deletequery = "DELETE FROM `penyimpanan` WHERE `noreg` = $noreg";
    $deleteq = $koneksi->query($deletequery);
    unlink("../data/$nrpms/".$nama_dokumen);
    
}
?>
<script>
history.back()
</script>