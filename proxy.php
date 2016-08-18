<?php 
$ch = curl_init ();
curl_setopt ( $ch, CURLOPT_URL, 'http://'.$_POST ['user_ip'].'/'.$_POST ['address']);
curl_setopt ( $ch, CURLOPT_HEADER, 0 );
curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
curl_setopt ( $ch, CURLOPT_POST, 1);
curl_setopt ( $ch, CURLOPT_REFERER, 'http://'.$_POST ['user_ip'].'/kcs/mainD2.swf?api_token='.$_POST ['token'].'&api_starttime='.time().'000/[[DYNAMIC]]/1');
curl_setopt ( $ch, CURLOPT_POSTFIELDS, 'api%5Fverno=1&api%5Ftoken='.$_POST ['token'] );
curl_exec ($ch);
curl_close ( $ch );
?>