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
        if(!empty($_SESSION['ClassesName'])){
            $classname = $_SESSION['ClassesName'];
        } else {
            $classname = 1;
        }
        $this->assign('data', $classname)->display();
    }
/*
 * 个人课表查询
 *
 * */
    Public function personkb() {
        $data = $this->getTerm();
        $length = sizeof($data);
        $Term = $data[$length - 1];
        $begindate = $Term['begindate'];
        $enddate = $Term['enddate'];
        $Term = $Term['class_year'].$Term['class_term'];
        $username = $_SESSION['UserName'];
        $month = date('n') . '月';
        $data = array(
            'name' => $username,
            'month' => $month,
            'begindate' => $begindate,
            'enddate' => $enddate
        );
        $this->assign('kb', $data)->display();
    }

    Public function handlepersonkb() {
        $weeks = I('week');
        $vid = C('ak');
        $id = $_SESSION['UserCardCode'];
        $Term = '';
        $data = $this->getTerm();
        $length = sizeof($data);
        $Term = $data[$length - 1];
        $Term = $Term['class_year'].$Term['class_term'];
        $param = array(
            'vid' => $vid,
            'id'  => $id,
            'weeks' => $weeks,
            'Term'  => $Term
        );
        $url = C('url') . '/NDAppWebService.asmx/GetStudentsKb';
        $result = http($url, $param, 'POST', array("Content-Type: application/x-www-form-urlencoded"));
        $dom = new \DOMDocument();
        $dom->loadXML($result);
        $json = $dom->getElementsByTagName('string')->item(0)->nodeValue;	//获取JSON字符串
        $data=json_decode($json, true);
        $data = $data['Response'];
        $this->AjaxReturn($data);
    }



    Public function classkb() {
        if(!empty($_SESSION['ClassesName'])){
            $classname = $_SESSION['ClassesName'];
        } else {
            $classname = I('cname');
        }
        $Term = '';
        $data = $this->getTerm();
        $length = sizeof($data);
        $Term = $data[$length - 1];
        $begindate = $Term['begindate'];
        $enddate = $Term['enddate'];
        $Term = $Term['class_year'].$Term['class_term'];

        $username = $_SESSION['UserName'];
        $month = date('n') . '月';
        $data = array(
            'name' => $username,
            'month' => $month,
            'begindate' => $begindate,
            'enddate' => $enddate,
            'classname' => $classname
        );

        $this->assign('kb', $data)->display();
    }

    Public function handleclasskb() {
        $vid = C('ak');
        $weeks = I('week');
        $classname = I('classname');
        $data = $this->getTerm();
        $length = sizeof($data);
        $Term = $data[$length - 1];
        $Term = $Term['class_year'].$Term['class_term'];
        $param = array(
            'vid' => $vid,
            'classname'  => $classname,
            'weeks' => $weeks,
            'Term'  => $Term
        );
        $url = C('url') . '/NDAppWebService.asmx/GetClassnameKb';
        $result = http($url, $param, 'POST', array("Content-Type: application/x-www-form-urlencoded"));
        $dom = new \DOMDocument();
        $dom->loadXML($result);
        $json = $dom->getElementsByTagName('string')->item(0)->nodeValue;	//获取JSON字符串
        $data=json_decode($json, true);
        $data = $data['Response'];
        $this->AjaxReturn($data);

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
?>