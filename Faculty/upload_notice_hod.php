

<!--
/*----------------------------------------------
*	Here auth number
*	1-hod,
*	2-faculty
*	3-student
*----------------------------------------------
*/
-->
<?php
	require_once "../included/connection.php";
	session_start();
	require '../included/auth_check.php';
	$auth_number=$_SESSION['auth_number'];
	//print_r($_SESSION);
	
?>

<html>
	<head>
		<title>UPLOAD</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="../js/bootstrap.min.js"></script>
				<style>
					#result{
						overflow:auto;
						height:230%;
						background-image:url(../images/pencil3.jpg);
					}
				  .sidebar-nav {
					  
					margin-left:-10%;
					padding: 0;
					height:100%;
					width:100%;
					font-size:10px;
				  }
				  .sidebar-nav .navbar ul {
					float: none;
					display: block;
				  }
				  .sidebar-nav .navbar li {
					float: none;
					display: block;
				  }
				  .sidebar-nav .navbar li a {
					padding-top: 20px;
					padding-bottom: 20px;
				  }
				   a:hover{
					  background-color:green;
				  }


				  .carousel-inner > .item > img,
				  .carousel-inner > .item > a > img {
					  width: 100%;
					  margin:0;
					  height:100%;
				  }
				  #caption{
					  font-size:50px;
					  position:absolute;
					  top:20%;
					  font-weight:700;
					  font-family:Times new roman;
					  
				  }
				  caption1{
					  font-size:20px;
					  margin-top:10px;	  
					  }
				  #form{
					  margin-left:10%;
					  padding:15%;
					  overflow-y:auto;
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
				  #remark{
					  color:red;
				  }
				  #view{
					  background-color:white;
					  width:100%;
					  margin-top:10%;
				  }
				  #table{
					  margin-top:0;
				  }
				  h2{
					  color:#76323F;
				  }
				  li{
					  font-size:15px;
				  }
				  #nav{
					  font-size:15px;
					  color:black;
					  
				  }
				  label{
					  color:black;
				  }
				  #div{
					background-image:url(images/texture6.jpg);width:1400px;height:1600px;
					
				}
				#form1{
					padding:50px;
					margin-top:20px;
					margin-left:200px;
					width:600px;
					height:600px;
					color:black;
					text-align:left;
					background-color:white;
					font-weight:700;
					font-size:15px;
					opacity:0.8;
					border-radius:20px 20px 20px 20px;
					
				}
				#para{
					width:1000px;
					height:70px;
					background-color:#D9853B;
					text-align:center;
					font-size:30px;
					color:white;
					font-weight:700;
					padding:15px;
					font-family:Footlight MT Light;
				}
				#remark1{
					color:black;
				}
				#form1{
					padding:50px;
					margin-top:20px;
					margin-left:200px;
					width:600px;
					height:600px;
					color:black;
					text-align:left;
					background-color:white;
					font-weight:700;
					font-size:15px;
					opacity:0.8;
					border-radius:20px 20px 20px 20px;
					
				}
				#para{
					width:1000px;
					height:70px;
					background-color:#D9853B;
					text-align:center;
					font-size:30px;
					color:white;
					font-weight:700;
					padding:15px;
					font-family:Footlight MT Light;
				}
				#remark1{
					color:black;
				}
				#button{
					margin-left:10%;
					width:70%;
				}

			  
			  
			</style>
		  <script>
			 $('#SELECT').submit(function() { // catch the form's submit event
				$.ajax({ // create an AJAX call...
					data: $(this).serialize(), // get the form data
					type: $(this).attr('method'), // GET or POST
					url: $(this).attr('action'), // the file to call
					success: function(response) { // on success..
						$('#result').html(response); // update the DIV
					}
				});
				return false; // cancel original event to prevent form submitting
			});
			  }
		  </script>
	  </head>
	<body>
		<div>
		<?php include_once("../included/bundelkhand_header.html");?>

		<nav class="navbar navbar-inverse" style="margin-bottom:0px;padding-left:0px;padding-top:0px;">
			<div class="container-fluid">
				<div class="navbar-header">
					<a class="navbar-brand" href="#">Attendance Management System</a>
				</div>
				<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="hod_after_login.php">Home</a></li>
				</ul>
					<a
						href="../included/logout.php">
						<button
							class="btn btn-danger navbar-btn navbar-right"
							data-toggle="modal"
							data-target="#">Logout &nbsp;
						</button>
					</a>

				<form id ="create" class="navbar-form navbar-left" action="<?php echo $_SERVER['PHP_SELF']?>" method ="POST" onsubmit="return parent.scrollTo(0,1500); return true" >
				  <div class="form-group">
						<label style="color:white;"> Select Semester </label>			
						<select name="hod-choose-semester" class="form-control" required>
					
							<option value="1"> 1  </option>
							<option value="2"> 2 </option>
							<option value="3"> 3 </option>
							<option value="4"> 4 </option>
							<option value="5"> 5 </option>
							<option value="6"> 6 </option>
							<option value="7"> 7 </option>
							<option value="8"> 8 </option>

						</select>
				  </div>
				  <button class="btn btn-default" type="submit" name="submit" value="SELECT">Submit</button>
				</form>
			</div>
		</nav>
		
		
		<div class="container-fluid">
		<div class="row" style="height:30%;">
				<div class="col-sm-3 col-lg-2"  style="background-color:#f0ebeb;">
				  <nav class="navbar navbar-nav navbar-default navbar-fixed-side navbar-light"   style="background-color:#f0ebeb;height:250%;width:100%;margin-left:0px;">
					  <ul class="nav navbar-nav">
						<li><a href="faculty_detail.php">Faculty Details</a></li>
						<li><button class="btn navbar-btn btn-link" data-toggle="modal" data-target="#modal1" style="text-decoration:none;font-size:16px;">Faculty Registration</button></li>
						<li><a href="student_details.php">Student Details</a></li>
						<li><a href="student_reg.php">Student Registration</a></li>
						<li><a href="view_att.php">View Attendance</a></li>
						<li><a href="defaulters.php">Defaulters</a></li>
						<li><a href="upload_notice_hod.php">Upload notice</a></li>
					  </ul>
				  </nav>
				</div>
			<div class="col-sm-9 col-lg-10" style="height:250%;overflow:auto;" id="result">
				<h2 style="color:black" align="center">Upload Notice</h2><hr style="color:black;"/>
				<br/></br>
					
				<div id="form1">
					<form action=<?php echo $_SERVER['PHP_SELF']?> method="post" enctype="multipart/form-data">
						<div id="form-group"> 					
							 <label id="remark1" class="control-label col-sm-4">&nbsp;Enter File Name</label>
							 <div class="col-sm-8">
								<input type='text' name='name' class="form-control" placeholder="enter name of file" required> <br/>
							 </div>
						</div>
					 <?php
							if($auth_number==1)
							{
								echo "
									<div id='form-group'> 					
									 <label id='remark1' class='control-label col-sm-4'>&nbsp;Select Receipent</label>
									 <div class='col-sm-8'>
										
										<select class='form-control' name='receipent'>
											<option  value='faculty'>Faculty</option>
											<option  value='student'>Student</option>
										</select><br>
									 </div>
								</div>
									";
							}
						?>
						<div class="form-group">
							<label id="remark1" class="control-label col-sm-4"> Select Semester </label>	
							<div class="col-sm-8">		
								<select name="semester" class="form-control" required>
							
									<option value="1"> 1  </option>
									<option value="2"> 2 </option>
									<option value="3"> 3 </option>
									<option value="4"> 4 </option>
									<option value="5"> 5 </option>
									<option value="6"> 6 </option>
									<option value="7"> 7 </option>
									<option value="8"> 8 </option>

								</select><br>
							</div>
						</div>
							
						<div id="form-group"> 					
							 <label id="remark1" class="control-label col-sm-4">&nbsp;Enter expiry date</label>
							 <div class="col-sm-8">
								<input type='text' name='expiry_date' class="form-control" placeholder="enter expiry date" required> <br/>
							 </div>
						</div><br/>
						
						 <div id="form-group"> 					
							 <div class="col-sm-8">
								 <input type="file" name="file" id="file" />
								 <br/><br/>
								 <button id="button" class="btn btn-default" type="submit" value="Upload File" name="submit">Upload file</button>
							 </div>
						 </div>

					</form>
				</div>		
			</div>
		</div>	
		
	</body>
