<?php
// Q1 変数と文字列

$name = "菅原沙恵";
echo "私の名前は「" . $name . "」です。";



// Q2 四則演算

$num = 5 * 4;
echo $num . "\n";
echo $num / 2;



// Q3 日付操作

echo "現在時刻は、" . date("Y年m月d日 H時i分s秒") . "です。";



// Q4 条件分岐-1 if文

$device = "mac";

if ($device == "windows")
 {
    echo "使用OSは、windowsです。"
  ;
  }
else 
  {
    if ($device == "mac") 
      {
        echo "使用OSは、macです。";
      }
    else
      {
        echo "どちらでもありません。";
      }
    }



// Q5 条件分岐-2 三項演算子

$age = 25;
$message = ($age < 18) ? "未成年です。" : "成人です。";

echo $message;



// Q6 配列

$prefecture =
[
  "東京都" , "群馬県" , "茨城県" , "栃木県" ,
  "千葉県" , "埼玉県" , "神奈川県" , "山梨県"
];

echo $prefecture[3] . "と" . $prefecture[4] . "は関東地方の都道府県です。";



// Q7 連想配列-1

$prefecture = 
[
  "東京都" => "新宿区" , "神奈川県" => "横浜市" , "千葉県" => "千葉市" , "埼玉県" => "さいたま市" , 
  "栃木県" => "宇都宮市" , "群馬県" => "前橋市" , "茨城県" => "水戸市"
]; 

echo $prefecture["東京都"] . "\n";
echo $prefecture["神奈川県"] . "\n";
echo $prefecture["千葉県"] . "\n";
echo $prefecture["埼玉県"] . "\n";
echo $prefecture["栃木県"] . "\n";
echo $prefecture["群馬県"] . "\n";
echo $prefecture["茨城県"] . "\n";



// Q8 連想配列-2

$prefecture = 
[
  "東京都" => "新宿区" , "神奈川県" => "横浜市" , "千葉県" => "千葉市" , "埼玉県" => "さいたま市" , 
  "栃木県" => "宇都宮市" , "群馬県" => "前橋市" , "茨城県" => "水戸市"
]; 

foreach ($prefecture as $ken => $shi) 
{
  if ($ken == "埼玉県")  
    {
      echo $ken . "の県庁所在地は、" . $shi . "です。";
    }
}



// Q9 連想配列-3

$prefecture = 
[
  "東京都" => "新宿区" , "神奈川県" => "横浜市" , "千葉県" => "千葉市" , "埼玉県" => "さいたま市" , 
  "栃木県" => "宇都宮市" , "群馬県" => "前橋市" , "茨城県" => "水戸市" ,
  "愛知県" => "名古屋市" , "大阪府" => "大阪市"
]; 
$kanto = 
[
  "東京都", "神奈川県", "千葉県", "埼玉県", "栃木県", "群馬県", "茨城県"
];

foreach ($prefecture as $ken => $shi) 
{
  if (in_array($ken, $kanto)) 
    {
      echo $ken . "の県庁所在地は、" . $shi . "です。\n";
    } 
  else
    {
      echo $ken . "は関東地方ではありません。\n";
    }
}



// Q10 関数-1

function hello($name)
{
  echo $name . "さん、こんにちは。\n";
}

hello("金谷");
hello("安藤");



// Q11 関数-2

function calcTaxInPrice($price)
{
  return $price * 1.1;
}

$price = 1000;
$TaxInPrice = calcTaxInPrice($price);

echo $price . "円の商品の税込価格は" . $TaxInPrice . "円です。";



// Q12 関数とif文

function distinguishNum($number)
{
  if($number % 2 == 0)
  {
    return $number . "は偶数です。\n";
  }
  else
  {
    return $number . "は奇数です。\n";
  }
}

echo distinguishNum(11);
echo distinguishNum(24);



// Q13 関数とswitch文

function evaluateGrade($pass)
{
  switch($pass)
  {
    case "A": case "B": return "合格です。\n"; break;
    case "C": return "合格ですが追加課題があります。\n"; break;
    case "D": return "不合格です。\n"; break;
    default: return "判定不明です。講師に問い合わせてください。\n"; break;
  }
}

echo evaluateGrade("A");
echo evaluateGrade("R");
?>