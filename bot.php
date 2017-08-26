<?php

set_time_limit(0);

ob_start();

include("jdf.php");

$API_KEY = 'توکن';
##------------------------------##
define('API_KEY', $API_KEY);
function bot($method, $datas = [])
{
    $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
    $res = curl_exec($ch);
    if (curl_error($ch)) {
        var_dump(curl_error($ch));
    } else {
        return json_decode($res);
    }
}

function sendmessage($chat_id, $text)
{
    bot('sendMessage', [
        'chat_id' => $chat_id,
        'text' => $text,
        'parse_mode' => "MarkDown"
    ]);
}

function deletemessage($chat_id, $message_id)
{
    bot('deletemessage', [
        'chat_id' => $chat_id,
        'message_id' => $message_id,
    ]);
}

function sendaction($chat_id, $action)
{
    bot('sendchataction', [
        'chat_id' => $chat_id,
        'action' => $action
    ]);
}

function Forward($KojaShe, $AzKoja, $KodomMSG)
{
    bot('ForwardMessage', [
        'chat_id' => $KojaShe,
        'from_chat_id' => $AzKoja,
        'message_id' => $KodomMSG
    ]);
}

function sendphoto($chat_id, $photo, $action)
{
    bot('sendphoto', [
        'chat_id' => $chat_id,
        'photo' => $photo,
        'action' => $action
    ]);
}

function objectToArrays($object)
{
    if (!is_object($object) && !is_array($object)) {
        return $object;
    }
    if (is_object($object)) {
        $object = get_object_vars($object);
    }
    return array_map("objectToArrays", $object);
}


