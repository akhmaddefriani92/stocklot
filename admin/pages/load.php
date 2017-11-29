<?php 

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'dbcommerce';

$database = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($database->connect_error) {
    die('Oops!! database Not Connect : ' . $database->connect_error);
}


$id_table = 'barang_id';
$columns = array(
             '`barang`.`barang_id`',
                '`barang`.`kd_brg`',
                '`barang`.`nm_brg`',
                '`barang`.`kategori_id`',
                '`barang`.`image1`',
                '`kategori`.`nama`',
                '`barang`.`warna_id`',
                '`warna`.`warna`',
                '`barang`.`merk_id`',
                '`merk`.`nama` merkBarang',
                '`barang`.`size_id`',
                '`size`.`size`',
                '`barang`.`satuan_id`',
                '`satuan_barang`.`namaSatuanBarang`',
                '`barang`.`qty`',
                '`barang`.`harga`',
                '`barang`.`barcode`',
                '(`harga_banded`.`harga` * `harga_banded`.`qty`) hargaBanded',
                '`harga_banded`.`qty` qtyBanded',
                '`barang`.`non_aktif`'

           );
// gunakan join disinW
$from = 'barang LEFT JOIN `warna`
                    ON `barang`.`warna_id` = `warna`.`warna_id`
                LEFT JOIN `size`
                    ON `barang`.`size_id` = `size`.`size_id`
                LEFT JOIN `merk`
                    ON `barang`.`merk_id` = `merk`.`merk_id`
                LEFT JOIN `kategori`
                    ON `barang`.`kategori_id` = `kategori`.`kategori_id`
                LEFT JOIN `satuan_barang`
                    ON `barang`.`satuan_id` = `satuan_barang`.`satuan_id`
                LEFT JOIN `harga_banded`
                    ON `barang`.`barcode` = `harga_banded`.`barcode`';
$id_table = $id_table != '' ? $id_table . ',' : '';
// custom SQL
$sql = "SELECT {$id_table} ".implode(',', $columns)." FROM {$from}";
// search
if (isset($_GET['search']['value']) && $_GET['search']['value'] != '') {
    $search = $_GET['search']['value'];
    $where  = '';
    // create parameter pencarian kesemua kolom yang tertulis
    // di $columns
    for ($i=0; $i < count($columns); $i++) {
        $where .= $columns[$i] . ' LIKE "%'.$search.'%"';
        // agar tidak menambahkan 'OR' diakhir Looping
        if ($i < count($columns)-1) {
            $where .= ' OR ';
        }
    }
    $sql .= ' WHERE ' . $where;
}
//SORT Kolom
$sortColumn = isset($_GET['order'][0]['column']) ? $_GET['order'][0]['column'] : 0;
$sortDir    = isset($_GET['order'][0]['dir']) ? $_GET['order'][0]['dir'] : 'asc';
$sortColumn = $columns[$sortColumn];
$sql .= " ORDER BY {$sortColumn} {$sortDir}";
// var_dump($sql);
$count = $database->query($sql);
// hitung semua data
$totaldata = $count->num_rows;
mysqli_close($count);
// memberi Limit
$start  = isset($_GET['start']) ? $_GET['start'] : 0;
$length = isset($_GET['length']) ? $_GET['length'] : 100;
$sql .= " LIMIT {$start}, {$length}";
$data  = $database->query($sql);
$jumcolumn = count($columns);
// create json format

$datatable['data'] = array();
while ($row = mysqli_fetch_array($data)) {
   
    
        # code...

        $fields[] = $arrayName = array('barcode' =>  $row["barcode"],
                                        'kd_brg' => $row["kd_brg"],
                                        'nm_brg' => $row["nm_brg"],
                                        'qty' => $row["qty"],
                                        'harga' => $row["harga"],
                                        'hargaBanded' => $row["hargaBanded"],
                                        'qtyBanded' => $row["qtyBanded"],
                                        'gambar' => $row["image1"],
                                        'kategori' => $row["nama"],
                                        'size' => $row["size"],
                                        'merk' => $row["merkBarang"],
                                        'id' => $row["barang_id"],
                                        'warna' => $row["warna"]);
        $f[] = $columns[$x];
    
    
    
    $datatable['data'] = $fields ;
}
mysqli_close($data);
echo json_encode($datatable)

?>