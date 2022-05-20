<?php

date_default_timezone_set($config['timeZone']);
//////////////===[START]===//////////////

$botToken =  "1816615315:AAH9_Zh6dtekxEVm_b_cIACCVYML0Dp8e88";
$website = "https://api.telegram.org/bot".$botToken;
$update = file_get_contents('php://input');
echo $update;
$update = json_decode($update, TRUE);
global $website;
$e = print_r($update);
$cchatid2 = $update["callback_query"]["message"]["chat"]["id"];
$cmessage_id2 = $update["callback_query"]["message"]["message_id"];
$cdata2 = $update["callback_query"]["data"];
$username = $update["message"]["from"]["username"];
$chatId = $update["message"]["chat"]["id"]; 
$chatusername = $update["message"]["chat"]["username"]; 
$chatname = $update["message"]["chat"]["title"]; 
$gId = $update["message"]["from"]["id"];
$userId = $update["message"]["from"]["id"]; 
$firstname = $update["message"]["from"]["first_name"]; 
$username = $update["message"]["from"]["username"]; 
$message = $update["message"]["text"]; 
$new_chat_member = $update["message"]["new_chat_member"];
$newusername = $update["message"]["new_chat_member"]["username"];
$newgId = $update["message"]["new_chat_member"]["id"];
$newfirstname = $update["message"]["new_chat_member"]["first_name"];
$message_id = $update["message"]["message_id"]; 
$r_id = $update["message"]["reply_to_message"];
$r_userId = $update["message"]["reply_to_message"]["from"]["id"];  
$r_firstname = $update["message"]["reply_to_message"]["from"]["first_name"];  
$r_username = $update["message"]["reply_to_message"]["from"]["username"]; 
$r_msg_id = $update["message"]["reply_to_message"]["message_id"]; 
$r_msg = $update["message"]["reply_to_message"]["text"]; 
$sender_chat = $update["message"]["sender_chat"]["type"]; 
if ($cdata2 == "free"){
$islive = 'ON';
    $keyboard = ['inline_keyboard' => [[
           ['text' => 'Premium', 'callback_data' => 'paid'], 
           ['text' => 'Buy', 'callback_data' => 'buy'], 
           ['text' => 'Others', 'callback_data' => 'others'], 
           ['text' => 'Finalize', 'callback_data' => 'end']],
      
]];

if ($_SERVER['REQUEST_METHOD'] == "POST"){
extract($_POST);
}
elseif ($_SERVER['REQUEST_METHOD'] == "GET"){
extract($_GET);
}

if(strpos($message, "/start") === 0){
if(!isBanned($userId) && !isMuted($userId)){

  if($userId == $config['adminID']){
    $messagesec = "<b>Type /admin to know admin commands</b>";
  }

    addUser($userId);
    bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"<b>Hello @$username,

Type /cmds to know all my commands!</b>

$messagesec",
	'parse_mode'=>'html',
	'reply_to_message_id'=> $message_id,
    'reply_markup'=>json_encode(['inline_keyboard' => [
        [
          ['text' => "Created By", 'url' => "t.me/anonbd"]
        ],
        [
          ['text' => "Channal", 'url' => "t.me/hackerbasebd"]
        ],
      ], 'resize_keyboard' => true])
        
    ]);
  }
}

//////////////===[CMDS]===//////////////

