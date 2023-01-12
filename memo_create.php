<?php
include('function.php');
// var_dump($_POST);
// exit();

$title = $_POST['title'];
$content = $_POST['content'];
$energy = $_POST['energy'];


$pdo = Preparation();


// SQL作成&実行
$sql = 'INSERT INTO memo_card_table (ID, title, content, energy_consumption, retrospective_comment, member_id, created_at, updated_at) 
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