//====================ᵗᶦᵏᵃᵖᵖ======================//
$update = json_decode(file_get_contents('php://input'));
$message = $update->message;
$channel_post = $update->message->channel_post;
$code = file_get_contents("data/code.txt");
$code2 = file_get_contents("data/code2.txt");
$chid = $update->channel_post->message->message_id;
$chat_id = $message->chat->id;
$message_id = $message->message_id;
$from_id = $message->from->id;
$c_id = $message->forward_from_chat->id;
$forward_id = $update->message->forward_from->id;
$forward_chat = $update->message->forward_from_chat;
$forward_chat_username = $update->message->forward_from_chat->username;
$forward_chat_msg_id = $update->message->forward_from_message_id;
@$shoklt = file_get_contents("data/$chat_id/shoklat.txt");
@$penlist = file_get_contents("data/pen.txt");
$text = $message->text;
@mkdir("data/$chat_id");
@$ali = file_get_contents("data/$chat_id/ali.txt");
@$list = file_get_contents("users.txt");
$ADMIN = 123456987;
$channel = file_get_contents("data/channel.txt");
$channe2l = file_get_contents("data/channel2.txt");
$chatid = $update->callback_query->message->chat->id;
$data = $update->callback_query->data;
$message_id2 = $update->callback_query->message->message_id;
$fromm_id = $update->inline_query->from->id;
$fromm_user = $update->inline_query->from->username;
$inline_query = $update->inline_query;
$query_id = $inline_query->id;
$fatime = jdate("h:i:s");
$fadate = jdate("Y F d");
//====================ᵗᶦᵏᵃᵖᵖ======================//
$ptn = json_encode([
    'inline_keyboard' => [
        [
            ['text' => "1⃣", 'callback_data' => "c1"], ['text' => "2⃣", 'callback_data' => "c2"], ['text' => "3⃣", 'callback_data' => "c3"]
        ],
        [
            ['text' => "4⃣", 'callback_data' => "c4"], ['text' => "5⃣", 'callback_data' => "c5"], ['text' => "6⃣", 'callback_data' => "c6"]
        ],
        [
            ['text' => "7⃣", 'callback_data' => "c7"], ['text' => "8⃣", 'callback_data' => "c8"], ['text' => "9⃣", 'callback_data' => "c9"]
        ],
        [
            ['text' => "چک کن😊", 'callback_data' => "chk"], ['text' => "0⃣", 'callback_data' => "c0"]
        ],
        [
            ['text' => "ولش بریم منوی اصلی", 'callback_data' => "home"]
        ],
    ]
]);
////_________
if ($text == "/start") {

        $user = file_get_contents('users.txt');
        $members = explode("\n", $user);
        if (!in_array($from_id, $members)) {
            $add_user = file_get_contents('users.txt');
            $add_user .= $from_id . "\n";
            file_put_contents("data/$chat_id/membrs.txt", "0");
            file_put_contents("data/$chat_id/shoklat.txt", "10");
            file_put_contents('users.txt', $add_user);
        }
        file_put_contents("data/$chat_id/ali.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "به ربات nca(بازدیدگیرشکلاتی) خوش امدید❤️
            
سین و ویو رو به آسونی با من دریافت کنید😁

همین الان شروع کنید🤝👇",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "جمع اوری شکلات🙃", 'callback_data' => "a"]
                    ],
                    [
                        ['text' => "زیرمجموعه گیری👥", 'callback_data' => "b"], ['text' => "ناحیه کاربری شما🙃", 'callback_data' => "c"]
                    ],
                    [
                        ['text' => "ثبت تبلیغ🤓", 'callback_data' => "e"], ['text' => "جابجایی 🔃شکلات🍬", 'callback_data' => "d"]
                    ],
                    [
                        ['text' => "سوپر مارکت🎰", 'callback_data' => "f"], ['text' => "راهنما شکلاتی ها", 'callback_data' => "g"]
                    ],
                    [
                        ['text' => "پیگیری سفارشات🤓", 'callback_data' => "h"], ['text' => "کد شکلاتی😋", 'callback_data' => "k"]
                    ],
                    [
                        ['text' => "شکلات روزانه🍬", 'callback_data' => "j"]
                    ],
                    
                ]
            ])
        ]);
    } elseif (strpos($penlist, "$from_id")) {
        SendMessage($chat_id, "هی کاربر عزیز شما از سرور ما بلاک شدید  دیگه پیام ندید با تشکر");
    } elseif (strpos($text, '/start') !== false && $forward_chat_username == null) {
        $newid = str_replace("/start ", "", $text);
        if ($from_id == $newid) {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "چجور خودت میخوای با لینک خودت عضو رباتت بشی انوقت سکه هم میخوای",
            ]);
        } elseif (strpos($list, "$from_id") !== false) {
            SendMessage($chat_id, "شما قبلا در این ربات عضو شدی و نمیتونی با لینک عضویت دوستت عضو ربات بشی😑");
        } else {
            sendAction($chat_id, 'typing');
            @$sho = file_get_contents("data/$newid/shoklat.txt");
            $getsho = $sho + 10;
            file_put_contents("data/$newid/shoklat.txt", $getsho);
            @$sea = file_get_contents("data/$newid/membrs.txt");
            $getsea = $sea + 1;
            file_put_contents("data/$newid/membrs.txt", $getsea);
            $user = file_get_contents('users.txt');
            $members = explode("\n", $user);
            if (!in_array($from_id, $members)) {
                $add_user = file_get_contents('users.txt');
                $add_user .= $from_id . "\n";
                file_put_contents("data/$chat_id/membrs.txt", "0");
                file_put_contents("data/$chat_id/shoklat.txt", "10");
                file_put_contents('users.txt', $add_user);
            }
            file_put_contents("data/$chat_id/ali.txt", "No");
            sendmessage($chat_id, "تبریک شما با دعوت کاربر $newid عضو ربات ما شدید❤️");
            bot('sendmessage', [
                'chat_id' => $chat_id,
                'text' => "  به ربات nca(بازدیدگیرشکلاتی) خوش امدید❤️

سین و ویو رو به آسونی با من دریافت کنید😁

همین الان شروع کنید🤝👇",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "جمع اوری شکلات🙃", 'callback_data' => "a"]
                        ],
                        [
                            ['text' => "زیرمجموعه گیری👥", 'callback_data' => "b"], ['text' => "ناحیه کاربری شما🙃", 'callback_data' => "c"]
                        ],
                        [
                            ['text' => "ثبت تبلیغ🤓", 'callback_data' => "e"], ['text' => "جابجایی 🔃شکلات🍬", 'callback_data' => "d"]
                        ],
                        [
                            ['text' => "سوپر مارکت🎰", 'callback_data' => "f"], ['text' => "راهنما شکلاتی ها", 'callback_data' => "g"]
                        ],
                        [
                            ['text' => "پیگیری سفارشات🤓", 'callback_data' => "h"], ['text' => "کد شکلاتی😋", 'callback_data' => "k"]
                        ],
                        [
                            ['text' => "شکلات روزانه🍬", 'callback_data' => "j"]
                        ],
                    ]
                ])
            ]);
            SendMessage($newid, "تبریک یکی با لینک عضویت شما عوض ربات شد😊

و شما 10تا شکلات گیرتومن امد😱");
        }
    }
    elseif ($data == "home") {
    unlink("cod/$chatid.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "no");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "
به منوی اصلی برگشتید🙂
سین و ویو رو به آسونی با من دریافت کنید😁
همین الان شروع کنید🤝👇

",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "جمع اوری شکلات🙃", 'callback_data' => "a"]
                    ],
                    [
                        ['text' => "زیرمجموعه گیری👥", 'callback_data' => "b"], ['text' => "ناحیه کاربری شما🙃", 'callback_data' => "c"]
                    ],
                    [
                        ['text' => "ثبت تبلیغ🤓", 'callback_data' => "e"], ['text' => "جابجایی 🔃شکلات🍬", 'callback_data' => "d"]
                    ],
                    [
                        ['text' => "سوپر مارکت🎰", 'callback_data' => "f"], ['text' => "راهنما شکلاتی ها", 'callback_data' => "g"]
                    ],
                    [
                        ['text' => "پیگیری سفارشات🤓", 'callback_data' => "h"], ['text' => "کد شکلاتی😋", 'callback_data' => "k"]
                    ],
                    [
                        ['text' => "شکلات روزانه🍬", 'callback_data' => "j"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "a") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "یه لحظه صبر کن",
            'show_alert' => false
        ]);
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "به بخش  دریافت شکلات🍬 رایگان خوش آمدید.🤤

