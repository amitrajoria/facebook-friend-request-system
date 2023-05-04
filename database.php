<?php
$con=new mysqli("localhost","root","","assignment");
if (!$con) {
	die("Connection Failed..");
}
function getAllfacebook()
{
	global $con;
	$records=[];
	$record=[];
	$q="select * from facebook";
	$result=$con->query($q);
	while ($row=$result->fetch_assoc()) {
		$record['id']=$row['id'];
		$record['username']=$row['username'];
		$record['email']=$row['email'];
		$record['city']=$row['city'];
		$record['img']=$row['img'];
		
		array_push($records, $record);
	}
	return $records;
}

function getAllfriendship()
{
	global $con;
	$records=[];
	$record=[];
	$q="select * from friendship";
	$result=$con->query($q);
	while ($row=$result->fetch_assoc()) {
		$record['id']=$row['id'];
		$record['accept_id']=$row['accept_id'];
		$record['accept_name']=$row['accept_name'];
		$record['req_name']=$row['req_name'];
		$record['status']=$row['status'];
		
		array_push($records, $record);
	}
	return $records;
}

function getAllRequests($id) {
	global $con;
	$records=[];
	$record=[];
	$q="SELECT facebook.id, facebook.username, facebook.city, facebook.img FROM friendship JOIN facebook ON friendship.req_id = facebook.id WHERE friendship.accept_id=$id AND friendship.status='pending';";
	$result=$con->query($q);
	$records['count'] = mysqli_num_rows($result);
	while ($row=$result->fetch_assoc()) {
		$record['id']=$row['id'];
		$record['username']=$row['username'];
		$record['city']=$row['city'];
		$record['img']=$row['img'];
		
		array_push($records, $record);
	}
	return $records;
}

function friendsOfUser($id) {

	global $con;
	$records=[];
	$record=[];
	$q = "SELECT req_id as people from friendship WHERE accept_id=$id AND status='accepted' UNION SELECT accept_id FROM friendship WHERE req_id=$id AND status='accepted'";
	$result=$con->query($q);
	$index=0;
	while ($row=$result->fetch_assoc()) {
		 $record[$index++]=$row['people'];
	}
	// print_r($record);
	return $record;
	
}

function requestsOfUser($id) {

	global $con;
	$record=[];
	$q = "SELECT req_id as people FROM friendship JOIN facebook ON friendship.req_id = facebook.id WHERE friendship.accept_id=$id AND friendship.status='pending'";
	$result=$con->query($q);
	$index=0;
	while ($row=$result->fetch_assoc()) {
		$record[$index++]=$row['people'];
	}
	return $record;
	
}

function sentRequestByUser($id) {
	global $con;
	$record=[];
	$q = "SELECT accept_id FROM friendship WHERE req_id=$id AND status='pending'"; 
	$result=$con->query($q);
	$index=0;
	while ($row=$result->fetch_assoc()) {
		 $record[$index++]=$row['accept_id'];
	}
	return $record;
}

function getFriendsDetail($friend_list) {
	global $con;
	$records=[];
	$record=[];
	$q = "select * from facebook where id IN ($friend_list)";
	$result=$con->query($q);
	$records['count'] = mysqli_num_rows($result);
	while ($row=$result->fetch_assoc()) {
		$record['id']=$row['id'];
		$record['username']=$row['username'];
		$record['email']=$row['email'];
		$record['city']=$row['city'];
		$record['img']=$row['img'];
		
		array_push($records, $record);
	}
	return $records;
}

function getbyEmail($email)
{
	global $con;
	$record=[];
	$q="select * from facebook where email='$email'";
	$result=$con->query($q);
	while ($row=$result->fetch_assoc()) {
		$record['id']=$row['id'];
		$record['username']=$row['username'];
		$record['email']=$row['email'];
		$record['city']=$row['city'];
		$record['img']=$row['img'];
	}
	return $record;
}


// function getbyId($friend_id)
// {
// 	global $con;
// 	$records=[];
// 	$record=[];
// 	$q="select * from facebook where id='$friend_id'";
// 	$result=$con->query($q);
// 	while ($row=$result->fetch_assoc()) {
// 		$record['id']=$row['id'];
// 		$record['username']=$row['username'];
// 		$record['email']=$row['email'];
// 		$record['city']=$row['city'];
// 		$record['img']=$row['img'];
		
// 		array_push($records, $record);
// 	}
// 	return $records;
// }


// function getId($session)
// {
// 	global $con;
// 	$records=[];
// 	$record=[];
// 	$q="select * from facebook where username='$session'";
// 	$result=$con->query($q);
// 	while($row=$result->fetch_assoc()) 
// 	{
// 		$record['id']=$row['id'];
// 		$record['city']=$row['city'];
// 		$record['img']=$row['img'];
// 		array_push($records, $record);
// 	}
// 	return $records;
// }
// function ship_id($id)
// {
// 	global $con;
// 	$records=[];
// 	$record=[];
// 	$q="select * from friendship where accept_id=$id";
// 	$result=$con->query($q);
// 	while($row=$result->fetch_assoc()) 
// 	{
// 		$record['id']=$row['id'];
// 		// $record['accept_name']=$row['accept_name'];
// 		$record['req_name']=$row['req_name'];
// 		$record['status']=$row['status'];
// 		array_push($records, $record);
// 	}
// 	return $records;
// }

// function getFriends($id)
// {
// 	global $con;
// 	$records=[];
// 	$record=[];
// 	$q="select * from friendship where accept_id=$id OR req_id=$id";
// 	$result=$con->query($q);
// 	while($row=$result->fetch_assoc()) 
// 	{
// 		// $record['id']=$row['id'];
// 		$record['accept_name']=$row['accept_name'];
// 		$record['req_name']=$row['req_name'];
// 		$record['status']=$row['status'];
// 		array_push($records, $record);
// 	}
// 	return $records;
// }
// function ship_name($id)
// {
// 	global $con;
// 	$records=[];
// 	$record=[];
// 	$q="select * from friendship where req_id=$id";
// 	$result=$con->query($q);
// 	while($row=$result->fetch_assoc()) 
// 	{
// 		$record['accept_id']=$row['accept_id'];
// 		$record['status']=$row['status'];
// 		array_push($records, $record);
// 	}
// 	return $records;
// }
// function ship_name2($id)
// {
// 	global $con;
// 	$records=[];
// 	$record=[];
// 	$q="select * from friendship where accept_id=$id";
// 	$result=$con->query($q);
// 	while($row=$result->fetch_assoc()) 
// 	{
// 		$record['req_id']=$row['req_id'];
// 		array_push($records, $record);
// 	}
// 	return $records;
// }
// function friend_name($session)
// {
// 	global $con;
// 	$records=[];
// 	$record=[];
// 	$q="select id from friendship where req_name='$session'";
// 	$result=$con->query($q);
// 	while($row=$result->fetch_assoc()) 
// 	{
// 		$record['id']=$row['id'];
// 		array_push($records, $record);
// 	}
// 	return $records;
// }
?>