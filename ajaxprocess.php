<?php
session_start();
include('config.php');
include('fun.php');
$msg="";
if( !(isset($_SESSION['userID'])) ){
	header('Location: index.php');
}
$uid=$_SESSION['userID'];
$age=$_SESSION['age'];

if(isset( $_POST['post'] )){
	//print_r($_POST);die;
	$pt=$_POST['post'];
	date_default_timezone_set("Asia/Kolkata");
	$dt=date('Y-m-d H:i:s');	
	if($age<18){
	$sql = "INSERT INTO `posts` ( `post`, `pt`, `uid`) VALUES ('$pt', '$dt', '$uid')";
	if(mysqli_query($conn, $sql)) {  $last_id = mysqli_insert_id($conn);?>
		
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
				   <section class="post-heading">
						<div class="row">
							<div class="col-md-11">
								<div class="media">
								  <div class="media-left">
									<a href="#">
									  <img class="media-object photo-profile" src="<?php echo getUserpic($conn,$uid)?>" width="40" height="40" alt="...">
									</a>
								  </div>
								  <div class="media-body">
									<a href="#" class="anchor-username"><h4 class="media-heading"><?php echo getUserName($conn,$uid)?></h4></a> 
									<a href="#" class="anchor-time"><?php echo $dt; ?></a>
								  </div>
								</div>
							</div>
							 <div class="col-md-1">
								<button title="Delete" class="postdelbtn btn btn-xs btn-danger" value="<?php echo $last_id; ?>"><i class="glyphicon glyphicon-trash"></i>
							 </div>
						</div>             
				   </section>
				   <section class="post-body">
					   <?php echo $pt; ?>
				   </section>
				   <section class="post-footer">
					   <hr>
					   <div class="post-footer-option">
							<ul class="list-unstyled">
							
							</ul>
					   </div>
				   </section>
				</div>
			</div>
		</div>
		
		
	<?php } else {
		echo "Error: " . $sql. "<br>" . mysqli_error($conn);
	}
}
if($age>=18 AND $age<25){
	$sql = "INSERT INTO `posts1` ( `post`, `pt`, `uid`) VALUES ('$pt', '$dt', '$uid')";
	if(mysqli_query($conn, $sql)) {  $last_id = mysqli_insert_id($conn);?>
		
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
				   <section class="post-heading">
						<div class="row">
							<div class="col-md-11">
								<div class="media">
								  <div class="media-left">
									<a href="#">
									  <img class="media-object photo-profile" src="<?php echo getUserpic($conn,$uid)?>" width="40" height="40" alt="...">
									</a>
								  </div>
								  <div class="media-body">
									<a href="#" class="anchor-username"><h4 class="media-heading"><?php echo getUserName($conn,$uid)?></h4></a> 
									<a href="#" class="anchor-time"><?php echo $dt; ?></a>
								  </div>
								</div>
							</div>
							 <div class="col-md-1">
								<button title="Delete" class="postdelbtn btn btn-xs btn-danger" value="<?php echo $last_id; ?>"><i class="glyphicon glyphicon-trash"></i>
							 </div>
						</div>             
				   </section>
				   <section class="post-body">
					   <?php echo $pt; ?>
				   </section>
				   <section class="post-footer">
					   <hr>
					   <div class="post-footer-option">
							<ul class="list-unstyled">
							
							</ul>
					   </div>
				   </section>
				</div>
			</div>
		</div>
		
		
	<?php } else {
		echo "Error: " . $sql. "<br>" . mysqli_error($conn);
	}
}
if($age>25){
	$sql = "INSERT INTO `posts2` ( `post`, `pt`, `uid`) VALUES ('$pt', '$dt', '$uid')";
	if(mysqli_query($conn, $sql)) {  $last_id = mysqli_insert_id($conn);?>
		
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">
				   <section class="post-heading">
						<div class="row">
							<div class="col-md-11">
								<div class="media">
								  <div class="media-left">
									<a href="#">
									  <img class="media-object photo-profile" src="<?php echo getUserpic($conn,$uid)?>" width="40" height="40" alt="...">
									</a>
								  </div>
								  <div class="media-body">
									<a href="#" class="anchor-username"><h4 class="media-heading"><?php echo getUserName($conn,$uid)?></h4></a> 
									<a href="#" class="anchor-time"><?php echo $dt; ?></a>
								  </div>
								</div>
							</div>
							 <div class="col-md-1">
								<button title="Delete" class="postdelbtn btn btn-xs btn-danger" value="<?php echo $last_id; ?>"><i class="glyphicon glyphicon-trash"></i>
							 </div>
						</div>             
				   </section>
				   <section class="post-body">
					   <?php echo $pt; ?>
				   </section>
				   <section class="post-footer">
					   <hr>
					   <div class="post-footer-option">
							<ul class="list-unstyled">
							
							</ul>
					   </div>
				   </section>
				</div>
			</div>
		</div>
		
		
	<?php } else {
		echo "Error: " . $sql. "<br>" . mysqli_error($conn);
	}
}
}