if(strpos($message, "/cmds") === 0 || strpos($message, "!cmds") === 0){

  if(!isBanned($userId) && !isMuted($userId)){
    bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"<b>Which commands would you like to check?</b>",
    'parse_mode'=>'html',
    'reply_to_message_id'=> $message_id,
    'reply_markup'=>json_encode(['inline_keyboard'=>[
    [['text'=>"Checker Gates",'callback_data'=>"checkergates"]],[['text'=>"Other Commands",'callback_data'=>"othercmds"]],
    ],'resize_keyboard'=>true])
    ]);
  }
  
  }
  
  if($data == "back"){
    bot('editMessageText',[
    'chat_id'=>$callbackchatid,
    'message_id'=>$callbackmessageid,
    'text'=>"<b>Which commands would you like to check?</b>",
    'parse_mode'=>'html',
    'reply_markup'=>json_encode(['inline_keyboard'=>[
    [['text'=>"Checker Gates",'callback_data'=>"checkergates"]],[['text'=>"🛠 Other Commands",'callback_data'=>"othercmds"]],
    ],'resize_keyboard'=>true])
    ]);
  }
  
  if($data == "checkergates"){
    bot('editMessageText',[
    'chat_id'=>$callbackchatid,
    'message_id'=>$callbackmessageid,
    'text'=>"<b>━━CC Checker Gates━━</b>
  
<b>/ss | !ss - Stripe [Auth] ⛔OFF</b>
<b>/sm | !sm - Stripe [Merchant] ⛔OFF</b>
<b>/schk | !schk - User Stripe Merchant ⛔OFF</b>

<b>ϟ Join <a href='t.me/hackerbasebd'>HACKERBASE</a></b>",
    'parse_mode'=>'html',
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode(['inline_keyboard'=>[
  [['text'=>"Return",'callback_data'=>"back"]]
  ],'resize_keyboard'=>true])
  ]);
  }
  
  
  if($data == "othercmds"){
    bot('editMessageText',[
    'chat_id'=>$callbackchatid,
    'message_id'=>$callbackmessageid,
    'text'=>"<b>━━Other Commands━━</b>
  
<b>/gen | !gen</b> - Generate Extrap From Bin✅
<b>/rand | !rand</b> - Random Details✅
<b>/sk | !sk</b> - SK Key Checker✅
<b>/bin | !bin</b> - Bin Lookup✅
<b>/iban | !iban</b> - IBAN Checker✅
<b>/weather | !weather</b> - Weather✅
<b>Proxy</b> /http | /socks4 | /socks5✅
  
  <b>ϟ Join <a href='t.me/hackerbasebd'>HACKERBASE</a></b>",
    'parse_mode'=>'html',
    'disable_web_page_preview'=>true,
    'reply_markup'=>json_encode(['inline_keyboard'=>[
  [['text'=>"Return",'callback_data'=>"back"]]
  ],'resize_keyboard'=>true])
  ]);
  }

foreach (glob("API/*.php") as $filename)
{
    include $filename;
}
// flush();

// reply_to($chatId,$message_id_1,$keyboard,$keyboard, "<b>Sorry! %0AGive Me Valid City Name %0AEX: <code>!weather Bokaro</code></b>");
if(file_exists(getcwd().('/cookie.txt'))){
@unlink('cookie.txt');

}

define('API_KEY',$botToken);







function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot1816615315:AAH9_Zh6dtekxEVm_b_cIACCVYML0Dp8e88/".$method;
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_POSTFIELDS,$datas);
    $res = curl_exec($ch);
    if(curl_error($ch)){
        var_dump(curl_error($ch));
    }else{
        return json_decode($res);
    }
}

function sendaction($chatId, $action){
	bot('sendchataction',[
	'chat_id'=>$chatId,
	'action'=>$action
	]);
	}

	function joincheck($gId,$chatId,$message_id,$firstname){}

