<?php
namespace Admin\Controller;

use Admin\Controller\CommonController;

class AdminController extends CommonController
{
    public function index()
    {
        $this->display();
    }
    public function login()
    {
        if (I('session.AdminId') != null) {
            $this->redirect('Admin/Net/index');
        }
        if (I('post.') != null) {
            $data = I('post.');
            $Admin = D('Net_admin');
            $where['username'] = $data['username'];
            $Admin->where($where)->scope('common')->find();
            if (isset($Admin->id) && $Admin->password === md5($data['password'])) {
                session('AdminId',$Admin->id);
                session('AdminUsername',$Admin->username);
                session('Adminlevel',$Admin->data_state);
                session('AdminNickname',$Admin->nickname);
            }
            else {
                $this->data['success'] = false;
            }
            $this->ajaxReturn($this->data);
        }
        $this->display();
    }
}