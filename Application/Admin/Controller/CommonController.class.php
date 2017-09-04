<?php
namespace Admin\Controller;

use Think\Controller;

class CommonController extends Controller
{
    // 接口返回数据格式
    public $data = [
        'data' => [], 
        'success' => 'Success',
        'message' => null,  // 参数错误;没有权限;没有此数据;等
    ];    
    Public function _initialize()
    {
        if (!I('session.AdminId')) {
            if (CONTROLLER_NAME != 'Admin' || ACTION_NAME != 'login') {
                $this->redirect('Admin/Admin/login');
            }
        }           
    }
}