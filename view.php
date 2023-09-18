<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div>
        <?php
        // データベース設定ファイルを含む
        include 'dbConfig.php';

        // 画像を表示
        $query = $db->prepare("SELECT id, file_name FROM images ORDER BY uploaded_on DESC");
        $query->execute();
        $query->store_result();

        if ($query->num_rows > 0) {
            $query->bind_result($imageID, $fileName);
            while ($query->fetch()) {
                $imageURL = 'uploads/' . $fileName;

                // ファイルパスのバリデーション
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