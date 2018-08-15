<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/7/21
 * Time: 11:46
 */


    /*
     * require 一旦被载入的文件不存在，就会报一个致命的错误
     * */
    require "php-const.php";
    echo SYSTEM_NAME;

    /*
     * include 载入文件不存在，则不会报错
     * */
    include "php-const.php";