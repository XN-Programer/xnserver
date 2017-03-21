<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/3/19
 * Time: 20:31
 */

namespace Home\Controller;
use Think\Controller;

Class CScheduleController extends CommonController  {
    Public function index() {
        $this->display();
    }
/*
 * 个人课表查询
 *
 * */
    Public function personkb() {
        $vid = C('ak');
        $id = $_SESSION['UserCardCode'];
        $weeks = '';
        $Term = '';
        $data = $this->getTerm();
        $length = sizeof($data);
        $Term = $data[$length - 1];
        $begindate = $Term['begindate'];
        $enddate = $Term['enddate'];
        $Term = $Term['class_year'].$Term['class_term'];
//        dump($begindate);
        $this->display();

    }

    Public function classkb() {

    }

    Public function getTerm() {
        $nowYear = date('Y'); //获取学期时间所需要的参数
        $param = array(
            'dt' => $nowYear
        );
        $termUrl = C('url') . '/NDAppWebService.asmx/GetTerm';
        $result = http($termUrl, $param, 'POST', array("Content-Type: application/x-www-form-urlencoded"));
        $dom = new \DOMDocument();
        $dom->loadXML($result);
        $json = $dom->getElementsByTagName('string')->item(0)->nodeValue;	//获取JSON字符串
        $data=json_decode($json, true);
        $data = $data['Response'];
        return $data;

    }
}