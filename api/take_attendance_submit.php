<?php

	require_once "../connection.php";
	$response=array('error'=>false);

	$semester=$_POST['semester'];
	$date=$_POST['date'];
	$subject_code=$_POST['subject_code'];
	$batch=$_POST['batch'];

	if(isset($_POST['date']) && isset($_POST['subject_code']) && isset($_POST['batch']) && isset($_POST['semester']))
	{
		$roll_nums=array();

		foreach (array_keys($_POST) as $key)
		{
			$count=0;
			if(preg_match('~[0-9]~',$key))
			{
				array_push($roll_nums,$key);
			}
		}

		foreach ($roll_nums as $roll)
		{
			if($batch=="Lecture")
			{
				take_attendance($roll,$batch);
				update_overall_attendance($roll);
			}else if($batch=="Tut-t1" || $batch=="Tut-t2" || $batch=="Lab-t1" || $batch=="Lab-t2")
			{
				take_attendance($roll,substr($batch,0,3));
				update_overall_attendance($roll);
			}
		}

		echo "updated";
	}

	function update_overall_attendance($rollnumber)
	{
		global $semester;
		global $connection;
					$query_select_subject="SELECT * FROM `attendence-semester-".$semester."` WHERE `rollnumber`=".$rollnumber;
					$query_run_select_subject=mysqli_query($connection,$query_select_subject);
					
					$data=mysqli_fetch_assoc($query_run_select_subject);
					
					if($semester==1)
					{
						
					}
					else if($semester==2)
					{
						
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
						$overall_tut_class=$data['ECS-501tut-tc']+$data['EIT-505tut-tc']+$data['ECS-504tut-tc']+$data['EHU-501tut-tc']+$data['EIT-501tut-tc']+$data['ECS-502tut-tc'];
						$overall_lab_class=$data['EIT-551lab-tc']+$data['EIT-552lab-tc']+$data['EIT-553lab-tc']+$data['EIT-554lab-tc'];
					}
					else if($semester==6)
					{
						
					}
					else if($semester==7)
					{
						
					}
					else if($semester==8)
					{
						
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


	function take_attendance($rollnumber,$batch1)
	{
		  global $subject_code;
		  global $batch;
		  global $connection;
		  global $semester;
		  global $date;
		

			if($_POST[$rollnumber]=='true')
			{
				$query_selecting_column_of_particular_subjectcode="SELECT `".$subject_code.$batch1."-tp`,`".$subject_code.$batch1."-tc` FROM `attendence-semester-".$semester."` WHERE `rollnumber`='".$rollnumber."'";
				$query_run_selecting_column_of_particular_subjectcode=mysqli_query($connection,$query_selecting_column_of_particular_subjectcode);
			//	echo $query_selecting_column_of_particular_subjectcode;
				if(mysqli_row)

				while($row1=mysqli_fetch_assoc($query_run_selecting_column_of_particular_subjectcode))
				{
					$present=$row1[''.$subject_code.$batch1.'-tp'];
					$class=$row1[''.$subject_code.$batch1.'-tc'];
				
					$present++;
					$class++;
				
				}
			}
			else
			{
				$query_restriction_table="INSERT INTO `restriction-semester`(`rollnumber`,`date`,`subjectcode`) VALUES ('".$rollnumber."','".$date."','".$subject_code."".$batch1."')";
				$query_run=mysqli_query($connection,$query_restriction_table);				
				
				
				$query2="SELECT `".$subject_code.$batch1."-tp`,`".$subject_code.$batch1."-tc` FROM `attendence-semester-".$semester."` WHERE `rollnumber`=".$rollnumber;
				$query_run2=mysqli_query($connection,$query2);
				
				
				while($row1=mysqli_fetch_assoc($query_run2))
				{
					$present=$row1[''.$subject_code.$batch1.'-tp'];
					$class=$row1[''.$subject_code.$batch1.'-tc'];
					$class++;
				}
			}	

			
			$query_update_new_attendence="UPDATE `attendence-semester-".$semester."` SET `".$subject_code.$batch1."-tp`=".$present.",`".$subject_code.$batch1."-tc`=".$class." WHERE `rollnumber`=".$rollnumber;
			$query_new_attendence=mysqli_query($connection,$query_update_new_attendence);
			
	}




	

?>