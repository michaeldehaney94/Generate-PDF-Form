<?php 
include('config/tcpdf_config.php');
include('tcpdf.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('Vector Technology Institute Application');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);

// set cell margins
$pdf->setCellMargins(0, 0, 0, 0);

// set color for background
$pdf->SetFillColor(255,255,255);

//LOGO
//------------------------------------------------------------------
//header logo
// Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
$pdf->Image('./public/images/school-logo.jpg', 5, 27, 38, 35, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);

//------------------------------------------------------------------

//HEADER CONTENT
//--------------------------------------------------------------------------------------------
$titleHeader='                 Vector Technology Institute';
$slogan='                                TRANSFORMING EDUCATION INTO CAREERS     Registered by the University Council of Jamaica';
$addressLn1='                                  35A Eastwood Park Road,      www.vector.edu.jm       Tel. (876) 929 3435/6';
$addressLn2='                                    Kingston 10. Jamaica            info@vector.edu.jm       Fax. (876) 929 8006';
$app='                                          APPLICATION FORM';
$instruction='Instruction(s):';
$instruction2='      Fill out this form in BLOCK LETTERS and place N/A where not applicable. Application fees are non-refundable.';
$pdf->SetFont('times', 'B', 20);
$pdf->Write(0, $titleHeader, '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('times', '', 10);
$pdf->Write(0, $slogan, '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, $addressLn1, '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, $addressLn2, '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(3);
$pdf->SetFont('times', 'B', 14);
$pdf->Write(0, $app, '', 0, 'L', true, 0, false, false, 0);
$pdf->SetFont('times', '', 10);
$pdf->Write(0, $instruction, '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, $instruction2, '', 0, 'L', true, 0, false, false, 0);

//-------------------------------------------------------------------------------------------
// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

// set form text
$title = 'TITLE'; $surname = 'SURNAME'; $firstname = 'FIRST NAME'; $middlename = 'MIDDLE NAME(S)';
$dob = 'DATE OF BIRTH (DD / MM / YYYY)';

// NAME AND DOB
$pdf->Ln(2);
$pdf->MultiCell(25, 13, $title, 1, 'L', 1, 0, '7', '', true);
$pdf->MultiCell(55, 13, $surname, 1, 'L', 0, 0, '', '', true);
$pdf->MultiCell(55, 13, $middlename, 1, 'L', 0, 0, '', '', true);
$pdf->MultiCell(60, 13, $dob."\n ___ / ___ / _____", 1, 'C', 1, 2, '' ,'', true);
//$pdf->MultiCell(55, 5, $txt, 1, '"', 0, 1, '', '', true);


// set color for background
//$pdf->SetFillColor(255,255,255);

// set form text
$id_verification = 'IDENTIFICATION VERIFICATION'; $trn = 'TRN'; $gender = 'GENDER'; 
$passport = 'Passport #  _________________________'; 
$drivers = 'Drivers License #  _________________________';
$other = "Other  _________________________";
$male = 'Male'; 
$female = 'Female';
// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
// IDENTIFICATION AND GENDER
$pdf->MultiCell(140, 40, $id_verification, 1, 'L', 1, 0, '7', '', true);
$pdf->MultiCell(55, 18, $trn."\n"."\n ________---________---________", 1, 'L', 1, 1, '', '', true, 0, false, true, 0, 'M');
$pdf->MultiCell(55, 22, $gender, 1, 'L', 0, 1, '147', '', true, 0, false, true, 0, 'B');
$pdf->MultiCell(90, 10, $passport, 0, 'L', 1, 1, '35', '104', true);
$pdf->MultiCell(90, 10, $drivers, 0, 'L', 1, 1, '35', '', true);
$pdf->MultiCell(90, 8, $other, 0, 'L', 1, 0, '35', '121', true);
//checkbox for id
$pdf->MultiCell(7, 5, ' ', 1, 'L', 1, 1, '25', '105', true);
$pdf->MultiCell(7, 5, ' ', 1, 'L', 1, 1, '25', '113', true);
$pdf->MultiCell(7, 5, ' ', 1, 'L', 1, 1, '25', '121', true);
//checkbox for gender
$pdf->MultiCell(6, 5, '', 1, 'L', 1, 0, '150', '123', true);
$pdf->MultiCell(6, 5, '', 1, 'L', 1, 0, '170', '123', true);
$pdf->MultiCell(10, 5, $male, 0, 'L', 0, 0, '157', '123', true);
$pdf->MultiCell(15, 5, $female, 0, 'L', 0, 0, '177', '123', true);

$pdf->Ln(4);

// // - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// //line spacing for writing text
$pdf->setCellHeightRatio(2);

//set form text
$permanentAddress='PERMANENT ADDRESS'."\n _______________________________________________________________________________________________________________________________________________________________"; 
$mailingAddress='MAILING ADDRESS (if different)'."\n _________________________________________________________________________________________________________________________________________________________________"; ; 
$email='EMAIL ADDRESS'; $telephone1='TELEPHONE 1'; $telephone2='TELEPHONE 2';

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
//ADDRESS, EMAIL AND CONTACT
$pdf->MultiCell(97, 40, $permanentAddress, 1, 'L', 1, 0, '7', '136', true);
$pdf->MultiCell(98, 40, $mailingAddress, 1, 'L', 0, 0, '', '', true);
$pdf->MultiCell(97, 13, $email, 1, 'L', 0, 0, '7', '176', true);
$pdf->MultiCell(50, 13, $telephone1, 1, 'L', 0, 0, '', '', true);
$pdf->MultiCell(48, 13, $telephone2, 1, 'L', 0, 0, '', '', true);

// print a blox of text using multicell()
//$pdf->MultiCell(80, 5, $txt."\n", 1, 'J', 1, 1, '' ,'', true);

$pdf->Ln(15);

$pdf->SetFont('times', '', 12);
$pdf->Write(0, 'EMERGENCY CONTACT INFORMATION', '', 0, 'L', true, 0, false, false, 0);
//EMERGENCY CONTACT INFORMATION
$pdf->SetFont('times', '', 10);
$eName='NAME(LAST, FIRST)'; $eRelationship='RELATIONSHIP'; $ePhone1='TELEPHONE #1';  $ePhone2='TELEPHONE #2';
//MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
$pdf->MultiCell(70, 15, $eName, 1, 'L', 1, 0, '7', '', true, 0, false, false, 0);
$pdf->MultiCell(42, 15, $eRelationship, 1, 'L', 1, 0, '', '', true, 0, false, false, 0);
$pdf->MultiCell(42, 15, $ePhone1, 1, 'L', 1, 0, '', '', true, 0, false, false, 0);
$pdf->MultiCell(42, 15, $ePhone2, 1, 'L', 1, 0, '', '', true, 0, false, false, 0);
$pdf->Ln(15);
$pdf->MultiCell(70, 15, $eName, 1, 'L', 1, 0, '7', '', true, 0, false, false, 0);
$pdf->MultiCell(42, 15, $eRelationship, 1, 'L', 1, 0, '', '', true, 0, false, false, 0);
$pdf->MultiCell(42, 15, $ePhone1, 1, 'L', 1, 0, '', '', true, 0, false, false, 0);
$pdf->MultiCell(42, 15, $ePhone2, 1, 'L', 1, 0, '', '', true, 0, false, false, 0);
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
$pdf->Ln(16);
$pdf->SetFont('times', '', 12);
$pdf->Write(0, 'EMPLOYMENT INFORMATION', '', 0, 'L', true, 0, false, false, 0);
//EMPLOYMENT INFORMATION
$pdf->SetFont('times', '', 10);
$pdf->MultiCell(120, 13, 'NAME OF EMPLOYER', 1, 'L', 1, 0, '7', '', true, 0, false, false, 0);
$pdf->MultiCell(70, 13, 'TELEPHONE #', 1, 'L', 1, 1, '', '', true, 0, false, false, 0);
$pdf->MultiCell(120, 13, 'JOB TITLE', 1, 'L', 1, 0, '7', '', true, 0, false, false, 0);
$pdf->MultiCell(70, 13, 'FAX #', 1, 'L', 1, 0, '', '', true, 0, false, false, 0);

// move pointer to last page
//$pdf->lastPage();

// Create page 2 of 3
$pdf->AddPage();
// ---------------------------------------------------------
//SPONSORSHIP INFORMATION
$pdf->SetFont('times', '', 12);
$pdf->Write(0, 'SPONSORSHIP INFORMATION', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('times', '', 10);
// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
$sponsorPlan='HOW DO YOU PLAN TO PAY OUR TUITION?'; $salary='Salary Deduction'; $scholarship='Scholarship'; $sponsor='Sponsor'; $self='Self';
$sponsorName='NAME OF SPONSOR / INSTITUTION'; $sponsorAddress='ADDRESS OF SPONSOR / INSTITUTION';

$pdf->MultiCell(190, 20, $sponsorPlan, 1, 'L', 1, 0, '7', '', true);
$pdf->Ln(9);
$pdf->MultiCell(6, 5, '', 1, 'L', 1, 0, '148', '', true);
$pdf->MultiCell(28, 10, $salary, 0, 'L', 1, 0, '155', '', true);
$pdf->MultiCell(6, 5, '', 1, 'L', 1, 0, '112', '', true);
$pdf->MultiCell(28, 5, $scholarship, 0, 'L', 1, 0, '120', '', true);
$pdf->MultiCell(6, 5, '', 1, 'L', 1, 0, '80', '', true);
$pdf->MultiCell(20, 10, $sponsor, 0, 'L', 1, 0, '88', '', true);
$pdf->MultiCell(6, 5, '', 1, 'L', 1, 0, '55', '', true);
$pdf->MultiCell(10, 10, $self, 0, 'L', 1, 0, '62', '', true);
$pdf->Ln(11);
$pdf->MultiCell(190, 13, $sponsorName, 1, 'L', 1, 0, '7', '', true);
$pdf->Ln(12);
$pdf->MultiCell(190, 13, $sponsorAddress, 1, 'L', 1, 0, '7', '', true);

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// set font
$pdf->SetFont('times', '', 10);
//----------------------------------------------------------
// set color for background


//SECONDARY EDUCATION
$pdf->SetFont('times', '', 12);
$pdf->MultiCell(55, 20, 'SECONDARY EDUCATION', 0, 'L', 1, 0, '15', '85', true);
//$pdf->Write(0, 'SECONDARY EDUCATION', '', 0, 'L', true, 0, false, false, 0);
$pdf->SetFillColor(128,128,128);
$pdf->SetFont('times', '', 10);
// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
//set font color
$pdf->SetTextColor(255, 255, 255);
$pdf->MultiCell(20, 20, 'BODY EXAM(For e.g. CXC)', 1, 'C', 1, 0, '7', '94', true);
$pdf->MultiCell(65, 23, 'INSTITUTION', 1, 'C', 1, 0, '', '', true);
$pdf->MultiCell(65, 23, 'SUBJECT', 1, 'C', 1, 0, '', '', true);
$pdf->MultiCell(20, 23, 'RESULT', 1, 'C', 1, 0, '', '', true);
$pdf->MultiCell(22, 20, 'DATE AWARDED'."\n(MM/YYYY)", 1, 'C', 1, 1, '', '', true);
//table body
//set font color
$pdf->SetTextColor(0, 0, 0);
// set color for background
$pdf->SetFillColor(255, 255, 255);
//row 1
$pdf->MultiCell(20, 5, '', 1, 'L', 1, 0, '7', '', true);
$pdf->MultiCell(65, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(65, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(20, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(22, 5, '', 1, 'L', 1, 1, '', '', true);
//row 2
$pdf->MultiCell(20, 5, '', 1, 'L', 1, 0, '7', '', true);
$pdf->MultiCell(65, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(65, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(20, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(22, 5, '', 1, 'L', 1, 1, '', '', true);
//row 3
$pdf->MultiCell(20, 5, '', 1, 'L', 1, 0, '7', '', true);
$pdf->MultiCell(65, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(65, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(20, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(22, 5, '', 1, 'L', 1, 1, '', '', true);
//row 4
$pdf->MultiCell(20, 5, '', 1, 'L', 1, 0, '7', '', true);
$pdf->MultiCell(65, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(65, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(20, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(22, 5, '', 1, 'L', 1, 1, '', '', true);
//row 5
$pdf->MultiCell(20, 5, '', 1, 'L', 1, 0, '7', '', true);
$pdf->MultiCell(65, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(65, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(20, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(22, 5, '', 1, 'L', 1, 1, '', '', true);
//row 6
$pdf->MultiCell(20, 5, '', 1, 'L', 1, 0, '7', '', true);
$pdf->MultiCell(65, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(65, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(20, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(22, 5, '', 1, 'L', 1, 1, '', '', true);
//row 7
$pdf->MultiCell(20, 5, '', 1, 'L', 1, 0, '7', '', true);
$pdf->MultiCell(65, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(65, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(20, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(22, 5, '', 1, 'L', 1, 1, '', '', true);


// set color for background
$pdf->SetFillColor(128,128,128);
//set font color

$pdf->Ln(5);
//TERTIARY EDUCATION
$pdf->SetFont('times', '', 12);
$pdf->Write(0, 'TERTIARY EDUCATION', '', 0, 'L', true, 0, false, false, 0);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('times', '', 10);
// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
$institution='INSTITUTION'; $programme='PROGRAMME'; $from='FROM'."\n(MM/YYYY)"; $to='TO'."\n(MM\YYYY)";

$pdf->MultiCell(60, 16, $institution, 1, 'C', 1, 0, '7', '195', true);
$pdf->MultiCell(60, 16, $programme, 1, 'C', 1, 0, '', '', true);
$pdf->MultiCell(35, 10, $from, 1, 'C', 1, 0, '', '', true);
$pdf->MultiCell(35, 10, $to, 1, 'C', 1, 1, '', '', true);
// set color for background
$pdf->SetFillColor(255, 255, 255);
//set font color
$pdf->SetTextColor(0, 0, 0);
//row 1
$pdf->MultiCell(60, 5, '', 1, 'L', 1, 0, '7', '205', true);
$pdf->MultiCell(60, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(35, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(35, 5, '', 1, 'L', 1, 1, '', '', true);
//row 2
$pdf->MultiCell(60, 5, '', 1, 'L', 1, 0, '7', '214', true);
$pdf->MultiCell(60, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(35, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(35, 5, '', 1, 'L', 1, 1, '', '', true);
//row 3
$pdf->MultiCell(60, 5, '', 1, 'L', 1, 0, '7', '222', true);
$pdf->MultiCell(60, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(35, 5, '', 1, 'L', 1, 0, '', '', true);
$pdf->MultiCell(35, 5, '', 1, 'L', 1, 1, '', '', true);

//$pdf->Ln(6);

//OTHER QUALIFICATIONS
$pdf->Ln(2);
$pdf->SetFont('times', '', 12);
$pdf->Write(0, 'OTHER QUALIFICATIONS', '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('times', '', 10);

//line spacing for writing text
//$pdf->setCellHeightRatio(3);

$otherQualifications='________________________________________________________________________________________________________________________________________________________________________________________________'.
"________________________________________________________________________________________________________________________________________________________________________________________________________________________________________";

$pdf->MultiCell(190, 50, $otherQualifications, 0, 'L', 0, 0, '7', '242', true);
$pdf->setCellHeightRatio(0);

$pdf->Ln(46);
// Create page 3 of 3
$pdf->AddPage();

//PROGRAMMES
$pdf->SetFont('times', '', 12);
$pdf->Write(0, 'PROGRAMMES', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(4);

$pdf->SetFont('times', '', 10);
// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
$other='Other:_____________________________________________________________________________';

$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
//column 1 - name of programmes checkboxes
$pdf->MultiCell(75, 4, 'Bachelor of Science in Technology Management', 0, 'L', 0, 1, '14', '34', true);
$pdf->Ln(1);
$pdf->MultiCell(100, 4, 'Bachelor of Science in Information & Communication Technology', 0, 'L', 0, 1, '14', '', true);
$pdf->Ln(1);
$pdf->MultiCell(100, 4, 'Associate Degree in Computer Systems Technology', 0, 'L', 0, 1, '14', '', true);
$pdf->Ln(1);
$pdf->MultiCell(75, 4, 'Associate Degree in Software Programming', 0, 'L', 0, 1, '14', '', true);
$pdf->Ln(1);
$pdf->MultiCell(75, 4, 'Diploma in Software Programming', 0, 'L', 0, 1, '14', '', true);
$pdf->Ln(1);
$pdf->MultiCell(75, 4, 'Diploma in Computer Systems Technology', 0, 'L', 0, 1, '14', '', true);
$pdf->Ln(1);
$pdf->MultiCell(75, 4, 'Advanced Diploma in Cyber Security Analyst', 0, 'L', 0, 1, '14', '', true);
$pdf->Ln(1);
$pdf->MultiCell(75, 4, 'Certificate in Mobile Application Development', 0, 'L', 0, 1, '14', '', true);
$pdf->Ln(1);
$pdf->MultiCell(75, 4, 'CISCO Certified Network Associate (CCNA)', 0, 'L', 0, 1, '14', '', true);
$pdf->Ln(3);
$pdf->MultiCell(150, 4, $other, 0, 'L', 0, 1, '14', '', true);
//column 2 - name of programmes checkboxes
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '120', '34', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '120', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '120', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '120', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '120', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '120', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '120', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '120', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '120', '', true);
//certificates
$pdf->MultiCell(75, 4, 'Fiber Optics Technician Part 1', 0, 'L', 0, 1, '126', '35', true);
$pdf->Ln(1);
$pdf->MultiCell(100, 4, 'Fiber Optics Technician Part 2', 0, 'L', 0, 1, '126', '', true);
$pdf->Ln(1);
$pdf->MultiCell(100, 4, 'Graphics Design 1', 0, 'L', 0, 1, '126', '', true);
$pdf->Ln(1);
$pdf->MultiCell(75, 4, 'Graphics Design 2', 0, 'L', 0, 1, '126', '', true);
$pdf->Ln(1);
$pdf->MultiCell(75, 4, 'Webpage Design & Development', 0, 'L', 0, 1, '126', '', true);
$pdf->Ln(1);
$pdf->MultiCell(75, 4, 'Photovoltaic Installer Level 1 (Solar)', 0, 'L', 0, 1, '126', '', true);
$pdf->Ln(1);
$pdf->MultiCell(75, 4, 'Computer Service Technicians', 0, 'L', 0, 1, '126', '', true);
$pdf->Ln(1);
$pdf->MultiCell(75, 4, 'Computer Network Technicians', 0, 'L', 0, 1, '126', '', true);
$pdf->Ln(1);
$pdf->MultiCell(75, 4, 'Computer Network Security Technicians', 0, 'L', 0, 1, '126', '', true);

$pdf->Ln(18);
//PROGRAMME SCHEDULE
$pdf->Write(0, 'PROGRAMME SCHEDULE?', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(5);
// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

$pdf->MultiCell(5, 5, '', 1, 'L', 1, 0, '18', '', true);
$pdf->MultiCell(5, 5, '', 1, 'L', 0, 0, '74', '', true);
$pdf->MultiCell(5, 5, '', 1, 'L', 0, 0, '144', '', true);
//schedule
$pdf->Ln(1);
$pdf->MultiCell(10, 20, 'Day', 0, 'L', 0, 0, '25', '', true);
$pdf->MultiCell(150, 120, 'Evening', 0, 'L', 0, 0, '80', '', true);
$pdf->MultiCell(90, 30, 'Weekend', 0, 'L', 0, 0, '150', '', true);
//date and time
$pdf->Ln(5);
//day time
$pdf->MultiCell(50, 10, 'Mon – Fri, 9:00 am – 4:00 pm', 0, 'L', 0, 0, '25', '', true);
//evening time
$pdf->MultiCell(56, 10, 'Mon – Thurs, 5:30 pm – 8:30 pm or', 0, 'L', 0, 0, '80', '', true);
$pdf->Ln(5);
$pdf->MultiCell(150, 120, 'Tues / Thurs & Sat, 9:00 am – 4:00 pm or', 0, 'L', 0, 0, '80', '', true);
$pdf->Ln(5);
$pdf->MultiCell(150, 120, 'Mon / Wed & Sat, 9:00 am – 4:00 pm', 0, 'L', 0, 0, '80', '', true);
//weekend time
$pdf->MultiCell(90, 30, 'Saturdays 9:00 am – 4:00 pm', 0, 'L', 0, 0, '150', '110', true);
$pdf->MultiCell(90, 30, 'Sundays 9:00 am – 4:00 pm', 0, 'L', 0, 0, '150', '115', true);

$pdf->AddPage();

$pdf->Write(0, 'WHAT IS YOUR OBJECTIVE FOR THE PROGRAMME BEING REGISTERED FOR?', '', 0, 'L', true, 0, false, false, 0);

$OBJECTIVES='________________________________________________________________________________________________________________________________________________________________________________________________'.
"________________________________________________________________________________________________________________________________________________________________________________________________________________________________________";

$pdf->MultiCell(190, 50, $OBJECTIVES, 0, 'L', 0, 0, '7', '242', true);



$pdf->Write(0, 'HOW DID YOU HEAR ABOUT VECTOR TECHNOLOGY INSTITUTE?', '', 0, 'L', true, 0, false, false, 0);

$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(75, 4, 'Newspaper', 0, 'L', 0, 1, '126', '35', true);
$pdf->Ln(1);
$pdf->MultiCell(100, 4, 'Television', 0, 'L', 0, 1, '126', '', true);
$pdf->Ln(1);
$pdf->MultiCell(100, 4, 'Facebook', 0, 'L', 0, 1, '126', '', true);

$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(75, 4, 'Walk By/Sign', 0, 'L', 0, 1, '126', '35', true);
$pdf->Ln(1);
$pdf->MultiCell(100, 4, 'Radio', 0, 'L', 0, 1, '126', '', true);
$pdf->Ln(1);
$pdf->MultiCell(100, 4, 'Instagram', 0, 'L', 0, 1, '126', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(75, 4, 'Website', 0, 'L', 0, 1, '126', '35', true);
$pdf->Ln(1);
$pdf->MultiCell(100, 4, 'Search Engine', 0, 'L', 0, 1, '126', '', true);
$pdf->Ln(1);
$pdf->MultiCell(100, 4, $other, 0, 'L', 0, 1, '126', '', true);

$pdf->Ln(18);
//PROGRAMME SCHEDULE
$pdf->Write(0, 'Referrals:', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(5);

$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(100, 4, 'Family', 0, 'L', 0, 1, '126', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(100, 4, 'Friend', 0, 'L', 0, 1, '126', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(100, 4, 'Colleague', 0, 'L', 0, 1, '126', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(100, 4, $other, 0, 'L', 0, 1, '126', '', true);

$statement='I hereby certify that the information written on this application and the documents provided are true and correct. I also agree to abide by the Terms and Conditions mentioned overleaf which governs this Application for admittance to the above-mentioned programme.';

$pdf->MultiCell(190, 50, $statement, 0, 'L', 0, 0, '7', '242', true);
$pdf->setCellHeightRatio(0);

$pdf->SetFont('times', '', 10);
$pdf->MultiCell(120, 13, "Applicant's signature", 1, 'L', 1, 0, '7', '', true, 0, false, false, 0);
$pdf->MultiCell(70, 13, 'DATE(DD/MM/YYYY)', 1, 'L', 1, 1, '', '', true, 0, false, false, 0);

$pdf->Ln(5);


$pdf->MultiCell(35, 10, 'OFFICIAL USE ONLY', 1, 'C', 1, 1, '', '', true);
// set color for background
$pdf->SetFillColor(255, 255, 255);
//set font color
$pdf->SetTextColor(0, 0, 0);

$pdf->SetFont('times', '', 10);
$pdf->MultiCell(120, 13, 'RECEIVED/WITNESS BY ', 1, 'L', 1, 0, '7', '', true, 0, false, false, 0);
$pdf->MultiCell(70, 13, 'DATE (DD/MM/YYYY)', 1, 'L', 1, 1, '', '', true, 0, false, false, 0);
$pdf->MultiCell(120, 13, 'PROCESSED BY', 1, 'L', 1, 0, '7', '', true, 0, false, false, 0);
$pdf->MultiCell(70, 13, 'DATE (DD/MM/YYYY)', 1, 'L', 1, 0, '', '', true, 0, false, false, 0);


$pdf->MultiCell(70, 13, 'MATRICULATION', 1, 'L', 1, 0, '', '', true, 0, false, false, 0);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(100, 4, 'Full', 0, 'L', 0, 1, '126', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(100, 4, 'Provisional', 0, 'L', 0, 1, '126', '', true);
$pdf->MultiCell(5, 5, ' ', 1, 'L', 1, 1, '8', '', true);
$pdf->MultiCell(100, 4, 'Mature Entry', 0, 'L', 0, 1, '126', '', true);

$Comments='________________________________________________________________________________________________________________________________________________________________________________________________
________________________________________________________________________________________________________________________________________________________________________________________________________________________________________';
$pdf->MultiCell(190, 50, $Comments, 0, 'L', 0, 0, '7', '242', true);
$pdf->setCellHeightRatio(0);


$pdf->MultiCell(120, 13, 'ACCEPTANCE APPROVED BY', 1, 'L', 1, 0, '7', '', true, 0, false, false, 0);
$pdf->MultiCell(70, 13, 'DATE (DD/MM/YYYY)', 1, 'L', 1, 1, '', '', true, 0, false, false, 0);


$pdf->AddPage();

$pdf->Write(0, 'TERMS & CONDITIONS', '', 0, 'c', true, 0, false, false, 0);
$pdf->Write(0, 'QUALIFICATION FOR ADMISSION', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(5);

$ADMstatement='To begin our programmes, participants need not any background in working with computers; however, it is necessary that the individual 
show an affinity for working with electrical or electronic devices. Participants seeking admission to these programmes must satisfy the
minimum matriculation requirements.';
$pdf->Write(0, $ADMstatement, '', 0, 'L', true, 0, false, false, 0);

$BADP='Bachelor & Associate Degree Programmes - five subjects at; Diploma Programme - four subject at:
-CXC passess to Grade 3 level (from 1998)
-GCE "O" level passes to Grade "C" level 
-U.L.C.I subjects to the "Pass" level ';

$pdf->Write(0, $BADP, '', 0, 'L', true, 0, false, false, 0);

$SubjectClarity='These subjects should include English Language, Which is compulsory, and a numeric subject.';

$pdf->Write(0, $SubjectClarity, '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$Completedform='The completed application form must be submitted with:
-Proof of academic standing, and proof of Identity(Passport, Driver"s license , Birth Certificate)
-Passport sized picture of student.
-Marriage certificate where applicable';

$pdf->Write(0, $Completedform, '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Write(0, 'GENERAL', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(3);
$General='It is important that students obtain a VTI Policies Handbook during orientation as the rules and regulations set out will govern the operations of
the Institute and the conduct expected from students. All students must ensure that they inform themselves of the starting dates of their
modules. Information is provided via the Notice Boards, the Intranet and the Internet (website). VTI reserves the right to cancel a Programme
due to insufficient applicants and also to make changes to class times (scheduling) where necessary.';
$pdf->Write(0, $General, '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(3);

$pdf->Write(0, 'REGISTRATION', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(3);
$Registration='Before registration is carried out, date(s) for commencement of module/programme must be chosen from the schedule after which application
form(s) are completed.
NB: For the evening programmes, your space on each module cannot be guaranteed unless you have
a) Paid up fees for, the relevant programme/module or as, per approved payment plan.
b) Submitted an approved Purchase order for the full amount of the programme/module being registered for if sponsored.';

$pdf->Write(0, $Registration, '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(3);

$pdf->Write(0, 'EXEMPTIONS', '', 0, 'L', true, 0, false, false, 0);
$Exemptions='To be exempted from a module, a person must show that he/she has superior knowledge of the subject matter. An exemption test may be given,
with a pass mark of 80%. An exemption fee will apply. One may also be exempted if it is adjudged by the Institute, that he/she has superior
qualifications by submitting valid proof of such. In this case, no examination will be required.';
$pdf->Write(0, $Exemptions, '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(3);


$pdf->Write(0, 'CANCELLATIONS', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(3);
$CANCELLATIONS='Can be made but will be subjected to the following service charges:';
$pdf->Write(0, $CANCELLATIONS, '', 0, 'L', true, 0, false, false, 0);

$pdf->Ln(3);

$CONDITIONS='Ten or more working days before starting date    5% of course fees';
'Between four to ten working days before starting date     10% of course fees';
'Less than four working days before starting date         20% of course fees';

$pdf->Write(0, 'REFUNDS', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(3);
$REFUND='Fees are refundable subject to the cancellation policy. However, once a student has started attending classes, or once the class commences,
he/she will be liable for the full cost of the course.';
$pdf->Write(0, $REFUND, '', 0, 'L', true, 0, false, false, 0);

$pdf->Write(0, 'TRANSFERS', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(3);
$TRANSFER='Where applicable, participants may be allowed to transfer their application to another module, however all transfers must be made five working
days or more before commencement of module. Failure to do so will result in an imposed penalty of 50% of regular module fee. Once the module
commences, transfers will only be allowed under exceptional circumstances and the imposed penalty will still be applied.';

$pdf->Write(0, 'PLEASE NOTE', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(3);

$PLEASENOTE1='Where applicable it is important to register for upcoming modules by paying the required 50 % deposit of the module fee in advance of the
scheduled starting date. The balance must be paid on commencement of the module. We encourage students to seek company sponsorship and
submit a purchase order for all modules.';
$pdf->Write(0, $PLEASENOTE1, '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(3);

$PLEASENOTE2='COURSE FEES ARE SUBJECT TO CHANGE, HOWEVER, STUDENTS PAYING FOR A NUMBER OF MODULES IN ADVANCE WILL NOT BE AFFECTED
BY INCREASED COSTS, AND ONLY THIS WILL ENSURE A RESERVED SPACE IN FUTURE MODULES SINCE THE NUMBER OF STUDENTS IS
LIMITED TO TWENTY (20). Failure to do this may result in all places being filled by students who have paid in advance.';
$pdf->Write(0, $PLEASENOTE2, '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(3);

$PLEASENOTE3='REGISTRATION IS NOT AUTOMATIC REGARDLESS OF YOUR INTENTIONS MADE ON THE REGISTRATION FORM. These terms and conditions
along with other policies governing the Institute can be found in the VTI Policies Handbook.';
$pdf->Write(0, $PLEASENOTE3, '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(3);
//Close and output PDF document
$pdf->Output('VTI_application_form.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+

?>