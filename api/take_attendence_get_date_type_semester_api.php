<?php

require_once "../connection.php";
$response=array('error'=>false);

	// $_POST['semester']='5';
	// $_POST['date']='22/01/2017';
	// $_POST['subject']='ecs-501';
	// $_POST['type']='tut';
	// $_POST['batch']='t1';

if(isset($_POST['semester']) && isset($_POST['date']) && isset($_POST['subject']) && isset($_POST['type']) && isset($_POST['batch']))
{
	$semester=$_POST['semester'];
	$date=$_POST['date'];
	$subject=$_POST['subject'];
	$type=$_POST['type'];
	$batch=$_POST['batch'];
	
	if($type=="lecture")
		$type="Lecture";
		
	$query="SELECT * FROM `restriction-semester` WHERE `date`='".$date."' AND `subjectcode`='".$subject."".$type."'";
	$query_run=mysqli_query($connection,$query);
	$num_rows=mysqli_num_rows($query_run);
	if($num_rows>=1)
	{
		$response['error']=true;
		$response['msg']="Attendance Already Taken";
	}
	else
	{
		if($type=="Lecture")
		{
			$query_select_roll="SELECT * FROM `student-detail` WHERE `current_semester`='".$semester."'";
			$query_run=mysqli_query($connection,$query_select_roll);	
		}
		else if(($type=="tut" && $batch=="t1") || $type=="lab" && $batch=="t1")
		{
			
			$query_select_roll="SELECT * FROM `student-detail` WHERE `current_semester`='".$semester."' AND `group-batch`='t1'";
			$query_run=mysqli_query($connection,$query_select_roll);
		}
		else if(($type=="tut" && $batch=="t2") || $type=="lab" && $batch=="t2")
		{
			
			$query_select_roll="SELECT * FROM `student-detail` WHERE `current_semester`='".$semester."' AND `group-batch`='t2'";
			$query_run=mysqli_query($connection,$query_select_roll);
		}
			
		$i=0;
		while($fetch=mysqli_fetch_assoc($query_run))
		{
			$query_select_name="SELECT * FROM `name-roll` WHERE `rollnumber`='".$fetch['rollnumber']."'";
			$query_run1=mysqli_query($connection,$query_select_name);
			while($fetch_name=mysqli_fetch_assoc($query_run1))
			{
				$response['names'][''.$i]=$fetch_name['name'];
				$fetch_name++;
			}
			
			$response['rollnumbers'][''.$i]=$fetch['rollnumber'];
			$fetch++;
			$i++;
		}
	}
	echo json_encode($response);
}
else
{
	$response['error']=TRUE;
	$response['error_msg']="some parameter are missing sethi dhangse bhej";
	echo json_encode($response);
}



?>