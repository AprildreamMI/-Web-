<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/21
 * Time: 17:28
 */
if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if ($_POST["userName"]&&!(strcmp($_POST["userPassword"],$_POST["twoPassword"]))&&!(strcmp($_POST["protocal"],"yes"))){
        $date_arr[]=$_POST["userName"];
        $date_arr[]=$_POST["userPassword"];
        $date_str=implode("|",$date_arr);
        $date_str="\n".$date_str;
        echo $date_str;
        file_put_contents("userNamePasw",$date_str,FILE_APPEND);
    }else {
        echo "注册失败";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>写入表单数据到文本中</title>
    <style>
        table {
            text-align: right;
            margin: 100px auto;
        }
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method=post>
        <!--用户名：<label><input type=text name=userName /></label><br>
        密  码：<label><input type=text name=userPassword /></label><br>
        确认密码：<label><input type=text name=twoPassword /></label><br>
        <input type="checkbox" name="protocal" value="yes" />是否同意注册协议 <br>

        <button type=submit>注册</button>-->
        <table>
            <tr>
                <td><label for="userName">用户名</label></td>
                <td><input type=text name=userName id="userName" /></td>
            </tr>
            <tr>
                <td><label for="userPassword">密码</label></td>
                <td><input type=text name=userPassword id=userPassword /></td>
            </tr>
            <tr>
                <td><label for="twoPassword">确认密码</label></td>
                <td><input type=text name=twoPassword id=twoPassword /></td>
            </tr>
            <tr>
                <td></td>
                <td><label><input type="checkbox" name="protocal" value="yes" />是否同意注册协议</label></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type=submit>注册</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
