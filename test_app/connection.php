<?php
//DBに関する処理をまとめたファイル
//データを操作する機能がまとまっている

require_once('config.php');
//config.phpの読み込み
//使用するDBの処理が可能になる

function connectPdo()
//PHPとデータベースサーバーの間の接続
//try{}catch{}でエラーが出た場合の処理方法を指定
{
    try {
        return new PDO(DSN, DB_USER, DB_PASSWORD);
        //new PDO() = データベースに接続する既存メソッド。　対象：PDOクラス
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}


function createTodoData($todoText)
{
    $dbh = connectPdo();
    $sql = 'INSERT INTO todos (content) VALUES (:todoText)';
    //:todoText = プレースホルダー。
    // prepare()でSQL文実行の準備 → bindValue()でプレースホルダーに値をセット。

    $stmt = $dbh->prepare($sql);
    //prepare() = SQL文の準備をする既存メソッド。　対象：PDOオブジェクト

    $stmt->bindValue(':todoText', $todoText, PDO::PARAM_STR);
    //bindValue() = プレースホルダーに値をセットする既存メソッド。　対象：PDOstatementオブジェクト
    //第一引数 = 対象となる文字列（:todoText）
    //第二引数 = 保存したい値（$todoText）
    //第三引数 = 保存したい値のデータ型を指定

    $stmt->execute();
    //execute() = SQLを実行する既存メソッド。　対象：PDOstatementオブジェクト
}


function getAllRecords()
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL';
    return $dbh->query($sql)->fetchAll();
    //query() = SQLをそのまま実行する既存メソッド。　対象：PDOオブジェクト
    //fetchAll() = 実行結果をすべて取得する既存メソッド。　対象：PDOstatementオブジェクト
}


function updateTodoData($post)
{
    $dbh = connectPdo();
    $sql = 'UPDATE todos SET content = :todoText WHERE id = :id'; 
    $stmt = $dbh->prepare($sql); 
    $stmt->bindValue(':todoText', $post['content'], PDO::PARAM_STR); 
    $stmt->bindValue(':id', (int) $post['id'], PDO::PARAM_INT); 
    $stmt->execute(); 

}


function getTodoTextById($id)
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL AND id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch();
    //実行結果から1行取得する既存メソッド。　対象：PDOstatementオブジェクト
    return $data['content'];
}


function deleteTodoData($id)
{
    $dbh = connectPdo();
    $now = date('Y-m-d H:i:s');
    $sql = 'UPDATE todos SET deleted_at = :now WHERE id = :id';
    $stmt = $dbh ->prepare($sql);
    $stmt->bindValue(':now', $now, PDO::PARAM_STR);
    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->execute();
}

?>