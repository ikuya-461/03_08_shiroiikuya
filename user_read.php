<?php
// DB接続の設定
// DB名は`gsacf_x00_00`にする
include('functions.php');
$pdo = connect_to_db();

// データ取得SQL作成
$sql = 'SELECT * FROM foveritemo_user_table';

// SQL準備&実行
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// データ登録処理後
if ($status == false) {
    // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
    $error = $stmt->errorInfo();
    echo json_encode(["error_msg" => "{$error[2]}"]);
    exit();
} else {
    // 正常にSQLが実行された場合は入力ページファイルに移動し，入力ページの処理を実行する
    // fetchAll()関数でSQLで取得したレコードを配列で取得できる
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);  // データの出力用変数（初期値は空文字）を設定
    $output = "";
    // <tr><td>deadline</td><td>todo</td><tr>の形になるようにforeachで順番に$outputへデータを追加
    // `.=`は後ろに文字列を追加する，の意味
    foreach ($result as $record) {
        $output .= "<tr>";
        $output .= "<td>{$record["email"]}</td>";
        $output .= "<td>{$record["password"]}</td>";
        // edit deleteリンクを追加
        $output .= "<td><a href='user_edit.php?id={$record["id"]}'>edit</a></td>";
        $output .= "<td class=`deliete`><a href='user_delet.php?id={$record["id"]}'>delete</a></td>";
        $output .= "</tr>";
    }
    // $valueの参照を解除する．解除しないと，再度foreachした場合に最初からループしない
    // 今回は以降foreachしないので影響なし
    unset($record);
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Ravi+Prakash" rel="stylesheet">
    <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">
    <title>ユーザー管理</title>
    <script type="text/javascript" src="js/top.js"></script>
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.css" />
    <link type="text/css" rel="stylesheet" href="css/main.css">

</head>

<body>

    <h1>ユーザー管理画面</h1>
    <a href="login.php">login画面へもどる</a>
    <table>
        <thead>
            <tr>
                <th>email</th>
                <th>password</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <!-- ここに<tr><td>deadline</td><td>todo</td><tr>の形でデータが入る -->
            <?= $output ?>
        </tbody>
    </table>

</body>

</html>