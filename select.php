<?php
//1.  DB接続します
require_once('funcs.php');

$server_info = switch_server_env();

// foreach ($server_info as $key => $value) {
//     if (gettype($value)== "string") {
//         echo($key." / ".$value."<br>");
//     }elseif(gettype($value)== "array"){
//         echo($key." / ".$value[0]."<br>");
//     }
// }
// echo($server_info->table_name_in_DB[0]);

// echo($server_info->host);
try {
    //ID:'root', Password: xamppは 空白 ''
    // $pdo = new PDO('mysql:dbname=gs_231220kadai;charset=utf8;host=localhost', 'root', '');
    
    $arg1 = "mysql:dbname={$server_info->db_name};charset={$server_info->charset};host={$server_info->host}";
    
    $pdo = new PDO($arg1,
                $server_info->id,
                $server_info->pw);
    // $arg1 = "mysql:dbname={$server_info->db_name};charset=utf8;host=localhost";
    // $pdo = new PDO($arg1, 'root', '');

  } catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM ".$server_info->table_name_in_DB[0]);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:" . $error[2]);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $view .= "<p>";
      $view .= '<a href="./update.php?id=' . h($result['id']) . '&field=name">' . h($result['name']) . '</a> ';
      $view .= '<a href="./update.php?id=' . h($result['id']) . '&field=birthday">' . h($result['birthday']) . '</a> ';
      $view .= '<a href="./update.php?id=' . h($result['id']) . '&field=comment">' . h($result['comment']) . '</a>';
      $view .= ' <a href="./delete.php?id=' . h($result['id']) . '">[削除]</a>';
      $view .= "</p>";
  }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>フリーアンケート表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
        line-height: 1.6;
    }

    header {
        background: #333;
        color: #fff;
        padding: 10px 0;
        text-align: center;
    }

    header a {
        color: #fff;
        text-decoration: none;
    }

    .navbar-brand {
        font-size: 20px;
    }

    .container {
        margin-top: 20px;
    }

    .jumbotron {
        background: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    p {
        background: #e9ecef;
        padding: 10px;
        border-radius: 5px;
        margin: 10px 0;
        line-height: 1.5;
    }

    p a {
        color: #007bff;
        text-decoration: none;
        margin-right: 15px;
    }

    p a:hover {
        text-decoration: underline;
    }

    .delete-link {
        color: #dc3545;
    }

    .delete-link:hover {
        color: #c82333;
    }
    </style>

</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="./index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron"><?= $view ?></div>
    </div>
    <!-- Main[End] -->

</body>

</html>