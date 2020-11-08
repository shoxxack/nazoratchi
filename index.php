<?php
ob_start();
define('API_KEY', '1197712832:AAEMybwU6EXE7n1VmSkj7PKHKI6ar_CUssw');
//tokenni yozing
$admin = "1232898350"; 
//ozizni id raqamizni yozing

//ozizni id raqamizni yozing

   function del($nomi){
   array_map('unlink', glob("$nomi"));
   }

   function ty($ch){ 
   return bot('sendChatAction', [
   'chat_id' => $ch,
   'action' => 'typing',
   ]);
} 

function bot($method,$datas=[]){
    $url = "https://api.telegram.org/bot".API_KEY."/".$method;
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
$update = json_decode(file_get_contents('php://input'));
$edname = $editm ->from->first_name;
$message = $update->message;
$mesid = $message->message_id;
$mid = $message->message_id;
$chat_id = $message->chat->id;
$cid = $message->chat->id;
$mtext = $message->text;
$capt = $message->caption;
$forward = $update->message->forward_from;
$editm = $update->edited_message;
$fadmin = $message->from->id;
$cty = $message->chat->type;
$step=file_get_contents("data/$fadmin/name.txt");
//bu yerni o'zgartirishingiz mumkin.

$update = json_decode(file_get_contents('php://input'));
$data = $update->callback_query->data;
$cid2 = $update->callback_query->message->chat->id; 
$cqid = $update->callback_query->id;
$chat_id2 = $update->callback_query->message->chat->id;
$message_id2 = $update->callback_query->message->message_id;
$botim="Nazoratchi_Sbot";
$soat = date('H:i', strtotime('0 hour'));
$message = $update->message;
$mid = $message->message_id;
$chat_id = $message->chat->id;
$text1 = $message->text;
$gif = $message->animation;
$doc = $message->document;
$title = $message->chat->title;
$fadmin = $message->from->id;
$lang = $message->from->language_code;
$from = $message->from;
$id = $message->reply_to_message->from->id;
$message_id = $message->reply_to_message->message_id;
$from_user_first_name = $message->reply_to_message->from->first_name;
//Yangi odam id si
$new_chat_members = $message->new_chat_member->id;
$lan = $message->new_chat_member->language_code;
$ism = $message->new_chat_member->first_name;
$username = $message->from->username;
$first_name = $message->from->first_name;
$is_bot = $message->new_chat_member->is_bot;
$step = file_get_contents("stat/$chat_id.step");
$guruhlar = file_get_contents("stat/group.list");
$userlar = file_get_contents("stat/user.list");
mkdir("warn");
mkdir("stat");


    if (($new_chat_members != NUll)&&($is_bot!=true)) {
  if((stripos($lan,"fa")!== false) or (stripos($lan,"ar")!==false)){
      $vaqti = strtotime("+999999999999 minutes");
  bot('kickChatMember', [
      'chat_id' => $chat_id,
      'user_id' => $new_chat_members,
      'until_date'=> $vaqti,
    ]);
    }else{
      $test = "<b>👋Salom</b> <a href='tg://user?id=$new_chat_members'>$ism</a> ,<b>$title</b> guruhimizga xush kelibsiz!n\n\📡";
       bot('sendmessage',[
       'chat_id'=>$chat_id,
       'text'=>$test,
       'parse_mode'=>'html'
     ]);
   }
    }

if(isset($text1)){
  if($cty == "group" or $cty == "supergroup"){
    if(stripos($guruhlar,"$chat_id")!==false){
    }else{
    file_put_contents("stat/group.list","$guruhlar\n$chat_id");
    }
  }else{
   $userlar = file_get_contents("stat/user.list");
   if(stripos($userlar,"$chat_id")!==false){
    }else{
    file_put_contents("stat/user.list","$userlar\n$chat_id");
   }
  }
 }
  
 


    if (($new_chat_members != NUll)&&($is_bot!=false)) {
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
   $vaqti = strtotime("+999999999999 minutes");
  bot('kickChatMember', [
      'chat_id' => $chat_id,
      'user_id' => $new_chat_members,
      'until_date'=> $vaqti,
  ]);
  bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
  bot('sendmessage', [
      'chat_id' => $chat_id,
      'text' => "❗️<b>Guruhga faqat adminlar bot qo'shi mumkin!</b>",
      'parse_mode' => 'html'
  ]);
}
}


