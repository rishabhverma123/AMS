<?php
  require "connection.php";
   session_start();
   require 'auth_check.php';
  $username=$_SESSION['username'];
?>
<html>
  <head>
	<title>Faculty Login</title>
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

<?php include_once("bundelkhand_header.html");?>

<nav class="navbar navbar-inverse" style="margin-bottom:0px;padding-left:0px;padding-top:0px;">
	<div class="container-fluid">
		<div class="navbar-header">
		 <a class="navbar-brand" href="#">Attendance Management System</a>
		</div>
		<ul class="nav navbar-nav navbar-right">
		<li class="active"><a href="faculty_after_login.php">Home</a></li>
		</ul>
			
			<a	href="logout.php">
			  <button class="btn btn-danger navbar-btn navbar-right" data-toggle="modal" data-target="#">Logout &nbsp;</button>
			</a>
	</div>
</nav>
	<div class="container-fluid">
		<div class="row" style="height:30%;">
			<div class="col-sm-3
			 col-lg-2"  style="background-color:#f0ebeb;">
			  <nav class="navbar navbar-nav navbar-default navbar-fixed-side navbar-light" 
			  style="background-color:#f0ebeb;height:250%;width:100%;margin-left:0px;">
				  <ul class="nav navbar-nav">
					<li><a href="take_attendence.php">Take Attendence</a></li>
					<li><a href="faculty_view_attendence.php">View Attendence</a></li>
					<li><a href="faculty-defaulters.php">Defaulters</a></li>
					<li><a href="edit_attendance.php">Edit Attendence</a></li>
					<li><a href="update_faculty_detail.php">Edit Details</a></li>
					<li><a href="upload_notice_hod.php">Upload notice</a></li>
				  </ul>
				  </nav>
			</div>
			<div class="col-sm-9 col-lg-10" id="back">
				<img src="images/8a.jpg"  height="250%" width="100%"/>
			  <p style="position:absolute;top:10%;left:20%;color:black;font-size:40px;opacity:1.0;">
					Welcome<br/><br/></p>
			  <p style="position:absolute;top:30%;left:20%;margin-right:15%;color:black;font-size:25px;opacity:1.0;font-family:goudy old style">
				  This section is for the Faculty members where they can view all the
				  important information related to the students.The H.O.D. can take the attendance of all the students.
				  The Teachers can also view the attendance of all the students in the subjects taught by the them.</p>
			</div>
		</div>
	</div>
</body>
</html>
	

	<?php

		global $username;
		
		 function view_attendence()
		{
				
			global $connection;
			global $semester;
			echo "<div id='result' style='display:block;'>";
			echo "<div id='result_in'>";
			echo "<table  border:collapse class='table table-hover'>";
					echo "<tr>";
					echo "<th> NAME</th>";
					echo "<th>ROLLNUMBER</th>";
					echo "<th>OVERALL LECTURE %</th>";
					echo "<th>OVERALL TUTORIAL %</th>";
					echo "<th>OVERALL LAB %</th>";
					echo "<th>OVERALL ATTENDENCE %</th>";
					echo "</tr>";
					
			$query="SELECT * FROM `attendence-semester-".$semester."`";
			//echo $query;
			$query_run=mysqli_query($connection,$query);
			while($row=mysqli_fetch_assoc($query_run))
			{
				
					echo "<tr id='row'>";
					echo	"<td>".$row['name']."</td>";
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
			echo "</div>";
			
		}
		
		function defaulters()
		{
			
			global $connection;
			global $semesteer;
			echo "<div id='result' style='display:block;'>";
			echo "<table  border:collapse class='table table-hover'>";
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
						echo "<tr id='row'>";
						
						echo	"<td>".$row['name']."</td>";
						echo	"<td>".$row['rollnumber']."</td>";
						echo	"<td>".$row['overall-percent']."</td>";
					
						echo "</tr>";
						$row++;
					}
					echo "</table>";
					echo "</div>";
			
		}
		
		function update_attendence()
		{
				$_SESSION['semester']=$_POST['faculty-choose-semester'];
				
			header('Location:update_attendence.php');
		}
		
?>