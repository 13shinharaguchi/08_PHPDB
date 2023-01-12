<?php

function Preparation()
{
    $dbn = 'mysql:dbname=wear_memo;charset=utf8mb4;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';

    // DB接続
    try {
        return new PDO($dbn, $user, $pwd);
    } catch (PDOException $e) {
        echo json_encode(["ここにデータベースのエラーが表示できるぞ" => "{$e->getMessage()}"]);
        exit();
    }
}
