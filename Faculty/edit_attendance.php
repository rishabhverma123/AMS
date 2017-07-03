<?php
  require "../included/connection.php"; 
   ob_start();
    session_start();
     require '../included/auth_check.php';
    $username=$_SESSION['username'];
   date_default_timezone_set('Indian/Chagos'); // CDT
  $current_date = date('r');
?>

<html>
<head>
	<title>Edit Attendence</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
		<style>
			#result{
				overflow:auto;
				height:250%;
				background-image:url(../images/1237.jpg)
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
		  #form1{
			width:40%;
			height:80%;
			padding:20px;
			margin-top:4%;
			margin-left:30%;
			z-index:10;
			background-color:white;
			opacity:0.95;
			font-size:20px;
			font-weight:1200;
			font-family:Footlight MT Light;
			border-radius:20px 20px 20px 20px;
			overflow:auto;
		}
		input[type="text"]{
			font-size:20px;
			color:blue;
			font-weight:500;
		}
		  
		  
	  </style>
	  <script>
		  var date=new Date("<?php echo $current_date ?>");
		  date.setDate(date.getDate()-10);
		  $( function() {
			$( "#date_picker" ).datepicker({minDate:date,
					   changeMonth: true, showOtherMonths: true, selectOtherMonths: true,
					   buttonImage:'http://www.snaphost.com/jquery/calendar.gif',buttonImageOnly: true});
		  } );
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
			<li class="active"><a href="faculty_after_login.php">Home</a></li>
		</ul>
			<a
				href="../included/logout.php">
				<button
					class="btn btn-danger navbar-btn navbar-right"
					data-toggle="modal"
					data-target="#">Logout &nbsp;
				</button>
			</a>
		<form id ="create"	class="navbar-form navbar-left" action="<?php echo $_SERVER['PHP_SELF']?>"	method ="POST" onsubmit="return parent.scrollTo(0,1500); return true" >
		    <div class="form-group">
				<label
					style="color:white;">Select Semester
				</label>			
				<select name="faculty-choose-semester" class="form-control" required>
						<option value="1"> 1 </option>
						<option value="2"> 2 </option>
						<option value="3"> 3 </option>
						<option value="4"> 4 </option>
						<option value="5"> 5 </option>
						<option value="6"> 6 </option>
						<option value="7"> 7 </option>
						<option value="8"> 8 </option>
				</select>
			</div>
			<button class="btn btn-default" type="submit" name="submit_sem" value="SELECT">Submit</button>
		</form>
	</div>
</nav>
<div class="container-fluid">
    <div class="row" style="height:30%;">
		<div class="col-sm-3 col-lg-2"  style="background-color:#f0ebeb;">
		  <nav class="navbar navbar-nav navbar-default navbar-fixed-side navbar-light" 
		  style="background-color:#f0ebeb;height:250%;width:100%;margin-left:0px;">
			  <ul class="nav navbar-nav">
			   <li><a href="take_attendence.php">Take Attendence</a></li>
				<li><a href="faculty_view_attendence.php">View Attendence</a></li>
				<li><a href="faculty-defaulters.php">Defaulters</a></li>
				<li><a href="edit_attendance.php">Edit Attendence</a></li>
				<li><a href="update_faculty_detail.php">Edit Details</a></li>
			  </ul>
			  </nav>
		</div>
		<div class="col-sm-9 col-lg-10" style="height:250%;overflow:auto;" id="result">
			<h3 align="center">Update Attendence</h3>
			<div id="form1">
				<form action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="form-horizontal">
					<select name="subject_code" class="form-control" placeholder="Select Subject Code" class="col">
					<option value="select"> --SELECT--</option>
					
						<?php
						
							if(isset($_POST['submit_sem']))
							{
								global $username;
								global $connection;
								$semester=$_POST['faculty-choose-semester'];
								$_SESSION['semester']=$semester;
								
								$query="SELECT * FROM `faculty-detail` WHERE `id`='".$_SESSION['username']."'";
								$run=mysqli_query($connection, $query);
								$row=mysqli_fetch_assoc($run);
								
								for($i=1;$i<9;$i++)
								{
									if($row['subject'.$i]=="")
										break;
													
									if($row['subject'.$i]!=" " || $row['subject'.$i]!="" )
									{
										$query_subject_sem_table="SELECT `id` FROM `subject_sem` WHERE `subject`='".$row['subject'.$i]."' AND `sem`='".$semester."'";
										$row_subject_sem=mysqli_query($connection,$query_subject_sem_table);
										$fetch_assoc=mysqli_fetch_assoc($row_subject_sem);
										if($fetch_assoc['id']>=1)
										{
											echo "<option value='".$row['subject'.$i]."'>".$row['subject'.$i].  "</option>";
										}
										
									}
								}
							}

						?>
					</select>
					<br/><br/>
					<select name="batch" class="form-control" placeholder="Select Batch" class="col">
						<option value="lec">	 LECTURE	</option>
						<option value="tut-t1">	 TUT-T1		</option>
						<option value="tut-t2">	 TUT-T2		</option>
						<option value="lab-t1">	 LAB-T1		</option>
						<option value="lab-t2">  LAB-T2		</option>
					</select>
					<br/><br/>
					 <input type="text" name="date" id="date_picker" class="form-control" placeholder="Select Date" class="col">
						  <br/><br/><button class="btn btn-default" type="submit" name ="submit_attendance" value ="submit">Submit</button>
				</form>

				<?php
					 global $connection;
					 global $semester;
					
					 
					 if(isset($_POST['submit_attendance']))
					{
						 $batch=$_POST['batch'];
						 $subject_code=$_POST['subject_code'];
						 $date=$_POST['date'];
						 
							if($batch=="lec"){
							$batch="Lecture";
						}
							$subject_code=strtoupper($subject_code);
							$_SESSION['subject_code']=$subject_code;
							$_SESSION['batch']=$batch;
							$_SESSION['date']=$date;
						
						
							if($_POST['batch']=="lec")
							{
								$_POST['batch']="Lecture";
							}
							header('Location:edit_attendance_form.php');
					}
				?>
			</div>
		</div>
	</div>
</div>
</body>
</html>