if(isset( $_POST['searchterm'] )){
	if($age<18){
	$st=$_POST['searchterm'];
	$sql = "SELECT * FROM `users` WHERE `username` LIKE ('%$st%')";
	$result=mysqli_query($conn, $sql);
	$num=mysqli_num_rows($result);
	if($num>0){
		while($row=mysqli_fetch_assoc($result)){ ?>
			<div class="autocomplete-suggestion">
				<a href="profile.php?userid=<?php echo $row['uid']; ?>"><?php echo $row['username']; ?></a>
			</div>
	<?php	}
	}else{ ?>
		<div class="autocomplete-suggestion">No Result Found</div>
	<?php }
	}
		if($age>=18 AND $age<25){
	$st=$_POST['searchterm'];
	$sql = "SELECT * FROM `users1` WHERE `username` LIKE ('%$st%')";
	$result=mysqli_query($conn, $sql);
	$num=mysqli_num_rows($result);
	if($num>0){
		while($row=mysqli_fetch_assoc($result)){ ?>
			<div class="autocomplete-suggestion">
				<a href="profile.php?userid=<?php echo $row['uid']; ?>"><?php echo $row['username']; ?></a>
			</div>
	<?php	}
	}else{ ?>
		<div class="autocomplete-suggestion">No Result Found</div>
	<?php }
	}
		if($age>25){
	$st=$_POST['searchterm'];
	$sql = "SELECT * FROM `users2` WHERE `username` LIKE ('%$st%')";
	$result=mysqli_query($conn, $sql);
	$num=mysqli_num_rows($result);
	if($num>0){
		while($row=mysqli_fetch_assoc($result)){ ?>
			<div class="autocomplete-suggestion">
				<a href="profile.php?userid=<?php echo $row['uid']; ?>"><?php echo $row['username']; ?></a>
			</div>
	<?php	}
	}else{ ?>
		<div class="autocomplete-suggestion">No Result Found</div>
	<?php }
	}
}

if(isset( $_POST['piddelete'] )){
	
	$pid=$_POST['piddelete'];
	if($age<18){
	$q="DELETE from posts where pid='$pid' and uid='$uid'";
	if(mysqli_query($conn, $q)){
		echo "Post Deleted";
	} else {
		echo "Error: " . $q. "<br>" . mysqli_error($conn);
	}
	}
	if($age>=18 AND $age<=25){
	$q="DELETE from posts1 where pid='$pid' and uid='$uid'";
	if(mysqli_query($conn, $q)){
		echo "Post Deleted";
	} else {
		echo "Error: " . $q. "<br>" . mysqli_error($conn);
	}
	}
	if($age>25){
	$q="DELETE from posts2 where pid='$pid' and uid='$uid'";
	if(mysqli_query($conn, $q)){
		echo "Post Deleted";
	} else {
		echo "Error: " . $q. "<br>" . mysqli_error($conn);
	}
	}
}
if(isset( $_POST['pidlike'] )){
	$pid=$_POST['pidlike'];
	if($age<18){
	$sql = "INSERT INTO `likes` (`pid`, `uid`) VALUES ('$pid','$uid')";
	if(mysqli_query($conn, $sql)) {
		echo "Liked";
	} else {
		echo "Error: " . $q. "<br>" . mysqli_error($conn);
	}
	}
	if($age>=18 AND $age<=25){
	$sql = "INSERT INTO `likes1` (`pid`, `uid`) VALUES ('$pid','$uid')";
	if(mysqli_query($conn, $sql)) {
		echo "Liked";
	} else {
		echo "Error: " . $q. "<br>" . mysqli_error($conn);
	}
	}
	if($age>25){
	$sql = "INSERT INTO `likes2` (`pid`, `uid`) VALUES ('$pid','$uid')";
	if(mysqli_query($conn, $sql)) {
		echo "Liked";
	} else {
		echo "Error: " . $q. "<br>" . mysqli_error($conn);
	}
	}
}

?>