<?php include "config.php";
include "function.php";
include "library.php";?>
<link rel="stylesheet" type="text/css" href="css/jquery-ui-ac.min.css" />
			<link rel="stylesheet" type="text/css" href="css/style.css" />
			<link rel="stylesheet" type="text/css" href="css/jquery.simple-dtpicker.css" />

			<script type="text/javascript" src="js/jquery.min.js"></script>
			<script type="text/javascript" src="js/interface.js"></script>
			<script type="text/javascript" src="js/jquery.form.min.js"></script>
			<script type="text/javascript" src="js/jquery.simple-dtpicker.js"></script>
           <link rel="stylesheet"
    href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.3.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
 
    
<link href='css/style.css' rel='stylesheet' type='text/css'>
<script>
$(function() {  
        $( "#namaBarang" ).autocomplete({
         source: "searchnama.php",  
           minLength:1, 
        });
    });
</script>
<script type="text/javascript">
   $(document).ready(function ()
   {
      $('#layer1').Draggable(
              {
                 zIndex: 60,
                 ghosting: false,
                 opacity: 0.7,
                 handle: '#layer1_handle'
              }
      );
      $('#layer1_form').ajaxForm({
         target: '#frmTambahBarang',
         success: function ()
         {
            $("#layer1").hide();
         }
      });
      $("#layer1").hide();
      $('#tambahbarang').click(function ()
      {
         $("#layer1").show();
         $("#barcode").focus();
      });
      $('#close').click(function ()
      {
         $("#layer1").hide();
      });
   });
   function popupform(myform, windowname)
   {
      if (!window.focus)
         return true;
      window.open('', windowname, 'type=fullWindow,fullscreen,scrollbars=yes');
      myform.target = windowname;
      return true;
   }

</script>

<style type="text/css">

   #layer1
   {
      position: absolute;
      left:200px;
      top:200px;
      width:450px;
      background-color:#eef4d2;
      border: 1px solid #000;
      z-index: 50;
   }
   #layer1_handle
   {
      background-color:#265180;
      padding:0px;
      text-align:center;
      font-weight:bold;
      color: #FFFFFF;
      vertical-align:middle;
   }
   #layer1_content
   {
      padding:5px;
   }
   #close
   {
      float:right;
      text-decoration:none;
      color:#FFFFFF;
   }
</style>
<?php

