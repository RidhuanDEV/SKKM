<?php
include "./login/koneksi.php";

$Q = "SELECT * FROM datamahasiswa";
$E = $koneksi->query($Q);

while ($i = mysqli_fetch_assoc($E)) {
    $nrp = $i['nrp'];
    echo "$nrp<br>";
    $a = array("kegiatan1.txt","kegiatan2.txt","kegiatan3.txt","kegiatan4.txt","kegiatan5.txt","kegiatan6.txt");
    // Create directory for each 'nrp'
    foreach($a as $file){
    fopen("./kegiatan/$nrp - $file","w");
    }
}
?>
