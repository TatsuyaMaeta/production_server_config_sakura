<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link rel="stylesheet", href="./style.css">
    <style>
body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #fca5f1 0%, #b3ffff 100%);
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #a3d8f4; /* パステルブルー */
            color: #fff;
            padding: 10px 0;
            text-align: center;
        }

        .navbar-brand {
            font-size: 24px;
            color: #ffffff;
        }

        .jumbotron {
            background-color: #fff;
            margin: 20px auto;
            width: 80%;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: 2px solid #ffb6c1; /* パステルピンク */
        }

        fieldset {
            border: none;
        }

        legend {
            font-size: 22px;
            font-weight: bold;
            color: #b19cd9; /* パステルパープル */
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type=text], textArea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #fafad2; /* ライトイエロー */
        }

        input[type=submit] {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #77dd77; /* パステルグリーン */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type=submit]:hover {
            background-color: #63b267; /* より濃いパステルグリーン */
        }
     
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="./select.php">みんなの欲しいもの一覧</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <form method="post" action="./insert.php">
        <div class="jumbotron">
            <fieldset>
                <legend>みんなの誕生日ほしい物リスト</legend>
                <label>名前：<input type="text" name="name" placeholder="例）ジーズ花子" ></label><br>
                <label>誕生日：<input type="text" name="birthday" placeholder="例）19900101"></label><br>
                <label>ほしいもの：<textArea name="comment" rows="4" cols="40" placeholder="例）レッドブル１年分"></textArea></label><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
