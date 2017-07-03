<?php
  session_start();
   ob_start();
    require '../included/connection.php';
     require '../included/auth_check.php';
     global $connection;
    $query="SELECT `startsem` FROM `start-sem` WHERE `id`=1";
   $query_run=mysqli_query($connection, $query);
  $result=mysqli_fetch_assoc($query_run);
?>

<html>
  <head>
	<title>Student Registration</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
		<style>
			#result{
				background-image:url(../images/pencil1.jpg);
				height:230%;
			}
		  .sidebar-nav {
			  
			margin-left:-10%;
			padding: 0;
			height:100%;
			width:100%;
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
			  color:white;
		  }
		  label{
			  color:black;
			  font-family:calibri;
			  font-size:16px;
			  font-weight:50;
		  }
		</style>
	  <script>
		  window.onbeforeunload=function(){
			  window.scrollTo(0,500);
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

						<a href="../included/logout.php">
							<button	class="btn btn-danger navbar-btn navbar-right"	data-toggle="modal"	data-target="#">Logout &nbsp;</button>
						</a>

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
					  <nav class="navbar navbar-nav navbar-default navbar-fixed-side navbar-light" 
					  style="background-color:#f0ebeb;height:230%;width:100%;margin-left:0px;">
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
					<div class="col-sm-9 col-lg-10" id="result">
						<h1 align="center" style="color:white;">Student Registration</h1>
						<h2 align="center" style="color:white;margin-top:10%;">To register select semester</h2>
					</div> 
				</div>
			</div>
			
			<!--
			/*
			*---------------------------------
			*included file for faculty registration
			*so as to avoid redundancy!
			*----------------------------------
			*/-->
			<?php include_once("inclusior-faculty-registration-form.html");?>
			 
		  
			<?php
				require_once "../included/connection.php";
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
						//header('Location:student-registration-form.php');
						header('Location:student_registration_form_sem1.php');
					}
				
				}
					
					
				function student_detail()
				{
					global $connection;
					global $semester;
					echo "<div id='view'>";
					echo "<h2 align='center'>Student Details</h2>";
					echo "<br/><br/>";
					echo "<table  border:collapse class='table table-hover' id='table'>";
						echo "<tr>";
						echo "<th> NAME</th>";
						echo "<th>ROLLNUMBER</th>";
						echo "<th>PHONE No.</th>";
						echo "<th>E-MAIL</th>";
						echo "<th>GUARDIAN PHONE No.</th>";
						for ($i=1;$i<$semester;$i++)
						{
							echo "<th> SEMESTER $i %age</th>";
						}
						
						echo "</tr>";
						
						$query="SELECT `rollnumber`, `phonenumber`,`email`,`guardianphone`, `semester-1-percent`, `semester-2-percent`, `semester-3-percent`, `semester-4-percent`, `semester-5-percent`, `semester-6-percent`, `semester-7-percent`, `semester-8-percent` FROM `student-detail` WHERE `current_semester`=".$semester."";
						$query_run=mysqli_query($connection,$query);  //return object
						
						while($row=mysqli_fetch_assoc($query_run))
						{
							 $query_1="SELECT `name` FROM `name-roll` WHERE `rollnumber`='".$row['rollnumber']."'";
							 $query_run_1=mysqli_query($connection,$query_1);
							 $row1=mysqli_fetch_assoc($query_run_1);
							
							echo "<tr id='row'>";
							
							echo	"<td>".$row1['name']."</td>";
							//echo	"<td>".$row['rollnumber']."</td>";
							echo	"<td>".$row['rollnumber']."</td>";
							echo	"<td>".$row['phonenumber']."</td>";
							echo	"<td>".$row['email']."</td>";
							echo	"<td>".$row['guardianphone']."</td>";
							
							for($i=1;$i<$semester;$i++)
							{
								echo	"<td>".$row['semester-'.$i.'-percent']."</td>";
							}
							
							echo "</tr>";
							$row++;
						}
						echo "</table>";

				}
					echo "</div>";
				function view_attendence()
				{
					
					global $connection;
					global $semester;
					include "functions_view_attendence_hod_login.php";
					if($semester==1)
						view_attendence_semester_1();
					
					if($semester==2)
						view_attendence_semester_2();
					
					if($semester==3)
						view_attendence_semester_3();
					
					if($semester==4)
						view_attendence_semester_4();
					
					if($semester==5)
						view_attendence_semester_5();
					
					if($semester==6)
						view_attendence_semester_6();
					
					if($semester==7)
						view_attendence_semester_7();
					
					if($semester==8)
						view_attendence_semester_8();
						
				}
				function old_attendence()  
				{
					global $connection;
					global $semester;
					echo "<div id='view'>";
					echo "<table  border:collapse id='tab' class='table table-hover'>";
							echo "<tr>";
							echo "<th> NAME</th>";
							echo "<th>ROLLNUMBER</th>";
							echo "<th>OVERALL LECTURE %</th>";
							echo "<th>OVERALL TUTORIAL %</th>";
							echo "<th>OVERALL LAB %</th>";
							echo "<th>OVERALL ATTENDENCE %</th>";
							echo "</tr>";
					
					$query="SELECT * FROM `attendence-semester-".$semester."`";
					$query_run=mysqli_query($connection,$query);
					while($row=mysqli_fetch_assoc($query_run))
					{
						
						$query_name="SELECT `name` FROM `name-roll` WHERE `rollnumber`=".$row['rollnumber'];
						
						$query_run_name=mysqli_query($connection,$query_name);
						$row_name=mysqli_fetch_assoc($query_run_name);
						
							echo "<tr id='row'>";
							echo	"<td>".$row_name['name']."</td>";
							echo	"<td>".$row['rollnumber']."</td>";
							echo	"<td>".$row['overall-lecture-percent']."</td>";
							echo	"<td>".$row['overall-tut-percent']."</td>";
							echo	"<td>".$row['overall-lab-percent']."</td>";
							echo	"<td>".$row['overall-percent']."</td>";
							echo "</tr>";

							$row++;
						
					}
					echo "</table>";
					echo "</div>";
				}
					
					
				function defaulters()
				{
					global $connection;
					global $semester;
					echo "<div id='view'>";
					echo "<table  border:collapse id='tab' class='table table-hover'>";
					echo "<tr>";
					
					echo "<th>NAME</th>";
					echo "<th>ROLLNUMBER</th>";
					echo "<th>OVERALL ATTENDENCE(in %)</th>";
					echo "</tr>";
					
					 //return object
					
					$query="SELECT * FROM `attendence-semester-".$semester."` WHERE `overall-percent`<75";
					$query_run=mysqli_query($connection,$query); 
					
					while($row=mysqli_fetch_assoc($query_run))
					{
						$query_name="SELECT `name` FROM `name-roll` WHERE `rollnumber`=".$row['rollnumber'];
						$query_run_name=mysqli_query($connection,$query_name);
						$row_name=mysqli_fetch_assoc($query_run_name);
						
						echo "<tr id='row'>";
						
						echo	"<td>".$row_name['name']."</td>";
						echo	"<td>".$row['rollnumber']."</td>";
						echo	"<td>".$row['overall-percent']."</td>";
					
						echo "</tr>";
						$row++;
					}
					echo "</table>";
					echo "</div>";
					
				}	
			?>
		</div>
	</body>
</html>
