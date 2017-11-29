<?php include "config.php";
include "function.php";
include "library.php";

$module = $_GET[module];
$act = $_GET[act];
if ($module == 'barang' AND $act == 'update') {
   $tgl = date("Y-m-d");

// jika barcode diubah, maka ubah juga semua di :
// 	detail_beli
// 	detail_
// 	detail_retur_beli
//	detail_retur_barang
//	detail_stock_opname
// 	fast_stock_opname
   if ($_POST[barcode] <> $_POST[oldbarcode]) {

// check apakah barcode baru ini sudah ada di database
// jika sudah ada, batalkan semua tindakan
    $hasil = mysql_query("SELECT * FROM barang WHERE barcode='$_POST[barcode]'");
      if (mysql_num_rows($hasil) > 0) {
         echo "<h2>Barcode $_POST[barcode] sudah ada di database ! Tidak ada perubahan yang dilakukan.</h2><br />
				[<a href='produk.php'> Kembali ke Menu </a>]";
         exit;
      };

      $hasil = mysql_query("UPDATE detail_beli 		SET barcode='$_POST[barcode]' WHERE barcode='$_POST[oldbarcode]'");
      $hasil = mysql_query("UPDATE detail_ 		SET barcode='$_POST[barcode]' WHERE barcode='$_POST[oldbarcode]'");
      $hasil = mysql_query("UPDATE detail_retur_beli 	SET barcode='$_POST[barcode]' WHERE barcode='$_POST[oldbarcode]'");
      $hasil = mysql_query("UPDATE detail_retur_barang 	SET barcode='$_POST[barcode]' WHERE barcode='$_POST[oldbarcode]'");
      $hasil = mysql_query("UPDATE detail_stock_opname 	SET barcode='$_POST[barcode]' WHERE barcode='$_POST[oldbarcode]'");
      $hasil = mysql_query("UPDATE fast_stock_opname 	SET barcode='$_POST[barcode]' WHERE barcode='$_POST[oldbarcode]'");
   }

   /*
    * Cari dulu barang yang akan diupdate untuk mengetahui informasi field yang diupdate
    */
   $sql = "select barcode, nm_id, kategori_id, satuan_id, rak_id, supplier_id, harga, non_aktif
				from barang
				where barang_id = '{$_POST['idBarang']}'";
   $result = mysql_query($sql) or die("Gagal ambil data barang, error: ".mysql_error());
   $currentBarang = mysql_fetch_array($result);
   $updated = '';
   /*
    * Tandai field yang berbeda (yang diupdate)
    */
   if ($currentBarang['nm_id'] != $_POST['namaBarang']) {
      $updated .= "&barang=1";
   }
   if ($currentBarang['kategori_id'] != $_POST['kategori_barang']) {
      $updated .= '&kategori=1';
   }
   if ($currentBarang['satuan_id'] != $_POST['satuan_barang']) {
      $updated .= '&satuan=1';
   }
   if ($currentBarang['supplier_id'] != $_POST['supplier']) {
      $updated .= '&supplier=1';
   }
   if ($currentBarang['harga'] != $_POST['hargaJual']) {
      $updated .= '&harga=1';
      hargaJualBerubah($_POST['idBarang']);
   }
   if ($currentBarang['rak_id'] != $_POST['rak']) {
      $updated .= '&rak=1';
   }
   if ($currentBarang['non_aktif'] != $_POST['nonAktif']) {
      $updated .= '&nonAktif=1';
   }

   $sql = "UPDATE barang SET nm_id = $_POST[namaBarang] ,
			barcode = '$_POST[barcode]',
			supplier_id = $_POST[supplier],
                    	kategori_id = $_POST[kategori_barang],
                    	satuan_id = $_POST[satuan_barang],
                    	harga = $_POST[hargaJual],
                    	last_update = '$tgl',
							admin_id = 1,
							rak_id = $_POST[rak],
							non_aktif = $_POST[nonAktif]
                    WHERE barang_id = '$_POST[idBarang]'";
   mysql_query($sql) or die('Gagal update data barang, error: '.mysql_error());
// header('location:media.php?module=' . $module);
   header('location:editbarang.php?id='.$_POST['barcode'].$updated);

}
elseif ($module == 'kategori_barang' AND $act == 'update') {
   mysql_query("UPDATE kategori SET nama = '$_POST[nama]'
                    WHERE kategori_id = '$_POST[kategori_id]'");
   header('location:categorybarang.php');
}
elseif ($module == 'kategori_barang' AND $act == 'hapus') {
   mysql_query("DELETE FROM kategori
                    WHERE kategori_id = '$_GET[id]'");
   header('location:categorybarang.php');
}
elseif ($module == 'kategori' AND $act == 'input') {
   $ambilID = mysql_query("SELECT max(kategori_id)+1 FROM kategori");
   $ID = mysql_fetch_array($ambilID);
   $id_rak;
   if ($ID[0] == '')
      $id_rak = '1';
   else
      $id_rak = $ID[0];
   mysql_query("INSERT INTO kategori(kategori_id,nama)
                    VALUES('$id_rak','$_POST[namaKategoriBarang]')");
   header('location:media.php?module='.$module);
}
elseif ($module == 'barang' AND $act == 'input') {
   $nama_file1 = $_FILES['gambar1']['name'];
   $nama_file2 = $_FILES['gambar2']['name'];
   $nama_file3 = $_FILES['gambar3']['name'];
   $nama_file4 = $_FILES['gambar4']['name'];

//fixme: bagaimana dengan idBarangnya ? generate dulu di tmp_detail_beli ?
   $tgl = date("Y-m-d");

   mysql_query("INSERT INTO barang(nm_id,
                    kategori_id,warna_id,size_id,satuan_id,image1, image2, image3, image4, last_update, barcode, username)
                    VALUES('$_POST[namaBarang]',
                    '$_POST[kategori_barang]', '$_POST[warna]', '$_POST[ukuran]', '$_POST[satuan_barang]', '$nama_file1', 						'$nama_file2', '$nama_file3', '$nama_file4',
                    '$tgl', '$_POST[barcode]', 'admin')") or die(mysql_error());
 
}// end Input Barang
elseif ($module == 'barang' AND $act == 'hapus') {
$sql = "DELETE FROM barang WHERE barcode = ".$_GET['id'];
   $hasil = mysql_query($sql) or die("Error : ".mysql_error()." :: $sql");

   header('location:produk.php');}


//Batal Seluruh Invoice / Transaksi Beli
elseif ($module == 'pembelian_barang' AND $act == 'batal') {
   mysql_query("DELETE FROM tmp_detail_beli where supplier_id = '$_SESSION[supplier_id]' and tglTransaksi = '$tgl'") or die (mysql_error());
   releaseSupplier();
   header('location:pembelianbarang.php');
}elseif ($module == 'pembelian_barang' AND $act == 'input' ) {
   $tgl = $_POST[TanggalInvoice];

//HS - idTransaksi sekarang di generate MySQL, untuk menghindari duplikat / dobel
   /* $ambilID = mysql_query("select max(idTransaksiBeli)+1 from transaksibeli");
     $ID = mysql_fetch_array($ambilID);
     $id_transaksi;
     if($ID[0]=='')
     $id_transaksi = '1';
     else
     $id_transaksi = $ID[0]; */

//HS jika keliru input tipe pembayaran, default ke 1 = CASH
   if ($_POST[tipePembayaran] == 0) {
      $_POST[tipePembayaran] = 1;
   };

   $sql_trans = "INSERT INTO transaksibeli(tglTransaksiBeli,
                    supplier_id,nominal,idTipePembayaran,admin_id,last_update,NomorInvoice)
                    VALUES('$tgl','$_POST[supplier_id]',
                           '$_POST[tot_pembayaran]','$_POST[tipePembayaran]',
                            '$_SESSION[uname]','$tgl','$_POST[NomorInvoice]')";
//	echo $sql_trans;

   mysql_query($sql_trans) or die(mysql_error());
   $idTransaksiBeli = mysql_insert_id();

   if ($_POST[tipePembayaran] == '2') {

      mysql_query("INSERT INTO hutang(idTransaksiBeli,nominal,tglBayar,
                        username,last_update)
                        VALUES('$idTransaksiBeli','$_POST[tot_pembayaran]',
                        '$_POST[tglBayar]','$_SESSION[uname]','$tgl')") or die(mysql_error());
   }

   $sql = "SELECT * FROM tmp_detail_beli WHERE supplier_id = '".$_POST['supplier_id']."'
			AND admin_id = '1' AND idBarang != 0";
   $dataBarang = mysql_query($sql) or die(mysql_error());
//echo $sql;

   while ($simpan = mysql_fetch_array($dataBarang)) {

      $sql_simpan = "INSERT INTO detail_beli(idTransaksiBeli,barcode,
                        tglExpire,qty,jumBarangAsli,hargaBeli,username,barang_id)
                    VALUES('$idTransaksiBeli','$simpan[barcode]',
                    '$simpan[tglExpire]',$simpan[qty],$simpan[qty],'$simpan[hargaBeli]','$_SESSION[uname]','$simpan[idBarang]')";
//echo $sql_simpan;
      mysql_query($sql_simpan) or die(mysql_error());

      $jumlahAkhir = 0;
      $jumBarang = mysql_query("SELECT qty FROM barang WHERE barcode = '".$simpan['barcode']."'") or die(mysql_error());
      $jumlah = mysql_fetch_array($jumBarang);
      $jumlahAkhir = $jumlah[qty] + $simpan[qty];

      if (cekHargaJualBerubah($simpan['barcode'], $simpan['harga'])) {
         hargaJualBerubah($simpan['barcode']);
      }
      mysql_query("UPDATE barang SET qty = '$jumlahAkhir',
                     harga = '$simpan[hargaJual]' WHERE barcode = '$simpan[barcode]'") or die(mysql_error());

// harga banded
      $hb = mysql_query("SELECT barcode, qty, harga_satuan FROM tmp_harga_banded WHERE barcode = '{$simpan['barcode']}'");
      $tmpHargaBanded = mysql_fetch_array($hb, MYSQL_ASSOC);
// print_r($tmpHargaBanded);
      $sql = "INSERT INTO harga_banded (barcode, qty, harga) "
              ."VALUES('{$simpan['barcode']}',{$tmpHargaBanded['qty']},{$tmpHargaBanded['harga_satuan']}) "
              ."ON DUPLICATE KEY UPDATE qty={$tmpHargaBanded['qty']}, harga={$tmpHargaBanded['harga_satuan']} ";
      if ($tmpHargaBanded) {
         mysql_query($sql) or die(mysql_error());
      }
   }
   mysql_query("DELETE FROM tmp_detail_beli where supplier_id = '$_SESSION[supplier_id]' and admin_id = '1'") or die(mysql_error());

// hapus harga banded
   mysql_query("DELETE FROM tmp_harga_banded WHERE supplier_id = '{$_SESSION['supplier_id']}' and user_name = '{$_SESSION['uname']}'") or die(mysql_error());

   releaseSupplier();
   header('location:belibarang.php');
}elseif ($module == 'pembelian_barang' AND $act == 'hapus_detil') {
   mysql_query("DELETE FROM tmp_detail_beli where supplier_id = '".$_SESSION['supplier_id']."' and idBarang = '$_GET[id]'");

//var_dump($_SESSION);
   header('location:pembelianbarang.php');
}elseif ($module == 'tambahnamabarang' AND $act == 'input') {
   $ambilID = mysql_query("SELECT max(nm_id)+1 FROM nm_brg");
   $ID = mysql_fetch_array($ambilID);
   $id_rak;
   if ($ID[0] == '')
      $id_rak = '1';
   else
      $id_rak = $ID[0];
   mysql_query("INSERT INTO nm_brg(nm_brg)
                    VALUES('$_POST[namaBarang]')");
   header('location:tambahnamabarang.php');
}
elseif ($module == 'namabarang' AND $act == 'hapus') {
   mysql_query("DELETE FROM nm_brg
                    WHERE id = '$_GET[id]'");
   header('location:tambahnamabarang.php');
}
elseif ($module == 'nm_brg' AND $act == 'update') {
   mysql_query("UPDATE nm_brg SET nm_brg = '$_POST[namaBarang]'
                    WHERE id = '$_POST[id]'");
   header('location:tambahnamabarang.php');
}
elseif ($module == 'nm_brg' AND $act == 'hapus') {
   mysql_query("DELETE FROM nm_brg
                    WHERE id = '$_GET[id]'");
   header('location:tambahnamabarang.php');
}
elseif ($module == 'penjualan_barang' AND $act == 'input') {
	 //$ambilID = mysql_query("select max(idTransaksiJual)+1 from transaksijual");
//$ID = mysql_fetch_array($ambilID);
//$id_transaksi;
//if($ID[0]=='')
//	$id_transaksi = '1';
//else
//	$id_transaksi = $ID[0];
// simpan transaksi ke database
   $tgl = date("Y-m-d H:i:s");

   $NomorStruk = 0;
   $jumlahPoin = isset($_POST['jumlah_poin']) ? $_POST['jumlah_poin'] : 0;

   $transferahad = false;
   $returBeli = false;
   if (($_POST['transferahad'] == 1) || ($_GET['transferahad'] == 1)) {
      $transferahad = true;
   }
   if ($_POST['returbeli'] == 1) {
      $returBeli = true;
   }
   if (!$transferahad) {
      $sql = "INSERT INTO transaksijual(tglTransaksiJual,
	                    user_id,idTipePembayaran,nominal,last_update,uangDibayar,jumlah_poin)
        	            VALUES('$tgl','$_SESSION[idCustomer]',
        	                   '$_POST[tipePembayaran]','$_POST[tot_pembayaran]','$tgl', $_POST[uangDibayar], $jumlahPoin)";
      $hasil = mysql_query($sql) or die(mysql_error());
//echo $sql;
      $NomorStruk = mysql_insert_id();
   } else if ($transferahad) {
      $sql = "INSERT INTO transaksitransferbarang(tglTransaksi,
	                    idCustomer,idTipePembayaran,nominal,idUser,last_update)
        	            VALUES('$tgl','$_SESSION[idCustomer]',
        	                   '$_POST[tipePembayaran]','$_POST[tot_pembayaran]',
        	                    '$_SESSION[iduser]','$tgl')";
      $hasil = mysql_query($sql); // or die(mysql_error());
//echo $sql;
      $NomorStruk = mysql_insert_id();
   }

// cetak struk -------------
// ambil footer & header struk
   

   if ($_POST[tipePembayaran] == '2') {
      mysql_query("INSERT INTO piutang(idTransaksiJual,nominal,tglDiBayar,
                        idUser,last_update)
                        VALUES('$id_transaksi','$_POST[tot_pembayaran]',
                        '$_POST[tglBayar]','$_SESSION[iduser]','$tgl')") or die(mysql_error());
   }


   $dataBarang = mysql_query("SELECT * from tmp_detail_jual
            			WHERE idCustomer = '$_SESSION[idCustomer]' AND username = '$_SESSION[uname]' order by uid");
   while ($simpan = mysql_fetch_array($dataBarang)) {
      $jumlahAkhir = 0;
      $jumBarang = mysql_query("SELECT qty FROM barang WHERE barcode = '$simpan[barcode]'");
      $jumlah = mysql_fetch_array($jumBarang);
      $jumlahAkhir = $jumlah[qty] - $simpan[jumBarang];

      /*
       * Biarkan minus seperti apa adanya :)
       */
      /*
        if ($jumlahAkhir < 0) {
        $jumlahAkhir = 0;
        };
       *
       */

//fixme: kurangi quantity pembelian dengan benar :
//	(1) cari barang di tabel detail_beli, yang stoknya masih ada, lalu
//	(2) catat quantity nya, lalu
      $sql = "SELECT * FROM detail_beli
		WHERE isSold='N' AND barcode='$simpan[barcode]' ORDER BY idDetailBeli ASC";
      $hasil = mysql_query($sql);
      $x = mysql_fetch_array($hasil);

// 	(3) update dengan jumlah yang terjual
// 		(4) jika stok habis : tandai
//		(5) jika stok kurang : cari lagi stok lainnya
//			(6) jika tidak ada lagi - laporkan ke user, bahwa stok kurang
      $Sold = $simpan[jumBarang];
      $StockAvailable = $x[jumBarang];
      $SoldOut = false;
      $Finish = false;
      do { // looping mengurangi jumlah terjual (Sold) dengan stok yg ada (StockAvailable)
// kurangi stok di record tsb dengan $Sold
         if ($Sold >= $StockAvailable) {
            $newStock = 0;
            $Sold = $Sold - $StockAvailable;
// catat bahwa record ini sudah habis stok nya
            $sql = "UPDATE detail_beli SET isSold='Y' WHERE idDetailBeli=$x[idDetailBeli]";
            mysql_query($sql);
         } else {
            $newStock = $StockAvailable - $Sold;
            $Finish = true;
            $Sold = 0;
         }
// catat jumlah stok yang baru / sudah dikurangi penjualan
         $sql = "UPDATE detail_beli SET jumBarang=$newStock WHERE idDetailBeli=$x[idDetailBeli]";
         mysql_query($sql);

// ambil record berikutnya dari database
         $records = $records - 1;
         if (!($x = mysql_fetch_array($hasil))) {
            $SoldOut = true;
         };
         $StockAvailable = $x[jumBarang];
      } while (!$SoldOut && !$Finish);

      if (!$SoldOut) { // kurangi sisa item terjual yang masih ada dengan stok yang ada di database
// kurangi stok di record tsb dengan $Sold
         if ($Sold > $StockAvailable) {
            $newStock = 0;
         } else {
            $newStock = $StockAvailable - $Sold;
         }
         $sql = "UPDATE detail_beli SET jumBarang=$newStock WHERE idDetailBeli=$x[idDetailBeli]";
         mysql_query($sql);
      }

// 	(7) cari barang di tabel barang, lalu
//	(8) catat quantity nya, lalu
// 	(9) update dengan jumlah yang terjual
//
      $sql = "UPDATE barang SET qty = '$jumlahAkhir' WHERE barcode = '$simpan[barcode]'";
      $hasil = mysql_query($sql);

// Cek jika ini adalah harga banded
      $query = mysql_query("SELECT qty, harga FROM harga_banded WHERE barcode = '{$simpan['barcode']}'");
      $hargaBanded = mysql_fetch_array($query);
      $hargaJualAsli = 'null';
      if ($hargaBanded) {
         $query = mysql_query("SELECT harga FROM barang WHERE barcode = '{$simpan['barcode']}'");
         $hargaJual = mysql_fetch_array($query);
// Jika jika qty "terkena" harga banded, maka harga_jual_asli diisi
         if (($simpan['jumBarang'] % $hargaBanded['qty']) == 0) {
            $hargaJualAsli = $hargaJual['harga'];
         }
      }


      if (!$transferahad) {
         $sql = "INSERT INTO detail_jual(idBarang, barcode,
	                        jumBarang,hargaJual,harga_jual_asli,username, nomorStruk, hargaBeli)
							  VALUES({$simpan['idBarang']}, '{$simpan['barcode']}',
							  {$simpan['jumBarang']},{$simpan['harga']},{$hargaJualAsli},'{$_SESSION['uname']}', {$NomorStruk}, {$simpan['hargaBeli']})";
         mysql_query($sql) or die('Gagal simpan transaksi detail '.mysql_error());
         $detailJualId = mysql_insert_id();
// Diskon
         if (!(is_null($simpan['diskon_detail_uids']) && $simpan['diskon_detail_uids'] == 0)) {
            $sql = "insert into diskon_transaksi (diskon_detail_uids, barcode, waktu, diskon_persen, diskon_rupiah, idDetailJual) "
                    ."values('{$simpan['diskon_detail_uids']}','{$simpan['barcode']}','{$simpan['tglTransaksi']}',"
                    ."{$simpan['diskon_persen']},{$simpan['diskon_rupiah']},{$detailJualId})";
            mysql_query($sql) or die('Gagal simpan diskon_transaksi '.mysql_error());
         }
// End of Diskon
      } else if ($transferahad) {
         $sql = "INSERT INTO detail_transfer_barang(idBarang, barcode,
	                        jumBarang,hargaJual, username, nomorStruk)
							  VALUES({$simpan['idBarang']}, '{$simpan['barcode']}',
							  {$simpan['jumBarang']},{$simpan['hargaBeli']}, '{$_SESSION['uname']}', {$NomorStruk})";
         mysql_query($sql); // or die('Gagal simpan transaksi detail transfer' . mysql_error());
      }
   }

// jika transfer antar Ahad,
// generate file CSV nya
   if ($transferahad) {

// format isi file CSV :
// $data[0]  = barcode
// $data[1]  = idBarang - ignored
// $data[2]  = namaBarang
// $data[3]  = jumlah Barang / jumBarang
// $data[4]  = hargaBeli - ignored
// $data[5]  = hargaJual (di Gudang)
// $data[6]  = RRP (Recommended Retail Price)
// $data[7]  = namaSatuanBarang
// $data[8]  = namaKategoriBarang
// $data[9]  = Supplier - ignored
// $data[10] = username - ignored
// persiapan membuat output file CSV
      $csv = "\"barcode\",\"idBarang\",\"namaBarang\",\"jumBarang\",\"hargaBeli\",\"hargaJual\",\"RRP\",\"SatuanBarang\",\"KategoriBarang\",\"Supplier\",\"kasir\"\n";

// cari nama gudang ini
      $hasil = mysql_query("SELECT value FROM config WHERE `option` = 'store_name'");
      $x = mysql_fetch_array($hasil);
      $namaGudang = "";
      $namaGudang = $x[value];

      $hasil1 = mysql_query("SELECT * FROM tmp_detail_jual WHERE idCustomer = '$_SESSION[idCustomer]' AND username = '$_SESSION[uname]'");
      while ($x = mysql_fetch_array($hasil1)) {

// cari namaBarang
         $hasil2 = mysql_query("SELECT namaBarang, idKategoriBarang, idSatuanBarang, hargaJual FROM barang WHERE barcode='".$x['barcode']."'");
         $y = mysql_fetch_array($hasil2);
         $namaBarang = $y['namaBarang'];
         $idKategoriBarang = $y['idKategoriBarang'];
         $idSatuanBarang = $y['idSatuanBarang'];
         $hargaJual = $y['hargaJual'];

// cari namaSatuanBarang
         $hasil2 = mysql_query("SELECT namaSatuanBarang FROM satuan_barang WHERE satuan_id=".$idSatuanBarang);
         $y = mysql_fetch_array($hasil2);
         $namaSatuanBarang = $y[namaSatuanBarang];

// cari namaKategoriBarang
         $hasil2 = mysql_query("SELECT nama FROM kategori WHERE kategori_id=".$idKategoriBarang);
         $y = mysql_fetch_array($hasil2);
         $namaKategoriBarang = $y[namaKategoriBarang];

         $csv .= "\"".$x['barcode']."\",\"".$x['idBarang']."\",\"".$namaBarang."\",\"".$x['jumBarang']."\",\"".$x['hargaBeli']."\",\"".$x['hargaBeli']."\",\"".$hargaJual."\",\"".$namaSatuanBarang."\",\"".$namaKategoriBarang."\",\"".$namaGudang."\",\"".$_SESSION['uname']."\"\n";?>
      <?php }; // while ($x = mysql_fetch_array($hasil)) {
//header('location:media.php?module='.$module);
echo "<script>window.close();</script>"?>
<?php
// kirim output CSV ke browser untuk di download
// cari nama Customer
      $hasil2 = mysql_query("SELECT namaCustomer FROM customer WHERE idCustomer='".$_SESSION[idCustomer]."'");
      $y = mysql_fetch_array($hasil2);
      $namaCustomer = $y[namaCustomer];
      $namaFile = $namaCustomer."-".date("Y-m-d--H-i");

// hapus transaksi jual ini dari table tmp_detail_jual
      mysql_query("DELETE FROM tmp_detail_jual WHERE idCustomer = '$_SESSION[idCustomer]' AND username = '$_SESSION[uname]'");
      $_SESSION[tot_pembelian] = 0;
      releaseCustomer();

      header("Content-type: text/csv");
      header("Content-Disposition: attachment; filename=\"$namaFile.csv\"");
      header("Pragma: no-cache");
      header("Expires: 0");
      echo $csv;
	  }else {
// hapus transaksi jual ini dari table tmp_detail_jual
      mysql_query("DELETE FROM tmp_detail_jual WHERE idCustomer = '$_SESSION[idCustomer]' AND username = '$_SESSION[uname]'");
      $_SESSION[tot_pembelian] = 0;
      releaseCustomer();

         echo "<script>window.close();</script>";
	  }}
   
   

   elseif ($module == 'penjualan_barang' AND $act == 'get_harga_jual') {
   if (isset($_POST['barcode'])) {
      $result = mysql_query("select harga from barang where barcode = '{$_POST['barcode']}'") or die('Gagal ambil harga jual, barang#'.$_POST['barcode'].', error: '.mysql_error());
      $barang = mysql_fetch_array($result);
      $return = array(
          'sukses' => true,
          'harga' => $barang['harga']
      );
      echo json_encode($return);
   }
}
   
	    
   else { // {=======================================================================================================================================
   echo "Tidak Ada Aksi untuk modul ini";
}
?>