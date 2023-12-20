<?php
include "koneksi.php";
require_once "fungsi.php";
admin();
// SELECT a.result + b.result + c.result -- (All the way to r.result...)
// FROM TableA a
// INNER JOIN TableB b
//   ON a.ID = b.ID
// INNER JOIN TableC c
//   ON b.ID = c.ID
if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}
if(isset($_GET['deletemahasiswa'])){
   
    // Assuming 'koneksi.php' contains your database connection code
    $nrp = $_GET['deletemahasiswa'];

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

    echo "<script type='text/javascript'>alert('Data Mahasiswa Telah di Hapus');</script>";
    header('location:halamanadmin.php');
    // Close the database connection
    $koneksi->close();
}
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Sistem Informasi SKKM ITI</title>
    <!-- Include Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="font-sans bg-white">
        
        <div class="overflow-x-hidden flex h-screen">
            <div class="w-1/4 bg-black p-8 flex flex-col gap-8 text-white justify-center">
            <?php 
                echo"
                <p class='text-center mb-20'>".$_SESSION["user_id"]["username"]."</p>
                ";
            ?>
                <button onclick="activeClassHandler('dashboard')" id="dashboardButton" class="border border-white">Dashboard</button>
                <button onclick="activeClassHandler('data')" id="dataButton">Data Kegiatan</button>
                <button onclick="activeClassHandler('settings')" id="settingsButton">Settings</button>
                <a href="logout.php" onclick="return confirm('Are you sure you want to Logout?')"
                class="text-white hover:underline border-2 border-white p-2 rounded-md">Logout</a>
            </div>
            <div class="opacity-100 transition-all duration-500 w-0" id="dashboard">
                Dashboard
            </div>
            <div class="opacity-0 transition-all duration-500 w-0" id="settings">
                Settings
            </div>
            <div class="p-2 w-3/4 opacity-0 transition-all duration-500 overflow-x-auto" id="data">
                <a href="create.php" onclick="return confirm('Are you sure you want to create data?')"
                class="text-black hover:underline border-2 border-black p-2 mt-4 inline-block rounded-md">Create Data</a>
                <table class="w-full bg-white border border-solid border-black mt-8 collapse shadow-lg">
                    <thead class="text-black bg-blue-200">
                        <tr>
                            <th class="py-3 border border-solid border-black px-5 ">NRP</th>
                            <th class="py-3 border border-solid border-black px-5 ">Nama</th>
                            <th class="py-3 border border-solid border-black px-5 ">Email</th>
                            <th class="py-3 border border-solid border-black px-5 ">Alamat</th>
                            <th class="py-3 border border-solid border-black px-5 ">Tgl Lahir</th>
                            <th class="py-3 border border-solid border-black px-5 ">Cek Data Mahasiswa</th>
                            <th class="py-3 border border-solid border-black px-5 ">Update Profil Mahasiswa</th>
                            <th class="py-3 border border-solid border-black px-5 ">Update SKKM Mahasiswa</th>
                            <th class="py-3 border border-solid border-black px-5 ">Hapus Data Mahasiswa</th>
                        </tr>
                    </thead>

                    <?php
                    include 'koneksi.php';

                    $sqlQuery = "SELECT * FROM datamahasiswa";
                    $result = $koneksi->query($sqlQuery);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                            <tr class='border-t hover:bg-gray-100 transition-all'>
                                <td class='py-3 text-black border border-solid border-black px-5'>" . $row["nrp"] . "</td>
                                <td class='py-3 text-black border border-solid border-black px-5'>" . $row["nama"] . "</td>
                                <td class='py-3 text-black border border-solid border-black px-5'>" . $row["email"] . "</td>
                                <td class='py-3 text-black border border-solid border-black px-5'>" . $row["alamat"] . "</td>
                                <td class='py-3 text-black border border-solid border-black px-5'>" . $row["tgl_lahir"] . "</td>
                                <td class='py-3 text-black border border-solid border-black px-5'>
                                    <a href='read.php?nrp=" . $row["nrp"] . "' class='text-blue-500 hover:underline'>Read</a>    
                                </td>
                                <td class='py-3 text-black border border-solid border-black px-5'>
                                    <a href='updateprofil.php?nrp=" . $row["nrp"] . "kegiatan=".'1'."' onclick='return confirmUpdate()' class='text-green-500 hover:underline'>Update</a>
                                </td>
                                <td class='py-3 text-black border border-solid border-black px-5'>
                                    <a href='updateprofil.php?nrp=" . $row["nrp"] . "' onclick='return confirmUpdateSKKM()' class='text-green-500 hover:underline'>Update</a>
                                </td>
                            <td class='py-3 text-black border border-solid border-black px-5'>
                                    <a href='halamanadmin.php?deletemahasiswa= " .$row['nrp']."; ' onclick='return confirmDelete()' class='text-red-500 hover:underline'>Delete</a>
                            </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9' class='py-3 text-center text-black border border-solid border-black px-5'>0 results</td></tr>";
                    }

            ?>
                </table>
            </div>
        </div>


    <script>
        function confirmDelete() {
            return confirm('Are you sure you want to delete this data?');
        }

        function confirmUpdate() {
            return confirm('Are you sure you want to update the profile?');
        }

        function confirmUpdateSKKM() {
            return confirm('Are you sure you want to update SKKM?');
        }
        function activeClassHandler(target){
            const dashboardElement = document.querySelector("#dashboard");
            const dataElement =document.querySelector("#data");
            const settingsElement = document.querySelector("#settings");

            const dashboardBtn =document.querySelector("#dashboardButton")
            const dataBtn =document.querySelector("#dataButton")
            const settingsBtn =document.querySelector("#settingsButton")
            

            if (target == "dashboard"){
                // button active
                dashboardBtn.classList.add("border", "border-white")
                dataBtn.classList.remove("border")
                settingsBtn.classList.remove("border")

                // elemen reveal
                dashboardElement.classList.add("opacity-100", "w-3/4")
                dashboardElement.classList.remove("opacity-0", "w-0")
                dataElement.classList.add("opacity-0", "w-0")
                dataElement.classList.remove("opacity-100", "w-3/4")
                settingsElement.classList.add("opacity-0", "w-0")
                settingsElement.classList.remove("opacity-100", "w-3/4")
            } else if (target == "data") {
                dataBtn.classList.add("border", "border-white")
                dashboardBtn.classList.remove("border")
                settingsBtn.classList.remove("border")

                dataElement.classList.add("opacity-100", "w-3/4")
                dataElement.classList.remove("opacity-0", "w-0")
                dashboardElement.classList.add("opacity-0", "w-0")
                dashboardElement.classList.remove("opacity-100", "w-3/4")
                settingsElement.classList.add("opacity-0", "w-0")
                settingsElement.classList.remove("opacity-100", "w-3/4")
            } else {
                settingsBtn.classList.add("border", "border-white")
                dataBtn.classList.remove("border")
                dashboardBtn.classList.remove("border")

                settingsElement.classList.add("opacity-100", "w-3/4")
                settingsElement.classList.remove("opacity-0", "w-0")
                dataElement.classList.add("opacity-0", "w-0")
                dataElement.classList.remove("opacity-100", "w-3/4")
                dashboardElement.classList.add("opacity-0", "w-0")
                dashboardElement.classList.remove("opacity-100", "w-3/4")
            }
        }
    </script>
</body>
</html>