شما می توانید با شیوه نوین جدید  تبلیغات و پست های دیگران را در کانال مشاهده نموده و در ازای مشاهده هر تبلیغ ، برای خود شکلات به دست آورید. شما می توانید با شکلات های به دست آمده، برای خود و یا دوستان خود تبلیغ سفارش دهید❤️",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم کانال😊", 'url' => "https://t.me/joinchat/AAAAAENPEuRLFWoo4tlA2g"]
                    ],
                    [
                        ['text' => "ولش برگردیم صفحه اصلی😑", 'callback_data' => "home"]
                    ]
                ]
            ])
        ]);
    } elseif ($data == "k") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "کد شکلاتی مورد نظر خودتون را وارد کنید🙈
لطفا با صفحه کلیدی که توسط من نمایان شد این کد را وارد کنید😊",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c1") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "1");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "کد وارد شده شما :
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c2") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "2");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "کد وارد شده شما :
$cod
",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c3") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "3");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "کد وارد شده شما :
$cod
",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c4") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "4");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "کد وارد شده شما :
$cod
",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c5") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "5");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "کد وارد شده شما :
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c6") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "6");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "کد وارد شده شما :
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c7") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "7");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "کد وارد شده شما :
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c8") {
        $fromm_id = $update->inline_query->from->id;
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "8");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "کد وارد شده شما :
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c9") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "9");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "کد وارد شده شما :
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "c0") {
        $myfile2 = fopen("cod/$chatid.txt", "a") or die("Unable to open file!");
        fwrite($myfile2, "0");
        fclose($myfile2);
        $cod = file_get_contents("cod/$chatid.txt");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "کد وارد شده شما :
$cod",
            'reply_markup' => $ptn
        ]);
    } elseif ($data == "chk") {
        $fromm_id = $update->inline_query->from->id;
        $cod = file_get_contents("cod/$chatid.txt");
        $code2 = file_get_contents("data/code2.txt");
        if ($cod == $code && $cod != null) {
            @$sho = file_get_contents("data/$chatid/shoklat.txt");
            $getsho = $sho + $code2;
            file_put_contents("data/$chatid/shoklat.txt", $getsho);
            unlink("cod/$chatid.txt");
            file_put_contents("data/code.txt", "");
            file_put_contents("data/code2.txt", "");
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "تبریک کد شما درست بود و شما برنده شکلات رایگان شدید 
        اونم $code2 شکلات🍬    ",
                'show_alert' => true
            ]);
            bot('sendMessage', [
                'chat_id' => $channel2,
                'text' => "کد شکلاتی $code غیر فعال شد😕
 
 توسط :👇
🆔 ایدی فرد : $chatid
 
⏰ساعت : $fatime

  ",

            ]);
            file_put_contents("data/$chatid/ali.txt", "no");
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "
به منوی اصلی برگشتید🙂

سین و ویو رو به آسونی با من دریافت کنید😁

همین الان شروع کنید🤝👇

",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "جمع اوری شکلات🙃", 'callback_data' => "a"]
                        ],
                        [
                            ['text' => "زیرمجموعه گیری👥", 'callback_data' => "b"], ['text' => "ناحیه کاربری شما🙃", 'callback_data' => "c"]
                        ],
                        [
                            ['text' => "ثبت تبلیغ🤓", 'callback_data' => "e"], ['text' => "جابجایی 🔃شکلات🍬", 'callback_data' => "d"]
                        ],
                        [
                            ['text' => "سوپر مارکت🎰", 'callback_data' => "f"], ['text' => "راهنما شکلاتی ها", 'callback_data' => "g"]
                        ],
                        [
                            ['text' => "پیگیری سفارشات🤓", 'callback_data' => "h"], ['text' => "کد شکلاتی😋", 'callback_data' => "k"]
                        ],
                        [
                            ['text' => "شکلات روزانه🍬", 'callback_data' => "j"]
                        ],
                    ]
                ])
            ]);
        } else {
            unlink("cod/$chatid.txt");
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "        اخ اخ اخ یکی زودتر از شما کدتو استفاده کرده یا کد وارد کرده شما اشتباه هست خوب اشکال نداره دفعه بعد",
                'show_alert' => true
            ]);
            file_put_contents("data/$chatid/ali.txt", "no");
            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "
