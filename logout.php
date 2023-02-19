<?php
	session_start( );
	if (isset($_SESSION["userid"])) //userid replace with according to variable $_SESSION[xxxx] at login page
	{
		session_destroy( );
		$message = "You have successfully logged out.";
        echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script>setTimeout(function () { window.location.href = 'index.html'; }, 1000);</script>";
	}
	else
	{
		$message = "No session exists or session is expired. Please log in again";
        echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<script>setTimeout(function () { window.location.href = 'index.html'; }, 1000);</script>";
	}
		
?>