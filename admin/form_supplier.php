<?php
include "config.php";

error_reporting();
if(!empty($_POST["supplier_id"])){

	$supplier_id = $_POST["supplier_id"];

 	$sql ="select * from supplier where supplier_id=$supplier_id";
	$query= mysql_query($sql) or die (mysql_error());
	$row  = mysql_fetch_assoc($query);
  // print_r($row)	;
	$namaSupplier = $row["namaSupplier"];
	$alamatSupplier = $row["alamatSupplier"];
	
	$telpSupplier = $row["telpSupplier"];
	$last_update = $row["last_update"];
	$interval = $row["interval"];
// echo "test0";
}else{
	$supplier_id = '';
	$namaSupplier = '';
	$alamatSupplier = '';	
	$alamat = '';
	$telpSupplier = '';
	$last_update = '';
	$interval = '';	
  // echo "test";
}

?>

  	<div class="form-group">
      <label for="username">Nama Suppplier: </label>
      <input type="hidden" class="form-control" name="supplier_id" value="<?php echo $supplier_id;?>">
      
      <input type="text" class="form-control"  placeholder="Enter username" name="namaSupplier" value="<?php echo $namaSupplier;?>">
    </div>
    
    <div class="form-group">
      <label for="nama">Telp Supplier:</label>
      <input type="text" class="form-control" id="telpSupplier" placeholder="Enter telpSupplier" name="telpSupplier" value="<?php echo $telpSupplier;?>">
    </div>

    <div class="form-group">
      <label for="nama">Tanggal Kerja Sama:</label>
      <input type="text" class="form-control tanggal" id="tanggal_kerja" placeholder="Enter YYYY-mm-dd" name="last_update" value="<?php echo $last_update;?>">
    </div>

    

    
    <div class="form-group">
      <label for="alamat">Alamat Supplier:</label>
      <textarea name="alamatSupplier"; class="form-control"><?php echo $alamatSupplier;?></textarea>
    </div>
    <!-- <div class="form-group">
      <label for="nama">Interval:</label>
      <input type="text" class="form-control" id="interval" placeholder="Enter interval" name="hp" value="<?php echo $interval;?>">
    </div> -->

    