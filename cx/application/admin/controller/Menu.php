<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Cache;
use app\admin\model\AdminMenu;

class Menu extends Controller
{
	//设置路径
	private function setMenuPath($menus, $menu_id, $temp_var = 'page_path') 
	{
		//当前页面的菜单ID
		if($menu_id) Cache::set('menu_id', $menu_id, 3600);
		else $menu_id = Cache::get('menu_id');
		//获取当前菜单 ID的路径
        $page_path = each_back_tree($menus, $menu_id);
        $this->assign($temp_var, array_reverse($page_path));
	}

	public function lists($menu_id = 0, $id = 0, $page = 1)
	{
		$data = Db::name('adminMenu')
        		->select();
		$this->setMenuPath($data, $menu_id);

		//获取管理路径
        $path = each_back_tree($data, $id);
        $this->assign('path', array_reverse($path));
        
        //获取当前管理菜单父节点信息
        $cur_pid = null;
        foreach ($data as $key => $val)
        	if($val['id'] == $id) {
        		$cur_pid = $val['id'];
        		break;
        	}
        $parent = null;
        foreach ($data as $key => $val)
        	if($val['id'] == $cur_pid) {
        		$parent = $val;
        		break;
        	}
		$this->assign('parent', $parent);
		
		//分页
        $menus = (new AdminMenu())
        	->where('pid', $id)
        	->paginate(config('paginate.list_rows'));

        $pages = $menus->render();
        $this->assign('page', $pages);

        
        //绑定模板
		$this->assign('menus', $menus);
		return $this->fetch();
	}

	public function edit($id, $menu_id = 0)
	{
		$menus = Db::name('adminMenu')
			->select();
		$this->setMenuPath($menus, $menu_id);

        //获取要编辑的菜单信息
		$item = null;
		foreach ($menus as $key => $value) 
			if($value['id'] == $id) {
				$item = $value;
				break;
			}
		//获取树形下拉菜单数据
		$tree = [];
		get_tree_select($menus, $tree);
		$this->assign('tree', $tree);
		$this->assign('menu', $item);
		return $this->fetch();
	}

	public function saveMenu($id = 0)
	{
		$menu = new AdminMenu();
		if(	$id ? $menu->allowField(true)->save($_POST, ['id' => $id])
			    : $menu->allowField(true)->save($_POST)) 
			$this->success('保存成功', 'admin/Menu/lists');
		else $this->error('保存失败');
		//$this->redirect('admin/Menu/lists');
		
	}

	public function add($menu_id = 0)
	{
		$menus = Db::name('adminMenu')
			->select();
		$this->setMenuPath($menus, $menu_id);

        //获取下拉树数据
		$tree = [];
		get_tree_select($menus, $tree);
		$this->assign('tree', $tree);

		return $this->fetch();
	}

	public function del($id)
	{
		Db::name('adminMenu')
			->where('id', $id)
			->delete() ? $this->success('删除成功', 'admin/Menu/lists')
					   : $this->error('删除失败');
	}
}