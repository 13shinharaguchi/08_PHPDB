<?php
include('function.php');

// var_dump($_POST);
// exit();


//回復エネルギーの受取
$energy_puls = $_POST['energy_puls'];


// DB接続
$pdo = Preparation();

//ユーザの総エネルギーを取得する
$sql = 'SELECT * FROM `member_table` WHERE ID=1';
$stmt = $pdo->prepare($sql);
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}
$user = $stmt->fetch(PDO::FETCH_ASSOC);

$user_all_e = $user['total_energy'];
print($user_all_e);


$sql = 'UPDATE todo_table SET todo=:todo, deadline=:deadline, updated_at=now() WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);


try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

header("Location:todo_read.php");
exit();
