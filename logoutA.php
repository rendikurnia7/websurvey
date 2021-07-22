<?php
include('securityA.php');

 if(isset($_POST['logoutA_btn'])){

    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['usertype']);
    header("Location: login.php");
}
?>