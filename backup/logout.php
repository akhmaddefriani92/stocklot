<?php

	session_start();
	session_destroy();

	echo "<script>window.open('home','_self')</script>";

?>