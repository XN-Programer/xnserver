<?php
namespace Admin\Controller;

use Admin\Controller\CommonController;

class NetListController extends CommonController
{
    protected $where = [];  //查询条件
    protected $select = []; //二级联动搜索
    protected $word = [];   //文字搜索
    protected $scope = 'common';    //非文字搜索时用 common 条件查找数据
    public function index()
    {
        $NetList = D('Net_list');
        if (I('get.')) {
            $this->where = I('get.');
            if (isset($this->where['word'])) {
                $this->searchWord();
            }
            else {
                $this->searchSelect();
            }
            if (isset($this->where['p'])) {
                unset($this->where['p']);   //url接受到的页码参数，从查询条件中去掉以免影响查询结果
            }
        }
        $count = $NetList->scope($this->scope)->where($this->where)->count();
        $Page = new \Think\Page($count, 10);
        foreach ($this->where as $key => $val) {
            $Page->parameter[$key] = urlencode($val);
        }
        $show = $Page->show();
        $data_net_list = $NetList->scope($this->scope)->where($this->where)->relation(true)->limit($Page->firstRow . ',' . $Page->listRows)->select();
        $data_admin = D('Net_admin')->scope('toSelect')->select();
        $data_apartment = D('Apartment')->scope('common')->select();
        $this->assign('wordSearchResult', json_encode($this->word));
        $this->assign('selectSearchResult', json_encode($this->select));
        $this->assign('apartment', $data_apartment);
        $this->assign('admin', $data_admin);
        $this->assign('net_list', $data_net_list);
        $this->assign('totalPages', $Page->totalPages);
        $this->assign('page', $show);
        $this->display();
    }
    public function create()
    {
        if (I('post.')) {
            $data = I('post.');
            $NetList = D('Net_list');
            if (!$NetList->create($data)) {
                // exit($Admin->getError());
                $this->data['success'] = false;
            }
            else {
                $result = $NetList->add();
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
        // 禁用判断是否禁用用户
        if (I('post.')) {
            $data = I('post.');
            $NetList = M('Net_list');
            $NetList->find($data['id']);
            if (isset($NetList->id)) {
                if (!$NetList->create($data)) {
                    $this->data['success'] = false;
                }
                else {
                    // 恶意报修的 禁用 对应用户（若存在）
                    // 这里属于业务逻辑，应该放在模型里
                    if ($NetList->data_state == 3 && $NetList->u_id != 0) {
                        $User = M('User');
                        $User->find($NewList->u_id);
                        if (isset($User->id)) {
                            $User->data_state = 3;
                        }
                        $User->save();
                    }
                    $result = $NetList->save();
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
            $NetList = M('Net_list');
            $NetList->find($data['id']);
            if (isset($NetList->id)) {
                $NetList->data_state = 0;
                $result = $NetList->save();
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
    // 伪子查询
    private function dealSonSearch($model, $field)
    {
        // thinkphp 能否直接 WHERE IN (*****)？ 貌似不能……
        $where[$field] = array('LIKE', '%' . $this->word . '%');
        $arr = D($model)->scope('common')->field('id')->group('id')->where($where)->select();
        // 数组合并成字符串
        $str = '';
        foreach ($arr as $v) {
            $str .= $v['id'] . ',';
        }
        $str = rtrim($str, ',');
        return ['IN', $str];
    }
    // 下拉搜索
    private function searchSelect()
    {
        $tmp = $this->where;
        foreach ($tmp as $k => $v) { //foreach 用变量肯定比用对象属性快
            if ($v == 'all') {
                unset($this->where[$k]);
            }
            else {
                $this->select[$k] = $v;
            }
        }
    }
    // 文字搜索
    private function searchWord()
    {
        $this->word = $this->where['word'];
        unset($this->where['word']);
        $this->where['data_state'] = array(BETWEEN, '1,3'); //与scope的common的where无法兼容，只能这样写
        $map['_logic'] = 'OR';
        $map['address'] = array('like', '%' . $this->word . '%');
        $map['order_time'] = array('like', '%' . $this->word . '%');
        $map['username'] = array('like', '%' . $this->word . '%');
        $map['phone'] = array('like', '%' . $this->word . '%');
        $map['apartment'] = $this->dealSonSearch('apartment', 'name');
        $map['charge_id'] = $this->dealSonSearch('net_admin', 'nickname');
        $this->where['_complex'] = $map;
        $this->scope = 'searchWord';
    }
}