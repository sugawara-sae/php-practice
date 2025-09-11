<?php
// Q1 tic-tac問題

echo "1から100までのカウントを開始します\n\n";

for ($i = 1; $i <= 100; $i++) 
{
  if ($i % 4 == 0 && $i % 5 == 0) 
  {
    echo "tic-tac\n";
  }
  elseif ($i % 4 == 0) 
  {
    echo "tic\n";
  } 
  elseif ($i % 5 == 0)
  {
    echo "tac\n";
  }
  else
  {
    echo $i . "\n";
  }
}




// Q2 多次元連想配列

$personalInfos = [
    [
        'name' => 'Aさん',
        'mail' => 'aaa@mail.com',
        'tel'  => '09011112222'
    ],
    [
        'name' => 'Bさん',
        'mail' => 'bbb@mail.com',
        'tel'  => '08033334444'
    ],
    [
        'name' => 'Cさん',
        'mail' => 'ccc@mail.com',
        'tel'  => '09055556666'
    ],
];

// Q2 問題1

echo "Bさんの電話番号は" . $personalInfos[1]["tel"] . "です。";

// Q2 問題2
foreach ($personalInfos as $index => $info)
{
  echo($index + 1) . "番目の" . $info["name"] . "のメールアドレスは" . 
  $info["mail"] . "で、電話番号は" . $info["tel"] . "です。\n";
}

// Q2 問題3

$ageList = [25, 30, 18];

foreach ($personalInfos as $index => $info) 
{
  $personalInfos[$index]['age'] = $ageList[$index];
}




// Q3 オブジェクト-1

class Student
{
    public $studentId;
    public $studentName;

    public function __construct($id, $name)
    {
        $this->studentId = $id;
        $this->studentName = $name;
    }

    public function attend()
    {
        echo '授業に出席しました。';
    }
}

$yamada = new Student(120,"山田");

echo "学籍番号" . $yamada->studentId . "番の生徒は" . $yamada->studentName . "です。\n";




// Q4 オブジェクト-2

class Student
{
    public $studentId;
    public $studentName;

    public function __construct($id, $name)
    {
        $this->studentId = $id;
        $this->studentName = $name;
    }

    public function attend($subject)
    {
      echo $this->studentName . 'は' . $subject . 'の授業に参加しました。学籍番号：' . $this->studentId;
    }
}

$yamada = new Student(120, '山田');
$yamada->attend('PHP');




// Q5 定義済みクラス

// Q5 問題1
$date = new DateTime();
$date->modify('-1 month');
echo $date->format('Y-m-d');

// Q5 問題2

$date1 = new DateTime('now');
$date2 = new DateTime('1992-04-25');
$interval = $date1->diff($date2);

echo "あの日から" . $interval->days . "日経過しました。";

?>