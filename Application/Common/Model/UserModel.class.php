<?php
namespace Common\Model;

// use Think\Model;
use Think\Model\RelationModel;
class UserModel extends RelationModel
{
    // 字段验证规则完善
    protected $_validate = array();
    protected $_auto = array(
        array('data_state', '1', 1),
        array('create_at', 'getTime', 1, 'function'),
        array('update_at', 'getTime', 3, 'function'),
    );
    protected $_scope = array(
        'common' => array(
            'where' => array('data_state' => array(EGT, 1)),
            'field' => array('id', 'name', 'stu_code', 'data_state', 'phone', 'apartment', 'address'),
        ),
        // 已报修
        'isPostNet' => array(
            'where' => array('data_state' => 2),
            'field' => array('id','apartment','address','phone','name'),
        ),
    );
    protected $_link = array(
        'Apartment' => array(
            'mapping_type'  => self::BELONGS_TO,
            'class_name'    => 'Apartment',
            'foreign_key'   => 'apartment',
            'mapping_name'  => 'apartment', //对应到user的apartment字段
            'as_fields' => 'name',
        ),
     );

}