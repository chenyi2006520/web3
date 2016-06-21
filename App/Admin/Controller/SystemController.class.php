<?php
namespace Admin\Controller;
use Think\Controller;

class SystemController extends CommonController {
    public function index(){
        import("Class.TreeList");
        
        $treeList = M("treelist");
        $count = $treeList ->count();
        $Page = new\Think\Page($count,10);
        $limit = $Page ->firstRow .','. $Page ->listRows;
        //$dataList = $treeList -> order("id asc") ->limit($limit) ->select();
        $dataList = $treeList -> order("id asc") ->select();
        $dataTree=new \TreeList();
        
        $dataList = $dataTree::unlimitedForLevel($dataList,"---");
        //$dataList = $dataTree::unlimitedForLayer($dataList,"cate");
        //pp($dataList);
        
        // for ($i=0; $i < 21; $i++) { 
        //     echo ($i % 4)+1 . "&nbsp;" . $i ."<br/>";
        // }
        
        // echo $_SERVER["REQUEST_URI"]; 
        // die;
        $show = $Page -> Show();
        $this ->dataList = $dataList;
        $this ->show = $show;
        
        $this->display();
    }
    
    public function addTree()
    {
        $t_pid = I("t_pid",0,"intval");
        $t_level = I("t_level",0,"intval");
        
        //不是跟目录的话就要隐藏样式图标
        if($t_pid != 0 )
        {
            $this ->hiddleValue = "hidden";
        }
        $this ->t_level = $t_level + 1;//level加1,下一级，如果是一级菜单的话，就是1，因为默认为零
        $this ->t_pid = $t_pid;
        $this -> display();
    }
    
    public function handleAddData()
    {
        if (!IS_POST) {
           E("未知错误");
        }
        $t_pid = I("t_pid",0,"intval");
        $t_title = I("t_Title");
        $t_sort = I("t_sort");
        $t_url = I("t_url","","htmlspecialchars");
        $t_iconStyle = I("t_iconStyle");
        $t_level = I("t_level",0,"intval");
        $t_status = I("t_status",0,"intval");
        $t_showFlag = I("t_showFlag",0,"intval");
        
        $data = array(
            't_title' => $t_title,
            't_pid' => $t_pid,
            't_sort' => $t_sort,
            't_url' => $t_url,
            't_iconStyle' =>$t_iconStyle,
            't_level' => $t_level,
            't_status' => $t_status,
            't_showFlag' =>$t_showFlag
        );
        // pp($data);
        // die;
        
        if (M('treelist') ->add($data)) {
            $this ->redirect("/Admin/System/index/");
        }else
        {
            E("未知错误");
        }
    }
    
    
    public function alterTree($id)
    {
        if ($id > 0) {
            $treeModel = M('treelist') ->find($id);
            // pp($treeModel);die;
            $this -> treeModel = $treeModel;
            
            $t_pid = $treeModel['t_pid'];
            //不是跟目录的话就要隐藏样式图标
            if($t_pid != 0 )
            {
                $this ->hiddleValue = "hidden";
            }
        }
        
        $this -> display('alterTree');
    }
    
    public function handleAlterTree()
    {
        if (!IS_POST) {
           E("未知错误");
        }
        $id = I("id");
        $t_pid = I("t_pid",0,"intval");
        $t_title = I("t_Title");
        $t_sort = I("t_sort");
        $t_url = I("t_url","","htmlspecialchars");
        $t_iconStyle = I("t_iconStyle");
        $t_level = I("t_level",0,"intval");
        $t_status = I("t_status",0,"intval");
        $t_showFlag = I("t_showFlag",0,"intval");
        
        $data = array(
            'id' =>$id,
            't_title' => $t_title,
            't_pid' => $t_pid,
            't_sort' => $t_sort,
            't_url' => $t_url,
            't_iconStyle' =>$t_iconStyle,
            't_level' => $t_level,
            't_status' => $t_status,
            't_showFlag' =>$t_showFlag
        );
        // pp($data);
        // die;
        
        if (M('treelist') ->save($data)) {
            $this ->redirect("/Admin/System/index/");
        }else
        {
            E("未知错误");
        }
    }
    
    public function lockTree($id)
    {
        echo "暂未处理";
    }
}