<?php 
include 'database.php';
session_start();
// $username = $_SESSION['username'];
$accept_id = $_SESSION['id'];
$req_id=$_POST['reqId'];

if (!empty($req_id) && !empty($accept_id)) {
	
	global $con;
	$q="update friendship set status='accepted' where req_id=$req_id AND accept_id=$accept_id";
	$result=$con->query($q);
	echo $result;
}
 ?>