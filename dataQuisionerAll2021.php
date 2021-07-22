<?php 
include ('securityA.php');
include ('includes/header.php');
include ('includes/navbarA.php');

?>
<div class="container-fluid table-responsive">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Quisioner</h1>
                        <a href="spreadSheetQuisionerAll2021.php" target="_blank" name="export"type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50" ></i> Generate Report</a>
        </div>
        <h5 class="h5 mb-0 text-gray-800">--ALL--</h5>
        <br>
        <label for="tahun">Select Tahun Ke-</label>
        
<div>
<form class="user" action="code.php" method="POST">
<select name="tahun" id="tahun">
    <option value="*">--ALL--</option>
  <option name="tahun" value="2021" selected>2021</option>
  <option name="tahun" value="2022">2022</option>
  <option name="tahun" value="2023">2023</option>
  <option name="tahun" value="2024">2024</option>
</select>
<button class="btn btn-info" type="submit" name="selectTahunAll">Select</button>
</div>
</form>


        <?php

$no=1;
$query = "select * from quisioner where Tanggal LIKE '%2021%'";
$query_run = mysqli_query($connection, $query);

?>
        
  <table class="table table-bordered" id="dataTable" width= 100% cellspacing="0">
        <thead>
            <tr>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Nama Instansi</th>
                <th>Skala Perusahaan</th>
                <th>Nama Alumni</th>
                <th>Jabatan Alumni</th>
                <th>Program Studi</th>
                <th>Kesesuaian Bidang</th>
                <th>Integritas</th>
                <th>Profesionalisme</th>
                <th>Kemampuan Berbahasa Asing</th>
                <th>Penggunaan Teknologi Informasi</th>
                <th>Kemampuan Berkomunikasi</th>
                <th>Kerjasama</th>
                <th>Pengembangan Diri</th>
                <th>Usulan</th>
                <th>Nama Atasan</th>
                <th>Location Signature</th>
                <th>Signature</th>
                
                
            </tr>
        </thead>

        <tbody>
            <?php
            if(mysqli_num_rows($query_run) > 0){
                while($row = mysqli_fetch_assoc($query_run))
                {
                ?>
             
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $row['Tanggal']; ?></td>
                <td><?php echo $row['namaInstansi']; ?></td>
                <td><?php echo $row['skalaPerusahaan']; ?></td>
                <td><?php echo $row['namaAlumni']; ?></td>
                <td><?php echo $row['jabatanAlumni']; ?></td>
                <td><?php echo $row['Prodi']; ?></td>
                <td><?php echo $row['kesesuaianBidang']; ?></td>
                <td><?php echo $row['Integritas']; ?></td>
                <td><?php echo $row['Profesionalisme']; ?></td>
                <td><?php echo $row['kemampuanBerbahasaAsing']; ?></td>
                <td><?php echo $row['penggunaanTeknologiInformasi']; ?></td>
                <td><?php echo $row['kemampuanBerkomunikasi']; ?></td>
                <td><?php echo $row['Kerjasama']; ?></td>
                <td><?php echo $row['pengembanganDiri']; ?></td>
                <td><?php echo $row['Usulan']; ?></td>
                <td><?php echo $row['namaAtasan']; ?></td>
                
                <td><?php echo $row['locationSignature']; ?></td>
                <td><?php echo  "Image: <img src='../webSurvey/".$row['locationSignature']."' alt='Image' width=\"150\" height=\"60\">" ;?> </td>
                

               
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