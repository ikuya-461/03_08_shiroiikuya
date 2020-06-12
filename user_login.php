<?php
session_start();
include('functions.php');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Ravi+Prakash" rel="stylesheet">
    <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">
    <title>top</title>
    <!-- <script type="text/javascript" src="js/top.js"></script> -->
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.css" />
    <link type="text/css" rel="stylesheet" href="css/main.css">
</head>

<body>
    <form action="user_login_act.php" method="POST">
        <header>
            <h1 class=" pagetitle text">favaritemo</h1>
        </header>

        <main>
            <div class="loginform">

                <div class="inputform text">
                    <label for="user_id" class="formlabel">User Id</label>
                    <input type="text" id="user_id" class="forminput" name="user_id" />
                </div>

                <!-- パスワード入力フォーム -->
                <div class="inputform text">
                    <label for="password" class="formlabel">Password</label>
                    <input type="password" id="password" class="forminput" name="password" />
                </div>

                <!-- ボタン -->
                <div class="signbutton">

                    <button id="sign-in" class="sign text">SignIn</button>
                    <button id="sign-out" class="sign text"><a href="user_logout.php">SignOut</a></button>
                </div>
            </div>
    </form>

    <div class="manager">
        <button id="sign-up" class="sign text"><a href="user_register.php">SignUp</a></button>
    </div>

    <div class="select">
        <select name="select" onChange="location.href=value;">
            <option value="#"> --- 選択してください --- </option>
            <option value="anime.php">anime</option>
            <option value="novel.php">novel</option>
            <option value="comic.php">comic</option>
            <option value="game.php">game</option>
            <option value="movie.php">movie</option>
        </select>

    </div>
    </main>

    <footer>

    </footer>


    <!-- ログ出力エリア
    <h2>ログ</h2>
    <p id="log"></p> -->


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script>


    </script>
</body>

</html>