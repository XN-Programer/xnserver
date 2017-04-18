<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/3/29
 * Time: 19:04
 */

namespace Home\Controller;
use Think\Controller;

header("Content-type: text/html; charset=utf-8");
class BookRetrievalController extends CommonController
{
    public function index () {
        $this->assign('data', 1);
        $this->display();
    }

    public function searchbook() {
        $this->assign('data', 1);
        $this->display();
    }

    public function jycx() {
        $ak = C('ak');
        $id = $_SESSION['UserCardCode'];
        $pageindex = 0;
        $pagesize = 10;
        $param = array(
            'ak'    =>  $ak,
            'id'    =>  $id,
            'pageindex' =>  $pageindex,
            'pagesize'  =>  $pagesize
        );
        $url = C('url'). '/NDAppWebService.asmx/WSGetWjCx';
        $result = http($url, $param, 'POST', array("Content-type: application/x-www-form-urlencoded"));
        $dom = new \DOMDocument();
        $dom->loadXML($result);
        $json = $dom->getElementsByTagName('string')->item(0)->nodeValue;	//获取JSON字符串
        $data=json_decode($json, true);
        if ( $data['status'] ) {
            $this->assign('books', $data['TList']);
            $this->display();
        }
    }

    public function kscz() {
        $this->assign('data', 1);
        $a = C('a');
        $b = 1;
        $c = I('bname');
        $d = 1;
        $z1 = C('z1');
        $z2 = '';
        $z3 = '';
        $z4 = C('z4');
        $z5 = '';
        $url = C('tsurl');
        $param = array(
            'a'     =>  $a,
            'b'     =>  $b,
            'c'     =>  $c,
            'd'     =>  $d,
            'z1'    =>  $z1,
            'z2'    =>  $z2,
            'z3'    =>  $z3,
            'z4'    =>  $z4,
            'z5'    =>  $z5
        );

        $result = http($url, $param, 'GET', array("Content-type: Application/json"));
        $data = json_decode($result, true);
//        dump($data);
        if (!($data['error'])) {
//            $this->assign('count', $data[]);
            $this->assign('count', $data['FindCount']);
            $this->assign('books', $data['find_ifa_FindFullPage_list1']);
        }
        $this->display();
    }

    public function gjjs() {
        $this->assign('data', 1);
        $a = C('a');
        $b = 1;
        $c = 1;
        $d = 1;
        $e = I('bname');
        $f = I('bauthor');
        $g = I('bpublish');
        $h = '';
        $i = '';
        $j = '';
        $z1 = C('z1');
        $z2 = '';
        $z3 = '';
        $z4 = C('z4');
        $z5 = '';
        $url = C('gjurl');
        $param = array(
            'a'     =>  $a,
            'b'     =>  $b,
            'c'     =>  $c,
            'd'     =>  $d,
            'e'     =>  $e,
            'f'     =>  $f,
            'g'     =>  $g,
            'h'     =>  $h,
            'i'     =>  $i,
            'j'     =>  $j,
            'z1'    =>  $z1,
            'z2'    =>  $z2,
            'z3'    =>  $z3,
            'z4'    =>  $z4,
            'z5'    =>  $z5
        );

        $result = http($url, $param, 'GET', array("Content-type: Application/json"));
        $data = json_decode($result, true);
//        dump($data);
        if ($data['find_ifa_FindCombPage_list1'].length) {
            $this->assign('count', $data['FindCount']);
            $this->assign('books', $data['find_ifa_FindCombPage_list1']);
        } else {

        }

        $this->display();
    }

    public function wz() {
        $a = C('a');
        $b = I('CtrlRd');
//        $b = 'LR4A0AS2C4';
        $z1 = C('z1');
        $z2 = '';
        $z3 = '';
        $z4 = C('z4');
        $z5 = '';
        $url = C('wzurl');
        $param = array(
            'a'     =>  $a,
            'b'     =>  $b,
            'z1'    =>  $z1,
            'z2'    =>  $z2,
            'z3'    =>  $z3,
            'z4'    =>  $z4,
            'z5'    =>  $z5
        );

        $result = http($url, $param, 'GET', array("Content-type: Application/json"));
        $data = json_decode($result, true);
        if (!($data['error'])) {
            $this->AjaxReturn($data);
        }
    }
}