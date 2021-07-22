<?php

include('security.php');

if(isset($_POST['registerbtn']))
{
    $id =$_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['confirmpassword'];
    $usertype = $_POST['usertype'];
    
        if($password === $cpassword)
        {
            $query = "INSERT INTO admin (username, password, usertype) VALUES ('$username','$password','$usertype')";
            $query_run = mysqli_query($connection, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['success'] = "Admin Profile Added";
                header('Location: registerA.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                
                header('Location: registerA.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: registerA.php');  
        }
    }



    if(isset($_POST['updatebtn']))
    {
        $id =$_POST['edit_id'];
        $username = $_POST['edit_username'];
        $password = $_POST['edit_password'];
        

        $query ="UPDATE admin SET username='$username', password='$password'  where id ='$id' ";
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


    if(isset($_POST['update_admin']))
{
    $id=$_POST['edit_id'];
    $username = $_POST['edit_username'];
    $usertype = $_POST['edit_usertype'];
    $password = $_POST['edit_password'];

    $query = "UPDATE admin SET username='$username', password='$password', usertype='$usertype' WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $_SESSION['success'] = "Your Data is Updated";
        
        header('Location: registerA.php'); 
    }
    else
    {
        $_SESSION['status'] = "Your Data is NOT Updated";
       
        header('Location: registerA.php'); 
    }
}


    if(isset($_POST['delete_admin']))
    {
        $username = $_POST['delete_username'];
    
        $query = "DELETE FROM admin WHERE username='$username' ";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            $_SESSION['success'] = "Your Data is Deleted";
            
            header('Location: registerA.php'); 
        }
        else
        {
            echo("Your Data is NOT DELETED");       
            
            header('Location: registerA.php'); 
        }    
    }
        


    if(isset($_POST['update_dataperusahaan']))
    {
        $id = $_POST['edit_idpt'];
        $namaPerusahaan = $_POST['edit_namapt'];
        $alamatPerusahaan = $_POST['edit_alamatpt'];
        $emailPerusahaan = $_POST['edit_emailpt'];
        $no_telp = $_POST['edit_telppt'];
        
    
        $query = "UPDATE dataperusahaan SET namaPerusahaan='$namaPerusahaan', alamatPerusahaan='$alamatPerusahaan', emailPerusahaan='$emailPerusahaan',no_telp='$no_telp' WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);
    
        if($query_run)
        {
            $_SESSION['success'] = "Your Data is Updated";
            
            header('Location: dataPerusahaan.php'); 
        }
        else
        {
            $_SESSION['status'] = "Your Data is NOT Updated";
           
            header('Location: dataPerusahaan.php'); 
        }
    }
    
    
        if(isset($_POST['delete_perusahaan']))
        {
            $namaPerusahaan = $_POST['delete_namapt'];
        
            $query = "DELETE FROM dataperusahaan WHERE namaPerusahaan='$namaPerusahaan' ";
            $query_run = mysqli_query($connection, $query);
        
            if($query_run)
            {
                $_SESSION['success'] = "Your Data is Deleted";
                
                header('Location: dataPerusahaan.php'); 
            }
            else
            {
                echo("Your Data is NOT DELETED");       
                
                header('Location: dataPerusahaan.php'); 
            }    
        }


        if(isset($_POST['login_btn']))
        {
            $username_login = $_POST['usernamel'];
            $password_login = $_POST['passwordl'];
    
            $query = "SELECT * FROM admin WHERE username='$username_login' AND password='$password_login'";
            $query_run = mysqli_query($connection, $query);
            $usertype = mysqli_fetch_array($query_run);
            // menghitung jumlah data yang ditemukan
            $cek = mysqli_num_rows($query);
    
            if ($cek>0);{
                $data = mysqli_fetch_assoc($query);
    
            if($usertype ['usertype']== 'admin')
            {
                $_SESSION['username'] = $username_login;
                $_SESSION['usertype'] = "admin";
                
                header('Location: dasboardA.php'); 
            }
    
            elseif($usertype ['usertype']=='user'){
                $_SESSION['username'] = $username_login;
                $_SESSION['usertype'] = "user";
                header('Location: dasboard.php'); 
    
            }
            
            else
            {
                $_SESSION['status'] ="Username / Password Invalid";        
                
                header('Location: login.php'); 
                }    
            }
        }
    
        if(isset($_POST['selectTahunAll'])){
            $selectTahun = $_POST['tahun'];
            if ($selectTahun == '*') {
                header('Location: dataQuisionerAll.php'); 
            }
            elseif ($selectTahun == '2021') {
                header('Location: dataQuisionerAll2021.php'); 
            }
            elseif ($selectTahun == '2022') {
                header('Location: dataQuisionerAll2022.php'); 
            }
            elseif ($selectTahun == '2023') {
                header('Location: dataQuisionerAll2023.php'); 
            }
            elseif ($selectTahun == '2024') {
                header('Location: dataQuisionerAll2024.php'); 
            }
        }

        if(isset($_POST['selectTahund3TM'])){
            $selectTahun = $_POST['tahun'];
            if ($selectTahun == '*') {
                header('Location: dataQuisionerd3TM.php'); 
            }
            elseif ($selectTahun == '2021') {
                header('Location: dataQuisionerd3TM2021.php'); 
            }
            elseif ($selectTahun == '2022') {
                header('Location: dataQuisionerd3TM2022.php'); 
            }
            elseif ($selectTahun == '2023') {
                header('Location: dataQuisionerd3TM2023.php'); 
            }
            elseif ($selectTahun == '2024') {
                header('Location: dataQuisionerd3TM2024.php'); 
            }
        }

        if(isset($_POST['selectTahund3TM'])){
            $selectTahun = $_POST['tahun'];
            if ($selectTahun == '*') {
                header('Location: dataQuisionerd3TM.php'); 
            }
            elseif ($selectTahun == '2021') {
                header('Location: dataQuisionerd3TM2021.php'); 
            }
            elseif ($selectTahun == '2022') {
                header('Location: dataQuisionerd3TM2022.php'); 
            }
            elseif ($selectTahun == '2023') {
                header('Location: dataQuisionerd3TM2023.php'); 
            }
            elseif ($selectTahun == '2024') {
                header('Location: dataQuisionerd3TM2024.php'); 
            }
        }

        if(isset($_POST['selectTahuns1TI'])){
            $selectTahun = $_POST['tahun'];
            if ($selectTahun == '*') {
                header('Location: dataQuisioners1TI.php'); 
            }
            elseif ($selectTahun == '2021') {
                header('Location: dataQuisioners1TI2021.php'); 
            }
            elseif ($selectTahun == '2022') {
                header('Location: dataQuisioners1TI2022.php'); 
            }
            elseif ($selectTahun == '2023') {
                header('Location: dataQuisioners1TI2023.php'); 
            }
            elseif ($selectTahun == '2024') {
                header('Location: dataQuisioners1TI2024.php'); 
            }
        }

        if(isset($_POST['selectTahuns1TE'])){
            $selectTahun = $_POST['tahun'];
            if ($selectTahun == '*') {
                header('Location: dataQuisioners1TE.php'); 
            }
            elseif ($selectTahun == '2021') {
                header('Location: dataQuisioners1TE2021.php'); 
            }
            elseif ($selectTahun == '2022') {
                header('Location: dataQuisioners1TE2022.php'); 
            }
            elseif ($selectTahun == '2023') {
                header('Location: dataQuisioners1TE2023.php'); 
            }
            elseif ($selectTahun == '2024') {
                header('Location: dataQuisioners1TE2024.php'); 
            }
        }

        if(isset($_POST['selectTahuns1TS'])){
            $selectTahun = $_POST['tahun'];
            if ($selectTahun == '*') {
                header('Location: dataQuisioners1TS.php'); 
            }
            elseif ($selectTahun == '2021') {
                header('Location: dataQuisioners1TS2021.php'); 
            }
            elseif ($selectTahun == '2022') {
                header('Location: dataQuisioners1TS2022.php'); 
            }
            elseif ($selectTahun == '2023') {
                header('Location: dataQuisioners1TS2023.php'); 
            }
            elseif ($selectTahun == '2024') {
                header('Location: dataQuisioners1TS2024.php'); 
            }
        }

        if(isset($_POST['selectTahuns1TM'])){
            $selectTahun = $_POST['tahun'];
            if ($selectTahun == '*') {
                header('Location: dataQuisioners1TM.php'); 
            }
            elseif ($selectTahun == '2021') {
                header('Location: dataQuisioners1TM2021.php'); 
            }
            elseif ($selectTahun == '2022') {
                header('Location: dataQuisioners1TM2022.php'); 
            }
            elseif ($selectTahun == '2023') {
                header('Location: dataQuisioners1TM2023.php'); 
            }
            elseif ($selectTahun == '2024') {
                header('Location: dataQuisioners1TM2024.php'); 
            }
        }


  

    

?>