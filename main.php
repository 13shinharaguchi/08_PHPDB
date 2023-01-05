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

// SQL作成&実行
$sql = 'SELECT * FROM memo_card_table ORDER BY created_at DESC';

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
$output = "";
foreach ($result as $record) {
    $output .= "
    <tr>
      <td>{$record["title"]}</td>
      <td>{$record["content"]}</td>
      <td>{$record["energy_consumption"]}</td>
    </tr>
  ";
}

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
        <?= $output ?>
    </div>
    <div class="under">
        <div class="memo_input">
            <form action="memo_create.php" method="POST">
                <div>
                    <label for="title">タイトル</label>
                    <input type="text" name="title">
                </div>
                <div>
                    <label for="content">意識すること</label>
                    <input type="text" name="content">
                </div>
                <div>
                    <label for="energy">消費エネルギー</label>
                    <input type="number" name="energy">
                </div>
                <button type="submit">送信</button>
            </form>
        </div>
        <div class="pop_display">
            <div>ここに1つを表示する</div>
        </div>
    </div>
</body>

</html>