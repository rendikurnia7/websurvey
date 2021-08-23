<?php
include('connection.php');
include('securityA.php');
require 'phpSpreedSheet/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Title;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Chart\Layout;



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


$query = mysqli_query($connection,"select * from quisioner where Prodi='S1 Teknik Mesin' AND Tanggal LIKE '%2021%'");
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
$highestData=$sheet->getHighestRow();




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
    
     foreach (range('T3','Z') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
     }
    
     foreach (range('V6','Y16') as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
     }
    
     $sheet->getStyle('T3:AA4')->applyFromArray($styleArray);
     $sheet->getStyle('A3:Z'.$i)->getAlignment()->setHorizontal('center');
     $sheet->getStyle('A3:Y20')->getAlignment()->setHorizontal('center');
     $sheet->getStyle('T3:AA3')->applyFromArray($cellColour);
     $sheet->getStyle('U9:Y16')->applyFromArray($styleArray);
     $sheet->getStyle('U9:U16')->applyFromArray($cellColour);
     $sheet->getStyle('V9:Y9')->applyFromArray($cellColour);

     $sheet->getStyle('T19:W20')->applyFromArray($styleArray);
     $sheet->getStyle('T19:W19')->applyFromArray($cellColour);
     
     
    //TABLE RATA-RATA
    $sheet->setCellValue('U3', "Integritas");
    $sheet->setCellValue('V3', "Profesionalisme"); 
    $sheet->setCellValue('W3', "Kemampuan Berbahasa Asing");
    $sheet->setCellValue('X3', "Penggunaan Teknologi Informasi");
    $sheet->setCellValue('Y3', "Kemampuan Berkomunikasi");
    $sheet->setCellValue('Z3', "Kerjasama");
    $sheet->setCellValue('AA3', "Pengembangan Diri");

    //TABLE Kesesuian bidang
    $sheet->setCellValue('U19', "Tinggi");
    $sheet->setCellValue('V19', "Sedang"); 
    $sheet->setCellValue('W19', "Rendah");
    
    
    //TABLE COUNTIF
    $sheet->setCellValue('U10', "Integritas");
    $sheet->setCellValue('U11', "Profesionalisme"); 
    $sheet->setCellValue('U12', "Kemampuan Berbahasa Asing");
    $sheet->setCellValue('U13', "Penggunaan Teknologi Informasi");
    $sheet->setCellValue('U14', "Kemampuan Berkomunikasi");
    $sheet->setCellValue('U15', "Kerjasama");
    $sheet->setCellValue('U16', "Pengembangan Diri");
    
    $sheet->setCellValue('U9', "COUNTIF TABLE");
    $sheet->setCellValue('V9', "Sangat Baik");
    $sheet->setCellValue('W9', "Baik"); 
    $sheet->setCellValue('X9', "Cukup");
    $sheet->setCellValue('Y9', "Kurang");
    
    
    
    //insert Formula
    //rata-rata
    $sheet->setCellValue('T4','Rata-Rata');
    $sheet->setCellValue('U4','=AVERAGE(I:I)');
    $sheet->setCellValue('V4','=AVERAGE(J:J)');
    $sheet->setCellValue('W4','=AVERAGE(K:K)');
    $sheet->setCellValue('X4','=AVERAGE(L:L)');
    $sheet->setCellValue('Y4','=AVERAGE(M:M)');
    $sheet->setCellValue('Z4','=AVERAGE(N:N)');
    $sheet->setCellValue('AA4','=AVERAGE(O:O)');

     //kesesuian Bidang
     $sheet->setCellValue('T20','Kesesuian Bidang');
     $sheet->setCellValue('U20','=COUNTIF(H:H,"Tinggi")');
     $sheet->setCellValue('V20','=COUNTIF(H:H,"Sedang")');
     $sheet->setCellValue('W20','=COUNTIF(H:H,"Rendah")');


    //Sangat Baik
    $sheet->setCellValue('V10','=COUNTIF(I:I,"4")');
    $sheet->setCellValue('V11','=COUNTIF(J:J,"4")');
    $sheet->setCellValue('V12','=COUNTIF(K:K,"4")');
    $sheet->setCellValue('V13','=COUNTIF(L:L,"4")');
    $sheet->setCellValue('V14','=COUNTIF(M:M,"4")');
    $sheet->setCellValue('V15','=COUNTIF(N:N,"4")');
    $sheet->setCellValue('V16','=COUNTIF(O:O,"4")');
    
    //Baik
    $sheet->setCellValue('W10','=COUNTIF(I:I,"3")');
    $sheet->setCellValue('W11','=COUNTIF(J:J,"3")');
    $sheet->setCellValue('W12','=COUNTIF(K:K,"3")');
    $sheet->setCellValue('W13','=COUNTIF(L:L,"3")');
    $sheet->setCellValue('W14','=COUNTIF(M:M,"3")');
    $sheet->setCellValue('W15','=COUNTIF(N:N,"3")');
    $sheet->setCellValue('W16','=COUNTIF(O:O,"3")');
    //Cukup
    $sheet->setCellValue('X10','=COUNTIF(I:I,"2")');
    $sheet->setCellValue('X11','=COUNTIF(J:J,"2")');
    $sheet->setCellValue('X12','=COUNTIF(K:K,"2")');
    $sheet->setCellValue('X13','=COUNTIF(L:L,"2")');
    $sheet->setCellValue('X14','=COUNTIF(M:M,"2")');
    $sheet->setCellValue('X15','=COUNTIF(N:N,"2")');
    $sheet->setCellValue('X16','=COUNTIF(O:O,"2")');
    //Kurang
    $sheet->setCellValue('Y10','=COUNTIF(I:I,"1")');
    $sheet->setCellValue('Y11','=COUNTIF(J:J,"1")');
    $sheet->setCellValue('Y12','=COUNTIF(K:K,"1")');
    $sheet->setCellValue('Y13','=COUNTIF(L:L,"1")');
    $sheet->setCellValue('Y14','=COUNTIF(M:M,"1")');
    $sheet->setCellValue('Y15','=COUNTIF(N:N,"1")');
    $sheet->setCellValue('Y16','=COUNTIF(O:O,"1")');
    
    
    // Set the Labels for each data series we want to plot
    //     Datatype
    //     Cell reference for data
    //     Format Code
    //     Number of datapoints in series
    //     Data values
    //     Data Marker
    $dataSeriesLabels1 = [
        new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$V$9', null, 1), // 2010
        new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$W$9', null, 1), // 2011
        new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$X$9', null, 1), // 2012
        new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$Y$9', null, 1), // 2012
    ];
    // Set the X-Axis Labels
    //     Datatype
    //     Cell reference for data
    //     Format Code
    //     Number of datapoints in series
    //     Data values
    //     Data Marker
    $xAxisTickValues1 = [
        new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'worksheet!$U$10:$U$16', null, 4), // Q1 to Q4
    ];
    // Set the Data values for each data series we want to plot
    //     Datatype
    //     Cell reference for data
    //     Format Code
    //     Number of datapoints in series
    //     Data values
    //     Data Marker
    $dataSeriesValues1 = [
        new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'worksheet!$V$10:$V$16', null, 4),
        new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'worksheet!$W$10:$W$16', null, 4),
        new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'worksheet!$X$10:$X$16', null, 4),
        new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'worksheet!$Y$10:$Y$16', null, 4),
    ];
    
    // Build the dataseries
    $series1 = new DataSeries(
        DataSeries::TYPE_BARCHART, // plotType
        DataSeries::GROUPING_STANDARD, // plotGrouping
        range(0, count($dataSeriesValues1) - 1), // plotOrder
        $dataSeriesLabels1, // plotLabel
        $xAxisTickValues1, // plotCategory
        $dataSeriesValues1          // plotValues
    );
    // Set additional dataseries parameters
    //     Make it a vertical column rather than a horizontal bar graph
    $series1->setPlotDirection(DataSeries::DIRECTION_COL);
    $layout1 = new Layout();
    $layout1->setShowVal(true);
    // Set the series in the plot area
    $plotArea1 = new PlotArea($layout1, [$series1]);
    // Set the chart legend
    $legend1 = new Legend(Legend::POSITION_TOPRIGHT, null, false);
    
    $title1 = new Title('KOMPETENSI ALUMNI');
    $yAxisLabel1 = new Title('Jumlah Pilihan');
    
    // Create the chart
    $chart1 = new Chart(
        'Jumlah Pilihan', // name
        $title1, // title
        $legend1, // legend
        $plotArea1, // plotArea
        true, // plotVisibleOnly
        0, // displayBlanksAs
        null, // xAxisLabel
        $yAxisLabel1 // yAxisLabel
    );
    
    
    
    
