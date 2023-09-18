<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>画像をアップロード</title>
    <meta name="description" content="画像ファイルをアップロードします。">
</head>

<body>
    <form action="confirm.php" method="post" enctype="multipart/form-data">
        <input type="txt" value="名無し" name="user_name">
        アップロードする画像ファイルを選択する:
        <input type="file" name="file">
        <input type="submit" name="submit" value="Upload">

    </form>

</body>

</html>







<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    $(function() {
        $('input[type=file]').on('change', function() {
            var me = $(this);
            var file = $(this).prop('files')[0];
            var fr = new FileReader();
            if (file.type.match(/^image/)) {
                me.next('.myimgs').remove();
                var imgtag = $('<img alt="test" class="myimgs" width="100">');
                me.after(imgtag);
                fr.onload = function() {
                    imgtag.attr('src', fr.result);
                }
                fr.readAsDataURL(file);
            }
        });
    });
</script>
