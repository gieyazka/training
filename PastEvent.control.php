
<?php
require_once "PastEvent.query.php";
// print_r($_REQUEST);
if ($_REQUEST['action'] == '1') {
    $obj = new PastEvent;
    $data = $obj->getData($_REQUEST['Event_Name']);
    include("PHPExcel/Classes/PHPExcel.php");
    $name = $_POST['Event_Name'];
    $objPHPExcel = new PHPExcel();

    // กำหนดค่าต่างๆ
    $objPHPExcel->getProperties()->setCreator("SirKy");
    $objPHPExcel->getProperties()->setLastModifiedBy("SirKy");
    $objPHPExcel->getProperties()->setTitle("Office 2007 XLSX ReportQuery Document");
    $objPHPExcel->getProperties()->setSubject("Office 2007 XLSX ReportQuery Document");
    $objPHPExcel->getProperties()->setDescription("ReportQuery from SirKy");

    $sheet = $objPHPExcel->getActiveSheet();
    $pageMargins = $sheet->getPageMargins();

    $columnCharacter = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

    // margin is set in inches (0.5cm)
    $margin = 0.5 / 2.54;

    $pageMargins->setTop($margin);
    $pageMargins->setBottom($margin);
    $pageMargins->setLeft($margin);
    $pageMargins->setRight(0);

    $styleHeader = array(
        //'fill' => array('type' => PHPExcel_Style_Fill::FILL_SOLID,'color' => array('rgb' => 'ffff00')),
        'borders' => array('outline' => array('style' => PHPExcel_Style_Border::BORDER_THIN)),
        'font'  => array(
            'bold'  => true,
            'size'  => 16,
            'name'  => 'TH Sarabun New'
        )
    );

    //Set หัว Column

    $rowCell = 1;

    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $rowCell, 'ลำดับ');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $rowCell, 'กิจกรรมที่ลงสมัคร');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $rowCell, 'เลขบัตรประชาชน');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $rowCell, 'Email');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $rowCell, 'ชื่อภาษาไทย');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $rowCell, 'นามสกุลภาษาไทย');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $rowCell, 'ชื่อภาษาอังกฤษ');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $rowCell, 'นามสกุลภาษาอังกฤษ');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I' . $rowCell, 'ชื่อเล่น');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J' . $rowCell, 'เพศ');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K' . $rowCell, 'ส่วนสูง');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L' . $rowCell, 'วันเกิด');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M' . $rowCell, 'อายุ');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('N' . $rowCell, 'ที่อยู่');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('O' . $rowCell, 'โรงเรียน');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('P' . $rowCell, 'ระดับชั้น');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q' . $rowCell, 'เท้าที่ถนัด');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('R' . $rowCell, 'เบอร์โทรศัพท์');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('S' . $rowCell, 'ชื่อผู้ปกครอง');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('T' . $rowCell, 'เบอร์โทรศัพท์ผู้ปกครอง');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('U' . $rowCell, 'เงินเดือนผู้ปกครอง');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('V' . $rowCell, 'สังกัดทีม/สโมสร');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('W' . $rowCell, 'ตำแหน่งที่ถนัด');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X' . $rowCell, 'สนาม');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('Y' . $rowCell, 'แหล่งข่าวสารที่ได้รับ');
    $objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z' . $rowCell, 'สถานะ');
    $objPHPExcel->getActiveSheet()->getStyle('A1:Z1')->applyFromArray($styleHeader);

    //เขียนข้อมูล
    $rowCell = 2;
    $c = 0;

    for ($i = 0; $i < sizeof($data); $i++) {
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A' . $rowCell, $i + 1);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('B' . $rowCell, $data[$i]['Subject']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('C' . $rowCell, "'" . $data[$i]['Member_PID']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('D' . $rowCell,  $data[$i]['Email']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('E' . $rowCell, $data[$i]['Firstname']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('F' . $rowCell, $data[$i]['Lastname']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('G' . $rowCell, $data[$i]['Firstname_EN']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('H' . $rowCell, $data[$i]['Lastname_EN']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('I' . $rowCell, $data[$i]['Nickname']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('J' . $rowCell, $data[$i]['Sex']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('K' . $rowCell, $data[$i]['Height']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('L' . $rowCell, $data[$i]['Birthdate']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('M' . $rowCell, $data[$i]['Age']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('N' . $rowCell, $data[$i]['Address']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('O' . $rowCell, $data[$i]['School']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('P' . $rowCell, $data[$i]['Class']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('Q' . $rowCell, $data[$i]['Foot']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('R' . $rowCell, $data[$i]['Tel']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('S' . $rowCell, $data[$i]['Pname']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('T' . $rowCell, $data[$i]['Parent_Tel']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('U' . $rowCell, $data[$i]['Salary']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('V' . $rowCell, $data[$i]['Club']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('W' . $rowCell, $data[$i]['Position']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('X' . $rowCell, $data[$i]['Field']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('Y' . $rowCell, $data[$i]['Info']);
        $objPHPExcel->setActiveSheetIndex(0)->setCellValue('Z' . $rowCell, $data[$i]['Active']);
        $rowCell++;
    }


    // Rename worksheet
    $objPHPExcel->getActiveSheet()->setTitle('ReportQuery');

    // Set active sheet index to the first sheet, so Excel opens this as the first sheet
    $objPHPExcel->setActiveSheetIndex(0);


    //ตั้งชื่อไฟล์

    $file_name = $_REQUEST['Event_Name'];
    //

    // Save Excel 2007 file
    #echo date('H:i:s') . " Write to Excel2007 format\n";
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
    ob_end_clean();
    // We'll be outputting an excel file
    header('Content-type: application/vnd.ms-excel');
    // It will be called file.xls
    header('Content-Disposition: attachment;filename="' . $file_name . '.xlsx"');
    $objWriter->save('php://output');
    exit();
} ?>

