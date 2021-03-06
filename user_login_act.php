<?php
// var_dump($_POST);
// exit();
// 外部ファイル読み込み
include('functions.php');

session_start();

// DB接続します
$pdo = connect_to_db();
// データ受け取り
$user_id = $_POST['user_id'];
$password = $_POST['password'];
// データ取得SQL作成&実行
$sql = '';

// SQL実行時にエラーがある場合はエラーを表示して終了
$sql = 'SELECT * FROM faveritemo_user_table 
WHERE user_id=:user_id 
AND password=:password 
AND is_deleted=0';

// WHEREで条件を指定!
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

// うまくいったらデータ（1レコード）を取得
$val = $stmt->fetch(PDO::FETCH_ASSOC);

// ユーザ情報が取得できない場合はメッセージを表示
if (!$val) {
    echo "<script>
    alert('ユーザーデータがありません');
    location.href = 'user_login.php';
    </script>";
} else {
    // ログインできたら情報をsession領域に保存して一覧ページへ移動
    $_SESSION = array();
    $_SESSION["session_id"] = session_id();
    $_SESSION["is_admin"] = $val["is_admin"];
    $_SESSION["user_id"] = $val["user_id"];
    $_SESSION["id"] = $val["id"];
    header("Location:memo_index.php");
    exit();
}
