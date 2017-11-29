<?php 
include "config.php";
$ambilSupplier = mysql_query("select * from supplier order by namaSupplier");
$ambilRak = mysql_query("select * from rak");
$ambilKategoriBarang = mysql_query("select * from kategori");
$ambilnamabarang = mysql_query("select * from nm_brg");
$ambilSatuanBarang = mysql_query("select * from satuan_barang");
$edit = mysql_query("SELECT * FROM barang WHERE barcode='$_GET[id]'");
        $data = mysql_fetch_array($edit);
        ?>
        <h2>Edit Barang</h2>
        <form method=POST action=aksi.php?module=barang&act=update name='editbarang'>
            <input type=hidden name='idBarang' value='<?php echo $data['barang_id']; ?>'>
            <table>
                <tr><td>Barcode</td><td> : <input type="text" name='barcode' size=30 value='<?php echo $data['barcode']; ?>' /></td></tr>
                <tr><td>Nama Barang</td><td> : <select name='namaBarang'><?php
                          while ($nama = mysql_fetch_array($ambilnamabarang)) {
                                if ($nama[nm_id] == $data[nm_id]) {
                                    echo "<option value='$nama[nm_id]' selected>$nama[nm_brg]</option>";
                                } else {
                                    echo "<option value='$nama[nm_id]'>$nama[nm_brg]</option>";
                                }
                            }
                            ?>
                        </td><td style="color:red"><?php echo isset($_GET['barang']) ? 'Nama barang sudah diperbarui' : '' ?></td></tr>
                <tr><td>Kategori Barang</td>
                    <td> : <select name='kategori_barang'>
                            <?php
                          while ($kategori = mysql_fetch_array($ambilKategoriBarang)) {
                                if ($kategori[kategori_id] == $data[kategori_id]) {
                                    echo "<option value='$kategori[kategori_id]' selected>$kategori[nama]</option>";
                                } else {
                                    echo "<option value='$kategori[kategori_id]'>$kategori[nama]</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td style="color:red"><?php echo isset($_GET['kategori']) ? 'Kategori sudah diperbarui' : '' ?></td>
                </tr>
                <tr><td>Satuan Barang</td>
                    <td> : <select name='satuan_barang'>
                            <?php
                            while ($satuan = mysql_fetch_array($ambilSatuanBarang)) {
                                if ($satuan[satuan_id] == $data[satuan_id]) {
                                    echo "<option value='$satuan[satuan_id]' selected>$satuan[namaSatuanBarang]</option>";
                                } else {
                                    echo "<option value='$satuan[satuan_id]'>$satuan[namaSatuanBarang]</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td style="color:red"><?php echo isset($_GET['satuan']) ? 'Satuan sudah diperbarui' : '' ?></td>
                </tr>
                <tr><td>Supplier</td>
                    <td> : <select name='supplier'>
                            <?php
                            while ($supplier = mysql_fetch_array($ambilSupplier)) {
                                if ($supplier[supplier_id] == $data[supplier_id]) {
                                    echo "<option value='$supplier[supplier_id]' selected>$supplier[namaSupplier]</option>";
                                } else {
                                    echo "<option value='$supplier[supplier_id]'>$supplier[namaSupplier]</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                    <td style="color:red"><?php echo isset($_GET['supplier']) ? 'Supplier sudah diperbarui' : '' ?></td>
                </tr>
                <tr><td>Rak</td>
                    <td> : <select name='rak'>
                            <option>[Pilih rak..]</option>
                            <?php
                            while ($rak = mysql_fetch_array($ambilRak)) {
                                if ($rak[rak_id] == $data[rak_id]) {
                                    echo "<option value='$rak[rak_id]' selected>$rak[namaRak]</option>";
                                } else {
                                    echo "<option value='$rak[rak_id]'>$rak[namaRak]</option>";
                                }
                            }
                            ?>
                            <option value="999999" <?php echo $data[rak_id]== '999999' ? 'selected':''; ?> disabled="disabled">[Virtual]</option>
                        </select>
                    </td>
                    <td style="color:red"><?php echo isset($_GET['rak']) ? 'Rak sudah diperbarui' : '' ?></td>
                </tr>
                <tr>
                    <td>Harga Jual</td>
                    <td> : <input type=text name='hargaJual' size=20 value='<?php echo $data['harga']; ?>'></td>
                    <td style="color:red"><?php echo isset($_GET['hargajual']) ? 'Harga jual sudah diperbarui' : '' ?></td>
                </tr>
                <tr>
                    <td>Non Aktif</td>
                    <td> :
                        <select name="nonAktif">
                            <option value="0" <?php echo $data['non_aktif'] != '1' ? 'selected' : ''; ?>>Tidak</option>
                            <option value="1" <?php echo $data['non_aktif'] == '1' ? 'selected' : ''; ?>>Ya</option>
                        </select>
                    </td>
                    <td style="color:red"><?php echo isset($_GET['nonAktif']) ? 'Status barang sudah diperbarui' : '' ?></td>
                </tr>
                <?php
                $hQuery = mysql_query("SELECT qty, harga FROM harga_banded WHERE barcode = '{$data['barcode']}'");
                $hargaBanded = mysql_fetch_array($hQuery, MYSQL_ASSOC);
                $totalBanded = number_format($hargaBanded['qty'] * $hargaBanded['harga'], 0, ',', '.');
                $hargaBandedSatuan = number_format($hargaBanded['harga'], 0, ',', '.');
                ?>
                <tr>
                    <td>Harga Banded</td>
                    <td> : <a href="media.php?module=barang&act=hargabanded2&barcode=<?php echo $data['barcode']; ?>"><?php echo $hargaBanded ? "{$totalBanded} / {$hargaBanded['qty']} = {$hargaBandedSatuan}" : 'Belum ada, klik untuk input'; ?></a></td>
                </tr>
                <tr><td colspan=2>&nbsp;</td></tr>
                <tr><td colspan=2 align='right'><input type=submit value=(S)impan accesskey=s>&nbsp;&nbsp;&nbsp;
                        <input type=button value=Batal onclick=self.history.back()></td></tr>

                <input type=hidden name='oldbarcode' value='<?php echo $data['barcode']; ?>'>
            </table>
        </form> <br /><br />
        <?php
        // tampilkan seluruh stok ybs yang masih ada di toko / belum laku terjual
        $sql = "SELECT t.tglTransaksiBeli,d.hargaBeli, d.jumBarang
		FROM detail_beli AS d, transaksibeli AS t
		WHERE d.barcode = '$data[barcode]' AND d.idTransaksiBeli = t.idTransaksiBeli AND d.isSold='N' ORDER BY d.idTransaksiBeli DESC";
        $hasil = mysql_query($sql);
        $jumlah = mysql_num_rows($hasil);
        while ($x = mysql_fetch_array($hasil)) {
            echo "Tgl.Beli : $x[tglTransaksiBeli], Harga Beli : Rp " . number_format($x[hargaBeli], 0, ',', '.') . " (jumlah: $x[jumBarang])<br />";
        }
        // jika stok nya sudah laku semua,
        // cetak 2 stok yang terakhir (sekedar untuk informasi harga)
        if ($jumlah < 1) {
            /*
              $sql = "SELECT d.idTransaksiBeli, d.hargaBeli, d.isSold, d.jumBarang FROM detail_beli AS d
              WHERE d.barcode = '$data[barcode]' ORDER BY d.idTransaksiBeli DESC LIMIT 2";
             */
            // Abu Muhammad: Query diganti agar tanggal transaksi terakhir tetap muncul
            $sql = "SELECT t.tglTransaksiBeli,d.hargaBeli, d.jumBarang, d.isSold
                FROM detail_beli AS d, transaksibeli AS t
                WHERE d.barcode = '{$data[barcode]}' AND d.idTransaksiBeli = t.idTransaksiBeli ORDER BY d.idTransaksiBeli DESC LIMIT 2";
            $hasil = mysql_query($sql);
            $jumlah = mysql_num_rows($hasil);
            while ($x = mysql_fetch_array($hasil)) {
                echo "Tgl.Beli: " . $x[tglTransaksiBeli] . ", Harga Beli : Rp " . number_format($x[hargaBeli], 0, ',', '.') . ", Status: ";
                if ($x[isSold] == 'Y') {
                    echo " Habis";
                } else {
                    echo " Ada";
                };
                echo " (jumlah: $x[jumBarang]) <br />";
            }
        }


?>