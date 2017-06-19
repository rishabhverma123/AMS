<?php
	require_once "../connection.php";
	

	 $response=array('error'=>false);
	 // $_POST['username']='1';
	 // $_POST['password']='123';
	 // $_POST['type']='faculty';
	 header("Content-Type:application/json");
	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['type'])){
		
		// $username=$_POST['username'];
		// $password=$_POST['password'];
		 $type=$_POST['type'];
		if($type=='hod'){
			
			$query="SELECT * FROM `hod-detail` WHERE `username`='".$_POST['username']."' AND `password`='".$_POST['password']."'";
			$result=mysqli_query($connection,$query);
			$hod=mysqli_fetch_assoc($result);
			$row_count=mysqli_num_rows($result);
			
			if($row_count>0){
				
				$response['user']['name']=$hod['name'];
				$response['user']['username']=$hod['username'];
				$response['user']['email']=$hod['email'];
				$response['user']['mobile']=$hod['mobile'];
				//echo json_encode($response);
			
			}else{
					
				$response['error']=TRUE;
				$response['error_msg']="Credentials not matched";
				//echo json_encode($response);
			}		
		}
		
		if($type=='faculty'){
			
				$query="SELECT * FROM `faculty-detail` WHERE `id`='".$_POST['username']. "'" ."AND"."`password`='".$_POST['password']."'";
				$query_result=mysqli_query($connection,$query);
				$row_count=mysqli_num_rows($query_result);
				$fetch_assoc=mysqli_fetch_assoc($query_result);
		
				if($row_count>=1){
					
					$response['user']['id']=$fetch_assoc['id'];
					$response['user']['name']=$fetch_assoc['name'];
					$response['user']['mobile']=$fetch_assoc['mobile'];
					$response['user']['email']=$fetch_assoc['email'];
					$response['user']['subjects']['1']=$fetch_assoc['subject1'];
					$response['user']['subjects']['2']=$fetch_assoc['subject2'];
					$response['user']['subjects']['3']=$fetch_assoc['subject3'];
					$response['user']['subjects']['4']=$fetch_assoc['subject4'];
					$response['user']['subjects']['5']=$fetch_assoc['subject5'];
					$response['user']['subjects']['6']=$fetch_assoc['subject6'];
					$response['user']['subjects']['7']=$fetch_assoc['subject7'];
					$response['user']['subjects']['8']=$fetch_assoc['subject8'];
					$response['user']['subjects']['9']=$fetch_assoc['subject9'];
				}
				else{
					
					$response['error']=TRUE;
					$response['error_msg']="Credentials not matched";
					//echo json_encode($response);
				}		
		}
		if($type=='student'){
				/*
				*------------------------------------
				*username and password both are rollnumber of respective student only
				*fetched from student-detail table
				*------------------------------------
				*/
				$query="SELECT * FROM `student-detail` WHERE `rollnumber`='".$_POST['username']. "' " ."AND"." `rollnumber`='".$_POST['username']."'";
				$query_result=mysqli_query($connection,$query);
				$row_count=mysqli_num_rows($query_result);
				$fetch_assoc=mysqli_fetch_assoc($query_result);
				
				
				if($row_count>=1){
					
					$query_name="select `name` from `name-roll` where `rollnumber`='".$_POST['username']."'";
					$query_run_name=mysqli_query($connection,$query_name);
					$fetch=mysqli_fetch_assoc($query_run_name);
					
					$response['user']['name']=$fetch['name'];
					$response['user']['rollnumber']=$fetch_assoc['rollnumber'];
					$response['user']['group-batch']=$fetch_assoc['group-batch'];
					$response['user']['phonenumber']=$fetch_assoc['phonenumber'];
					$response['user']['email']=$fetch_assoc['email'];
					$response['user']['guardianphone']=$fetch_assoc['guardianphone'];
					$response['user']['current-semester']=$fetch_assoc['current_semester'];
					$response['user']['percentages']['semester-1-percent']=$fetch_assoc['semester-1-percent'];
					$response['user']['percentages']['semester-2-percent']=$fetch_assoc['semester-2-percent'];
					$response['user']['percentages']['semester-3-percent']=$fetch_assoc['semester-3-percent'];
					$response['user']['percentages']['semester-4-percent']=$fetch_assoc['semester-4-percent'];
					$response['user']['percentages']['semester-5-percent']=$fetch_assoc['semester-5-percent'];
					$response['user']['percentages']['semester-6-percent']=$fetch_assoc['semester-6-percent'];
					$response['user']['percentages']['semester-7-percent']=$fetch_assoc['semester-7-percent'];
					$response['user']['percentages']['semester-8-percent']=$fetch_assoc['semester-8-percent'];
				}
				else{
					
					$response['error']=TRUE;
					$response['error_msg']="Credentials not matched";
					//echo json_encode($response);
				}
		
				
		}
		echo json_encode($response);
	}
	else{
		$response['error']=TRUE;
		$response['error_msg']="some parameter are missing sethi dhangse bhej";
		echo json_encode($response);
	}
?>