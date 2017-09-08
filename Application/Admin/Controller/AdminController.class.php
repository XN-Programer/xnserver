<?php
namespace Admin\Controller;

use Admin\Controller\CommonController;

class AdminController extends CommonController
{
    // 暂时这样做权限认证
    public function _before_index()
    {
        if (I('session.AdminId') && I('session.AdminLevel') != 2) {
            $this->redirect('Admin/NetList/index');
        }
    }
    public function index()
    {
        $Admin = D('Net_admin');
        $count = $Admin->scope('common')->count();
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $list = $Admin->scope('common')->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('totalPages', $Page->totalPages);
        $this->assign('list', $list);
        $this->assign('page', $show);
        $this->display();
    }
    public function create()
    {
        if (I('post.')) {
            $data = I('post.');
            $Admin = D('Net_admin');
            if (!$Admin->create($data)) {
                // exit($Admin->getError());
                $this->data['success'] = false;
            }
            else {
                $result = $Admin->add();
                $this->data['data'] = $result;
            }
        }
        else {
            $this->data['success'] = false;
        }
        return $this->ajaxReturn($this->data);
    }
    public function update()
    {
        if (I('post.')) {
            $data = I('post.');
            $Admin = M('Net_admin');
            $Admin->find($data['id']);
            if (isset($Admin->id)) {
                if (!$Admin->create($data)) {
                    $this->data['success'] = false;
                }
                else {
                    $result = $Admin->save();
                    $this->data['data'] = $result;
                }
            }
            else {
                $this->data['success'] = false;
            }
        }
        else {
            $this->data['success'] = false;
        }
        return $this->ajaxReturn($this->data);
    }
    public function delete()
    {
        if (I('post.')) {
            $data = I('post.');
            $Admin = M('Net_admin');
            $Admin->find($data['id']);
            if (isset($Admin->id)) {
                $Admin->data_state = 0;
                $result = $Admin->save();
                $this->data['data'] = $result;
            }
            else {
                $this->data['success'] = false;
            }
        }
        else {
            $this->data['success'] = false;
        }
        return $this->ajaxReturn($this->data);
    }
    public function login()
    {
        if (I('session.AdminId') != null) {
            $this->redirect('Admin/Net/index');
        }
        if (I('post.')) {
            $data = I('post.');
            $Admin = D('Net_admin');
            $where['username'] = $data['username'];
            $Admin->scope('common')->where($where)->find();
            if (isset($Admin->id) && $Admin->password === md5($data['password'])) {
                session('AdminId', $Admin->id);
                session('AdminUsername', $Admin->username);
                session('AdminLevel', $Admin->data_state);
                session('AdminNickname', $Admin->nickname);
            }
            else {
                $this->data['success'] = false;
            }
            $this->ajaxReturn($this->data);
        }
        $this->display();
    }
}