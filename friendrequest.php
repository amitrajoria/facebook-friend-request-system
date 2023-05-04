<?php 
include 'database.php';
session_start();
// $username=$_SESSION['username'];
$tosent_id=$_POST['reqId'];
$session_id=$_POST['ses_id'];
print_r($_POST);
if (!empty($tosent_id) && !empty($session_id)) {
	global $con;
	$q="insert into friendship(accept_id,req_id,status) values('$tosent_id','$session_id','pending')";
	$result=$con->query($q);			
	echo $result;
}
?>