if($text1 == "/start" or $text1 == "/start@Nazoratchi_Sbot"){
if($cty == "supergroup" or $cty == "group"){
  bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
$st = bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"<b>Bot lichkasiga yozing!</b>",
'parse_mode' => 'html'
]);
  bot('deleteMessage', [
  'chat_id' => $chat_id,
  'message_id' => $mesid,
  ]);
    $stt = $st->result->message_id;
  bot('deleteMessage',[
 'chat_id'=> $chat_id,
 'message_id'=>$stt,
]);
}else{
$sta = bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=> "<b>Salom</b>👋
Man <b>arablani, reklamalani, ssilkalani</b> guruhlarda o'chirib beraman👨🏻‍✈ 

Man ishlashim uchun <b>guruhizga</b> qo'shib <b>admin</b> berishiz kerak😄\n\n📡Userim: @Nazoratchi_Sbot",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
  'reply_markup'=>json_encode([   
   'inline_keyboard'=>[   
       [['text'=>'Buyruqlar', 'callback_data' => "stat"],['text'=>'Statistika', 'callback_data' => "stat1"]],
          [['text'=>'➕ Guruhga qo‘shish','url'=>'telegram.me/Nazoratchi_Sbot?startgroup=new']]
]   
]),
]);
}
}

if($text1 == "Lg"&&$fadmin==$admin){
  bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>$guruhlar,
    ]);
}


if($text1 == "Lu"&&$fadmin==$admin){
  bot('sendmessage',[
    'chat_id'=>$admin,
    'text'=>$userlar,
    ]);
}

if($data=="stat1"){
$gr = substr_count($guruhlar,"\n"); 
$us = substr_count($userlar,"\n"); 
$obsh = $gr + $us;
 $soat = date('H:i', strtotime('0 hour'));
$bugun = date('d-M Y',strtotime('0 hour'));
   bot('editMessageText',[
   'chat_id'=>$chat_id2,
    'message_id'=>$message_id2,
    'text'=> "🌐<b>Bot statistikasi:</b>\n\n👤A'zolar: <b>$us</b>\n👥Guruhlar: <b>$gr</b>\n📣Umumiy: <b>$obsh</b>\n\n$bugun $soat",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(
['inline_keyboard' => [
  [['text'=>'Yangilash', 'callback_data' => "stat1"]],
  [['text'=>'➕ Guruhga qo‘shish','url'=>'telegram.me/Nazoratchi_Sbot?startgroup=new']]
]
]),
]);
}

if((stripos($mtext,"1001")!==false) and $fadmin==$admin){
      $lx=explode("\n",$mtext);
      $idsi = $lx[0];
  $lin  = bot('exportchatinvitelink',[
       'chat_id'=>"-$idsi",
       ]);
  $link = $lin->result;
   bot('sendMessage',[
       'chat_id'=>$admin,
       'text'=>"$link",
     ]);
}
     
if($data=="stat"){
   bot('editMessageText',[
   'chat_id'=>$chat_id2,
    'message_id'=>$message_id2,
    'text'=> "🏁<b>Guruh adminlari ishlatishi mumkin bo‘lgan buyruqlar:</b>

<b>Ro</b> - Guruh a‘zosini “read only” rejimiga tushuradi;
<b>Unro</b> - Guruh a‘zosidan cheklovni oladi;
<b>Kick</b> - Guruh a‘zosini guruhdan chiqaradi;
<b>Warn</b> - Guruh a‘zosiga ogohlantirish beradi va ogohlantirishlar soni 3 taga yetganda jazo sifatida guruhdan chiqaradi;
<b>Unwarn</b> - Guruh a‘zosidagi  ogohlantirishlarni olib tashlaydi;
<b>Ban</b>  - Guruh a‘zosini  guruhdan chiqaradi,boshqa qaytib kira  olmaydi;
<b>Unban</b> - Bandan oladi;
<b>Pin</b> - Xabarni yuqoriga qistiradi;
<b>Addpm</b> - Guruh a‘zosini guruhga admin qiladi;
<b>Delpm</b> - Adminlikdan oladi.

- Bot guruh yangi a‘zolari bilan salomlashadi.Guruh a‘zosi guruhga reklama <b>ssilkalarini</b> tashlasa yoki <b>haqoratli</b> so‘z yozsa,bot xabarni o‘chirib foydalanuvchiga cheklov beradi.\n\n<b>Yaratuvchi🛠:</b>  <a href='tg://user?id=833249908'>Lazik0</a>",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['url' => 'https://telegram.me/Nazoratchinew_robot?startgroup=new', 'text' => "➕ Guruhga qo‘shish"],],
]
]),
]);
}

