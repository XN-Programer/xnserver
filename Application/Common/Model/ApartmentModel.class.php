<?php
namespace Common\Model;

use Think\Model;

class ApartmentModel extends Model
{
    protected $_scope = array(
        'common' => array(
            'where' => array('data_state' => 1),
            'field' => array('id', 'name'),
        ),
    );
    protected $_auto = array(
        array('data_state', '1', 1),
        array('create_at', 'getTime', 1, 'function'),
        array('update_at', 'getTime', 3, 'function'),
    );
    // id 与 name 的 互换
    // 好麻烦，有没简便方法做？
    public function exchange($apartment)
    {
        $model = D('Apartment');
        $Apartments = $model->scope('real')->select();
        $IdToName = [];
        foreach ($Apartments as $val) {
            $IdToName[$val['id']] = $val['name'];
        }
        if (isset($IdToName[$apartment])) {
            return $IdToName[$apartment];
        }
        $NameToId = array_flip($IdToName);
        if (isset($NameToId[$apartment])) {
            return $NameToId[$apartment];
        }
        return false;
    }
}