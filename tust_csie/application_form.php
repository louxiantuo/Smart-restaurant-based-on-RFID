<?php
require_once 'bootstrap.php';
require_once 'include/db_info.inc.php';
$department_name = '';
$community_name = '';
$information1 = '';
$information2 = '';
$information3 = '';
$information4 = '';
$sql_select_department = "SELECT
  name,
  department_name,
  information1,
  information2,
  information3,
  information4
FROM communitys, departments
WHERE departments.id = " . $department_id . " AND communitys.id = community_id";
foreach ($dbh->query($sql_select_department) as $row) {
    $community_name = $row['name'];
    $department_name = $row['department_name'];
    $information1 = $row['information1'];
    $information2 = $row['information2'];
    $information3 = $row['information3'];
    $information4 = $row['information4'];
}

// Creating the new document...
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$sectionStyle = array('marginLeft' => 1200,
    'marginTop' => 1200,
    'marginRight' => 1200,
    'marginBottom' => 1200,
);

/* Note: any element you append to a document must reside inside of a Section. */

// Adding an empty Section to the document...
$section = $phpWord->addSection($sectionStyle);
// Adding Text element to the Section having font styled by default...
$section->addText(
    '计算机学院' . $community_name . '纳新报名表',
    array('name' => '宋体', 'size' => 16),
    array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER)
);

$cellRowSpan = array('vMerge' => 'restart', 'valign' => 'center');
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => '999999', 'valign' => 'center');
$textStyle = array('name' => '宋体', 'size' => 10.5);
$cellRowContinue = array('vMerge' => 'continue');
$cellColSpan = array('gridSpan' => 2, 'valign' => 'center');
$cellHCentered = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);
$cellVCentered = array('valign' => 'center');

$spanTableStyleName = 'Colspan Rowspan';
$phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
$table = $section->addTable($spanTableStyleName);

$table->addRow(500);

/**
 * 姓名
 */
$cell1 = $table->addCell(1300);
$textrun1 = $cell1->addTextRun($cellHCentered);
$textrun1->addText('姓   名', $textStyle);

$cell2 = $table->addCell(1400);
$nameText = $cell2->addTextRun($cellHCentered);

/**
 * 性别
 */
$table->addCell(1300)->addText('性   别', $textStyle, $cellHCentered);

$cell3 = $table->addCell(1400);
$sexText = $cell3->addTextRun($cellHCentered);

/**
 * 民族
 */
$table->addCell(1300)->addText('民   族', $textStyle, $cellHCentered);

$cell5 = $table->addCell(1700);
$nationText = $cell5->addTextRun($cellHCentered);

/**
 * 照片
 */
$table->addCell(1400, $cellRowSpan)->addText('照片', null, $cellHCentered);


// 第二行
$table->addRow(500);

/**
 * 学号
 */
$table->addCell(1300)->addText('学   号', $textStyle, $cellHCentered);

$cell3 = $table->addCell(1400);
$stdentID = $cell3->addTextRun($cellHCentered);

/**
 * 政治面貌
 */
$table->addCell(1300)->addText('政治面貌', $textStyle, $cellHCentered);

$cell6 = $table->addCell(1400);
$politicalStatus = $cell6->addTextRun($cellHCentered);

/**
 * 联系电话
 */
$table->addCell(1300)->addText('联系电话', $textStyle, $cellHCentered);

$cell4 = $table->addCell(1700);
$phoneText = $cell4->addTextRun($cellHCentered);

/**
 * 照片
 * 接上一行
 */
$table->addCell(null, $cellRowContinue);

// 第三行
$table->addRow(500);

/**
 * 志愿部门
 */
$table->addCell(1300)->addText('志愿部门', $textStyle, $cellHCentered);

$cell5 = $table->addCell(1400);
$department = $cell5->addTextRun($cellHCentered);

if ($is_adjust == 0) {
    $table->addCell(1600, array('gridSpan' => 2, 'vMerge' => 'restart'))->addText('服从调剂', $textStyle, $cellHCentered);
} else {
    $table->addCell(1600, array('gridSpan' => 2, 'vMerge' => 'restart'))->addText('不服从调剂', $textStyle, $cellHCentered);
}

/**
 * 出生日期
 */
$table->addCell(1300)->addText('出生日期', $textStyle, $cellHCentered);

$cell6 = $table->addCell(1700);
$barthdayText = $cell6->addTextRun($cellHCentered);

/**
 * 照片
 * 接上一行
 */
$table->addCell(null, $cellRowContinue);

$nameText->addText($student_name, $textStyle);
$nationText->addText($nation, $textStyle);
$politicalStatus->addText($political_status, $textStyle);
$stdentID->addText($student_id, $textStyle);
$sexText->addText($sex, $textStyle);
$phoneText->addText($phone_num, $textStyle);
$department->addText($department_name, $textStyle);
$barthdayText->addText($birth_date, $textStyle);


// description1
$table->addRow(null);
$table->addCell(null, array('gridSpan' => 7))->addText($information1, $textStyle);
$table->addRow(2000);
$cell7 = $table->addCell(null, array('gridSpan' => 7));
$information1Text = $cell7->addTextRun();
$information1Text->addText($description1, $textStyle);


// description2
$table->addRow(null);
$table->addCell(null, array('gridSpan' => 7))->addText($information2, $textStyle);
$table->addRow(2000);
$cell8 = $table->addCell(null, array('gridSpan' => 7));
$information2Text = $cell8->addTextRun();
$information2Text->addText($description2, $textStyle);

// description3
if (!empty($information3)) {
    $table->addRow(null);
    $table->addCell(null, array('gridSpan' => 7))->addText($information3, $textStyle);
    $table->addRow(2000);
    $cell9 = $table->addCell(null, array('gridSpan' => 7));
    $information3Text = $cell9->addTextRun();
    $information3Text->addText($description3, $textStyle);

}

// description4
if (!empty($information4)) {
    $table->addRow(null);
    $table->addCell(null, array('gridSpan' => 7))->addText($information4, $textStyle);
    $table->addRow(2000);
    $cell10 = $table->addCell(null, array('gridSpan' => 7));
    $information4Text = $cell10->addTextRun();
    $information4Text->addText($description4, $textStyle);
}

// Saving the document as OOXML file...
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
$objWriter->save('application_doc/' . $token . '.docx', 'Word2007');


/* Note: we skip RTF, because it's not XML-based and requires a different example. */
/* Note: we skip PDF, because "HTML-to-PDF" approach is used to create PDF documents. */