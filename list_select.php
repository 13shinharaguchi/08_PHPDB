<?php


include('function.php');

//DBに接続する
$pdo = Preparation();



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="list_select.css">
    <title>一覧表示</title>
</head>

<body>
    <div class="list_wrapper">
        <div class="card_list_area">
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