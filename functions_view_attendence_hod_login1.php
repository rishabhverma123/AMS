<?php
include "connection.php";
global $connection;

		function view_attendence_semester_1()
		{
			 echo "<script type='text/javascript'>
					  alert('OOPS! PAGE STILL UNDER CONSTRUCTION')
					   </script>";
		}
		
		function view_attendence_semester_2()
		{
			 echo "<script type='text/javascript'>
					  alert('OOPS! PAGE STILL UNDER CONSTRUCTION')
					   </script>";
		}
		
		function view_attendence_semester_3()
		{
			global $connection;
			global $semester;
			echo "<div id='result' style='display:block;'>";
			echo "<table  border:collapse id='tab' class='table table-hover'>";
					echo "<tr>";
					echo "<th> NAME</th>";
					echo "<th>ROLLNUMBER</th>";
					echo "<th>ECS-301</th>";
					echo "<th>ECS-302</th>";
					echo "<th>ECS-304</th>";
					echo "<th>ECS-305</th>";
					echo "<th>EAS-301</th>";
					echo "<th>EHU-302</th>";
					echo "<th>EIT-351</th>";
					echo "<th>EIT-352</th>";
					echo "<th>EIT-353</th>";
					echo "<th>OVERALL ATTENDENCE</th>";
					echo "</tr>";
			
			$query="SELECT * FROM `attendence-semester-".$semester."`";
			$query_run=mysqli_query($connection,$query);
			while($row=mysqli_fetch_assoc($query_run))
			{
				$query_name="SELECT `name` FROM `name-roll` WHERE `rollnumber`=".$row['rollnumber'];
				$query_run_name=mysqli_query($connection,$query_name);
				$row_name=mysqli_fetch_assoc($query_run_name);
					
					echo "<tr id='row'>";
					echo	"<td>".$row_name['name']."</td>";
					echo	"<td>".$row['rollnumber']."</td>";
					
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
					
				
					echo	"<td>".$data1."%</td>";
					echo	"<td>".$data2."%</td>";
					echo	"<td>".$data3."%</td>";
					echo	"<td>".$data4."%</td>";
					echo	"<td>".$data5."%</td>";
					echo	"<td>".$data6."%</td>";
					echo	"<td>".$data7."%</td>";
					echo	"<td>".$data8."%</td>";
					echo	"<td>".$data9."%</td>";
					echo	"<td>".$row['overall-percent']."%</td>";
					echo "</tr>";

					$row++;
				
			}
			echo "</table>";
			echo "</div>"; 
						   
		}
		
		function view_attendence_semester_4()
		{
			global $connection;
			global $semester;
			echo "<div id='result' style='display:block;'>";
			echo "<table  border:collapse id='tab' class='table table-hover'>";
					echo "<tr>";
					echo "<th> NAME</th>";
					echo "<th>ROLLNUMBER</th>";
					echo "<th>ECS-401</th>";
					echo "<th>ECS-402</th>";
					echo "<th>EIT-401</th>";
					echo "<th>EIT-402</th>";
					echo "<th>EOE-041</th>";
					echo "<th>EHU-401</th>";
					echo "<th>EIT-451</th>";
					echo "<th>ECS-452</th>";
					echo "<th>ECS-453</th>";
					echo "<th>OVERALL ATTENDENCE</th>";
					echo "</tr>";
			
			$query="SELECT * FROM `attendence-semester-".$semester."`";
			$query_run=mysqli_query($connection,$query);
			while($row=mysqli_fetch_assoc($query_run))
			{
				$query_name="SELECT `name` FROM `name-roll` WHERE `rollnumber`=".$row['rollnumber'];
				$query_run_name=mysqli_query($connection,$query_name);
				$row_name=mysqli_fetch_assoc($query_run_name);
					
					echo "<tr id='row'>";
					echo	"<td>".$row_name['name']."</td>";
					echo	"<td>".$row['rollnumber']."</td>";
					
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
					
				
					echo	"<td>".$data1."%</td>";
					echo	"<td>".$data2."%</td>";
					echo	"<td>".$data3."%</td>";
					echo	"<td>".$data4."%</td>";
					echo	"<td>".$data5."%</td>";
					echo	"<td>".$data6."%</td>";
					echo	"<td>".$data7."%</td>";
					echo	"<td>".$data8."%</td>";
					echo	"<td>".$data9."%</td>";
					echo	"<td>".$row['overall-percent']."%</td>";
					echo "</tr>";

					$row++;
				
			}
			echo "</table>";
			echo "</div>"; 
					   
						   
		}
		
		function view_attendence_semester_5()
		{
			global $connection;
			global $semester;
			echo "<div id='result' style='display:block;'>";
			echo "<table  border:collapse id='tab' class='table table-hover'>";
					echo "<tr>";
					echo "<th> NAME</th>";
					echo "<th>ROLLNUMBER</th>";
					echo "<th>ECS-501</th>";
					echo "<th>ECS-502</th>";
					echo "<th>ECS-504</th>";
					echo "<th>EIT-501</th>";
					echo "<th>EIT-505</th>";
					echo "<th>EHU-501</th>";
					echo "<th>EIT-551</th>";
					echo "<th>EIT-552</th>";
					echo "<th>EIT-553</th>";
					echo "<th>EIT-554</th>";
					echo "<th>OVERALL ATTENDENCE</th>";
					echo "</tr>";
			
			$query="SELECT * FROM `attendence-semester-".$semester."`";
			$query_run=mysqli_query($connection,$query);
			while($row=mysqli_fetch_assoc($query_run))
			{
				$query_name="SELECT `name` FROM `name-roll` WHERE `rollnumber`=".$row['rollnumber'];
				$query_run_name=mysqli_query($connection,$query_name);
				$row_name=mysqli_fetch_assoc($query_run_name);
					
					echo "<tr id='row'>";
					echo	"<td>".$row_name['name']."</td>";
					echo	"<td>".$row['rollnumber']."</td>";
					
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
				
					echo	"<td>".$data1."%</td>";
					echo	"<td>".$data2."%</td>";
					echo	"<td>".$data3."%</td>";
					echo	"<td>".$data4."%</td>";
					echo	"<td>".$data5."%</td>";
					echo	"<td>".$data6."%</td>";
					echo	"<td>".$data7."%</td>";
					echo	"<td>".$data8."%</td>";
					echo	"<td>".$data9."%</td>";
					echo	"<td>".$data10."%</td>";
					echo	"<td>".$row['overall-percent']."%</td>";
					echo "</tr>";

					$row++;
				
			}
			echo "</table>";
			echo "</div>";
		}
		
		
		function view_attendence_semester_6()
		{
			 echo "<script type='text/javascript'>
					  alert('OOPS! PAGE STILL UNDER CONSTRUCTION')
					   </script>";
		}
		
		function view_attendence_semester_7()
		{
			 echo "<script type='text/javascript'>
					  alert('OOPS! PAGE STILL UNDER CONSTRUCTION')
					   </script>";
		}
		
		function view_attendence_semester_8()
		{
			 echo "<script type='text/javascript'>
					  alert('OOPS! PAGE STILL UNDER CONSTRUCTION')
					   </script>";
		}
?>		