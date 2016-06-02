<?php
namespace Admin\Controller;
use Think\Controller;
class WishManageController extends CommonController {
    
    public function index(){
        $wish = M('wish');
        $count = $wish->count();
        $Page = new \Think\Page($count,5);
        $limit = $Page-> firstRow .','. $Page ->listRows;
         
        //$wish = M('wish')->page(1,10)->order('time DESC')->select();
        $list = $wish->order('time DESC')->limit($limit) ->select();
        $show = $Page->show();
        
        $this->assign('list', $list);
        $this->assign('show',$show); 
        $this ->acFlag = I("acFlag");
        $this -> display();
    }
    
    
    public function deleteFun()
    {
        $id = I('id');
        if($id)
        {
            if(M('wish')->delete($id))
            {
                $this->success('删除成功', U('/Admin/WishManage/Index/'));
                //$this->ajaxReturn(array('status'=>1),'json');
            }else
            {
                $this->error("删除失败");
                //$this->ajaxReturn(array('status'=>0),'json');
            }
        }
    }
    
    
    public function easeUI()
    {
        $this-> display('easeUI');
    }
}