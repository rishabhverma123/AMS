<?php
 session_start();
  ob_start();
   require "../included/connection.php"; 
    require '../included/auth_check.php';
     $username=$_SESSION['username'];
     $semester=$_SESSION['semester'];
    $date=$_SESSION['date'];
   $batch=$_SESSION['batch'];
  $subject_code=$_SESSION['subject_code'];
 global $connection;
?>


<html>
<head>
	<title>Edit Attendence</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<style>
		  .carousel-inner > .item > img,
		  .carousel-inner > .item > a > img {
			  width: 100%;
			  margin:0;
			  height:100%;
		  }
		  #form{
			  margin-left:10%;
			  padding:15%;
			  overflow: auto;
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
		  #caption{
			  font-size:50px;
			  position:absolute;
			  top:20%;
			  font-weight:700;
			  font-family:Times new roman;
			  
		  }
		  #main{
			  background-image:url(../images/newb2.jpg);
			  height:180%;
			  width:100%;
		  }
		  .ac-custom label {
			display: inline-block;
			position: relative;
			font-size: 2em;
			padding: 0 0 0 80px;
			color: rgba(0,0,0,0.2);
			cursor: pointer;
			transition: color 0.3s;
		}

		.ac-custom input[type="checkbox"],
		.ac-custom input[type="radio"],
		.ac-custom label::before {
			width:25px;
			height:25px;
			top: 50%;
			left:0px;
			margin-top:5px;
			position: absolute;
			cursor: pointer;
		}

		.ac-custom input[type="checkbox"],
		.ac-custom input[type="radio"] {
			opacity:0.8;
			display: inline-block;
			position:relative;
			z-index: 100;
			vertical-align: middle;
		}

		.ac-custom label::before {
			content: '';
			border: 4px solid #fff;
			transition: opacity 0.3s;
		}
		.ac-custom input[type="checkbox"]:checked + label,
		.ac-custom input[type="radio"]:checked + label {
			color:black;
		} 
		.ac-custom input[type="checkbox"]:checked + label::before,
		.ac-custom input[type="radio"]:checked + label::before {
			opacity: 0.8;
		}
		#form{
			margin-left:10%;
		}
	</style>
</head>
<body>

<?php include_once("../included/bundelkhand_header.html"); ?>

<nav class="navbar navbar-inverse" style="margin-bottom:0px;padding-left:0px;padding-top:0px;">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Attendance Management System</a>
		</div>
		<ul class="nav navbar-nav navbar-right">
		<li class="active"><a href="faculty_after_login.php">Home</a></li>
		</ul>
			<a href="../included/logout.php">
				<button	class="btn btn-danger navbar-btn navbar-right"	data-toggle="modal" data-target="#">Logout &nbsp;</button>
			</a>
	</div>
