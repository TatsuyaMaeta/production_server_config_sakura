<?php
require_once('./funcs.php');

// 識別子を取得
$id = $_GET['id'];

try {
    // $pdo = new PDO('mysql:dbname=gs_231220kadai;charset=utf8;host=localhost', 'root', '');
    $pdo = new PDO('mysql:dbname=gs_231220kadai;charset=utf8;host=127.0.0.1', 'root', '');
    $stmt = $pdo->prepare("DELETE FROM gs_231220kadai WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $status = $stmt->execute();

    if ($status == false) {
        $error = $stmt->errorInfo();
        exit("QueryError:" . $error[2]);
    } else {
        header("Location: ./select.php"); //./に注意
        exit;
    }
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

