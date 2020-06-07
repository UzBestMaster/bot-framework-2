<?php
$token = "XXXXXX"; // bot tokeni
define('API_KEY',$token); 

$admin = "XXXXXX"; // admin IDsi

function bot($method,$datas=[]){
$url = http_build_query($datas);
return json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/".$method."?".$url));
}

$update = json_decode(file_get_contents('php://input'));
$botname = bot('getme',['bot'])->result->username;
$msg = $update->message;
$cid = $msg->chat->id;
$tx = $msg->text;
$name = str_replace(["[","]","(",")","*","_","`"],["","","","","","",""],$msg->from->first_name);
$fid = $msg->from->id;

if($tx == "/start" or $tx == "/start@$botname"){
	bot('sendMessage',[
    'chat_id'=>$cid,
    'text'=>"Salom *$name*! *@$botname*'ga xush kelibsiz!",
    'parse_mode'=> "markdown"
	]);
}