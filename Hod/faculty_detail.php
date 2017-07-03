<html>
<head>
	<title>Faculty Detail!</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
		<style>
		  #result{
				overflow:auto;
				height:250%;
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
	  
	  
	    </style>
	  <script>
		  window.onbeforeunload=function(){
			  window.scrollTo(0,500);
		  }
	  </script>
  </head>
<body>
<div>

<?php  include_once("../included/bundelkhand_header.html");?>

<nav class="navbar navbar-inverse" style="margin-bottom:0px;padding-left:0px;padding-top:0px;">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Attendance Management System</a>
		</div>
		<ul class="nav navbar-nav navbar-right">
		<li class="active"><a href="hod_after_login.php">Home</a></li>
		</ul>
			<a href="../included/logout.php">
			  <button	class="btn btn-danger navbar-btn navbar-right" data-toggle="modal"	data-target="#">Logout &nbsp;</button>
			</a>

	</div>
</nav>
<div class="container-fluid">
  <div class="row" style="height:30%;">
    <div class="col-sm-3 col-lg-2"  style="background-color:#f0ebeb;">
		  <nav class="navbar navbar-nav navbar-default navbar-fixed-side navbar-light" style="background-color:#f0ebeb;height:250%;width:100%;margin-left:0px;">
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
	<div class="col-sm-9 col-lg-10" style="height:250%;overflow:auto;background-image:url(../images/1237.jpg);opacity:0.8;" id="result">
		<h2 align="center" style="color:black;">Faculty Details</h2>
		<hr/>
		<?php
			require "../included/connection.php";
			session_start();
			require '../included/auth_check.php';
			global $connection;
			echo "<br/>";
			echo "<table  border:collapse  class='table table-hover'>";
					echo "<tr>";
					echo "<th> id</th>";
					echo "<th>name</th>";
					echo "<th>mobile</th>";
					echo "<th>email</th>";
					echo "<th>subject1</th>";
					echo "<th>subject2</th>";
					echo "<th>subject3</th>";
					echo "<th>subject4</th>";
					echo "<th>subject5</th>";
					echo "<th>subject6</th>";
					echo "<th>subject7</th>";
					echo "<th>subject8</th>";
					echo "</tr>";
					$query="SELECT * FROM `faculty-detail`";
					$query_run=mysqli_query($connection,$query);  //return object					
					while($row=mysqli_fetch_assoc($query_run))
					{
						echo "<tr id='row'>";
						echo	"<td>".$row['id']."</td>";
						echo	"<td>".$row['name']."</td>";
						echo	"<td>".$row['mobile']."</td>";
						echo	"<td>".$row['email']."</td>";
						echo	"<td>".$row['subject1']."</td>";
						echo	"<td>".$row['subject2']."</td>";
						echo	"<td>".$row['subject3']."</td>";
						echo	"<td>".$row['subject4']."</td>";
						echo	"<td>".$row['subject5']."</td>";
						echo	"<td>".$row['subject6']."</td>";
						echo	"<td>".$row['subject7']."</td>";
						echo	"<td>".$row['subject8']."</td>";
						echo "</tr>";
						$row++;
					}
					echo "</table>";
			?>
		</div>	
    </div>
</div>

  
		<!--/*
		*---------------------------------
		*included file for faculty registration
		*so as to avoid redundancy!
		*----------------------------------
		*/
		-->
		
		<?php include_once("inclusior-faculty-registration-form.html");?>
      
  </body>
  </html>