if($text1 == "/buyruqlar" or $text1 == "/buyruqlar@Nazoratchi_Sbot"){
if($cty == "supergroup" or $cty == "group"){
  bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
$bs = bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=>"<b>Bot lichkasiga yozing!</b>",
'parse_mode' => 'html'
]);
  bot('deleteMessage', [
  'chat_id' => $chat_id,
  'message_id' => $mesid,
  ]);
  $bss = $bs->result->message_id;
  bot('deleteMessage',[
 'chat_id'=> $chat_id,
 'message_id'=>$bss,
]);
}else{
bot('sendMessage',[
'chat_id'=>$chat_id,
'text'=> "🏁<b>Guruh adminlari ishlatishi mumkin bo‘lgan buyruqlar:</b>

<b>Ro</b> - Guruh a‘zosini “read only” rejimiga tushuradi;
<b>Unro</b> - Guruh a‘zosidan cheklovni oladi;
<b>Kick</b> - Guruh a‘zosini guruhdan chiqaradi;
<b>Warn</b> - Guruh a‘zosiga ogohlantirish beradi va ogohlantirishlar soni 3 taga yetganda jazo sifatida guruhdan chiqaradi;
<b>Unwarn</b> - Guruh a‘zosidagi  ogohlantirishlarni olib tashlaydi;
<b>Ban</b>  - Guruh a‘zosini  guruhdan chiqaradi,boshqa qaytib kira  olmaydi;
<b>Unban</b> - Bandan oladi;
<b>Pin</b> - Xabarni yuqoriga qistiradi;
<b>Addpm</b> - Guruh a‘zosini guruhga admin qiladi;
<b>Delpm</b> - Adminlikdan oladi.

- 👨🏻‍💻 Bot guruh yangi a‘zolari bilan salomlashadi. ☝️Guruh a‘zosi guruhga reklama <b>ssilkalarini</b> tashlasa yoki <b>haqoratli</b> so‘z yozsa,bot xabarni o‘chirib foydalanuvchiga cheklov beradi☝️.\n\n<b>Yaratuvchi🛠:</b>  <a href='tg://user?id=1232898350'>@Uzb_Coderchik</a>",
'parse_mode' => 'html',
'disable_web_page_preview'=>true,
'reply_markup'=>json_encode(
['inline_keyboard' => [
[['url' => 'https://telegram.me/Nazoratchi_Sbot?startgroup=new', 'text' => "➕ Guruhga qo‘shish"],],
]
]),
]);
}
}

  


    if($text1 == "Admin"){
      bot('sendmessage',[
        'chat_id'=>$chat_id,
        'text'=>"💝Pastdagi tugmani bosing",
        'reply_markup'=>json_encode([   
        'inline_keyboard'=>[   
            [['text'=>'Shu yerni bosing', 'callback_data' => "admin"]]
]   
]),
]);
}

    if($data == "admin"){
      bot('answerCallbackQuery',[
       'callback_query_id'=>$cqid,
       'text'=> "😙Bot admini @Uzb_Coderchik",
       'show_alert'=>true
        ]);
    }


if((stripos($mtext,"latifa")!==false) or (stripos($mtext,"латифа")!==false)){
    $latif = file_get_contents("latifa.txt");
  $latifa = explode("✅",$latif);
  $soz = $latifa[rand(0,count($latifa)-1)];
  $a=json_encode(bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>$soz,
   ]));
}

		if(stripos($mtext,"soat") !== false){
		$soat = date('H:i', strtotime('2 hour'));
  $text = "🇺🇿⏰Hozir soat: *$soat*";
  $a=json_encode(bot('sendmessage',[
   'reply_to_message_id'=>$mesid,
   'chat_id'=>$chat_id,
   'text'=>$text,
   'parse_mode' => 'markdown'
  ]));
}

		
		if(stripos($mtext,"sana") !== false){
        $bugun = date('d-M Y',strtotime('0 hour'));
  $text = "🇺🇿📆Bugungi sana: *$bugun*";
  $a=json_encode(bot('sendmessage',[
   'reply_to_message_id'=>$mesid,
   'chat_id'=>$chat_id,
   'text'=>$text,
   'parse_mode'=> 'markdown'
  ]));
}

if(stripos($mtext,"/id") !== false){
  $text = "*⚠️🆔Sizning idingiz:* $fadmin";
  $a=json_encode(bot('sendmessage',[
   'reply_to_message_id'=>$mesid,
   'chat_id'=>$chat_id,
   'text'=>$text,
   'parse_mode'=> 'markdown'
  ]));
}

if(stripos($mtext,"/gid") !== false){
  $text = "*⚠️🆔Guruh idsi:* $chat_id";
  $a=json_encode(bot('sendmessage',[
   'reply_to_message_id'=>$mesid,
   'chat_id'=>$chat_id,
   'text'=>$text,
   'parse_mode'=> 'markdown'
  ]));
}

if(isset($doc) or isset($gif)){
  $gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
  bot('deleteMessage', [
    'chat_id'=>$chat_id,
    'message_id'=>$mesid
  ]);
}
}

