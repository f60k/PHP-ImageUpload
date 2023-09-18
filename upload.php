<?php

session_start();

// データベース設定ファイルを含む
include 'dbConfig.php';

$statusMsg = '';

if (isset($_POST['submit'])) {
    $text_data = mysqli_real_escape_string($db, $_POST['user_name']);
    $user_image = $_POST['image_name'];
 
    // ファイルのアップロード先
    $targetDir = "uploads/";
    $targetFilePath = $targetDir . $user_image;

    file_put_contents($targetFilePath, $_SESSION['image']);

    if (isset($_POST['user_name'])) {
        $text_data = $_POST['user_name'];


        // データベースに画像ファイル名を挿入
        $insert = $db->query("INSERT into images (user_name, file_name, uploaded_on) VALUES ('$text_data','" . $user_image . "', NOW())");
        if ($insert) {
            $statusMsg = "テキストデータの保存に成功しました。";
        } else {
            $statusMsg = "テキストデータの保存に失敗しました。";
        }
    }


    
} else {
    $statusMsg = 'アップロードするファイルを選択してください';
}

// ステータスメッセージを表示
echo $statusMsg;
