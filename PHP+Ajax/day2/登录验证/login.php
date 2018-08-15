<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/23
 * Time: 9:49
 */
    function trimall($str)//删除空格
    {
        $oldchar=array(" ","　","\t","\n","\r");
        $newchar=array("","","","","");
        return str_replace($oldchar,$newchar,$str);
    }
    function loginTell()
    {
        if (empty($_POST['userName'])){
            $GLOBALS['user_name_bool']=true;
            $GLOBALS["bool_submit"]="登录失败，请填写用户名";
            return;
        }
        if (empty($_POST['userPassword'])){
            $GLOBALS['user_password_bool']=true;
            $GLOBALS["bool_submit"]="登录失败，请填写密码";
            return;
        }

        $user_txt=file_get_contents("userNamePassword.txt");
        $user_txt_arr=explode("\n",$user_txt);
        foreach ($user_txt_arr as $key => $value) {
        	$user_txt_arr_ele[]=explode('|',$value);
        }
//        var_dump($user_txt_arr_ele);

        $userName=$_POST['userName'];
        $userPassword=$_POST['userPassword'];
        foreach ($user_txt_arr_ele as $key => $value) {
            $value[1]=trimall($value[1]);  //去除空格
            if ((strcmp($value[0],$userName)==0)&&(strcmp($value[1],$userPassword)==0))
            {
                $GLOBALS["bool_submit"]="登录成功";
                break;
            }else {
                $GLOBALS["bool_submit"]="登录失败";
                break;
            }
        }
    }


    if ($_SERVER['REQUEST_METHOD']=='POST')
    {

        loginTell();
    }


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录验证</title>
    <link rel="stylesheet" href="bootstrap.css" />
</head>
<body>
    <div style="max-width: 540px;" class="container">
        <h1 class="display-3 my-3">用户登录</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="username">用户名</label>
                <input type="text" name="userName" id="username" class="form-control
                <?php if (isset($GLOBALS['user_name_bool'])&&$GLOBALS['user_name_bool']): ?>
                	<?php echo 'is-invalid'; ?>
                <?php endif ?>"
                       value="<?php if (isset($_POST['userName'])): ?><?php echo $_POST['userName'] ?><?php endif ?>"
                />
                <small class="invalid-feedback">请输入用户名</small>
            </div>
            <div class="form-group">
                <label for="userpassword">密码</label>
                <input type="password" name="userPassword" id="userpassword" class="form-control
                <?php if (isset($GLOBALS['user_password_bool'])&&$GLOBALS['user_password_bool']): ?>
                	<?php echo 'is-invalid'; ?>
                <?php endif ?>"
                       value="<?php if (isset($_POST['userPassword'])): ?><?php echo $_POST['userPassword'] ?><?php endif ?>"
                />
                <small class="invalid-feedback">请输入密码</small>
            </div>
            <?php if (isset($GLOBALS['bool_submit'])): ?>
                <div class="alert alert-primary" role="alert">
                    <?php echo $GLOBALS['bool_submit'] ?>
                </div>
            <?php endif ?>
            <button type="submit" class="btn btn-primary btn-lg my-4 align-content-md-center">登录</button>
        </form>
    </div>
</body>
</html>