if((mb_stripos($mtext,"#Lazik") !== false)){ 
bot('SendMessage',[
'chat_id'=>$chat_id,
'reply_to_message_id'=>$mid,
'text'=>"Xabaringiz adminga yetkazildi!",
]);
}
if((mb_stripos($mtext,"#Lazik") !== false) or (mb_stripos($mtext,"Lazik")!==false) or (stripos($mtext,"blogger")!==false) or (mb_stripos($mtext,"admin")!==false) or (mb_stripos($mtext,"Laziz")!==false)){ 
bot('SendMessage',[
'chat_id'=>$admin,
'parse_mode'=>'html',
'text'=>"✉<b>$title(</b>  $chat_id  <b>) guruhida sizni eslashdi:</b>\n<code>$mtext</code>\n  <b>Xabarchi  haqida  ma'lumotlar: </b>
👤<b>Ismi:</b>  <a href='tg://user?id=$fadmin'>$first_name</a>
🆔<b>ID</b>si: $fadmin
🔅<b>Usernamesi:</b> @$username ", null, false
      ]);
   }



  if((stripos($mtext,"reo")!==false) and $fadmin == $admin){
      $sx=explode("\n",$mtext);
      $useid = $sx[2];
      $chatidsi  = $sx[1];
      $vaqti = $sx[3];
      $minut = strtotime("+$vaqti minutes");
   bot('restrictChatMember', [
      'chat_id' => "-$chatidsi",
      'user_id' => $useid,
      'until_date' => $minut,
      'can_send_messages' => false,
      'can_send_media_messages' => false,
      'can_send_other_messages' => false,
      'can_add_web_page_previews' => false
  ]);
  bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
  bot('sendmessage', [
      'chat_id' => $chat_id,
      'text' => "⭕️ <a href='tg://user?id=$useid'>Foydalanuvchi</a> -$chatidsi guruhida <b>$vaqti</b> ga <b>Read only</b> rejimiga tushdirildi!",
      'parse_mode' => 'html'
  ]);
}

  if($text1 == "ajshajavhab" or  $text1 == "ajsjnanan" or $text1 == "ajjajahb" or $text1 == "sjjsnanan"){
  $input = array("Ok!!!","Nok🍐","Sok","👌","Tok⚡","😏","☺","👍","Ok");
  $rand=rand(0,8);
  $soz="$input[$rand]";
  $a=json_encode(bot('sendmessage',[
   'reply_to_message_id'=>$mesid,
   'chat_id'=>$chat_id,
   'text'=>$soz,
  ]));
}

if($text1 == "ro" or $text1 == "Ro" or $text1 == "RO" or $text1 == "rO"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
  $minut = strtotime("+99999999999999 minutes");
  bot('restrictChatMember', [
      'chat_id' => $chat_id,
      'user_id' => $id,
      'until_date' => $minut,
      'can_send_messages' => false,
      'can_send_media_messages' => false,
      'can_send_other_messages' => false,
      'can_add_web_page_previews' => false
  ]);
  bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
  bot('sendmessage', [
      'chat_id' => $chat_id,
      'text' => "⭕️ <a href='tg://user?id=$id'>$from_user_first_name</a> siz <b>Read only</b> rejimiga tushirildingiz!",
      'parse_mode' => 'html'
  ]);
}
}

    if($text1 == "Kick"  or  $text1 == "kick"  or $text1 == "/kick"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
  $vaqti = strtotime("+1 minutes");
  bot('kickChatMember', [
      'chat_id' => $chat_id,
      'user_id' => $id,
      'until_date'=> $vaqti,
  ]);
  bot('unbanChatMember', [
        'chat_id' => $chat_id,
        'user_id' => $id,
    ]);
  bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
  bot('sendmessage', [
      'chat_id' => $chat_id,
      'text' => "⭕️ <a href='tg://user?id=$id'>$from_user_first_name</a> guruhdan <b>Kick</b> bo‘ldi!",
      'parse_mode' => 'html'
  ]);
}
}

