<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/4/18
 * Time: 15:48
 */

namespace Home\Controller;
use Think\Controller;


Class UpdatePwdController extends CommonController
{
    public function index () {
        $UserId = $_SESSION['UserId'];
        $this->assign('userid', $UserId);
        $this->display();
    }

    public function handle () {
        $newPwd = I('newPwd');
        $oldPwd = I('oldPwd');
        $id = $_SESSION['UserCardCode'];
        $APNS_Token = C('ak');
        $Rest_Auth = '';
        $vid = '';

        $param = array(
            'newPwd'    =>  $newPwd,
            'oldPwd'    =>  $oldPwd,
            'id'        =>  $id,
            'APNS_Token'=>  $APNS_Token,
            'Rest_Auth' =>  $Rest_Auth,
            'vid'       =>  $vid,
        );
        $url = C('url'). '/NDAppWebService.asmx/memberpwdupdate';
        $result =  http($url, $param, 'POST', array("Content-Type: application/x-www-form-urlencoded"));
        $dom = new \DOMDocument();
        $dom->loadXML($result);
        $data = $dom->getElementsByTagName('Response')->item(0)->nodeValue;	//获取JSON字符串
//        $data=json_decode($json, true);
//        dump($data);
        $this->AjaxReturn($data);
    }
}