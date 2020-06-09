<?php


// DB接続の設定
// DB名は`gsacf_x00_00`にする
function connect_to_db()
{
    $dbn = 'mysql:dbname=gsacf_l03_08;charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';
    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        exit('dbError:' . $e->getMessage());
    }
}
