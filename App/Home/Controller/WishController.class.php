<?php
namespace Home\Controller;
use Think\Controller;

class WishController extends Controller
{
    /**
     * 许愿墙模板页
     */
    public function index()
    {
        //echo "许愿墙";
		//$wish=M('wish')->select();
		//pp($wish);die();

		//$this -> assign('a','dsdsdsd');
        //$this -> display("wish");
        //die();

		$wish=M('wish')->select();
		$this ->assign('wish',$wish);

		$this ->display('wish');
		
		//$this->assign('wish', M('wish')->select())->display('wish');
    }

    /**
     * 许愿墙逻辑数据处理页
     */
    public function Handle()
    {
		If(!IS_AJAX){
			E('页面不存在！');
		}

		$data = array(
			'username' => I('username'),
			'content' => I('content'),
			'time' => time()
			);
           
            
            if($id = M('wish')->data($data)->add())
            {
                $data['id'] = $id;
                $data['contnet'] = replace_phiz($data['content']);
                $data['time'] = date('y-m-d H:i', $data['time']);
                $data['status'] = '1';
                $this ->ajaxReturn($data,'json');
            }else
            {
                $this->ajaxReturn(array('status' => 0, 'json'));
            }
            
		// $phiz = array(
		// 	'zhuakuang' => '抓狂',
		// 	'baobao' => '抱抱',
		// 	'haixiu' => '害羞',
		// 	'ku' => '酷',
		// 	'xixi' => '嘻嘻',
		// 	'taikaixin' => '太开心',
		// 	'touxiao' => '偷笑',
		// 	'qian' => '钱',
		// 	'huaxin' => '花心',
		// 	'jiyan' => '挤眼'
		// 	);

		

		//$str="<?php return " . var_export($phiz,true) .  ; >";
		//file_put_contents('./Public/Data/phiz.php',$str);
		//echo $str;
		
		//F('phiz',$phiz,'./Data/');
		//pp($data);

		//$this->ajaxReturn(array('status' => 0, 'json'));


       // pp(I('post.'));
        //echo I('post.username','','htmlspecialchars');
		//if (!IS_POST)
		//{
		//    $this->error("页面不存在","Index",1);
		//    //E("页面不存在",1);
		//}else
		//{
		//    $data = array(
		//        //'username' => I('username','','htmlspecialchars'),
		//        //'content' =>I('content','','htmlspacialchars'),
		//        'username' => I('username'),
		//        'content' =>I('content'),
		//        'time' =>time()
		//        );

		//    //pp($data);
		//    //die();

		//    //将当前数据插入数据库返回，如果返回值大于0，则提示插入成功返回页面
		//    if (M('wish')->data($data)->add())
		//    {
		//        //M('wish')->where(array('id' => array('gt',0)))->delete();
		//        //$this->success('添加成功',U('Index','','',false),1);
		//        $this->success('添加成功','Index');
		//    }else
		//    {
		//        $this->error('添加失败');
		//    }
			


		//}
		
    }


    /**
     * Summary of ShowME
     */
    public function ShowME()
    {
        //   pp($_GET);
        echo I('get.');
        die();
        //$this->d
    }
}
?>
