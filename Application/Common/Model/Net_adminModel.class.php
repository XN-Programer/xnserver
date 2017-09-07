<?php
namespace Common\Model;

use Think\Model;

class Net_adminModel extends Model
{
    // 登录流程日后再完善
    protected $_validate = array(
        array('username', 'require', '用户名不能为空！'),
        array('password', 'require', '登录密码不能为空！'),
    );
    protected $_scope = array(
        'common' => array(
            'where' => array('data_state' => array(EGT, 1)),
            'order' => 'data_state desc,create_at',
        ),
        'toSelect' => array(
            'where' => array('data_state' => array(EGT, 1)),
            'order' => 'data_state desc,create_at',
            'field' => array('id','nickname'),
        ),        
    );
    protected $_auto = array(
        array('password', 'md5', 3, 'function'),
        array('create_at', 'getTime', 1, 'function'),
        array('update_at', 'getTime', 3, 'function'),
    );
}