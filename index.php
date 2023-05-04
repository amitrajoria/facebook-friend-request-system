<!DOCTYPE html>
<html>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Profile Page</title>
	<style>
		body{
			background-color: #ccebff;
			overflow: hidden;
		}
		.header{
			width: 580px;
			height: 40px;
			/*margin: 15px;*/
			border-bottom: 1px solid #b3e0ff;
			display: block;
			/*position: sticky;*/
			background-color: white;
		}
		.container{
			height: 100%;
			width: 600px;
			background-color: white;
			/*float: left;*/
			border: 1px solid #b3e0ff;
		      overflow-y: scroll; 
			position: absolute;
			top: 0;
		}
		 .container::-webkit-scrollbar { 
                display: none; 
            } 
		.row{
			/*width: 100%;*/
			border-bottom: 1px solid #b3e0ff;
			height: 100px;
			margin: 20px;
			
		}
		.btn{
			padding: 4px;
			float: right;
			margin-top: 20px;
			margin-left: 5px;
			/*border: 1px solid #00b3b3;*/
			font-size: 12px;
			cursor: pointer;
		}
		#close{
			float: right;
			color: gray;
			padding: 4px;
			background-color: hsl(0, 0%, 94%);
			width: 20px;

		}
		#close:hover{
			color: black;
		}
		#profile{
			width: auto;
			height: auto;
			float: right;
		}
		#req{
			width: 310px;
			height: 100%;
			background-color: white;
			display: none;
			margin-right: 50px;
			float: right;
		}
		#fri{
			width: 310px;
			height: 100%;
			background-color: white;
			display: none;
			right: 160px;
			position: absolute;
			overflow-y: scroll;
			overflow-x: hidden; 
		}
		#fri::-webkit-scrollbar { 
                display: none; 
            } 
            #mutual-friends{
            	display: none;
            }
		.req_profile{
			width: 280px;
			height: 130px;
			clear: both;
			display: block;
			position: relative;
			margin: 15px;
			border-bottom: 1px solid #b3e0ff;
			/*border:;*/
		}
		.send{
			border: 1px solid #00b3b3;
		}
		.arrow{
			width: 50px;
			float: right;
			display: block;
			position: relative;

		}
		.option{
			width: 50px;
			height: 100px;
			/*background-color: white;*/
			margin-top: -20px;
			cursor: pointer;
			display: none;
		}
		/*.arrow:hover .option{
			display: block;
		}*/
		i{
			color: #665755;
		}
		/*.Friend:hover #req{
			display: block;
		}*/
		#srch2
		{
			float: right;
			margin-top: -40px;
			border-top: none;
			border-right: none;
			border-left: none;
			border-bottom: 1px solid lightblue;
			padding: 4px;
			outline: none;
			font-size: 15px;
			display: none;
		}
		

	</style>
</head>
<body>
	<div class="container">
		<div class="header">
			<h3 style="font-family: sans-serif; color: #4d4d4d; margin: 20px;">People you may know</h3>
			<a href="#"><i class="fa fa-search" id="srch1" style="float: right; margin-top: -40px; font-size: 20px;" onclick="search()"></i></a>
			<input type="search" id="srch2" name="search" placeholder="Search..." autofocus="">
		</div>
<?php  
	session_start();
	// print_r($_SESSION);
	include 'database.php';
	include 'Node.php';
	$data=getbyEmail($_SESSION['email']);
	$_SESSION['id']=$data['id'];
	$_SESSION['img']=$data['img'];
	$_SESSION['username']=$data['username'];
	$_SESSION['city']=$data['city'];
	$session="session".$_SESSION['id'];
	$$session = new Node($_SESSION['id'], $_SESSION['username'], $_SESSION['email'], $_SESSION['city'], $_SESSION['img']);
	// print_r($_SESSION['id']);
	$friends = $$session->getFriends();
	$requests = $$session->getRequest();
	$sentRequest = sentRequestByUser($_SESSION['id']);
	$records=getAllfacebook();
	foreach ($records as $row) {
		$id=$row['id'];
		$username=$row['username'];
		$email=$row['email'];
		$city=$row['city'];
		$image=$row['img'];
		if (strcasecmp($email,$_SESSION['email'])){
			$node="id".$id;
			$$node = new Node($id, $username, $email, $city, $image);
			if (!in_array($id, $friends) && !in_array($id, $requests) && !in_array($id, $sentRequest)) {
		?>
		<div class="row" id="<?= $id;?>">
			<div>
				<img src="<?=$$node->getImg(); ?>" width="80px" height="80px" style="float: left; border-radius: 50%;">
			    <b><a href="" style="text-decoration: none; font-family: sans-serif; margin: 8px 0px 6px 22px; display: inline-block;"><?php echo ucfirst($$node->getUsername());?></a></b>
			   <?php if(!empty($$node->getCity())) { ?>
			    <span style="clear:both; display: block; position: absolute; margin-left: 100px; font-family: sans-serif; font-size: 15px;"><i class="fa fa-map-marker"></i>&nbsp;Lives in <?=  ucfirst($$node->getCity());?></span>
			<?php }
			$mutual = array_intersect($$node->getFriends(), $$session->getFriends());
			if(!empty($mutual)) {
			 ?>
			 <a href="javascript:void(0)" onclick="mutualFriends(<?php $mutual?>)" style="clear:both; display: block; position: absolute; margin-left: 100px; margin-top: 23px; font-family: sans-serif; font-size: 13px; font-weight: 600;"> <?php print_r(count($mutual)." Mutual Friends");?></a><?php }?>
			    <div id="<?=$$node->getId()."buttons";?>" class="btn" style="margin-top: 0px;">
				    <button class="btn send"onclick="Remove(<?=$$node->getId();?>)" style="background-color: #ccffff; font-family:">Remove</button>
				    <button class="btn send" id="send" onclick="Request(<?=$$node->getId()?>,<?=$_SESSION['id']?>)" style="background-color: #3b5998; color: white"><i class='fas fa-user-plus' style="color: white;"></i>&nbsp;<b>Make Friends</b></button>
			    </div>
			    <button class="btn" id="<?=$$node->getId()."req_btn";?>" style="background-color:white; display: none;border: 1px solid #00b3b3;"><i class='fas fa-user-check'></i>&nbsp;Friend request has been sent</button>

			</div>
		</div>
			<?php
			}
		
		}
	}



