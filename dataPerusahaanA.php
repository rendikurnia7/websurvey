<?php 
include ('securityA.php');
include ('includes/header.php');
include ('includes/navbarA.php');

?>
<div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Perusahaan</h1>
                        <a href="spreadSheetPerusahaan.php" name="export"type="submit" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50" ></i> Generate Report</a>
        </div>

        <?php
if (isset($_SESSION['success']) && $_SESSION['success'] !='')
{
    echo '<h2 class= "bg-primary text-white">'.$_SESSION['success'].'</h2>';
    unset ($_SESSION['success']);
}

elseif(isset($_SESSION['status']) && $_SESSION['status'] !='')
{
        echo '<h2 class= "bg-primary text-white">'.$_SESSION['status'].'</h2>';
        unset ($_SESSION['status']);
}
$no = 1;
$query = "select * from dataperusahaan";
$query_run = mysqli_query($connection, $query);

?>
        
  <table class="table table-bordered" id="dataTable" width= 100% cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Perusahaan</th>
                <th>Alamat Perusahaan</th>
                <th>Email Perusahaan</th>
                <th>No.Telepon Perusahaan</th>
                <th>Edit</th>
                <th>Delete</th>
                
            </tr>
        </thead>

        <tbody>
            <?php
            if(mysqli_num_rows($query_run) > 0){
                while($row = mysqli_fetch_assoc($query_run))
                {
                ?>
             
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row['namaPerusahaan']; ?></td>
                <td><?php echo $row['alamatPerusahaan']; ?></td>
                <td><?php echo $row['emailPerusahaan']; ?></td>
                <td><?php echo $row['no_telp']; ?></td>

                <td>
                <form action="editperusahaan.php" method ="post">
                <input type="hidden" name="edit_idpt" value ="<?php echo $row['id'];?>">
                <button type="submit" name ="edit_perusahaan" class= "btn btn-success">EDIT</button>
                </form>
                </td>

                <td>
                    <form action="code.php" method="post">
                    <input type="hidden" name="delete_namapt" value="<?php echo $row['namaPerusahaan'];?>">
                    <button type="submit" name= "delete_perusahaan" class= "btn btn-danger"> DELETE</button>
                </form>
            </td>
            </tr>
           
           <?php
                }
            }
            else {
                echo "No Record Found";
            }
            ?>
        </tbody>

    </table>
    </div>
</div>
</div>
        </div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>