function state($state){
if($state=="Alabama"){ $state="AL";
}else if($state=="alaska"){ $state="AK";
}else if($state=="arizona"){ $state="AR";
}else if($state=="california"){ $state="CA";
}else if($state=="olorado"){ $state="CO";
}else if($state=="connecticut"){ $state="CT";
}else if($state=="delaware"){ $state="DE";
}else if($state=="district of columbia"){ $state="DC";
}else if($state=="florida"){ $state="FL";
}else if($state=="georgia"){ $state="GA";
}else if($state=="hawaii"){ $state="HI";
}else if($state=="idaho"){ $state="ID";
}else if($state=="illinois"){ $state="IL";
}else if($state=="indiana"){ $state="IN";
}else if($state=="iowa"){ $state="IA";
}else if($state=="kansas"){ $state="KS";
}else if($state=="kentucky"){ $state="KY";
}else if($state=="louisiana"){ $state="LA";
}else if($state=="maine"){ $state="ME";
}else if($state=="maryland"){ $state="MD";
}else if($state=="massachusetts"){ $state="MA";
}else if($state=="michigan"){ $state="MI";
}else if($state=="minnesota"){ $state="MN";
}else if($state=="mississippi"){ $state="MS";
}else if($state=="missouri"){ $state="MO";
}else if($state=="montana"){ $state="MT";
}else if($state=="nebraska"){ $state="NE";
}else if($state=="nevada"){ $state="NV";
}else if($state=="new hampshire"){ $state="NH";
}else if($state=="new jersey"){ $state="NJ";
}else if($state=="new mexico"){ $state="NM";
}else if($state=="new york"){ $state="LA";
}else if($state=="north carolina"){ $state="NC";
}else if($state=="north dakota"){ $state="ND";
}else if($state=="Ohio"){ $state="OH";
}else if($state=="oklahoma"){ $state="OK";
}else if($state=="oregon"){ $state="OR";
}else if($state=="pennsylvania"){ $state="PA";
}else if($state=="rhode Island"){ $state="RI";
}else if($state=="south carolina"){ $state="SC";
}else if($state=="south dakota"){ $state="SD";
}else if($state=="tennessee"){ $state="TN";
}else if($state=="texas"){ $state="TX";
}else if($state=="utah"){ $state="UT";
}else if($state=="vermont"){ $state="VT";
}else if($state=="virginia"){ $state="VA";
}else if($state=="washington"){ $state="WA";
}else if($state=="west virginia"){ $state="WV";
}else if($state=="wisconsin"){ $state="WI";
}else if($state=="wyoming"){ $state="WY";
}else if($state=="Kentucky"){ $state="KY";
}else{$state="";}
return $result;}
function reply_to($chatId,$message_id,$keyboard,$message) {
        $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML&reply_markup=".$keyboard."";
        return file_get_contents($url);
}
          

function sendMessage($chatId,$keyboard,$message) {
       
        $url = $GLOBALS[website]."/sendMessage?chat_id=".$chatId."&text=".$message."&reply_to_message_id=".$message_id."&parse_mode=HTML";
        file_get_contents($url);
       
}
function sendMessage1($message) {
       
        $url = $GLOBALS[website]."/sendMessage?chat_id=-1001532421814&text=".$message."&parse_mode=HTML";
        file_get_contents($url);
        
}
function sendVoice ($chatId,$original) {
       
        $url = $GLOBALS[website]."/sendVoice?chat_id=".$chatId."&voice=".$original."";
        file_get_contents($url);
}
function deleteM ($chatId,$message_id) {
       
        $url = $GLOBALS[website]."/deleteMessage?chat_id=".$chatId."&message_id=".$message_id."";
        file_get_contents($url);
}
function string_between_two_string($str, $starting_word, $ending_word){
$subtring_start = strpos($str, $starting_word);
$subtring_start += strlen($starting_word);
$size = strpos($str, $ending_word, $subtring_start) - $subtring_start;
return substr($str, $subtring_start, $size);
}
function GetStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);  
    return $str[0];
}


function g($l, $k, $p){
  return explode($p, explode($k, $l)[1])[0];
}
// function gibarray($message){
// 
// }

function Capture($str, $starting_word, $ending_word){
$subtring_start  = strpos($str, $starting_word);
$subtring_start += strlen($starting_word);   
$size = strpos($str, $ending_word, $subtring_start) - $subtring_start;
return substr($str, $subtring_start, $size);
}

function value($str,$find_start,$find_end)
{
    $start = @strpos($str,$find_start);
    if ($start === false)
    {
        return "";
    }
    $length = strlen($find_start);
    $end    = strpos(substr($str,$start +$length),$find_end);
    return trim(substr($str,$start +$length,$end));
}
function clean($string) {
  $text = preg_replace("/\r|\n/", " ", $string);
     $str1 = preg_replace('/\s+/', ' ', $text);
$str = preg_replace("/[^0-9]/", " ", $str1);
$string = trim($str, " ");
$lista = preg_replace('/\s+/', ' ', $string);
   return $lista; 
}
function clean2($string) {
  $text = preg_replace("/\r|\n/", "", $string);
     $str1 = preg_replace('/\s+/', ' ', $text);
$str = preg_replace("/[^0-9]/", " ", $str1);
$string = trim($str, " ");
$lista = preg_replace('/\s+/', ' ', $string);
// 
   return $result; 
}
function clean1($string) {
$str = preg_replace("/[^0-9]/", " ", $string);
   return $str; 
}
function RemoveSpecialChar($str) { 
    $res = str_replace(array( '\'', '"', 
    ',' , ';', '<', '>','.' ), '', $str); 
    return $res; 
} 

