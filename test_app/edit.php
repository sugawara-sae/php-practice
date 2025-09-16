<?php
require_once('functions.php');
//functions.phpの読み込み

$todo = getSelectedTodo($_GET['id']);
//index.phpから遷移した際に、該当のIDを取得
//データベースから、元の入力内容を取得して、$todoに代入

setToken();
?>


<!DOCTYPE html>
<!--編集画面を表示するためのファイル-->
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>編集</title>
</head>

<body>

  <?php if (!empty($_SESSION['err'])): ?>
    <p><?= $_SESSION['err']; ?></p>
  <?php endif; ?>
  <!--エラー文を表示できるようにする記述-->

  <form action="store.php" method="post">
  <!--
  入力データをstore.phpに送信
  formのmethod属性（送信方法）をPOSTに指定
  データがURLに表示されずにサーバーに送られる
  -->
    <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
    <!--SESSIONに埋め込んだtokenを持つinputタグを挿入-->
    <input type="hidden" name="id" value="<?= e($_GET['id']); ?>">
    <!--更新対象のIDをstore.phpに送信-->
    <input type="text" name="content" value="<?= e($todo); ?>">
    <!--value指定で元の入力テキストを表示-->
    <input type="submit" value="更新">
    <!--更新ボタンの実装-->
  </form>
  <div>
    <a href="index.php">一覧へもどる</a>
    <!--index.phpへの遷移-->
  </div>
  <?php unsetError(); ?>
</body>

</html>