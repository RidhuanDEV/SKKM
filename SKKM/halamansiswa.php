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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <div id="kotak-utama" class="w-full min-h-screen flex">
        <div id="kotak-kiri" class="w-3/4 h-full p-6 border-1 border-gray-400">
            <!-- Content for kotak-kiri goes here -->
            <p class="text-xl font-bold mb-4">Kotak Kiri</p>
            <p>Additional content...</p>
        </div>
        <div id="kotak-kanan" class="w-1/4 min-h-screen p-6 border-l border-gray-400">
            <a href="logout.php">Logout</a>
            <?php 
                // var_dump($_SESSION["user_id"])
                echo"
                <p class='text-xl font-semibold'>Profile</p>
                <p>nrp: ".$_SESSION["user_id"]["nrp"]."</p>
                <p>nama: ".$_SESSION["user_id"]["nama"]."</p>
                <p>email: ".$_SESSION["user_id"]["email"]."</p>
                ";
            ?>
            <!-- Content for kotak-kanan goes here -->
        </div>
    </div>
</body>
</html>