?>
</div>
<div id="Profile">
	<img src="<?php echo $_SESSION['img'];?>" title="<?php echo $_SESSION['username'];?>" width="70" height="70" align="right" style="border-radius: 50%;cursor: pointer;">
	<div class="arrow" align="right"><i class="fa fa-caret-down" style="font-size: 24px;margin: 20px;cursor: pointer;color: black;"></i>
		<div class="option">
			<!-- <div class="Friend"> -->
				<i class='fas fa-user-friends' title="Friend request" id="friend_request" style="margin: 14px; font-size: 20px;"></i>
				<i class='fas fa-users' title="Friends" style="margin: 14px; font-size: 20px;" onclick="friends()"></i>
			<!-- </div> -->
			<a href="logout.php"><i class="fa fa-sign-out" title="logout" style="margin: 14px; font-size: 20px;"></i></a>
		</div>
	</div>

</div>		

<?php
$friend_requests=getAllRequests($_SESSION['id']);
 ?>
<div id="req">
	<div style="border-bottom: 1px solid #b3e0ff;float: left; margin-left: 10px; margin-bottom: 10px;"><h4 style="font-family: sans-serif; color: #4d4d4d; margin: 8px;">Friend request &nbsp; (<?=$friend_requests['count'];?>)</h4></div>
	<i class="fa fa-times" onclick="close_req()" id="close"></i>
	
<?php

	$idx=0;
	foreach($friend_requests as $request) {
	   if($idx != 0) {
		$id = $request['id'];
		$username = $request['username'];
		$city = $request['city'];
		$img = $request['img'];
		$node="id".$id;
		// print_r($$node);
?>   
      <div class="req_profile" id="<?=$id?>">
		<img src="<?=$$node->getImg(); ?>" width="70px" height="70px" style="float:left; border-radius: 50%;">
		<b><a href="" style="text-decoration: none; font-family: sans-serif; margin: 5px; margin-left: 15px; display: inline-block;"><?=ucfirst($$node->getUsername());?></a></b>
		<?php if(!empty($$node->getCity())) { ?>
		  <span style="clear:both; display: block;position: absolute; margin-left: 85px; font-family: sans-serif; font-size: 15px;"><i class="fa fa-map-marker"></i>&nbsp;Lives in <?=ucfirst($$node->getCity());?></span>
		   <?php } 

			$mutual = array_intersect($$node->getFriends(), $$session->getFriends());
			if(!empty($mutual)) {
			 ?>
			 <span style="clear:both; display: block; position: absolute; margin-left: 85px; margin-top: 23px; font-family: sans-serif; font-size: 13px; font-weight: 600;"> <?php print_r(count($mutual)." Mutual Friends");?></span>
			<?php } ?>

		<div  id="<?=$id.'remove'?>" style="margin: 30px;margin-right: -0px;">
		<button class="btn" onclick="Cancel(<?=$$node->getId()?>)" style="background-color: #ccffff; padding: 6px;border: 1px solid #00b3b3;">Cancel</button>
		<button class="btn" id="conf" onclick="confirm(<?=$$node->getId()?>)" style="background-color: #3b5998; padding: 6px; color: white; margin-right: 10px;border: 1px solid #00b3b3;"><b>Confirm</b></button> </div>
		<button class="btn" id="<?=$$node->getId().'accepted'?>" style="padding: 6px; color: white; margin-right: 10px; display: none; color: blue;padding-left: 10px;padding-right: 10px;border: 1px solid #00b3b3;margin-top: 90px;"><i class="fa fa-check" style="color: red"></i>&nbsp;&nbsp;<b>Done</b></button>
				   
				
	</div>
				 
		<?php
		}
		$idx++;
	}
