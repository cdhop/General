<?php

function postJSON($url,$array) {
       $json = json_encode($array);

       $ch = curl_init($url);
       curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
       curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($json)));

       $result = curl_exec($ch);

       return json_decode($result, true);
}

$url = "http://server_host"; 
$args = array(
               "field1" => "value1",
               "field2" => "value2",
               "field3" => "value3",
               "field4" => 0,
       );

$result = postJSON($url,$args);

echo $result;

?>
