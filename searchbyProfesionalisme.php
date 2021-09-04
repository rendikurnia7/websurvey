<?php 
include ('securityA.php');
include ('includes/header.php');
include ('includes/navbarA.php');

?>
<div class="container-fluid table-responsive">

<label for="cari">Search by Profesionalisme (4/3/2/1)</label>
<br>
<label for="cari">Nilai 4 = Sangat Baik | </label>
<label for="cari">Nilai 3 = Baik | </label>
<label for="cari">Nilai 2 = Cukup | </label>
<label for="cari">Nilai 1 = Kurang</label>
<div>
<form class="user" action="searchbyProfesionalisme.php" method="GET">
<input type="text" name="cari">

<button class="btn btn-info" type="submit" value="cari">Search <i class="fas fa-search"></i></button>

</div>
</form>


        <?php
if(isset($_GET['cari'])){
	$cari = $_GET['cari'];
	echo "<b>Hasil pencarian Profesionalisme Bernilai: ".$cari."</b>";
}

$no=1;

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
            if(isset($_GET['cari'])){
                $cari = $_GET['cari'];
                $data = mysqli_query($connection,"select * from quisioner where Profesionalisme LIKE '%$cari%'");				
            }else{
                $data = mysqli_query($connection,"select * from quisioner");		
            }
            while($d = mysqli_fetch_array($data)){
           
                ?>
             
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $d['Tanggal']; ?></td>
                <td><?php echo $d['namaInstansi']; ?></td>
                <td><?php echo $d['skalaPerusahaan']; ?></td>
                <td><?php echo $d['namaAlumni']; ?></td>
                <td><?php echo $d['jabatanAlumni']; ?></td>
                <td><?php echo $d['Prodi']; ?></td>
                <td><?php echo $d['kesesuaianBidang']; ?></td>
                <td><?php echo $d['Integritas']; ?></td>
                <td><?php echo $d['Profesionalisme']; ?></td>
                <td><?php echo $d['kemampuanBerbahasaAsing']; ?></td>
                <td><?php echo $d['penggunaanTeknologiInformasi']; ?></td>
                <td><?php echo $d['kemampuanBerkomunikasi']; ?></td>
                <td><?php echo $d['Kerjasama']; ?></td>
                <td><?php echo $d['pengembanganDiri']; ?></td>
                <td><?php echo $d['Usulan']; ?></td>
                <td><?php echo $d['namaAtasan']; ?></td>
                
                <td><?php echo $d['locationSignature']; ?></td>
                <td><?php echo  "Image: <img src='../webSurvey/".$d['locationSignature']."' alt='Image' width=\"150\" height=\"60\">" ;?> </td>
                

               
            </tr>
           
           <?php } ?>
               
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