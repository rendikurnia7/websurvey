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
  <link rel="stylesheet" href="css/styleTable.css">
 
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
   <!-- Load an icon library -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="navbar">
    <a class="active" href="index.php" target="_blank"><i class="fa fa-fw fa-home"></i> Home</a>


    <a href="login.php" target="_blank"><i class="fa fa-fw fa-user"></i> Login</a>
</div>
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

        </div>
    <p></p>
<!-- Footer -->
<footer class="page-footer font-small bg-light pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-6 mt-md-0 mt-3">

                <!-- Content -->
                <h5 class="text-uppercase "><i class="fa fa-map-marker" aria-hidden="true"></i> Location:</h5>
                <p>Menara PLN Jl. Lingkar Luar Barat,
                    Duri Kosambi 11750. , Jakarta Barat , DKI Jakarta , Indonesia</p>

            </div>
            <!-- Grid column -->

            <hr class="clearfix w-100 d-md-none pb-3">

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase"></h5>

                <ul class="list-unstyled">

                </ul>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 mb-md-0 mb-3">

                <!-- Links -->
                <h5 class="text-uppercase">Contact :</h5>

                <ul class="list-unstyled">
                    <li>
                        <a href="https://cdc.itpln.ac.id/" target="_blank" style="color:black;"><i
                                class="fas fa-globe"></i> Website: https://cdc.itpln.ac.id</a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/cdcitpln/" target="_blank" style="color:black;"><i
                                class="fab fa-instagram"></i>
                            Instagram: @cdcitpln</i></a>
                    </li>
                    <li>
                        <a><i class="fas fa-phone-alt"></i> Telepon: (021) 5440342, ext:2103</a>
                    </li>
                    <li>
                        <a><i class="far fa-envelope"></i> Email: cdc@itpln.ac.id</a>
                    </li>
                </ul>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2021 Copyright:

    </div>
    <!-- Copyright -->

</footer>

</html>