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
    Public function _initialize () {
        if(!$_SESSION['LoginStatus']) {
            $this->redirect('Home/Login/index');
        }
    }
}

?>