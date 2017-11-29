<?php

	//Setting Ongkir Otomatis Memanfaat akun starter RajaOngkir.Com
	$SetPropinsi = ""; //9 Propinsi Jawa Barat
	$AsalKiriman = "115"; //115 Kota Bekasi Jawa Barat
	$TujuanKiriman = "155"; //419 Kab Sleman Yk
	$BeratProduk = "1"; //1kg Berat Produk
	$TipeOngkir = "jne"; //Jenis Ongkir jne / tiki / pos
	$APIKeyRaja = "b29c3386486cbce212be9e03338ae102"; //API Key Raja


	function get_prov(){

		$APIKeyRaja = "b29c3386486cbce212be9e03338ae102"; //API Key Raja

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://rajaongkir.com/api/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $APIKeyRaja"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		}

		else {
			$hasil = json_decode($response, true);

			for($i=0; $i<count($hasil['rajaongkir']['results']); $i++){

				$province = $hasil['rajaongkir']['results'][$i]['province'];

?>

				<option value="<?php echo $province; ?>"><?php echo "$province"; ?></option>
<?php
			}
		}
	}


	function get_city(){

		$curl = curl_init();

	curl_setopt_array($curl, array(
	  CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	  CURLOPT_HTTPHEADER => array(
	    "key: ff3835e554a38921c8ed6de4bd41482a"
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);


	echo "<select name='provinsi' id='provinsi'>";
	echo "<option>Pilih Provinsi Tujuan</option>";
	$data = json_decode($response, true);
	for ($i=0; $i < count($data['rajaongkir']['results']); $i++) {
		echo "<option value='".$data['rajaongkir']['results'][$i]['province_id'].'&&'.$data['rajaongkir']['results'][$i]['province']."'>".$data['rajaongkir']['results'][$i]['province']."</option>";
	}
	echo "</select><br><br>";
	//Get Data Provinsi

			}
		
	







	function prov_id($provinsi){

		$APIKeyRaja = "b29c3386486cbce212be9e03338ae102"; //API Key Raja

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://rajaongkir.com/api/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $APIKeyRaja"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		}

		else {
			$hasil = json_decode($response, true);

			for($i=0; $i<count($hasil['rajaongkir']['results']); $i++){

				$province = $hasil['rajaongkir']['results'][$i]['province'];
				$province_id = $hasil['rajaongkir']['results'][$i]['province_id'];

				if ($province == $provinsi) {
					$prov_id = $province_id;
				}
			}

			return $prov_id;
		}
	}









	function city_id($kota){

		$APIKeyRaja = "b29c3386486cbce212be9e03338ae102"; //API Key Raja

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://rajaongkir.com/api/starter/city?province=$SetPropinsi",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $APIKeyRaja"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		}

		else {
			$hasil = json_decode($response, true);

			for($i=0; $i<count($hasil['rajaongkir']['results']); $i++){

				$city_name = $hasil['rajaongkir']['results'][$i]['city_name'];
				$city_id = $hasil['rajaongkir']['results'][$i]['city_id'];

				if ($city_name == $kota) {
					$kota_id = $city_id;
				}
			}

			return $kota_id;
		}
	}
























		$APIKeyRaja = "b29c3386486cbce212be9e03338ae102"; //API Key Raja

		$curl = curl_init();

		curl_setopt_array($curl, array(
			CURLOPT_URL => "http://rajaongkir.com/api/starter/province",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_HTTPHEADER => array(
				"key: $APIKeyRaja"
			),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			echo "cURL Error #:" . $err;
		}

		else {
			$hasil = json_decode($response, true);

			for($i=0; $i<count($hasil['rajaongkir']['results']); $i++){

				$province = $hasil['rajaongkir']['results'][$i]['province'];
			}
		}
?>