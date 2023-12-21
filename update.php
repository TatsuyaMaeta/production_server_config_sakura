<?php
require_once('./funcs.php');

// Check if the 'id' and 'field' GET parameters are set
if (!isset($_GET['id'], $_GET['field'])) {
    exit('No ID or Field specified!');
}
$id = $_GET['id'];
$field = $_GET['field'];

try {
    // $pdo = new PDO('mysql:dbname=gs_231220kadai;charset=utf8;host=localhost', 'root', '');
    $pdo = new PDO('mysql:dbname=gs_231220kadai;charset=utf8;host=127.0.0.1', 'root', '');
    // Fetch the data to be updated
    $stmt = $pdo->prepare("SELECT * FROM gs_231220kadai WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        exit('No such record!');
    }
} catch (PDOException $e) {
    exit('DBConnectError:' . $e->getMessage());
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    if ($field === 'name') {
        $name = $_POST['name'];
        $stmt = $pdo->prepare("UPDATE gs_231220kadai SET name = :name WHERE id = :id");
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    } elseif ($field === 'birthday') {
        $birthday = $_POST['birthday'];
        $stmt = $pdo->prepare("UPDATE gs_231220kadai SET birthday = :birthday WHERE id = :id");
        $stmt->bindValue(':birthday', $birthday, PDO::PARAM_STR);
    } elseif ($field === 'comment') {
        $comment = $_POST['comment'];
        $stmt = $pdo->prepare("UPDATE gs_231220kadai SET comment = :comment WHERE id = :id");
        $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
    }
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->execute()) {
        echo "<script>alert('更新しました！'); location.href='./select.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <!-- ... -->
</head>
<body>
    <!-- ... -->
    <form method="POST">
        <?php if ($field === 'name'): ?>
            Name: <input type="text" name="name" value="<?= h($row['name']) ?>"><br>
        <?php elseif ($field === 'birthday'): ?>
            Birthday: <input type="text" name="birthday" value="<?= h($row['birthday']) ?>"><br>
        <?php elseif ($field === 'comment'): ?>
            Comment: <textarea name="comment"><?= h($row['comment']) ?></textarea><br>
        <?php endif; ?>
        <input type="hidden" name="id" value="<?= h($row['id']) ?>">
        <input type="submit" value="Update">
    </form>
    <!-- ... -->
</body>
</html>
