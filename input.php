<?php
include('conn.php');
if(isset($_POST['submitbtn']))
{
$Tanggal = $_POST['Tanggal'];
$namaInstansi = $_POST['namaInstansi'];
$skalaPerusahaan = $_POST['skalaPerusahaan'];
$namaAlumni = $_POST['namaAlumni'];
$jabatanAlumni = $_POST['jabatanAlumni'];
$Prodi = $_POST['Prodi'];
$kesesuaianBidang = $_POST['kesesuaianBidang'];
$Integritas = $_POST['Integritas'];
$Profesionalisme = $_POST['Profesionalisme'];
$kemampuanBerbahasaAsing = $_POST['kemampuanBerbahasaAsing'];
$kemampuanBerkomunikasi = $_POST['kemampuanBerkomunikasi'];
$penggunaanTeknologiInformasi = $_POST['penggunaanTeknologiInformasi'];
$Kerjasama = $_POST['Kerjasama'];
$pengembanganDiri = $_POST['pengembanganDiri'];
$Usulan = $_POST['Usulan'];
$namaAtasan = $_POST['namaAtasan'];





//Mengeksekusi/menjalankan query diatas	

    $folderPath = "signatureImage/";
    $image_parts = explode(";base64,", $_POST['signed']); 
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $signatureName = uniqid() . '.'.$image_type;
    $file = $folderPath . $signatureName;
    file_put_contents($file, $image_base64);
    
    $sql="insert into quisioner (Tanggal,namaInstansi,skalaPerusahaan, namaAlumni, jabatanAlumni, Prodi, kesesuaianBidang, Integritas, Profesionalisme, kemampuanBerbahasaAsing, penggunaanTeknologiInformasi, kemampuanBerkomunikasi, Kerjasama, pengembanganDiri,Usulan, namaAtasan,locationSignature, drawSignature) values
('$Tanggal','$namaInstansi','$skalaPerusahaan','$namaAlumni','$jabatanAlumni','$Prodi','$kesesuaianBidang','$Integritas','$Profesionalisme','$kemampuanBerbahasaAsing','$penggunaanTeknologiInformasi','$kemampuanBerkomunikasi','$Kerjasama','$pengembanganDiri','$Usulan','$namaAtasan','$file','$signatureName')";

$hasil=mysqli_query($koneksi,$sql);



header('Location: thanks.html');
}  


            ?>