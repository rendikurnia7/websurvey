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
					<h2 class="h5 mb-2 text-gray-800">S1 Teknik Elektro</h2>
                   
					<!-- Content Row -->
                    <div class="row">

					<div class="col-xl-6 col-lg-7">
                            <div class="card shadow mb-7">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-2">
                                    <h6 class="m-0 font-weight-bold text-primary">Kesesuaian Pekerjaan Alumni dengan Program Studi</h6>
                                </div>
                            
                            <canvas id="chartkesesuianBidang"></canvas>
                        
                        <script>
		                var ctx = document.getElementById("chartkesesuianBidang").getContext('2d');
		            var chartkesesuianBidang = new Chart(ctx, {
			        type: 'bar',
			        data: {
						labels: ["Tinggi", "Sedang", "Rendah"],
				    datasets: [{
					label: 'Kesesuaian Pekerjaan Alumni dengan Program Studi',
					data: [
					<?php 
					$sangatBaik = mysqli_query($connection,"SELECT kesesuaianBidang from quisioner where kesesuaianBidang='Tinggi' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($sangatBaik);
					?>, 
					<?php 
					$Baik = mysqli_query($connection,"SELECT kesesuaianBidang from quisioner where kesesuaianBidang='Sedang' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Baik);
					?>, 
					<?php 
					$Cukup = mysqli_query($connection,"SELECT kesesuaianBidang from quisioner where kesesuaianBidang='Rendah' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Cukup);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(57, 232, 34, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(57, 232, 34, 1)'
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
					$sangatBaik = mysqli_query($connection,"SELECT Integritas from quisioner where Integritas='4' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($sangatBaik);
					?>, 
					<?php 
					$Baik = mysqli_query($connection,"SELECT Integritas from quisioner where Integritas='3' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Baik);
					?>, 
					<?php 
					$Cukup = mysqli_query($connection,"SELECT Integritas from quisioner where Integritas='2' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Cukup);
					?>, 
					<?php 
					$Kurang = mysqli_query($connection,"SELECT Integritas from quisioner where Integritas='1' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Kurang);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(57, 232, 34, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(57, 232, 34, 1)'
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
					$sangatBaik = mysqli_query($connection,"SELECT Profesionalisme from quisioner where Profesionalisme='4' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($sangatBaik);
					?>, 
					<?php 
					$Baik = mysqli_query($connection,"SELECT Profesionalisme from quisioner where Profesionalisme='3' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Baik);
					?>, 
					<?php 
					$Cukup = mysqli_query($connection,"SELECT Profesionalisme from quisioner where Profesionalisme='2' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Cukup);
					?>, 
					<?php 
					$Kurang = mysqli_query($connection,"SELECT Profesionalisme from quisioner where Profesionalisme='1' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Kurang);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(57, 232, 34, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(57, 232, 34, 1)'
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
		            var chartkemampuanBerbahasaAsing = new Chart(ctx, {
			        type: 'bar',
			        data: {
				    labels: ["Sangat Baik", "Baik", "Cukup", "Kurang"],
				    datasets: [{
					label: 'Kemampuan Berbahasa Asing',
					data: [
					<?php 
					$sangatBaik = mysqli_query($connection,"SELECT kemampuanBerbahasaAsing from quisioner where kemampuanBerbahasaAsing='4' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($sangatBaik);
					?>, 
					<?php 
					$Baik = mysqli_query($connection,"SELECT kemampuanBerbahasaAsing from quisioner where kemampuanBerbahasaAsing='3' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Baik);
					?>, 
					<?php 
					$Cukup = mysqli_query($connection,"SELECT kemampuanBerbahasaAsing from quisioner where kemampuanBerbahasaAsing='2' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Cukup);
					?>, 
					<?php 
					$Kurang = mysqli_query($connection,"SELECT kemampuanBerbahasaAsing from quisioner where kemampuanBerbahasaAsing='1' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Kurang);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(57, 232, 34, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(57, 232, 34, 1)'
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
		                var chartpenggunaanTeknologiInformasi = new Chart(ctx, {
			        type: 'bar',
			        data: {
				    labels: ["Sangat Baik", "Baik", "Cukup", "Kurang"],
				    datasets: [{
					label: 'penggunaanTeknologiInformasi',
					data: [
					<?php 
					$sangatBaik = mysqli_query($connection,"SELECT penggunaanTeknologiInformasi from quisioner where penggunaanTeknologiInformasi='4' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($sangatBaik);
					?>, 
					<?php 
					$Baik = mysqli_query($connection,"SELECT penggunaanTeknologiInformasi from quisioner where penggunaanTeknologiInformasi='3' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Baik);
					?>, 
					<?php 
					$Cukup = mysqli_query($connection,"SELECT penggunaanTeknologiInformasi from quisioner where penggunaanTeknologiInformasi='2' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Cukup);
					?>, 
					<?php 
					$Kurang = mysqli_query($connection,"SELECT penggunaanTeknologiInformasi from quisioner where penggunaanTeknologiInformasi='1' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Kurang);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(57, 232, 34, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(57, 232, 34, 1)'
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
		            var chartkemampuanBerkomunikasi = new Chart(ctx, {
			        type: 'bar',
			        data: {
				    labels: ["Sangat Baik", "Baik", "Cukup", "Kurang"],
				    datasets: [{
					label: 'Kemampuan Berkomunikasi',
					data: [
					<?php 
					$sangatBaik = mysqli_query($connection,"SELECT kemampuanBerkomunikasi from quisioner where kemampuanBerkomunikasi='4' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($sangatBaik);
					?>, 
					<?php 
					$Baik = mysqli_query($connection,"SELECT kemampuanBerkomunikasi from quisioner where kemampuanBerkomunikasi='3' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Baik);
					?>, 
					<?php 
					$Cukup = mysqli_query($connection,"SELECT kemampuanBerkomunikasi from quisioner where kemampuanBerkomunikasi='2' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Cukup);
					?>, 
					<?php 
					$Kurang = mysqli_query($connection,"SELECT kemampuanBerkomunikasi from quisioner where kemampuanBerkomunikasi='1' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Kurang);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(57, 232, 34, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(57, 232, 34, 1)'
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
		                var chartKerjasama = new Chart(ctx, {
			        type: 'bar',
			        data: {
				    labels: ["Sangat Baik", "Baik", "Cukup", "Kurang"],
				    datasets: [{
					label: 'Kerjasama',
					data: [
					<?php 
					$sangatBaik = mysqli_query($connection,"SELECT Kerjasama from quisioner where Kerjasama='4' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($sangatBaik);
					?>, 
					<?php 
					$Baik = mysqli_query($connection,"SELECT Kerjasama from quisioner where Kerjasama='3' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Baik);
					?>, 
					<?php 
					$Cukup = mysqli_query($connection,"SELECT Kerjasama from quisioner where Kerjasama='2' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Cukup);
					?>, 
					<?php 
					$Kurang = mysqli_query($connection,"SELECT Kerjasama from quisioner where Kerjasama='1' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Kurang);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(57, 232, 34, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(57, 232, 34, 1)'
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
                                    <h6 class="m-0 font-weight-bold text-primary">Pengembangan Diri</h6>
                                </div>
                        
                            <canvas id="chartpengembanganDiri"></canvas>
                        
                        <script>
		                var ctx = document.getElementById("chartpengembanganDiri").getContext('2d');
		                var chartpengembanganDiri = new Chart(ctx, {
			        type: 'bar',
			        data: {
				    labels: ["Sangat Baik", "Baik", "Cukup", "Kurang"],
				    datasets: [{
					label: 'Pengembangan Diri',
					data: [
					<?php 
					$sangatBaik = mysqli_query($connection,"SELECT pengembanganDiri from quisioner where pengembanganDiri='4' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($sangatBaik);
					?>, 
					<?php 
					$Baik = mysqli_query($connection,"SELECT pengembanganDiri from quisioner where pengembanganDiri='3' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Baik);
					?>, 
					<?php 
					$Cukup = mysqli_query($connection,"SELECT pengembanganDiri from quisioner where pengembanganDiri='2' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Cukup);
					?>, 
					<?php 
					$Kurang = mysqli_query($connection,"SELECT pengembanganDiri from quisioner where pengembanganDiri='1' AND Prodi='S1 Teknik Elektro'");
					echo mysqli_num_rows($Kurang);
					?>
					],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(57, 232, 34, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(57, 232, 34, 1)'
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