<?php 
include ('securityA.php');
include ('includes/header.php');
include ('includes/navbarA.php');
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
                $id = $_POST['edit_idpt'];
                
                $query = "SELECT * FROM dataperusahaan WHERE id='$id' ";
                $hasil = mysqli_query($connection, $query);

                foreach($hasil as $row)
                {
                    ?>

    <form action="code.php" method="POST">
        <input type="hidden" name="edit_idpt" value="<?php echo $row['id']; ?>">
    <div class= "form_group">
        <label>Nama Perusahaan</label>
        <input type="text" name="edit_namapt" value ="<?php echo $row['namaPerusahaan']; ?>" class ="form-control">
    </div>

    <div class= "form_group">
        <label>Alamat Perusahaan</label>
        <input type="text" name="edit_alamatpt" value ="<?php echo $row['alamatPerusahaan'];?>" class ="form-control">
    </div>
    <div class= "form_group">
        <label>Email Perusahaan</label>
        <input type="text" name="edit_emailpt" value ="<?php echo $row['emailPerusahaan'];?>" class ="form-control">
    </div>
    <div class= "form_group">
        <label>No. Telpon Perusahaan</label>
        <input type="text" name="edit_telppt" value ="<?php echo $row['no_telp'];?>" class ="form-control">
    </div>

    <a href="dataPerusahaanA.php" class="btn btn-danger" >Cancel</a>
    <button type="submit" name="update_dataperusahaan" class= "btn btn-primary">Update</button>

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