// Set the Labels for each data series we want to plot
//     Datatype
//     Cell reference for data
//     Format Code
//     Number of datapoints in series
//     Data values
//     Data Marker
$dataSeriesLabels2 = [
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$U$3', null, 1), // 2010
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$V$3', null, 1), // 2011
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$W$3', null, 1), // 2012
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$X$3', null, 1), // 2012
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$Y$3', null, 1), // 2011
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$Z$3', null, 1), // 2012
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$AA$3', null, 1), // 2012
];
// Set the X-Axis Labels
//     Datatype
//     Cell reference for data
//     Format Code
//     Number of datapoints in series
//     Data values
//     Data Marker
$xAxisTickValues2 = [
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'worksheet!$T$4:$T$4', null, 4), // Q1 to Q4
];
// Set the Data values for each data series we want to plot
//     Datatype
//     Cell reference for data
//     Format Code
//     Number of datapoints in series
//     Data values
//     Data Marker
$dataSeriesValues2 = [
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'worksheet!$U$4', null, 4),
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'worksheet!$V$4', null, 4),
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'worksheet!$W$4', null, 4),
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'worksheet!$X$4', null, 4),
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'worksheet!$Y$4', null, 4),
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'worksheet!$Z$4', null, 4),
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'worksheet!$AA$4', null, 4),

];

