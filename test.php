  <form method="get" action="test.php"><label name="fname" id="fname" value="asdasd"></label>
  <input type="text" name="udin">

 <input type="submit" value="Submit Order" name="confirmorder" /> <?php echo $_POST['fname']?>
</form><?php   

	$asd = $_POST['fname'];
	echo $asd;

$query = mysql_query("
            SELECT
                barang.barang_id,
                barang.harga,
                barang.qty,
                barang.image1,
                barang.nm_brg,
                merk.nama as nama_merk
            FROM
                barang
                INNER JOIN merk ON (barang.merk_id = merk.merk_id)
            GROUP BY barang.kd_brg
            LIMIT
                $start, $limit
        ");
?>

