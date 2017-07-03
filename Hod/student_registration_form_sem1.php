<?php
	require "../included/connection.php";
	session_start();

	$current_semester=$_SESSION['registration_semester'];

	if(isset($_POST['submit-student-registration']))
	{
		$rollnumber=test_input($_POST['rollnumber']);
		$name=test_input($_POST['name']);
		$phone_number=test_input($_POST['phone_number']);
		$email=test_input($_POST['email']);
		$guardian_ph_no=test_input($_POST['guardian_ph_no']);
		$group=strtolower(test_input($_POST['group']));


		if(!empty($rollnumber) &&!empty($name) &&!empty($phone_number) &&!empty($email) &&!empty($guardian_ph_no) && !empty($group))
		{

			$query_1="INSERT INTO `name-roll` (rollnumber,name) VALUES ('".$rollnumber."','".$name."')";
			$result=mysqli_query($connection,$query_1);

			$query_2="INSERT INTO `student-detail` (`rollnumber`,`group-batch`,`phonenumber`,`email`,`guardianphone`,`current_semester`) VALUES ('".$rollnumber."','".$group."','".$phone_number."','".$email."','".$guardian_ph_no."','".$current_semester."')";
			$result=mysqli_query($connection,$query_2);

			$query_insert_in_attendence_table="INSERT INTO `attendence-semester-".$current_semester."`(rollnumber) VALUES ('".$rollnumber."')";
			$query3_run=mysqli_query($connection,$query_insert_in_attendence_table);
			if($query3_run)
			{
				
				echo "<script type='text/javascript'>
				alert('REGISTRATION SUCCESSFUL')
				</script>";
			}else
			{
				echo "<script type='text/javascript'>
				alert('Registration Denied')
				</script>";
			}
			
		}
		else
		{
			echo "<script type='text/javascript'>
			alert('IT IS COMPULSORY TO FILL ALL THE ENTRIES')
			</script>";
		}
	}	


	function test_input($data) 
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}


	if(isset($_POST['submit']) && isset($_POST['hod-choose-semester']))
	{
		$semester=$_POST['hod-choose-semester'];
		student_registration($semester);
	}

	function student_registration($semester)
	{
		$_SESSION['registration_semester']=$semester;
		if($semester==1)
		{
			header('Location:student_registration_form_sem1.php');
		}
		else
		{
			header('Location:student_registration_form_sem1.php');
		}

	}
	
?>


