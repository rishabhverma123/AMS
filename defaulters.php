<?php
session_start();
 ob_start();
  require 'connection.php';
   require 'auth_check.php';
    global $connection;
   $query="SELECT `startsem` FROM `start-sem` WHERE `id`=1";
  $query_run=mysqli_query($connection, $query);
 $result=mysqli_fetch_assoc($query_run);
?>

<html>
<head>
	<title>Defauters</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style>
		#result{
			background-image:url(images/17a.jpg);
			overflow:auto;
			height:230%;
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
	  #sem{
		  color:white;
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
		<?php include_once("bundelkhand_header.html");?>

		<nav class="navbar navbar-inverse" style="margin-bottom:0px;padding-left:0px;padding-top:0px;">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Attendance Management System</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="hod_after_login.php">Home</a></li>
				</ul>
					<a
						href="logout.php">
						<button
							class="btn btn-danger navbar-btn navbar-right"
							data-toggle="modal"
							data-target="#">Logout &nbsp;
						</button>
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
					<li><a href="medical_leave_hod.php">Medical leave</a></li>
					<li><a href="upload_notice_hod.php">Upload notice</a></li>
				  </ul>
				</nav>
			</div>
			<div class="col-sm-9 col-lg-10" style="height:230%;overflow:auto;" id="result">
				<h2 align="center" style="color:#062f4f;">Defaulters</h2>
				<h3 align="center" style="color:#96858f;margin-top:3%;">To view defaulters select semester</h3>
				<br/>


				<?php
					
				require_once "connection.php";
				
				if(isset($_POST['submit']) && isset($_POST['hod-choose-semester']))
				{	

					$semester=$_POST['hod-choose-semester'];
					defaulters();
				}
					function defaulters()
					{
						global $connection;
						global $semester;
						echo "<table border:collapse id='tab' class='table table-hover'>";
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
								
						
					}
				
				?>
			</div>
		</div>
	</div>
		<?php include("inclusior_defaulter.html"); ?>
    </div>
  </body>
</html>