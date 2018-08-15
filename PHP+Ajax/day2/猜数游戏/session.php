<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/26
 * Time: 10:26
 */

    //找到一个属于当前访问者的箱子
    //并且把箱子的钥匙(session_id) 交给用户(cookie)
    session_start();
    if (empty($_SESSION['text_num'])) {
        $_SESSION['text_num']=rand(0,100);
        $_SESSION['time_num']=0;

    }else {
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            textNumber();
        }
    }
    function textNumber () {
        if (empty($_POST['num'])) {
            $GLOBALS['message']='请输入你所猜的数字';
            return;
        }
        if ( $_SESSION['time_num']==10) {
            $GLOBALS['message']='10次机会已经用完啦，刷新页面，再来吧';
            unset($_SESSION['text_num']);
            unset($_SESSION['time_num']);
            return;
        }
        $client_num=$_POST['num'];
        $text_num=$_SESSION['text_num'];

        if ($client_num==$text_num) {
            $GLOBALS['message']='恭喜你，猜对啦，刷新页面，可以再来哟';
            unset($_SESSION['text_num']);
            unset($_SESSION['time_num']);
            return;
        }
        if ($client_num<$text_num) {
            $_SESSION['time_num']=$_SESSION['time_num']+1;
            $GLOBALS['message']='您猜小了哟';
        }else {
            $_SESSION['time_num']=$_SESSION['time_num']+1;
            $GLOBALS['message']='您猜大了哟';
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>猜数字</title>
    <style>
        body {
            padding: 100px 0;
            background-color: #2b3b49;
            color: #fff;
            text-align: center;
            font-size: 2.5em;
        }
        input {
            padding: 5px 20px;
            height: 50px;
            background-color: #3b4b59;
            border: 1px solid #c0c0c0;
            box-sizing: border-box;
            color: #fff;
            font-size: 20px;
        }
        button {
            padding: 5px 20px;
            height: 50px;
            font-size: 16px;
        }
        .p {
            color: red;
            font-size: 18px;
        }
    </style>
</head>
<body>
<h1>猜数字游戏</h1>
<p>Hi，我已经准备了一个0~100的数字，你需要在仅有的10机会之内猜对它。</p>
<?php if (isset($GLOBALS['message'])): ?>
    <p class="p"><?php echo $GLOBALS['message']; ?></p>
<?php endif ?>
<form action="session.php" method="post">
    <input type="number" min="0" max="100" name="num" placeholder="随便猜">
    <button type="submit">试一试</button>
</form>
</body>
</html>
