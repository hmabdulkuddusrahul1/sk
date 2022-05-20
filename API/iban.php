<?php
if(strpos($message, "/ichk")===0 or strpos($message, "!ichk")===0 or strpos($message, ".ichk")===0){
sendaction($chatId, typing);
  $iban = substr($message, 6);
  if(empty($iban)){
reply_to($chatId,$message_id,$keyboard,"<b>GIVE ME A  IBAN %0AEX: <code>!ichk DE72733692640414834879</code></b>");
exit();
}


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.iban.com/iban-checker');
curl_setopt($ch, CURLOPT_POST, 1);
$headers = array();
$headers[] = 'Host: www.iban.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,*/*;q=0.8';
$headers[] = 'Accept-Language: en-US,en;q=0.5';
$headers[] = 'Referer: https://www.iban.com/iban-checker';
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
$headers[] = 'Origin: https://www.iban.com';
$headers[] = 'DNT: 1';
$headers[] = 'Connection: keep-alive';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'TE: Trailers';
$headers[] =  'x-requested-with: XMLHttpRequest';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'iban='.$iban.'');
$result = curl_exec($ch);


#----------------------------------------------------------------- [RESPONSES] ------------------------------------------------------------------#

if
(strpos($result,  '<i class="fa fa-check green"></i> <strong>')) {
  reply_to($chatId,$message_id,$keyboard,"IBAN VALID✅");
}

else{
    reply_to($chatId,$message_id,$keyboard,"IBAN NOT VALID❎");
// echo "<span class='badge badge-pink'>Decoder</span><br>"; 
}
curl_close($ch);

}
if(strpos($message, "/iban")===0 or strpos($message, "!iban")===0 or strpos($message, ".iban")===0){
sendaction($chatId, typing);
$get = file_get_contents('https://random-data-api.com/api/bank/random_bank');
$get = strtoupper($get);
preg_match_all("(\"account_number\":\"(.*)\")siU", $get, $matches1);
$num = $matches1[1][0];
preg_match_all("(\"iban\":\"(.*)\")siU", $get, $matches1);
$iban = $matches1[1][0];
preg_match_all("(\"bank_name\":\"(.*)\")siU", $get, $matches1);
$bank_name = $matches1[1][0];
preg_match_all("(\"routing_number\":\"(.*)\")siU", $get, $matches1);
$rnum = $matches1[1][0];
preg_match_all("(\"swift_bic\":\"(.*)\")siU", $get, $matches1);
$swift = $matches1[1][0];
$respo = urlencode("<b>═════════ 『 IBAN 』═════════
•• IBAN GENERATOR
• IBAN: <code>$iban</code>
• ACCOUNT NUMBER: <code>$num</code>
• BANK NAME: <code>$bank_name</code>
• ROUTING NUMBER: <code>$rnum</code>
• SWIFT BIC: <code>$swift</code>
••• BOT BY: @ANONBD</b>");
reply_to($chatId,$message_id,$keyboard,$respo);
}
?>