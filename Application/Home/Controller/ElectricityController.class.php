<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/3/23
 * Time: 19:06
 */

namespace Home\Controller;
use Think\Controller;

Class ElectricityController extends CommonController  {
    public function index() {
        $data = '1';
        $this->assign('data', $data)->display();
    }

    public function getApart() {
        $url = C('url') . '/MUIInterface.asmx/GETROOM';
        $userId = $_SESSION['UserCardCode'];
        $PriDormID = I('PriDormId');
        $ak = C('ak');
        $sign = md5('userId='.$userId.'PriDormID='.$PriDormID.$ak);

        $param = array(
            'ak' => $ak,
            'userId' => $userId,
            'PriDormID' => $PriDormID,
            'sign' => $sign
        );

        $result = http($url, $param, 'POST', array("Content-Type: application/x-www-form-urlencoded"));
        $dom = new \DOMDocument();
        $dom->loadXML($result);
        $json = $dom->getElementsByTagName('string')->item(0)->nodeValue;	//获取JSON字符串
        $data=json_decode($json, true);
//        dump($data);
        if ($data['Status'] == '1') {
            $data = $data['rList'];
        }else {
            $data = null;
        }
        $this->AjaxReturn($data);
    }

    public function EnergyQuery () {
        $url = C('url'). '/MUIInterface.asmx/EnergyQuery';
        $userId = $_SESSION['UserCardCode'];
        $Room = I('Room');
        $Time = I('Time');
        $ak = C('ak');
        $sign = md5('userId=' . $userId . "Room=" . $Room . "Time=" . $Time . $ak);
        $param = array(
            'userId' => $userId,
            'Room' => $Room,
            'Time' => $Time,
            'ak' => $ak,
            'sign' => $sign
        );
        $result = http($url, $param, 'POST', array("Content-Type: application/x-www-form-urlencoded"));
        $dom = new \DOMDocument();
        $dom->loadXML($result);
        $json = $dom->getElementsByTagName('string')->item(0)->nodeValue;	//获取JSON字符串
        $data=json_decode($json, true);
        $this->ajaxReturn($data);
    }

    public function QuerySurplus() {
        $url = C('url') . '/MUIInterface.asmx/QuerySurplus';
        $ak = C('ak');
        $Room = I('Room');
        $userId = $_SESSION['UserCardCode'];
        $Time = I('Time');
        $sign = md5('userId=' . $userId . "Room=" . $Room . "Time=" . $Time . $ak);
        $param = array(
            'userId' => $userId,
            'Room' => $Room,
            'Time' => $Time,
            'ak' => $ak,
            'sign' => $sign
        );
        $result = http($url, $param, 'POST', array("Content-Type: application/x-www-form-urlencoded"));
        $dom = new \DOMDocument();
        $dom->loadXML($result);
        $json = $dom->getElementsByTagName('string')->item(0)->nodeValue;	//获取JSON字符串
        $data=json_decode($json, true);
        $this->ajaxReturn($data);
    }
}
?>