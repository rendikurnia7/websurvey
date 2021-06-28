<?php
include('security.php');
// headers for exporting excel

header("Content-Disposition: attachment; filename=dataPerusahaan.xls");

header("application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");

function dataFilter(&$str_val)
{
	$str_val = preg_replace("/\t/", "\\t", $str_val);
	$str_val = preg_replace("/\r?\n/", "\\n", $str_val);
	if(strstr($str_val, '"')) $str_val = '"' . str_replace('"', '""', $str_val) . '"';
}

$post_list = array();

//get rows query
$query = mysqli_query($connection, "SELECT * FROM quisioner");

//number of rows
$rowCount = mysqli_num_rows($query);

$sno = 1;
if($rowCount > 0){
	while($row = mysqli_fetch_assoc($query)){
		$post_list[] = array( "No."=>$sno,  "Tanggal"=>$row["Tanggal"],  
		"Nama Instansi"=>$row["namaInstansi"],  "Skala Perusahaan"=>$row["skalaPerusahaan"],
		  "Nama Alumni"=>$row["NamaAlumni"],  "Jabatan Alumni"=>$row["JabatanAlumni"],
		  "Program Studi"=>$row["Prodi"],  "Kesesuaian Bidang"=>$row["kesesuaianBidang"],
		  "Integritas (Etika dan Moral)"=>$row["Integritas"],  "Keahlian Berdasarkan Bidang Ilmu (Profesionalisme)"=>$row["Profesionalisme"],
		  "Kemampuan Berbahasa Asing"=>$row["kemampuanBerbahasaAsing"],  "Penggunaan Teknologi Informasi"=>$row["penggunaanTeknologiInformasi"],
		  "Nama Alumni"=>$row["NamaAlumni"],  "Jabatan Alumni"=>$row["JabatanAlumni"],
		  "Nama Alumni"=>$row["NamaAlumni"],  "Jabatan Alumni"=>$row["JabatanAlumni"],
		  "Nama Alumni"=>$row["NamaAlumni"],  "Jabatan Alumni"=>$row["JabatanAlumni"],
		  "Nama Alumni"=>$row["NamaAlumni"],  "Jabatan Alumni"=>$row["JabatanAlumni"],
		  "Nama Alumni"=>$row["NamaAlumni"],  "Jabatan Alumni"=>$row["JabatanAlumni"],
		  "Nama Alumni"=>$row["NamaAlumni"],  "Jabatan Alumni"=>$row["JabatanAlumni"] );
		$sno++;
	}
}

$title_flag = false;
foreach($post_list as $post) {
	if(!$title_flag) {
		// Showing column names 
		echo implode("\t", array_keys($post)) . "\n";
		$title_flag = true;
	}
	// data filtering
	array_walk($post, 'dataFilter');
	echo implode("\t", array_values($post)) . "\n";

}
?>