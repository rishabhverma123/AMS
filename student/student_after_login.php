<?php
  session_start(); 
    ob_start();
    $student_rollnumber=$_SESSION['rollnumber'];
  require "connection.php";
?>


<!doctype html>
<html>
	<head>
		<title>
			STUDENT LOGIN!!
		</title>
		<style>
		 #nav{
			  font-size:15px;
			  color:black;
			  
		  }
		  label{
			  color:black;
		  }
		</style>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
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
				<li class="active"><a href="student_after_login.php">Home</a></li>
				</ul>
					<a href="logout.php">
						<button	class="btn btn-danger navbar-btn navbar-right"	data-toggle="modal"	data-target="#">Logout &nbsp;
						</button>
					</a>

				<form id ="create" class="navbar-form navbar-left" action="<?php echo $_SERVER['PHP_SELF']?>" method ="POST" onsubmit="return parent.scrollTo(0,1500); return true" >
					<div class="form-group">
						<label style="color:white;"> Select Semester </label>			
						<select name="student-choose-semester" class="form-control" required>
					
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
					<div class="form-group"><!--
					<select id="select" name="student-choose-download" class="form-control">			
						<option value="none"> --select--  </option>
						<option value="download"> DOWNLOAD  </option>
					</select> -->
					</div>
					<button class="btn btn-default" type="submit" name="submit" value="SELECT">Submit </button>
				</form>
			</div>
		</nav>
		<div class="container-fluid">
		    <h2 align="center" style="century gothic">View Attendence</h2>
			<h1 align="center" style="margin-top:5%;font-family:goudy old style;">
			To view Attendence select semester</h1>
			<?php
				
				if(isset($_POST['submit']))
				{
					
					if($_POST['student-choose-semester']!="none")
					{
						
						$semester=$_POST['student-choose-semester'];
						
						if($semester=='5')
						{
							$query="SELECT * FROM `attendence-semester-".$semester."` WHERE `rollnumber`=".$student_rollnumber;
							$query_run=mysqli_query($connection,$query);
							while($row=mysqli_fetch_assoc($query_run))
							{
								$present1=$row['ECS-501Lecture-tp'];
								$class1=$row['ECS-501Lecture-tc'];
								$input1=$present1."/".$class1;
								
								$present2=$row['ECS-502Lecture-tp'];
								$class2=$row['ECS-502Lecture-tc'];
								$input2=$present2."/".$class2;
								
								$present3=$row['ECS-504Lecture-tp'];
								$class3=$row['ECS-504Lecture-tc'];
								$input3=$present3."/".$class3;
								
								$present4=$row['EIT-501Lecture-tp'];
								$class4=$row['EIT-501Lecture-tc'];
								$input4=$present4."/".$class4;
								
								$present5=$row['EIT-505Lecture-tp'];
								$class5=$row['EIT-505Lecture-tc'];
								$input5=$present5."/".$class5;
								
								$present6=$row['EHU-501Lecture-tp'];
								$class6=$row['EHU-501Lecture-tc'];
								$input6=$present6."/".$class6;
								
								
								
								
								$present7=$row['ECS-501tut-tp'];
								$class7=$row['ECS-501tut-tc'];
								$input7=$present7."/".$class7;
								
								$present8=$row['ECS-502tut-tp'];
								$class8=$row['ECS-502tut-tc'];
								$input8=$present8."/".$class8;
								
								$present9=$row['ECS-504tut-tp'];
								$class9=$row['ECS-504tut-tc'];
								$input9=$present9."/".$class9;
								
								$present10=$row['EIT-501tut-tp'];
								$class10=$row['EIT-501tut-tc'];
								$input10=$present10."/".$class10;
								
								$present11=$row['EIT-505tut-tp'];
								$class11=$row['EIT-505tut-tc'];
								$input11=$present11."/".$class11;
								
								$present12=$row['EHU-501tut-tp'];
								$class12=$row['EHU-501tut-tc'];
								$input12=$present12."/".$class12;
								
								
								
								
								
								$present13=$row['EIT-551lab-tp'];
								$class13=$row['EIT-551lab-tc'];
								$input13=$present13."/".$class13;
								
								$present14=$row['EIT-552lab-tp'];
								$class14=$row['EIT-552lab-tc'];
								$input14=$present14."/".$class14;
								
								$present15=$row['EIT-553lab-tp'];
								$class15=$row['EIT-553lab-tc'];
								$input15=$present15."/".$class15;
								
								$present16=$row['EIT-554lab-tp'];
								$class16=$row['EIT-554lab-tc'];
								$input16=$present16."/".$class16;
								
										
								echo "<table>	
								<tr>
									<th>ECS-501-LEC</th>
									<td>".$input1."</td>
								</tr>
								<tr>	
									<th>ECS-502-LEC</th>
									<td>".$input2."
								</tr>
								<tr>	
									<th>ECS-504-LEC</th>
									<td>".$input3."
								</tr>
								<tr>	
									<th>EIT-501-LEC</th>
									<td>".$input4."
								</tr>
								<tr>	
									<th>EIT-505-LEC</th>
									<td>".$input5."
								</tr>
								<tr>	
									<th>EHU-501-LEC</th>
									<td>".$input6."
								</tr>
								<tr>	
									<th>ECS-501-TUTE</th>
									<td>".$input7."
								</tr>
								<tr>	
									<th>ECS-502-TUTE</th>
									<td>".$input8."
								</tr>
								<tr>	
									<th>ECS-504-TUTE</th>
									<td>".$input9."
								</tr>
								<tr>	
									<th>EIT-501-TUTE</th>
									<td>".$input10."
								</tr>
								<tr>	
									<th>EIT-505-TUTE</th>
									<td>".$input11."
								</tr>
								<tr>	
									<th>EHU-501-TUTE</th>
									<td>".$input12."
								</tr>	
								<tr>
									<th>EIT-551-LAB</th>
									<td>".$input13."
								</tr>
								<tr>	
									<th>EIT-552-LAB</th>
									<td>".$input14."
								</tr>
								<tr>	
									<th>EIT-553-LAB</th>
									<td>".$input15."
								</tr>
								<tr>	
									<th>EIT-554-LAB</th>
									<td>".$input16."	
								</tr>
								</table>";
								
								
									
							}
							
						}
									
						if($semester=='3')
						{
							$query="SELECT * FROM `attendence-semester-".$semester."` WHERE `rollnumber`=".$student_rollnumber;
							$query_run=mysqli_query($connection,$query);
							while($row=mysqli_fetch_assoc($query_run))
							{
								$present1=$row['ECS-301Lecture-tp'];
								$class1=$row['ECS-301Lecture-tc'];
								$input1=$present1."/".$class1;
								
								$present2=$row['ECS-302Lecture-tp'];
								$class2=$row['ECS-302Lecture-tc'];
								$input2=$present2."/".$class2;
								
								$present3=$row['ECS-304Lecture-tp'];
								$class3=$row['ECS-304Lecture-tc'];
								$input3=$present3."/".$class3;
								
								$present4=$row['ECS-305Lecture-tp'];
								$class4=$row['ECS-305Lecture-tc'];
								$input4=$present4."/".$class4;
								
								$present5=$row['EAS-301Lecture-tp'];
								$class5=$row['EAS-301Lecture-tc'];
								$input5=$present5."/".$class5;
								
								$present6=$row['EHU-302Lecture-tp'];
								$class6=$row['EHU-302Lecture-tc'];
								$input6=$present6."/".$class6;
								
								
								
								
								$present7=$row['ECS-301tut-tp'];
								$class7=$row['ECS-301tut-tc'];
								$input7=$present7."/".$class7;
								
								$present8=$row['ECS-302tut-tp'];
								$class8=$row['ECS-302tut-tc'];
								$input8=$present8."/".$class8;
								
								$present9=$row['ECS-304tut-tp'];
								$class9=$row['ECS-304tut-tc'];
								$input9=$present9."/".$class9;
								
								$present10=$row['ECS-305tut-tp'];
								$class10=$row['ECS-305tut-tc'];
								$input10=$present10."/".$class10;
								
								$present11=$row['EAS-301tut-tp'];
								$class11=$row['EAS-301tut-tc'];
								$input11=$present11."/".$class11;
								
								
								
								
								
								
								$present13=$row['ECS-351lab-tp'];
								$class13=$row['ECS-351lab-tc'];
								$input13=$present13."/".$class13;
								
								$present14=$row['ECS-352lab-tp'];
								$class14=$row['ECS-352lab-tc'];
								$input14=$present14."/".$class14;
								
								$present15=$row['ECS-353lab-tp'];
								$class15=$row['ECS-353lab-tc'];
								$input15=$present15."/".$class15;
								
								echo "<table>
								
								<tr>
									<th>ECS-301-LEC</th>
									<td>".$input1."
								</tr>	
									<th>ECS-302-LEC</th>
									<td>".$input2."
								</tr>	
									<th>ECS-304-LEC</th>
									<td>".$input3."
								</tr>	
									<th>ECS-305-LEC</th>
									<td>".$input4."
								</tr>	
									<th>EAS-301-LEC</th>
									<td>".$input5."
								</tr>	
									<th>EHU-302-LEC</th>
									<td>".$input6."
								</tr>	
								
									<th>ECS-301-TUTE</th>
									<td>".$input7."
								</tr>	
									<th>ECS-302-TUTE</th>
									<td>".$input8."
								</tr>	
									<th>ECS-304-TUTE</th>
									<td>".$input9."
								</tr>	
									<th>ECS-305-TUTE</th>
									<td>".$input10."
								</tr>	
									<th>EAS-301-TUTE</th>
									<td>".$input11."
								</tr>	
									<th>ECS-351-LAB</th>
									<td>".$input13."
								</tr>	
									<th>ECS-352-LAB</th>
									<td>".$input14."
								</tr>	
									<th>ECS-353-LAB</th>
									<td>".$input15."
								</tr>
								</table>";
									
							}
							
						}
					
					}
					
				}

					
					
			?>
					
		</div>
	</body>
</html>