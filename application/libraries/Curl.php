<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Curl {

    function login_post($url,$cookie_jar,$post)
   {
    $ch = curl_init();//初始化curl模块
    curl_setopt($ch, CURLOPT_URL, $url);//登录提交的地址
    curl_setopt($ch, CURLOPT_HEADER, 0);//是否显示头信息  0 否
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); //是否自动显示返回的信息
    curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_jar); //设置Cookie信息保存在指定的文件中
    curl_setopt($ch, CURLOPT_POSTFIELDS,$post);//要提交的信息
    $result = curl_exec($ch); //执行cURL
    curl_close($ch); //关闭cURL资源，并且释放系统资源
}
//登陆后获取数据
function get_content($url,$cookie_jar)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_jar);//读取cookie
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
}