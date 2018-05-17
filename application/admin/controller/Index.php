<?php
namespace app\admin\controller;

use app\common\util\Dir;

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

    /**
     * 清理缓存
     * @return mixed
     */
    public function clear()
    {
        if ($this->_clear() === false) {
            return $this->error('缓存清理失败！');
        }
        return $this->success('缓存清理成功！');
    }

    private function _clear() {
        if( $this -> _delDir( RUNTIME_PATH . DS . "cache" ) === false ) return false ;
        if( $this -> _delDir( RUNTIME_PATH . DS . "temp" ) === false ) return false ;
        if( $this -> _delDir( RUNTIME_PATH . DS . "log" ) === false ) return false ;

        return true ;
    }

    /**
     * 删除目录（包括下面的文件）
     * @return void
     */
    private function _delDir( $directory, $subdir = true ) 
    {
        if (is_dir($directory) == false) {
            return false;
        }
        $handle = opendir($directory);
        while (($file = readdir($handle)) !== false) {
            if ($file != "." && $file != "..") {
                is_dir("$directory/$file") ?
                                $this->_delDir("$directory/$file") :
                                @unlink("$directory/$file");
            }
        }
        if (readdir($handle) == false) {
            closedir($handle);
            rmdir($directory);
        }
    }
}