</html>


<?php

	if(isset($_POST['submit']))
	{
	  if(isset($_FILES['file']))
	  {
		$file=$_FILES['file'];
		$filename=$file['name'];
		$filetype=$file['type'];
		$filetmp_name=$file['tmp_name'];
		$filesize=$file['size'];
		$file_ext=explode('.',$filename);
		$file_ext=strtolower(end($file_ext));
		
		$allowed=array('txt','doc','docx','pdf');
		if(in_array($file_ext,$allowed))
		{
			if($filesize<=2*1024*1024)			// file of max size 2mb is allowed
			{
				$file_new_name=uniqid('', true).'.'.$file_ext;	//unique id with which file will be saved in database
				$file_destination="uploads/".$file_new_name;
				
				if(move_uploaded_file($filetmp_name,$file_destination))
				{
					if($auth_number==1 && $_POST['receipent']=="student")
					{
						$viewer=3;
					}else if($auth_number==1 && $_POST['receipent']=="faculty")
						$viewer=2;
					else if($auth_number==2)
						$viewer=3;
						
					
					$date=date("d/m/y");
					$expiry_date=$_POST['expiry_date'];
					$name=$_POST['name'];
					$semester=$_POST['semester'];
					$query="INSERT INTO `uploads` (`uploader`, `expected_viewer`, `semester`, `upload_date`, `expiry_date`, `file_name`, `file_path`) VALUES('".$auth_number."' , '".$viewer."' , '".$semester."' , '".$date."' , '".$expiry_date."' , '".$name."' , '".$file_destination."')";
					$query_run=mysqli_query($connection,$query);
					echo $query;
					if($query_run)
					{
						echo "<script type='text/javascript'>
						alert('file upload successfully')
						</script>";
					}
				}
				else
					echo "<script type='text/javascript'>
						alert('Unable to upload file check file size')
						</script>";
			}
			else
				echo "<script type='text/javascript'>
						alert('File should be less than 2mb')
						</script>";
		}
		else
			echo "<script type='text/javascript'>
						alert('Only `pdf` and `doc` file type allowed')
						</script>";
	  }
	}
		 
		 
	?>
