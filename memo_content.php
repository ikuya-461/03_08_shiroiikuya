<?php
session_start();
include("functions.php");

// ユーザ名取得
$user_id = $_SESSION['id'];

// DB接続
$pdo = connect_to_db();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="css/main.css" />
    <script src="js/top.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Ravi+Prakash" rel="stylesheet">
    <link href="https://fonts.googleapis.com/earlyaccess/kokoro.css" rel="stylesheet">
    <title>favoritemo</title>
    <style>
        ul {
            list-style: none;
            padding: 0px 0px;
        }

        ul li {
            list-style: none;
        }

        .outputfield {
            list-style: none;
            background-color: aliceblue;
            width: 90%;
            margin: auto;
        }

        label {
            margin-right: 10px;
            width: 45%;
            float: left;
        }

        .inputform {
            text-align: center;
            width: 100%;
            display: flex;
            flex-direction: column;
            padding: 0px;
        }

        a {
            color: black;
            text-decoration: none;
        }
    </style>
</head>

<body>

    <h1 class="pagetitle">ダンジョン飯</h1>
    <div class="select">
        <select name="select" onChange="location.href=value;">
            <option value="#"> --- 選択してください --- </option>
            <option value="comic.php">comic</option>
            <option value="anime.php">anime</option>
            <option value="novel.php">novel</option>
            <option value="game.php">game</option>
            <option value="movie.php">movie</option>
        </select>
        <button id="sign-out" class="sign text"><a href="user_logout.php">SignOut</a></button>
        <button id="back" class="sign text"><a href="memo_index.php">BACK</a></button>
    </div>

    <ul id="output"></ul>


    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/7.14.5/firebase.js"></script>

    <!-- TODO: Add SDKs for Firebase products that you want to use
         https://firebase.google.com/docs/web/setup#available-libraries -->
    <script src="https://www.gstatic.com/firebasejs/7.14.5/firebase-analytics.js"></script>

    <script>
        // Your web app's Firebase configuration
        var firebaseConfig = {
            apiKey: "AIzaSyA-QXcX-Iyv4y4xTrvqGbMCbDI5joG7CYY",
            authDomain: "favorite-9a0b4.firebaseapp.com",
            databaseURL: "https://favorite-9a0b4.firebaseio.com",
            projectId: "favorite-9a0b4",
            storageBucket: "favorite-9a0b4.appspot.com",
            messagingSenderId: "506085497484",
            appId: "1:506085497484:web:63ddc6d98e5b45e1c4b9a9",
            measurementId: "G-M9JJYLEJYP"
        };
        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>

    <script>
        function convertFromFirestoreTimestampToDatetime(timestamp) {
            const _d = timestamp ? new Date(timestamp * 1000) : new Date();
            const Y = _d.getFullYear();
            const m = (_d.getMonth() + 1).toString().padStart(2, '0');
            const d = _d.getDate().toString().padStart(2, '0');
            const H = _d.getHours().toString().padStart(2, '0');
            const i = _d.getMinutes().toString().padStart(2, '0');
            const s = _d.getSeconds().toString().padStart(2, '0');
            return `${Y}/${m}/${d} ${H}:${i}:${s}`;
        }

        var db = firebase.firestore().collection('comic');

        $('#send').on('click', function() {

            const dataObject = {
                title: $('#title').val(), // inputの入力値
                auther: $('#auther').val(),
                volume: $('#volume').val(),
                when: $('#when').val(),
                impression: $('#impression').val(), // textareaの入力値
                time: firebase.firestore.FieldValue.serverTimestamp(), // 登録日時
            }
            db.add(dataObject);
            // document.sampleform.reset();

            // $('#title').val('');
            // $('#auther').val('');
            // $('#volume').val('');
            // $('#when').val('');
            // $('#impression').val('');
        });

        // 送信後にtextareaを空にする処理

        db.orderBy('time', 'desc').onSnapshot(function(querySnapshot) {
            // まずはconsole.log()で出力してデータの形を確認！

            let str = '';

            querySnapshot.docs.forEach(function(doc) {
                // doc.idでidを，doc.data()でデータを取得できる const id = doc.id;

                const id = doc.id;
                const data = doc.data();
                const datatime = convertFromFirestoreTimestampToDatetime(data.time.seconds);

                str += '<li id="' + id + '" class="outputfield">';
                str += '<p>' + data.title + '</p>';
                str += '<p>' + data.auther + '</p>';
                str += '<p>' + data.volume + '</p>';
                str += '<p>' + data.when + '</p>';
                str += '<p>' + data.impression + '</p>';
                str += '<p>' + datatime + '</p>';
                str += '</li>';
            });

            $('#output').html(str);
        });
    </script>
</body>
</html>