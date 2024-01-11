<?php 
session_start();
function admin(){
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_id']["role"] == 'admin' || $_SESSION['user_id']["role"] == 'admin_pka') {
        
    } else {
        header('location:../mahasiswa/halamansiswa.php');
        echo "<script type='text/javascript'>alert('Selamat Datang Mahasiswa !');</script>";
    
    }
}}
function siswa(){
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_id']["role"] == 'admin' || $_SESSION['user_id']["role"] == 'admin_pka') {
        header('location:./admin/index.php');
        echo "<script type='text/javascript'>alert('Selamat Datang Wahai Sang Administrator !');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Selamat Datang Mahasiswa !');</script>";
    
    }
}
}
function siswa2(){
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_id']["role"] == 'admin' || $_SESSION['user_id']["role"] == 'admin_pka') {
        header('location:./admin/index.php');
        echo "<script type='text/javascript'>alert('Selamat Datang Wahai Sang Administrator !');</script>";
    } else {
    }
}
}
function adminindex(){
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_id']["role"] == 'admin' || $_SESSION['user_id']["role"] == 'admin_pka') {
        
    } else {
        header('location:./mahasiswa/halamansiswa.php');
        echo "<script type='text/javascript'>alert('Selamat Datang Mahasiswa !');</script>";
    
    }
}}
function siswaindex(){
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_id']["role"] == 'admin' || $_SESSION['user_id']["role"] == 'admin_pka') {
        header('location:./admin/index.php');
        echo "<script type='text/javascript'>alert('Selamat Datang Wahai Sang Administrator !');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Selamat Datang Mahasiswa !');</script>";
    
    }
}
}
function removeDir(string $dir): void {
    $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator($it,
                 RecursiveIteratorIterator::CHILD_FIRST);
    foreach($files as $file) {
        if ($file->isDir()){
            rmdir($file->getPathname());
        } else {
            unlink($file->getPathname());
        }
    }
    rmdir($dir);
}
?>
