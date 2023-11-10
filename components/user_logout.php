<?php 
    //Cách 1 để đăng xuất
   // if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        //     unset($_SESSION['admin_id']);
        // } 
    include 'connect.php';

    session_start();
    session_unset();
    session_destroy();
    header("location:../home.php");
?>