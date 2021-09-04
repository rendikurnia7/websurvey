<?php
include('connection.php');
include('securityA.php');
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

$data = query("select * from dataperusahaan ");
$mpdf= new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => [250, 236]]);


$html= '<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title> Report Data Perusahaan </title>
<link rel="stylesheet" href="css/stylePDF.css">
</head>

<body>
<h1>Report Data Perusahaan</h1>

<table border="1" id="dataTable" cellspacing="0">
            <thead>
                <tr class="title">
                    <th>No.</th>
                    <th>Nama Perusahaan</th>
                    <th>Alamat Perusahaan</th>
                    <th>Email Perusahaan</th>
                    <th>Nomor Telepon Perusahaan</th>
                

                </tr>
            </thead>';

            $i = 1;
            foreach( $data as $row ) {
               $html .= '<tr>
                   <td>'. $i++ .'</td>
                   <td>'. $row["namaPerusahaan"] .'</td>
                   <td>'. $row["alamatPerusahaan"] .'</td>
                   <td>'. $row["emailPerusahaan"] .'</td>
                   <td class="tc">'. $row["no_telp"] .'</td>
                   
               </tr>';
            }  

$html .='</table>


</body>

</html>
';

$mpdf->WriteHTML($html);
$mpdf->Output('Report Data Perusahaan.pdf', 'I');

?>