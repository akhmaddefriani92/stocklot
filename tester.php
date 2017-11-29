<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head	>
	<body>

	<?php  include 'lib/ongkir.php';?>

<form method="post" id="form-user" action="tester.php">

                                                        <?php $curl = curl_init();

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

			 ?>                                        
                                                   
 <select id="kabupaten" name="kabupaten"></select><br><br>

  <input type="submit" form="form-user" class="" value="Confirm Edit" name="confirmedit" />
 </form>
 </body>
                                                    <script type="text/javascript">




	$(document).ready(function(){
		$('#provinsi').change(function(){

			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax 
			var value = document.getElementById("provinsi").value;
            var split = value.split("&&");
            var v1 = split[0];
            var v2 = split[1];

      		$.ajax({
            	type : 'GET',
           		url : 'http://localhost/stocklot/cek_kabupaten.php',
            	data :  'prov_id=' + v1,
					success: function (data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					$("#kabupaten").html(data);
				}
          	});
		});
});
</script>

<?php $nama = $_POST['kabupaten'];


 $value = explode("&&", $nama);
echo $value[0];
echo $value[1];