?>
</div>



<?php
if(!empty($friends)) {
$friend_list = implode(",", $friends);
$friends_data = getFriendsDetail($friend_list);
}
else {
	$friends_data['count'] = 0;
}
?>
<div id="fri">
	<div style="border-bottom: 1px solid #b3e0ff;float: left; margin-left: 10px; margin-bottom: 10px; position: absolute;"><h4 style="font-family: sans-serif; color: #4d4d4d; margin: 8px;">Friends &nbsp; (<?=$friends_data['count'];?>)</h4></div>
	<i class="fa fa-times" onclick="close_fri()" id="close"></i>
	<div style="margin-top: 50px;"></div>
	

<?php
$idx = 0;
foreach($friends_data as $friend) {
	if($friend['id'] != $_SESSION['id'] && $idx != 0) {
		$node="id".$friend['id'];
?>   

      <div class="req_profile" style="height: 90px;">
      	
		<img src="<?= $$node->getImg(); ?>" width="70px" height="70px" style="float:left; border-radius: 50%;">
		<b><a href="" style="text-decoration: none; font-family: sans-serif; margin: 7px; margin-left: 15px; display: inline-block;">
		 <?= ucfirst($$node->getUsername());?>
		</a></b>
		<?php if(!empty($$node->getCity())) {?>
		<span style="clear:both; display: block;position: absolute; margin-left: 85px; font-family: sans-serif; font-size: 15px;"><i class="fa fa-map-marker"></i>&nbsp;Lives in <?= ucfirst($$node->getCity());?></span>
		<?php }
			$mutual = array_intersect($$node->getFriends(), $$session->getFriends());
			if(!empty($mutual)) {
			 ?>
			 <span style="clear:both; display: block; position: absolute; margin-left: 85px; margin-top: 23px; font-family: sans-serif; font-size: 13px; font-weight: 600;"> <?php print_r(count($mutual)." Mutual Friends");?></span>
			<?php } ?>
	</div>
				 
		<?php
		}
		$idx++;	
		}
	// }
?>
</div>



<!-- mutual friends -->


<div id="mutual-friends">
	<div style="border-bottom: 1px solid #b3e0ff;float: left; margin-left: 10px; margin-bottom: 10px; position: absolute;"><h4 style="font-family: sans-serif; color: #4d4d4d; margin: 8px;">Mutual Friends</h4></div>
	<i class="fa fa-times" onclick="close_mut_fri()" id="close"></i>
	<div style="margin-top: 50px;"></div>
</div>







<script>
	function search(){
		document.getElementById("srch1").remove();
		document.getElementById("srch2").style.display="block";
	}
	$(document).ready(function() {
		$("#srch2").on("keyup",function(){
			var value=$(this).val().toLowerCase();
			$(".row ").filter(function(){
				$(this).toggle( $(this).text().toLowerCase().indexOf(value)>-1)
			});
		});
	});
	function Remove(data)
	{ 
		var data_r="#"+data;
		$(data_r).slideUp(); 
			
	}

	function Cancel(id)
	{ 
		// var x="#"+a;
		// $(x).slideUp();
		var obj=document.getElementById(id);
		$(obj).slideUp();
	}
	
	
	function friends()
	{
		document.getElementById("fri").style.display="block";
	}
	function Request(curr_id,session_id)	
	{
		var obj=document.getElementById(curr_id+"buttons");
		$(obj).hide();
		document.getElementById(curr_id+"req_btn").style.display="block";
		// alert(username);
		$.ajax({
			url:'friendrequest.php',
			type:'POST',
			data:{reqId:curr_id, ses_id:session_id},

			success: function(result){
				// alert(result);
				console.log(result);
			}
		});
	}
	function confirm(id)
	{
		document.getElementById(id+"remove").remove();
		document.getElementById(id+"accepted").style.display="block";
		$.ajax({
			url:'confirmrequest.php',
			type:'POST',   
			data:{reqId:id},

			success: function(result){
				console.log(result);
			}
		});
	}

	 function close_req() {
		document.getElementById("req").style.display = "none";
	 }
	
	function close_fri() {
		  document.getElementById("fri").style.display = "none";
	 }

	 function close_mut_fri() {
		  document.getElementById("mutual-friends").style.display = "none";
	 }		
	
	 function mutualFriends(data) {
	 	// $("#mutual-friends").toggle();
	 	// alert(data);
	 }

	$(document).ready(function() {
		$(".arrow").on("click",function() {
			$(".option").toggle();
		});	
		$("#friend_request").on("click",function(){
			$("#req").toggle();
		});
	}); 
</script>	
</body>
</html>