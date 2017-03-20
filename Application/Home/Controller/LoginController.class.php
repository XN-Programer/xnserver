<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/3/17
 * Time: 22:42
 */

namespace Home\Controller;
use Think\Controller;
use Think\Exception;

Class LoginController extends Controller {

    Public function index() {
        $this->display();
    }

    Public function handle() {
        $userid = $_POST["userid"];
        $passwd = $_POST["passwd"];
        $ak = C('ak');
        $url = C('url'). '/NDAppWebService.asmx/WSMemberLogin';
        $param = array(
            'ak' => $ak,
            'id' => $userid,
            'password' => $passwd,
            'BDUserId' => ''
        );
        $result = http($url, $param, 'POST', array("Content-Type: application/x-www-form-urlencoded"));
        $dom = new \DOMDocument();
        $dom->loadXML($result);
        $json=$dom->getElementsByTagName('string')->item(0)->nodeValue;	//获取JSON字符串
        $data=json_decode($json);
        $loginStatus = $data->status;
        if (!$loginStatus) {
            echo "<script>";
            echo "alert('";
            echo "Password error or username error!" ;
            echo "');window.history.go(-1);</script>";
        } else {
            echo $data->Userinfo->Name;
            session('LoginStatus', $loginStatus);  //获取登陆状态 1=》成功   0=》失败  此处必定为1
            session('UserCardCode', $data->Userinfo->CardCode); //获取卡号17位（此处非学号号，ex:20141114095332308）
            session('UserName', $data->Userinfo->Name); //获取姓名
            session('UserSex', $data->Userinfo->Sex);   //获取性别
            session('UserType', $data->Userinfo->Type); //获取账号类型
            session('UserGrade', $data->Userinfo->Grade);   //获取年级
            $this->redirect('Home/Index/Index');
        }




    }
}