<html>
	<head>
		<title>Student Registration</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
		<style>
			#result{
			overflow:auto;
			height:230%;
			background-image:url(../images/pencil3.jpg);
			}
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
			#div{
			background-image:url(images/texture6.jpg);width:1400px;height:1600px;
			}
			
			#form1{
			padding:50px;
			margin-top:20px;
			margin-left:200px;
			width:600px;
			height:600px;
			color:black;
			text-align:left;
			background-color:white;
			font-weight:700;
			font-size:15px;
			opacity:0.8;
			border-radius:20px 20px 20px 20px;
			}
			
			#para{
			width:1000px;
			height:70px;
			background-color:#D9853B;
			text-align:center;
			font-size:30px;
			color:white;
			font-weight:700;
			padding:15px;
			font-family:Footlight MT Light;
			}
			
			#remark1{
			color:black;
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
		<div>

			<?php include_once("../included/bundelkhand_header.html");?>
			
			<nav class="navbar navbar-inverse" style="margin-bottom:0px;padding-left:0px;padding-top:0px;">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Attendance Management System</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
				<li class="active"><a href="hod_after_login.php">Home</a></li>
				</ul>
				<button class="btn btn-danger navbar-btn navbar-right" data-toggle="modal" data-target="#">Logout</button>
				<form id ="create" class="navbar-form navbar-left" action="<?php echo $_SERVER['PHP_SELF']?>" method ="POST" onsubmit="return parent.scrollTo(0,1500); return true" >
				  <div class="form-group">
						<label style="color:white;"> Select Semester </label>			
						<select name="hod-choose-semester" class="form-control" required>
					
							<option value="1"> 1  </option>
							<option value="2"> 2 </option>
							<option value="3"> 3 </option>
							<option value="4"> 4 </option>
							<option value="5"> 5 </option>
							<option value="6"> 6 </option>
							<option value="7"> 7 </option>
							<option value="8"> 8 </option>

						</select>
				   </div>
					<button class="btn btn-default" type="submit" name="submit" value="SELECT">Submit</button>
				</form>
			</div>
			</nav>
			<div class="container-fluid">
			  <div class="row" style="height:30%;">
				<div class="col-sm-3 col-lg-2"  style="background-color:#f0ebeb;">
				  <nav class="navbar navbar-nav navbar-default navbar-fixed-side navbar-light"  style="background-color:#f0ebeb;height:250%;width:100%;margin-left:0px;">
					  <ul class="nav navbar-nav">
						<li><a href="faculty_detail.php">Faculty Details</a></li>
						<li><button class="btn navbar-btn btn-link" data-toggle="modal" data-target="#modal1" style="text-decoration:none;font-size:16px;">Faculty Registration</button></li>
						<li><a href="student_details.php">Student Details</a></li>
						<li><a href="student_reg.php">Student Registration</a></li>
						<li><a href="view_att.php">View Attendance</a></li>
						<li><a href="defaulters.php">Defaulters</a></li>
						<!--<li><a href="medical_leave_hod.php">Medical leave</a></li>-->
						<li><a href="upload_notice_hod.php">Upload notice</a></li>
					  </ul>
					</nav>
				</div>
				<div class="col-sm-9 col-lg-10" style="height:250%;overflow:auto;" id="result">
					<h2 style="color:black" align="center">Student Registration</h2><hr style="color:black;"/>
					</hr></br></br>
					<div id="form1">
						<form  action="<?php echo $_SERVER["PHP_SELF"]?>" method="POST" class="form-horizontal">
							<div class="form-group"> 					
								<label id="remark1" class="control-label col-sm-4">&nbsp;Rollnumber:</label>
								<div class="col-sm-8">
								<input type='text' name='rollnumber' class="form-control" required> <br/>
								</div>
							</div>
							<div class="form-group"> 
								<label id="remark1" class="control-label col-sm-4">&nbsp;Name:</label>
								<div class="col-sm-8">
								<input type='text' name='name' class="form-control" required> <br/>
								</div>
							</div>
							<div class="form-group">
								<label id="remark1" class="control-label col-sm-4">&nbsp;10 digit phone-number</label>
								<div class="col-sm-8">
								<input type='text' pattern='[789][0-9]{9}' name='phone_number' class="form-control" required> <br/>
								</div>
							</div>
							<div class="form-group"> 
								<label id="remark1" class="control-label col-sm-4">&nbsp;E-Mail:</label>
								<div class="col-sm-8">
								<input type="email" name='email' class="form-control" required> <br/>
								</div>
							</div>
							<div class="form-group"> 
								<label id="remark1" class="control-label col-sm-4">&nbsp;Guardian Ph No.:</label>
								<div class="col-sm-8">
								<input type='text' pattern='[789][0-9]{9}' name='guardian_ph_no' class="form-control" required> <br/>
								</div>
							</div>
							
							<div class="form-group">
								<label id="remark1" class="control-label col-sm-4">&nbsp;GROUP :</label>
								<div class="col-sm-8">
								<input type='text' class="form-control" name='group' placeholder='T1 / T2' required> 
								</div>
							</div>
							<button class="btn btn-default" type="submit" name ='submit-student-registration' value ="submit">	Submit </button>
						</form>
					</div>
				</div>		
			  </div>
			</div>	

			<?php include_once("inclusior-faculty-registration-form.html");?>
			 
						
		</div>			
	</body>
</html>
