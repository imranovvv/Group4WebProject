<?php
	session_start( );
	if (isset($_SESSION["userid"])) //userid replace with according to variable $_SESSION[xxx] at login page
	{
		session_destroy( );
		echo "You have successfully logged out.";
		header("Location: index.html");
	}
	else
		echo " No session exists or session is expired. Please log in again";
?>