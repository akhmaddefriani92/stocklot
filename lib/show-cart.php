<?php

	require_once 'config.php';
   require_once 'rupiah.php';



   function cart_nav(){

      if( isset($_SESSION['user']) ){

         $user_id = $_SESSION['user'];

         $query = mysql_query("SELECT * FROM cart WHERE user_id = '$user_id'");

         if($query === FALSE) { 
            die(mysql_error());
         }

         $count_items = mysql_num_rows($query);

            echo "
                        <div class='module widget-handle cart-widget-handle left'>
                            <div class='cart'> 
                                <i class='ti-bag'></i>
                                <span class='label number'>$count_items</span>
                                <span class='title'>Shopping Cart</span>
                            </div>
                            <div class='function'>
                                <div class='widget'>
                                    <h6 class='title'>Shopping Cart</h6>
                                    <hr>
                                    <ul class='cart-overview'>
            ";


         while($result=mysql_fetch_array($query)){
            $cart_id = $result['cart_id'];
            $qty = $result['qty'];
            $sub_total = $result['sub_total'];
            $barang_id = $result['barang_id'];

            $key = "whutger917328";
            $encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $barang_id, MCRYPT_MODE_CBC, md5(md5($key))));

            $query2 = mysql_query("
               SELECT
                  barang.barang_id,
                  barang.harga,
                  barang.image1,
                  barang.short_desc,
                  barang.warna_id,
                  barang.nm_brg,
                  merk.nama as nama_merk,
                  warna.warna as warna,
                  size.size as size
               FROM
                  barang
                  INNER JOIN merk ON (barang.merk_id = merk.merk_id)
                  INNER JOIN warna ON (barang.warna_id = warna.warna_id)
                  INNER JOIN size ON (barang.size_id = size.size_id)
               WHERE
                  barang.barang_id = '$barang_id'
            ");

            while($result2=mysql_fetch_array($query2)){
               $nama = $result2['nm_brg'];
               $harga = $result2['harga'];
               $img1 = $result2['image1'];
               $short_desc = $result2['short_desc'];

               $nama_merk = $result2['nama_merk'];
               $size = $result2['size'];
               $warna = $result2['warna'];


               $hitung_total = array($result['sub_total']);
               $values = array_sum($hitung_total);
               $total += $values;
               $total = $total;

               echo "
                                        <li>
                                            <a href='single-product.php?show=encoded'>
                                                <img alt='Product' src='img/$img1' />
                                                <div class='description'>
                                                    <span class='product-title'>$nama_merk - $nama</span>
                                                    <span class='price number'>Rp $harga</span>
                                                </div>
                                            </a>
                                        </li>
               ";
            }
         }

            echo "
                                 </ul>
                                    <hr>
                                    <div class='cart-controls'>
                                        <a class='btn btn-sm btn-filled' href='cart.php'>Cart</a>
                                        <div class='list-inline pull-right'>
                                            <span class='cart-total'>Total: </span>
                                            <span class='number'>Rp $total</span>
                                        </div>
                                    </div>
                                </div>
                                <!--end of widget-->
                            </div>
                        </div>
            ";
      }
   }


   function show_cart(){
      if( isset($_SESSION['user']) ){

         $user_id = $_SESSION['user'];

         $query = mysql_query("SELECT * FROM cart WHERE user_id = '$user_id'");

         if($query === FALSE) { 
            die(mysql_error());
         }

         while($result=mysql_fetch_array($query)){
            $cart_id = $result['cart_id'];
            $qty = $result['qty'];
            $sub_total = $result['sub_total'];
            $barang_id = $result['barang_id'];

            $key = "whutger917328";
            $encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $barang_id, MCRYPT_MODE_CBC, md5(md5($key))));

            $query2 = mysql_query("
               SELECT
                  barang.barang_id,
                  barang.harga,
                  barang.image1,
                  barang.short_desc,
                  barang.warna_id,
                  barang.nm_brg,
                  merk.nama as nama_merk,
                  warna.warna as warna,
                  size.size as size
               FROM
                  barang
                  INNER JOIN merk ON (barang.merk_id = merk.merk_id)
                  INNER JOIN warna ON (barang.warna_id = warna.warna_id)
                  INNER JOIN size ON (barang.size_id = size.size_id)
               WHERE
                  barang.barang_id = '$barang_id'
            ");

            while($result2=mysql_fetch_array($query2)){
               $id = $result2['barang_id'];
               $nama = $result2['nm_brg'];
               $harga = $result2['harga'];
               $img1 = $result2['image1'];
               $short_desc = $result2['short_desc'];

               $nama_merk = $result2['nama_merk'];
               $size = $result2['size'];
               $warna = $result2['warna'];

               $harga = format_rupiah($harga);


               $hitung_total = array($result['sub_total']);
               $values = array_sum($hitung_total);
               $total += $values;
               $total = $total;

               echo "
                     <tr>
                        <th scope='row'>
                           <a href='lib/delete-cart.php?data=$cart_id' class='remove-item' data-toggle='tooltip' data-placement='top' title=' Hapus'>
                              <i class='ti-close'></i>
                           </a>
                        </th>
                        <td>
                           <a href='single-product.php?show=$id'>
                              <img alt='Product' class='product-thumb' src='img/$img1' />
                           </a>
                        </td>
                        <td>
                           <span>$nama_merk - $nama</span>
                        </td>
                        <td>
                           <span>$qty</span>
                        </td>
                        <td>
                           <span>$size</span>
                        </td>
                        <td>
                           <span>Rp $harga</span>
                        </td>
                     </tr>
               ";
            }
         }
      }

      else{
         header("Location: login.php");
      }
   }



   function show_checkout(){
      if( isset($_SESSION['user']) ){

         $user_id = $_SESSION['user'];

         $query = mysql_query("SELECT * FROM cart WHERE user_id = '$user_id'");

         if($query === FALSE) { 
            die(mysql_error());
         }

         while($result=mysql_fetch_array($query)){
            $cart_id = $result['cart_id'];
            $qty = $result['qty'];
            $sub_total = $result['sub_total'];
            $barang_id = $result['barang_id'];

            $key = "whutger917328";
            $encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $barang_id, MCRYPT_MODE_CBC, md5(md5($key))));

            $query2 = mysql_query("
               SELECT
                  barang.barang_id,
                  barang.harga,
                  barang.image1,
                  barang.short_desc,
                  barang.warna_id,
                  barang.nm_brg,
                  merk.nama as nama_merk,
                  warna.warna as warna,
                  size.size as size
               FROM
                  barang
                  INNER JOIN merk ON (barang.merk_id = merk.merk_id)
                  INNER JOIN warna ON (barang.warna_id = warna.warna_id)
                  INNER JOIN size ON (barang.size_id = size.size_id)
               WHERE
                  barang.barang_id = '$barang_id'
            ");

            while($result2=mysql_fetch_array($query2)){
               $id = $result2['barang_id'];
               $nama = $result2['nm_brg'];
               $harga = $result2['harga'];
               $img1 = $result2['image1'];
               $short_desc = $result2['short_desc'];

               $nama_merk = $result2['nama_merk'];
               $size = $result2['size'];
               $warna = $result2['warna'];

               $harga = format_rupiah($harga);


               $hitung_total = array($result['sub_total']);
               $values = array_sum($hitung_total);
               $total += $values;
               $total = $total;

               echo "
                     <tr>
                        <th scope='row'>
                        </th>
                        <td>
                           <a href='single-product.php?show=$id'>
                              <img alt='Product' class='product-thumb' src='img/$img1' />
                           </a>
                        </td>
                        <td>
                           <span>$nama_merk - $nama <strong>|</strong> Size: $size <strong>|</strong> Qty: $qty</span>
                        </td>
                        <td>
                           <span>Rp $harga</span>
                        </td>
                     </tr>
               ";
            }
         }
      }

      else{
         header("Location: login.php");
      }
   }



   function total_cart(){
      if( isset($_SESSION['user']) ){

         $user_id = $_SESSION['user'];

         $query = mysql_query("SELECT * FROM cart WHERE user_id = '$user_id'");

         if($query === FALSE) { 
            die(mysql_error());
         }

         while($result=mysql_fetch_array($query)){
            $cart_id = $result['cart_id'];
            $qty = $result['qty'];
            $sub_total = $result['sub_total'];
            $barang_id = $result['barang_id'];


            $hitung_total = array($result['sub_total']);
            $values = array_sum($hitung_total);
            $total += $values;
            $total = $total;
         }

         $total_rp = format_total($total);

         echo "
            <tbody>
               <tr>
                  <th scope='row'>Cart Subtotal</th>
                  <td>Rp $total</td>
               </tr>
               <tr>
                  <th scope='row'><h6 class='uppercase'><strong>Order Total</strong></h6></th>
                     <td><h6 class='uppercase'><strong>Rp $total_rp</strong></h6></td>
               </tr>
            </tbody>
         ";
      }

      else{
         header("Location: login.php");
      }
   }


      function cart_count(){

         $user_id = $_SESSION['user'];

         $key = "user917328";
         $user_id = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $user_id, MCRYPT_MODE_CBC, md5(md5($key))));

         $query = mysql_query("SELECT * FROM cart WHERE user_id = '$user_id'");

         if($query === FALSE) { 
            die(mysql_error());
         }

         else{
            $count_items = mysql_num_rows($query);

            echo "
               $count_items
            ";
         }
      }


   function total(){
      if( isset($_SESSION['user']) ){

         $user_id = $_SESSION['user'];

         $query = mysql_query("SELECT * FROM cart WHERE user_id = '$user_id'");

         if($query === FALSE) { 
            die(mysql_error());
         }

         while($result=mysql_fetch_array($query)){
            $sub_total = $result['sub_total'];

            $hitung_total = array($result['sub_total']);
            $values = array_sum($hitung_total);
            $total += $values;
            $total = $total;
         }

         echo $total;
      }
   }
?>