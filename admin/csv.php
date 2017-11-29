<?php
//KONEKSI.. 
include "config.php";
 
if (isset($_FILES['filename'])) {//Script akan berjalan jika di tekan tombol submit..
 $tgl = date("Y-m-d");
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." Berhasil di Upload" . "</h1>";
        echo "<h2>Menampilkan Hasil Upload:</h2>";
        readfile($_FILES['filename']['tmp_name']);
    }
 
    //Import uploaded file to Database, Letakan dibawah sini..
    $handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka file dan membacanya
    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
         $warna1 = explode(",", trim($data[5]));
$tes = explode(",", trim($data[8]));
      for ($i = 0; $i < count($warna1); $i++){

        $cariwarna = mysql_query("SELECT warna_id FROM warna where warna = '$warna1[$i]' ");
            
             if (mysql_num_rows($cariwarna) < 1) { 
                 $tambahwarna = mysql_query("INSERT INTO warna (warna_id, warna) values ('','$warna1[$i]')");
                 if ($tambahwarna) {
                     # code...
                
                 $cariwarna2 = mysql_query("SELECT warna_id FROM warna where warna = '$warna1[$i]'");
                 $cariwarna3 = mysql_fetch_array($cariwarna2);
                 $warna = $cariwarna3['warna_id']; }
             } else {  $cariwarna1 = mysql_fetch_array($cariwarna);
                $warna = $cariwarna1['warna_id'];
             }

         $carisup = mysql_query("SELECT supplier_id FROM supplier where namaSupplier = '$data[2]' ");
            
             if (mysql_num_rows($carisup) < 1) { 
                $tambahsup = mysql_query("INSERT INTO supplier (supplier_id, namaSupplier) values ('','$data[2]')");
                if ($tambahsup) {
                    # code...
               
                 $carisup2 = mysql_query("SELECT supplier_id FROM supplier where namaSupplier = '$data[2]'");
                 $carisup3 = mysql_fetch_array($carisup2);
                 $supplier = $carisup3['supplier_id']; }
             } else {  $carisup1 = mysql_fetch_array($carisup);
                $supplier = $carisup1['supplier_id'];
             }

             $carikat = mysql_query("SELECT kategori_id FROM kategori where nama = '$data[3]' ");
            
             if (mysql_num_rows($carikat) < 1) { 
                 $tambahkat = mysql_query("INSERT INTO kategori (kategori_id, nama) values ('','$data[3]')");

                 if ($tambahkat) {
                     # code...
             
                 $carikat2 = mysql_query("SELECT kategori_id FROM kategori where nama = '$data[3]'");
                 $carikat3 = mysql_fetch_array($carikat2);
                 $kategori = $carikat3['kategori_id']; }
             } else {  $carikat1 = mysql_fetch_array($carikat);
                $kategori = $carikat1['kategori_id'];
             }

                    $carisat = mysql_query("SELECT satuan_id FROM satuan_barang where namaSatuanBarang = '$data[7]' ");
            
             if (mysql_num_rows($carisat) < 1) { 
                $tambahsup = mysql_query("INSERT INTO satuan_barang (satuan_id, namaSatuanBarang) values ('','$data[7]')");
                if ($tambahsat) {
                    # code...
               
                 $carisat2 = mysql_query("SELECT satuan_id FROM satuan_barang where namaSatuanBarang = '$data[7]'");
                 $carisat3 = mysql_fetch_array($carisat2);
                 $satuan = $carisup3['satuan_id']; }
             } else {  $carisat1 = mysql_fetch_array($carisat);
                $satuan = $carisat1['satuan_id'];
             }

$carimerk = mysql_query("SELECT merk_id FROM merk where `nama` = '$data[4]' ");
            
             if (mysql_num_rows($carimerk) < 1) { 
                 $tambahmerk = mysql_query("INSERT INTO merk (merk_id, nama) values ('','$data[4]')");
                if ($tambahmerk) {
                     # code...
               $carimerk2 = mysql_query("SELECT merk_id FROM merk where nama = '$data[4]'");
                 $carimerk3 = mysql_fetch_array($carimerk2);
                 $merk = $carimerk3['merk_id'];  }
             } else {  $carimerk1 = mysql_fetch_array($carimerk);
                $merk = $carimerk1['merk_id'];
             }


       
             for ($x = 0; $x < count($tes); $x++){
             $ryRandom = rand(11111111,99999999);
            
             $carisize = mysql_query("SELECT size_id FROM size where size = '$tes[$x]' ");
            
             if (mysql_num_rows($carisize) < 1) { 
                $tambahsize =  mysql_query("INSERT INTO size (size_id, size) values ('','$tes[$x]')");
                 
                 if ($tambahsize) {
                     # code...
                 $carisize2 = mysql_query("SELECT size_id FROM size where size = '$tes[$x]'");
                 $carisize3 = mysql_fetch_array($carisize2);
                 $size = $carisize3['size_id'];}
             } else {  $carisize1 = mysql_fetch_array($carisize);
                $size = $carisize1['size_id'];
             }


             
              
         
        $import="INSERT INTO barang(nm_brg,kd_brg,
                    kategori_id,merk_id,warna_id,size_id,satuan_id,berat,short_desc,long_desc, last_update,supplier_id, barcode, admin_id)
                    VALUES('$data[1]','$data[0]',
                    '$kategori','$merk', '$warna', '$size', '$satuan', '$data[6]', '$data[9]','$data[10]',
                    '$tgl','$supplier', '$ryRandom', 'admin')"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1”
        mysql_query($import) or die(mysql_error()); }//Melakukan Import
    }
}
 
    fclose($handle); //Menutup CSV file
    echo "<br><strong>Import data selesai.</strong>";
    
}
 mysql_close(); 
header('Location: tambahproduk.php');
 ?>