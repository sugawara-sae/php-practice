<?php
require_once('functions.php');
setToken();
?>


<!DOCTYPE html>
<!--新規作成の画面を表示するためのファイル-->
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>新規作成</title>
</head>

<body>

  <?php if (!empty($_SESSION['err'])): ?>
    <p><?= $_SESSION['err']; ?></p>
  <?php endif; ?>
  <!--エラー文を表示できるようにする記述-->

  <form action="store.php" method="post">
  <!--store.phpにデータをPOST送信-->
    <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
    <!--SESSIONに埋め込んだtokenを持つinputタグを挿入-->
    <input type="text" name="content">
    <!--input type="text"　で一行のテキストフィールドを実装-->
    <input type="submit" value="作成">
    <!--input type="submit"　で"作成"ボタンを実装-->
  </form>

  <div>
    <a href="index.php">一覧へもどる</a>
    <!--index.phpへの遷移-->
  </div>
  <?php unsetError(); ?>
</body>

</html>