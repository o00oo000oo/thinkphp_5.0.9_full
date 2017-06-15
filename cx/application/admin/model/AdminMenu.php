<?php 

namespace app\admin\model;

use think\Model;

class AdminMenu extends Model {
	protected $pk = 'id';

	//自定义初始化
    protected function initialize() {
        parent::initialize();
    }
}