function GUID(){
if (function_exists('com_create_guid') === true){
return trim(com_create_guid(), '{}');
}
return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}
function MUID(){
if (function_exists('com_create_muid') === true){
return trim(com_create_muid(), '{}');
}
return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}

function SID(){
if (function_exists('com_create_sid') === true){
return trim(com_create_sid(), '{}');
}
return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
}
// sendMessage($chatId,$keyboard,$rand);
function edit_message($chatId,$message_id,$keyboard,$message) {
   $url = $GLOBALS[website]."/editMessageText?chat_id=".$chatId."&text=".$message."&message_id=".$message_id."&parse_mode=HTML";
	file_get_contents($url);
}
function editMessage ($chatId, $message,$message_id){
global $botToken;
$url = "https://api.telegram.org/bot".$botToken."/editMessageText?chat_id=".$chatId."&message_id=".$message_id."&text=••MASS CHECKER%0A".$message."%0A••• BOT BY: @RoldexVerse&parse_mode=HTML";
$result = file_get_contents($url);      
echo $result.'<hr>';
}
function multiexplode($delimiters, $string){
$one = str_replace($delimiters, $delimiters[0], $string);
$two = explode($delimiters[0], $one);
return $two;
}
function inStr($string, $start, $end, $value) {
    $str = explode($start, $string);
    $str = explode($end, $str[$value]);
    return $str[0];
}
function mod($dividendo,$divisor) {     return round($dividendo - (floor($dividendo/$divisor)*$divisor));
 }

function gibarray($message){
    // $cuted = substr($message, 6);
    return explode("\n", $message);
}

