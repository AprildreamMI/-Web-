<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/21
 * Time: 23:30
 */
function trimall($str)//删除空格
{
    $oldchar=array(" ","　","\t","\n","\r");
    $newchar=array("","","","","");
    return str_replace($oldchar,$newchar,$str);
}
function musicTest () {
    if (empty($_POST["title"]))
    {
        $GLOBALS["musicName"]=true;
        $GLOBALS["bool_submit"]="添加失败，请填写歌曲名";
        return;
    }
    if (empty($_POST["author"]))
    {
        $GLOBALS["musicAuthor"]=true;
        $GLOBALS["bool_submit"]="添加失败，请填写歌手姓名";
        return;
    }
    if ($_FILES['cover']['error']!=UPLOAD_ERR_OK)
    {
        $GLOBALS["bool_submit"]="添加失败，请重新上传海报";
        return;
    }else {
        $name_jpg=substr($_FILES['cover']['name'],-4);
        if (strcmp($name_jpg,'.jpg')!=0)
        {
            $GLOBALS["bool_submit"]="添加失败，请上传.jpg格式海报";
            return;
        }else if (!move_uploaded_file($_FILES['cover']['tmp_name'],'img/'.trimall($_FILES['cover']['name'])))
        {
            $GLOBALS["bool_submit"]="添加失败，请重新上传海报";
            return;
        }
    }

    if ($_FILES['mp3']['error']!=UPLOAD_ERR_OK)
    {
        $GLOBALS["bool_submit"]="添加失败，请重新上传海报";
        return;
    }else {
        $name_mp3=substr($_FILES['mp3']['name'],-4);
        if (strcmp($name_mp3,'.mp3')!=0)
        {
            $GLOBALS["bool_submit"]="添加失败，请上传.mp3格式海报音乐";
            return;
        }else if (!move_uploaded_file($_FILES['mp3']['tmp_name'],'mp3/'.trimall($_FILES['mp3']['name'])))
        {
            $GLOBALS["bool_submit"]="添加失败，请重新上传音乐";
            return;
        }
    }

    $GLOBALS["bool_submit"]="添加成功,继续添加或返回音乐列表";

    $title=$_POST['title'];
    $author=$_POST['author'];
    $cover='img/'.trimall($_FILES['cover']['name']);
    $mp3='mp3/'.trimall($_FILES['mp3']['name']);

    $old_json=json_decode(file_get_contents('music.json'),true);  //解码

    $old_json[]=array(
        'id'=>uniqid(),
        'musicName'=>$title,
        'musicAuthor'=>$author,
        'musicCover'=>$cover,
        'musicMp3'=>$mp3
    );
    $new_json=json_encode($old_json);  //编码
    file_put_contents('music.json',$new_json);   //覆盖原来文件
}
if ($_SERVER["REQUEST_METHOD"]=="POST")
{
    musicTest();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>音乐表单</title>
    <link rel="stylesheet" href="css/bootstrap.css" />
</head>
<body>
    <div style="max-width: 740px;" class="container">
        <h1 class="display-3 my-3">添加音乐</h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">音乐标题</label>
                <input type="text" name="title" id="title" class="form-control
                <?php if (isset($GLOBALS['musicName'])&&$GLOBALS['musicName']): ?>
                	<?php echo 'is-invalid'; ?>
                <?php endif ?>"
                value="<?php if (isset($_POST['title'])): ?><?php echo $_POST['title'] ?><?php endif ?>"
                />
                <small class="invalid-feedback">请输入标题</small>
            </div>
            <div class="form-group">
                <label for="author">歌手</label>
                <input type="text" name="author" id="author" class="form-control
                <?php if (isset($GLOBALS['musicAuthor'])&&$GLOBALS['musicAuthor']): ?>
                    <?php echo 'is-invalid'; ?>
                <?php endif ?>"
                 value="<?php if (isset($_POST['author'])): ?><?php echo $_POST['author'] ?><?php endif ?>"
                />
                <small class="invalid-feedback">请输入歌手</small>
            </div>
            <div class="form-group">
                <label for="cover">海报</label><br>
                <input type="file" name="cover" id="cover" />
            </div>
            <div class="form-group">
                <label for="mp3">音乐文件</label><br>
                <input type="file" name="mp3" id="mp3" />
            </div>
            <div class="form-group float-right">
                    <?php if (isset($GLOBALS['bool_submit'])): ?>
                        <div class="alert alert-primary" role="alert">
                    	    <?php echo $GLOBALS['bool_submit'] ?>
                        </div>
                    <?php endif ?>
                <button type="submit" class="btn btn-primary btn-lg my-3 mx-3">添加</button>
                <button type="button" class="btn btn-secondary btn-lg my-3 mx-3" onclick="location.href='index.php'">返回音乐列表</button>
            </div>
        </form>
    </div>

</body>
</html>
