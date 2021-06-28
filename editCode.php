<?php

include('includes/security.php');


if(isset($_POST['updatebtn']))
    {include('includes/security.php');
        $id =$_POST['edit_id'];
        $username = $_POST['edit_username'];
        $password = $_POST['edit_password'];

        $query ="UPDATE admin SET username='$username', password='$password' where id ='$id' ";
        $query_run= mysqli_query($connection, $query);

        if($query_run){
            $_SESSION['success'] = "Your Data is Updated";
            
            header('Location: registerA.php');
        }
        else{
            $_SESSION['status'] = "Your Data is NOT Updated";
            
            header('Location: registerA.php');
        }
    }    


    if(isset($_POST['deletebtn']))
    {include('includes/security.php');
        $id=$_POST['delete_id'];
    
        $query ="DELETE from admin where id='$id' ";
        $query_run= mysqli_query($connection, $query);

        if($query_run){
            $_SESSION['success'] = "Your Data is Deleted";
            
            header('Location: registerA.php');
        }
        else{
            $_SESSION['status'] = "Your Data is NOT Deleted";
            
            header('Location: registerA.php');
        }
    }    

?>