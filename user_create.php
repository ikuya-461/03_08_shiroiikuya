<?php

// 送信確認
// var_dump($_POST);
// exit();

// 関数ファイル読み込み
include('functions.php');

// 受け取ったデータを変数に入れる
$user_id = $_POST['user_id'];
$password = $_POST['password'];

$pdo = connect_to_db();

// ユーザ存在有無確認
$sql = 'SELECT COUNT(*) FROM faveritemo_user_table WHERE user_id=:user_id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
}

if ($stmt->fetchColumn() > 0) {
    // user_idが1件以上該当した場合はエラーを表示して元のページに戻る
    // $count = $stmt->fetchColumn();
    echo "<p>すでに登録されているメールアドレスです．</p>";
    echo '<a href="login.php">login</a>';
    exit();
}


// データ登録SQL作成
// `created_at`と`updated_at`には実行時の`sysdate()`関数を用いて実行時の日時を入力する
$sql =
    'INSERT INTO faveritemo_user_table(id, user_id, email, password, is_admin, is_deleted, created_at, updated_at) VALUES(NULL, :user_id, :email, :password, 0, 0, sysdate(), sysdate())';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    header("Location:user_login.php");
    exit();
}
