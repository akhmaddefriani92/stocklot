<form name="form1" method="post" action="caribarang.php">
  <table>
    <tr>
      <td width="110">Barcode</td>
      <td width="17"><div align="center">:</div></td>
      <td width="305"><label for="barcode"></label>
      <input type="text" name="barcode" id="barcode"></td>
    </tr>
    <tr>
      <td>Nama Barang</td>
      <td><div align="center">:</div></td>
      <td><label for="nmbarang"></label>
      <input type="text" name="nmbarang" id="nmbarang"></td>
    </tr>
  </table>
  <input type="submit" name="cari" id="cari" value="Submit">
</form><?php 

include "config.php";

$barcode = $_POST['barcode'];
$namabarang = $_POST['nmbarang'];

$no = 1;
        ?>
        <table border="1">
            <tr>
                <th>no</th>
                <th>Barcode</th>
                <th>Image</th>
                <th>Nama Barang</th>
                <th>Kategori Barang</th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Satuan Barang</th>
                <th>Jumlah</th>
                <th>Harga Jual</th>
                <th>Harga Banded</th>
                <th>Qty Banded</th>
                <th>Non Aktif</th>
                <th>aksi</th>
            </tr>
  <?php  if ($_POST[barcode] == '0') {
            $sql ="SELECT
				`barang`.`barang_id`,
				`barang`.`nm_id`,
				`nm_brg`.`nm_brg`,
				`barang`.`kategori_id`,
				`barang`.`image1`,
				`kategori`.`nama`,
				`barang`.`warna_id`,
				`warna`.`warna`,
				`barang`.`size_id`,
				`size`.`size`,
				`barang`.`satuan_id`,
				`satuan_barang`.`namaSatuanBarang`,
				`barang`.`qty`,
				`barang`.`harga`,
				`barang`.`barcode`,
                (`harga_banded`.`harga` * `harga_banded`.`qty`) hargaBanded,
                `harga_banded`.`qty` qtyBanded,
				`barang`.`non_aktif`
			FROM `barang`
			LEFT JOIN `warna`
					ON `barang`.`warna_id` = `warna`.`warna_id`
			LEFT JOIN `nm_brg`
					ON `barang`.`nm_id` = `nm_brg`.`nm_id`
				LEFT JOIN `size`
					ON `barang`.`size_id` = `size`.`size_id`
				LEFT JOIN `kategori`
					ON `barang`.`kategori_id` = `kategori`.`kategori_id`
				LEFT JOIN `satuan_barang`
					ON `barang`.`satuan_id` = `satuan_barang`.`satuan_id`
                LEFT JOIN `harga_banded`
                    ON `barang`.`barcode` = `harga_banded`.`barcode`
				ORDER BY `barang_id` ASC ";
        } else {
            $sql = "SELECT
				`barang`.`barang_id`,
				`barang`.`nm_id`,
				`nm_brg`.`nm_brg`,
				`barang`.`kategori_id`,
				`barang`.`image1`,
				`kategori`.`nama`,
				`barang`.`warna_id`,
				`warna`.`warna`,
				`barang`.`size_id`,
				`size`.`size`,
				`barang`.`satuan_id`,
				`satuan_barang`.`namaSatuanBarang`,
				`barang`.`qty`,
				`barang`.`harga`,
				`barang`.`barcode`,
                (`harga_banded`.`harga` * `harga_banded`.`qty`) hargaBanded,
                `harga_banded`.`qty` qtyBanded,
				`barang`.`non_aktif`
			FROM `barang`
			LEFT JOIN `warna`
					ON `barang`.`warna_id` = `warna`.`warna_id`
			LEFT JOIN `nm_brg`
					ON `barang`.`nm_id` = `nm_brg`.`nm_id`
				LEFT JOIN `size`
					ON `barang`.`size_id` = `size`.`size_id`
				LEFT JOIN `kategori`
					ON `barang`.`kategori_id` = `kategori`.`kategori_id`
				LEFT JOIN `satuan_barang`
					ON `barang`.`satuan_id` = `satuan_barang`.`satuan_id`
                LEFT JOIN `harga_banded`
                    ON `barang`.`barcode` = `harga_banded`.`barcode` WHERE barang.barcode = '$barcode'
				ORDER BY `barang_id` ASC ";
        };
        $cari = mysql_query($sql) or die(mysql_error());
        //echo $sql;
 $r = mysql_fetch_array($cari);?>
              
                <tr>
                    <td class="right"><?php echo $no; ?></td>
                    <td><?php echo $r['barcode']; ?></td>
                    <td><?php echo "<img src='../gambar/".$r[image1]."'/>";?></td>
                    <td><?php echo $r['nm_brg']; ?></td>
                    <td class="center"><?php echo $r['nama']; ?></td>
                    	 <td><?php echo $r['warna'];?></td>
                        <td><?php echo $r['size'];?></td>
                    <td class="center"><?php echo $r['namaSatuanBarang']; ?></td>
                    <td class="right"><?php echo $r['qty']; ?></td>
                    <td class="right"><?php echo $r['harga']; ?></td>
                    <td class="right"><?php echo $r['hargaBanded']; ?></td>
                    <td class="right"><?php echo $r['qtyBanded']; ?></td>
                    <td class="center"><?php echo $r['nonAktif'] == '1' ? '<i class="fa fa-times"></i>' : ''; ?></td>
                    <td><a href=editbarang.php?id=<?php echo $r[barcode]; ?>>Ubah</a>
                  
