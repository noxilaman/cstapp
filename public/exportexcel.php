<?php 
// Load the database configuration file 
$dbHost     = "localhost"; 
$dbUsername = "root"; 
$dbPassword = ""; 
$dbName     = "rexx20220902"; 
 
// Create database connection 
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 
 
// Check connection 
if ($db->connect_error) { 
    die("Connection failed: " . $db->connect_error); 
}
 
// Filter the excel data 
function filterData(&$str){ 
    $str = preg_replace("/\t/", "\\t", $str); 
    $str = preg_replace("/\r?\n/", "\\n", $str); 
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
} 
 
// Excel file name for download 
$fileName = "members-data_" . date('Y-m-d') . ".xls"; 
 
// Column names 
$fields = array('ID', 'FIRST NAME', 'LAST NAME', 'EMAIL', 'GENDER', 'COUNTRY', 'CREATED', 'STATUS'); 

$sqlSlot1 = "select 
stlog.id,
tu.first_name ,
tu.last_name ,
stlog.submit_date,
stlog.submit_time ,
teacher.first_name ,
teacher.last_name ,
stlog.comment_date ,
stlog.comment_time ,
tfs.section_name ,
tfq.question ,
tfq.`sequence` ,
slf2.value 
from student_logbook stlog
inner join teacher_evaluation teev 
on stlog.id = teev.student_logbook_id 
and teev.evaluation_logic <> 'false' 
left join tbm_rotation tbro
on tbro.id = stlog.rotation_id 
and tbro.course_id = 6
left join time_table_block ttb
on ttb.id = tbro.timetable_block_id 
left join time_table
on time_table.id = ttb.timetable_id 
left join tbm_user tu 
on tu.uuid = stlog.uuid 
left join tbm_user teacher 
on teacher.uuid = stlog.staff_id
left join student_logbook_field slf 
on slf.student_logbook_id = stlog.id 
left join tbm_field_list tfl 
on tfl.field_id = slf.field_id
left join student_logbook_form slf2 
on slf2.student_logbook_id = stlog.id 
left join tbm_form_question tfq 
on tfq.id = slf2.question_id 
left join tbm_form_section tfs 
on tfs.id = tfq.section_id 
left join tbm_assignment_user tau 
on tau.uuid = stlog.uuid
left join tbm_assignment ta 
on tau.id = ta.id
and ta.form_id = tfs.form_id
and ta.academic_year = '2022'
where stlog.module_id = 67
and stlog.status in ('Approved','Waiting') ";
 
// Display column names as first row 
$excelData = implode("\t", array_values($fields)) . "\n"; 
 
// Fetch records from database 
$query = $db->query($sqlSlot1); 
if($query->num_rows > 0){ 
    // Output each row of the data 
    while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id'], $row['first_name']); 
        array_walk($lineData, 'filterData'); 
        $excelData .= implode("\t", array_values($lineData)) . "\n"; 
    } 
}else{ 
    $excelData .= 'No records found...'. "\n"; 
} 
 
// Headers for download 
header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=\"$fileName\""); 
 
// Render excel data 
echo $excelData; 
 
exit;