switch ($_GET[act]) {
	
	
	 case "carisupplier": // ====================================================================================================================

               if (isset($_POST['supplier_id'])) {
                  $x = findSupplier($_POST['supplier_id']);
               } else {
                  $x = findSupplier($_GET['supplier_id']);
               };

               //echo "POST : ".$_POST['idSupplier']." GET : ".$_GET['idSupplier']." SESSION"; var_dump($_SESSION);
               ?>
               <h2>Pembelian Barang</h2>Pembelian Barang dari supplier : <?php echo $_SESSION['namaSupplier']; ?>
               <table>
                  <tr>
                  <form method="POST" action="?act=carisupplier&action=cek&supplier_id=<?php echo $_SESSION['supplier_id']; ?>">

                     <br /><br /> 
                     <div class="ui-widget">                      <td height="68">(1) Pilihan barcode</td>
                     
<td>: <input id="namaBarang" name="namaBarang" type="text" /> 
                     </td></div>
                     <td>
                        <input type="submit" value="(2) Pilih barcode !" accesskey="2" />
                        <input type="hidden" name="xppn" value="<?php echo $_POST['xppn']; ?>">
                        <input type="hidden" name="xDiskonPersen" value="<?php echo $_POST['xDiskonPersen']; ?>">
                        <input type="hidden" name="persenprofit" value="<?php echo $_POST['persenprofit']; ?>">
                     </td>
                  </form>
                  </tr>
                  <tr>
                  <form method="POST" action="belibarang.php?act=carisupplier&action=cek&supplier_id=<?php echo $_SESSION['supplier_id']; ?>">

                     <br /> <td height="45">(3) Pilihan barang</td>
                     <?php
                     // Pilihan barang disortir berdasarkan nama barang
                     $sql1 = mysql_query("SELECT DISTINCT barang.barcode, barang.nm_id, nm_brg.nm_brg
                                FROM barang LEFT JOIN nm_brg ON barang.nm_id = nm_brg.nm_id WHERE supplier_id=".$_SESSION['supplier_id']." AND (non_aktif!=1 or non_aktif is null) ORDER BY nm_brg ASC");
                     ?>
                     <td>:
                        <select name="barcode" accesskey="3">
                           <?php
                           while ($data = mysql_fetch_array($sql1)) {
                              echo "<option value=$data[barcode]>$data[nm_brg] :: $data[barcode]";
                           };
                           ?>
                        </select>
                     </td>
                     <td>
                        <input type=submit value="(4) Pilih barang !" accesskey="4" />
                     </td>
                     <input type="hidden" name="xppn" value="<?php echo $_POST['xppn']; ?>">
                     <input type="hidden" name="xDiskonPersen" value="<?php echo $_POST['xDiskonPersen']; ?>">
                     <input type="hidden" name="persenprofit" value="<?php echo $_POST['persenprofit']; ?>">
                  </form>
                  </tr>
                  <tr>
                     <td></td>
                     <td></td>
                     <td>
                        <?php
                        //HS tombol "Tambah Barang" akan memunculkan form dialog jQuery
                        echo "	<form method=POST action='belibarang.php?act=carisupplier&action=cek&supplier_id=".$_SESSION['supplier_id']."'>
		<input type=\"button\" id=\"tambahbarang\" accesskey='b' value='(b) Tambah Barang Baru' />
		<input type='hidden' name='xppn' value='$_POST[xppn]'>
		</form>";
                        ?>
                     </td>
                  </tr>
               </table>
               <?php
			  
               if ($_GET[action] == 'cek') { // ===============================================================================================================
                  $barang = cekBarang($_POST[barcode]);

                  //tambahan untuk harga banded
                  $query = "SELECT qty, harga FROM harga_banded WHERE barcode = '{$_POST['barcode']}'";
                  $hasil = mysql_query($query);
                  $hargaBanded = mysql_fetch_array($hasil, MYSQL_ASSOC);

                  $dataPenjualan = null;

                  if (!$barang) {
                     echo "Data belum ada !";
                   break;
                  } else {
                     /* Data penjualan .. jika ada */
                     $showTable = mysql_query("show tables like 'data_penjualan'");
                     $rowNum = mysql_num_rows($showTable);
                     if ($rowNum > 0) {
                        $sql = "SELECT barcode, penjualan, rata_rata_mingguan, jumlah_bulan_terakhir FROM data_penjualan 
                                WHERE barcode = '{$barang['barcode']}'";
                        $hasil = mysql_query($sql);
                        $dataPenjualan = mysql_fetch_array($hasil, MYSQL_ASSOC);
                     }
                  }
			   }
               ?>
               <script>
                  function RecalcHargaBarangLama() {
                     var HargaBeli = 0;
                     var HargaJual = 0;
                     var Subtotal = parseInt(document.getElementById("xsubtotal").value);
                     var PPN = parseInt(document.getElementById("xppn").value);
                     var JumlahBarang = parseInt(document.getElementById("jumBarang").value);
                     var PersenProfit = parseInt(document.getElementById("xPersenProfit").value);
                     var DiskonPersen = parseFloat(document.getElementById("xDiskonPersen").value);
                     var DiskonRupiah = parseInt(document.getElementById("xDiskonRupiah").value);
                     if (Subtotal) {
                        HargaBeli = (Subtotal / JumlahBarang)
                        // hitung diskon dulu !
                        HargaBeli = HargaBeli - ((HargaBeli / 100) * DiskonPersen) - DiskonRupiah;
                        // baru kemudian hitung PPN
                        HargaBeli = HargaBeli + ((HargaBeli / 100) * PPN);
                        HargaJual = HargaBeli + ((HargaBeli / 100) * PersenProfit);
                     }

                     // mencegah keliru input barcode di kolom JumlahBarang
                     if (JumlahBarang > 2000) {
                        JumlahBarang = 0;
                     }


                     document.getElementById("hargaBeliBaru").value = HargaBeli;
                     document.getElementById("hargaJualBaru").value = HargaJual;
                     document.getElementById("jumBarang").value = JumlahBarang;
                  }

               </script>
               <?php
               // inisialisasi variabel xppn dan diskon
               if (!$_POST[xppn]) {
                  $_POST[xppn] = 0;
                  $_POST['xDiskonPersen'] = 0;
                  $_POST['persenprofit'] = 0;
               };
               ?>
               <?php
               if ($barang) {
                  ?>
                  <p style="background-color: #EEF4D2; padding: 2px 5px; width: 705px; text-align: right">
                     <?php
                     if (!is_null($dataPenjualan)) {
                        ?>
                        Rata-rata penjualan perminggu, selama <?php echo $dataPenjualan['jumlah_bulan_terakhir']; ?> bulan terakhir: <?php echo number_format($dataPenjualan['rata_rata_mingguan'], 2, ',', '.'); ?><br />
                        <?php
                     }
                     ?>
                     Stok tercatat: <?php echo $barang['qty']; ?><br/>
                  </p>
                  <?php
               }
               ?>
                <div id="frmTambahBarang">
                  <form method="POST" action="?act=carisupplier&action=tambah">
                     <?php // this button will be default (when press enter) and invisible button     ?>
                     <input type=submit value='(t) Tambah' name=btTambah style="position: absolute; left: -100%;">
                     <table width="552">
                        <tr>
                           <td>Barcode</td>
                           <td> : <input type="text" name="barcode" value="<?php echo $barang['barcode']; ?>" readonly="readonly" />
                              <input type="hidden" name="idBarang" value="<?php echo $barang['barang_id']; ?>" /></td>
                           <td><a name='#jumlah'>  <u>J</u>umlah yang dibeli </a></td>
                           <td> : <input type=text name='jumBarang' id='jumBarang' tabindex=1 accesskey='j'/></td>
                        </tr>
                        <tr>
                           <td>Nama Barang</td>
                           <td> : <input type=text name='namaBarang' value='<?php echo $barang['nm_brg']; ?>' readonly='readonly' /></td>
                           <td>Subtotal (Rp)</td>
                           <td> : <input type=text name='subtotal' value='0' id='xsubtotal'  tabindex=2 /></td>
                        </tr>
                        <tr>
                           <td>Diskon (%)</td>
                           <td> : <input type=text name='xDiskonPersen' value='<?php echo $_POST['xDiskonPersen']; ?>' id='xDiskonPersen' tabindex="3" /></td>
                           <td>PPN (%)</td>
                           <td> : <input type=text name='xppn' value='<?php echo $_POST['xppn']; ?>' id='xppn'  tabindex=5 /></td>
                        </tr>
                        <tr>
                           <td>Diskon (Rp)</td>
                           <td> : <input type=text name='xDiskonRupiah' value='0' id='xDiskonRupiah' tabindex="4"/></td>
                           <td>Profit (%)</td>
                           <td> : <input type=text name='persenprofit' value='<?php echo $_POST['persenprofit']; ?>' id='xPersenProfit' tabindex=6 /></td>
                        </tr>
                        <tr>
                           <td colspan="4"><button style="float:right" onclick="RecalcHargaBarangLama();
                                       return false;" accesskey='6' tabindex="7">(6) Hitung Harga</button></td>
                        </tr>
                        <tr>
                           <td>Harga Beli Sekarang</td>
                           <td> : <input type=text name='hargaBeliLama' value='<?php echo $barang['hargaBeli']; ?>' readonly='readonly' /></td>
                           <td>Harga Beli Barang</td>
                           <td> : <input type=text name='hargaBeliBaru' id='hargaBeliBaru' tabindex="8" value='<?php echo $barang['hargaBeli']; ?>' /></td>
                        </tr>
                        <tr>
                           <td>Harga Jual Sekarang</td>
                           <td> : <input type=text name='hargaJualLama' value='<?php echo $barang['harga']; ?>' readonly='readonly' /></td>
                           <td>Harga Jual Barang</td>
                           <td> : <input type=text name='hargaJualBaru' id='hargaJualBaru' value='<?php echo $barang['harga']; ?>' tabindex=9 /></td>
                        </tr>
                        <tr>
                           <td colspan=2>&nbsp</td>
                           <td>Tanggal Expire (yyyy-mm-dd)</td>
                           <td> : <input type=text name='tglExpire' size=10 tabindex=10 /></td>
                        </tr>
                        <tr>
                           <td>Harga Banded</td>
                           <td> : <input type=text name='hargaBanded' size=10 tabindex=11 id="hargaBanded" value = "<?php echo isset($hargaBanded) ? $hargaBanded['qty'] * $hargaBanded['harga'] : ''; ?>"/></td>
                           <td>Harga Banded Satuan</td>
                           <td> : <input type=text name='hargaBandedSatuan' size=10 tabindex=13 id="hargaBandedSatuan" value="<?php echo $hargaBanded['harga'] ?>"/></td>
                        </tr>
                        <tr>
                           <td>Qty Banded</td>
                           <td> : <input type="text" name="qtyBanded" tabindex=12 id="qtyBanded" value="<?php echo $hargaBanded['qty']; ?>"/></td>
                        </tr>
                        <tr>

                           <td align=right colspan=4>
                              <input type=submit accesskey='t' value='(t) Tambah' name=btTambah tabindex=14 >
                              <input type='hidden' name='supplier_id' value='<?php echo $_SESSION['supplier_id
							  ']; ?>'>
                           </td>
                        </tr>
                     </table>
                  </form>
               </div>

              <script>
                  var txtBox = document.getElementById("jumBarang");
                  if (txtBox != null)
                     txtBox.focus();

                  $("#hargaBanded").keyup(function () {
                     updateHargaBandedSatuan();
                  });

                  $("#qtyBanded").keyup(function () {
                     updateHargaBandedSatuan();
                  });

                  $("#hargaBandedSatuan").keyup(function () {
                     updateHargaBanded();
                  });

                  function updateHargaBandedSatuan() {
                     var harga = parseInt($("#hargaBanded").val()) / parseInt($("#qtyBanded").val());
                     $("#hargaBandedSatuan").val(harga);
                  }

                  function updateHargaBanded() {
                     var harga = parseInt($("#hargaBandedSatuan").val()) * parseInt($("#qtyBanded").val());
                     $("#hargaBanded").val(harga);
                  }
               </script>
               <?php
               //fixme : perlu validasi input
               //	# tidak boleh kosong jumlah barang
               //	# tidak boleh kosong harga beli
               //	# tidak boleh kosong harga jual
               // bisa pakai fasilitas dari jQuery : http://www.position-absolute.com/articles/jquery-form-validator-because-form-validation-is-a-mess/

  if ($_GET[action] == 'tambah') { // =============================================================================================================
                  //fixme: item dg barcode "0" pasti selalu ikut terinput - cek dari log query MySQL
				  $session = $_SESSION['supplier_id'];
				  $barcode = $_POST['barcode'];
				  $qtybrg = $_POST['jumBarang'];
				  $hargajualbaru = $_POST['hargaJualBaru'];
				  $hargabelibaru = $_POST['hargaBeliBaru'];
				  $expired = $_POST['tglExpire'];
                    $true = cekBarangTemp($_SESSION[supplier_id], $_POST[barcode]);
                  
                     if ($true != 0) {
                       $ambilJumBarang = mysql_query("SELECT qty FROM tmp_detail_beli WHERE supplier_id = $session and barcode = '$barcode'") or die (mysql_error());
   $dataJum = mysql_fetch_array($ambilJumBarang);
   $jumlah = $dataJum[qty] + $qtybrg;
   mysql_query("UPDATE tmp_detail_beli SET qty = '$jumlah' WHERE supplier_id = '$session' and barcode = '$barcode'");
                     } else {
                         $tgl = date("Y-m-d");
   mysql_query("INSERT into tmp_detail_beli(supplier_id, tglTransaksi,
                        barcode,tglExpire,qty,hargaBeli,hargaJual,admin_id)
                    VALUES('$session','$tgl','$barcode','$expired',
                        '$qtybrg','$hargabelibaru','$hargajualbaru','1')") or die (mysql_error());
                     }
                     // harga banded
                     if (isset($_POST['qtyBanded']) && isset($_POST['hargaBandedSatuan'])) {
                        $qty = $_POST['qtyBanded'];
                        $barcode = $_POST['barcode'];
                        $harga = $_POST['hargaBandedSatuan'];
                        if ($qty > 0) {
                           $sql = "INSERT INTO tmp_harga_banded (barcode, user_name, supplier_id, qty, harga_satuan) "
                                   ."VALUES('{$barcode}','admin','{$session}',  {$qty},{$harga}) "
                                   ."ON DUPLICATE KEY UPDATE qty={$qty}, harga_satuan={$harga} ";
                        } else {
                           $sql = "DELETE FROM tmp_harga_banded WHERE barcode = '{$barcode}' AND user_name='admin'";
                        }
                        mysql_query($sql) or die(mysql_error());
                     }
                  }
               



              
               if ($_GET[action] == 'ubahjumlah') {
                  //echo "Ubah Jumlah  :  $_POST[barcode],$_POST[jumlahBarang],$_POST[hargaBeli],$_POST[hargaJual]";

                  $true = cekBarangTemp($_SESSION[supplier_id], $_POST[barcode]);
                  if ($true != 0) {
                     ubahJumlahBarangBeliTemp($_SESSION[supplier_id], $_POST[idBarang], $_POST[jumlahBarang]);
                  }
               }
               $sql = "SELECT *
                                from tmp_detail_beli tdb, barang b LEFT JOIN nm_brg as n ON b.nm_id=n.nm_id
                                where tdb.barcode = b.barcode and tdb.supplier_id = '$_SESSION[supplier_id]' and tdb.admin_id = '1'";
               //echo $sql;
               $query = mysql_query($sql) or die (mysql_error());

               $r = mysql_fetch_row($query);
               echo "<hr/>";

               if ($r) { // -------------------- tampilkan data yang sudah di input sejauh ini ---------
                  //echo "Ada $r[0] data";
                  ?>
                  <table class="tabel">
                     <tr><th>Barcode</th>
                        <th>Nama Barang</th>
                        <th>Tgl Expire</th>
                        <th>Jumlah</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Total</th>
                        <th>Aksi</th>
                     </tr>
                     <?php
                     $no = 1;
                     $tot_pembelian;
                     $sql = "SELECT tdb.barcode, tdb.idBarang, tdb.hargaJual,n.nm_id,n.nm_brg, tglExpire, tdb.qty, hargaBeli
                                FROM tmp_detail_beli tdb, barang b 
									LEFT JOIN nm_brg as n
									ON b.nm_id = n.nm_id
                                WHERE tdb.barcode = b.barcode AND tdb.supplier_id = '$_SESSION[supplier_id]' AND tdb.admin_id = '1'
				ORDER BY barang_id"; 
                     //echo $sql;
                     $query2 = mysql_query($sql) or die (mysql_error());
                     while ($data = mysql_fetch_array($query2)) {
                        $total = $data[hargaBeli] * $data[qty];
                        ?>
                        <tr <?php echo $no % 2 === 0 ? 'class="alt"' : ''; ?>>
                        <form method=POST action='belibarang.php?act=carisupplier&action=ubahjumlah'>
                           <td><?php echo $data['barcode']; ?></td>
                           <td><?php echo $data['nm_brg']; ?></td>
                           <td><?php echo $data['tglExpire']; ?></td>
                           <td align=right><input type=text name=jumlahBarang value="<?php echo $data['qty']; ?>" size=5></td>
                           <td align=right><?php echo $data['hargaBeli']; ?></td>
                           <td align=right><?php echo $data['hargaJual']; ?></td>

                           <input type=hidden name=barcode value="<?php echo $data['barcode']; ?>">
                           <input type=hidden name=idBarang value="<?php echo $data['barang_id']; ?>">

                           <td align=right><?php echo number_format($total, 0, ',', '.'); ?></td>
                           <td width=120><input type=submit name=update value=Update></form> |
                        <a href='./aksi.php?module=pembelian_barang&act=hapus_detil&id=<?php echo $data['barang_id']; ?>'>Hapus</a></td>
                        </tr>
                        <?php
                        $tot_pembelian += $total;
                        $no++;
                     }

//fixme: tombol update membuat jumlah stok jadi sama semua
                     //HS total invoice :
                     //	subtotal - (DiskonPersen x subtotal) - (DiskonRupiah) + PPN
                     if (empty($_POST[DiskonPersen])) {
                        $_POST[DiskonPersen] = 0;
                     };
                     if (empty($_POST[DiskonRupiah])) {
                        $_POST[DiskonPersen] = 0;
                     };
                     if (empty($_POST[PPN])) {
                        $_POST[PPN] = 0;
                     };
                     $tot_pembelian = $tot_pembelian - ($_POST[DiskonPersen] * $tot_pembelian) - $_POST[DiskonRupiah] + $_POST[PPN];
                     ?>
                     <script>
                        function Recalc() {
                           var total = 0;
                           var GrandTotal = parseInt(document.getElementById("tot_pembayaran").value);
                           var PPN = parseInt(document.getElementById("ppn").value);
                           var DiskonPersen = parseInt(document.getElementById("diskonpersen").value);
                           var DiskonRupiah = parseInt(document.getElementById("diskonrupiah").value);

                           if (GrandTotal) {
                              total = GrandTotal;
                              total = total - (GrandTotal / 100 * DiskonPersen);
                              total = total - DiskonRupiah;
                              total = total + (GrandTotal / 100 * PPN);
                           }
                           document.getElementById("grandtotal").value = total;
                           document.getElementById("tot_pembayaran").value = total;
                        }

                     </script>

                  </table>
                  <?php
                  $pmbyrn = mysql_query("SELECT * from pembayaran");
                  echo "<form method=POST action='./aksi.php?module=pembelian_barang&act=input'>
                        <input type=hidden name='tot_pembayaran' value='$tot_pembelian' id='tot_pembayaran'>
                    <table class=tableku width=600>
                        <tr><td width=65% align=right><a name='#total'>Total Pembelian</a><br />
				<a href='#total' onclick=\"Recalc();\" accesskey='u'>Hitung (U)lang</a></td><td align=right><input id='grandtotal' readonly='readonly' value='".number_format($tot_pembelian, 0, ',', '.')."' tabindex=15></td></tr>
                        <tr><td width=65% align=right>Tipe Pembayaran</td>
                            <td align=right><select name='tipePembayaran' tabindex=16>
                                        <option value='0'>-Tipe Pembayaran-</option>";
                  while ($pembayaran = mysql_fetch_array($pmbyrn)) {
                     echo "<option value='$pembayaran[idTipePembayaran]'>$pembayaran[tipePembayaran]</option>";
                  }
                  echo "</select></td></tr>
                        <tr><td width=65% align=right>Tanggal Pembayaran (hutang)</td><td align=right><input type=text name='tglBayar' tabindex=17></td></tr>
                        <tr><td width=65% align=right>Nomor Invoice</td><td align=right><input type=text name='NomorInvoice' value=0 tabindex=18></td></tr>
                        <tr><td width=65% align=right>Tanggal Invoice</td><td align=right><input type=text name='TanggalInvoice'
			value='".date("Y-m-d")."' tabindex=19></td></tr>
			<tr><td width=65% align=right>Diskon (%)</td><td align=right><input type=text id='diskonpersen' name='DiskonPersen' value=0 tabindex=20></td></tr>
			<tr><td width=65% align=right>Diskon (Rp)</td><td align=right><input type=text id='diskonrupiah' name='DiskonRupiah' value=0 tabindex=21></td></tr>
			<tr><td width=65% align=right>PPn (%)</td><td align=right><input type=text id='ppn' name='PPN' value=0 tabindex=22></td></tr>";



                  echo "
                        <tr><td colspan=2>&nbsp;</td></tr>
                        <tr>
				<td><a href='aksi.php?module=pembelian_barang&act=batal'>BATAL</a></td>

				<td>
					<input type='hidden' name='supplier_id' value='".$_SESSION['supplier_id']."'>
					<input type=submit value='Simpan' tabindex=23>
				</td>
			</tr>
                        </table></form>
			";

                  //fixme : Pembatalan Nota (code di atas & bawah komentar ini) perlu merujuk ke user ybs,
                  // agar jangan keliru menghapus nota yang sedang di input oleh user yang lainnya
               } else {

                  echo "Belum ada barang yang dibeli<br /><a href='aksi.php?module=pembelian_barang&act=batal'>BATAL</a>";
               }

               break;
			   default :
	 $sql1 = getSupplier();
	  ?>
               <h2>Pembelian Barang</h2>
               <form method=POST action='belibarang.php?act=carisupplier'>
                  <select name="supplier_id" style="width:30%">
                     <?php
                     while ($data = mysql_fetch_array($sql1)) :
                        ?>
                        <option value="<?php echo $data['supplier_id']; ?>">
                           <?php
                           echo $data['namaSupplier'];
                           echo trim($data['alamatSupplier']) === '' ? '' : ' :: '.$data['alamatSupplier'];
                           ?>
                        </option>
                        <?php
                     endwhile;
                     ?>
                  </select>
                  <input type=submit value='(c) Cari' accesskey='c' name='cariSupplier' />
               </form>
               <?php
	break;
}?>