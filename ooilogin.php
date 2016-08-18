<?php
$world_ip_list = array (
		"203.104.209.71",
		"203.104.209.87",
		"125.6.184.16",
		"125.6.187.205",
		"125.6.187.229",
		"125.6.187.253",
		"125.6.188.25",
		"203.104.248.135",
		"125.6.189.7",
		"125.6.189.39",
		"125.6.189.71",
		"125.6.189.103",
		"125.6.189.135",
		"125.6.189.167",
		"125.6.189.215",
		"125.6.189.247",
		"203.104.209.23",
		"203.104.209.39",
		"203.104.209.55",
		"203.104.209.102",
		);
$tmp_cookie_jar = tempnam ( "tmp", "cookie_" );
$ch = curl_init ();
$login_data = 'login_id=' . $_POST ['login_id'] . '&password=' . $_POST ['password'] . '&mode=4';
curl_setopt ( $ch, CURLOPT_URL, "http://cm.gakki.pw/" );
curl_setopt ( $ch, CURLOPT_HEADER, 0 );
curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $ch, CURLOPT_FOLLOWLOCATION, 1 );
curl_setopt ( $ch, CURLOPT_POST, 1);
curl_setopt ( $ch, CURLOPT_POSTFIELDS, $login_data );
curl_setopt ( $ch, CURLOPT_COOKIEFILE, $tmp_cookie_jar );
$ooi_login_return = curl_exec ( $ch );
curl_close ( $ch );

$ooi_login_parse = tidy_parse_string ( $ooi_login_return, array (), 'utf8' );

// preg_match_all("/(\w+=\w+)(#\w+)?/i",$ooi_login_parse->root()->child[1]->child[1]->child[0]->child[1]->child[0]->child[1]->child[0]->attribute["href"],$match);

$params = array ();
foreach ( explode ( '&', parse_url ( $ooi_login_parse->root ()->child [1]->child [1]->child [0]->child [1]->child [0]->child [1]->child [0]->attribute ["href"] ) ["query"] ) as $param ) 
{
	$item = explode ( '=', $param );
	$params [$item [0]] = $item [1];
}
unset($ooi_login_parse);

$user_id = $params['owner'];
$user_st = $params['st'];

unset($params);
//echo 'ID:'.$user_id.'<br/>';
		//st:'.urldecode($user_st);


$dmm_get_ip = curl_init ();
curl_setopt ( $dmm_get_ip, CURLOPT_URL, 'http://203.104.209.7/kcsapi/api_world/get_id/'.$user_id.'/1/'.time().'000');
curl_setopt ( $dmm_get_ip, CURLOPT_HEADER, 0 );
curl_setopt ( $dmm_get_ip, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $dmm_get_ip, CURLOPT_FOLLOWLOCATION, 1 );
$dmm_get_ip_return = curl_exec ( $dmm_get_ip );
unset ( $dmm_get_ip );
$user_ip = $world_ip_list[json_decode(strstr($dmm_get_ip_return,'{'))->api_data->api_world_id - 1];
//echo 'IP:'.$user_ip;


$dmm_get_token = curl_init ();
$login_data ='url=http://125.6.189.39/kcsapi/api_auth_member/dmmlogin/'.$user_id.'/1/'.time().'000&httpMethod=GET&authz=signed&st='.$user_st.'&contentType=JSON&numEntries=3&getSummaries=false&signOwner=true&signViewer=true&gadget=http://203.104.209.7/gadget.xml&container=dmm';
curl_setopt ( $dmm_get_token, CURLOPT_URL, "http://osapi.dmm.com/gadgets/makeRequest" );
curl_setopt ( $dmm_get_token, CURLOPT_HEADER, 0 );
curl_setopt ( $dmm_get_token, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt ( $dmm_get_token, CURLOPT_FOLLOWLOCATION, 1 );
curl_setopt ( $dmm_get_token, CURLOPT_POST, 1);
curl_setopt ( $dmm_get_token, CURLOPT_POSTFIELDS, $login_data );
$dmm_get_token_return = curl_exec ( $dmm_get_token );
$json = json_decode(substr(strstr($dmm_get_token_return, ":{"), 1,strrpos($dmm_get_token_return,'}"')))->body;
$token = json_decode(strstr($json,'{'))->api_token;
//echo '<br/>'.'Token:'.$token;
//echo '<br/>URL:'.'Location:http://'.$user_ip.'/kcs/mainD2.swf?api_token='.$token.'&api_starttime='.time().'000';
header('Location:http://'.$user_ip.'/kcs/mainD2.swf?api_token='.$token.'&api_starttime='.time().'000');
?>