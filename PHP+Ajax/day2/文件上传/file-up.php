<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/21
 * Time: 20:38
 */
function filefn() {
    if (!isset($_FILES["img"])){
        //客户端没有提交过
        $GLOBALS["message"]="没有文件域";
        return;
    }
    $img_file=$_FILES["img"];
    if ($img_file["error"]!=UPLOAD_ERR_OK)
    {
        //服务器没有接收到文件
        $GLOBALS["message"]="文件上传失败";
        return;
    }
    $bool_moved=move_uploaded_file($img_file["tmp_name"],
        "imgdir/".$img_file["name"]);
    if (!$bool_moved) {
        $GLOBALS["message"]="文件上传失败";
        return;
    }else {
        $GLOBALS["message"]="文件上传成功";
    }
}
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    filefn();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文件上传</title>
</head>
<body>
<!--
    上传文件的话，必须用POST || enctype=multipart/form-data
    enctype默认为urlencoded 格式 key1=value1&key2=value2
-->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method=post
      enctype=multipart/form-data>

    <input type="file" name="img" /><br>
    <?php if (isset($message)): ?>
        <p style="color: red;font-size: 20px;font-weight: 600">
            <?php echo $message; ?>
        </p>
    <?php endif ?>
    <br>
    <button type="submit">提交</button>
</form>
</body>
</html>