if($text1 =="Banan" or $text1 == "Xayr"&&$fadmin==$admin){
       $vaqti = strtotime("+10800000 minutes");
      bot('kickChatMember', [
        'chat_id' => $chat_id,
        'user_id' => $id,
        'until_date' => $vaqti,
      ]);
    bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
    bot('sendMessage', [
        'chat_id'=>$chat_id,
        'text' => "⭕️ <a href='tg://user?id=$id'>$from_user_first_name</a> guruhdan <b>ban</b> bo‘ldiz!",
        'parse_mode'=>'html'
    ]);
  }

  if((stripos($capt,"https://")!==false)  or (stripos($capt,"http://")!==false) or (stripos($capt,"@")!==false) or (stripos($capt,"bot?start=")!==false)  or (stripos($mtext,"bot?start=")!==false)  or  
(stripos($mtext,"@")!==false)  or  
(stripos($mtext,"t.me")!==false)  or  
(stripos($mtext,"telegram.me")!==false)  or  
(stripos($mtext,"http://") !==false) or  (stripos($mtext,"https://")!==false)){
  if((stripos($capt,"☣")!==false) or (stripos($mtext,"☣")!==false)){
  }else{
  $gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="member"){
    $minut = strtotime("+5 minutes");
    bot('restrictChatMember', [
        'chat_id' => $chat_id,
        'user_id' => $fadmin,
        'until_date' => $minut,
        'can_send_messages' => false,
        'can_send_media_messages' => false,
        'can_send_other_messages' => false,
        'can_add_web_page_previews' => false
    ]);
    bot('deleteMessage', [
        'chat_id' => $chat_id,
        'message_id' => $mid,
    ]);
    bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
    bot('sendmessage', [
        'chat_id' => $chat_id,
        'text' => "⭕️ <a href='tg://user?id=$fadmin'>$first_name</a> siz <b>5 minut</b>ga <b>Read only</b> rejimiga tushdingiz.\n⚠ <b>Sabab:</b> <i>Reklama!</i> ",
        'parse_mode' => 'html'
    ]);
}
}
  }

    if((stripos($mtext,"dalbayop")!==false)  or (stripos($mtext,"oneni")!==false)  or (stripos($mtext,"skaman")!==false) or (stripos($mtext,"sikaman")!==false) or (stripos($mtext,"Axmoq")!==false) or (stripos($mtext,"chumo")!==false)  or  (stripos($mtext,"dalbayob")!==false) or  (stripos($mtext,"skay")!==false) or (stripos($mtext,"seks")!==false) or (stripos($mtext,"dalban")!==false) or (stripos($mtext,"yiban")!==false) or (stripos($mtext,"jalab")!==false) or (stripos($mtext,"скаман")!==false) or (stripos($mtext,"qanjiq")!==false) or (stripos($mtext,"чумо")!==false)  or  (stripos($mtext,"далбаёб")!==false) or  (stripos($mtext,"скай")!==false) or (stripos($mtext,"секс")!==false) or (stripos($mtext,"далбан")!==false) or (stripos($mtext,"йибан")!==false) or (stripos($mtext,"haqorat")!==false) or (stripos($mtext,"жалаб")!==false) or (stripos($mtext,"кутинга")!==false) or (stripos($mtext,"kotinga")!==false) or  (stripos($mtext,"куток")!==false)  or  (stripos($mtext,"qotoq")!==false) or  (stripos($mtext,"naxuy")!==false) or (stripos($mtext,"хуй")!==false) or (stripos($mtext,"сучка")!==false) or (stripos($mtext,"suchka")!==false) or (stripos($mtext,"омини")!==false) or (stripos($mtext,"омнга")!==false) or  (stripos($mtext,"сикаман")!==false)  or  (stripos($mtext,"гандон")!==false) or  (stripos($mtext,"сука")!==false) or (stripos($mtext,"жопа")!==false) or (stripos($mtext,"omingni")!==false) or (stripos($mtext,"ominga")!==false) or (stripos($mtext,"gandon")!==false) and $fadmin !== $admin){
    $gett = bot('getChatMember', [
   'chat_id' => $chat_id,
   'user_id' => $fadmin,
   ]);
  $get = $gett->result->status;
  if($get =="member"){
     $minut = strtotime("+108000000 minutes");
    bot('kickChatMember', [
        'chat_id' => $chat_id,
        'user_id' => $fadmin,
        'until_date' => $minut,
        'can_send_messages' => false,
        'can_send_media_messages' => false,
        'can_send_other_messages' => false,
        'can_add_web_page_previews' => false
    ]);
    bot('deleteMessage', [
       'chat_id' => $chat_id,
       'message_id' => $mid
    ]);
    bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
    bot('sendmessage', [
        'chat_id' => $chat_id,
        'text' => "⭕️ <a href='tg://user?id=$fadmin'>$first_name</a> <b>5 minut</b>ga <b>Read only</b> rejimiga tushdirildi.\n⚠ <b>Sabab:</b> <i>Haqorat qildi!</i> ",
        'parse_mode' => 'html'
    ]);
}
}

 if($text1 == "Addpm" or $text1 == "addpm"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
  bot('promoteChatMember',[
    'chat_id'=>$chat_id,
    'user_id'=>$id,
    'can_change_info'=>true,
    'can_post_messages'=>false,
    'can_edit_messages'=>false,
    'can_delete_messages'=>true,
    'can_invite_users'=>true,
    'can_restrict_members'=>true,
    'can_pin_messages'=>true,
    'can_promote_members'=>false
  ]);
  bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"✅ <a href='tg://user?id=$id'>$from_user_first_name</a> sizni tabriklayman , siz guruh <b>adminstratorisiz❗️</b>",
    'parse_mode'=>'html'
  ]);
}
}

   if($text1 == "Delpm" or $text1 == "delpm"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get == "administrator" or $get == "creator"){
bot('promoteChatMember',[
    'chat_id'=>$chat_id,
    'user_id'=>$id,
    'can_change_info'=>false,
    'can_post_messages'=>false,
    'can_edit_messages'=>false,
    'can_delete_messages'=>false,
    'can_invite_users'=>false,
    'can_restrict_members'=>false,
    'can_pin_messages'=>false,
    'can_promote_members'=>false
  ]);
  bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
  bot('sendmessage',[
    'chat_id'=> $chat_id,
    'text'=>"☑ <a href='tg://user?id=$id'>$from_user_first_name</a> siz endi guruh adminstratori <b>emassiz</b>❗️",
    'parse_mode'=>'html'
  ]);
}
}

  if($text1 == "Unro" or $text1 == "UNRO" or $text1 == "unro"){
 $gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
  bot('restrictChatMember',[
    'chat_id'=>$chat_id,
    'user_id'=>$id,
    'can_send_messages'=>true,
    'can_send_media_messages'=>true,
    'can_send_other_messages'=>true,
    'can_add_web_page_previews'=>true
  ]);
  bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
  bot('sendmessage',[
    'chat_id'=>$chat_id,
    'text'=>"☑ <a href='tg://user?id=$id'>$from_user_first_name</a> sizdan cheklov olindi, guruhda <b>yozishingiz mumkin!</b>\nEndi qoidani <b>buzmaysiz</b> degan umiddaman❗️",
    'parse_mode'=>'html'
  ]);
}
}

