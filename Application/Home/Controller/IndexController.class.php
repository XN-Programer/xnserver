<?php
/**
 * Created by PhpStorm.
 * User: liwei
 * Date: 2017/3/19
 * Time: 20:31
 */
namespace Home\Controller;
use Think\Controller;
class IndexController extends CommonController {
    public function index(){
        $this->display();
    }

    public function login() {
        $this->display();
    }
}
?>