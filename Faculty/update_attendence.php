<b>APPLY RESTRICTION ON ATTENDENCE VIA JS CALENDER<b>

<br/>
<br/>
<br/>
<?php
  require "../included/connection.php"; 
   session_start();
   $username=$_SESSION['username'];
  $semester=$_SESSION['semester'];
?>

<!doctype html>
<html>
	<head>-
		<title>
			UPDATE ATTENDENCE
		</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="css/calender_style.css">
		  <link rel="stylesheet" href="/resources/demos/style.css">
		  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		  <script>
			  var date=new Date("<?php echo $current_date ?>");
			  date.setDate(date.getDate()-10);
			  $( function() {
				$( "#date_picker" ).datepicker({minDate:date,
						   changeMonth: true, showOtherMonths: true, selectOtherMonths: true,
						   buttonImage:'http://www.snaphost.com/jquery/calendar.gif',buttonImageOnly: true});
			  } );
		  </script>
		<style>
			#take_attendence{
				height:600px;width:1000px;position:absolute;top:150px;left:190px;
			}
			#div{
				background-color:#ECECEA;width:1400px;height:800px;
			}
			#form{
				width:400px;
				height:450px;
				position:absolute;
				left:300px;
				top:40px;
				padding:20x;
				margin:auto;
				z-index:10;
				background-color:white;
				overflow:auto;
				opacity:0.95;
				padding:20px;
				font-size:20px;
				font-weight:1200;
				font-family:Footlight MT Light;
				border-radius:20px 20px 20px 20px;
			}
			.button{background-color:#062f4f;border:none;color:white;font-size:20px;font-weight:10;
			border-radius:4px;width:300px;height:40px;-webkit-transition-duration: 0.6s;position:absolute;
			bottom:30px;
				transition-duration: 0.6s;margin-left:10px;}
			.button:hover{background-color:white;border:2px solid #008CBA;color:black;font-size:20px;border-radius:4px;}
			.col{
				background-color:green;
			}
			input[type="text"]{
				font-size:20px;
				color:blue;
				font-weight:500;
			}
		</style>
	</head>
	
	<body>
		<?php	include "head.php"; ?>
			
		<div class="container-fluid" id="div">
			<div id="take_attendence">
				<img src="images/2334.jpg" style="height:600px;width:1000px;"/> 
				<div id="form">
					<form action="<?php $_SERVER['PHP_SELF']?>" method="POST" class="form-horizontal">
						SUBJECT CODE:
						<select name="subject_code" class="form-control" placeholder="Select Subject Code" class="col">
							<option value="select"> --SELECT--</option>
							<?php
								global $username;
								global $connection;
								global $semester;
								
								$query="SELECT * FROM `faculty-detail` WHERE `id`='".$_SESSION['username']."'";
								
								$run=mysqli_query($connection, $query);
								$row=mysqli_fetch_assoc($run);
								
								for($i=1;$i<9;$i++)
								{
									if($row['subject'.$i]=="")
										break;
									
									if($row['subject'.$i]!=" " || $row['subject'.$i]!="" )
									{
										$subject=str_split($row['subject'.$i]);
										if($subject[4]==$semester)
										{
											echo "<option value='".$row['subject'.$i]."'>".$row['subject'.$i].  "</option>";
										}	
									}
										
									
								}
							?>
						</select>
						<br/><br/>
						<select name="batch" class="form-control" placeholder="Select Batch" class="col">
							<option value="lec">	 LECTURE	</option>
							<option value="tut-t1">	 TUT-T1		</option>
							<option value="tut-t2">	 TUT-T2		</option>
							<option value="lab-t1">	 LAB-T1		</option>
							<option value="lab-t2">  LAB-T2		</option>
						</select>
						<br/><br/>
						<input type="text" name="date" id="date_picker" class="form-control" placeholder="Select Date" class="col"><br/><br/>
						<button class="button" type="submit" name ="submit" value ="submit">Submit</button>
					</form>
				</div>
			</div>
		</div>
			
	</body>
</html>

<?php
  	global $connection;
	global $semester;
	
	if(isset($_POST['submit']))
	{
		
		 
		 $batch=$_POST['batch'];
		 $subject_code=$_POST['subject_code'];
		 $date=$_POST['date'];
		 
		if($batch=="lec"){
		$batch="Lecture";
		}
		
			$subject_code=strtoupper($subject_code);
			$_SESSION['subject_code']=$subject_code;
			$_SESSION['batch']=$batch;
			$_SESSION['date']=$date;
		
			if($_POST['batch']=="lec")
			{
				$_POST['batch']="Lecture";
			}
			header('Location:update_attendence_form.php');

	}
	
?>








