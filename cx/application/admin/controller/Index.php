<?php
namespace app\admin\controller;
use think\View;
use think\Controller;
use think\Db;
class Index extends Controller
{

    public function index()
    {
        return $this->fetch('main');
    }

    public function start_page()
    {
        return $this->fetch('index');
    }

    public function top()
    {
        return $this->fetch('top');
    }

    public function left()
    {   
        $menu = Db::name('adminMenu')->select();
        $menu = get_tree_array($menu);
        $this->assign('menu', $menu);
        return $this->fetch('left');
    }

    public function footer()
    {
        return $this->fetch('footer');
    }
}
