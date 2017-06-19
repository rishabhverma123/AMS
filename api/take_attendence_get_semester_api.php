<?php

	 require_once "../connection.php";
	 $response=array('error'=>false);
	  
	  // $_POST['semester']=5';
	  // $_POST['id']='pg';
if(isset($_POST['semester']) && isset($_POST['id']))
{
	$id=$_POST['id'];
	$semester=$_POST['semester'];
	
	$query_id_match="SELECT * FROM `faculty-detail` WHERE `id`='".$id."'";
	$run=mysqli_query($connection,$query_id_match);
	$fetch=mysqli_fetch_assoc($run);
	
	for($i=1;$i<9;$i++)
	{
		$subject=$fetch['subject'.$i];
		$query="SELECT * FROM `subject_sem` WHERE `subject`='".$subject."' AND `sem`='".$semester."'";
		$query_run=mysqli_query($connection,$query);
		$num_rows=mysqli_num_rows($query_run);
		if($num_rows>=1)
		{
			$response['subjects'][''.$i]=$subject;
		}
	}
		echo json_encode($response);
}else{
		$response['error']=TRUE;
		$response['error_msg']="some parameter are missing sethi dhangse bhej";
		echo json_encode($response);
	}


?>