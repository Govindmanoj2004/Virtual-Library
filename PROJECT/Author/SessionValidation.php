<?php
session_start();
if($_SESSION['auid']==""){
    header("location: ../Guest/Login.php");
}
?>