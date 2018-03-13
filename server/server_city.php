<?php
$key = $_GET['term'];

$url = "http://192.168.2.18/auto/api/dest/key/".$key;
$curl_post_data = array(
								"username" => 'APIUSER',
								"api_key" => 'd8dedbecf40d6c09f22704342907d804',
							);
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
$curl_response = curl_exec($curl);
curl_close($curl);

$json_o = json_decode($curl_response);
$i=0;
foreach ($json_o->detail as $row)
{
	$json[$i]['code'] = base64_encode($row->code);
	$json[$i]['label'] = $row->label;
	$i++;
}

echo json_encode($json);
?>