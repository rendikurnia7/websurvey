<?php
   include('conn.php');
  $namaPerusahaan = isset($_POST['namaPerusahaan']) ? $_POST['namaPerusahaan'] : '';
	$alamatPerusahaan = isset($_POST['alamatPerusahaan']) ? $_POST['alamatPerusahaan'] : '';
	$emailPerusahaan = isset($_POST['emailPerusahaan']) ? $_POST['emailPerusahaan'] : '';
	$no_telp = isset($_POST['no_telp']) ? $_POST['no_telp'] : '';

  $mysqli  = "insert into dataperusahaan (namaPerusahaan, alamatPerusahaan, emailPerusahaan, no_telp) VALUES ('$namaPerusahaan', '$alamatPerusahaan', '$emailPerusahaan', '$no_telp')";
  $result  = mysqli_query($koneksi, $mysqli);

  if ($result) {
    header('Location: quisioner.html');
  } else {
    echo "Input gagal";
  }
  mysqli_close($koneksi);
?>

