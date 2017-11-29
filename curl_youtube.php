<?php
$ch = curl_init();


	curl_setopt_array($ch, array(
	  CURLOPT_URL => "https://www.youtube.com/results?search_query=ac+milan+vs+torino+2017",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_CUSTOMREQUEST => "GET",
	   CURLOPT_HTTPHEADER => array()
));


echo $server_output = curl_exec ($ch);
echo $err = curl_error($ch);

curl_close ($ch);
?>