<?php

	require_once 'config.php';
    require_once 'rupiah.php';

function berat($user){

    $querya = mysql_query("SELECT (SUM(`barang`.`berat` * `cart`.`qty`)) as beratsatuan FROM cart LEFT JOIN barang ON `cart`.`barang_id` = `barang`.`barang_id` WHERE `cart`.`user_id` = $user");
    $berat = mysql_fetch_array($querya);
    $totalberat = $berat['beratsatuan'];
    echo $totalberat;    


}
function kategori(){

  $query = mysql_query("SELECT * FROM kategori");

  while ($result=mysql_fetch_array($query)) {
    $id = $result['kategori_id'];
    $nama = $result['nama'];

    echo "<li>
                                        <a href='?page=1&category=$id'  style='color: #292929;'>$nama</a>
                                    </li>";
    # code...
  }
}
function terlaris(){
        $query = mysql_query("
        SELECT
           barang.barang_id,
           SUM(detail_jual.jumBarang) terbanyak,
           barang.harga,
           barang.qty,
           barang.gambar,
           barang.image1,
           barang.nm_brg,
           merk.nama as nama_merk
        FROM
            barang
        LEFT JOIN merk ON (barang.merk_id = merk.merk_id)
        LEFT JOIN detail_jual ON (barang.barang_id = detail_jual.idBarang)
GROUP BY barang.kd_brg ORDER BY terbanyak DESC
      LIMIT 
            0, 4
        ");

        while($result=mysql_fetch_array($query)){
            $id = $result['barang_id'];
            $nama = $result['nm_brg'];
            $qty = $result['qty'];
            $harga = $result['harga'];
            $nama_merk = $result['nama_merk'];

            $img1 = $result['gambar'];
            $gambar = explode("&&", $img1);
            $harga = format_rupiah($harga);

            $key = "whutger917328";
            $encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $id, MCRYPT_MODE_CBC, md5(md5($key))));


            echo "
                <div class='col-md-3 col-sm-4'>
               <div class='image-tile outer-title text-center'>
                  <a href='single-product.php?show=$id'>
                     <img alt='Pic' class='product-thumb' src='img/$gambar[0]' />
                  </a>
                <div class='title'>
                     <h5 class='mb0'>$nama_merk
                     <br /> $nama</h5>
                     <span class='display-block mb16'>Rp $harga</span>
                  </div>
               </div>
            </div>
            ";
        }
    }
