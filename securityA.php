<?php
session_start();

include('database/dbconfig.php');
if($connection)
{
    // echo "Database Connected";
}
else
{
    header("Location: database/dbconfig.php");
}

if(!$_SESSION['username'] && !$_SESSION['usertype'] = "admin")
{
    header('Location: login.php');
}
?>