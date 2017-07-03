
<?php
	require "../included/connection.php";
	if(isset($_POST['submit-faculty-registration']))
	{
		$id=test_input($_POST['id']);
		 $name=test_input($_POST['name']);
		  $mobile=test_input($_POST['mobile']);
		   $email=test_input($_POST['email']);
		    $password=test_input($_POST['password']);
		     $subject1=test_input($_POST['subject1']);
		      $subject2=test_input($_POST['subject2']);
		     $subject3=test_input($_POST['subject3']);
		    $subject4=test_input($_POST['subject4']);
		   $subject5=test_input($_POST['subject5']);
		  $subject6=test_input($_POST['subject6']);
		 $subject7=test_input($_POST['subject7']);
		$subject8=test_input($_POST['subject8']);

		if(!empty($id) &&!empty($name) &&!empty($password))
		{
			if($subject1=="")
			{
			$subject1="NULL";
			
			}
		else
		{
			$subject1=$subject1;
			
		}

		if($subject2=="")
		{
			$subject2="NULL";
			
		}
		else
		{				
			$subject2=$subject2;
					
		}
		if($subject3=="")
		{	
			$subject3="NULL";
			
		}

		else
		{				
			$subject3=$subject3;
					
		}
		if($subject4=="")
		{
			$subject4="NULL";
			
		}
		else
		{
			$subject4=$subject4;
			

		}

		if($subject5=="")
		{
			$subject5="NULL";
			
		}
		else
		{				
			$subject5=$subject5;
						
		}

		if($subject6=="")
		{
			$subject6="NULL";
			
		}
		else
		{
			$subject6=$subject6;
			
		}

		if($subject7=="")
		{
			
			$subject7="NULL";

		}
		else
		{
			$subject7=$subject7;
			
		}

		if($subject8=="")
		{
			$subject8="NULL";

		}
		else
		{
			$subject8=$subject8;
			
		}
			$query="INSERT INTO `faculty-detail` (id,name,mobile,email,password,subject1,subject2,subject3,subject4,subject5,subject6,subject7,subject8) VALUES ('".$id."','".$name."','".$mobile."','".$email."','".$password."','".$subject1."','".$subject2."','".$subject3."','".$subject4."','".$subject5."','".$subject6."','".$subject7."','".$subject8."')";
			$result=mysqli_query($connection,$query);
			if($result)
			{
					echo "<script type='text/javascript'>
					alert('REGISTRATION SUCCESSFULL')
					window.location.href='hod_after_login.php';
					</script>";
					

			}else
			{
				echo "<script type='text/javascript'>
					alert('SOMETHING WENT WRONG')
					window.location.href='hod_after_login.php';
					</script>";
					
			}

			}else
			{
				echo "<script type='text/javascript'>
				alert('either id,name or password is empty')
				window.location.href='hod_after_login.php';
				</script>";
				
			}
	}


	function test_input($data) {
		$data = trim($data);
		  $data = stripslashes($data);
		  $data = htmlspecialchars($data);
		return $data;
	}

?>