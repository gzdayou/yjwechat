<?php
namespace app\admin\controller;

use think\View;
use think\Controller;
use app\admin\model\AdminMenu;

class Login extends Controller
{
    public function index()
    {
        $model = model('AdminUser');
        if ($this->request->isPost()) {
            $username = input('post.username/s');
            $password = input('post.password/s');
            if (!$model->login($username, $password)) {
                return $this->error($model->getError(), url('index'));
            }
            return $this->success('登陆成功，页面跳转中...', url('index/index'));
        }

        if ($model->isLogin()) {
            $this->redirect(url('index/index', '', true, true));
        }

        $this->view->engine->layout('login_layout');
        return $this->fetch();
    }
}