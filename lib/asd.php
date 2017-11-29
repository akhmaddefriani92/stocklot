<?php

	//Setting Ongkir Otomatis Memanfaat akun starter RajaOngkir.Com
	$SetPropinsi = "34"; //9 Propinsi Jawa Barat
	$AsalKiriman = "115"; //115 Kota Bekasi Jawa Barat
	$TujuanKiriman = "155"; //419 Kab Sleman Yk
	$BeratProduk = "1"; //1kg Berat Produk
	$TipeOngkir = "jne"; //Jenis Ongkir jne / tiki / pos
	$APIKeyRaja = "b29c3386486cbce212be9e03338ae102"; //API Key Raja



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

				echo "'" . $city_id . "' => '" . $city_name . "',<br>";
			}
		}
?>