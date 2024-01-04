<?php
include "koneksi.php";
require_once "fungsi.php";
admin();


if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}
if(isset($_GET['deletemahasiswa'])){
   
    // Assuming 'koneksi.php' contains your database connection code
    $nrp = $_GET['deletemahasiswa'];

    // Delete from multiple tables
    $queryDelete1 = "DELETE FROM kegiatan1 WHERE nrp = '$nrp'";
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
    // Close the database connection
    header('location:index.php');
}
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pusat Sistem Informasi SKKM ITI</title>
    <!-- Include Tailwind CSS CDN -->
    <link rel="stylesheet" href="goput.css">
</head>
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
	<!--Responsive Extension Datatables CSS-->
	<link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
    <style>
		/*Overrides for Tailwind CSS */

		/*Form fields*/
		.dataTables_wrapper select,
		.dataTables_wrapper .dataTables_filter input {
			color: #4a5568;
			/*text-gray-700*/
			padding-left: 1rem;
			/*pl-4*/
			padding-right: 1rem;
			/*pl-4*/
			padding-top: .5rem;
			/*pl-2*/
			padding-bottom: .5rem;
			/*pl-2*/
			line-height: 1.25;
			/*leading-tight*/
			border-width: 2px;
			/*border-2*/
			border-radius: .25rem;
			border-color: #edf2f7;
			/*border-gray-200*/
			background-color: #edf2f7;
			/*bg-gray-200*/
		}

		/*Row Hover*/
		table.dataTable.hover tbody tr:hover,
		table.dataTable.display tbody tr:hover {
			background-color: #ebf4ff;
			/*bg-indigo-100*/
		}

		/*Pagination Buttons*/
		.dataTables_wrapper .dataTables_paginate .paginate_button {
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Current selected */
		.dataTables_wrapper .dataTables_paginate .paginate_button.current {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Pagination Buttons - Hover */
		.dataTables_wrapper .dataTables_paginate .paginate_button:hover {
			color: #fff !important;
			/*text-white*/
			box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
			/*shadow*/
			font-weight: 700;
			/*font-bold*/
			border-radius: .25rem;
			/*rounded*/
			background: #667eea !important;
			/*bg-indigo-500*/
			border: 1px solid transparent;
			/*border border-transparent*/
		}

		/*Add padding to bottom border */
		table.dataTable.no-footer {
			border-bottom: 1px solid #e2e8f0;
			/*border-b-1 border-gray-300*/
			margin-top: 0.75em;
			margin-bottom: 0.75em;
		}

		/*Change colour of responsive icon*/
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
		table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
			background-color: #667eea !important;
			/*bg-indigo-500*/
		}
	</style>
<body class="font-sans bg-gray-100 text-gray-900 tracking-wider leading-normal">

    <div class="overflow-x-hidden h-full flex">
        <div class="w-1/4 h-screen"></div>
        <div class="w-1/4 bg-slate-900 p-8 flex fixed h-full flex-col gap-4 text-white justify-center items-center">
            <img src="admin.png" alt="FOTO" width="144px" height="144px">
            <?php 
                if($_SESSION['user_id']['role'] == 'admin'){
                    $user = "Admin Master";
                }else {
                    $user = "Admin PKA";
                }
                echo"
                <p class='text-center mb-20 border-b-2 border-white'>".$user."</p>
                ";
            ?>
            <button onclick="activeClassHandler('DataPengajuan')" id="DataPengajuanButton"
            class='bg-gray-700 rounded-xl font-mono active:scale-105 px-10 py-2 border border-white'>Data Pengajuan SKKM</button>
            <button onclick="activeClassHandler('data')" id="dataButton" class='bg-gray-700 rounded-xl font-mono active:scale-105 px-16 py-2 '>Data Mahasiswa</button>
            <button onclick="activeClassHandler('settings')" id="settingsButton" class='bg-gray-700 rounded-xl font-mono active:scale-105 px-20 py-2 '>Settings</button>
            <a href="logout.php" onclick="return confirm('Are you sure you want to Logout?')"
                class="text-white hover:underline hover:border active:scale-95 hover:border-white bg-red-500 rounded-xl font-mono px-20 py-2 text-center">Logout</a>
        </div>
        <div id="DataPengajuan" class=" flex-1 opacity-100 w-3/4 h-full mx-auto px-2 overflow-auto">

		<!--Title-->
        <div class="border-b-2 border-black mx-2 my-8">
		<h1 class="flex items-center font-sans font-bold break-normal text-slate-900 text-xl md:text-2xl">
			Data Pengajuan SKKM Mahasiswa
		</h1>
        </div>


		<!--Card-->
		<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


			<table id="table1" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead>
					<tr>
						<th data-priority="1">NRP</th>
						<th data-priority="2">ID</th>
						<th data-priority="3">Kegiatan</th>
						<th data-priority="4">Satuan</th>
						<th data-priority="5">Tingkat</th>
						<th data-priority="6">Dokumen</th>
						<th data-priority="7">Nilai</th>
						<th data-priority="8">Terima Pengajuan</th>
						<th data-priority="9">Tolak Pengajuan</th>
					</tr>
				</thead>
				<tbody>
                <?php
                $QuerySKKM = "SELECT * FROM penyimpanan";
                $result = $koneksi->query($QuerySKKM);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                        <tr class='text-center'>
                            <td>" . $row["nrp"] . "</td>
                            <td>" . $row["id"] . "</td>
                            <td>" . $row["kegiatan"] . "</td>
                            <td>" . $row["satuan"] . "</td>
                            <td>" . $row["tingkat"] . "</td>
                            <td>" . $row["dokumen"] . "</td>
                            <td>" . $row["NilaiSKKM"] . "</td>
                            <td><a href='acceptskkm.php?nrp=" . $row["nrp"] . "&id=".$row["id"]."' onclick='return confirmUpdateSKKM()' class='text-green-500 hover:underline'>Setujui</a></td>
                            <td><a href='acceptskkm.php?nrp=" . $row["nrp"] . "' onclick='return confirmTolakSKKM()' class='text-red-500 hover:underline'>Tolak</a></td>
                            </tr>";
                        }
                    }

					?>
				</tbody>

			</table>


		</div>
		<!--/Card-->


	    </div>
    <div class="opacity-0 transition-all duration-500 w-0 h-0 self-start" id="settings">
        <div class="my-8 mx-2 border-b-2 border-black">
		<h1 class="flex items-center font-sans font-bold break-normal text-slate-900 text-xl md:text-2xl">
			Dashboard
		</h1>
        </div>
        <div class="w-full h-1/4 hover:scale-[99%]">
            <button class="w-full h-full" onclick="activeClassHandler('data')">
            <div class="w-[32%] h-full bg-green-400 border-b-8 border-l-4 border-green-600 rounded-xl flex justify-center items-center">
                <div>
                    <img src="user.png" alt="User" class="hover:scale-[95%]">
                </div>
                <div class="pt-10 hover:scale-[105%]">
                <?php 
                $usertotal = "SELECT count(nrp) as total FROM datamahasiswa" ;
                $Eksekusi = $koneksi->query($usertotal);
                $row = mysqli_fetch_assoc($Eksekusi);
                ?>
                    <p class="font-mono font-bold text-lg text-slate-800">Total User : <?php echo $row['total']; ?></p>
                </div>
            </div>
            </button>
        </div>
    </div>
        <div id="data" class="opacity-0 transition-all duration-500 w-0 h-0 self-start mx-auto px-2 overflow-auto">

		<!--Title-->
        <div class="my-8 mx-2 border-b-2 border-black">
		<h1 class="flex items-center font-sans font-bold break-normal text-slate-900 text-xl md:text-2xl">
			Data Mahasiswa
		</h1>
        </div>

            <?php
                echo ($_SESSION['user_id']['role'] == 'admin' ? "
                <div class='w-full mb-4 flex justify-end'>
                <div>
                <a href='create.php' onclick='return confirm('Are you sure you want to create data?')'
                class='text-black hover:underline border-2 border-black p-2 rounded-md'>Create Data Mahasiswa</a>
                </div>
                </div>
                " : "");
                ?>


		<!--Card-->
		<div id='recipients' class=" p-8 mt-6 lg:mt-0 rounded shadow bg-white">


			<table id="table2" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
				<thead>
					<tr>
						<th data-priority="1">NRP</th>
						<th data-priority="2">Nama</th>
						<th data-priority="3">Angkatan</th>
						<th data-priority="4">Nilai</th>
						<th data-priority="5">Keterangan</th>
						<th data-priority="6">Cek Data Mahasiswa</th>
						<?php
                            echo ($_SESSION['user_id']['role'] == 'admin' ? "
                            <th data-priority='7'>Update Profil Mahasiswa</th>
                            <th data-priority='8'>Hapus Data Mahasiswa</th>
                            " : "");
                            ?>
					</tr>
				</thead>
				<tbody>
                <?php
                    include 'koneksi.php';

                    $sqlQuery = "SELECT * FROM datamahasiswa";
                    $result = $koneksi->query($sqlQuery);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $querytotalkegiatan = "SELECT SUM(tbl.kegiatan) as kegiatan FROM (SELECT COUNT(kegiatan) AS kegiatan FROM kegiatan1 WHERE nrp = '".$row["nrp"]."' UNION ALL SELECT COUNT(kegiatan) AS kegiatan FROM kegiatan2 WHERE nrp = '".$row["nrp"]."') tbl ;";
                            $results = $koneksi->query($querytotalkegiatan);
                            $keterangan = '';
                        
                            while ($rows = $results->fetch_assoc()){
                                if($row['angkatan'] == '2018' && $row['nilai'] >= 0 && $rows['kegiatan'] > 5){
                                    $keterangan = 'Lulus';
                                }else if($row['angkatan'] == '2019' && $row['nilai'] > 29 && $rows['kegiatan'] > 5){
                                    $keterangan = 'Lulus';
                                }else if($row['angkatan'] == '2020' && $row['nilai'] > 49 && $rows['kegiatan'] > 5){
                                    $keterangan = 'Lulus';
                                }else if($row['angkatan'] == '2021' && $row['nilai'] > 59 && $rows['kegiatan'] > 5){
                                    $keterangan = 'Lulus';
                                }else if($row['angkatan'] == '2022' && $row['nilai'] > 79 && $rows['kegiatan'] > 5){
                                    $keterangan = 'Lulus';
                                }else if($row['angkatan'] == '2023' && $row['nilai'] > 79 && $rows['kegiatan'] > 5){
                                    $keterangan = 'Lulus';
                                }else {
                                    $keterangan = 'Belum Lulus';
                                }
                            
                        }
                            echo "
                            <tr class='text-center  '>
                                <td>" . $row["nrp"] . "</td>
                                <td>" . $row["nama"] . "</td>
                                <td>" . $row["angkatan"] . "</td>
                                <td>" . $row["nilai"] . "</td>
                                <td>" . $keterangan . "</td>
                                <td>
                                    <a href='profilmahasiswa.php?nrp=" . $row["nrp"] . "' class='text-blue-500 hover:underline'>Read</a>    
                                </td>
                                ".( $_SESSION['user_id']['role'] == 'admin' ? "
                                <td>
                                    <a href='updateprofil.php?nrp=" . $row["nrp"]. "onclick='return confirmUpdate()' class='text-green-500 hover:underline'>Update</a>
                                </td>
                                
                            <td>
                                    <a href='index.php?deletemahasiswa= " .$row['nrp']."; ' onclick='return confirmDelete()' class='text-red-500 hover:underline'>Delete</a>
                            </td>": "")."
                            </tr>";
                        }
                    }

					?>
				</tbody>

			</table>


		</div>
		<!--/Card-->


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
        return confirm('Apakah anda yakin untuk memvalidasi SKKM ?');
    }
    function confirmTolakSKKM() {
        return confirm('Apakah anda yakin untuk Menolak Pengajuan SKKM ?');
    }


    function activeClassHandler(target) {
        const DataPengajuanElement = document.querySelector("#DataPengajuan");
        const dataElement = document.querySelector("#data");
        const settingsElement = document.querySelector("#settings");

        const DataPengajuanBtn = document.querySelector("#DataPengajuanButton");
        const dataBtn = document.querySelector("#dataButton");
        const settingsBtn = document.querySelector("#settingsButton");


        if (target == "DataPengajuan") {
            // button active
            DataPengajuanBtn.classList.add("border", "border-white")
            dataBtn.classList.remove("border")
            settingsBtn.classList.remove("border")

            // elemen reveal
            DataPengajuanElement.classList.add("opacity-100", "w-3/4", "px-2","h-full","flex-1")
            DataPengajuanElement.classList.remove("opacity-0", "w-0","h-0")
            dataElement.classList.add("opacity-0", "w-0","h-0")
            dataElement.classList.remove("opacity-100", "w-3/4", "px-2","h-full","flex-1")
            settingsElement.classList.add("opacity-0", "w-0","h-0")
            settingsElement.classList.remove("opacity-100", "w-3/4", "px-2","h-screen","flex-1")
        } else if (target == "data") {
            dataBtn.classList.add("border", "border-white")
            DataPengajuanBtn.classList.remove("border")
            settingsBtn.classList.remove("border")
            dataElement.classList.add("opacity-100", "w-3/4", "px-2","h-full","flex-1")
            dataElement.classList.remove("opacity-0", "w-0","h-0")
            DataPengajuanElement.classList.add("opacity-0", "w-0","h-0")
            DataPengajuanElement.classList.remove("opacity-100", "w-3/4", "px-2","h-full","flex-1")
            settingsElement.classList.add("opacity-0", "w-0","h-0")
            settingsElement.classList.remove("opacity-100", "w-3/4", "px-2","h-screen","flex-1")
        } else {
            settingsBtn.classList.add("border", "border-white")
            dataBtn.classList.remove("border")
            DataPengajuanBtn.classList.remove("border")

            settingsElement.classList.add("opacity-100", "w-3/4", "px-2","h-screen","flex-1")
            settingsElement.classList.remove("opacity-0", "w-0","h-0")
            dataElement.classList.add("opacity-0", "w-0","h-0")
            dataElement.classList.remove("opacity-100", "w-3/4", "px-2","h-full","flex-1")
            DataPengajuanElement.classList.add("opacity-0", "w-0","h-0")
            DataPengajuanElement.classList.remove("opacity-100", "w-3/4", "px-2","h-full","flex-1")
        }
    }
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<!--Datatables -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready(function() {

        var table = $('#table1').DataTable({
                responsive: true
            })
            .columns.adjust()
            .responsive.recalc();

     
        var table = $('#table2').DataTable({
                responsive: true
            })
            .columns.adjust()
            .responsive.recalc();
    });
    $(document).ready(function() {

        
    });
</script>
</body>

</html>