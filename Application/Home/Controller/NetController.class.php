<?php

/**
 *  网络报修  
 */
namespace Home\Controller;

use Home\Controller\CommonController;
use Common\Model\UserModel;

class NetController extends CommonController
{
    public function index()
    {
        $this->display();
    }
    /********** Get接口 ***********/
    // APi - 获取当前登录用户数据
    public function Get_User()
    {
        $model = D('User');
        $stu_code = I('session.UserId');
        $where['stu_code'] = $stu_code;
        $User = $model->scope('common')->where($where)->find();
        if (isset($User)) {
            $User['apartment'] = D('Apartment')->exchange($User['apartment']);
            $this->data['data'] = $User;
        }
        else {
            $data['name'] = I('session.UserName');
            $data['stu_code'] = $stu_code;
            $this->data['data'] = $data;
            $this->data['success'] = false;
        }
        $this->ajaxReturn($this->data);
    }
    // 获取故障单
    public function Get_NetList()
    {
        $User = D('User');
        $where_u['stu_code'] = I('session.UserId');
        $user_data = $User->scope('isPostNet')->where($where_u)->find();
        if (isset($user_data)) {// 该用户是否已报修
            $Apartment = D('Apartment');
            $user_data['apartment'] = $Apartment->exchange($user_data['apartment']);
            $Net_list = D('Net_list');
            $where_n['u_id'] = $user_data['id'];
            $net_data = $Net_list->scope('toUser')->where($where_n)->find();
            if (isset($net_data)) {// 是否查到故障单
                unset($user_data['id']);
                $this->data['data'] = array_merge($user_data, $net_data);
            }
            else {
                $this->data['success'] = false;
            }
        }
        else {
            $this->data['success'] = false;
        }
        $this->ajaxReturn($this->data);
    }
    // API - 获取公寓
    public function Get_Apartment()
    {
        $model = D('Apartment');
        $Apartments = $model->scope('common')->select();
        $this->ajaxReturn($Apartments);
    }
    /********** 其它接口 ***********/
    // API - 新增用户
    public function User_Create()
    {
        if ($data = I('post.')) {
        // 判断学号是否存在,暂时不做
            $User = D('User');
            $data['apartment'] = D('Apartment')->exchange($data['apartment']);
            $data['name'] = I('session.UserName');
            $data['stu_code'] = I('session.UserId');
            if (!$User->create($data)) {
                $this->data['success'] = false;
            }
            else {
            // 如何判断是否插入成功
                $result = $User->add();
                $this->data['data'] = $result;
            }
        }
        else {
            $this->data['success'] = false;
        }
        $this->ajaxReturn($this->data);
    }
    // API - 修改用户
    public function User_Update()
    {
        // 用户数据修改应该 用传过来的uid而不是当前session，因为可能会被管理员修改，当然通过这里修改只有用户本人用..
        if ($data = I('post.')) {
            $User = D('User');
            $data['apartment'] = D('Apartment')->exchange($data['apartment']);
            $User->find($data['id']);
            if (isset($User->id)) {
                if (!$User->create($data)) {
                    $this->data['success'] = false;
                }
                else {
                    $result = $User->save();
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
        $this->ajaxReturn($this->data);
    }    
    // API - 新增网络故障单
    public function NetList_Create()
    {
        if ($data = I('post.')) {
            $NetList = D('Net_list');
            $User = M('User');
            $User->find($data['u_id']);
            if (isset($User->id) && $User->data_state == 1) {//true则user表有数据
                $data['username'] = $User->name;
                $data['phone'] = $User->phone;
                $data['apartment'] = $User->apartment;
                $data['address'] = $User->address;
                if (!$NetList->create($data)) {
                    $this->data['success'] = false;
                }
                else {
                    $result = $NetList->add();
                    $this->data['data'] = $result;
                // 用户 状态 变为 已报修
                    $User->data_state = 2;
                    $User->save();
                }
            }
            else {
                $this->data['success'] = false;
            }
        }
        else {
            $this->data['success'] = false;
        }
        $this->ajaxReturn($this->data);
    }
    // API - 修改网络故障单    
    public function NetList_Update()
    {
        // 能看到故障单说明 人 d 2 ； 单 d 1
        // 改故障单数据
        // 改用户数据
        if ($data = I('post.')) {
            $NetList = D('Net_list');
            $User = M('User');
            $User->find($data['u_id']);
            if (isset($User->id) && $User->data_state == 1) {//true则user表有数据
                $data['username'] = $User->name;
                $data['phone'] = $User->phone;
                $data['apartment'] = $User->apartment;
                $data['address'] = $User->address;
                if (!$NetList->create($data)) {
                    $this->data['success'] = false;
                }
                else {
                    $result = $NetList->add();
                    $this->data['data'] = $result;
                // 用户 状态 变为 已报修
                    $User->data_state = 2;
                    $User->save();
                }
            }
            else {
                $this->data['success'] = false;
            }
        }
        else {
            $this->data['success'] = false;
        }
        $this->ajaxReturn($this->data);
    }
}