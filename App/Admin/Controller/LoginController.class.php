<?php
namespace Admin\Controller;
use Think\Controller;
use Org\Util\Rbac; 

class LoginController extends Controller {
    public function index(){
        $this->display("login");
    }
    
    
    /**
    * 登陆验证
    * @category   Think
    * @package  Think
    * @subpackage  Util
    * @author    liu21st <liu21st@gmail.com>
    */
    public function login()
    {

        if(!IS_POST)
        {
            E("页面不存在~");   
        }
        
        $Verify = new \Think\Verify();
        if($Verify ->check(I('code'),1))
        {
            $username = I('username');
            $pwd = I('password','','md5');
            
            //根据用户名查找用户是否存在
            $user = M('user')->where(array("username" => $username))->find();
            //pp($user);

            if(!$user || $user['password'] == $pwd)
            {
                if($user['islock'] == 1)
                {
                    //用户被锁
                    $this->ajaxReturn(array('status' => '2'),'json');
                }else
                {
                    
                    $data =array(
                        'id' => $user['id'],
                        'logintime' => time(),
                        'loginip' => get_client_ip(),
                    );
                    
                    M('user')->save($data);
                    session(C("USER_AUTH_KEY"),$user['id']);
                    session('username',$user['username']);
                    session('logintime',date('Y-m-d H:i:s',$user['logintime']));
                    session('loginip',$user['loginip']);
                    
                    //超级管理员识别
                    if($user['username'] == C("RBAC_SUPERADMIN"))
                    {
                        session(C("ADMIN_AUTH_KEY"),TRUE);
                    }
                    
                    //读取用户权限
                    RBAC::saveAccessList();
                    // pp($_SESSION);
                    // die;
                    // 
                    
                    $this->redirect('/Admin/Index/');
                }
            }else
            {
                //用户名或密码错误
                $this->ajaxReturn(array('status' => '1'),'json');
            }
            //$this->success("登陆成功",U('/Admin/Index/'));
        }
        else
        {
          //$this->error("登陆失败");
          //验证码错误
          $this->ajaxReturn(array('status' => 0),'json');   
        }
        //echo $Verify -> check(I('code'), 1);
        
        //$value = session('verify_code');
       // echo $value;

       //die;
       
         
       // $sessionVal =  session('verify_code');
        
       // echo '<br/>';
       // echo I('code','','md5');
        
    }
    
    public function verifyLogin()
    {
        //验证码初始化参数
        $VerifyConfig = array(
            'fontSize' => 20,//验证码字体大小
            'length' =>4,//验证码位数
            'useNoise' => FALSE,//关闭验证码噪点
            'imageW' => 140,
            'imageH' =>40,
            'sekey' => 'cyphp',//验证码的加密密钥 
        );
        
        $Verify = new \Think\Verify($VerifyConfig);
        // 开启验证码背景图片功能 随机使用 ThinkPHP/Library/Think/Verify/bgs 目录下面的图片
        $Verify->useImgBg = true;
        $Verify->codeSet = '0123456789';
        $Verify->entry(1);//参数代表只有当前验证码的session下标值
        // $Verify->entry(2);//参数代表只有当前验证码的session下标值
        // $Verify->entry(3);//参数代表只有当前验证码的session下标值
    }
}