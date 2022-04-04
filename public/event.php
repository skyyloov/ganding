<?php
include_once("db_connect.php");
$sqlEvents = "SELECT id, no_po_supplier, start_date, end_date, qty1, qty2 FROM rencana ";
$resultset = mysqli_query($conn, $sqlEvents) or die("database error:". mysqli_error($conn));
$calendar = array();
while( $rows = mysqli_fetch_assoc($resultset) ) {	
	// convert  date to milliseconds
	$start = strtotime($rows['start_date']) * 1000;
	$end = strtotime($rows['end_date']) * 1000;	
	$calendar[] = array(
        'id' =>$rows['id'],
        'title' => $rows['no_po_supplier'],
        'url' => "#",
		"class" => 'event-important',
        'start' => "$start",
        'end' => "$end",
        'qty1' => $rows['qty1'],
        'qty2' => $rows['qty2']
    );
}
$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
echo json_encode($calendarData);
exit;
?>