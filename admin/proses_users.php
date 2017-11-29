<?php
include "config.php";
// echo ini_get('display_errors');
error_reporting(0);
	
	
	$user_id=$_POST["user_id"];
  $username = mysql_escape_string($_POST["username"]);
  $hp = mysql_escape_string($_POST["hp"]);
  $level_id =$_POST["level_id"];
  $kd_aktivasi = mysql_escape_string($_POST["kd_aktivasi"]);
  $aktif = mysql_escape_string($_POST["aktif"]);
	

if(!empty($user_id)){

	$sql = "update user set level_id=$level_id, aktif='$aktif', kd_aktivasi='$kd_aktivasi' where user_id=$user_id";
	$query =mysql_query($sql) or die ("$sql".mysql_error());	

}elseif($_POST["del_id"]){
		$sql = "delete from user where user_id=$_POST[del_id]";
		$query =mysql_query($sql) or die ("$sql".mysql_error());		
}

// echo $sql;
if($query){
	echo "<script>
			alert('berhasil anda simpan');
			window.location.href=('users.php');
		</script>";
}else{
	echo "<script>
			alert('gagal anda simpan');
			window.location.href=('users.php');
		</script>";
}

?>