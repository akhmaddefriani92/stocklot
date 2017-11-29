<?php 
include "config.php";
include "function.php";
switch ($_GET['act']) {
    // Tampil barang
    
   
   case 'hargabanded2':
   if (isset($_POST['qty'])):
            $qty = $_POST['qty'];
            $barcode = $_POST['barcode'];
            $harga = $_POST['hargasatuan'];
            if ($qty > 0) {
                $sql = "INSERT INTO harga_banded (barcode,qty,harga) "
                        . "VALUES('{$barcode}',{$qty},{$harga}) "
                        . "ON DUPLICATE KEY UPDATE qty={$qty}, harga={$harga} ";
            } else {
                $sql = "DELETE FROM harga_banded WHERE barcode = '{$barcode}'";
            }
            mysql_query($sql) or die(mysql_error());
        endif;

        /*
         * Tampilkan data barang, dan harga banded (qty dan harga satuannya)
         */
        if (isset($_POST['barcode']) || isset($_GET['barcode'])):
            $barcode = isset($_POST['barcode']) ? $_POST['barcode'] : $_GET['barcode'];
            $sql = "SELECT namaBarang, hargaJual
                    FROM barang
                    WHERE barcode = '{$barcode}' ";

            $query = mysql_query($sql) or die(mysql_error());
            $dataBarang = mysql_fetch_array($query, MYSQL_ASSOC);
            //print_r($dataBarang);

            $sql = "select qty, harga
                        from harga_banded
                        where barcode = '{$barcode}'
                        ";
            $query = mysql_query($sql);
            $dataHargaBanded = mysql_fetch_array($query, MYSQL_ASSOC);
            if ($dataHargaBanded) {
                $hbQty = $dataHargaBanded['qty'];
                $hbHarga = $dataHargaBanded['harga'];
            }

            $sql = "SELECT hargaBeli FROM detail_beli WHERE barcode = '{$barcode}' ORDER BY idDetailBeli desc LIMIT 1";
            $query = mysql_query($sql);
            $pembelian = mysql_fetch_array($query, MYSQL_ASSOC);
            ?>
            <h2>Barang: <small><?php echo $dataBarang['namaBarang']; ?> | <?php echo $barcode; ?></small></h2>
            <form method="POST">
                <table>
                    <tr>
                        <td>Harga Beli Satuan</td>
                        <td><input type="text" disabled="disabled" value="<?php echo number_format($pembelian['hargaBeli'], 0, ',', '.'); ?>"/></td>
                    </tr>
                    <tr>
                        <td>Harga jual satuan</td>
                        <td><input type="text" value="<?php echo number_format($dataBarang['hargaJual'], 0, ',', '.'); ?>" disabled="disabled" /></td>
                    </tr>
                    <tr>
                        <td>Qty banded</td>
                        <td>
                            <input type="number" name="qty" id="hb-qty" value="<?php echo isset($hbQty) ? $hbQty : ''; ?>" autofocus="autofocus"/>
                            <input type="hidden" name="hargaJual" id="hb-hargajual" value="<?php echo $dataBarang['hargaJual']; ?>" />
                            <input type="hidden" name="barcode" value="<?php echo $barcode; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Total</td>
                        <td><input type="text" id="hb-total" value="<?php echo isset($hbQty) ? $hbQty * $dataBarang['hargaJual'] : ''; ?>" disabled="disabled" /></td>
                    </tr>
                    <tr>
                        <td>Harga banded</td>
                        <td><input type="text" id="hb-hargabanded" name="harga" value="<?php echo isset($hbHarga) ? $hbHarga * $hbQty : ''; ?>"  autocomplete="off"/></td>
                    </tr>
                    <tr>
                    </tr>
                    <tr>
                        <td>Harga Satuan Banded</td>
                        <td><input type="text" id="hb-hargasatuan" name="hargasatuan" value="<?php echo isset($hbHarga) ? $hbHarga : ''; ?>" autocomplete="off"/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" class="tombol" value="(s) Simpan" accept="s"/></td>
                    </tr>
                </table>
            </form>
            <script>
                $("#hb-qty").change(function () {
                    var total = parseInt($("#hb-hargajual").val()) * parseInt($("#hb-qty").val());
                    //console.log(total);
                    $("#hb-total").val(total);
                });
                $("#hb-hargabanded").keyup(function () {
                    var hargaBanded = $(this).val();
                    var hargaSatuan = parseInt(hargaBanded) / parseInt($("#hb-qty").val());
                    //console.log(hargaSatuan);
                    $("#hb-hargasatuan").val(hargaSatuan);
                });
                $("#hb-hargasatuan").keyup(function () {
                    var hargaSatuan = $(this).val();
                    var hargaBanded = parseInt(hargaSatuan) * parseInt($("#hb-qty").val());
                    $("#hb-hargabanded").val(hargaBanded);
                });
            </script>
            <?php
        endif;
   break; 
   default ?> <h2>Skema Harga Jual (Harga Banded)</h2>
        <form method=POST action='?module=barang&act=hargabanded2'>
            <table>
                <tr>
                    <td><b>B</b>arcode: </td>
                    <td><input type="text" name="barcode" accesskey="b" autofocus="autofocus" id="barcode" autocomplete="off"/></td>
                </tr>
                <tr>
                    <td><b>N</b>ama: </td>
                    <td><input type="text" name="namabarang" accesskey="n" id="namaBarang" placeholder="Minimal 3 karakter"/></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right"><input type=submit value='Submit'></td>
                </tr>
            </table>
        </form>
        <script>
            $("#namaBarang").autocomplete({
                source: "aksi.php?module=hargabanded&act=getnamabarang",
                minLength: 3,
                select: function (event, ui) {
                    console.log(ui.item ?
                            "Nama: " + ui.item.value + "; Barcode " + ui.item.id : "Nothing selected, input was " + this.value);
                    if (ui.item) {
                        $("#barcode").val(ui.item.id);
                    }
                }
            });
        </script>
        <?php
        break;}?>