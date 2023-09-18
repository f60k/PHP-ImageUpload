<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>画像をアップロード</title>
    <meta name="description" content="画像ファイルをアップロードします。">
</head>

<body>
    <form action="upload2.php" method="post" enctype="multipart/form-data">
        <input type="text" value="名無し" name="user_name" required>
        アップロードする画像ファイルを選択する:
        <input type="file" name="file" accept=".jpg, .jpeg, .png, .gif" required>
        <input type="submit" name="submit" value="Upload">
    </form>
    <div>
        <?php
        // データベースからすべての画像情報を取得 (SQLインジェクション対策)
        // $query = $db->prepare("SELECT * FROM images ORDER BY uploaded_on DESC");
        // $query->execute();
        $query = $db->query("SELECT * FROM images ORDER BY uploaded_on DESC");
        // $query->store_result();

        if ($query->num_rows > 0) {
            $query->bind_result($imageID, $userName, $fileName, $uploadedOn);
            while ($query->fetch()) {
                $imageURL = 'uploads/' . $fileName;

                // ファイルパスのバリデーション（ディレクトリトラバーサル攻撃対策）
                if (isValidImagePath($imageURL)) {
                    // 画像を表示
                    echo '<img src="' . $imageURL . '" alt="Image"><br>';
                } else {
                    echo '不正なファイルパスです';
                }
            }
        } else {
            echo '画像が見つかりません';
        }

        // ファイルパスのバリデーション関数の例
        function isValidImagePath($path)
        {
            // 安全なファイルパスのバリデーションロジックを実装
            // 例: $path が指定されたディレクトリ内のファイルに制限されていることを確認
            return preg_match('/^uploads\/[a-zA-Z0-9_.-]+$/i', $path);
        }

        ?>
    </div>
</body>

</html>