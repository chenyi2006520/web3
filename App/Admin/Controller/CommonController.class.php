<?php 
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Rbac;

class CommonController extends Controller {

    //Controller中第一个运行的方法，也可看作初始化1
    public function _initialize() {
        //登陆检查，没有session的话就跳转登陆
        if (!isset($_SESSION[C("USER_AUTH_KEY")]))
        {
            $this->redirect('/Admin/Login/Index/');
        }

        //初始化权限
        if (C("USER_AUTH_ON")) {
            $notAuth = in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE'))) || in_array(ACTION_NAME, explode(',', C('NOT_AUTH_ACTION')));
            if ($_SESSION['username'] && !$notAuth) {
                RBAC::AccessDecision() || $this->error("没有权限", U("/Admin/"), 1);
            }
        }
        
        // pp($_SERVER);
        // die;
        import("Class.TreeList");
        $treeList = M("treelist");
        $dataList = $treeList->order("id asc")->select();
        $dataTree = new\TreeList();
        $dataList = $dataTree::unlimitedForLayer($dataList, "cate");
        $this->treeArr = $dataList;
    }
}