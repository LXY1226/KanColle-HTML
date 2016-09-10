<?php
if ($_POST['login_id'] == ''|$_POST ['password'] == ''){
	die('请填全账号和密码 <a href="/Login.html">返回</a>');
}

$ch = curl_init ();
$login_data = 'login_id=' . $_POST ['login_id'] . '&password=' . $_POST ['password'] . '&mode=4';
curl_setopt ( $ch, CURLOPT_URL, "http://cm.gakki.pw/service/flash" );
curl_setopt ( $ch, CURLOPT_HEADER, 0 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_POST, 1);
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $login_data );
$json = curl_exec ( $ch );
$json = json_decode($json);
if ($json -> status == 1){
	header('Location:'.$json->flash_url);
	exit();
	//将会添加接口
	$json = parse_url($json->flash_url);
	$params = array ();
	foreach ( explode ( '&', $json['query']) as $param )
	{
		$item = explode ( '=', $param );
		$params [$item [0]] = $item [1];
	}
	header('Location:http://'.$json['host'].'/kcs/mainD2.swf?api_token='.$params['api_token'].'&api_starttime='.$params['amp;api_starttime']);
}else(die($json -> message.' <a href="/Login.html">返回</a>'));

?>
