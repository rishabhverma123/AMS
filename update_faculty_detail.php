<?php
	require "connection.php";
	session_start();
	require 'auth_check.php';
	global $connection;
	if(isset($_SESSION['username'])) 
	{
		$username= $_SESSION['username'];
		
		$query="SELECT * FROM `faculty-detail` WHERE `id`='".$username."'";
		$result= mysqli_query($connection,$query);
	 
		while( $row= mysqli_fetch_assoc($result))
		{
			//$id=test_input($row["id"]);
			$name=test_input($row["name"]);
			$mobile=test_input($row["mobile"]);
			$email=test_input($row["email"]);
			$password=test_input($row["password"]);
			$subject1=test_input($row["subject1"]);
			$subject2=test_input($row["subject2"]);
			$subject3=test_input($row["subject3"]);
			$subject4=test_input($row["subject4"]);
			$subject5=test_input($row["subject5"]);
			$subject6=test_input($row["subject6"]);
			$subject7=test_input($row["subject7"]);
			$subject8=test_input($row["subject8"]);
			
			if($subject1=="NULL")
				$subject1="";
			
			if($subject2=="NULL")
				$subject2="";
				
			if($subject3=="NULL")
				$subject3="";
			
			if($subject4=="NULL")
				$subject4="";
			
			if($subject5=="NULL")
				$subject5="";
			
			if($subject6=="NULL")
				$subject6="";
			
			if($subject7=="NULL")
				$subject7="";
			
			if($subject8=="NULL")
				$subject8="";
		}
		
		if(isset($_POST['submit-faculty-registration']))
		{
			$name=test_input($_POST["name"]);
			$mobile=test_input($_POST["mobile"]);
			$email=test_input($_POST["email"]);
			$password=test_input($_POST["password"]);
			$subject1=test_input($_POST["subject1"]);
			$subject2=test_input($_POST["subject2"]);
			$subject3=test_input($_POST["subject3"]);
			$subject4=test_input($_POST["subject4"]);
			$subject5=test_input($_POST["subject5"]);
			$subject6=test_input($_POST["subject6"]);
			$subject7=test_input($_POST["subject7"]);
			$subject8=test_input($_POST["subject8"]);
			
			$query="UPDATE `faculty-detail` SET `name`='".$name."' , `mobile`='".$mobile."' , `email`='".$email."' , `subject1`='".$subject1."' , `subject2`='".$subject2."' , `subject3`='".$subject3."' , `subject3`='".$subject3."' , `subject4`='".$subject4."' , `subject5`='".$subject5."' , `subject6`='".$subject6."' , `subject7`='".$subject7."' , `subject8`='".$subject8."' WHERE `id`='".$username."'";
			
			$run=mysqli_query($connection,$query);
			if(mysqli_affected_rows($connection))
			{
				echo "<script type='text/javascript'>
				alert('RESULT SUCCESFULY UPDATED')
				</script>";
			}
		}
		
	}
			
	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}
