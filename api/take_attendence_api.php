<?php
$json = json_decode('
{"entries":[
{"id": "29","name":"John", "age":"36"},
{"id": "30","name":"Jack", "age":"23"}
]}
');

{"attendence":
[
"1":0,
"2":1,

]};
a=json_decode(attendence);
foreach($json->entries as $row)
{
	echo $row;
   /* foreach($row as $key => $val)
    {
        echo $key . ': ' . $val;
        echo '<br>';
    }*/
}




?>