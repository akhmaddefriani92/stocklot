<?php
include "config.php";

error_reporting();
if(!empty($_POST["user_id"])){

	$user_id = $_POST["user_id"];

 	$sql ="select * from user where user_id=$user_id";
	$query= mysql_query($sql) or die (mysql_error());
	$row  = mysql_fetch_assoc($query);
  $username = $row["username"];
  $hp = $row["hp"];
  $level_id = $row["level_id"];
  $kd_aktivasi = $row["kd_aktivasi"];
  $aktif = $row["aktif"];


// echo "test0";
}else{
  $user_id='';
  $username = "";
  $hp = "";
  $level_id = "";
  $kd_aktivasi = "";
  $aktif = "";
}

?>

  	<div class="form-group">
      <label for="username">UserName: </label>
      <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id;?>">
      <input type="text" class="form-control"   name="username" value="<?php echo $username;?>" readonly>
    </div>
    
    <div class="form-group">
      <label for="nama">No Hp:</label>
      <input type="text" class="form-control"  name="hp" value="<?php echo $hp;?>" readonly>
    </div>

    <div class="form-group">
      <label for="nama">Level:</label>
      <select name="level_id" class="form-control">
        <?php
          $sql ="select * from level";
          $query =mysql_query($sql);
          while ($value=mysql_fetch_assoc($query)) {
            # code...
            if($level_id == $value["level_id"]){
              $selected='selected';
            }else{
              $selected='';
            }
            echo "<option value='$value[level_id]' $selected>$value[level]</option>";
          }
        ?>
      </select>
    </div>

    

    
    <div class="form-group">
      <label>Kode Aktifasi:</label>
      <textarea name="kd_aktivasi" class="form-control"><?php echo $kd_aktivasi;?></textarea>
    </div>
    <div class="form-group">
      <label>Aktif:</label>
      <select name="aktif" class="form-control">
        <?php
          $ar = array("Y", "T");
          foreach ($ar as $value) {
            # code...
            if($value==$aktif){
              $selected = "selected";  
            }else{
              $selected='';
            }
            echo "<option value='$value' $selected>$value</option>";
          }
        ?>
      </select>
    </div>
    