?>
<html>
	<head>
	<title>UPDATE DETAIL</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<style>
	  .sidebar-nav {
		  
		margin-left:-10%;
		padding: 0;
		height:100%;
		width:100%;
		font-size:10px;
	  }
	  .sidebar-nav .navbar ul {
		float: none;
		display: block;
	  }
	  .sidebar-nav .navbar li {
		float: none;
		display: block;
	  }
	  .sidebar-nav .navbar li a {
		padding-top: 20px;
		padding-bottom: 20px;
	  }
	   a:hover{
		  background-color:green;
	  }


	  .carousel-inner > .item > img,
	  .carousel-inner > .item > a > img {
		  width: 100%;
		  margin:0;
		  height:100%;
	  }
	  #caption{
		  font-size:50px;
		  position:absolute;
		  top:20%;
		  font-weight:700;
		  font-family:Times new roman;
		  
	  }
	  caption1{
		  font-size:20px;
		  margin-top:10px;	  
		  }
	  #form{
		  margin-left:10%;
		  padding:15%;
		  overflow-y:auto;
	  }
	  #button{
		  width:100%;
	  }
	  #header
	  {}
	  a{
		  font-family:calibri;
		  font-size:20px;
	  }
	  #remark{
		  color:red;
	  }
	  #view{
		  background-color:white;
		  width:100%;
		  margin-top:10%;
	  }
	  #table{
		  margin-top:0;
	  }
	  h2{
		  color:#76323F;
	  }
	  li{
		  font-size:15px;
	  }
	  #nav{
		  font-size:15px;
		  color:black;
		  
	  }
	  label{
		  color:black;
	  }
	  #form{
		font-size:15px;
		font-weight:600;
		font-family:Footlight MT Light;
		padding:50px;
		margin-top:2%;
		margin-bottom:2%;
		margin-left:20%;
		width:60%;
		height:230%;
		color:black;
		text-align:left;
		border-radius:20px 20px 20px 20px;
		overflow:auto;
		background-color:white;
		opacity:0.8;
	}
	#back{
		background-image:url(images/20a.jpg);
		
	}
	#button{
		margin-left:30%;
		width:40%;
	}
	  
	  
	  
	  </style>
	  <script>
		 $('#SELECT').submit(function() { // catch the form's submit event
			$.ajax({ // create an AJAX call...
				data: $(this).serialize(), // get the form data
				type: $(this).attr('method'), // GET or POST
				url: $(this).attr('action'), // the file to call
				success: function(response) { // on success..
					$('#result').html(response); // update the DIV
				}
			});
			return false; // cancel original event to prevent form submitting
		});
		  }
	  </script>
	  </head>
	<body>
		<?php include_once("bundelkhand_header.html"); ?>

		<nav class="navbar navbar-inverse" style="margin-bottom:0px;padding-left:0px;padding-top:0px;">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Attendance Management System</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="faculty_after_login.php">Home</a></li>
				</ul>

				<a	href="logout.php">
					<button	class="btn btn-danger navbar-btn navbar-right"	data-toggle="modal"	data-target="#">Logout &nbsp;</button>
				</a>

			</div>
		</nav>
		<div class="container-fluid">
			<div class="row" style="height:30%;">
			  <div class="col-sm-3 col-lg-2"  style="background-color:#f0ebeb;">
				<nav class="navbar navbar-nav navbar-default navbar-fixed-side navbar-light"   style="background-color:#f0ebeb;height:250%;width:100%;margin-left:0px;">
					  <ul class="nav navbar-nav">
					  <li><a href="take_attendence.php">Take Attendence</a></li>
					  <li><a href="faculty_view_attendence.php">View Attendence</a></li>
					  <li><a href="faculty-defaulters.php">Defaulters</a></li>
					  <li><a href="edit_attendance.php">Edit Attendence</a></li>
					  <li><a href="update_faculty_detail.php">Edit Details</a></li>
					</ul>
				</nav>
			  </div>
				<div class="col-sm-9 col-lg-10" id="back">
					<div id="form">	 
						<form action="<?php echo $_SERVER['PHP_SELF']?>" method='POST' class="form-horizontal" style="width:300px;margin:auto;padding-top:20px;">
							 
								 
							<div class="form-group">
								<label class="control-label col-sm-4">NAME&nbsp;<span id="remark">*</span></label>
								<div class="col-sm-8">
									<input type='text' name='name' value=" <?php echo $name; ?> " class="form-control" required>
								</div>
							</div>

								
							<div class="form-group">
								<label class="control-label col-sm-4 ui-hidden-accessible">MOBILE&nbsp;<span id="remark">*</span></label>
								<div class="col-sm-8">
								<input type='text' pattern='[7 8 9][0-9]{9}' value=" <?php echo $mobile; ?> " name='mobile' class="form-control" required placeholder='9990008990-----10 digits'></div>
							</div>


							<div class="form-group">
								<label class="control-label col-sm-4 ui-hidden-accessible">EMAIL&nbsp;<span id="remark">*</span></label>
								<div class="col-sm-8">
								<input type="email" name='email' value=" <?php echo $email; ?> " class="form-control" required placeholder='aa@gmail.com'></div>
							</div>


							<div class="form-group">
								<label class="control-label col-sm-4 ui-hidden-accessible">PASSWORD&nbsp;<span id="remark">*</span></label> 
								<div class="col-sm-8">
								<input type='password' name='password' value=" <?php echo $password; ?> " class="form-control" required></div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4 ui-hidden-accessible">SUBJECT1&nbsp;<span id="remark">*</span></label> 
								<div class="col-sm-8">
								<input type='text' name='subject1' value=" <?php echo $subject1; ?> " class="form-control" required>
								</div>
							</div>

																
							<div class="form-group">
								<label class="control-label col-sm-4" >SUBJECT2:</label> 
								<div class="col-sm-8">
								<input type='text' name='subject2' value=" <?php echo $subject2; ?> " class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4" >SUBJECT3:</label>
								 <div class="col-sm-8">
									<input type='text' name='subject3' value=" <?php echo $subject3; ?> " class="form-control">
								 </div>
							</div>

							 
							<div class="form-group">
								<label class="control-label col-sm-4" >SUBJECT4:</label>
								<div class="col-sm-8">
								<input type='text' name='subject4' value=" <?php echo $subject4; ?> " class="form-control">
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-sm-4" >SUBJECT5:</label>
								<div class="col-sm-8">
								<input type='text' name='subject5' value=" <?php echo $subject5; ?> " class="form-control">
								</div>
							</div>
									
							<div class="form-group">
								<label class="control-label col-sm-4" >SUBJECT6:</label>
								<div class="col-sm-8">
								<input type='text' name='subject6' value=" <?php echo $subject6; ?> " class="form-control">
								</div>
							</div>
											
											 
							<div class="form-group">
								<label class="control-label col-sm-4" >SUBJECT7:</label> 
								<div class="col-sm-8">
								<input type='text' name='subject7' value=" <?php echo $subject7; ?> " class="form-control">
								</div>
							</div>
														
														
							<div class="form-group">
								<label class="control-label col-sm-4" >SUBJECT8:</label> 
								<div class="col-sm-8">
								<input type='text' name='subject8' value=" <?php echo $subject8; ?> " class="form-control">
								</div>
							</div>
																		
							<button class="button btn-default" id="button" type="submit" name ='submit-faculty-registration' value ="submit">Submit</button>
															
						</form>
						
						<br/><span id="remark" style="margin-left:150px;">*Fields are necessary</span>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>