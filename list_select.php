<?php
include('function.php');

//DBに接続する
$pdo = Preparation();

// SQL作成&実行,　ここをリレーションしてmember_idの選択されたものだけを表示させる
$sql = 'SELECT * FROM memo_card_table ORDER BY created_at DESC LIMIT 5 ';

$stmt = $pdo->prepare($sql);

// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list_select.css">
    <title>一覧表示</title>
</head>

<body>
    <div class="list_wrapper">
        <div class="card_list_area">
            <?php foreach ($result as $listmemo) : ?>
                <div class="memo_list">
                    <div><?php echo $listmemo['member_id'] ?></div>
                    <div><?php echo $listmemo['title'] ?></div>
                    <div><?php echo $listmemo['content'] ?></div>
                    <div><?php echo $listmemo['energy_consumption'] ?></div>
                </div>
            <?php endforeach; ?>
            <!-- TODO ここにユーザ名と総体力を表示する  -->
        </div>
        <div class="send_area">
            <p>ハートを送る</p>
            <form action="e_update.php" method="POST">
                <input type="number" name="energy_puls">
                <button type="submit">回復</button>
                </from>
        </div>
    </div>
</body>

</html>