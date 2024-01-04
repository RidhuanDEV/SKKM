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

    <div class="overflow-x-auto flex h-screen">
        <div class="w-1/4 bg-black p-8 flex flex-col gap-8 text-white justify-center">
            <?php 
                echo"
                <p class='text-center'>".$_SESSION["user_id"]["username"]."</p>
                ";
            ?>
            <a href="dashboard.php">Dashboard</a>
            <a href="halamanadmin.php">Data Kegiatan</a>
            <p>Rekap Nilai SKK</p>
            <a href="logout.php" onclick="return confirm('Are you sure you want to Logout?')"
                class="text-white hover:underline border-2 border-white p-2 rounded-md">Logout</a>
        </div>
        <div class="p-8 w-3/4">
            this is ridhuan
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita tempore hic quis unde aliquid accusantium
            laborum molestias facere totam minus esse quidem atque quia earum repellendus quibusdam alias magnam
            distinctio quasi, ipsam vero architecto. Perferendis aliquam exercitationem odit itaque explicabo eos. Nulla
            vel aperiam earum cupiditate iusto iure voluptatibus eveniet error, quidem possimus ut repellat voluptates!
            Obcaecati placeat eaque accusamus officia doloribus corporis repellat harum eius impedit, laudantium,
            deserunt et ipsa alias quos quae sit? Omnis eos laboriosam nemo quidem exercitationem aperiam! Eum
            voluptatum rerum magnam pariatur. Voluptatibus maiores quos nemo doloribus deserunt? Quidem at eum et magni
            id doloribus ipsa ipsum, ea amet natus sint dolores neque veritatis rem consequatur, est adipisci aut,
            mollitia voluptate assumenda quaerat impedit laudantium? Aspernatur voluptatibus ut cupiditate rem amet
            corporis vero ea voluptatem quia explicabo velit minus, quibusdam earum sed dolorem voluptates quidem non
            ullam? Aliquam quae quasi molestiae molestias enim nobis dignissimos accusantium ex fugit, ipsam beatae
            perspiciatis voluptatem praesentium rerum. Voluptas adipisci, quis pariatur exercitationem, mollitia
            molestias ullam dolores alias eius ducimus vitae eligendi laudantium error esse? Quisquam esse quae, minus
            praesentium nesciunt unde maiores, cum pariatur illo, beatae cupiditate distinctio! Error velit
            reprehenderit ullam temporibus distinctio mollitia impedit voluptate obcaecati? Doloribus, iusto ab commodi,
            perferendis, aperiam impedit recusandae ipsa nulla laborum quo tempora! Dignissimos, illum rem rerum maiores
            nobis hic quis totam eveniet omnis quo est quibusdam beatae dolor, ut voluptates voluptatem voluptatum error
            velit ducimus. Dolor ipsum dolorum deleniti nemo provident laudantium a nesciunt corrupti, ab amet adipisci
            explicabo dolores, rem exercitationem nihil ullam, odio et. Mollitia, inventore assumenda. Inventore ipsum,
            labore atque ipsam corrupti minima esse totam id nisi, consequatur iusto illum exercitationem? Illum, libero
            quisquam. Quas labore vitae voluptatum, odio sint corporis omnis dignissimos. Perspiciatis maxime quo facere
            id animi ut optio, nesciunt rerum a consectetur quae incidunt natus, fuga dicta veritatis quasi.
            Perspiciatis eveniet quaerat nostrum beatae nisi neque aliquam, unde nemo dignissimos necessitatibus
            assumenda debitis iusto, itaque repellat ex aut, fugiat eius veritatis cum possimus. Sint impedit, quasi
            sapiente exercitationem dolorem, rerum, voluptatem accusantium labore eum doloribus unde voluptates
            obcaecati quas. Porro mollitia ratione aspernatur quam facere libero veniam, quis aliquam voluptatum
            inventore possimus dolores ducimus. Sed, facere ducimus voluptates eveniet itaque enim distinctio mollitia
            rem numquam incidunt beatae, adipisci quasi quia facilis quae. Omnis architecto asperiores labore!
            Dignissimos fugiat numquam ipsam sapiente omnis? Inventore voluptatem perferendis, atque ratione quisquam
            quis architecto harum dolorem. Labore quia tenetur ipsam, voluptas error, molestiae in excepturi voluptatem
            vitae aliquam debitis ut eius officiis quod optio, architecto obcaecati nobis consequatur. Ducimus animi
            rem, iste alias ea cum excepturi tempore? Quam aliquam at esse laboriosam ab quibusdam est, fugiat laborum
            eum quos eius vero adipisci voluptatibus qui deleniti quaerat labore officia porro ea enim! Beatae
            voluptates aspernatur autem blanditiis vel deleniti sint omnis pariatur labore odit nesciunt cum vero hic et
            dolorum iure vitae id veniam earum, facere ad similique ea eveniet tempora? Harum facere asperiores
            cupiditate consectetur repudiandae error dolores, eius, voluptatum voluptatem tenetur unde. Iure et illum,
            illo magnam unde dignissimos neque esse nisi cumque cum ullam voluptatum sed necessitatibus ab nemo!
            Facilis, tempora soluta. Vitae dolores cupiditate voluptas voluptatibus sapiente, ducimus quidem, illo
            perspiciatis ex ratione sequi inventore explicabo error assumenda temporibus iure dolorem repudiandae
            corporis officiis neque, expedita delectus aliquid vero voluptatum! Accusamus repellat blanditiis
            perferendis repellendus officia adipisci a laudantium, corrupti recusandae, laboriosam odit itaque explicabo
            alias voluptatem molestias sit ut illo! Voluptatem unde, maiores vitae suscipit voluptate placeat aliquid
            nobis facilis temporibus accusamus doloribus sunt, deserunt nam. Voluptate repellendus a voluptatibus eaque
            maiores, vel temporibus, totam vitae voluptatum optio ipsa excepturi porro tempore at consectetur voluptates
            labore pariatur. Facere laudantium quis libero minima laboriosam culpa omnis numquam! Repellendus ab eius
            sapiente sequi quibusdam amet placeat cumque illum nesciunt asperiores numquam hic, fugit debitis maiores
            obcaecati repellat at quis doloribus, consectetur nam perferendis. Consectetur iusto nesciunt distinctio
            eum, nulla vel doloribus repellat explicabo culpa impedit obcaecati tempora fuga inventore optio deleniti
            dolor illo. Vel quo odio voluptates distinctio deserunt assumenda dolores rerum earum temporibus delectus,
            praesentium voluptate obcaecati accusantium neque nulla? Dolor eum aspernatur magnam quas laboriosam nihil
            debitis impedit pariatur tenetur laudantium eos explicabo facilis sequi voluptates incidunt, accusamus vitae
            deleniti earum, tempora aliquam modi, maiores consectetur? Accusantium rem saepe recusandae cupiditate, quam
            aliquam ad error, dolorem possimus illo sit iste voluptas, omnis obcaecati quaerat nesciunt expedita quod
            ut! Debitis dolores numquam fugit illum consectetur perferendis voluptates adipisci distinctio iste!
            Mollitia porro obcaecati saepe voluptas quas doloribus explicabo ipsa repellat illo aperiam reiciendis
            officia unde quasi odio id et molestiae quia, excepturi beatae facilis suscipit nihil soluta dolores!
            Assumenda porro culpa reiciendis, voluptate quod molestias corporis aliquid debitis itaque minima tenetur
            magnam fuga atque! Quaerat repellendus molestiae ipsa omnis sunt ut, quasi deleniti pariatur corporis
            voluptas inventore dolores enim magnam asperiores animi tenetur adipisci autem blanditiis corrupti suscipit
            harum cum dolorum! Magnam laborum voluptatibus error amet quaerat repellendus delectus architecto excepturi
            quos nisi, repellat, illo velit ducimus exercitationem sapiente ipsa autem suscipit quo atque molestias
            aspernatur. Voluptatum minus id aliquam voluptatem sapiente dolorum. Maxime ut voluptatem temporibus commodi
            maiores, eveniet ullam reprehenderit soluta tempore! Ut, recusandae est facere aspernatur mollitia laborum
            unde maxime iure maiores obcaecati voluptate nihil. Ea dicta laborum eos architecto tempora non odit! Omnis
            quibusdam mollitia fuga eos quod, praesentium et soluta. Illum excepturi qui dolores, magni quidem animi
            consectetur vitae voluptas. Recusandae labore aspernatur reiciendis. Nemo repellendus corporis ducimus nobis
            minus incidunt suscipit sunt beatae ullam totam velit voluptatibus, aperiam voluptas sed quo at facere ipsum
            iure. Nulla consequatur suscipit asperiores soluta! Facilis iure voluptatem modi officiis maiores voluptatum
            tenetur optio delectus ipsam? Obcaecati vitae, alias nam, quos assumenda excepturi ut voluptatibus ipsum
            repellendus, omnis mollitia similique quas deserunt earum asperiores perferendis hic facilis distinctio
            natus. Laboriosam, magni deleniti? Iure cum rerum saepe perferendis eos natus suscipit. Deserunt aut nobis
            praesentium accusantium nisi tempora odio fuga dolore ratione commodi voluptatum, totam voluptatibus
            recusandae odit neque! Architecto debitis harum natus, corrupti nulla vero repellat aut ad distinctio beatae
            necessitatibus quod! Tempora.
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

    function functionClick() {
        const dashboardElement = document.querySelector("#dashboard");
        if addEventListener(onclick() - > ) {
            dashboardElement.classList.remove("hidden")
            dashboardElement.classList.add("block")
        }
    }
    </script>
</body>

</html>