به منوی اصلی برگشتید🙂

سین و ویو رو به آسونی با من دریافت کنید😁

همین الان شروع کنید🤝👇

",
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "جمع اوری شکلات🙃", 'callback_data' => "a"]
                        ],
                        [
                            ['text' => "زیرمجموعه گیری👥", 'callback_data' => "b"], ['text' => "ناحیه کاربری شما🙃", 'callback_data' => "c"]
                        ],
                        [
                            ['text' => "ثبت تبلیغ🤓", 'callback_data' => "e"], ['text' => "جابجایی 🔃شکلات🍬", 'callback_data' => "d"]
                        ],
                        [
                            ['text' => "سوپر مارکت🎰", 'callback_data' => "f"], ['text' => "راهنما شکلاتی ها", 'callback_data' => "g"]
                        ],
                        [
                            ['text' => "پیگیری سفارشات🤓", 'callback_data' => "h"], ['text' => "کد شکلاتی😋", 'callback_data' => "k"]
                        ],
                        [
                            ['text' => "شکلات روزانه🍬", 'callback_data' => "j"]
                        ],
                    ]
                ])
            ]);
        }
    } elseif ($data == "b") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "ربات nca هم اکنون در تلگرام منتشر شد😱😨

آیا خسته شده اید که مطالب شما در کانال بازدید نمیخورد 😢😕

آیا مردم پی میبرند که کانال شما فیک است؟😔😢

آیا دوست دارید بازدید مطالب کانال شما افزایش یابد؟😁😱

آیا آماده برنده شدن در چالش ها هستید؟😋❤️


فقط کافیست در ربات nca عضو شوید
و شکلات جمع کنید و برای مطالب کانال خود بازدید جمع آوری کنید🙃

http://telegram.me/tabshiiivbot?start=$chatid",
        ]);
        bot('sendmessage', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "سلام کاربر عزیز به بخش زیر مجموعه گیری خوش امدید❤️

شما با معرفی دوستان خود به ربات 
10 سکه  بصورت رایگان دریافت کنید😮

کاری هم نداره پیام بالارو را بفرست به دوستات😝👌👇👇",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی❤️", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "j") {
        date_default_timezone_set('Asia/Tehran');
        $date = date('Ymd');
        @$gettime = file_get_contents("data/$chatid/dates.txt");
        if ($gettime == $date) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "عمویی متاسفانه شما امروز شکلاتتو گرفتی😑
        به امید خدا دیگه فردا بهت شکلات میدم🍬",
                'show_alert' => true
            ]);
        } else {
            file_put_contents("data/$chatid/dates.txt", $date);
            @$sho = file_get_contents("data/$chatid/shoklat.txt");
            $ran = rand(10, 30);
            $getsho = $sho + $ran;
            file_put_contents("data/$chatid/shoklat.txt", $getsho);
            $sho2 = file_get_contents("data/$chatid/shoklat.txt");
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "ایول 😱
          شکلات روزانه اتو گرفتی😊
         اونم $ran شکلات😨",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "f") {
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "📟سوپر مارکت شکلاتی ها🤤

⁉️نکته حتما در قسمت توضیحات ایدی عددی خودتون را وارد کنید😊

⚪️ایدی عددی شما : $chatid",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "یه جعبه 100تایی شکلات🍬 | 400تومن", 'url' => "http://tarfand.pro"]
                    ],
                    [
                        ['text' => "یه جعبه 250تایی شکلات🍬 | 700تومن", 'url' => "http://tarfand.pro"]
                    ],
                    [
                        ['text' => "یه جعبه 500تایی شکلات🍬 | 1000تومن", 'url' => "http://tarfand.pro"]
                    ],
                        [
                        ['text' => "یه جعبه 700تایی شکلات🍬 | 1500تومن", 'url' => "http://tarfand.pro"]
                    ],
                    [
                        ['text' => "برگشت به منوی اصلی ", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "c") {
        @$sho = file_get_contents("data/$chatid/shoklat.txt");
        @$sea = file_get_contents("data/$chatid/membrs.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "
        
        ایدی عددی شما : $chatid
        شکلات های شما : $sho
        زیرمجموعه شما : $sea",
            'show_alert' => true
        ]);
    } elseif ($data == "g") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "وقتتون بخیر 

ربات nca رباتی که شما با استفاده از اون میتونید برای پست ها و چالش ها کانال ها ویو یا همون سین جمع کنید😊

