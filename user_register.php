<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Ravi+Prakash" rel="stylesheet">
    <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">
    <title>register</title>
    <!-- <script type="text/javascript" src="js/top.js"></script> -->
    <link type="text/css" rel="stylesheet" href="https://cdn.firebase.com/libs/firebaseui/3.5.2/firebaseui.css" />
    <link type="text/css" rel="stylesheet" href="css/main.css">
    <style>
        a {
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <form action="user_register_act.php" method="POST">

        <header>
            <h1 class=" pagetitle text">favaritemo</h1>
        </header>

        <main>
            <div class="loginform">

                <div class="inputform text">
                    <label for="user_id" class="formlabel">User Id</label>
                    <input type="text" id="user_id" class="forminput" name="user_id" />
                </div>

                <!-- メールアドレス入力フォーム -->
                <div class="inputform text">
                    <label for="email" class="formlabel">Email</label>
                    <input type="text" id="email" class="forminput" name="email" />
                </div>

                <!-- パスワード入力フォーム -->
                <div class="inputform text">
                    <label for="password" class="formlabel">Password</label>
                    <input type="password" id="password" class="forminput" name="password" />
                </div>

                <!-- ボタン -->
                <div class="signbutton">
                    <button id="sign-up" class="sign text">SignUp</button>
                    <button id="sign-in" class="sign text"><a href="user_login.php">SignIn</a></button>
                </div>
        
            </div>



    </form>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>


</body>

</html>