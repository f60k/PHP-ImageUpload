<?php
// データベース設定ファイルを含む
include 'dbConfig.php';

// データベースからすべての画像情報を取得
$query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $imageURL = 'uploads/' . $row["file_name"];

        // 画像を表示
        echo '<img src="' . $imageURL . '" alt="Image"><br>';
    }
} else {
    echo '画像が見つかりません';
}
