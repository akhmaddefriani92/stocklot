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
          <tr><td>Kode Barang</td><td> : <input type=text name='kodeBarang' size=20 ></td></tr>
        
         <tr><td>Nama Barang</td><td> : <input name="namaBarang" type="text" /></td></tr>
         										
          <tr><td>Supplier</td>
                <td> : <select name='supplier'>
                            <option value='0'>- Supplier -</option>";
   <?php while ($supplier = mysql_fetch_array($ambilSupplier)) {
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
		echo "</select></td></tr>";?>
          <tr><td></td>
                <td>   	
<tr><td>Ukuran </td>
<td>
<table width="252" height="156" border="0" cellspacing="2">
  <tr>
    <td width="28" height="30"><input name="size[]" type="checkbox" value="1"></td>
    <td width="28">35</td>
    <td width="28"><input name="size[]" type="checkbox" value="2"></td>
    <td width="37">36</td>
    <td width="25"><input name="size[]" type="checkbox" value="3"></td>
    <td width="28">37</td>
    <td width="23"><input name="size[]" type="checkbox" value="4"></td>
    <td width="25">38</td>
    <td width="24"><input name="size[]" type="checkbox" value="5"></td>
    <td width="691">39</td>
  </tr>
  <tr>
    <td height="24">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="27"><input name="size[]" type="checkbox" value="6"></td>
    <td>40</td>
    <td><input name="size[]" type="checkbox" value="7"></td>
    <td>41</td>
    <td><input name="size[]" type="checkbox" value="8"></td>
    <td>42</td>
    <td><input name="size[]" type="checkbox" value="9"></td>
    <td>43</td>
    <td><input name="size[]" type="checkbox" value="10"></td>
    <td>44</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="33"><input name="size[]" type="checkbox" value="11"></td>
    <td>45</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table></td></tr>
        
        <?php
          echo"<tr><td>Satuan Barang</td>
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
 
 <?php  
 $size = $_POST['size'];
 $jumlah_dipilih = count($size);
     $selectidmax =mysql_query( "SELECT max(barcode) as maxbarcode FROM barang WHERE barcode LIKE 'SLOT%'");

    $hslidmax=mysql_fetch_array($selectidmax);

    $idmax=$hslidmax['barcode'];

    $nourut = (int) substr($idmax, 2,3);

    $nourut++;

    $IDbaru = "SLOT" . sprintf("%03s", $nourut);
	
	 

 $nama_file1 = $_FILES['gambar1']['name'];
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
 
for($x=0;$x<$jumlah_dipilih;$x++){
	$ryRandom = rand(11111111,99999999);
   mysql_query("INSERT INTO barang(nm_brg,kd_brg,
                    kategori_id,warna_id,size_id,satuan_id,image1, image2, image3, image4,short_desc,long_desc, last_update,supplier_id, barcode, admin_id)
                    VALUES('$_POST[namaBarang]','$_POST[kodeBarang]',
                    '$_POST[kategori_barang]', '$_POST[warna]', '$size[$x]', '$_POST[satuan_barang]', '$nama_file1', 					'$nama_file2', '$nama_file3', '$nama_file4', '$_POST[shortdesc]','$_POST[longdesc]',
                    '$tgl','$_POST[supplier]', '$ryRandom', 'admin')") or die(mysql_error());
}
?>