if($text1=="Pmadd"&&$fadmin==$admin) {
  bot('promoteChatMember',[
    'chat_id'=>$chat_id,
    'user_id'=>$id,
    'can_change_info'=>true,
    'can_post_messages'=>false,
    'can_edit_messages'=>false,
    'can_delete_messages'=>true,
    'can_invite_users'=>true,
    'can_restrict_members'=>true,
    'can_pin_messages'=>true,
    'can_promote_members'=>false
  ]);
  bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
  bot('sendmessage',[
    'chat_id'=> $chat_id,
    'text'=>"✅ <a href='tg://user?id=$id'>$from_user_first_name</a> sizni tabriklayman , siz guruh <b>adminstratorisiz❗️</b>",
    'parse_mode'=>'html'
  ]);
}

if($text1=="Pmme"&&$fadmin==$admin) {
    bot('promoteChatMember',[
    'chat_id'=>$chat_id,
    'user_id'=>$admin,
    'can_change_info'=>true,
    'can_post_messages'=>false,
    'can_edit_messages'=>false,
    'can_delete_messages'=>true,
    'can_invite_users'=>true,
    'can_restrict_members'=>true,
    'can_pin_messages'=>true,
    'can_promote_members'=>true
  ]);
  bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
  $ms = bot('sendmessage',[
    'chat_id'=> $chat_id,
    'text'=>"✅",
    'parse_mode'=>'html'
  ]);
    $nat = $ms->result->message_id;
    bot('deleteMessage', [
    'chat_id' => $chat_id,
    'message_id' => $nat,
  ]);
    bot('deleteMessage', [
    'chat_id'=>$chat_id,
    'message_id'=>$mesid
  ]);
}

if($text1=="Pmu"&&$fadmin==$admin) {
    bot('promoteChatMember',[
    'chat_id'=>$chat_id,
    'user_id'=>$id,
    'can_change_info'=>true,
    'can_post_messages'=>false,
    'can_edit_messages'=>false,
    'can_delete_messages'=>true,
    'can_invite_users'=>true,
    'can_restrict_members'=>true,
    'can_pin_messages'=>true,
    'can_promote_members'=>true
  ]);
  bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
  $ms = bot('sendmessage',[
    'chat_id'=> $chat_id,
    'text'=>"✅",
    'parse_mode'=>'html'
  ]);
    $nat = $ms->result->message_id;
    bot('deleteMessage', [
    'chat_id' => $chat_id,
    'message_id' => $nat,
  ]);
    bot('deleteMessage', [
    'chat_id'=>$chat_id,
    'message_id'=>$mesid
  ]);
}

