<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Perusahaan</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
    integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <link rel="stylesheet" href="styleTable.css">
</head>


<div class="container-fluid" id="boxed">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Perusahaan</h1>

        </div>

        <?php
include('connection.php');
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

</html>