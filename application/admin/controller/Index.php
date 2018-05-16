<?php
namespace app\admin\controller;

use app\admin\model\AdminMenu;

class Index extends Admin
{
    public function index()
    {
        return $this->fetch();
    }

    public function setting() 
    {
        $menu = AdminMenu::getMainMenu() ;
        var_dump($menu);
        return $this->fetch();
    }
}
