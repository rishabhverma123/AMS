<?php

	if($_SESSION['is_loggedin']==false)
	{
		echo "hell";
		header("Location:index.php");
	}

?>