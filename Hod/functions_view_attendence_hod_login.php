<?php
	include "../included/connection.php";
	global $connection;

		function view_attendence_semester_1()
		{
			
					  
			global $connection;
			global $semester;
			echo "<div id='result' style='display:block;'>";
			echo "<table  border:collapse id='tab' class='table table-hover'>";
					echo "<tr>";
					echo "<th> NAME</th>";
					echo "<th>ROLLNUMBER</th>";
					echo "<th>EAS-101</th>";
					echo "<th>EAS-103</th>";
					echo "<th>EAS-104</th>";
					echo "<th>EAS-105</th>";
					echo "<th>EAS-109</th>";
					echo "<th>ECS-101</th>";
					echo "<th>EME-102</th>";
					echo "<th>ECE-151</th>";
					echo "<th>EAS-154</th>";
					echo "<th>ECS-151</th>";
					echo "<th>EME-152</th>";
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
					
					if($row['EAS-101Lecture-tc']==0)
						$data1=0;
					else 
						$data1=round((($row['EAS-101Lecture-tp']/$row['EAS-101Lecture-tc'])*100),2);
					
					if($row['EAS-103Lecture-tc']==0)
						$data2=0;
					else
						$data2=round((($row['EAS-103Lecture-tp']/$row['EAS-103Lecture-tc'])*100),2);
					
					if($row['EAS-104Lecture-tc']==0)
						$data3=0;
					else
						$data3=round((($row['EAS-104Lecture-tp']/$row['EAS-104Lecture-tc'])*100),2);
					
					if($row['EAS-105Lecture-tc']==0)
						$data4=0;
					else
						$data4=round((($row['EAS-105Lecture-tp']/$row['EAS-105Lecture-tc'])*100),2);
					
					if($row['EAS-109Lecture-tc']==0)
						$data5=0;
					else 
						$data5=round((($row['EAS-109Lecture-tp']/$row['EAS-109Lecture-tc'])*100),2);
					
					if($row['ECS-101Lecture-tc']==0)
						$data6=0;
					else
						$data6=round((($row['ECS-101Lecture-tp']/$row['ECS-101Lecture-tc'])*100),2);
					
					if($row['EME-102Lecture-tc']==0)
						$data7=0;
					else
						$data7=round((($row['EME-102Lecture-tp']/$row['EME-102Lecture-tc'])*100),2);
					
					if($row['ECE-151lab-tc']==0)
						$data8=0;
					else
						$data8=round((($row['ECE-151lab-tp']/$row['ECE-151lab-tc'])*100),2);
				
					if($row['ECS-151lab-tc']==0)
						$data9=0;
					else
						$data9=round((($row['ECS-151lab-tp']/$row['ECS-151lab-tc'])*100),2);
					
					if($row['EAS-154lab-tc']==0)
						$data10=0;
					else
						$data10=round((($row['EAS-154lab-tp']/$row['EAS-154lab-tc'])*100),2);
					
					if($row['EME-152lab-tc']==0)
						$data11=0;
					else
						$data11=round((($row['EME-152lab-tp']/$row['EME-152lab-tc'])*100),2);
					
				
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
					echo	"<td>".$data11."%</td>";
					echo	"<td>".$row['overall-percent']."%</td>";
					echo "</tr>";

					$row++;
				
			}
			echo "</table>";
			echo "</div>"; 
						   
		}
		
		function view_attendence_semester_2()
		{
			
					   		  
			global $connection;
			global $semester;
			echo "<div id='result' style='display:block;'>";
			echo "<table  border:collapse id='tab' class='table table-hover'>";
					echo "<tr>";
					echo "<th> NAME</th>";
					echo "<th>ROLLNUMBER</th>";
					echo "<th>EAS-201</th>";
					echo "<th>EAS-202</th>";
					echo "<th>EAS-203</th>";
					echo "<th>EEC-201</th>";
					echo "<th>EEE-201</th>";
					echo "<th>EME-201</th>";
					echo "<th>AUC-001</th>";
					echo "<th>EWS-251</th>";
					echo "<th>EAS-251</th>";
					echo "<th>EAS-252</th>";
					echo "<th>EEE-251</th>";
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
					
					if($row['EAS-201Lecture-tc']==0)
						$data1=0;
					else 
						$data1=round((($row['EAS-201Lecture-tp']/$row['EAS-201Lecture-tc'])*100),2);
					
					if($row['EAS-202Lecture-tc']==0)
						$data2=0;
					else
						$data2=round((($row['EAS-202Lecture-tp']/$row['EAS-202Lecture-tc'])*100),2);
					
					if($row['EAS-203Lecture-tc']==0)
						$data3=0;
					else
						$data3=round((($row['EAS-203Lecture-tp']/$row['EAS-203Lecture-tc'])*100),2);
					
					if($row['EEC-201Lecture-tc']==0)
						$data4=0;
					else
						$data4=round((($row['EEC-201Lecture-tp']/$row['EEC-201Lecture-tc'])*100),2);
					
					if($row['EEE-201Lecture-tc']==0)
						$data5=0;
					else 
						$data5=round((($row['EEE-201Lecture-tp']/$row['EEE-201Lecture-tc'])*100),2);
					
					if($row['EME-201Lecture-tc']==0)
						$data6=0;
					else
						$data6=round((($row['EME-201Lecture-tp']/$row['EME-201Lecture-tc'])*100),2);
					
					if($row['AUC-001Lecture-tc']==0)
						$data7=0;
					else
						$data7=round((($row['AUC-001Lecture-tp']/$row['AUC-001Lecture-tc'])*100),2);
					
					if($row['EWS-251lab-tc']==0)
						$data8=0;
					else
						$data8=round((($row['EWS-251lab-tp']/$row['EWS-251lab-tc'])*100),2);
				
					if($row['EAS-251lab-tc']==0)
						$data9=0;
					else
						$data9=round((($row['EAS-251lab-tp']/$row['EAS-251lab-tc'])*100),2);
					
					if($row['EAS-252lab-tc']==0)
						$data10=0;
					else
						$data10=round((($row['EAS-252lab-tp']/$row['EAS-252lab-tc'])*100),2);
					
					if($row['EEE-251lab-tc']==0)
						$data11=0;
					else
						$data11=round((($row['EEE-251lab-tp']/$row['EEE-251lab-tc'])*100),2);
					
				
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
					echo	"<td>".$data11."%</td>";
					echo	"<td>".$row['overall-percent']."%</td>";
					echo "</tr>";

					$row++;
				
			}
			echo "</table>";
			echo "</div>"; 
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
					   
			global $connection;
			global $semester;
			echo "<div id='result' style='display:block;'>";
			echo "<table  border:collapse id='tab' class='table table-hover'>";
					echo "<tr>";
					echo "<th> NAME</th>";
					echo "<th>ROLLNUMBER</th>";
					echo "<th>ECS-601</th>";
					echo "<th>ECS-505</th>";
					echo "<th>EIT-601</th>";
					echo "<th>EIT-602</th>";
					echo "<th>EIT-062</th>";
					echo "<th>EHU-601</th>";
					echo "<th>EIT-651</th>";
					echo "<th>EIT-652</th>";
					echo "<th>EIT-653</th>";
					echo "<th>EIT-654</th>";
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
					
					if($row['ECS-601Lecture-tc']==0)
						$data1=0;
					else 
						$data1=round((($row['ECS-601Lecture-tp']/$row['ECS-601Lecture-tc'])*100),2);
					
					if($row['ECS-505Lecture-tc']==0)
						$data2=0;
					else
						$data2=round((($row['ECS-505Lecture-tp']/$row['ECS-505Lecture-tc'])*100),2);
					
					if($row['EIT-601Lecture-tc']==0)
						$data3=0;
					else
						$data3=round((($row['EIT-601Lecture-tp']/$row['EIT-601Lecture-tc'])*100),2);
					
					if($row['EIT-602Lecture-tc']==0)
						$data4=0;
					else 
						$data4=round((($row['EIT-602Lecture-tp']/$row['EIT-602Lecture-tc'])*100),2);
					
					if($row['EIT-062Lecture-tc']==0)
						$data5=0;
					else
						$data5=round((($row['EIT-062Lecture-tp']/$row['EIT-062Lecture-tc'])*100),2);
					
					if($row['EHU-601Lecture-tc']==0)
						$data6=0;
					else
						$data6=round((($row['EHU-601Lecture-tp']/$row['EHU-601Lecture-tc'])*100),2);
					
					if($row['EIT-651lab-tc']==0)
						$data7=0;
					else
						$data7=round((($row['EIT-651lab-tp']/$row['EIT-651lab-tc'])*100),2);
				
					if($row['EIT-652lab-tc']==0)
						$data8=0;
					else
						$data8=round((($row['EIT-652lab-tp']/$row['EIT-652lab-tc'])*100),2);
					
					if($row['EIT-653lab-tc']==0)
						$data9=0;
					else
						$data9=round((($row['EIT-653lab-tp']/$row['EIT-653lab-tc'])*100),2);
					
					if($row['EIT-654lab-tc']==0)
						$data10=0;
					else
						$data10=round((($row['EIT-654lab-tp']/$row['EIT-654lab-tc'])*100),2);
				
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
		
		function view_attendence_semester_7()
		{
			 
					   
			global $connection;
			global $semester;
			echo "<div id='result' style='display:block;'>";
			echo "<table  border:collapse id='tab' class='table table-hover'>";
					echo "<tr>";
					echo "<th> NAME</th>";
					echo "<th>ROLLNUMBER</th>";
					echo "<th>EIT-701</th>";
					echo "<th>EIT-071</th>";
					echo "<th>ECS-801</th>";
					echo "<th>ECS-075</th>";
					echo "<th>EIT-751</th>";
					echo "<th>EIT-752</th>";
					echo "<th>EIT-753</th>";
					echo "<th>EIT-754</th>";
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
					
					if($row['EIT-701Lecture-tc']==0)
						$data1=0;
					else 
						$data1=round((($row['EIT-701Lecture-tp']/$row['EIT-701Lecture-tc'])*100),2);
					
					if($row['EIT-071Lecture-tc']==0)
						$data2=0;
					else
						$data2=round((($row['EIT-071Lecture-tp']/$row['EIT-071Lecture-tc'])*100),2);
					
					if($row['ECS-801Lecture-tc']==0)
						$data3=0;
					else
						$data3=round((($row['ECS-801Lecture-tp']/$row['ECS-801Lecture-tc'])*100),2);
					
					if($row['ECS-075Lecture-tc']==0)
						$data4=0;
					else 
						$data4=round((($row['ECS-075Lecture-tp']/$row['ECS-075Lecture-tc'])*100),2);
					
					
					if($row['EIT-751lab-tc']==0)
						$data5=0;
					else
						$data5=round((($row['EIT-751lab-tp']/$row['EIT-751lab-tc'])*100),2);
				
					if($row['EIT-752lab-tc']==0)
						$data6=0;
					else
						$data6=round((($row['EIT-752lab-tp']/$row['EIT-752lab-tc'])*100),2);
					
					if($row['EIT-753lab-tc']==0)
						$data7=0;
					else
						$data7=round((($row['EIT-753lab-tp']/$row['EIT-753lab-tc'])*100),2);
					
					if($row['EIT-754lab-tc']==0)
						$data8=0;
					else
						$data8=round((($row['EIT-754lab-tp']/$row['EIT-754lab-tc'])*100),2);
				
					echo	"<td>".$data1."%</td>";
					echo	"<td>".$data2."%</td>";
					echo	"<td>".$data3."%</td>";
					echo	"<td>".$data4."%</td>";
					echo	"<td>".$data5."%</td>";
					echo	"<td>".$data6."%</td>";
					echo	"<td>".$data7."%</td>";
					echo	"<td>".$data8."%</td>";
					echo	"<td>".$row['overall-percent']."%</td>";
					echo "</tr>";

					$row++;
				
			}
			echo "</table>";
			echo "</div>";
					   
		}
		
		function view_attendence_semester_8()
		{
			 
			global $connection;
			global $semester;
			echo "<div id='result' style='display:block;'>";
			echo "<table  border:collapse id='tab' class='table table-hover'>";
					echo "<tr>";
					echo "<th> NAME</th>";
					echo "<th>ROLLNUMBER</th>";
					echo "<th>ECS-087</th>";
					echo "<th>EIT-082</th>";
					echo "<th>ECS-701</th>";
					echo "<th>EOE-081</th>";
					echo "<th>EIT-851</th>";
					echo "<th>EIT-852</th>";
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
					
					if($row['ECS-087Lecture-tc']==0)
						$data1=0;
					else 
						$data1=round((($row['ECS-087Lecture-tp']/$row['ECS-087Lecture-tc'])*100),2);
					
					if($row['EIT-082Lecture-tc']==0)
						$data2=0;
					else
						$data2=round((($row['EIT-082Lecture-tp']/$row['EIT-082Lecture-tc'])*100),2);
					
					if($row['ECS-701Lecture-tc']==0)
						$data3=0;
					else
						$data3=round((($row['ECS-701Lecture-tp']/$row['ECS-701Lecture-tc'])*100),2);
					
					if($row['EOE-081Lecture-tc']==0)
						$data4=0;
					else 
						$data4=round((($row['EOE-081Lecture-tp']/$row['EOE-081Lecture-tc'])*100),2);
					
					
					if($row['EIT-851lab-tc']==0)
						$data5=0;
					else
						$data5=round((($row['EIT-851lab-tp']/$row['EIT-851lab-tc'])*100),2);
				
					if($row['EIT-852lab-tc']==0)
						$data6=0;
					else
						$data6=round((($row['EIT-852lab-tp']/$row['EIT-852lab-tc'])*100),2);
					
				
					echo	"<td>".$data1."%</td>";
					echo	"<td>".$data2."%</td>";
					echo	"<td>".$data3."%</td>";
					echo	"<td>".$data4."%</td>";
					echo	"<td>".$data5."%</td>";
					echo	"<td>".$data6."%</td>";
					echo	"<td>".$row['overall-percent']."%</td>";
					echo "</tr>";

					$row++;
				
			}
			echo "</table>";
			echo "</div>";
		}
?>		