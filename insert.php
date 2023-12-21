<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <style>
    .birthday-message {
        color: #ffffff;
        /* 文字色 */
        background: linear-gradient(135deg, #fca5f1 0%, #b3ffff 100%);
        /* グラデーション背景 */
        padding: 20px;
        border-radius: 10px;
        font-family: 'Comic Sans MS', cursive, sans-serif;
        /* フォント */
        text-align: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        /* 影の効果 */
        position: relative;
        overflow: hidden;
        /* 背景の装飾のため */
    }
    </style>

</head>

<body>

    <?php
//1.  DB接続します
require_once('funcs.php');

//1. POSTデータ取得
$name = $_POST['name'];
$birthday = $_POST['birthday'];
$comment = $_POST['comment'];

$server_info = switch_server_env();
//2. DB接続します
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

// $count = 0;
// foreach ($server_info as $key => $value) {
//     if (gettype($value)== "string") {
//         $count++;
//         echo((string)$count." / ".$key." / ".$value."<br>");
//     }else{
//         $count++;

//         echo '<pre>';
//         var_dump($value[0]);
//         echo '</pre>';

//         echo((string)$count." / ".$key." / ".$value[0]."<br>");
//     }
// }
// echo($server_info->id);

// echo(gettype($server_info->table_name_in_DB));
// echo("<br>".$server_info->table_name_in_DB[0]);
//３．データ登録SQL作成

// 1. SQL文を用意
// $stmt = $pdo->prepare("SELECT * FROM {$server_info->table_name_in_DB}");
$stmt = $pdo->prepare("INSERT INTO ".(string)$server_info->table_name_in_DB[0]."
        (name, birthday, comment)
    VALUES (
        :name, :birthday, :comment
        )");

//  2. バインド変数を用意
// Integer 数値の場合 PDO::PARAM_INT
// String文字列の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);

// //  3. 実行
$status = $stmt->execute();

//４．データ登録処理後
if($status === false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit('ErrorMessage:' . $error[2]);
} else {
    //５．index.phpへリダイレクト
    // 成功した場合
    // echo 'test';
    // header('Location: index.php');
    echo '<div class="birthday-message">
        書き込みありがとうございます！<br>
        みんなの欲しいもの一覧は<a href="./select.php">コチラ💁</a>
        </div>';
}
?>