<?php
require_once('functions.php');
//functions.php（関数ファイル）の読み込み
//functions.phpに記載の関数は使えるようになる

header('Set-Cookie: userId=123');
setToken();
?> 


<!DOCTYPE html>
<!--トップページ-->
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
</head>

<body>
  welcome hello world

  <?php if (!empty($_SESSION['err'])): ?>
    <p><?= $_SESSION['err']; ?></p>
  <?php endif; ?>
  <!--エラー文を表示できるようにする記述-->

  <div>
    <a href="new.php">
    <!--new.php（新規作成フォーム）への遷移-->
      <p>新規作成</p>
    </a>
  </div>

  <div> 
    <table>
    <!--テーブルの一覧表示-->

      <tr>
      <!--テーブルの構成-->
        <th>ID</th>
        <th>内容</th>
        <th>更新</th>
        <th>削除</th>
      </tr>
      
      <?php foreach (getTodoList() as $todo): ?>
      <!--
      foreachで $todo の繰り返し
      functions.phpからgetTodoList()を呼び出し、
      getTodoList()はconnection.phpからgetAllRecords()を呼び出している
      -->
      <!--画面表示される文字列にエスケープ処理-->
      <tr>
        <td><?= e($todo['id']); ?></td>
        <td><?= e($todo['content']); ?></td>
        <td>
          <a href="edit.php?id=<?= e($todo['id']); ?>">
          <!--
          edit.php（新規作成フォーム）への遷移
          $todo['id']の記述により、対象のidの操作として遷移できる
          -->
            更新
          </a>
        </td>
        <td>
          <form action="store.php" method="post">
            <input type="hidden" name="id" value="<?= e($todo['id']); ?>">
            <!--
            store.phpに該当idデータをPOST送信
            input typeをhiddenに設定することで、ワンクリックで削除が実行できる
            （＝送信したいデータがブラウザに表示されない）
            -->
            <input type="hidden" name="token" value="<?= $_SESSION['token']; ?>">
            <!--SESSIONに埋め込んだtokenを持つinputタグを挿入-->
            <button type="submit">削除</button>
          </form>
        </td>
      </tr>
      <?php endforeach; ?>

    </table>
  </div>
  <?php unsetError(); ?>
</body>
</html>