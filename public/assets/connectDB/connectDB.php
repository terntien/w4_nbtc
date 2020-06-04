<?php
    $server = "localhost";
    $user = "root";
    $password = "1234";
    $db_name = "nbtc_tb";
    // print_r($_POST);exit;
    $conn = new mysqli($server,$user,$password,$db_name);
    if($conn->connect_errno) {
        printf("ไม่สามารถเชื่อมต่อฐานข้อมูลได้", $conn->connect_error);
        exit();
    }
    mysqli_set_charset($conn, 'utf8');
    // print_r($_SESSION);exit;
?>