<?php
require_once "./login/fungsi.php";
siswaindex();
adminindex();
if(!isset($_SESSION['user_id'])){
    header('location:./login/login.php');
}
?>