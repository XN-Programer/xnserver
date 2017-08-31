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
        'toUser' => array(
            'where' => array('data_state' => 1),//已报修
            'field' => array('server', 'order_time', 'desc'),
        ),
    );
}