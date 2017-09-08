<?php
namespace Admin\Controller;

use Admin\Controller\CommonController;

class UserController extends CommonController
{
    public function index()
    {
        $search = 1;
        $where['data_state'] = ['BETWEEN', '1,2'];
        $User = D('User');
        if (I('get.')) {
            $get = I('get.');
            if (isset($get['data_state']) && $get['data_state'] == 3) {
                $where['data_state'] = 3;
                $search = 3;
            }
            //url接受到的页码参数，从查询条件中去掉以免影响查询结果
            if (isset($this->where['p'])) {
                unset($this->where['p']);
            }
        }
        $count = $User->scope('common')->count();
        $Page = new \Think\Page($count, 20);
        $show = $Page->show();
        $list = $User->scope('common')->where($where)->relation(true)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $this->assign('search', json_encode($search));
        $this->assign('totalPages', $Page->totalPages);
        $this->assign('list', $list);
        $this->assign('page', $show);
        $this->display();
    }
    public function update()
    {
        if (I('post.')) {
            $data = I('post.');
            $User = M('User');
            $User->find($data['id']);
            if (isset($User->id)) {
                $old_data_state = $User->data_state;
                if (!$User->create($data)) {
                    $this->data['success'] = false;
                }
                else {
                    // 前端 1为正常，3为禁用
                    if ($old_data_state == 1 || $old_data_state == 2) {
                        // 原本正常
                        if ($User->data_state == 1) {
                            // 改为正常，则不变；
                            $User->data_state = $old_data_state;
                        }
                    }
                    // 若本来禁用，改为正常，变为1未报修,已对应。
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
        return $this->ajaxReturn($this->data);
    }
    public function delete()
    {
        if (I('post.')) {
            $data = I('post.');
            $User = M('User');
            $User->find($data['id']);
            if (isset($User->id)) {
                $User->data_state = 0;
                $result = $User->save();
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

}