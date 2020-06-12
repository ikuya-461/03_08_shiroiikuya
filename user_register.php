<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>todoリストユーザ登録画面</title>
</head>

<body>
    <form action="register_act.php" method="POST">
        <fieldset>
            <legend>ユーザ登録画面</legend>
            <div>
                User Id: <input type="text" name="user_id">
            </div>
            <div>
                Password: <input type="password" name="password">
            </div>
            <div>
                <button>Register</button>
            </div>
            <a href="user_login.php">or login</a>
        </fieldset>
    </form>

</body>

</html>