کار باهاش هم راحته شکلات جمع میکنی و شکلات هاتو به سین (ویو) تبدیل میکنید 
",
            'show_alert' => true
        ]);
    } elseif ($data == "d") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "for");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب ابتدا پیام کاربری که میخواهید برایشان شکلات انتقال بدید را برام فروراد کنید❤️🍬",
        ]);
    } elseif ($ali == "for") {
        if ($from_id == $forward_id) {
            SendMessage($chat_id, "شرمنده پیام خودتون را برام فروارد نکنید☹️️");
        } else {
            if (strpos($list, "$forward_id") !== false) {
                file_put_contents("data/$chat_id/ali.txt", "fore");
                file_put_contents("data/$chat_id/for.txt", $forward_id);
                bot('sendMessage', [
                    'chat_id' => $chat_id,
                    'text' => "خوب چه مقدار شکلات میخواهید برای کاربر $forward_id انتقال بدید😊 ",
                    'reply_markup' => json_encode([
                        'inline_keyboard' => [
                            [
                                ['text' => "ولش بریم منوی اصلی🙃", 'callback_data' => "home"]
                            ],
                        ]
                    ])
                ]);
            } else {
                SendMessage($chat_id, "شرمنده این کاربر در ربات ما عضو نمیباشد☹️");
            }
        }
    } elseif ($ali == "fore") {
        if (preg_match('/^([0-9])/', $text)) {
            if ($shoklt > $text) {
                $fr = file_get_contents("data/$chat_id/for.txt");
                $fle = file_get_contents("data/$fr/shoklat.txt");
                $fl = file_get_contents("data/$chat_id/shoklat.txt");
                $s = $text;
                $getsh = $fl - $s;
                file_put_contents("data/$chat_id/shoklat.txt", $getsh);
                SendMessage($chat_id, "شکلات های شما با موفقیت به کاربر مورد نظر شما انتقال داده شدند");
                $getshe = $fle + $s;
                file_put_contents("data/$fr/shoklat.txt", $getshe);
                SendMessage($fr, "تبریک کاربر $chat_id برای شما $text شکلات انتقال داد🍬🙃");
            } else {
                SendMessage($chat_id, "شرمنده شکلات های شما این مقدار نمیباشند و یا 1 شکلات برای شما باقی نمانده . و باید حتما 1 شکلات برای شما باقی بمانه");
            }
        } else {
            SendMessage($chat_id, "خوب کاربر عزیز یه عدد فقط بصورت لاتین بفرستید 😶");
        }
    } elseif ($data == "e") {
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب کاربر گرامی پست شما چقدر ویو بخوره 🙃
          هر ویو برابر یک شکلات میباشد",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "20 ویو👁", 'callback_data' => "seen20"]
                    ],
                    [
                        ['text' => "45 ویو 👁", 'callback_data' => "seen45"]
                    ],
                    [
                        ['text' => " 80 ویو👁", 'callback_data' => "seen80"]
                    ],
                    [
                        ['text' => "130 ویو👁", 'callback_data' => "seen130"]

                    ],
                    [
                        ['text' => "240 ویو👁 ", 'callback_data' => "seen240"]
                    ],
                    [
                        ['text' => "300ویو👁", 'callback_data' => "seen300"]
                    ],
                    [
                        ['text' => "برگشت به منوی اصلی ", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    }
        elseif ($data == "seen20") {
        file_put_contents("data/$chatid/ted.txt", "20");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "کمی صبر کنید",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "خوب تبلیغ خودتون را از یک کانال عمومی فروارد کنید",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "شرمنده شکلات های شما با این تعداد ویو برابری نمیکنه😬",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen45") {
        file_put_contents("data/$chatid/ted.txt", "45");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "کمی صبر کنید",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "خوب تبلیغ خودتون را از یک کانال عمومی فروارد کنید",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "شرمنده شکلات های شما با این تعداد ویو برابری نمیکنه😬",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen80") {
        file_put_contents("data/$chatid/ted.txt", "80");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "کمی صبر کنید",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "خوب تبلیغ خودتون را از یک کانال عمومی فروارد کنید",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "شرمنده شکلات های شما با این تعداد ویو برابری نمیکنه😬",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen130") {
        file_put_contents("data/$chatid/ted.txt", "130");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "کمی صبر کنید",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "خوب تبلیغ خودتون را از یک کانال عمومی فروارد کنید",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "شرمنده شکلات های شما با این تعداد ویو برابری نمیکنه😬",
                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen240") {
        file_put_contents("data/$chatid/ted.txt", "240");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt > $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "کمی صبر کنید",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "خوب تبلیغ خودتون را از یک کانال عمومی فروارد کنید",
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "شرمنده شکلات های شما با این تعداد ویو برابری نمیکنه😬 ",

                'show_alert' => true
            ]);
        }
    } elseif ($data == "seen300") {
        file_put_contents("data/$chatid/ted.txt", "300");
        $aaa = file_get_contents("data/$chatid/ted.txt");
        $shoklt = file_get_contents("data/$chatid/shoklat.txt");
        if ($shoklt < $aaa) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "شرمنده شکلات های شما با این تعداد ویو برابری نمیکنه😬",
                'show_alert' => true
            ]);
        } else {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "کمی صبر کنید",
                'show_alert' => false
            ]);
            file_put_contents("data/$chatid/ali.txt", "seen2");

            bot('editmessagetext', [
                'chat_id' => $chatid,
                'message_id' => $message_id2,
                'text' => "خوب تبلیغ خودتون را از یک کانال عمومی فروارد کنید",
            ]);
        }
    } elseif ($ali == "seen2") {
        if ($forward_chat_username != null) {
            $msg_id = bot('ForwardMessage', [
                'chat_id' => $channel,
                'from_chat_id' => "@$forward_chat_username",
                'message_id' => $forward_chat_msg_id
            ])->result->message_id;
            bot('sendMessage', [
                'chat_id' => $channel,
                'text' => "‌👆👆👆👇👇👇",
                'reply_to_message_id' => $msg_id,
                'parse_mode' => "MarkDown",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "دریافت شکلات🍬", 'callback_data' => "ok"]
                        ],
                    ]
                ])
            ]);

            @$al = file_get_contents("data/$chat_id/ted.txt");
            @$sho = file_get_contents("data/$chat_id/shoklat.txt");
            $getsho = $sho - $al;
            file_put_contents("data/$chat_id/shoklat.txt", $getsho);
            @$don = file_get_contents("data/done.txt");
            $getdon = $don + 1;
            file_put_contents("data/done.txt", $getdon);
            file_put_contents("ads/cont/$msg_id.txt", $al);
            file_put_contents("ads/date/$msg_id.txt", $fadate);
            file_put_contents("ads/time/$msg_id.txt", $fatime);
            file_put_contents("ads/admin/$msg_id.txt", $chat_id);
            file_put_contents("ads/seen/$msg_id.txt", "0");
            file_put_contents("ads/user/$msg_id.txt", "");
            file_put_contents("data/$chat_id/ali.txt", "no");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "خوب کاربر گرامی تبلیغ ‌شما با موفقیت در کانال ما ثبت شد😊

