<?php
namespace Common\Model;

use Think\Model;
use Think\Model\RelationModel;

class Net_listModel extends RelationModel
{
    protected $_validate = array();
    protected $_auto = array(
        array('data_state', '1', 1),
        array('create_at', 'getTime', 1, 'function'),
        array('update_at', 'getTime', 3, 'function'),
    );
    protected $_scope = array(
        'common' => array(
            'where' => array('data_state' => array(BETWEEN, '1,2')),
            'order' => 'data_state, create_at desc',
        ),
        'searchWord' => array(
            'order' => 'data_state, create_at desc',
        ),
        'toUser' => array(
            'where' => array('data_state' => 1),//已报修
            'field' => array('server', 'order_time', 'desc'),
        ),
    );
    protected $_link = array(
        'Apartment' => array(
            'mapping_type' => self::BELONGS_TO,
            'class_name' => 'Apartment',
            'foreign_key' => 'apartment',
            'mapping_name' => 'apartment', //对应到user的apartment字段
        ),
        'Charge' => array(
            'mapping_type' => self::BELONGS_TO,
            'class_name' => 'Net_admin',
            'foreign_key' => 'charge_id',
            'mapping_name' => 'charge_id', //对应到user的apartment字段
        ),
    );
    // 修改故障单状态 可能 改变用户状态
    public function changeUser($u_id, $n_id, $n_state)
    {
        // 该故障单没对应用户
        if ($u_id == 0) {
            return 0;
        }
        // 判断是否为最新一条
        $NetList = D('net_list');
        $where['u_id'] = $u_id;
        $NetList->scope('common')->where($where)->order('create_at desc')->find();
        if (!isset($NetList->id) || $NetList->id != $n_id) {
            return 0;
        }
        // 最新一条报修单对应用户状态：[ 0=>1 , 1=>2, 2=>1, 3=>3]
        // 前者为故障单状态：删除，未解决，已解决，恶意 =》未报修，已报修，未报修，恶意
        $change = [1, 2, 1, 3];
        $User = M('User');
        $User->find($u_id);
        if (isset($User->id)) {
            $User->data_state = $change[$n_state];
        }
        $User->save();
    }
}