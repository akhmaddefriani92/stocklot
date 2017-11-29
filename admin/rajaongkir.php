<?php

// $provinsi_id = $_GET['prov_id'];

$curl = curl_init();
curl_setopt_array($curl, array(
  // CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province=$provinsi_id",
  CURLOPT_URL => "http://api.rajaongkir.com/starter/city?province",
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
/*echo "<pre>";
print_r(json_decode($response));
echo "</pre>";*/

$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  //echo $response;
}
$zx=json_decode($response);
echo "<pre>";
$data_kabupaten=array();
$data_provinsi=array();
foreach ($zx as $key => $value) {
  # code...
  foreach ($value->results as $data) {
    # code...
    print_r($data);
     $temp1=array();
    $temp1["city_id"] = $data["city_id"];
    $temp1["city_name"] = $data->city_name;
    $temp1["postal_code"] = $data["postal_code"];

    array_push($data_kabupaten, $temp1);
    /*$temp2=array();
    $temp2["province_id"] = $value->results["province_id"];
    $temp2["province"] = $value->results["province"];
    array_push($data_provinsi, $temp2);*/
  }

  /*[city_id] => 1
    [province_id] => 21
    [province] => Nanggroe Aceh Darussalam (NAD)
    [type] => Kabupaten
    [city_name] => Aceh Barat
    [postal_code] => 23681*/
    // echo $value->results->city_id." ".$value->results->city_name." ".$value->results->postal_code."<br>";
   
    # code...
  

}
print_r($data_kabupaten);
echo "</pre>";

$data = json_decode($response, true);
for ($i=0; $i < count($data['rajaongkir']['results']); $i++) { 
    // echo "<option value='".$data['rajaongkir']['results'][$i]['city_id'].'&&'.$data['rajaongkir']['results'][$i]['city_name']."'>".$data['rajaongkir']['results'][$i]['city_name']."</option>";
}

?>