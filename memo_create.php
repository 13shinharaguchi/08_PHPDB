<?php 

// var_dump($_POST);
// exit();

$title = $_POST['title'];
$content = $_POST['content'];
$energy = $_POST['energy'];

// 各種項目設定
$dbn = 'mysql:dbname=wear_memo;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
    $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
    echo json_encode(["ここにデータベースのエラーが表示できるぞ" => "{$e->getMessage()}"]);
    exit();
}


// SQL作成&実行
$sql = 'INSERT INTO memo_card_table (ID, title, content, energy_consumption, retrospective_comment, menber_id, created_at, updated_at) 
VALUES (NULL, :title, :content,:energy_consumption, "", 1,  now(), now())';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);
$stmt->bindValue(':energy_consumption', $energy, PDO::PARAM_STR);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header('Location:main.php');
exit();