</nav>
<div id="main">
	<div style="overflow:auto;">
	    <form id="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form-horizontal ac-custom ac-checkbox ac-cross">
			
		    <table  class="table">
			  <tr>
			   <th> NAME</th>
			   <th> ROLLNUMBER</th>
			   <th> PRESENT/ABSENT </th>
			 </tr>
			
			 <?php
				
				$semester=$_SESSION['semester'];

				$query="SELECT rollnumber FROM `attendence-semester-".$semester."`";
				$query_result=mysqli_query($connection,$query);
				while($row=mysqli_fetch_assoc($query_result))
				{
					if($batch=="tut-t1" || $batch=="lab-t1")
					{
						$batch1=substr($batch,0,3);
						$query_select_t1_student="SELECT * FROM `student-detail` WHERE `rollnumber`=".$row['rollnumber']." AND `group-batch`='t1'";
						$run=mysqli_query($connection,$query_select_t1_student);
						$stu=mysqli_num_rows($run);
						if($stu>0)
						{
							$query_name="SELECT name FROM `name-roll`  WHERE `rollnumber`=".$row['rollnumber'];
							$query_run_name=mysqli_query($connection,$query_name);
							$row_name=mysqli_fetch_assoc($query_run_name);
							
							
							$query1="SELECT * FROM `restriction-semester` WHERE `rollnumber`='".$row['rollnumber']."' AND `date`='".$date."' AND `subjectcode`= '".$subject_code.$batch1."'";
							$query1_result=mysqli_query($connection,$query1);
							$row1=mysqli_num_rows($query1_result);
					
							echo"<tr>";
							echo "<td>".$row_name['name']."</td> ";
							echo "<td>".$row['rollnumber']."</td>";
					
					
							if($row1==0)
							{
								echo "<td>"."<input type='checkbox' checked='checked' name='".$row['rollnumber']."'>"."PRESENT</td>";
							}
								
							else {
								echo "<td>"."<input type='checkbox'  name='".$row['rollnumber']."'>"."PRESENT</td>";
							}
					
							echo "</tr>";
						}
					}
					
					else if($batch=="tut-t2" || $batch=="lab-t2")
					{
						$batch1=substr($batch,0,3);
						
						$query_select_t2_student="SELECT * FROM `student-detail` WHERE `rollnumber`=".$row['rollnumber']." AND `group-batch`='t2'";
						$run=mysqli_query($connection,$query_select_t2_student);
						$stu=mysqli_num_rows($run);
						if($stu>0)
						{
							$query_name="SELECT name FROM `name-roll`  WHERE `rollnumber`=".$row['rollnumber'];
							$query_run_name=mysqli_query($connection,$query_name);
							$row_name=mysqli_fetch_assoc($query_run_name);
							
							
							$query1="SELECT * FROM `restriction-semester` WHERE `rollnumber`='".$row['rollnumber']."' AND 	`date`='".$date."' AND `subjectcode`= '".$subject_code.$batch1."'";
							$query1_result=mysqli_query($connection,$query1);
							$row1=mysqli_num_rows($query1_result);
					
							echo"<tr>";
							echo "<td>".$row_name['name']."</td> ";
							echo "<td>".$row['rollnumber']."</td>";
					
					
							if($row1==0)
							{
								echo "<td>"."<input type='checkbox' checked='checked' name='".$row['rollnumber']."'>"."PRESENT</td>";
							}
								
							else {
								echo "<td>"."<input type='checkbox'  name='".$row['rollnumber']."'>"."PRESENT</td>";
							}
					
							echo "</tr>";
						}
					}
					else if($batch=='Lecture')
					{
							$query_name="SELECT name FROM `name-roll`  WHERE `rollnumber`=".$row['rollnumber'];
							$query_run_name=mysqli_query($connection,$query_name);
							$row_name=mysqli_fetch_assoc($query_run_name);
							
							
							$query1="SELECT * FROM `restriction-semester` WHERE `rollnumber`='".$row['rollnumber']."' AND 	`date`='".$date."' AND `subjectcode`= '".$subject_code.$batch."'";
							$query1_result=mysqli_query($connection,$query1);
							$row1=mysqli_num_rows($query1_result);
					
							echo"<tr>";
							echo "<td>".$row_name['name']."</td> ";
							echo "<td>".$row['rollnumber']."</td>";
					
					
							if($row1==0)
							{
								echo "<td>"."<input type='checkbox' checked='checked' name='".$row['rollnumber']."'>"."PRESENT</td>";
							}
								
							else {
								echo "<td>"."<input type='checkbox'  name='".$row['rollnumber']."'>"."PRESENT</td>";
							}
					
							echo "</tr>";
					}	
				}
			 ?>	
			
			</table>
			<button class="button" type="submit" name="submit_attendence" value="SUBMIT">Submit </button>
		</form>
	</div>
</div>



