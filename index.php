
<?php
	require_once "/included/connection.php";
	session_start();
	$_SESSION['is_loggedin']=false;
	if( isset($_POST['username']) && isset($_POST['password']))
	{
		$login_username=test_input($_POST['username']);
		$login_password=test_input($_POST['password']);
		$login_type=test_input($_POST['login_type']);
		
		/*----------------------------------------------
		*	TO CHECK ALL THE ENTRIES ARE FILLED OR NOT
		*----------------------------------------------
		*/
		if(!empty($login_username) && !empty($login_password) && !empty($login_type))
		{
			if($login_type=="hod-detail")
			{
				$query="SELECT `username` FROM `hod-detail` WHERE `username`='".$login_username. "'" ."AND"."`password`='".$login_password."'";
				$query_result=mysqli_query($connection,$query);
				$row_count=mysqli_num_rows($query_result);
			
				if($row_count>=1)
				{
					$_SESSION['username']=$login_username;
					$_SESSION['key']=$login_type;
					$_SESSION['is_loggedin']=true;
					$_SESSION['auth_number']=1;
					header('Location:Hod/hod_after_login.php');
				}
				else
				{
					echo "<script type='text/javascript'>
					alert('either username or password is incorrect')
					</script>";
				}
			}
			
			
			else if($login_type=="faculty-detail")
			{
					$query="SELECT `name` FROM `faculty-detail` WHERE `id`='".$login_username. "'" ."AND"."`password`='".$login_password."'";
					$query_result=mysqli_query($connection,$query);
					$row_count=mysqli_num_rows($query_result);
			
				if($row_count>=1)
				{
					$_SESSION['username']=$login_username;
					$_SESSION['auth_number']=2;
					$_SESSION['is_loggedin']=true;
					header('Location:Faculty/faculty_after_login.php');
				}
				else
				{
					echo "<script type='text/javascript'>
					alert('either username or password is incorrect')
					</script>";
				}
			}
			
			
			
			else if($login_type=="student-detail")
			{
				$query="SELECT * FROM `name-roll` WHERE `rollnumber`='".$login_username."' AND `dateofbirth`='".$login_password."'";
				$query_run=mysqli_query($connection,$query);
				$num_rows=mysqli_num_rows($query_run);
				if($num_rows>0)
				{
					
					if($row=mysqli_fetch_assoc($query_run))
					{
						$_SESSION['rollnumber']=$login_username;
						$_SESSION['auth_number']=3;
						$_SESSION['is_loggedin']=true;
						header('Location:/student/student_after_login.php');
					}
					else 
						echo  "<script> alert('no fetch assoc'); </script>";	
				}
				else 
					echo  "<script> alert('no num rows'); </script>";
	
		
			}
			else  
			{		
			 echo "<script type='text/javascript'>
			 alert('enter username and password')
			  </script>";
			}
		}
	}
	function test_input($data)
	{
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
    }
	
?>



<html>
    <head>
		<title>AMS Login</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<style>
		
			.carousel-inner > .item > img,
			.carousel-inner > .item > a > img {
			  width: 100%;
			  margin:0;
			  height:100%;
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
			#caption{
			  font-size:50px;
			  position:absolute;
			  top:20%;
			  font-weight:700;
			  font-family:Times new roman;  
			}
			  h3{
				  font-family:
			  }
		</style>
    </head>
	<body>
	
	<?php include_once("bundelkhand_header.html"); ?>

	<nav class="navbar navbar-inverse" style="margin-bottom:0px;padding-left:0px;padding-top:0px;">
		<div class="container-fluid">
			<div class="navbar-header">
			 <a class="navbar-brand" href="#">Attendance Management System</a>
			</div>
			<button class="btn btn-danger navbar-btn navbar-right" data-toggle="modal" data-target="#myModal">
			<span class="glyphicon glyphicon-user"></span>LogIn &nbsp;</button>
		</div>
	</nav>
	<div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" data-pause="false">
	  <!-- Indicators -->
	  <ol class="carousel-indicators">
		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#myCarousel" data-slide-to="1"></li>
		<li data-target="#myCarousel" data-slide-to="2"></li>
		<li data-target="#myCarousel" data-slide-to="3"></li>
		<li data-target="#myCarousel" data-slide-to="4"></li>
		<li data-target="#myCarousel" data-slide-to="5"></li>
		<li data-target="#myCarousel" data-slide-to="6"></li>

	  </ol>

	  <!-- Wrapper for slides -->
	  <div class="carousel-inner" role="listbox">
		<div class="item active">
		  <img src="images/12a.jpg" alt="Chania">
		  <div class="carousel-caption" id="caption">
			 <p>Information Technology Department</p>
		  </div>
		</div>
		<div class="item">
		  <img src="images/cs.jpg" alt="Chania">
		  <div class="carousel-caption" id="caption">
			 <p>Computer Science and  Engineering Department</p>
		  </div>
		</div>
		<div class="item">
		  <img src="images/ec.jpg" alt="Chania">
		  <div class="carousel-caption" id="caption">
			 <p>Electronics Engineering Department</p>
		  </div>
			  </div>
		<div class="item">
		  <img src="images/11a.jpg" alt="Chania">
		  <div class="carousel-caption" id="caption">
			 <p>Mechanical Engineering Department</p>
		  </div>
		</div>


		<div class="item">
		  <img src="images/2a.jpg" alt="Chania">
		  <div class="carousel-caption" id="caption">
			 <p>Civil Engineering Department</p>
		  </div>
		</div>

		<div class="item">
		  <img src="images/ec (2).jpg" alt="Flower">
		  <div class="carousel-caption" id="caption">
			 <p>Electrical Engineering Department</p>
		  </div>
		</div>

		<div class="item">
		  <img src="images/7.jpg" alt="Flower">
		  <div class="carousel-caption" id="caption">
			 <p>Chemical Engineering Department</p>
		  </div>
		</div>
	  </div>

	  <!-- Left and right controls -->
	  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	  </a>
	  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	  </a>
	</div>
	<!-- Modal -->
	  <div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
		  <!-- Modal content-->
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			  <h3 class="modal-title" align="center">LogIn</h3>
			</div>
			<div class="modal-body" id="form">
			  <form class="form-horizontal" method="POST" action="index.php">
			 <div class="form-group"><label>Enter ID<span id="remark">&nbsp;*</span></label>&nbsp;&nbsp;&nbsp;
			 <input type="text" placeholder="enter your id" name="username" class="form-control" required /></div>              
			  <br/><br/><div class="form-group"><label>Enter Password<span id="remark">&nbsp;*</span></label>&nbsp;
			  <input type="password" placeholder="enter your password" name="password" class="form-control" required /></div>
			  <br/><br/><div class="form-group">
			<label>Select View<span id="remark">&nbsp;*</span></label>&nbsp;&nbsp;

			<select name="login_type" class="form-control" required>
				<option value="hod-detail"> 	HOD		</option>
				<option value="faculty-detail"> FACULTY </option>
				<option value="student-detail"> STUDENT </option>
			</select></div><br/><br/>
			   <button type="submit" name ="submit_button" value ="submit" id="button" class="btn btn-default">Submit</button>
			  </form>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		  </div> 
		</div>
	  </div>
	</body>
</html>

