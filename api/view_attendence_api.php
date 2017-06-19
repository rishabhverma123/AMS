<?php
require_once "../connection.php";
 $response=array();
 $output=array('ams'=>array());
 $output['error']=false;
 
	if(isset($_POST['semester'])  && isset ($_POST['type'])){
		
			global $connection;
			include "../functions_view_attendence_hod_login.php";
			$semester=$_POST['semester'];
		
			if($_POST['type']=="student" && isset($_POST['rollnumber'])){
						
				$rollnumber=$_POST['rollnumber'];
				$query="SELECT * FROM `attendence-semester-".$semester."` WHERE `rollnumber`='".$rollnumber."'";
				$query_run=mysqli_query($connection,$query);	
			}
			else{
					
				$query="SELECT * FROM `attendence-semester-".$semester."`";
				$query_run=mysqli_query($connection,$query);
			}
		
		
		
			if($semester=="1")
				view_attendence_semester_1();
			
			if($semester=="2")
				view_attendence_semester_2();
			
			if($semester=="3"){
				
				// if($_POST['type']=="student" && isset($_POST['rollnumber'])){
					
					// $rollnumber=$_POST['rollnumber'];
					// $query="SELECT * FROM `attendence-semester-".$semester."` WHERE `rollnumber`='".$rollnumber."'";
					// $query_run=mysqli_query($connection,$query);	
				// }
				// else{
						
					// $query="SELECT * FROM `attendence-semester-".$semester."`";
					// $query_run=mysqli_query($connection,$query);
				// }	
					while($row=mysqli_fetch_assoc($query_run)){
							// $query2="SELECT * FROM `attendence-semester-".$semester."` WHERE `rollnumber`='".$row['rollnumber']."'";
							// $query2_run=mysqli_query($connection,$query2);
							
							if($row['ECS-301Lecture-tc']==0)
								$data1=0;
							else 
								$data1=round((($row['ECS-301Lecture-tp']/$row['ECS-301Lecture-tc'])*100),2);
							
							if($row['ECS-302Lecture-tc']==0)
								$data2=0;
							else
								$data2=round((($row['ECS-302Lecture-tp']/$row['ECS-302Lecture-tc'])*100),2);
							
							if($row['ECS-304Lecture-tc']==0)
								$data3=0;
							else
								$data3=round((($row['ECS-304Lecture-tp']/$row['ECS-304Lecture-tc'])*100),2);
							
							if($row['ECS-305Lecture-tc']==0)
								$data4=0;
							else
								$data4=round((($row['ECS-305Lecture-tp']/$row['ECS-305Lecture-tc'])*100),2);
							
							if($row['EAS-301Lecture-tc']==0)
								$data5=0;
							else 
								$data5=round((($row['EAS-301Lecture-tp']/$row['EAS-301Lecture-tc'])*100),2);
							
							if($row['EHU-302Lecture-tc']==0)
								$data6=0;
							else
								$data6=round((($row['EHU-302Lecture-tp']/$row['EHU-302Lecture-tc'])*100),2);
							
							if($row['ECS-351lab-tc']==0)
								$data7=0;
							else
								$data7=round((($row['ECS-351lab-tp']/$row['ECS-351lab-tc'])*100),2);
						
							if($row['ECS-352lab-tc']==0)
								$data8=0;
							else
								$data8=round((($row['ECS-352lab-tp']/$row['ECS-352lab-tc'])*100),2);
							
							if($row['ECS-353lab-tc']==0)
								$data9=0;
							else
								$data9=round((($row['ECS-353lab-tp']/$row['ECS-353lab-tc'])*100),2);
							
							//$response=array('error'=>false);
							
							/*
							*sending name
							*/
							$query_name="SELECT * FROM `name-roll` WHERE `rollnumber`='".$row['rollnumber']."'";
							$query_run_name=mysqli_query($connection,$query_name);
							$fetch=mysqli_fetch_assoc($query_run_name);
							
							$response['rollnumber']=$row['rollnumber'];
							$response['name']=$fetch['name'];
							$response['ecs-301']=$data1;
							$response['ecs-302']=$data2;
							$response['ecs-304']=$data3;
							$response['ecs-305']=$data4;
							$response['eas-301']=$data5;
							$response['ehu-302']=$data6;
							$response['ecs-351']=$data7;
							$response['ecs-352']=$data8;
							$response['ecs-353']=$data9;
							
							$output['ams'][]=$response;			
							$row++;
					
					}
		
			}
	
			
			if($semester=="4"){
					//view_attendence_semester_4();
				
					while($row=mysqli_fetch_assoc($query_run)){
					// $query2="SELECT * FROM `attendence-semester-".$semester."` WHERE `rollnumber`='".$row['rollnumber']."'";
					// $query2_run=mysqli_query($connection,$query2);
					
					if($row['ECS-401Lecture-tc']==0)
						$data1=0;
					else 
						$data1=round((($row['ECS-401Lecture-tp']/$row['ECS-401Lecture-tc'])*100),2);
					
					if($row['ECS-402Lecture-tc']==0)
						$data2=0;
					else
						$data2=round((($row['ECS-402Lecture-tp']/$row['ECS-402Lecture-tc'])*100),2);
					
					if($row['EIT-401Lecture-tc']==0)
						$data3=0;
					else
						$data3=round((($row['EIT-401Lecture-tp']/$row['EIT-401Lecture-tc'])*100),2);
					
					if($row['EIT-402Lecture-tc']==0)
						$data4=0;
					else
						$data4=round((($row['EIT-402Lecture-tp']/$row['EIT-402Lecture-tc'])*100),2);
					
					if($row['EOE-041Lecture-tc']==0)
						$data5=0;
					else 
						$data5=round((($row['EOE-041Lecture-tp']/$row['EOE-041Lecture-tc'])*100),2);
					
					if($row['EHU-401Lecture-tc']==0)
						$data6=0;
					else
						$data6=round((($row['EHU-401Lecture-tp']/$row['EHU-401Lecture-tc'])*100),2);
					
					if($row['EIT-451lab-tc']==0)
						$data7=0;
					else
						$data7=round((($row['EIT-451lab-tp']/$row['EIT-451lab-tc'])*100),2);
				
					if($row['ECS-452lab-tc']==0)
						$data8=0;
					else
						$data8=round((($row['ECS-452lab-tp']/$row['ECS-452lab-tc'])*100),2);
					
					if($row['ECS-453lab-tc']==0)
						$data9=0;
					else
						$data9=round((($row['ECS-453lab-tp']/$row['ECS-453lab-tc'])*100),2);
					/*
					*sending name
					*/
					$query_name="SELECT * FROM `name-roll` WHERE `rollnumber`='".$row['rollnumber']."'";
					$query_run_name=mysqli_query($connection,$query_name);
					$fetch=mysqli_fetch_assoc($query_run_name);
					
					//$response=array('error'=>false);
					
					$response['rollnumber']=$row['rollnumber'];
					$response['name']=$fetch['name'];
					$response['ecs-401']=$data1;
					$response['ecs-402']=$data2;
					$response['eit-401']=$data3;
					$response['eit-402']=$data4;
					$response['eoe-041']=$data5;
					$response['ehu-401']=$data6;
					$response['eit-451']=$data7;
					$response['eit-452']=$data8;
					$response['eit-453']=$data9;
				
					
					$output['ams'][]=$response;			
					$row++;
						
				}
			}
			
			
			
			
			
			
			
			
			
			if($semester=="5"){
				
				while($row=mysqli_fetch_assoc($query_run)){
					// $query2="SELECT * FROM `attendence-semester-".$semester."` WHERE `rollnumber`='".$row['rollnumber']."'";
					// $query2_run=mysqli_query($connection,$query2);
					
					if($row['ECS-501Lecture-tc']==0)
						$data1=0;
					else 
						$data1=round((($row['ECS-501Lecture-tp']/$row['ECS-501Lecture-tc'])*100),2);
					
					if($row['ECS-502Lecture-tc']==0)
						$data2=0;
					else
						$data2=round((($row['ECS-502Lecture-tp']/$row['ECS-502Lecture-tc'])*100),2);
					
					if($row['ECS-504Lecture-tc']==0)
						$data3=0;
					else
						$data3=round((($row['ECS-504Lecture-tp']/$row['ECS-504Lecture-tc'])*100),2);
					
					if($row['EIT-501Lecture-tc']==0)
						$data4=0;
					else 
						$data4=round((($row['EIT-501Lecture-tp']/$row['EIT-501Lecture-tc'])*100),2);
					
					if($row['EIT-505Lecture-tc']==0)
						$data5=0;
					else
						$data5=round((($row['EIT-505Lecture-tp']/$row['EIT-505Lecture-tc'])*100),2);
					
					if($row['EHU-501Lecture-tc']==0)
						$data6=0;
					else
						$data6=round((($row['EHU-501Lecture-tp']/$row['EHU-501Lecture-tc'])*100),2);
					
					if($row['EIT-551lab-tc']==0)
						$data7=0;
					else
						$data7=round((($row['EIT-551lab-tp']/$row['EIT-551lab-tc'])*100),2);
				
					if($row['EIT-552lab-tc']==0)
						$data8=0;
					else
						$data8=round((($row['EIT-552lab-tp']/$row['EIT-552lab-tc'])*100),2);
					
					if($row['EIT-553lab-tc']==0)
						$data9=0;
					else
						$data9=round((($row['EIT-553lab-tp']/$row['EIT-553lab-tc'])*100),2);
					
					if($row['EIT-554lab-tc']==0)
						$data10=0;
					else
						$data10=round((($row['EIT-554lab-tp']/$row['EIT-554lab-tc'])*100),2);
					//$response=array('error'=>false);
					
					/*---------------
					*sending name
					*---------------
					*/
					$query_name="SELECT * FROM `name-roll` WHERE `rollnumber`='".$row['rollnumber']."'";
					$query_run_name=mysqli_query($connection,$query_name);
					$fetch=mysqli_fetch_assoc($query_run_name);
					
					$response['rollnumber']=$row['rollnumber'];
					$response['name']=$fetch['name'];
					$response['ecs-501']=$data1;
					$response['ecs-502']=$data2;
					$response['ecs-504']=$data3;
					$response['eit-501']=$data4;
					$response['eit-505']=$data5;
					$response['ehu-501']=$data6;
					$response['eit-551']=$data7;
					$response['eit-552']=$data8;
					$response['eit-553']=$data9;
					$response['eit-554']=$data10;
					
					$output['ams'][]=$response;			
					$row++;
						
				}
			}
				
			
			if($semester=="6")
				view_attendence_semester_6();
			
			if($semester=="7")
				view_attendence_semester_7();
			
			if($semester=="8")
				view_attendence_semester_8();

			
		echo json_encode($output);
	}
	else{
		 $response=array('error'=>true);
		 $response['error_msg']="semester credentials did not matched";
		echo  json_encode($response);
	}

?>