<?php		

	if(isset($_POST['submit_attendence']))
	{
		$query="SELECT * FROM `attendence-semester-".$semester."`";
		$query_run=mysqli_query($connection, $query);
		while($row=mysqli_fetch_assoc($query_run))
		{
			if($batch=="Lecture")
			{
				update_attendence($row['rollnumber']);
			}
			else if($batch=="tut-t1" || $batch=="lab-t1")
			{
				$query_select_t1_student="SELECT * FROM `student-detail` WHERE `rollnumber`=".$row['rollnumber']." AND `group-batch`='t1'";
				$run=mysqli_query($connection,$query_select_t1_student);
				$stu=mysqli_num_rows($run);
				if($stu>0)
				{
					update_attendence($row['rollnumber']);
				}
			}
			else if($batch=="tut-t2" || $batch=="lab-t2")
			{
				$query_select_t1_student="SELECT * FROM `student-detail` WHERE `rollnumber`=".$row['rollnumber']." AND `group-batch`='t2'";
				$run=mysqli_query($connection,$query_select_t1_student);
				$stu=mysqli_num_rows($run);
				if($stu>0)
				{
					update_attendence($row['rollnumber']);
				}
			}
				
		}
		?>
		    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
			  <link rel="stylesheet" href="/resources/demos/style.css" />
			   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
			  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
			<script type="text/javascript">
				$( function() {
					$("#success_text").show();
					$( "#dialog-message" ).dialog({
						modal: true,
						buttons: {
							Ok: function() {
								window.location="edit_attendance.php";
							}
						}
					});
				});
			</script>
		<?php
	}
	
	
	
	function update_attendence($rollnumber2)
	{
		global $batch;
		global $subject_code;
		global $date;
		global $semester;
		global $connection;
		
		if($batch!='Lecture')
		{
			$batch1=substr($batch,0,3);
		}
		else
		{
			$batch1=$batch;
		}
			$query_restriction_table="SELECT * FROM `restriction-semester` WHERE `rollnumber`='".$rollnumber2."' AND 	`date`='".$date."' AND `subjectcode`= '".$subject_code.$batch1."'";
			//echo $query_restriction_table;
			$query_run1=mysqli_query($connection,$query_restriction_table);
			$num_rows=mysqli_num_rows($query_run1);
			
			if($num_rows==0)
			{
				$mark=1;//present
				
			}
			else 
			{
				$mark=0;//absent
			}
		
			if(isset($_POST[''.$rollnumber2]))
			{
				if($mark==0)
				{
					$query_updated_attendence="SELECT `".$subject_code.$batch1."-tp`,`".$subject_code.$batch1."-tc` FROM `attendence-semester-".$semester."` WHERE `rollnumber`='".$rollnumber2."'";
					$query_run_updated_attendence=mysqli_query($connection,$query_updated_attendence);
					
					$_SESSION['temp']=$query_updated_attendence;
					
					while($row1=mysqli_fetch_assoc($query_run_updated_attendence))
					{
						$present=$row1[''.$subject_code.$batch1.'-tp'];
						$present=$present+1;
						
						$query_update_new_attendence="UPDATE `attendence-semester-".$semester."` SET `".$subject_code.$batch1."-tp`=".$present." WHERE `rollnumber`='".$rollnumber2."'";
						$query_new_attendence=mysqli_query($connection,$query_update_new_attendence);
						
						
						$query_delete_from_restriction_table="DELETE FROM `restriction-semester`  WHERE `rollnumber`='".$rollnumber2."' AND `date`='".$date."' AND `subjectcode`= '".$subject_code.$batch1."'"; 
						$query_run_delete=mysqli_query($connection,$query_delete_from_restriction_table);
					}
				}
			}
			else 
			{
				if($mark==1)
				{
					$query_updated_attendence="SELECT `".$subject_code.$batch1."-tp`,`".$subject_code.$batch1."-tc` FROM `attendence-semester-".$semester."` WHERE `rollnumber`='".$rollnumber2."'";
					$query_run_updated_attendence=mysqli_query($connection,$query_updated_attendence);
					
					while($row1=mysqli_fetch_assoc($query_run_updated_attendence))
					{
						$present=$row1[''.$subject_code.$batch1.'-tp'];
						$present=$present-1;
						
						$query_update_new_attendence="UPDATE `attendence-semester-".$semester."` SET `".$subject_code.$batch1."-tp`=".$present." WHERE `rollnumber`='".$rollnumber2."'";
						$query_new_attendence=mysqli_query($connection,$query_update_new_attendence);
						
					}
				}
				
				$query_insert_restriction_table_if_absent="INSERT INTO `restriction-semester`(`rollnumber`, `date`, `subjectcode`) VALUES ('".$rollnumber2."', '".$date."', '".$subject_code.$batch1."')";
				$query_run_insert=mysqli_query($connection,$query_insert_restriction_table_if_absent);
			}
			
			  update_overall_attendence($rollnumber2);	  
	}
 ?>
 <?php

 function update_overall_attendence($rollnumber)
	{
		global $semester;
		global $connection;
					$query_select_subject="SELECT * FROM `attendence-semester-".$semester."` WHERE `rollnumber`=".$rollnumber;
					$query_run_select_subject=mysqli_query($connection,$query_select_subject);
					
					$data=mysqli_fetch_assoc($query_run_select_subject);
					
					if($semester==1)
					{
						$overall_lecture_present=$data['EAS-104Lecture-tp']+$data['ECS-101Lecture-tp']+$data['EAS-103Lecture-tp']+$data['EAS-105Lecture-tp']+$data['EAS-101Lecture-tp']+$data['EME-102Lecture-tp']+$data['EAS-109Lecture-tp'];
						$overall_tut_present=$data['EAS-101tut-tp']+$data['EAS-103tut-tp']+$data['EAS-104tut-tp']+$data['EME-102tut-tp']+$data['ECS-101tut-tp'];
						$overall_lab_present=$data['ECE-151lab-tp']+$data['EAS-154lab-tp']+$data['EME-152lab-tp']+$data['ECS-151lab-tp'];
						
						
						
						$overall_lecture_class=$data['EAS-104Lecture-tc']+$data['ECS-101Lecture-tc']+$data['EAS-103Lecture-tc']+$data['EAS-105Lecture-tc']+$data['EAS-101Lecture-tc']+$data['EME-102Lecture-tc']+$data['EAS-109Lecture-tc'];
						$overall_tut_class=$data['EAS-101tut-tc']+$data['EAS-103tut-tc']+$data['EAS-104tut-tc']+$data['EME-102tut-tc']+$data['ECS-101tut-tc'];
						$overall_lab_class=$data['ECE-151lab-tc']+$data['EAS-154lab-tc']+$data['EME-152lab-tc']+$data['ECS-151lab-tc'];
					}
					else if($semester==2)
					{
						$overall_lecture_present=$data['EAS-203Lecture-tp']+$data['EAS-202Lecture-tp']+$data['EEC-201Lecture-tp']+$data['EAS-201Lecture-tp']+$data['EEE-201Lecture-tp']+$data['EME-201Lecture-tp']+$data['AUC-001Lecture-tp'];
						$overall_tut_present=$data['EAS-201tut-tp']+$data['EEE-201tut-tp']+$data['EAS-202tut-tp']+$data['EEC-201tut-tp']+$data['EAS-203tut-tp'];
						$overall_lab_present=$data['EEE-251lab-tp']+$data['EWS-251lab-tp']+$data['EAS-252lab-tp']+$data['EAS-251lab-tp'];
						
						$overall_lecture_class=$data['EAS-203Lecture-tc']+$data['EAS-202Lecture-tc']+$data['EEC-201Lecture-tc']+$data['EAS-201Lecture-tc']+$data['EEE-201Lecture-tc']+$data['EME-201Lecture-tc']+$data['AUC-001Lecture-tc'];
						$overall_tut_class=$data['EAS-201tut-tc']+$data['EEE-201tut-tc']+$data['EAS-202tut-tc']+$data['EEC-201tut-tc']+$data['EAS-203tut-tc'];
						$overall_lab_class=$data['EEE-251lab-tc']+$data['EWS-251lab-tc']+$data['EAS-252lab-tc']+$data['EAS-251lab-tc'];
					}
					
					else if($semester==3)
					{
						echo "you are in semester 3";
						$overall_lecture_present=$data['ECS-301Lecture-tp']+$data['ECS-302Lecture-tp']+$data['ECS-304Lecture-tp']+$data['EHU-302Lecture-tp']+$data['EAS-301Lecture-tp']+$data['ECS-305Lecture-tp'];
						$overall_tut_present=$data['ECS-301tut-tp']+$data['ECS-302tut-tp']+$data['ECS-304tut-tp']+$data['EAS-301tut-tp']+$data['ECS-305tut-tp'];
						$overall_lab_present=$data['ECS-351lab-tp']+$data['ECS-352lab-tp']+$data['ECS-353lab-tp'];
						
						
						
						$overall_lecture_class=$data['ECS-301Lecture-tc']+$data['ECS-302Lecture-tc']+$data['ECS-304Lecture-tc']+$data['EHU-302Lecture-tc']+$data['EAS-301Lecture-tc']+$data['ECS-305Lecture-tc'];
						$overall_tut_class=$data['ECS-301tut-tc']+$data['ECS-302tut-tc']+$data['ECS-304tut-tc']+$data['EAS-301tut-tc']+$data['ECS-305tut-tc'];
						$overall_lab_class=$data['ECS-351lab-tc']+$data['ECS-352lab-tc']+$data['ECS-353lab-tc'];
					}
					
					else if($semester==4)
					{
						$overall_lecture_present=$data['ECS-401Lecture-tp']+$data['ECS-402Lecture-tp']+$data['EIT-401Lecture-tp']+$data['EIT-402Lecture-tp']+$data['EOE-041Lecture-tp']+$data['EHU-401Lecture-tp'];
						$overall_tut_present=$data['ECS-401tut-tp']+$data['ECS-402tut-tp']+$data['EIT-401tut-tp']+$data['EIT-402tut-tp']+$data['EOE-041tut-tp'];
						$overall_lab_present=$data['EIT-451lab-tp']+$data['ECS-452lab-tp']+$data['ECS-453lab-tp'];
						
						
						
						$overall_lecture_class=$data['ECS-401Lecture-tc']+$data['ECS-402Lecture-tc']+$data['EIT-401Lecture-tc']+$data['EIT-402Lecture-tc']+$data['EOE-041Lecture-tc']+$data['EHU-401Lecture-tc'];
						$overall_tut_class=$data['ECS-401tut-tc']+$data['ECS-402tut-tc']+$data['EIT-401tut-tc']+$data['EIT-402tut-tc']+$data['EOE-041tut-tc'];
						$overall_lab_class=$data['EIT-451lab-tc']+$data['ECS-452lab-tc']+$data['ECS-453lab-tc'];
					}
					else if($semester==5)
					{
						$overall_lecture_present=$data['ECS-501Lecture-tp']+$data['EIT-505Lecture-tp']+$data['ECS-504Lecture-tp']+$data['EHU-501Lecture-tp']+$data['EIT-501Lecture-tp']+$data['ECS-502Lecture-tp'];
						$overall_tut_present=$data['ECS-501tut-tp']+$data['EIT-505tut-tp']+$data['ECS-504tut-tp']+$data['EHU-501tut-tp']+$data['EIT-501tut-tp']+$data['ECS-502tut-tp'];
						$overall_lab_present=$data['EIT-551lab-tp']+$data['EIT-552lab-tp']+$data['EIT-553lab-tp']+$data['EIT-554lab-tp'];
						
						
						
						$overall_lecture_class=$data['ECS-501Lecture-tc']+$data['EIT-505Lecture-tc']+$data['ECS-504Lecture-tc']+$data['EHU-501Lecture-tc']+$data['EIT-501Lecture-tc']+$data['ECS-502Lecture-tc'];
						$overall_tut_class=	$data['ECS-501tut-tc']+$data['EIT-505tut-tc']+$data['ECS-504tut-tc']+$data['EHU-501tut-tc']+$data['EIT-501tut-tc']+$data['ECS-502tut-tc'];
						$overall_lab_class=$data['EIT-551lab-tc']+$data['EIT-552lab-tc']+$data['EIT-553lab-tc']+$data['EIT-554lab-tc'];
					}
					else if($semester==6)
					{
						$overall_lecture_present=$data['ECS-601Lecture-tp']+$data['EIT-602Lecture-tp']+$data['EHU-601Lecture-tp']+$data['ECS-505Lecture-tp']+$data['EIT-061Lecture-tp'];
						$overall_tut_present=$data['EIT-601tut-tp']+$data['EIT-602tut-tp']+$data['EHU-601tut-tp']+$data['EIT-062tut-tp']+$data['ECS-505tut-tp']+$data['ECS-601tut-tp'];
						$overall_lab_present=$data['EIT-651lab-tp']+$data['EIT-652lab-tp']+$data['EIT-653lab-tp']+$data['EIT-654lab-tp'];
						
						$overall_lecture_class=$data['ECS-601Lecture-tc']+$data['EIT-602Lecture-tc']+$data['EHU-601Lecture-tc']+$data['ECS-505Lecture-tc']+$data['EIT-061Lecture-tc'];
						$overall_tut_class=$data['EIT-601tut-tc']+$data['EIT-602tut-tc']+$data['EHU-601tut-tc']+$data['EIT-062tut-tc']+$data['ECS-505tut-tc']+$data['ECS-601tut-tc'];
						$overall_lab_class=$data['EIT-651lab-tc']+$data['EIT-652lab-tc']+$data['EIT-653lab-tc']+$data['EIT-654lab-tc'];
					}
					else if($semester==7)
					{
						$overall_lecture_present=$data['EIT-071Lecture-tp']+$data['EIT-701Lecture-tp']+$data['ECS-801Lecture-tp']+$data['ECS-075Lecture-tp'];
						$overall_tut_present=$data['ECS-075tut-tp']+$data['EIT-071tut-tp']+$data['ECS-801tut-tp']+$data['EIT-701tut-tp'];
						$overall_lab_present=$data['EIT-751lab-tp']+$data['EIT-752lab-tp']+$data['EIT-753lab-tp']+$data['EIT-754lab-tp'];
						
						$overall_lecture_class=$data['EIT-071Lecture-tc']+$data['EIT-701Lecture-tc']+$data['ECS-801Lecture-tc']+$data['ECS-075Lecture-tc'];
						$overall_tut_class=$data['ECS-075tut-tc']+$data['EIT-071tut-tc']+$data['ECS-801tut-tc']+$data['EIT-701tut-tc'];
						$overall_lab_class=$data['EIT-751lab-tc']+$data['EIT-752lab-tc']+$data['EIT-753lab-tc']+$data['EIT-754lab-tc'];
					}
					else if($semester==8)
					{
						$overall_lecture_present=$data['ECS-087Lecture-tp']+$data['EIT-082Lecture-tp']+$data['ECS-701Lecture-tp']+$data['EOE-081Lecture-tp'];
						$overall_tut_present=$data['ECS-701tut-tp']+$data['EIT-082tut-tp']+$data['EOE-081tut-tp']+$data['EIT-087tut-tp'];
						$overall_lab_present=$data['EIT-852lab-tp']+$data['EIT-752lab-tp']+$data['EIT-851lab-tp'];
						
						$overall_lecture_class=$data['ECS-087Lecture-tc']+$data['EIT-082Lecture-tc']+$data['ECS-701Lecture-tc']+$data['EOE-081Lecture-tc'];
						$overall_tut_class=$data['ECS-701tut-tc']+$data['EIT-082tut-tc']+$data['EOE-081tut-tc']+$data['EIT-087tut-tc'];
						$overall_lab_class=$data['EIT-852lab-tc']+$data['EIT-752lab-tc']+$data['EIT-851lab-tc'];
					}
/*----------------------------------------------
*	TO CHECK DIVIDE BY ZERO EXCEPTION
*----------------------------------------------
*/

					if($overall_lecture_class!=0)
						$overall_lecture_percent=($overall_lecture_present/$overall_lecture_class)*100;
					else
						$overall_lecture_percent=0;
					
					
					if($overall_tut_class!=0)
						$overall_tut_percent=($overall_tut_present/$overall_tut_class)*100;
					else
						$overall_tut_percent=0;
					
					
					if($overall_lab_class!=0)
						$overall_lab_percent=($overall_lab_present/$overall_lab_class)*100;
					else 
						$overall_lab_percent=0;
					

			

		
/*----------------------------------------------
*	 UPDATING OVERALL RECORD 
*----------------------------------------------
*/						
					if($overall_lab_percent==0 && $overall_tut_percent==0 && $overall_lecture_percent==0)
						$overall_percent=0.00;
					
					else if($overall_lab_percent!=0 && $overall_tut_percent!=0 && $overall_lecture_percent!=0)
						$overall_percent=($overall_lab_percent+$overall_tut_percent+$overall_lecture_percent)/3;
						
					else if($overall_lab_percent==0 && $overall_lecture_percent==0 && $overall_tut_percent!=0)
					 $overall_percent= $overall_tut_percent;
				 
					else if($overall_lab_percent==0 && $overall_tut_percent==0 && $overall_lecture_percent!=0 )
					 $overall_percent= $overall_lecture_percent;
				 
					else if($overall_lecture_percent==0 && $overall_tut_percent==0 && $overall_lab_percent!=0)
					 $overall_percent= $overall_lab_percent;
				 
					else if($overall_lab_percent==0 && $overall_lecture_percent!=0 && $overall_tut_percent!=0)
					 $overall_percent= ($overall_tut_percent+$overall_lecture_percent)/2;
				 
					else if($overall_tut_percent==0 && $overall_lecture_percent!=0 && $overall_lab_percent!=0)
					 $overall_percent= ($overall_lab_percent+$overall_lecture_percent)/2;
				 
					else if($overall_lecture_percent==0 && $overall_lab_percent!=0 && $overall_tut_percent!=0)
					 $overall_percent= ($overall_tut_percent+$overall_lab_percent)/2;
				 
					
					$query_update_overall_values="UPDATE `attendence-semester-".$semester."` SET `overall-lecture-percent`=".$overall_lecture_percent.",`overall-tut-percent`=".$overall_tut_percent.",`overall-lab-percent`=".$overall_lab_percent.",`overall-percent`=".$overall_percent." WHERE `rollnumber`=".$rollnumber;
					$query_run_update_overall_values=mysqli_query($connection,$query_update_overall_values);
				
	}		
 ?>
 </body>
 </html>