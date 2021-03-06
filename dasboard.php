<?php 
include ('security.php');
include ('includes/header.php');
include ('includes/navbar.php');


?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Total Admin Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="register.php">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Admin Registered</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                <?php
                                                require 'database/dbconfig.php';
                                                $query = "SELECT id FROM admin ORDER BY id"; 
                                                $query_run = mysqli_query($connection, $query);
                                                $row = mysqli_num_rows($query_run);
                                                echo '<h4> Total Admin: '.$row.'</h4>';
                                                ?>
                                            
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- Data Quisioner -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Data Quisioner</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php
                                                require 'database/dbconfig.php';
                                                $query = "SELECT Tanggal FROM quisioner ORDER BY Tanggal"; 
                                                $query_run = mysqli_query($connection, $query);
                                                $row = mysqli_num_rows($query_run);
                                                echo '<h4> Total Data Quisioner: '.$row.'</h4>';
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        <!-- Data Perusahaan -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="dataPerusahaan.php">
                            <div type="button" class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Data Perusahaan 
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                    <?php
                                                    
                                                    $query = "SELECT namaperusahaan FROM dataperusahaan ORDER BY namaperusahaan"; 
                                                    $query_run = mysqli_query($connection, $query);
                                                    $row = mysqli_num_rows($query_run);
                                                    echo '<h4> Terisi: '.$row.'</h4>';
                                                    ?>

                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </a>
                        </div>

                        
                    </div>

                    <!-- Content Row -->

                 

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

    

 

<?php
include('includes/footer.php');
include('includes/scripts.php');

?>
