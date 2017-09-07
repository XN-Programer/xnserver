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
            'where' => array('data_state' => array(BETWEEN, '1,3')),
            'order' => 'data_state, create_at',
        ),
        'searchWord' => array(
            'order' => 'data_state, create_at',
        ),
        'toUser' => array(
            'where' => array('data_state' => 1),//已报修
            'field' => array('server', 'order_time', 'desc'),
        ),
    );
    protected $_link = array(
        'Apartment' => array(
            'mapping_type'  => self::BELONGS_TO,
            'class_name'    => 'Apartment',
            'foreign_key'   => 'apartment',
            'mapping_name'  => 'apartment', //对应到user的apartment字段
        ),
        'Charge' => array(
            'mapping_type'  => self::BELONGS_TO,
            'class_name'    => 'Net_admin',
            'foreign_key'   => 'charge_id',
            'mapping_name'  => 'charge_id', //对应到user的apartment字段
        ),        
     );    
}