if ($text1=='Del'&&$fadmin==$admin) {
   bot('deleteMessage', [
    'chat_id'=>$chat_id,
    'message_id'=>$mesid
  ]);
  bot('deleteMessage', [
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
  ]);
  }

if($text1 == "pin" or $text1 == "Pin" or $text1 == "PIn" or $text1 == "PIN" or $text1 == "piN" or $text1 == "pIN" or $text1 == "pIn" or $text1 == "pIN"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
  bot('pinChatMessage',[
    'chat_id'=>$chat_id,
    'message_id'=>$message_id
  ]);
}
}

if($text1=="bye"&&$fadmin==$admin) {
  bot('sendmessage', [
      'chat_id' => $chat_id,
      'text' => "<b>Ho‘p xo‘jayin</b>.",
      'parse_mode' => 'html'
  ]);
  bot('leaveChat',[
    'chat_id'=>$chat_id
  ]);
}

if((stripos($mtext,"Sw")!==false) and $fadmin == $admin){
      $sx=explode("\n",$text1);
      $matn = $sx[2];
      $idsi  = $sx[1];
  bot('sendMessage',[
       'chat_id'=>$idsi,
       'text'=>$matn,
       'parse_mode'=>'markdown',
       'disable_web_page_preview' => true,
       ]);
   bot('sendMessage',[
       'chat_id'=>$admin,
       'text'=>"✅",
       ]);
  }

 if($text1 == "ban" or $text1 == "Ban" or $text1== "/Ban" or  $text1 == "/ban"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
       $vaqti = strtotime("+108000000 minutes");
      bot('kickChatMember', [
        'chat_id' => $chat_id,
        'user_id' => $id,
        'until_date' => $vaqti,
      ]);
    bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
    bot('sendMessage', [
        'chat_id'=>$chat_id,
        'text' => "⭕️ <a href='tg://user?id=$id'>$from_user_first_name</a> guruhdan <b>ban</b> bo‘ldi!",
        'parse_mode'=>'html'
    ]);
  }
  }

 if($text1 == "Unban"  or  $text1 == "/unban"){
$gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
    bot('unbanChatMember', [
        'chat_id' => $chat_id,
        'user_id' => $id,
    ]);
    bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
    bot('sendMessage', [
        'chat_id'=>$chat_id,
        'text' => "⭕️ <a href='tg://user?id=$id'>$from_user_first_name</a> <b>ban</b>dan olindi!",
        'parse_mode'=>'html'
    ]);
}
}

if($text1 == "warn" or $text1 == "Warn" or $text1 == "/warn"){
  $gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
$warn = file_get_contents("warn/$chat_id&$id.dat");
if($warn){
$warn +=1;
file_put_contents("warn/$chat_id&$id.dat","$warn");
if($warn !=3){
  bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
$oldi = bot('sendmessage',[
  'chat_id'=>$chat_id,
  'text'=>"⚠ <a href='tg://user?id=$id'>$from_user_first_name</a> <b>ogohlantirish oldi.</b>\nEndi undagi ogohlantirishlar soni <b>$warn</b>/3.",
  'parse_mode'=>'html'
  ]);
}else{
 bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
 bot('sendmessage',[
  'chat_id'=>$chat_id,
  'text'=>"⚠ <a href='tg://user?id=$id'>$from_user_first_name</a> shu vaqtgacha unga berilgan ogohlantirishlarga <b>befarq bo‘ldi</b>, jazo sifatida esa guruhdan <b>chetlatiladi!</b>",
  'parse_mode'=>'html'
  ]);
 $vaqti = strtotime("+10800000 minutes");
  bot('kickChatMember', [
        'chat_id' => $chat_id,
        'user_id' => $id,
        'until_date' => $vaqti,
      ]);
 $warn = 0;
file_put_contents("warn/$chat_id&$id.dat","$warn");
}
}else{
$warn = 1;
file_put_contents("warn/$chat_id&$id.dat","$warn");
bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
  bot('sendmessage',[
  'chat_id'=>$chat_id,
  'text'=>"⚠ <a href='tg://user?id=$id'>$from_user_first_name</a> <b>ogohlantirish oldi.</b>\nEndi undagi ogohlantirishlar soni <b>$warn</b>/3.",
  'parse_mode'=>'html'
  ]);
}
}
}

  if($text1 == "unwarn" or $text1 == "Unwarn" or $text1 == "/unwarn"){
  $gett = bot('getChatMember', [
'chat_id' => $chat_id,
'user_id' => $fadmin,
]);
$get = $gett->result->status;
if($get =="administrator" or $get == "creator"){
 $warn = 0;
 file_put_contents("warn/$chat_id&$id.dat","$warn");
 bot('sendChatAction',['chat_id'=>$chat_id,'action'=>"typing"]);
  bot('sendmessage',[
  'chat_id'=>$chat_id,
  'text'=>"⚠ <a href='tg://user?id=$id'>$from_user_first_name</a> dan barcha <b>ogohlantirishlar</b> olib tashlandi.\nEndi undagi ogohlantirishlar soni <b>$warn</b>/3.",
  'parse_mode'=>'html'
  ]);
} 
}
  
