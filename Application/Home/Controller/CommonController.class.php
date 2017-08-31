<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/3/17
 * Time: 22:42
 */
namespace Home\Controller;
use Think\Controller;

Class CommonController extends Controller {
    // 接口返回数据格式
    public $data = [
        'data' => [], 
        'success' => 'Success',
        // 'message' => null,  // 参数错误;没有权限;没有此数据;等
    ];
    Public function _initialize () {
        if(!$_SESSION['LoginStatus']) {
            $this->redirect('Home/Login/index');
        }
    }
}

?>