function getFlags($code){
    $code = strtoupper($code);
    if($code == 'AD') return '🇦🇩';
    if($code == 'AE') return '🇦🇪';
    if($code == 'AF') return '🇦🇫';
    if($code == 'AG') return '🇦🇬';
    if($code == 'AI') return '🇦🇮';
    if($code == 'AL') return '🇦🇱';
    if($code == 'AM') return '🇦🇲';
    if($code == 'AO') return '🇦🇴';
    if($code == 'AQ') return '🇦🇶';
    if($code == 'AR') return '🇦🇷';
    if($code == 'AS') return '🇦🇸';
    if($code == 'AT') return '🇦🇹';
    if($code == 'AU') return '🇦🇺';
    if($code == 'AW') return '🇦🇼';
    if($code == 'AX') return '🇦🇽';
    if($code == 'AZ') return '🇦🇿';
    if($code == 'BA') return '🇧🇦';
    if($code == 'BB') return '🇧🇧';
    if($code == 'BD') return '🇧🇩';
    if($code == 'BE') return '🇧🇪';
    if($code == 'BF') return '🇧🇫';
    if($code == 'BG') return '🇧🇬';
    if($code == 'BH') return '🇧🇭';
    if($code == 'BI') return '🇧🇮';
    if($code == 'BJ') return '🇧🇯';
    if($code == 'BL') return '🇧🇱';
    if($code == 'BM') return '🇧🇲';
    if($code == 'BN') return '🇧🇳';
    if($code == 'BO') return '🇧🇴';
    if($code == 'BQ') return '🇧🇶';
    if($code == 'BR') return '🇧🇷';
    if($code == 'BS') return '🇧🇸';
    if($code == 'BT') return '🇧🇹';
    if($code == 'BV') return '🇧🇻';
    if($code == 'BW') return '🇧🇼';
    if($code == 'BY') return '🇧🇾';
    if($code == 'BZ') return '🇧🇿';
    if($code == 'CA') return '🇨🇦';
    if($code == 'CC') return '🇨🇨';
    if($code == 'CD') return '🇨🇩';
    if($code == 'CF') return '🇨🇫';
    if($code == 'CG') return '🇨🇬';
    if($code == 'CH') return '🇨🇭';
    if($code == 'CI') return '🇨🇮';
    if($code == 'CK') return '🇨🇰';
    if($code == 'CL') return '🇨🇱';
    if($code == 'CM') return '🇨🇲';
    if($code == 'CN') return '🇨🇳';
    if($code == 'CO') return '🇨🇴';
    if($code == 'CR') return '🇨🇷';
    if($code == 'CU') return '🇨🇺';
    if($code == 'CV') return '🇨🇻';
    if($code == 'CW') return '🇨🇼';
    if($code == 'CX') return '🇨🇽';
    if($code == 'CY') return '🇨🇾';
    if($code == 'CZ') return '🇨🇿';
    if($code == 'DE') return '🇩🇪';
    if($code == 'DJ') return '🇩🇯';
    if($code == 'DK') return '🇩🇰';
    if($code == 'DM') return '🇩🇲';
    if($code == 'DO') return '🇩🇴';
    if($code == 'DZ') return '🇩🇿';
    if($code == 'EC') return '🇪🇨';
    if($code == 'EE') return '🇪🇪';
    if($code == 'EG') return '🇪🇬';
    if($code == 'EH') return '🇪🇭';
    if($code == 'ER') return '🇪🇷';
    if($code == 'ES') return '🇪🇸';
    if($code == 'ET') return '🇪🇹';
    if($code == 'FI') return '🇫🇮';
    if($code == 'FJ') return '🇫🇯';
    if($code == 'FK') return '🇫🇰';
    if($code == 'FM') return '🇫🇲';
    if($code == 'FO') return '🇫🇴';
    if($code == 'FR') return '🇫🇷';
    if($code == 'GA') return '🇬🇦';
    if($code == 'GB') return '🇬🇧';
    if($code == 'GD') return '🇬🇩';
    if($code == 'GE') return '🇬🇪';
    if($code == 'GF') return '🇬🇫';
    if($code == 'GG') return '🇬🇬';
    if($code == 'GH') return '🇬🇭';
    if($code == 'GI') return '🇬🇮';
    if($code == 'GL') return '🇬🇱';
    if($code == 'GM') return '🇬🇲';
    if($code == 'GN') return '🇬🇳';
    if($code == 'GP') return '🇬🇵';
    if($code == 'GQ') return '🇬🇶';
    if($code == 'GR') return '🇬🇷';
    if($code == 'GS') return '🇬🇸';
    if($code == 'GT') return '🇬🇹';
    if($code == 'GU') return '🇬🇺';
    if($code == 'GW') return '🇬🇼';
    if($code == 'GY') return '🇬🇾';
    if($code == 'HK') return '🇭🇰';
    if($code == 'HM') return '🇭🇲';
    if($code == 'HN') return '🇭🇳';
    if($code == 'HR') return '🇭🇷';
    if($code == 'HT') return '🇭🇹';
    if($code == 'HU') return '🇭🇺';
    if($code == 'ID') return '🇮🇩';
    if($code == 'IE') return '🇮🇪';
    if($code == 'IL') return '🇮🇱';
    if($code == 'IM') return '🇮🇲';
    if($code == 'IN') return '🇮🇳';
    if($code == 'IO') return '🇮🇴';
    if($code == 'IQ') return '🇮🇶';
    if($code == 'IR') return '🇮🇷';
    if($code == 'IS') return '🇮🇸';
    if($code == 'IT') return '🇮🇹';
    if($code == 'JE') return '🇯🇪';
    if($code == 'JM') return '🇯🇲';
    if($code == 'JO') return '🇯🇴';
    if($code == 'JP') return '🇯🇵';
    if($code == 'KE') return '🇰🇪';
    if($code == 'KG') return '🇰🇬';
    if($code == 'KH') return '🇰🇭';
    if($code == 'KI') return '🇰🇮';
    if($code == 'KM') return '🇰🇲';
    if($code == 'KN') return '🇰🇳';
    if($code == 'KP') return '🇰🇵';
    if($code == 'KR') return '🇰🇷';
    if($code == 'KW') return '🇰🇼';
    if($code == 'KY') return '🇰🇾';
    if($code == 'KZ') return '🇰🇿';
    if($code == 'LA') return '🇱🇦';
    if($code == 'LB') return '🇱🇧';
    if($code == 'LC') return '🇱🇨';
    if($code == 'LI') return '🇱🇮';
    if($code == 'LK') return '🇱🇰';
    if($code == 'LR') return '🇱🇷';
    if($code == 'LS') return '🇱🇸';
    if($code == 'LT') return '🇱🇹';
    if($code == 'LU') return '🇱🇺';
    if($code == 'LV') return '🇱🇻';
    if($code == 'LY') return '🇱🇾';
    if($code == 'MA') return '🇲🇦';
    if($code == 'MC') return '🇲🇨';
    if($code == 'MD') return '🇲🇩';
    if($code == 'ME') return '🇲🇪';
    if($code == 'MF') return '🇲🇫';
    if($code == 'MG') return '🇲🇬';
    if($code == 'MH') return '🇲🇭';
    if($code == 'MK') return '🇲🇰';
    if($code == 'ML') return '🇲🇱';
    if($code == 'MM') return '🇲🇲';
    if($code == 'MN') return '🇲🇳';
    if($code == 'MO') return '🇲🇴';
    if($code == 'MP') return '🇲🇵';
    if($code == 'MQ') return '🇲🇶';
    if($code == 'MR') return '🇲🇷';
    if($code == 'MS') return '🇲🇸';
    if($code == 'MT') return '🇲🇹';
    if($code == 'MU') return '🇲🇺';
    if($code == 'MV') return '🇲🇻';
    if($code == 'MW') return '🇲🇼';
    if($code == 'MX') return '🇲🇽';
    if($code == 'MY') return '🇲🇾';
    if($code == 'MZ') return '🇲🇿';
    if($code == 'NA') return '🇳🇦';
    if($code == 'NC') return '🇳🇨';
    if($code == 'NE') return '🇳🇪';
    if($code == 'NF') return '🇳🇫';
    if($code == 'NG') return '🇳🇬';
    if($code == 'NI') return '🇳🇮';
    if($code == 'NL') return '🇳🇱';
    if($code == 'NO') return '🇳🇴';
    if($code == 'NP') return '🇳🇵';
    if($code == 'NR') return '🇳🇷';
    if($code == 'NU') return '🇳🇺';
    if($code == 'NZ') return '🇳🇿';
    if($code == 'OM') return '🇴🇲';
    if($code == 'PA') return '🇵🇦';
    if($code == 'PE') return '🇵🇪';
    if($code == 'PF') return '🇵🇫';
    if($code == 'PG') return '🇵🇬';
    if($code == 'PH') return '🇵🇭';
    if($code == 'PK') return '🇵🇰';
    if($code == 'PL') return '🇵🇱';
    if($code == 'PM') return '🇵🇲';
    if($code == 'PN') return '🇵🇳';
    if($code == 'PR') return '🇵🇷';
    if($code == 'PS') return '🇵🇸';
    if($code == 'PT') return '🇵🇹';
    if($code == 'PW') return '🇵🇼';
    if($code == 'PY') return '🇵🇾';
    if($code == 'QA') return '🇶🇦';
    if($code == 'RE') return '🇷🇪';
    if($code == 'RO') return '🇷🇴';
    if($code == 'RS') return '🇷🇸';
    if($code == 'RU') return '🇷🇺';
    if($code == 'RW') return '🇷🇼';
    if($code == 'SA') return '🇸🇦';
    if($code == 'SB') return '🇸🇧';
    if($code == 'SC') return '🇸🇨';
    if($code == 'SD') return '🇸🇩';
    if($code == 'SE') return '🇸🇪';
    if($code == 'SG') return '🇸🇬';
    if($code == 'SH') return '🇸🇭';
    if($code == 'SI') return '🇸🇮';
    if($code == 'SJ') return '🇸🇯';
    if($code == 'SK') return '🇸🇰';
    if($code == 'SL') return '🇸🇱';
    if($code == 'SM') return '🇸🇲';
    if($code == 'SN') return '🇸🇳';
    if($code == 'SO') return '🇸🇴';
    if($code == 'SR') return '🇸🇷';
    if($code == 'SS') return '🇸🇸';
    if($code == 'ST') return '🇸🇹';
    if($code == 'SV') return '🇸🇻';
    if($code == 'SX') return '🇸🇽';
    if($code == 'SY') return '🇸🇾';
    if($code == 'SZ') return '🇸🇿';
    if($code == 'TC') return '🇹🇨';
    if($code == 'TD') return '🇹🇩';
    if($code == 'TF') return '🇹🇫';
    if($code == 'TG') return '??🇬';
    if($code == 'TH') return '🇹🇭';
    if($code == 'TJ') return '🇹🇯';
    if($code == 'TK') return '🇹🇰';
    if($code == 'TL') return '🇹🇱';
    if($code == 'TM') return '🇹🇲';
    if($code == 'TN') return '🇹🇳';
    if($code == 'TO') return '🇹🇴';
    if($code == 'TR') return '🇹🇷';
    if($code == 'TT') return '🇹🇹';
    if($code == 'TV') return '🇹🇻';
    if($code == 'TW') return '🇹🇼';
    if($code == 'TZ') return '🇹🇿';
    if($code == 'UA') return '🇺🇦';
    if($code == 'UG') return '🇺🇬';
    if($code == 'UM') return '🇺🇲';
    if($code == 'US') return '🇺🇸';
    if($code == 'UY') return '🇺🇾';
    if($code == 'UZ') return '🇺🇿';
    if($code == 'VA') return '🇻🇦';
    if($code == 'VC') return '🇻🇨';
    if($code == 'VE') return '🇻🇪';
    if($code == 'VG') return '🇻🇬';
    if($code == 'VI') return '🇻🇮';
    if($code == 'VN') return '🇻🇳';
    if($code == 'VU') return '🇻🇺';
    if($code == 'WF') return '🇼🇫';
    if($code == 'WS') return '🇼🇸';
    if($code == 'XK') return '🇽🇰';
    if($code == 'YE') return '🇾🇪';
    if($code == 'YT') return '🇾🇹';
    if($code == 'ZA') return '🇿🇦';
    if($code == 'ZM') return '🇿🇲';
    return '🏳';
}
function ccn($lista){
    $members = explode("\n", $user);
    if (!in_array($lista, $members)) {
        $add_user = file_get_contents('temp/ccn.txt');
        $add_user .= $lista . "\n";
        file_put_contents('temp/ccn.txt', $add_user);
    }
}
function cvv($lista){
    $user = file_get_contents('temp/cvv.txt');
    $members = explode("\n", $user);
    if (!in_array($lista, $members)) {
        $add_user = file_get_contents('temp/cvv.txt');
        $add_user .= $lista . "\n";
        file_put_contents('temp/cvv.txt', $add_user);
    }
}
function dec($lista){
    $user = file_get_contents('temp/dec.txt');
    $members = explode("\n", $user);
    if (!in_array($lista, $members)) {
        $add_user = file_get_contents('temp/dec.txt');
        $add_user .= $lista . "\n";
        file_put_contents('temp/dec.txt', $add_user);
    }
}
function rest($lista){
    $cc = multiexplode(array(":", "/", " ", "|", ""), $lista)[0];
    $mes = multiexplode(array(":", "/", " ", "|", ""), $lista)[1];
    $ano = multiexplode(array(":", "/", " ", "|", ""), $lista)[2];
    $cvv = multiexplode(array(":", "/", " ", "|", ""), $lista)[3];
    $lista = ''.$cc.'|'.$mes.'|'.$ano.'|'.$cvv.'';
    $user = file_get_contents('temp/dec.txt');
    $members = explode("\n", $user);
    if (!in_array($lista, $members)) {
        $add_user = file_get_contents('temp/rest.txt');
        $add_user .= $lista . "\n";
        file_put_contents('temp/rest.txt', $add_user);
    }
}
function time1($val){
    $endtime = microtime(true);
    $time = $endtime - $val;
    $time = substr($time, 0, 4);
    return $time;
}
function bannedbin($bin){
	$bugbin = file_get_contents('banned.txt');
    $exploded = explode("\n", $bugbin);
    if (in_array($bin, $exploded)) {
    return true;
     }
     }
function addedgp($bin){
	$bugbin = file_get_contents('addedgp.txt');
    $exploded = explode("\n", $bugbin);
    if (in_array($bin, $exploded)) {
    return true;
     }else{
     return false;
     }
     }
?>