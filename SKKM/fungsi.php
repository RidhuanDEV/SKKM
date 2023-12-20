<?php 
session_start();
function admin(){
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_id']["role"] == 'admin' || $_SESSION['user_id']["role"] == 'admin_pka') {
    } else {
        header('location:halamansiswa.php');
        echo "<script type='text/javascript'>alert('Selamat Datang Mahasiswa !');</script>";
    
    }
}}
function siswa(){
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_id']["role"] == 'admin' || $_SESSION['user_id']["role"] == 'admin_pka') {
        header('location:index.php');
        echo "<script type='text/javascript'>alert('Selamat Datang Wahai Sang Administrator !');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Selamat Datang Mahasiswa !');</script>";
    
    }
}}
?>
