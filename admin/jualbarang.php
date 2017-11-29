<?php include "config.php";
include "function.php";
?><SCRIPT TYPE="text/javascript">
<!--
   function popupform(myform, windowname)
   {
      if (!window.focus)
         return true;
      window.open('', windowname, 'type=fullWindow,fullscreen=yes,scrollbars=yes');
      myform.target = windowname;
      return true;
   }
//-->
</SCRIPT>
<?php
// ambil daftar customer yang bukan member saja
// Untuk member, nanti dientry di tampilan POS
$sql = "SELECT idCustomer, namaCustomer
		FROM customer WHERE member=0 ORDER BY idCustomer ASC";
$namaCustomer = mysql_query($sql);
?>
<h2>Penjualan Barang</h2>
<form method=POST action='js_jual_barang.php?act=caricustomer' onSubmit="popupform(this, 'jual_barang')">
   (i) username customer : 
     <label for="idCustomer"></label>
     <input type="text" name="idCustomer" id="idCustomer" />
  <input type=submit value='(p) Pilih Customer' name='cariCustomer' accesskey='p'/>
</form>