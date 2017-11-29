<?php
include "config.php";
// echo ini_get('display_errors');
error_reporting(0);


	$admin_id = $_POST["admin_id"];
	$username = mysql_escape_string($_POST["username"]);
	$password = mysql_escape_string(md5($_POST["password"]));
	$nama = mysql_escape_string($_POST["nama"]);
	$alamat = mysql_escape_string($_POST["alamat"]);
	$email = mysql_escape_string($_POST["email"]);
	$hp = mysql_escape_string($_POST["hp"]);
	$level = mysql_escape_string($_POST["level"]);

if(!empty($admin_id)){

	$sql = "update admin set username='$username', password='$password', nama='$nama', alamat='$alamat', email='$email', hp='$hp', level='$level' where admin_id=$admin_id";
	$query =mysql_query($sql);	

}elseif($_POST["del_id"]){
		$sql = "delete from admin where admin_id=$_POST[del_id]";
		$query =mysql_query($sql);	
}else{
	
	$sql = "insert into admin (username, password, nama, alamat, email, hp, level) values('$username', '$password', '$nama', '$alamat', '$email', '$hp', '$level')";
	$query =mysql_query($sql);				
}

if($query){
	echo "<script>
			alert('berhasil anda simpan');
			window.location.href=('users_admin.php');
		</script>";
}else{
	echo "<script>
			alert('gagal anda simpan');
			window.location.href=('users_admin.php');
		</script>";
}

?>