<?php

//新規作成、更新、削除の処理を通すファイル
//formのPOST先の役割を担う

require_once('functions.php');
//functions.phpの読み込み

savePostedData($_POST);
//$_POST = POST送信されたデータをサーバー側で受け取るためのPHPの組み込み変数
//functions.phpで、処理元による分岐を指定
//送信元がnew.php（新規作成）なら、createTodoData($post['content'])を実行
//edit.php（編集）なら、updateTodoData($post)を実行
//index.phpなら、deleteTodoData($post['id'])を実行

header('Location: ./index.php');
//処理が終わったら自動で指定のブラウザ（index.php）に戻る

?>