$replyik = $message->reply_to_message->text;
    $yubbi = "📨Yuboriladigan xabar matnini kiriting. Xabar turi markdown";

    if($text1 == "/sendu" and $chat_id == $admin){
      ty($chat_id);
      bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>$yubbi,
      ]);
      file_put_contents("stat/$chat_id.step","user");
    }

    if($step == "user" and $chat_id == $admin){
      if($text1 == "/otmen"){
      file_put_contents("stat/$chat_id.step","");
      }else{ 
      $idszs=explode("\n",$userlar);
      foreach($idszs as $idlat){
     $userr = bot('sendMessage',[
      'chat_id'=>$idlat,
      'text'=>$text1,
      'parse_mode'=>'markdown',
      'disable_web_page_preview' => true,
      ]);
      }
        if($userr){
          bot('sendmessage',[
          'chat_id'=>$admin,
          'text'=>"Userlarga yuborildi!",
          ]);      
      file_put_contents("stat/$chat_id.step","");
        }
      }
    }
      
       if($text1 == "/sendg" and $chat_id == $admin){
      ty($chat_id);
      bot('sendMessage',[
      'chat_id'=>$chat_id,
      'text'=>$yubbi,
      ]);
      file_put_contents("stat/$chat_id.step","guruh");
    }

    if($step == "guruh" and $chat_id == $admin){
      if($text1 == "/otmen"){
      file_put_contents("stat/$chat_id.step","");
      }else{ 
      $idszs=explode("\n",$guruhlar);
      foreach($idszs as $idlat){
    $guruu =  bot('sendMessage',[
      'chat_id'=>$idlat,
      'text'=>$text1,
      'parse_mode'=>'markdown',
      'disable_web_page_preview' => true,
      ]);
      }
        if($guruu){
          bot('sendmessage',[
          'chat_id'=>$admin,
          'text'=>"Guruhlarga yuborildi!",
          ]);      
      file_put_contents("stat/$chat_id.step","");
        }
      }
    }

$iniffo = description;
           $obh = file_get_contents('https://fa.weather.town/uz/forecast/uzbekistan/bukhara-province/wobkent/');
$ex = explode('title="Havo harorati"',$obh);
$exi = explode('right-container',$ex[1]);
$ubk = str_replace($exi[1],' ',$ex[1]);
$ubk1 = str_replace('dir="ltr">',' ',$ubk);
$ubk2 = str_replace('<div class="informer-main-page__container fleft right-container',' ',$ubk1);
$ubk3 = str_replace('&deg;C</div>',' ',$ubk2);
$ubk4 = str_replace('</div>',' ',$ubk3);
$obhavo = trim("$ubk4");
      $kun3 = date('N'); 
      $yil =date('Y');
      $mast ="@Lazik0"; 
      $kun =date('d', strtotime('0 hour')); 
      $soat=date('H:i', strtotime('2 hour'));
      $soats =date('H:i', strtotime('0 hour'));     
      $hafta="1Dushanba1 2Seshanba2 3Chorshanba3 4Payshanba4 5Juma5 6Shanba6 7Yakshanba7"; 
      $ex=explode("$kun3",$hafta); 
      $hafta1="$ex[1]";
      $oy = date('F', strtotime('0 hour'));
$us = bot('getChatMembersCount',[
'chat_id'=>$chat_id,
]);
$count = $us->result;

if((stripos($mtext,"havo harorati") !== false) or	
	(stripos($mtext,"havoharorati") !== false)){	
  $text = "🇺🇿🔥Hozir havo harorati: $obhavo °C";
  $a=json_encode(bot('sendmessage',[
   'reply_to_message_id'=>$mesid,
   'chat_id'=>$chat_id,
   'text'=>$text,
   'parse_mode' => 'markdown'
  ]));
}
   $iniffo = "🙂 $ctitle Guruhimizga xush kelibsiz!
😊Kuningiz xayrli va barokatli o'tsin!
🗓Bugun: $kun-iyul 2020-yil $hafta1
⌚️Soat: $soat 
⛅Havo harorati: $obhavo °C
👥Guruh a'zolari: $count ta
😎Bot @Nazoratchi_Sbot
 ";
   bot('setChatDescription',[
    'chat_id'=>$cid,
    'description'=>$iniffo,
  ]);

?>