function terlarissamping(){
        $query = mysql_query("
        SELECT
           barang.barang_id,
           SUM(detail_jual.jumBarang) terbanyak,
           barang.harga,
           barang.qty,
           barang.gambar,
           barang.image1,
           barang.nm_brg,
           merk.nama as nama_merk
        FROM
            barang
        LEFT JOIN merk ON (barang.merk_id = merk.merk_id)
        LEFT JOIN detail_jual ON (barang.barang_id = detail_jual.idBarang)
GROUP BY barang.kd_brg ORDER BY terbanyak DESC
      LIMIT 
            0, 4
        ");

        while($result=mysql_fetch_array($query)){
            $id = $result['barang_id'];
            $nama = $result['nm_brg'];
            $qty = $result['qty'];
            $harga = $result['harga'];
            $nama_merk = $result['nama_merk'];
            $img1 = $result['gambar'];
            $gambar = explode("&&", $img1);

            $harga = format_rupiah($harga);

            $key = "whutger917328";
            $encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $id, MCRYPT_MODE_CBC, md5(md5($key))));


            echo "<h6 class='title' style='color: #47b475;>Popular Items</h6>
                                <hr>
                                <ul class='cart-overview'>
             <li>
                                        <a href='single-product.php?show=$id'>
                                            <img alt='Product' src='img/$gambar[0]' />
                                            <div class='description'>
                                                <span class='product-title'>$nama_merk - $nama</span>
                                                <span class='price number'>Rp $harga</span>
                                            </div>
                                        </a>
                                    </li>
                
            ";
        }
    }

	function home(){
		$query = mysql_query("
		SELECT
           barang.barang_id,
		   barang.harga,
		   barang.qty,
		   barang.gambar,
           barang.nm_brg,
		   merk.nama as nama_merk
		FROM
			barang
        INNER JOIN merk ON (barang.merk_id = merk.merk_id)
GROUP BY barang.kd_brg
      LIMIT 
            0, 4
		");

		while($result=mysql_fetch_array($query)){
			$id = $result['barang_id'];
			$nama = $result['nm_brg'];
			$qty = $result['qty'];
			$harga = $result['harga'];
			$nama_merk = $result['nama_merk'];
			$img1 = $result['gambar'];
      $gambar = explode("&&", $img1);

            $harga = format_rupiah($harga);

            $key = "whutger917328";
            $encoded = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $id, MCRYPT_MODE_CBC, md5(md5($key))));


			echo "
				<div class='col-md-3 col-sm-4'>
               <div class='image-tile outer-title text-center'>
                  <a href='single-product.php?show=$id'>
                     <img alt='Pic' class='product-thumb' src='img/$gambar[0]' />
                  </a>
               	<div class='title'>
                     <h5 class='mb0'>$nama_merk
                     <br /> $nama</h5>
                     <span class='display-block mb16'>Rp $harga</span>
                  </div>
               </div>
            </div>
			";
		}
	}


	function size(){
        $link = $_GET['show'];
        $query = mysql_query("SELECT kd_brg FROM barang where barang_id = $link ");
     while($result=mysql_fetch_array($query)) {
            $kdbrg = $result['kd_brg'];

            $query2 = mysql_query("SELECT `barang`.`size_id`, `size`.`size` FROM `size` LEFT JOIN `barang` on `size`.`size_id` = `barang`.`size_id` WHERE kd_brg = '$kdbrg'  ");
 while($result2=mysql_fetch_array($query2)){
            $size_id = $result2['size_id'];
            $size_name = $result2['size'];

            echo "
                <option value='$size_id'>$size_name</option>
            ";
        
           
        }
       
}
       
    }

    function gambar(){
        $link = $_GET['show'];
        $query = mysql_query("SELECT gambar FROM barang where barang_id = $link ");
   $result=mysql_fetch_array($query) ;
            $img1 = $result['gambar'];
        $gambar = explode("&&", $img1);
        foreach($gambar as $image)
{

              echo "
                <li>
                                            <img alt='Image' src='img/$image' />
                                        </li>
            ";
}
             

           
        
           
        
       
}
       
    


	function single_product(){

		if(isset($_GET['show'])){
            $id = $_GET['show'];

            $link = $_GET['show'];

            $key = "whutger917328";
            $decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($id), MCRYPT_MODE_CBC, md5(md5($key))), "\0");

			$query = mysql_query("
			SELECT
			   barang.harga,
			   barang.qty,
               barang.kd_brg,
			   barang.image1,
			   barang.image2,
			   barang.image3,
			   barang.image4,
			   barang.short_desc,
			   barang.long_desc,
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
				barang.barang_id = '$id'
			");

			while($result=mysql_fetch_array($query)){
				$id = $result['barang_id'];
                $kdbrg = $result['kd_brg'];
				$nama = $result['nm_brg'];
				$qty = $result['qty'];
				$harga = $result['harga'];
				$img1 = $result['image1'];
				$img2 = $result['image2'];
				$img3 = $result['image3'];
				$img4 = $result['image4'];
				$short_desc = $result['short_desc'];
				$long_desc = $result['long_desc'];

                $nama_merk = $result['nama_merk'];
				$size = $result['size'];
				$warna = $result['warna'];
                $warna_id = $result['warna_id'];

                $harga = format_rupiah($harga);


				echo "
					<div class='product-single'>
                        <div class='row mb24 mb-xs-48'>
                            <div class='col-md-5 col-sm-6'>
                                <div class='image-slider slider-thumb-controls controls-inside'>
                                    <span class='label'></span>
                                    <ul class='slides'>";
                                  gambar();
                                     echo " 
                                    </ul>
                                </div>
                                <!--end of image slider-->
                            </div>
                            <div class='col-md-5 col-md-offset-1 col-sm-6'>
                                <div class='description'>
                                    <h4 class='uppercase'>$nama_merk - $nama</h4>
                                    <div class='mb32 mb-xs-24'>
                                        <span class='number price'>Rp $harga</span>
                                    </div>
                                    <p>
                                        $short_desc.
                                    </p>
                                    <ul>
                                        <li>
                                            <strong>WARNA:</strong> $warna</li>
                                    </ul>
                                </div>




                                   <hr class='mb48 mb-xs-24'>
                                   <form action='single-product.php?show=$link' class='add-to-cart' method='post'>
                                           <select id='size' name='option'  placeholder='SIZE' style='max-width:19%;' required>
                  ";




                                             size();





                  echo "
                                       </select>
                                       <input type='text' placeholder='QTY' name='qty' required/>
                                       <input type='hidden' value='$nama' name='nama'/>
                                       <input type='hidden' value='$kdbrg' name='kdbrg'/>
                                       <input type='hidden' value='$warna_id' name='warna_id'/>
                                       <input type='submit' value='Add To Cart' name='addtocart'/>
                                   </form>
  
                            </div>
                        </div>
                        <!--end of row-->
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='tabbed-content text-tabs'>
                                    <ul class='tabs'>
                                        <li class='active'>
                                            <div class='tab-title'>
                                                <span>Description</span>
                                            </div>
                                            <div class='tab-content'>
                                                <p>
                                                    $long_desc.
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div class='tab-title'>
                                                <span>Ratings</span>
                                            </div>
                                            <div class='tab-content'>
                                                <ul class='ratings'>
                                                    <li>
                                                        <div class='user'>
                                                            <ul class='list-inline star-rating'>
                                                                <li>
                                                                    <i class='ti-star'></i>
                                                                </li>
                                                                <li>
                                                                    <i class='ti-star'></i>
                                                                </li>
                                                                <li>
                                                                    <i class='ti-star'></i>
                                                                </li>
                                                                <li>
                                                                    <i class='ti-star'></i>
                                                                </li>
                                                            </ul>
                                                            <span class='bold-h6'>Murray Rafferty</span>
                                                            <span class='date number'>23/02/2015</span>
                                                        </div>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <div class='user'>
                                                            <ul class='list-inline star-rating'>
                                                                <li>
                                                                    <i class='ti-star'></i>
                                                                </li>
                                                                <li>
                                                                    <i class='ti-star'></i>
                                                                </li>
                                                                <li>
                                                                    <i class='ti-star'></i>
                                                                </li>
                                                                <li>
                                                                    <i class='ti-star'></i>
                                                                </li>
                                                                <li>
                                                                    <i class='ti-star'></i>
                                                                </li>
                                                            </ul>
                                                            <span class='bold-h6'>Claire Taurus</span>
                                                            <span class='date number'>15/02/2015</span>
                                                        </div>
                                                        <p>
                                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
                                                        </p>
                                                    </li>
                                                </ul>
                                                <!--end of ratings-->
                                                <h6 class='uppercase'>Leave A Rating</h6>
                                                <form class='ratings-form'>
                                                    <div class='overflow-hidden'>
                                                        <input type='text' placeholder='Your Name' />
                                                        <input type='text' placeholder='Email Address' />
                                                    </div>
                                                    <div class='select-option'>
                                                        <i class='ti-angle-down'></i>
                                                        <select>
                                                            <option selected value='Default'>Select A Rating</option>
                                                            <option value='1'>1 Star</option>
                                                            <option value='2'>2 Stars</option>
                                                            <option value='3'>3 Stars</option>
                                                            <option value='4'>4 Stars</option>
                                                            <option value='5'>5 Stars</option>
                                                        </select>
                                                    </div>
                                                    <textarea placeholder='Comment' rows='3'></textarea>
                                                    <input type='submit' value='Leave Comment' />
                                                </form>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!--end of text tabs-->
                            </div>
                        </div>
                        <!--end of row-->
                    </div>
                    <!--end of product single-->
				";
			}
		}

		else{
            $url='shop.php';
   		   echo '<META HTTP-EQUIV=REFRESH CONTENT="1; '.$url.'">';	
		}
	}




    function single_product_title(){

        if(isset($_GET['show'])){
            $id = $_GET['show'];

            $link = $_GET['show'];

            $key = "whutger917328";
            $decoded = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($id), MCRYPT_MODE_CBC, md5(md5($key))), "\0");

            $query = mysql_query("
            SELECT
               barang.harga,
               barang.qty,
               barang.image1,
               barang.image2,
               barang.image3,
               barang.image4,
               barang.short_desc,
               barang.long_desc,
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
                barang.barang_id = '$id'
            ");

            while($result=mysql_fetch_array($query)){
                $id = $result['barang_id'];
                $nama = $result['nm_brg'];
                $qty = $result['qty'];
                $harga = $result['harga'];
                $img1 = $result['image1'];
                $img2 = $result['image2'];
                $img3 = $result['image3'];
                $img4 = $result['image4'];
                $short_desc = $result['short_desc'];
                $long_desc = $result['long_desc'];

                $nama_merk = $result['nama_merk'];
                $size = $result['size'];
                $warna = $result['warna'];
                $warna_id = $result['warna_id'];

                $harga = format_rupiah($harga);

                echo "$nama_merk - $nama";
            }
        }
    }
?>