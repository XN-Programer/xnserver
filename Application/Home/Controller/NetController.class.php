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
        $model = M('User');
        $stu_code = I('session.UserId');
        $where['stu_code'] = $stu_code;
        $where['data_state'] = array(EGT, 1);
        $User = $model->where($where)->find();
        if (isset($User)) {
            unset($User['update_at'], $User['create_at']);
            $Apartment = D('Apartment');
            $User['apartment'] = $Apartment->exchange($User['apartment']);
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
    public function test(){
        $User = D('User');
        $where_u['stu_code'] = I('session.UserId');
        $user_data = $User->relation(true)->scope('isPostNet')->where($where_u)->find();
        dump($user_data);    
        $Net_list = D('Net_list');
        $where_n['u_id'] = 21;
        $net_data = $Net_list->relation(true)->where($where_n)->find();
        dump($net_data);
    }
    // 获取故障单
    public function Get_NetList()
    {
        $User = D('User');
        $where_u['stu_code'] = I('session.UserId');
        $user_data = $User->scope('isPostNet')->where($where_u)->find();
        if (isset($user_data)) {// 该用户是否已报修
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
        // 判断学号是否存在,暂时不做
        $User = D('User');
        $data = I('post.');
        $Apartment = D('Apartment');
        $data['apartment'] = $Apartment->exchange($data['apartment']);
        $data['name'] = I('session.UserName');
        $data['stu_code'] = I('session.UserId');
        if (!$User->create($data)) {
            // exit($User->getError());
            $this->data['success'] = false;
        }
        else {
            // 如何判断是否插入成功
            $result = $User->add();
            $this->data['data'] = $result;
        }
        $this->ajaxReturn($this->data);
    }
    // API - 修改用户
    public function User_Update()
    {
        $User = D('User');
        $data = I('post.');
        $Apartment = D('Apartment');
        $data['apartment'] = $Apartment->exchange($data['apartment']);
        $data['name'] = I('session.UserName');
        $where['stu_code'] = I('session.UserId');
        if (!$User->create($data)) {
            $this->data['success'] = false;
        }
        else {
            $result = $User->where($where)->save();
            if (gettype($result) != 'integer') {
                $this->data['success'] = false;
            }
            else {
                $this->data['data'] = $result;
            }
        }
        $this->ajaxReturn($this->data);

    }    
    // API - 新增网络故障单
    public function NetList_Create()
    {
        $Net_list = D('Net_list');
        $data = I('post.');
        $User = M('User');
        $User->getByStu_code(I('session.UserId'));
        if (isset($User->id)) {//true则user表有数据
            $data['u_id'] = $User->id;
            $data['apartment'] = $User->apartment;
            $data['address'] = $User->address;
            if (!$Net_list->create($data)) {
                $this->data['success'] = false;
            }
            else {
                $result = $Net_list->add();
                $this->data['data'] = $result;
                // 用户 状态 变为 已报修
                $User->data_state = 2;
                $User->save();
            }
        }
        else {
            $this->data['success'] = false;
        }
        $this->ajaxReturn($this->data);
    }
}