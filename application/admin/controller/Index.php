<?php
namespace app\admin\controller;

use app\admin\model\AdminMenu;

class Index extends Admin
{
    public function index()
    {
        $arr = $tab_data = [];
        $arr['title'] = "后台首页";
        $arr['url'] = 'admin/index/index';
        $tab_data['menu'][] = $arr;
        $tab_data['current'] = 'admin/index/index';

        $this->assign('tab_data', $tab_data);
        return $this->fetch();
    }

    public function setting() 
    {
        $menu = AdminMenu::getMainMenu() ;
        var_dump($menu);exit;
        return $this->fetch();
    }
}
