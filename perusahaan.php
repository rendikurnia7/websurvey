<?php 
include ('security.php');
include ('includes/header.php');
include ('includes/navbar.php');
?>

<div class= "container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m0 font-weight-bold text-primary">Edit Admin Profile</h6>
</div>
<div class="card-body">

<?php

            if(isset($_POST['edit_perusahaan']))
            {
                $username = $_POST['edit_namapt'];
                
                $query = "SELECT * FROM dataperusahaan WHERE namaPerusahaan='$username' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

    <form action="code.php" method="POST">
        <input type="hidden" name="edit_namapt" value="<?php echo $row['namaPerusahaan']; ?>">
    <div class= "form_group">
        <label>Nama Perusahaan</label>
        <input type="text" name="edit_username" value ="<?php echo $row['alamatPerusahaan']; ?>" class ="form-control">
    </div>

    <div class= "form_group">
        <label>Alamat Perusahaan</label>
        <input type="password" name="edit_password" value ="<?php echo $row['emailPerusahaan'];?>" class ="form-control">
    </div>

    <div class= "form_group">
        <label>Nama Perusahaan</label>
        <input type="text" name="edit_username" value ="<?php echo $row['no_telp']; ?>" class ="form-control">
    </div>

    

    <a href="register.php" class="btn btn-danger" >Cancel</a>
    <button type="submit" name="update_admin" class= "btn btn-primary">Update</button>

    </form>
    
    <?php
    
    }
    }
    ?>
    </div>
</div>
</div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>