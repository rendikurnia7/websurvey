<?php
// Load file koneksi.php
include "conn.php";

// Load plugin PHPExcel nya
require_once '../PHPExcel/PHPExcel.php';

// Panggil class PHPExcel nya
$excel = new PHPExcel();

// Settingan awal file excel
$excel->getProperties()->setCreator('Rendi')
             ->setLastModifiedBy('Rendi')
             ->setTitle("Data Quisioner")
             ->setSubject("Rendi")
             ->setDescription("Laporan Data Quisioner")
             ->setKeywords("Data Quisioner");

// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = array(
  'font' => array('bold' => true), // Set font nya jadi bold
  'alignment' => array(
    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ),
  'borders' => array(
    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
  )
);

// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = array(
  'alignment' => array(
    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
  ),
  'borders' => array(
    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
  )
);

$excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA USER SURVEY"); // Set kolom A1 dengan tulisan "DATA SISWA"
$excel->getActiveSheet()->mergeCells('A1:R1'); // Set Merge Cell pada kolom A1 sampai F1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
$excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20); // Set font size 15 untuk kolom A1
$excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

// Buat header tabel nya pada baris ke 3
$excel->setActiveSheetIndex(0)->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('B3', "Tanggal"); // Set kolom B3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('C3', "Nama Intansi"); // Set kolom C3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('D3', "Skala Perusahaan"); // Set kolom D3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('E3', "Nama Alumni"); // Set kolom E3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('F3', "Jabatan Alumni"); // Set kolom A3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('G3', "Program Studi"); // Set kolom B3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('H3', "kesesuaianBidang"); // Set kolom C3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('I3', "Integritas"); // Set kolom D3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('J3', "Profesionalisme"); // Set kolom E3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('K3', "Kemampuan Berbahasa Asing"); // Set kolom A3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('L3', "Penggunaan Teknologi Informasi"); // Set kolom B3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('M3', "Kemampuan Berkomunikasi"); // Set kolom C3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('N3', "Kerjasama"); // Set kolom D3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('O3', "Pengembangan Diri"); // Set kolom E3 dengan tulisan
$excel->setActiveSheetIndex(0)->setCellValue('P3', "Usulan"); // Set kolom C3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('Q3', "Nama Atasan"); // Set kolom D3 dengan tulisan 
$excel->setActiveSheetIndex(0)->setCellValue('R3', "Draw Signature"); // Set kolom E3 dengan tulisan  




// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
$excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);



// Set height baris ke 1, 2 dan 3
$excel->getActiveSheet()->getRowDimension('1')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('2')->setRowHeight(20);
$excel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

// Buat query untuk menampilkan semua data siswa
$sql = $pdo->prepare("SELECT * FROM quisioner");
$sql->execute(); // Eksekusi querynya

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
while($data = $sql->fetch()){ // Ambil semua data dari hasil eksekusi $sql
  $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
  $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data['Tanggal']);
  $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data['namaInstansi']);
  $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data['skalaPerusahaan']);
  $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data['namaAlumni']);
  $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data['jabatanAlumni']);
  $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data['Prodi']);
  $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data['kesesuaianBidang']);
  $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data['Integritas']);
  $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data['Profesionalisme']);
  $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data['kemampuanBerbahasaAsing']);
  $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data['penggunaanTeknologiInformasi']);
  $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data['kemampuanBerkomunikasi']);
  $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data['Kerjasama']);
  $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data['pengembanganDiri']);
  $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data['Usulan']);
  $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data['namaAtasan']);
  $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data['drawSignature']);
  
  
  
  
  // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
  $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
  $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
 
  
  $excel->getActiveSheet()->getRowDimension($numrow)->setRowHeight(20);
  
  $no++; // Tambah 1 setiap kali looping
  $numrow++; // Tambah 1 setiap kali looping
}

// Set width kolom
$excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
$excel->getActiveSheet()->getColumnDimension('B')->setWidth(13); // Set width kolom B
$excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
$excel->getActiveSheet()->getColumnDimension('D')->setWidth(33); // Set width kolom D
$excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
$excel->getActiveSheet()->getColumnDimension('F')->setWidth(25); // Set width kolom F
$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20); // Set width kolom G
$excel->getActiveSheet()->getColumnDimension('H')->setWidth(18); // Set width kolom H
$excel->getActiveSheet()->getColumnDimension('I')->setWidth(15); // Set width kolom I
$excel->getActiveSheet()->getColumnDimension('J')->setWidth(15); // Set width kolom J
$excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // Set width kolom K
$excel->getActiveSheet()->getColumnDimension('L')->setWidth(30); // Set width kolom L
$excel->getActiveSheet()->getColumnDimension('M')->setWidth(28); // Set width kolom M
$excel->getActiveSheet()->getColumnDimension('N')->setWidth(13); // Set width kolom N
$excel->getActiveSheet()->getColumnDimension('O')->setWidth(30); // Set width kolom O
$excel->getActiveSheet()->getColumnDimension('P')->setWidth(30); // Set width kolom P
$excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30); // Set width kolom Q
$excel->getActiveSheet()->getColumnDimension('R')->setWidth(35); // Set width kolom R






// Set orientasi kertas jadi LANDSCAPE
$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$excel->getActiveSheet(0)->setTitle("Laporan Data UserSurvey");
$excel->setActiveSheetIndex(0);



// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Usersurvey.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');


$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$write->save('php://output');



?>