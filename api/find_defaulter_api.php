<?php
	require_once "../connection.php";
	 $response=array('error'=>false);
	// $_POST['semester']=5;
	 
	 $response=array();
	 $output=array('ams'=>array());
	 $output['error']=false;
 
	if(isset($_POST['semester']))
	{
		$semester=$_POST['semester'];
		$query="SELECT * FROM `attendence-semester-".$semester."` WHERE `overall-percent`<75";
		//echo $query;
		$query_run=mysqli_query($connection,$query);
		while($fetch=mysqli_fetch_assoc($query_run))
		{
			
			$query1="SELECT * FROM `name-roll` WHERE `rollnumber`='".$fetch['rollnumber']."'";
			//echo $query1;
			$query_run1=mysqli_query($connection,$query1);
			$fetch1=mysqli_fetch_assoc($query_run1);
			
			$response['rollnumber']=$fetch['rollnumber'];
			$response['name']=$fetch1['name'];
			$response['attendence']=$fetch['overall-percent'];
			
			$output['ams'][]=$response;			
			$fetch++;
		}
		
		
		echo json_encode($output);
		
	}else{
		$response['error']=TRUE;
		$response['error_msg']="some parameter are missing sethi dhangse bhej";
		echo json_encode($response);
	}
?>