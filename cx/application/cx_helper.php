<?php
/* 
 * 递归获取树形select下拉框数据  数组版
 */
function get_tree_select($data, &$tree, 
	$fields=['id'=>'id','pid'=>'pid', 'text'=>'name'], $pid = 0, $level = 0) 
{
	if(empty($tree)) $tree[] = [$fields['text'] => ' 根节点', $fields['id']=> 0];
	$arr = [];
	foreach ($data as $key => $value) 
		if($value[$fields['pid']] == $pid) $arr[] = $value;

	$level ++;
	if(!empty($arr)) {
		foreach ($arr as $key => $val) {
			$val[$fields['text']] = str_repeat('　　|', $level-1).'--'.$val[$fields['text']];
			if($level == 1)
				$val[$fields['text']] = preg_replace('/^\-+/', '', $val[$fields['text']]);
			$tree[] = $val;
            get_tree_select($data, $tree, $fields, $val[$fields['id']], $level);
		}
	}
	return $tree;
}



/* 
 * 回归获取树形节点路径  数组版
 */
function each_back_tree($data, $id = 0, 
	$fields = ['id'=>'id', 'pid'=>'pid', 'text'=>'name'], $arr = [])
{
	if($id == 0) {
		$arr[] = [$fields['text']=>'根节点'];
		return $arr;
	} else {
		$item = null;
		foreach ($data as $key => $val)
			if($val[$fields['id']] == $id) {
				$item = $val;
				array_splice($data, $key, 1);
				break;
			}
		if($item) {
			$arr[] = $item;
			return each_back_tree($data, $item[$fields['pid']], $fields, $arr);
		} else return [[$fields['text'] => '菜单树形结果中断，中断ID:'.$id]];
	}
}



/* 
 * 获取树形数组  数组版
 */
function get_tree_array($data, $pid = 0,
	$fields=['id'=>'id','pid'=>'pid', 'text'=>'name', 'child'=>'children'], 
	$level = 0) 
{
	$arr = [];
	foreach ($data as $key => $value) 
		if($value[$fields['pid']] == $pid) $arr[] = $value;

	$level ++;
	$tree = [];
	if(!empty($arr)) {
		foreach ($arr as $key => $val) {
            $child = get_tree_array($data, $val[$fields['id']], $fields, $level);
            if($child) $val[$fields['child']] = $child;
            $tree[] = $val;
		}
	}
	return $tree;
}
