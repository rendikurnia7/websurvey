<?php 
include ('security.php');
include ('includes/header.php');
include ('includes/navbar.php');
include ('includes/scripts.php');
?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Charts</h1>
                   <!-- <label for="prodi">Select Program Studi</label> --->
       <!------
                    <form class="user" method="POST">
            <select class="form-select" name="prodi" id="prodi">
                <option value="*" selected>--ALL--</option>
            <option name="prodi" value="S1 Teknik Informatika">S1 Teknik Informatika </option>
            <option name="prodi" value="S1 Teknik Elektro">S1 Teknik Elektro </option>
            <option name="prodi" value="S1 Teknik Sipil">S1 Teknik Sipil </option>
            <option name="prodi" value="S1 Teknik Mesin">S1 Teknik Mesin </option>
            <option name="prodi" value="D3 Teknik Elektro">D3 Teknik Elektro </option>
            <option name="prodi" value="D3 Teknik Mesin">D3 Teknik Mesin </option>
            </select>
            <button class="btn btn-info" type="submit" name="selectProdi">Select</button>
        </form>
        ---->
        <?php
        /*
        if(isset($_POST['selectProdi'])){
            $selectProdi = $_POST['prodi'];
            if ($selectProdi == '*') {
                $query='SELECT * from quisioner where';
            }
            if ($selectProdi == 'S1 Teknik Informatika') {
                $query='SELECT * from quisioner where';
            }
            else if ($selectProdi == 'S1 Teknik Elektro') {
                $query='SELECT * from quisioner where';
            }
        }*/
        ?>

                    <!-- Content Row -->
                    <div class="row">

                            <!-- Bar Chart -->
           
                            <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-7">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Integritas</h6>
                                </div>
                            
                            <canvas id="chartIntegritas"></canvas>
                        
                        <script>
		                var ctx = document.getElementById("chartIntegritas").getContext('2d');
		            var chartIntegritas = new Chart(ctx, {
			        type: 'bar',
			        data: {
				    labels: ["Sangat Baik", "Baik", "Cukup", "Kurang"],
				    datasets: [{
					label: 'Integritas',
					data: [
					<?php 
					$sangatBaik = mysqli_query($connection,"SELECT * from quisioner where Integritas='4'");
					echo mysqli_num_rows($sangatBaik);
					?>, 
					<?php 
					$Baik = mysqli_query($connection,"SELECT * from quisioner where Integritas='3'");
					echo mysqli_num_rows($Baik);
					?>, 
					<?php 
					$Cukup = mysqli_query($connection,"SELECT * from quisioner where Integritas='2'");
					echo mysqli_num_rows($Cukup);
					?>, 
					<?php 
					$Kurang = mysqli_query($connection,"SELECT * from quisioner where Integritas='1'");
					echo mysqli_num_rows($Kurang);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 3
				    }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                    </div>
                    </div>
                    
    
                        <!-- Donut Chart -->
                        <div class="col-xl-6 col-lg-1">
                            <div class="card shadow mb-7">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Profesionalisme</h6>
                                </div>
                        
                            <canvas id="chartProfesionalisme"></canvas>
                        
                        <script>
		                var ctx = document.getElementById("chartProfesionalisme").getContext('2d');
		                var chartProfesionalisme = new Chart(ctx, {
			        type: 'bar',
			        data: {
				    labels: ["Sangat Baik", "Baik", "Cukup", "Kurang"],
				    datasets: [{
					label: 'Profesionalisme',
					data: [
					<?php 
					$sangatBaik = mysqli_query($connection,"SELECT * from quisioner where Profesionalisme='4'");
					echo mysqli_num_rows($sangatBaik);
					?>, 
					<?php 
					$Baik = mysqli_query($connection,"SELECT * from quisioner where Profesionalisme='3'");
					echo mysqli_num_rows($Baik);
					?>, 
					<?php 
					$Cukup = mysqli_query($connection,"SELECT * from quisioner where Profesionalisme='2'");
					echo mysqli_num_rows($Cukup);
					?>, 
					<?php 
					$Kurang = mysqli_query($connection,"SELECT * from quisioner where Profesionalisme='1'");
					echo mysqli_num_rows($Kurang);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 3
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
    
    </div>
    <br>
    </div>
    

     <!-- Bar Chart -->
           
     <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-7">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Kemampuan Berbahasa Asing</h6>
                                </div>
                            
                            <canvas id="chartkemampuanBerbahasaAsing"></canvas>
                        
                        <script>
		                var ctx = document.getElementById("chartkemampuanBerbahasaAsing").getContext('2d');
		            var chartIntegritas = new Chart(ctx, {
			        type: 'bar',
			        data: {
				    labels: ["Sangat Baik", "Baik", "Cukup", "Kurang"],
				    datasets: [{
					label: 'Kemampuan Berbahasa Asing',
					data: [
					<?php 
					$sangatBaik = mysqli_query($connection,"SELECT * from quisioner where kemampuanBerbahasaAsing='4'");
					echo mysqli_num_rows($sangatBaik);
					?>, 
					<?php 
					$Baik = mysqli_query($connection,"SELECT * from quisioner where kemampuanBerbahasaAsing='3'");
					echo mysqli_num_rows($Baik);
					?>, 
					<?php 
					$Cukup = mysqli_query($connection,"SELECT * from quisioner where kemampuanBerbahasaAsing='2'");
					echo mysqli_num_rows($Cukup);
					?>, 
					<?php 
					$Kurang = mysqli_query($connection,"SELECT * from quisioner where kemampuanBerbahasaAsing='1'");
					echo mysqli_num_rows($Kurang);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 3
				    }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                    </div>
                    </div>
                    
    
                        <!-- Donut Chart -->
                        <div class="col-xl-6 col-lg-1">
                            <div class="card shadow mb-7">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Penggunaan Teknologi Informasi</h6>
                                </div>
                        
                            <canvas id="chartpenggunaanTeknologiInformasi"></canvas>
                        
                        <script>
		                var ctx = document.getElementById("chartpenggunaanTeknologiInformasi").getContext('2d');
		                var chartProfesionalisme = new Chart(ctx, {
			        type: 'bar',
			        data: {
				    labels: ["Sangat Baik", "Baik", "Cukup", "Kurang"],
				    datasets: [{
					label: 'Profesionalisme',
					data: [
					<?php 
					$sangatBaik = mysqli_query($connection,"SELECT * from quisioner where penggunaanTeknologiInformasi='4'");
					echo mysqli_num_rows($sangatBaik);
					?>, 
					<?php 
					$Baik = mysqli_query($connection,"SELECT * from quisioner where penggunaanTeknologiInformasi='3'");
					echo mysqli_num_rows($Baik);
					?>, 
					<?php 
					$Cukup = mysqli_query($connection,"SELECT * from quisioner where penggunaanTeknologiInformasi='2'");
					echo mysqli_num_rows($Cukup);
					?>, 
					<?php 
					$Kurang = mysqli_query($connection,"SELECT * from quisioner where penggunaanTeknologiInformasi='1'");
					echo mysqli_num_rows($Kurang);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 3
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
    
    </div>
    <br>
    </div>

    <!-- Bar Chart -->
           
    <div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-7">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Kemampuan Berkomunikasi</h6>
                                </div>
                            
                            <canvas id="chartkemampuanBerkomunikasi"></canvas>
                        
                        <script>
		                var ctx = document.getElementById("chartkemampuanBerkomunikasi").getContext('2d');
		            var chartIntegritas = new Chart(ctx, {
			        type: 'bar',
			        data: {
				    labels: ["Sangat Baik", "Baik", "Cukup", "Kurang"],
				    datasets: [{
					label: 'Kemampuan Berkomunikasi',
					data: [
					<?php 
					$sangatBaik = mysqli_query($connection,"SELECT * from quisioner where kemampuanBerkomunikasi='4'");
					echo mysqli_num_rows($sangatBaik);
					?>, 
					<?php 
					$Baik = mysqli_query($connection,"SELECT * from quisioner where kemampuanBerkomunikasi='3'");
					echo mysqli_num_rows($Baik);
					?>, 
					<?php 
					$Cukup = mysqli_query($connection,"SELECT * from quisioner where kemampuanBerkomunikasi='2'");
					echo mysqli_num_rows($Cukup);
					?>, 
					<?php 
					$Kurang = mysqli_query($connection,"SELECT * from quisioner where kemampuanBerkomunikasi='1'");
					echo mysqli_num_rows($Kurang);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 3
				    }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                    </div>
                    </div>
                    
    
                        <!-- Donut Chart -->
                        <div class="col-xl-6 col-lg-1">
                            <div class="card shadow mb-7">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Kerjasama</h6>
                                </div>
                        
                            <canvas id="chartKerjasama"></canvas>
                        
                        <script>
		                var ctx = document.getElementById("chartKerjasama").getContext('2d');
		                var chartProfesionalisme = new Chart(ctx, {
			        type: 'bar',
			        data: {
				    labels: ["Sangat Baik", "Baik", "Cukup", "Kurang"],
				    datasets: [{
					label: 'Kerjasama',
					data: [
					<?php 
					$sangatBaik = mysqli_query($connection,"SELECT * from quisioner where Kerjasama='4'");
					echo mysqli_num_rows($sangatBaik);
					?>, 
					<?php 
					$Baik = mysqli_query($connection,"SELECT * from quisioner where Kerjasama='3'");
					echo mysqli_num_rows($Baik);
					?>, 
					<?php 
					$Cukup = mysqli_query($connection,"SELECT * from quisioner where Kerjasama='2'");
					echo mysqli_num_rows($Cukup);
					?>, 
					<?php 
					$Kurang = mysqli_query($connection,"SELECT * from quisioner where Kerjasama='1'");
					echo mysqli_num_rows($Kurang);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)'
					],
					borderWidth: 3
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
    
    </div>
    <br>
    </div>
    
           
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

<?php 
include ('includes/footer.php');
?>      