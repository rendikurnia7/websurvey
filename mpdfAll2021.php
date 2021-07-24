<?php
include('connection.php');
require 'mpdf/vendor/autoload.php';


function query($query) {
	global $connection;
	$result = mysqli_query($connection, $query);
	$rows = [];
	while( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

$data = query("select * from quisioner where Tanggal LIKE '%2021%'");
$mpdf= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [500, 236]]);

$html= '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Report User Survey All 2021</title>
</head>
<style>
.tc {
    text-align: center;
  }
</style>
<body>
<h1>Report User Survey All 2021</h1>

<table border="1" id="dataTable" cellspacing="0">
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
                    <th>Signature</th>

                </tr>
            </thead>';

            $i = 1;
            foreach( $data as $row ) {
               $html .= '<tr>
                   <td>'. $i++ .'</td>
                   <td>'. $row["Tanggal"] .'</td>
                   <td>'. $row["namaInstansi"] .'</td>
                   <td>'. $row["skalaPerusahaan"] .'</td>
                   <td>'. $row["namaAlumni"] .'</td>
                   <td>'. $row["jabatanAlumni"] .'</td>
                   <td>'. $row["Prodi"] .'</td>
                   <td>'. $row["kesesuaianBidang"] .'</td>
                   <td class="tc">'. $row["Integritas"] .'</td>
                   <td class="tc">'. $row["Profesionalisme"] .'</td>
                   <td class="tc">'. $row["kemampuanBerbahasaAsing"] .'</td>
                   <td class="tc">'. $row["penggunaanTeknologiInformasi"] .'</td>
                   <td class="tc">'. $row["kemampuanBerkomunikasi"] .'</td>
                   <td class="tc">'. $row["Kerjasama"] .'</td>
                   <td class="tc">'. $row["pengembanganDiri"] .'</td>
                   <td>'. $row["Usulan"] .'</td>
                   <td>'. $row["namaAtasan"] .'</td>
                   <td><img src="../websurvey/'. $row["locationSignature"] .'" width="70"></td>
                   
               </tr>';
            }  

$html .='</table>


</body>
</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output('Report Data Quisioner ALL 2021.pdf', 'I');

?>