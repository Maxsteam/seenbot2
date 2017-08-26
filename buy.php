<?php
include("bot.php");
$update = json_decode(file_get_contents('php://input'));

$userid = $update->CustomField;
$title = $update->Title;
$code = $update->Code;
$name = $update->Name;
$amount = $update->Amount;

SendMessage("987654123","شما یک پرداخت جدید با مبلغ $amount داشتید .
فیلد اختیاری :‌ $userid");

if ($title == "buy100") {
          $fle = file_get_contents("data/$userid/shoklat.txt");
               $getshe = $fle + 100;
                file_put_contents("data/$userid/shoklat.txt", $getshe);
	SendMessage($userid,"کاربر شکلاتی🍬
خرید شما با موفقیت انجام شد❤️
تعداد 100 شکلات به حساب شما واریز شد😊
ممنون از خرید شما🤚");
}
elseif ($title == "buy250") {
          $fle = file_get_contents("data/$userid/shoklat.txt");
               $getshe = $fle + 250;
                file_put_contents("data/$userid/shoklat.txt", $getshe);
	SendMessage($userid,"کاربر شکلاتی🍬
خرید شما با موفقیت انجام شد❤️
تعداد 250 شکلات به حساب شما واریز شد😊
ممنون از خرید شما🤚");
}
elseif ($title == "buy500") {
          $fle = file_get_contents("data/$userid/shoklat.txt");
               $getshe = $fle + 500;
                file_put_contents("data/$userid/shoklat.txt", $getshe);
	SendMessage($userid,"کاربر شکلاتی🍬
خرید شما با موفقیت انجام شد❤️
تعداد 500 شکلات به حساب شما واریز شد😊
ممنون از خرید شما🤚");
}
 elseif ($title == "buy700") {
          $fle = file_get_contents("data/$userid/shoklat.txt");
               $getshe = $fle + 700;
                file_put_contents("data/$userid/shoklat.txt", $getshe);
	SendMessage($userid,"کاربر شکلاتی🍬
خرید شما با موفقیت انجام شد❤️
تعداد 700 شکلات به حساب شما واریز شد😊
ممنون از خرید شما🤚");
}
?>
