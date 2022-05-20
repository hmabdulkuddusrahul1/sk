<?php
if(strpos($message, '!sk') === 0 or strpos($message, '/sk') === 0 or strpos($message, '.sk') === 0){
$keyboard = json_encode($keyboard);
checkrole($chatId,$message_id,$keyboard,$nopre,$gId);
sendaction($chatId, typing);
$lista = substr($message, 5);
$check = strlen($lista);
$check1 = strlen($lista, 0,7);
$chem = substr($lista, 0,1);
if(empty($lista)){
reply_to($chatId, $message_id,$keyboard,$validauth);
exit();
}elseif($check<25){
reply_to($chatId, $message_id,$keyboard,$validauth);
exit();
}elseif(strpos($check1 != 'sk_live')){
reply_to($chatId, $message_id,$keyboard,$validauth);
exit();
}
$sec = substr($message, 4);
$fii = substr($sec, 0,25);
$newstring = substr($sec, -10);
$sss = reply_to($chatId,$message_id,$keyboard,"<b>Checking Wait...</b>");
   $respon = json_decode($sss, TRUE);
            $message_id_1 = $respon['result']['message_id'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/tokens');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, "card[number]=4543218722787334&card[exp_month]=07&card[exp_year]=2026&card[cvc]=780");
curl_setopt($ch, CURLOPT_USERPWD, $sec. ':' . '');
$headers = array();
$headers[] = 'Content-Type: application/x-www-form-urlencoded';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
if (strpos($result, 'api_key_expired')){
edit_message($chatId,$message_id_1,$keyboard, "<b>? DEAD KEY</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> EXPIRED KEY%0A%0A<b>Bot: @ANONBD </b>");
}
elseif (strpos($result, 'Invalid API Key provided')){
edit_message($chatId,$message_id_1,$keyboard, "<b>═════════ 『 ANONBD 』═════════%0A❌ DEAD KEY ❌</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> INVALID KEY%0A%0A<b>Bot: @ANONBD </b>");
}
elseif ((strpos($result, 'testmode_charges_only')) || (strpos($result, 'test_mode_live_card'))){
edit_message($chatId,$message_id_1,$keyboard, "<b>══『 ANONBD 』══%0A❌ DEAD KEY ❌</b>%0A<u>KEY:</u> <code>$sec</code>%0A<u>REASON:</u> Testmode Charges Only%0A%0A<b>Bot: @ANONBD </b>");
}else{
edit_message($chatId,$message_id_1,$keyboard, "<b>%0A✅LIVE KEY✅</b>%0A<u>KEY:</u> <code>${fii}xxxxxxxxxxxxxxxxx${newstring}</code>%0A<u>RESPONSE:</u> SK LIVE!!%0A%0A<b>Bot: @ANONBD</b>");
// sleep(10);
// edit_message($chatId,$message_id_1,$keyboard,"<b>DELETING SK KEY");
deleteM($chatId,$message_id);
exit();
// sleep(3);
// edit_message($chatId,$message_id_1,$keyboard,"<b>DELETED SK KEY");
}}
?>