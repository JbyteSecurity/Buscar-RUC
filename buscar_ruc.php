<?php

//Class of query to SUNAT for get the data of the enterprise
//ruc: ruc of the enterprise to request
//token: for autentication to webservie, for 100 requests free
//Author: Jordan Diaz Diaz
//Date : 19/06/2019
$data = array(
    'token' => 'dc9f25cf-b5d3-4983-9a96-d94a38692fb0-c36eade6-56e8-49b7-9f46-e15c1501ce77',
    'ruc' => '20101744737'
);

//encode the parameters to json for be send
$payload = json_encode($data);
 
// Prepare new cURL resource
$ch = curl_init('https://api.migoperu.pe/api/v1/ruc'); //url of the webservice
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
 
// Set HTTP Header for POST request 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload))
);
 
// Submit the POST request
$result = curl_exec($ch);
print_r($result); 
// Close cURL session handle
curl_close($ch);