✔️مشخصات تبلیغ شما:
  🗓کد پیگیری : $msg_id
  👁‍🗨تعداد بازدید : $al
  ⏰ساعت درخواست بازدید :$fatime 
 📅تاریخ  : $fadate
 📎پست شما در کانال ما :
  http://telegram.me/$channel/$msg_id
✂️تعداد شکلات های کم شده : $al",
            ]);
        } else {
            sendmessage($chat_id, "بابا مثلا شکلات هاتو داری خرج میکنی 🍬
   از یه کانال عمومی پیام فراورد کن🙂");
        }
    }
    if ($data == "ok") {
        $message_id12 = $update->callback_query->message->reply_to_message->message_id;
        $fromm_id = $update->callback_query->from->id;
        @$ue = file_get_contents("ads/user/$message_id12.txt");
        @$se = file_get_contents("ads/seen/$message_id12.txt");
        if (strpos($ue, "$fromm_id") !== false) {
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "شما قبلا از این پست بازدید کردید ولی بازم شکلات میخوای😶😤",
                'show_alert' => false
            ]);
        } else {
            $user = file_get_contents("ads/user/$message_id12.txt");
            $members = explode("\n", $user);
            if (!in_array($fromm_id, $members)) {
                $add_user = file_get_contents("ads/user/$message_id12.txt");
                $add_user .= $fromm_id . "\n";
                file_put_contents("ads/user/$message_id12.txt", $add_user);
            }
            $getse = $se + 1;
            file_put_contents("ads/seen/$message_id12.txt", $getse);
            @$sho = file_get_contents("data/$fromm_id/shoklat.txt");
            $getsho = $sho + 1;
            file_put_contents("data/$fromm_id/shoklat.txt", $getsho);
            bot('answercallbackquery', [
                'callback_query_id' => $update->callback_query->id,
                'text' => "بیا یه شکلات بهت دادم عمویی🍬",
                'show_alert' => false
            ]);
        }
        $end = file_get_contents("ads/seen/$message_id12.txt");
        $ad = file_get_contents("ads/admin/$message_id12.txt");
        $co = file_get_contents("ads/cont/$message_id12.txt");
        $te = file_get_contents("ads/time/$message_id12.txt");
        $de = file_get_contents("ads/date/$message_id12.txt");
        if ($end == $co) {
            file_put_contents("data/$chat_id/ali.txt", "no");
            bot('sendMessage', [
                'chat_id' => $ad,
                'text' => "سفارش بازدید شما با کد پیگیری  **$message_id12**به پایان رسید😋

👁‍🗨تعداد بازدید درخواستی شما: $co
⏰ساعت درخواست بازدید: $te
📅تاریخ درخواست بازدید: $de
🕰ساعت اتمام درخواست بازدید: $fatime

موفق و سربلند باشید♥️",
                'parse_mode' => "MarkDown"
            ]);
            @$don = file_get_contents("data/done.txt");
            $getdon = $don - 1;
            file_put_contents("data/done.txt", $getdon);
            @$enn = file_get_contents("data/enf.txt");
            $getenf = $enn + 1;
            file_put_contents("data/enf.txt", $getenf);
            $de = $message_id12 + 1;
            deletemessage($channel, $message_id12);
            deletemessage($channel, $de);
            unlink("ads/seen/$message_id12.txt");
            unlink("ads/admin/$message_id12.txt");
            unlink("ads/cont/$message_id12.txt");
            unlink("ads/time/$message_id12.txt");
            unlink("ads/user/$message_id12.txt");
            unlink("ads/date/$message_id12.txt");
        }
    } elseif ($data == "h") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "mlm");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "کد پیگیری خودتون را برام بفرستید",
        ]);
    } elseif ($ali == "mlm") {
        file_put_contents("data/$chat_id/ali.txt", "");
        if (file_exists("ads/admin/$text.txt")) {
            $ge = file_get_contents("ads/seen/$text.txt");
            $ad = file_get_contents("ads/admin/$text.txt");
            $co = file_get_contents("ads/cont/$text.txt");
            $te = file_get_contents("ads/time/$text.txt");
            $de = file_get_contents("ads/date/$text.txt");
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "مشخصات کد پیگیری  $text  بصورت زیر میباشد
👁‍🗨تعداد بازدید درخواستی شما: $co
⏰ساعت درخواست بازدید: $te
📅تاریخ درخواست بازدید: $de
👁تعداد بازدید در یافتی تا الان : $ge
🕰ساعت درخواست پیگیری: $fatime

موفق و سربلند باشید❤ ",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                        ],
                    ]
                ])
            ]);
        } else {
            bot('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "کد پیگیری شما اشتباه میباشد یا سفارش شما به پایان رسیده هست😬
موفق و سربلند باشید❤ ",
                'reply_markup' => json_encode([
                    'inline_keyboard' => [
                        [
                            ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                        ],
                    ]
                ])
            ]);
        }
    }

