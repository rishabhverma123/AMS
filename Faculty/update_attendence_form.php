<!--
/*----------------------------------------------
*	UPDATE ATTENDENCE PAGE NOT COMPLETE YET
*----------------------------------------------
*/
-->



<?php
	session_start();
	require "../included/connection.php"; 
	 $username=$_SESSION['username'];
	 $semester=$_SESSION['semester'];
	 $date=$_SESSION['date'];
	 $batch=$_SESSION['batch'];
	 $subject_code=$_SESSION['subject_code'];

	global $connection;
	global $semester;

			
	
	if(isset($_POST['submit']))
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
		 echo "<script type='text/javascript'>
			  alert('ATTENDENCE UPDATED SUCCESSFULLY')
			   </script>";
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
			$query_restriction_table="SELECT * FROM `restriction-semester-".$semester."` WHERE `rollnumber`='".$rollnumber2."' AND 	`date`='".$date."' AND `subjectcode`= '".$subject_code.$batch1."'";
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
					while($row1=mysqli_fetch_assoc($query_run_updated_attendence))
					{
						$present=$row1[''.$subject_code.$batch1.'-tp'];
						$present=$present+1;
						
						$query_update_new_attendence="UPDATE `attendence-semester-".$semester."` SET `".$subject_code.$batch1."-tp`=".$present." WHERE `rollnumber`='".$rollnumber2."'";
						$query_new_attendence=mysqli_query($connection,$query_update_new_attendence);
						
						
						$query_delete_from_restriction_table="DELETE FROM `restriction-semester-".$semester."`  WHERE `rollnumber`='".$rollnumber2."' AND `date`='".$date."' AND `subjectcode`= '".$subject_code.$batch1."'"; 
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
				
				$query_insert_restriction_table_if_absent="INSERT INTO `restriction-semester-".$semester."`(`rollnumber`, `date`, `subjectcode`) VALUES ('".$rollnumber2."', '".$date."', '".$subject_code.$batch1."')";
				$query_run_insert=mysqli_query($connection,$query_insert_restriction_table_if_absent);
			}
		
			  update_overall_attendence($rollnumber2);  
	}
 ?>

 <!doctype html>
 <html>
    <head>
	 <title>
		UPDATE ATTENDENCE
	 </title>
	  <style>
		 #attendence_form{
			 height:500px;width:1000px;position:absolute;top:70px;left:190px;
			
		 }
		 #div1{
			 background-color:#ECECEA;width:1400px;height:700px;
		 }
		 #form{
			 height:100%;
			 width:1000px;
			 padding:30px;
			 margin:auto;
			 background-color:black;
			 opacity:0.6;
			 position:absolute;top:0px;left:0px;
			 color:white;
			 font-size:65px;
			 font-weight:600px;
			 overflow:auto;
			 font-family:footlight mt light;
		 }
		 .button{background-color:white;border:none;color:#062f4f;font-size:30px;font-weight:900;
		border-radius:15px 15px 15px 15px;width:300px;height:40px;-webkit-transition-duration: 0.6s;
			transition-duration: 0.6s;position:absolute;left:300px;bottom:20px;}
		.button:hover{background-color:#062f4f;border:2px solid #062f4f;color:white;font-size:15px;border-radius:4px;}
		th{
			font-size:20px;
			color:white;
			font-family:consolas;
		}
		td{
			  padding:100px;
			font-size:20px;
			color:white;
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
	  </style>
	   <link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	 
    </head>
 <body>
	<div class="container-fluid" id="div1">
	<div id="attendence_form" style="margin-top:100px;overflow:auto;">
	<img src="images/biet.jpg" style="height:500px;width:1000px;"/>
		<div id="form">
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form-horizontal ac-custom ac-checkbox ac-cross">
		
			 <table border:collapse>
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
								
								
								$query1="SELECT * FROM `restriction-semester-".$semester."` WHERE `rollnumber`='".$row['rollnumber']."' AND `date`='".$date."' AND `subjectcode`= '".$subject_code.$batch1."'";
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
								
								
								$query1="SELECT * FROM `restriction-semester-".$semester."` WHERE `rollnumber`='".$row['rollnumber']."' AND 	`date`='".$date."' AND `subjectcode`= '".$subject_code.$batch1."'";
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
								
								
								$query1="SELECT * FROM `restriction-semester-".$semester."` WHERE `rollnumber`='".$row['rollnumber']."' AND 	`date`='".$date."' AND `subjectcode`= '".$subject_code.$batch."'";
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
		 </div>
		<button class="button" type="submit" name="submit_attendence" value="SUBMIT">Submit</button>
		 </form>
		</div>
	 </div>
	 </div>
 </body>
 </html>
 
 
 
<?php
 
	function update_overall_attendence($rollnumber1)
	{
		
		global $semester;
		global $connection;
						
/*------------------------------------------------------------------------------------------
*	UPDATING OVERALL ATTENDENCE COLUMN, MIND THAT CURRENT CODE IS VALID ONLY FOR SEMESTER "{5}"
*-------------------------------------------------------------------------------------------
*/

					$query_select_subject="SELECT * FROM `attendence-semester-".$semester."` WHERE `rollnumber`=".$rollnumber1;
					$query_run_select_subject=mysqli_query($connection,$query_select_subject);
					
					$data=mysqli_fetch_assoc($query_run_select_subject);
					
					$overall_lecture_present=$data['ECS-501Lecture-tp']+$data['EIT-505Lecture-tp']+$data['ECS-504Lecture-tp']+$data['EHU-501Lecture-tp']+$data['EIT-501Lecture-tp']+$data['ECS-502Lecture-tp'];
					$overall_tut_present=$data['ECS-501tut-tp']+$data['EIT-505tut-tp']+$data['ECS-504tut-tp']+$data['EHU-501tut-tp']+$data['EIT-501tut-tp']+$data['ECS-502tut-tp'];
					$overall_lab_present=$data['EIT-551lab-tp']+$data['EIT-552lab-tp']+$data['EIT-553lab-tp']+$data['EIT-554lab-tp'];
					
					
					
					$overall_lecture_class=$data['ECS-501Lecture-tc']+$data['EIT-505Lecture-tc']+$data['ECS-504Lecture-tc']+$data['EHU-501Lecture-tc']+$data['EIT-501Lecture-tc']+$data['ECS-502Lecture-tc'];
					$overall_tut_class=$data['ECS-501tut-tc']+$data['EIT-505tut-tc']+$data['ECS-504tut-tc']+$data['EHU-501tut-tc']+$data['EIT-501tut-tc']+$data['ECS-502tut-tc'];
					$overall_lab_class=$data['EIT-551lab-tc']+$data['EIT-552lab-tc']+$data['EIT-553lab-tc']+$data['EIT-554lab-tc'];
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
				 
					
					$query_update_overall_values="UPDATE `attendence-semester-".$semester."` SET `overall-lecture-percent`=".$overall_lecture_percent.",`overall-tut-percent`=".$overall_tut_percent.",`overall-lab-percent`=".$overall_lab_percent.",`overall-percent`=".$overall_percent." WHERE `rollnumber`=".$rollnumber1;
					$query_run_update_overall_values=mysqli_query($connection,$query_update_overall_values);
	}
 
?>
 
 
 
 
 
 
 
 
 
 
 
 
 