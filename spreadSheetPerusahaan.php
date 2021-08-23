<?php
include('connection.php');
include('securityA.php');
require 'phpSpreedSheet/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();

$spreadsheet->getProperties()->setCreator('Rendi')
->setLastModifiedBy('Rendi')
->setTitle("Data Perusahaan")
->setSubject("Rendi")
->setDescription("Laporan Data Perusahaan")
->setKeywords("Data Perusahaan");

$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A3', 'No');
$sheet->setCellValue('B3', "Nama Perusahaan");
$sheet->setCellValue('C3', "Alamat Perushaan"); 
$sheet->setCellValue('D3', "Email Perusahaan");
$sheet->setCellValue('E3', "No. Telpon Perusahaan");



$query = mysqli_query($connection,"select * from dataperusahaan");
$i = 4;
$no = 1;
while($row = mysqli_fetch_array($query))
{
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $row['namaPerusahaan']);
    $sheet->setCellValue('C'.$i, $row['alamatPerusahaan']);
    $sheet->setCellValue('D'.$i, $row['emailPerusahaan']);
    $sheet->setCellValue('E'.$i, $row['no_telp'],\PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING); //set datatype as string
    $i++;
}

$styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
        ];

        
 $cellColour=[   'fill' => [
        'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
        'rotation' => 90,
        'startColor' => [
            'argb' => 'FFFF00',
        ],
        'endColor' => [
            'argb' => 'FFFFFFFF',
        ],
    ],
];
$i = $i - 1;
$sheet->getStyle('A3:E'.$i)->applyFromArray($styleArray);
$sheet->getStyle('A3:E3')->applyFromArray($cellColour);
//$sheet->getColumnDimension('A')->setAutoSize(true);
foreach (range('A3','E') as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
 }
$sheet->getStyle('A3:E3')->getAlignment()->setHorizontal('center');


$writer = new Xlsx($spreadsheet);
$writer->save('Data Perusahaan.xlsx');

echo "<script>window.location = 'Data Perusahaan.xlsx'</script>";
?>