// Build the dataseries
$series2 = new DataSeries(
    DataSeries::TYPE_BARCHART, // plotType
    DataSeries::GROUPING_STANDARD, // plotGrouping
    range(0, count($dataSeriesValues2) - 1), // plotOrder
    $dataSeriesLabels2, // plotLabel
    $xAxisTickValues2, // plotCategory
    $dataSeriesValues2          // plotValues
);
// Set additional dataseries parameters
//     Make it a vertical column rather than a horizontal bar graph
$series2->setPlotDirection(DataSeries::DIRECTION_COL);
    $layout2 = new Layout();
    $layout2->setShowVal(true);
    // Set the series in the plot area
    $plotArea2 = new PlotArea($layout2, [$series2]);
// Set the chart legend
$legend2 = new Legend(Legend::POSITION_TOPRIGHT, null, false);

$title2 = new Title('KOMPETENSI ALUMNI');
$yAxisLabel2 = new Title('Rata-Rata');

// Create the chart
$chart2 = new Chart(
    'Rata-Rata', // name
    $title2, // title
    $legend2, // legend
    $plotArea2, // plotArea
    true, // plotVisibleOnly
    0, // displayBlanksAs
    null, // xAxisLabel
    $yAxisLabel2 // yAxisLabel
);

// Set the Labels for each data series we want to plot
//     Datatype
//     Cell reference for data
//     Format Code
//     Number of datapoints in series
//     Data values
//     Data Marker
$dataSeriesLabels3 = [
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$U$19', null, 1), // 2010
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$V$19', null, 1), // 2011
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Worksheet!$W$19', null, 1), // 2012
];
// Set the X-Axis Labels
//     Datatype
//     Cell reference for data
//     Format Code
//     Number of datapoints in series
//     Data values
//     Data Marker
$xAxisTickValues3 = [
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'worksheet!$T$20:$T$20', null, 4), // Q1 to Q4
];
// Set the Data values for each data series we want to plot
//     Datatype
//     Cell reference for data
//     Format Code
//     Number of datapoints in series
//     Data values
//     Data Marker
$dataSeriesValues3 = [
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'worksheet!$U$20', null, 4),
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'worksheet!$V$20', null, 4),
    new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'worksheet!$W$20', null, 4),

];

// Build the dataseries
$series3 = new DataSeries(
    DataSeries::TYPE_BARCHART, // plotType
    DataSeries::GROUPING_STANDARD, // plotGrouping
    range(0, count($dataSeriesValues3) - 1), // plotOrder
    $dataSeriesLabels3, // plotLabel
    $xAxisTickValues3, // plotCategory
    $dataSeriesValues3          // plotValues
);
// Set additional dataseries parameters
//     Make it a vertical column rather than a horizontal bar graph
$series3->setPlotDirection(DataSeries::DIRECTION_COL);
    $layout3 = new Layout();
    $layout3->setShowVal(true);
    // Set the series in the plot area
    $plotArea3 = new PlotArea($layout3, [$series3]);
// Set the chart legend
$legend3 = new Legend(Legend::POSITION_TOPRIGHT, null, false);

$title3 = new Title('KESESUAIAN BIDANG ALUMNI');
$yAxisLabel3 = new Title('Jumlah Pilihan');

// Create the chart
$chart3 = new Chart(
    'Keseuaian Bidang', // name
    $title3, // title
    $legend3, // legend
    $plotArea3, // plotArea
    true, // plotVisibleOnly
    0, // displayBlanksAs
    null, // xAxisLabel
    $yAxisLabel3 // yAxisLabel
);






// Set the position where the chart should appear in the worksheet
$chart1->setTopLeftPosition('U22');
$chart1->setBottomRightPosition('Y39');
$chart2->setTopLeftPosition('U62');
$chart2->setBottomRightPosition('Y79');
$chart3->setTopLeftPosition('U42');
$chart3->setBottomRightPosition('Y57');

// Add the chart to the worksheet
$sheet->addChart($chart1);
$sheet->addChart($chart2);
$sheet->addChart($chart3);
    
    $writer = new Xlsx($spreadsheet);
    $writer->setIncludeCharts(true);
    $writer->save('Data Quisioner S1 Teknik Mesin 2021.xlsx');

    echo "<script>window.location = 'Data Quisioner S1 Teknik Mesin 2021.xlsx'</script>";
?>