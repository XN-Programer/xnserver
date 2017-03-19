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

    Public function personkb() {
        $data['name'] = 'lidawei';
        $this->AjaxReturn($data);
    }

    Public function classkb() {

    }
}