
   
   <?php include "config.php";
   include "../function/fungsi_indotgl.php";
   include "function.php";
   switch ($_GET[act]) {
	   
	    default:?>
		
		<h2>Retur Pembelian</h2>
         <form method=POST action='?module=pembelian_barang&act=returpembelianpernota&action=lihatlaporan'>
            <select name=supplierId>
               <?php
               $supplier = getSupplier();
               while ($dataSupplier = mysql_fetch_array($supplier)) {
                  ?>
                  <option value="<?php echo $dataSupplier['idSupplier']; ?>"><?php echo "{$dataSupplier['namaSupplier']}::{$dataSupplier['idSupplier']}::{$dataSupplier['alamatSupplier']}"; ?></option>
               <?php }
               ?>
            </select>
            <br/>Periode Laporan : Bulan :
            <select name=bulanLaporan>
               <?php
               $dataBulan = getMonth();
               while ($bulan = mysql_fetch_array($dataBulan)) {
                  ?>
                  <option value="<?php echo $bulan['bulan']; ?>"><?php echo getBulanku($bulan['bulan']); ?></option>
                  <?php
               }
               ?>
            </select>, Tahun :
            <select name=tahunLaporan>
               <?php
               $dataTahun = getYear();
               while ($tahun = mysql_fetch_array($dataTahun)) {
                  ?>
                  <option value="<?php echo $tahun['tahun']; ?>"><?php echo $tahun['tahun']; ?></option>
                  <?php
               }
               ?>
            </select>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=submit value=Lihat>
         </form>

         <?php
         if ($_GET[action] == 'lihatlaporan') {
            $detail = getDetailSupplier($_POST[supplierId]);
            $detailSupplier = mysql_fetch_array($detail);
            echo "<hr/>
                <br/>Nama Supplier : $detailSupplier[namaSupplier]
                <br/>Alamat Supplier : $detailSupplier[alamatSupplier]
                <br/>Periode : ".getBulan($_POST[bulanLaporan])." - $_POST[tahunLaporan]";
            $pembelian = getDataPembelian($_POST[supplierId], $_POST[bulanLaporan], $_POST[tahunLaporan]);
            $jmlPembelian = mysql_num_rows($pembelian);
            if ($jmlPembelian != 0) {
               ?>
               <br/><br/>
               <table class="tabel">
                  <tr>
                     <th>No</th>
                     <th>No Nota</th>
                     <th>Tgl Pembelian</th>
                     <th>Nominal</th>
                     <th>Detail</th>
                  </tr>
                  <?php
                  $totalPembelian = 0;
                  $no = 1;
                  while ($dataPembelian = mysql_fetch_array($pembelian)) {
                     ?>
                     <tr <?php echo $no % 2 === 0 ? 'class="alt"' : ''; ?>>
                        <td><?php echo $no; ?></td>
                        <td class="right"><?php echo $dataPembelian['noNota']; ?></td>
                        <td class="center"><?php echo tgl_indo($dataPembelian['tglNota']); ?></td>
                        <td class="right"><?php echo uang($dataPembelian['nominal']); ?></td>
                        <td><a href=?module=pembelian_barang&act=detailretur&idnota=<?php echo $dataPembelian['noNota']; ?>>Detail</a></td>
                     </tr>
                     <?php
                     $totalPembelian += $dataPembelian[nominal];
                     $no++;
                  }
                  echo "<tr><td colspan=3 align=right class=td><b>Total</b></td><td class=td align=right><b>".uang($totalPembelian)."</b></td><td class=td>&nbsp;</td></tr>
                    </table>";
               } else {
                  echo "<br/><br/>Belum ada pembelian dari supplier ini.";
               }
            }
            break;

         case "returpembelianperbarang"; // =======================================================================================================================
            ?>
            <h2>Retur Pembelian</h2>
            <form method=POST action="modul/js_jual_barang.php?act=carisupplier" onSubmit="popupform(this, 'jual_barang')">
               Supplier :
               <select name="supplierId">
                  <?php
                  $supplier = getSupplier();
                  while ($dataSupplier = mysql_fetch_array($supplier)) {
                     ?>
                     <option value="<?php echo $dataSupplier['idSupplier']; ?>"><?php echo "{$dataSupplier['namaSupplier']}::{$dataSupplier['alamatSupplier']}"; ?></option>
                     <?php
                  }
                  ?>
               </select>
               <br/>
               <input type=submit value='(p) Pilih Supplier' name='cariSupplier' accesskey='p'/>
            </form>
            <?php
			 if ($_GET[action] == 'lihatlaporan') {  // -------------------------------------------------------------------
               $detail = getDetailSupplier($_POST[supplierId]);
               $detailSupplier = mysql_fetch_array($detail);
               echo "<hr/>
                <br/>Nama Supplier : $detailSupplier[namaSupplier]
                <br/>Alamat Supplier : $detailSupplier[alamatSupplier]
                <br/>Periode : ".getBulan($_POST[bulanLaporan])." - $_POST[tahunLaporan]";
               $pembelian = getDataPembelian($_POST[supplierId], $_POST[bulanLaporan], $_POST[tahunLaporan]);
               $jmlPembelian = mysql_num_rows($pembelian);
               if ($jmlPembelian != 0) {
                  ?>
                  <br/><br/>
                  <table class="tabel">
                     <tr>
                        <th>No</th>
                        <th>No Nota</th>
                        <th>Tgl Pembelian</th>
                        <th>No Invoice</th>
                        <th>Nominal</th>
                        <th>Detail</th>
                     </tr>
                     <?php
                     $totalPembelian = 0;
                     $no = 1;
                     while ($dataPembelian = mysql_fetch_array($pembelian)) {
                        ?>
                        <tr class="<?php echo $no % 2 === 0 ? 'alt' : ''; ?>">
                           <td><?php echo $no; ?></td>
                           <td class="right"><?php echo $dataPembelian['noNota']; ?></td>
                           <td class="center"><?php echo tgl_indo($dataPembelian['tglNota']); ?></td>
                           <td class="right"><?php echo $dataPembelian['NomorInvoice']; ?></td>
                           <td class="right"><?php echo uang($dataPembelian['nominal']); ?></td>
                           <td><a href=?module=pembelian_barang&act=detaillaporan&idnota=<?php echo $dataPembelian['noNota']; ?>>Detail</a></td>
                        </tr>
                        <?php
                        $totalPembelian += $dataPembelian[nominal];
                        $no++;
                     }
                     echo "<tr><td colspan=4 align=right class=td><b>Total</b></td><td class=td align=right><b>".uang($totalPembelian)."</b></td><td class=td>&nbsp;</td></tr>
                    </table>";
                  } else {
                     echo "<br/><br/>Belum ada pembelian dari supplier ini.";
                  }
               }
               break;


            case "detailretur"; // ===========================================================================================================
               $data = getDataNotaPembelian($_GET[idnota]);
               $dataBeli = mysql_fetch_array($data);
               echo "<h2>Retur Nota No : $_GET[idnota]</h2>
            <table>
                <tr>
                    <td>Nama Supplier</td><td> : </td><td>$dataBeli[namaSupplier]</td><td width=20>&nbsp;</td>
                    <td>Alamat</td><td> : </td><td>$dataBeli[alamatSupplier]</td>
                </tr>
                <tr>
                    <td>Tgl Transaksi</td><td> : </td><td>".tgl_indo($dataBeli[tglNota])."</td><td width=20>&nbsp;</td>
                    <td>Nominal</td><td> : </td><td>".uang($dataBeli[nominal])."</td>
                </tr>
                <tr>
                    <td>Nomor Invoice</td><td> : </td><td>$dataBeli[NomorInvoice]</td><td width=20>&nbsp;</td>
                    <td colspan=3 align=right>
                        <form method=POST action='aksi.php?module=inputreturbeli&act=inputtemp'>
                        <input type=hidden name=idNota value=$_GET[idnota]>
			<input type=submit value='(i) Input Retur' accesskey='i'>
			</form></a>
                    </td>
                </tr>
            </table>
            <br/>";

               $detail = getDetailNotaPembelian($_GET[idnota]);
               if (mysql_num_rows($detail) != 0) {
                  ?>
                  <table class="tabel" border="1">
                     <tr>
                        <th>NO</th>
                        <th>Id Barang</th>
                        <th>Barcode</th>
                        <th>Nama Barang</th>
                        <th>Tgl Expire</th>
                        <th>Jumlah</th>
                        <th>Harga Beli</th>
                        <th>Total</th>
                        <th>Jumlah Sisa Stok</th>
                        <th>Total Sisa Stok</th>
                     </tr>
                     <?php
                     $no = 1;
                     $total = 0;
                     $totalSisaStok = 0;
                     while ($dataDetail = mysql_fetch_array($detail)) {
                        $subTotal = $dataDetail['jumBarangAsli'] * $dataDetail['hargaBeli'];
                        $total += $subTotal;
                        $subTotalSisaStok = $dataDetail['jumBarang'] * $dataDetail['hargaBeli'];
                        $totalSisaStok += $subTotalSisaStok;
                        ?>
                        <tr <?php echo $no % 2 === 0 ? 'class="alt"' : ''; ?>>
                           <td ><?php echo $no; ?></td>
                           <td><?php echo $dataDetail['idBarang']; ?></td>
                           <td><?php echo $dataDetail['barcode']; ?></td>
                           <td><?php echo $dataDetail['namaBarang']; ?></td>
                           <td><?php echo $dataDetail['tglExpire']; ?></td>
                           <td class="right"><?php echo $dataDetail['jumBarangAsli']; ?></td>
                           <td class="right"><?php echo uang($dataDetail['hargaBeli']); ?></td>
                           <td class="right"><?php echo uang($subTotal); ?></td>
                           <td class="right"><?php echo $dataDetail['jumBarang']; ?></td>
                           <td class="right"><?php echo uang($subTotalSisaStok); ?></td>
                        </tr>
                        <?php
                        $no++;
                     }
                     ?>
                     <tr <?php echo $no % 2 === 0 ? 'class="alt"' : ''; ?>>
                        <td colspan=7 class="center">TOTAL</td>
                        <td class="right"><?php echo uang($total); ?></td>
                        <td class="right" colspan="2"><?php echo uang($totalSisaStok); ?></td>
                     </tr>
                  </table>
                  <?php
                  // Jika sudah ada - tampilkan detail retur untuk Nota ini
                  echo "<h2>Nota Retur Yang Sudah Ada</h2>

		<table class='tabel'>
		<tr><th>NOTA</th><th>Id Barang</th><th>Barcode</th>
		<th>Jumlah<br />Retur</th><th>Harga Beli</th><th>Total</th></tr>";

                  $sql = "SELECT * FROM detail_retur_beli WHERE idTransaksiBeli = $_GET[idnota]";
                  $hasil = mysql_query($sql);

                  $currentTotal = 0;
                  $oldTotal = 0;
                  $ctr = 1;
                  $totalRecord = mysql_num_rows($hasil);
                  while ($x = mysql_fetch_array($hasil)) {

                     $currentTotal = $x[nominal];
                     if (($currentTotal !== $oldTotal) && ($oldTotal > 0)) {
                        ?>
                        <tr style="text-align:right" <?php echo $ctr % 2 === 0 ? 'class="alt"' : ''; ?>>
                           <?php
                           echo "<td colspan=6 class=td>
				".uang($oldTotal)."<br />
				(username: $oldUser)<br />
				(tanggal : $oldTgl)
			";
                        };
                        ?>

                     <tr <?php echo $ctr % 2 === 0 ? 'class="alt"' : ''; ?>>
                        <?php
                        echo "<td class=td>$x[idTransaksiBeli]</td>
                            <td class=td>$x[idBarang]</td>
                            <td class=td>$x[barcode]</td>
                            <td class=td>$x[jumRetur]</td>
                            <td class=td align=right>".uang($x[hargaBeli])."</td>
			<td class=td align=right>";

                        echo "</td></tr>";
                        $ctr++;
                        $oldTotal = $currentTotal;
                        $oldTgl = $x[tglRetur];
                        $oldUser = $x[username];
                     } // while ($x = mysql_fetch_array($hasil))
                     ?>
                  <tr style="text-align:right" <?php echo $ctr % 2 === 0 ? 'class="alt"' : ''; ?>>
                     <?php
                     echo "
<td colspan=6 class=td>
		".uang($oldTotal)."<br />
		(username: $oldUser)<br />
		(tanggal : $oldTgl)
		</td></tr>
		";
                     echo "</table>";
                  } else {
                     echo "Tidak Ada Data Detail Barang yang dibeli";
                  }

                  break;
            break;
		
		
   }
		?> 
   
   
