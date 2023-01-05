<?php
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

// SQL作成&実行,
$sql = 'SELECT * FROM memo_card_table ORDER BY created_at ASC LIMIT 5 ';

$stmt = $pdo->prepare($sql);

// バインド変数処理はいらない

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
    <link rel="stylesheet" href="main.css">
    <title>メイン</title>
</head>

<body>
    <div class="all_display">
        <?php foreach ($result as $memo) : ?>
            <div class="memo_list_wrapper">
                <div class="memo_list">
                    <div><?php echo $memo['title'] ?></div>
                    <div><?php echo $memo['content'] ?></div>
                    <div><?php echo $memo['energy_consumption'] ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="under">
        <div class="memo_input">
            <form action="memo_create.php" method="POST">
                <div class="title_wrapper">
                    <label for="title">タイトル</label>
                    <input type="text" name="title">
                </div>
                <div class="content_wrapper">
                    <label for="content">意識すること</label>
                    <textarea name="content"></textarea>
                </div>
                <div class="energy_wrapper">
                    <label for="energy">消費エネルギー</label>
                    <input type="number" name="energy">
                </div>
                <button type="submit">かける</button>
            </form>
        </div>
        <div class="pop_display">
            <div>ここに1つを表示する</div>
        </div>
    </div>
</body>

</html>