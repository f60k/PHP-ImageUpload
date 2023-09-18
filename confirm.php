<!-- confirm.php -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>確認画面</title>
</head>

<?php
session_start();
$_SESSION['image']['data'] = file_get_contents($_FILES['file']['tmp_name']);
$_SESSION['image']['type'] = exif_imagetype($_FILES['file']['tmp_name']);
$image_name = $_FILES["file"]["name"];

?>

<body>
    <h2>入力内容の確認</h2>
    <p>ユーザー名: <?php echo htmlspecialchars($_POST['user_name'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p>選択した画像: <?php echo htmlspecialchars($_FILES['file']['name'], ENT_QUOTES, 'UTF-8'); ?></p>
    <img width="100px" src="img.php" />


    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="user_name" value="<?php echo htmlspecialchars($_POST['user_name'], ENT_QUOTES, 'UTF-8'); ?>">
        <input type="hidden" name="image_name" value="<?= $image_name ?>">
        <input type="submit" name="submit" value="アップロード">
        <input type="button" value="戻る" onclick="history.back()">
    </form>
</body>

</html>