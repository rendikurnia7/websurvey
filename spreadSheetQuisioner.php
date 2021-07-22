<?php
include('connection.php');
require '../phpSpreedSheet/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Layout;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use PhpOffice\PhpSpreadsheet\IOFactory;


require __DIR__ . '/../Header.php';

$spreadsheet = new Spreadsheet();

$spreadsheet->getProperties()->setCreator('Rendi')
->setLastModifiedBy('Rendi')
->setTitle("Data Quisioner")
->setSubject("Rendi")
->setDescription("Laporan Data Quisioner")
->setKeywords("Data Quisioner");

$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A3', 'No');
$sheet->setCellValue('B3', "Tanggal");
$sheet->setCellValue('C3', "Nama Intansi"); 
$sheet->setCellValue('D3', "Skala Perusahaan");
$sheet->setCellValue('E3', "Nama Alumni");
$sheet->setCellValue('F3', "Jabatan Alumni");
$sheet->setCellValue('G3', "Program Studi");
$sheet->setCellValue('H3', "kesesuaianBidang"); 
$sheet->setCellValue('I3', "Integritas");
$sheet->setCellValue('J3', "Profesionalisme"); 
$sheet->setCellValue('K3', "Kemampuan Berbahasa Asing");
$sheet->setCellValue('L3', "Penggunaan Teknologi Informasi");
$sheet->setCellValue('M3', "Kemampuan Berkomunikasi");
$sheet->setCellValue('N3', "Kerjasama");
$sheet->setCellValue('O3', "Pengembangan Diri");
$sheet->setCellValue('P3', "Usulan");
$sheet->setCellValue('Q3', "Nama Atasan"); 
$sheet->setCellValue('R3', "Draw Signature");


$query = mysqli_query($connection,"select * from quisioner");
$i = 4;
$no = 1;
while($row = mysqli_fetch_array($query))
{
    $sheet->setCellValue('A'.$i, $no++);
    $sheet->setCellValue('B'.$i, $row['Tanggal']);
    $sheet->setCellValue('C'.$i, $row['namaInstansi']);
    $sheet->setCellValue('D'.$i, $row['skalaPerusahaan']);
    $sheet->setCellValue('E'.$i, $row['namaAlumni']);
    $sheet->setCellValue('F'.$i, $row['jabatanAlumni']);
    $sheet->setCellValue('G'.$i, $row['Prodi']);
    $sheet->setCellValue('H'.$i, $row['kesesuaianBidang']);
    $sheet->setCellValue('I'.$i, $row['Integritas']);
    $sheet->setCellValue('J'.$i, $row['Profesionalisme']);
    $sheet->setCellValue('K'.$i, $row['kemampuanBerbahasaAsing']);
    $sheet->setCellValue('L'.$i, $row['penggunaanTeknologiInformasi']);
    $sheet->setCellValue('M'.$i, $row['kemampuanBerkomunikasi']);
    $sheet->setCellValue('N'.$i, $row['Kerjasama']);
    $sheet->setCellValue('O'.$i, $row['pengembanganDiri']);
    $sheet->setCellValue('P'.$i, $row['Usulan']);
    $sheet->setCellValue('Q'.$i, $row['namaAtasan']);
    $sheet->setCellValue('R'.$i, $row['locationSignature']);
    $i++;
}

//set Formula
$formulaCell=$sheet->getHighestRow()+2;
$highestRow = $sheet->getHighestRow()+1;




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
$sheet->getStyle('A3:R'.$i)->applyFromArray($styleArray);
$sheet->getStyle('A3:R3')->getAlignment()->setHorizontal('center');
$sheet->getStyle('A3:R3')->applyFromArray($cellColour);

//$sheet->getColumnDimension('A')->setAutoSize(true);
foreach (range('A3','R') as $col) {
    $sheet->getColumnDimension($col)->setAutoSize(true);
 }


 
$sheet->getStyle('H'.$highestRow)->applyFromArray($cellColour);
$sheet->getStyle('I'.$highestRow)->applyFromArray($cellColour);
$sheet->getStyle('J'.$highestRow)->applyFromArray($cellColour);
$sheet->getStyle('K'.$highestRow)->applyFromArray($cellColour);
$sheet->getStyle('L'.$highestRow)->applyFromArray($cellColour);
$sheet->getStyle('M'.$highestRow)->applyFromArray($cellColour);
$sheet->getStyle('N'.$highestRow)->applyFromArray($cellColour);
$sheet->getStyle('O'.$highestRow)->applyFromArray($cellColour);

$sheet->setCellValue('H'.$highestRow,'Rata-Rata');
$sheet->setCellValue('I'.$highestRow,'=AVERAGE(I:I)');
$sheet->setCellValue('J'.$highestRow,'=AVERAGE(J:J)');
$sheet->setCellValue('K'.$highestRow,'=AVERAGE(K:K)');
$sheet->setCellValue('L'.$highestRow,'=AVERAGE(L:L)');
$sheet->setCellValue('M'.$highestRow,'=AVERAGE(M:M)');
$sheet->setCellValue('N'.$highestRow,'=AVERAGE(N:N)');
$sheet->setCellValue('O'.$highestRow,'=AVERAGE(O:O)');



$writer = new Xlsx($spreadsheet);
$writer->save('Data Quisioner.xlsx');

echo "<script>window.location = 'Data Quisioner.".'echo date(dmy)'."xlsx'</script>";
?>