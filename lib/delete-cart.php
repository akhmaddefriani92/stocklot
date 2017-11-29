<?php

	require_once 'config.php';

	if(isset($_GET['data'])){
		$cart_id = $_GET['data'];

		$query = mysql_query("DELETE FROM cart WHERE cart_id = '$cart_id'");

		if ($query === TRUE) {
		    header('Location: ../cart.php');
		} else {
		    echo "Error deleting item";
		}
	}
?>