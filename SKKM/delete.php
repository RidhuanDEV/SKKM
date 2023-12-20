<?php
include 'koneksi.php';

// Assuming 'koneksi.php' contains your database connection code
$nrp = $_GET['nrp'];

// Delete from multiple tables
$queryDelete1 = "DELETE FROM kegiatan WHERE nrp = '$nrp'";
$queryDelete2 = "DELETE FROM kegiatan2 WHERE nrp = '$nrp'";
$queryDelete3 = "DELETE FROM kegiatan3 WHERE nrp = '$nrp'";
$queryDelete4 = "DELETE FROM kegiatan4 WHERE nrp = '$nrp'";
$queryDelete5 = "DELETE FROM kegiatan5 WHERE nrp = '$nrp'";
$queryDelete6 = "DELETE FROM kegiatan6 WHERE nrp = '$nrp'";

$multiQuery = "
    $queryDelete1;
    $queryDelete2;
    $queryDelete3;
    $queryDelete4;
    $queryDelete5;
    $queryDelete6;
";

if ($koneksi->multi_query($multiQuery)) {
    // Consume all results from each query, even if you don't need them
    do {
        if ($result = $koneksi->store_result()) {
            $result->free();
        }
    } while ($koneksi->more_results() && $koneksi->next_result());
} else {
    // Handle the case where one of the queries fails
    echo "Error executing multi-query: " . $koneksi->error;
}

// Delete from 'datamahasiswa'
$queryDELETE = "DELETE FROM datamahasiswa WHERE nrp = '$nrp'";
$hasil = $koneksi->query($queryDELETE);

if ($hasil) {
    echo "Data deleted successfully!";
} else {
    // Handle the case where the query fails
    echo "Error deleting data: " . $koneksi->error;
}

// Close the database connection
$koneksi->close();
?>
