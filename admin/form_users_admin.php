<?php
include "config.php";


if(!empty($_POST["admin_id"])){

	$admin_id = $_POST["admin_id"];

	$sql ="select * from admin where admin_id=$admin_id";
	$query= mysql_query($sql) or die (mysql_errno());
	$row  = mysql_fetch_assoc($query);
	// print_r($row);
	$username1 = $row["username"];
	$password = $row["password"];
	$nama = $row["nama"];
	$alamat = $row["alamat"];
	$email = $row["email"];
	$hp = $row["hp"];
	$level = $row["level"];

}else{
	$admin_id = '';
	$username1 = '';
	$password = '';
	$nama = '';
	$alamat = '';
	$email = '';
	$hp = '';
	$level = '';	
}

?>

  	<div class="form-group">
      <label for="username">Username: </label>
      <input type="hidden" class="form-control" name="admin_id" value="<?php echo $admin_id;?>">
      
      <input type="text" class="form-control"  placeholder="Enter username" name="username" value="<?php echo $username1;?>">
    </div>
    <div class="form-group">
      <label >Password:</label>
      <input type="password" class="form-control"  placeholder="Enter password" name="password" value="<?php echo $password;?>">
    </div>
    <div class="form-group">
      <label for="nama">Email:</label>
      <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $email;?>">
    </div>
    <div class="form-group">
      <label for="nama">Nama:</label>
      <input type="text" class="form-control" id="nama" placeholder="Enter nama" name="nama" value="<?php echo $nama;?>">
    </div>
    <div class="form-group">
      <label for="alamat">Alamat:</label>
      <textarea name="alamat" class="form-control"><?php echo $alamat;?></textarea>
    </div>
    <div class="form-group">
      <label for="nama">Hp:</label>
      <input type="text" class="form-control" id="hp" placeholder="Enter hp" name="hp" value="<?php echo $hp;?>">
    </div>

    <div class="form-group">
      <label for="nama">level:</label>
      <select name="level" class="form-control">
      	<?php
      		if(empty($level)){
      			echo "<option value='1'>Admin</option>";
      			echo "<option value='2'>Kasir</option>";
      			
      		}
      		elseif($level=="1"){
      			echo "<option value='1' selected>Admin</option>";
      			echo "<option value='2'>Kasir</option>";
      		}elseif($level=="2"){
      			echo "<option value='2' selected>Kasir</option>";
      			echo "<option value='1'>Admin</option>";
      		}
      	?>
      </select>
    </div>
