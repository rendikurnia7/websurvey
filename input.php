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
    $file = $folderPath . uniqid() . '.'.$image_type;
    file_put_contents($file, $image_base64);
    
    $sql="insert into quisioner (Tanggal,namaInstansi,skalaPerusahaan, namaAlumni, jabatanAlumni, Prodi, kesesuaianBidang, Integritas, Profesionalisme, kemampuanBerbahasaAsing, penggunaanTeknologiInformasi, kemampuanBerkomunikasi, Kerjasama, pengembanganDiri,Usulan, namaAtasan,locationSignature) values
('$Tanggal','$namaInstansi','$skalaPerusahaan','$namaAlumni','$jabatanAlumni','$Prodi','$kesesuaianBidang','$Integritas','$Profesionalisme','$kemampuanBerbahasaAsing','$penggunaanTeknologiInformasi','$kemampuanBerkomunikasi','$Kerjasama','$pengembanganDiri','$Usulan','$namaAtasan','$file')";

$hasil=mysqli_query($koneksi,$sql);




echo('berhasil');
/*
include('ScreenshotMachine.php');

$customer_key = "219849";
$secret_phrase = ""; //leave secret phrase empty, if not needed

$machine = new ScreenshotMachine($customer_key, $secret_phrase);

//mandatory parameter
$options['url'] = "https://quisioner.herokuapp.com/";

// all next parameters are optional, see our website screenshot API guide for more details
$options['dimension'] = "1366xfull";  // or "1366xfull" for full length screenshot
$options['device'] = "desktop";
$options['format'] = "png";
$options['cacheLimit'] = "0";
$options['delay'] = "200";
$options['zoom'] = "100";

$api_url = $machine->generate_screenshot_api_url($options);

//put link to your html code
echo '<img src="' . $api_url . '">' . PHP_EOL;

//or save screenshot as an image
$output_file = 'output.png';
file_put_contents($output_file, file_get_contents($api_url));
echo 'Screenshot saved as ' . $output_file . PHP_EOL;
*/

}  


            ?>