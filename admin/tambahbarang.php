<?php
 include "config.php"; 
 $ambilSupplier = mysql_query("select * from supplier order by namaSupplier");
$ambilRak = mysql_query("select * from rak");
$ambilKategoriBarang = mysql_query("select * from kategori");
$ambilSatuanBarang = mysql_query("select * from satuan_barang");
$ambilWarna = mysql_query("select * from warna");
$ambilUkuran = mysql_query("select * from size");
$ambilNama = mysql_query("select * from nm_brg");
?> 


<h2>Tambah Barang</h2>
          <form method=POST enctype="multipart/form-data" action='tambahbarang.php' name='tambahbarang'>
          <table border="0">
          <tr><td>Barcode</td><td> : <input type=text name='barcode' size=20 ></td></tr>
        
         <tr><td>Nama Barang</td><td> : <select name='namaBarang'> 
         						<option value='0'>pilih namabarang</option>";
   <?php  while ($namabarang = mysql_fetch_array($ambilNama)) {
            echo "<option value='$namabarang[nm_id]'>$namabarang[nm_brg]</option>";}
			echo "</select></td><td>Jika belum mendaftarkan nama barang silahkan di daftarkan terlebih dahulu untuk menghindari perbedaan nama</tr>
         										
          <tr><td>Supplier</td>
                <td> : <select name='supplier'>
                            <option value='0'>- Supplier -</option>";
    while ($supplier = mysql_fetch_array($ambilSupplier)) {
            echo "<option value='$supplier[supplier_id]'>$supplier[namaSupplier]</option>";
        }
        echo "</select></td></tr>
          <tr><td>Kategori Barang</td>
                <td> : <select name='kategori_barang'>
                            <option value='0'>- Kategori Barang-</option>";
        while ($kategori = mysql_fetch_array($ambilKategoriBarang)) {
            echo "<option value='$kategori[kategori_id]'>$kategori[nama]</option>";
        }
		echo "</select></td></tr>
          <tr><td>Warna</td>
                <td> : <select name='warna'>
                            <option value='0'>- pilh warna-</option>";
							while ($warna = mysql_fetch_array($ambilWarna)) {
            echo "<option value='$warna[warna_id]'>$warna[warna]</option>";
        }
		echo "</select></td></tr>
          <tr><td>Size</td>
                <td> : <select name='ukuran'>
                            <option value='0'>- pilih Size-</option>";
							while ($ukuran = mysql_fetch_array($ambilUkuran)) {
            echo "<option value='$ukuran[size_id]'>$ukuran[size]</option>";
        }
        echo "</select></td></tr>
          <tr><td>Satuan Barang</td>
                <td> : <select name='satuan_barang'>
                            <option value='0'>- Satuan Barang-</option>";
        while ($satuan = mysql_fetch_array($ambilSatuanBarang)) {
            echo "<option value='$satuan[satuan_id]'>$satuan[namaSatuanBarang]</option>";
        }
     ; ?>
		  
            <tr>
    <td width="94">Gambar 1</td>
   
    <td> : <input type="file" name="gambar1"></td>
  </tr>
  <tr>
    <td>Gambar2</td>
    
    <td> : <input type="file" name="gambar2"></td>
  </tr>
  <tr>
    <td>Gambar3</td>
    
    <td> : <input type="file" name="gambar3"></td>
  </tr>
  <tr>
    <td>Gambar4</td>
  
    <td> : <input type="file" name="gambar4"></td>
  </tr>
  <tr><td>keterangan produk</td>: <td><p>
  <textarea name="shortdesc" cols="50" rows="10"></textarea>
</p>
    <p>&nbsp; </p></td></tr>
<tr><td>deskripsi</td><td> : <textarea name="longdesc" cols="100" rows="20" id="longdesc"></textarea></td></tr>
  </select></td></tr>
          <tr><td colspan=2>&nbsp;</td></tr>
          <tr><td colspan=2 align='right'><input type=submit value=Simpan>&nbsp;&nbsp;&nbsp;
                            <input type=button value=Batal onclick=self.history.back()></td></tr>
                            
 </table></form>
 
 <?php  $nama_file1 = $_FILES['gambar1']['name'];
   $nama_file2 = $_FILES['gambar2']['name'];
   $nama_file3 = $_FILES['gambar3']['name'];
   $nama_file4 = $_FILES['gambar4']['name'];
   $file_tmp1 = $_FILES['gambar1']['tmp_name'];
   $file_tmp2 = $_FILES['gambar2']['tmp_name'];
   $file_tmp3 = $_FILES['gambar3']['tmp_name'];
   $file_tmp4 = $_FILES['gambar4']['tmp_name'];
 $folder = '../gambar/';
//fixme: bagaimana dengan idBarangnya ? generate dulu di tmp_detail_beli ?
   $tgl = date("Y-m-d");
move_uploaded_file($file_tmp1,'../gambar/'.$nama_file1);
move_uploaded_file($file_tmp2, '../gambar/'.$nama_file2);
move_uploaded_file($file_tmp3, '../gambar/'.$nama_file3);
move_uploaded_file($file_tmp4, '../gambar/'.$nama_file4);

   mysql_query("INSERT INTO barang(nm_id,
                    kategori_id,warna_id,size_id,satuan_id,image1, image2, image3, image4,short_desc,long_desc, last_update,supplier_id, barcode, admin_id)
                    VALUES('$_POST[namaBarang]',
                    '$_POST[kategori_barang]', '$_POST[warna]', '$_POST[ukuran]', '$_POST[satuan_barang]', '$nama_file1', 					'$nama_file2', '$nama_file3', '$nama_file4', '$_POST[shortdesc]','$_POST[longdesc]',
                    '$tgl','$_POST[supplier]', '$_POST[barcode]', 'admin')") or die(mysql_error());
 
?>