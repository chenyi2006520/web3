<?php
namespace Admin\Controller;
use Think\Controller;

class RbacController extends CommonController {
    
    //用户列表
    public function index()
    {
        // import("Class.TreeList");
        // $treeList = M("treelist");
        // $dataList = $treeList -> order("id asc") ->select();
        // $dataTree=new \TreeList();
        // $dataList = $dataTree::unlimitedForLayer($dataList,"cate");
        // $this ->treeArr = $dataList;
        $user = D("UserRelation");
        $userList = $user ->field(array("password"),TRUE) ->relation(true) ->select();
        // pp($userList);
        // die;
        $this -> userList = $userList;
        $this ->display("index");
    }
    
     //添加用户
    public function addUser()
    {
        $roleData = M("rbac_role") -> where(array("status" => 1)) ->select();
        $this ->roleList = $roleData;
        
        $this -> roleLength = 3;//防止前台无限制选择角色列表
        
        $this ->display("addUser");
    }
    
    //添加用户数据表单处理
    public function AddUserHandle()
    {
        //用户信息
        $user = array(
            "username" => I("username"),
            "password" => I("password","","MD5"),
            "logintime" => time(),
            "loginip" => get_client_ip()
        );
        
        //用户所属角色处理
        $roleArray = array();
        if($uid = M("rbac_user") ->add($user))
        {
            foreach($_POST["role_id"] as $role)
            {
                $roleArray[] = array(
                    'role_id' => $role,
                    'user_id' =>$uid
                );
            }
            
            //添加用户所属角色
            M("rbac_role_user") ->addAll($roleArray);
            $this -> success("添加成功",U("/Admin/Rbac/index/"));
        }
        else
        {
            E("添加失败");            
        }
    }
    
    //角色列表
    public function role()
    {
        $this ->role = M("rbac_role")->select();
        
        $this ->display("role");
    }
    
    //节点列表
    public function node()
    {
        $field = array('id','name','title','pid');
        $nodelList = M("rbac_node") -> field($field) -> order("sort") -> select();
        $nodelList = node_merge($nodelList);
        
        // pp($nodelList);
        // die;
        // 
        $this -> nodelList = $nodelList;
        $this ->display("node");
    }
    
    //添加角色
    public function addRole()
    {
        $this ->display("addRole");
    }
    //添加角色表单处理
    public function AddRoleHandle()
    {
        // if(!IS_POST)
        // {
        //     E("页面不存在");
        // }
        
        $roleName = I("roleName");
        $roleRemark = I("roleRemark");
        $roleStatus = I("roleStatus");
        
        $roleData = array(
            "name" => $roleName,
            "remark" => $roleRemark,
            "status" => $roleStatus
        );
        
        if(M("rbac_role") -> add($roleData))
        {
            $this -> redirect('/Admin/Rbac/role/');
        }else
        {
            E("添加失败",U("/Admin/Rbac/AddRole/"));
        }
    } 
    
    //添加节点
    public function addNode()
    {
        $nodePid = I("nodePid", 0, "intval");
        $nodeLevel = I("nodeLevel" ,1,'intval');
        
        switch ($nodeLevel)
        {
            case 1:
                $this -> levelType = "应用";
            break;
            case 2:
                $this -> levelType = "控制器";
            break;
            case 3:
                $this -> levelType = "动作方法";
            break;
        }
        $this -> nodeLevel = $nodeLevel;
        $this -> nodePid = $nodePid;
        $this ->display("addNode");
    }
    //节点数据表处理
    public function AddNodeHandle()
    {
        if(!IS_POST)
        {
            E("页面不存在");
        }
        
        $nodeName = I("nodeName");
        $nodeTitle = I("nodeTitle");
        $nodeRemark = $nodeTitle;
        $nodeSort = I("nodeSort");
        $nodeLevel = I("nodeLevel",1,"intval");
        $nodePid = I("nodePid", 0, "intval");
        $nodeStatus = I("nodeStatus");
        
        $nodeData = array(
            'name' => $nodeName,
            'title' => $nodeTitle,
            'remark' => $nodeRemark,
            'level' => $nodeLevel,
            'pid' => $nodePid,
            'sort' => $nodeSort,
            'status' =>$nodeStatus
        );
        
        if(M("rbac_node") ->add($nodeData))
        {
            $this -> success("添加成功",U('/Admin/Rbac/node/'));
        }else
        {
            E("添加失败", U("/Admin/Rbac/addNode/"));
        }
        
    }
    
    
    //配置权限
    public function access(){
        $role_id = I("rid", 0, "intval");
        
        //所有节点列表
        $field = array('id','name','title','pid','level');
        $nodelList = M("rbac_node") -> field($field) -> order("sort") -> select();
        
        //原有权限
        $accessData = M("rbac_access") ->where(array("role_id" => $role_id)) ->getField("node_id",TRUE);
        
        $nodelList = node_merge($nodelList,$accessData);
        $this ->role_id = $role_id;
        
        $this -> nodelList = $nodelList;
        $this -> display();
    }
    
    //角色配置权限表单处理
    public function AccessHandle()
    {
        $roleId = I("RoleId", 0, "intval");
        //创建一个未使用的access对象
        $accessData = M("rbac_access");
        //删除原权限
        $accessData -> where(array("role_id" => $roleId)) -> delete();
        
        $Data = array();
        foreach($_POST["access"] as $item)
        {
            $temp = explode("_",$item);
            $Data[] = array(
                'role_id' => $roleId,
                'node_id' => $temp[0],
                'level' => $temp[1],
            );
        }
        
        if($accessData->addAll($Data))
        {
            $this -> success("配置成功",U("/Admin/Rbac/role/"));
        }
        else
        {
            E("配置失败");
        }
    }
    
}
?>
