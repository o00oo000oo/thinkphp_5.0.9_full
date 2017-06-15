<?php
	return [

		'default_return_type'=>'html',
		'default_ajax_return'=>'json',

		//前段常量
		'view_replace_str'=>[
			'__CTRL__' => '/cx/public/ctrl',
			'__ADM__'=> '/cx/public/admin_framework'
		],

		/* 模板配置 */
		'template'  => [
		    // 模板引擎
		    'type'   => 'think',
		    // 普通标签开始标记 
		    'tpl_begin' =>    '<{',
		    // 普通标签结束标记
		    'tpl_end'   =>    '}>'        
		],

		/* 分页参数 */
		'paginate' => [
			'type' =>'Cx',
			'var_page'=>'page', //传到后台的页码变量
			'list_rows'=>10
		],

		/* 扩展函数配置 */
		'extra_file_list' => [
			APP_PATH . 'cx_helper' .EXT,  //自定义扩展函数
			THINK_PATH . 'helper' . EXT
		],
		
	];