<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/4/9
 * Time: 14:46
 */

namespace Home\Controller;
use Think\Controller;

header("Content-type: text/html; charset=utf-8");
class CardController extends CommonController
{
    public function index () {
        $UserId = $_SESSION['UserId'];
        $ak = C('ak');
        $id = $_SESSION['UserCardCode'];
        $url = C('url') . '/NDAppWebService.asmx/GettranItem';

        $param = array(
            'ak'    =>  $ak,
            'id'    =>  $id
        );
        $result = http($url, $param, 'GET', array("Content-type: application/x-www-form-urlencoded"));
        $dom = new \DOMDocument();
        $dom->loadXML($result);
        $json=$dom->getElementsByTagName('string')->item(0)->nodeValue;	//获取JSON字符串
        $this->assign('userid', $UserId);
        $data = json_decode($json, true);
        if($data['status'] == 1) {
            $this->assign('TranItem', $data['TranItemDTO']);
        } else {
            $this->assign('data', $data['Msg']);
        }

        $this->assign('data', 1);
        $this->assign('UserId', $UserId);
        $this->display();
    }

    public function showlist () {
        $bdate = I('bdate');
        $edate = I('edate');
        $Code = I('code');
        $this->assign('bdate', $bdate);
        $this->assign('edate', $edate);
        $this->assign('Code', $Code);
        $this->assign('data', 1);
        $this->display();

    }

    public function getData () {
        $UserId = $_SESSION['UserId'];
        $ak = C('ak');
        $id = $_SESSION['UserCardCode'];
        $bdate = I('bdate');
        $edate = I('edate');
        $Code = I('Code');
        $pageindex = I('pageindex');
        $bdate = str_replace('-', '', $bdate);
        $edate = str_replace('-', '', $edate);
        $param = array(
            'SessionId' => '',
            'ak'        => $ak,
            'id'        => $id,
            'CardId'    => $UserId,
            'bData'     => $bdate,
            'eData'     => $edate,
            'Code'      => $Code,
            'pageindex'   => $pageindex,
            'pageSize'  => 10
        );

        $url = C('url'). '/NDAppWebService.asmx/GetBrows';

        $result = http($url, $param, 'POST', array("Content-type: application/x-www-form-urlencoded"));
        $dom = new \DOMDocument();
        $dom->loadXML($result);
        $json = $dom->getElementsByTagName('string')->item(0)->nodeValue;	//获取JSON字符串
        $data=json_decode($json, true);
//        dump($data['RList']['pageDTO']);
//        $this->assign('pages', $data['RList']['pageDTO']);
        $this->AjaxReturn($data);

//        $this->assign('page', $data['RList']['pageDTO']);
//        $this->assign('list', $data['RList']['webTrjnDTO']);
    }

    public function guashi () {

    }

}