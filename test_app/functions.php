<?php
//DBを呼び出す関数をまとめたファイル


require_once('connection.php');
//connection.phpの読み込み


function e($text)
{
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
    //エスケープ処理
    //第二引数に処理内容（種類）を記述
}



session_start();
//CSRF攻撃を防ぐためのセキュリティ対策

function setToken()
{
    $_SESSION['token'] = bin2hex(openssl_random_pseudo_bytes(16));
    // SESSIONにtokenを格納する
    //ランダムな16文字のバイト文字列を生成 → bin2hexで16進数に変換 → $_SESSION['token']に格納
    //ブラウザを閉じたりしない限りSESSION情報が生き続ける
}

function checkToken($token)
{
    if (empty($_SESSION['token']) || ($_SESSION['token'] !== $token))
    {
        $_SESSION['err'] = '不正な操作です';
        redirectToPostedPage();
    }
    // SESSIONに格納されたtokenのチェックを行い、SESSIONにエラー文を格納する
    //サーバ側とクライアント側の token の整合性を確認する
}

function unsetError()
{
    $_SESSION['err'] = '';
    //errに格納したエラーメッセージを空文字にして、ブラウザ上にエラーメッセージを表示させないようにする
}

function redirectToPostedPage()
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}



function getTodoList()
{
    return getAllRecords();
}


function getSelectedTodo($id)
{
    return getTodoTextById($id); 
}


function savePostedData($post)
{
    checkToken($post['token']);
    validate($post);
    //バリデーション実装。
    $path = getRefererPath();
    switch ($path) {
        case '/new.php':
            createTodoData($post['content']);
            break;
        case '/edit.php':
            updateTodoData($post);
            break;
        case '/index.php':
            deleteTodoData($post['id']);
            break;
        default:
            break;
    }
}


function validate($post)
{
    if (isset($post['content']) && $post['content'] === '') 
    {
        $_SESSION['err'] = '入力がありません';
        redirectToPostedPage();
    }
}


function getRefererPath()
{
    $urlArray = parse_url($_SERVER['HTTP_REFERER']);
    return $urlArray['path'];
}

?>