////----
if ($chatid == $ADMIN or $chat_id == $ADMIN) {
    if ($text == "مدیریت") {
        file_put_contents("data/$chat_id/ali.txt", "no");
        sendAction($chat_id, 'typing');
        bot('sendmessage', [
            'chat_id' => $chat_id,
            'text' => "مدیر گرامی به پنل مدیریت ربات ‌شکلاتی خوش امدید🙂",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "آمار کلی و وضعیت ربات😊", 'callback_data' => "am"]
                    ],
                    [
                        ['text' => "ارسال پیام به همه کاربران🙂", 'callback_data' => "send"], ['text' => "فروارد همگانی🤓", 'callback_data' => "fwd"]
                    ],
                    [
                        ['text' => "بلاک کردن کاربر🤓", 'callback_data' => "pen"], ['text' => "انبلاک کاربر☹️", 'callback_data' => "unpen"]
                    ],
                    [
                        ['text' => "ساخت کد شکلاتی🍬", 'callback_data' => "crl"],['text' => "تنظیم چنل تبلیغات", 'callback_data' => "setc"]
                    ],
                       [
                        ['text' => "شکلات به کاربر", 'callback_data' => "buy"],['text' => "تنظیم چنل کد شکلاتی", 'callback_data' => "setc2"]
                    ]
                ]
            ])
        ]);
    } elseif ($data == "am") {
        $user = file_get_contents("users.txt");
        $member_id = explode("\n", $user);
        $member_count = count($member_id) - 1;
        @$don = file_get_contents("data/done.txt");
        @$enf = file_get_contents("data/enf.txt");
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "تعداد ممبر ها : $member_count
تعداد تبلیغات در حال انجام: $don
تعداد تبلیغات انجام شده: $enf",

            'show_alert' => true
        ]);
    } elseif ($data == "send") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "send");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب پیام خودتون را برام بفرستید تا بفرستم برا  کاربرا  . بدو وقت ندارم😑",
        ]);
    } elseif ($ali == "send") {
        file_put_contents("data/$chat_id/ali.txt", "no");
        $fp = fopen("users.txt", 'r');
        while (!feof($fp)) {
            $ckar = fgets($fp);
            sendmessage($ckar, $text);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "با موفقیت برای همه کاربران ارسال شد",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "fwd") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "fwd");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب پیام خودتون را فروارد کنید فقط زود که حوصله ندارم😤",
        ]);
    } elseif ($ali == 'fwd') {
        file_put_contents("data/$chat_id/ali.txt", "no");
        $forp = fopen("users.txt", 'r');
        while (!feof($forp)) {
            $fakar = fgets($forp);
            Forward($fakar, $chat_id, $message_id);
        }
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "با موفقیت فروارد شد.",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "pen") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "pen");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "فقط ایدی عددیشو بفرست تا بلاک بشه از ربات😡",
        ]);
    } elseif ($ali == 'pen') {
        $myfile2 = fopen("data/pen.txt", 'a') or die("Unable to open file!");
        fwrite($myfile2, "$text\n");
        fclose($myfile2);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => " با موفقیت بلاکش کردم😤
 ایدیش هم 
 $text ",
            'parse_mode' => "MarkDown",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } elseif ($data == "unpen") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "unpen");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب ی بخشیدی حالا . ایدی عددیشو بدع تا انبلاکش کنم😕",
        ]);
    } elseif ($ali == 'unpen') {
        $newlist = str_replace($text, "", $penlist);
        file_put_contents("data/pen.txt", $newlist);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "حله انبلاک کردمش
 ایدیش هم 
 $text ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } 
    elseif ($data == "setc") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "setc");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب یوزر نیم چنل را بفرست    همراه با @ بفرستید  ",
        ]);
    } elseif ($ali == 'setc') {
        file_put_contents("data/channel.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "حله چنل تبلیغات این شد
 
 $text ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } 
     elseif ($data == "setc2") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "setc2");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب یوزر نیم چنل را بفرست    همراه با @ بفرستید  ",
        ]);
    } elseif ($ali == 'setc2') {
        file_put_contents("data/channel2.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "No");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "حله چنل کد شکلاتی این شد
 
 $text ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    } 
    elseif ($data == "crl") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "crl");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب یه عدد بگو عجیجم❤️",
        ]);
    } elseif ($ali == 'crl') {
        file_put_contents("data/code.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "crl2");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خوب تعداد شکلات ها چقدر باشه",
            'parse_mode' => "MarkDown"
        ]);
    } elseif ($ali == 'crl2') {
        $code = file_get_contents("data/code.txt");
        $code2 = file_get_contents("data/code2.txt");
        file_put_contents("data/code2.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "حله کد شما ساخته شد  ",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
               $code = file_get_contents("data/code.txt");
        $code2 = file_get_contents("data/code2.txt");
        bot('sendMessage', [
            'chat_id' => $channel2,
            'text' => " یک کد شکلات ساخته شد😶 

⚫️کد شکلاتی : $code 
🔴تعداد شکلات ها : $code2
⚪️ساعت ساخت : $fatime

فقط یه نفر میتونه استفاده کنه😶 ",
            ]);
        
        
        
        
        
    }
     elseif ($data == "buy") {
        bot('answercallbackquery', [
            'callback_query_id' => $update->callback_query->id,
            'text' => "کمی صبر کنید",
            'show_alert' => false
        ]);
        file_put_contents("data/$chatid/ali.txt", "buy");
        bot('editmessagetext', [
            'chat_id' => $chatid,
            'message_id' => $message_id2,
            'text' => "خوب ایدی عددی کاربر را بفرست️",
        ]);
    } elseif ($ali == 'buy') {
        file_put_contents("data/buy.txt", $text);
        file_put_contents("data/$chat_id/ali.txt", "buy2");
        bot('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "خوب تعداد شکلات ها چقدر باشه",
            'parse_mode' => "MarkDown"
        ]);
    } elseif ($ali == 'buy2') {
    $buy = file_get_contents("data/buy.txt");
          $fle = file_get_contents("data/$buy/shoklat.txt");
               $getshe = $fle + $text;
                file_put_contents("data/$buy/shoklat.txt", $getshe);
        file_put_contents("data/$chat_id/ali.txt", "");
        bot('sendMessage', [
            'chat_id' => $buy,
            'text' => "کاربر شکلاتی🍬
از طرف مدیریت ربات  تعداد $text شکلات به حساب شما واریز شد😊",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
        bot('sendMessage', [
                    'chat_id' => $chat_id,
            'text' => "با موفقیت فرستاده شد",
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['text' => "حله بریم منوی اصلی", 'callback_data' => "home"]
                    ],
                ]
            ])
        ]);
    }

}
?>
