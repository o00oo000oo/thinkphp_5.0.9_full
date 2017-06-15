<?php
namespace app\admin\controller;
use think\Controller;

class Member extends Controller
{
    public function lists()
    {
        return $this->fetch();
    }

}
