<?php 
include ('securityA.php');
include ('includes/header.php');
include ('includes/navbarA.php');

?>
<div class="container-fluid table-responsive">

<label for="prodi">Select Program Studi</label>
<div>
<form class="user" action="dataQuisioner.php" method="GET">
<select name="prodi" id="prodi">
    <option >--ALL--</option>
  <option name="prodi" value="S1 Teknik Informatika">S1 Teknik Informatika </option>
  <option name="prodi" value="S1 Teknik Elektro">S1 Teknik Elektro </option>
  <option name="prodi" value="S1 Teknik Sipil">S1 Teknik Sipil </option>
  <option name="prodi" value="S1 Teknik Mesin">S1 Teknik Mesin </option>
  <option name="prodi" value="D3 Teknik Elektro" >D3 Teknik Elektro </option>
  <option name="prodi" value="D3 Teknik Mesin">D3 Teknik Mesin </option>
</select>
<button class="btn btn-info" type="submit" value="cari">Select</button>

</div>
</form>


        <?php
if(isset($_GET['prodi'])){
	$cari = $_GET['prodi'];
	echo "<b>Hasil pencarian : ".$cari."</b>";
}

$no=1;
//$query = "select * from quisioner ";
//$query_run = mysqli_query($connection, $query);

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
            if(isset($_GET['prodi'])){
                $cari = $_GET['prodi'];
                $data = mysqli_query($connection,"select * from quisioner where Prodi ='$cari'");				
            }else{
                $data = mysqli_query($connection,"select * from quisioner");		
            }
            while($d = mysqli_fetch_array($data)){
            /*if(mysqli_num_rows($query_run) > 0){
                while($d = mysqli_fetch_assoc($query_run))
                {*/
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