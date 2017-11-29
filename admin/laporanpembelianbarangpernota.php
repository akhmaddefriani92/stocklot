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
   
   <?php include "config.php";
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
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=submit value=Lihat>
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
            break;
		

   }
		?> 
   
   
