<?php 
namespace Admin\Controller;
use Think\Controller;

class BswController extends CommonController {

    //赛事列表
    public function index() {
        $gameList = M('bsw_game');
        $field = array('*, (select e_name from ktm_bsw_event where id = ktm_bsw_game.g_event ) as nee');
        $count = $gameList->count();
        $Page = new\Think\Page($count, 10);
        $limit = $Page->firstRow.','.$Page->listRows;
        $dataList = $gameList->field($field)->order('id desc')->limit($limit)->select();
        $show = $Page->Show();
        $this->dataList = $dataList;
        $this->show = $show;

        $this->acFlag = I("acFlag");

        $this->display("index");
    }

    //添加赛事
    public function AddGame() {
        //获取所有项目项目
        $eventData = M("bsw_event")->select();
        $this->eventList = $eventData;

        //location 默认数据读取出来，指定北京的数据
        $locationList = M("bsw_location")->where(" parentid in (110000,110100,100000) ")->select();

        // pp($locationList);
        // die;

        $provinceList = array();
        $cityList = array();
        $townList = array();
        foreach($locationList as $item) {
            if ($item['leveltype'] == 1) {
                $provinceList[] = $item;
            }

            if ($item['leveltype'] == 2) {
                $cityList[] = $item;
            }

            if ($item['leveltype'] == 3 && $item['parentid'] == 110100) //北京市市辖区默认列表
            {
                $townList[] = $item;
            }
        }

        $this->provinceList = $provinceList;
        $this->cityList = $cityList;
        $this->townList = $townList;

        $this->display("addgame");
    }

    //处理城市列表
    public function handleLocation() {

        $pid = I("parentid");
        $level = I("level");

    // pp($pid);die;
        // $selectNameValue = "g_city";

        //获取location的列表
        // $locationList = M("bsw_location")->where(array("parentid" => $pid, "level" => $level))->select();
        $locationModel = M("bsw_location");
        $locationList = $locationModel ->where("parentid = ". $pid)->select();


        //获取当前列表的总数量,
        //$listCount =  count($locationList);

        if (is_array($locationList)) {
            $countArray = array();
            if ($level == "1") {
                $defaultTown = $locationModel ->where("parentid = ". $locationList[0]['id'])->select();
                if (is_array($defaultTown)) {
                    $countArray = array_merge($locationList, $defaultTown);
                }
            } else {
                $countArray = $locationList;
            }
                // pp($countArray);die;
            //返回json格式数据
            $this->ajaxReturn($countArray, "json");
        } else {
            $this->ajaxReturn(array("status" => 0, "json"));
        }
    }


    //添加赛事表单处理
    public function AddGameHandle() {
        $g_name = I("g_name");
        $g_event = I("g_event");
        // $g_location = I("g_location");
        $g_time_s = I("g_time_s");
        $g_time_e = I("g_time_e");
        $g_age = I("g_age");
        $g_star = I("g_star");
        $g_gps = I("g_gps");
        $g_gender = I("g_gender");
        $g_introduction = I("g_introduction"); 
        $locationStr = I("g_location_str");
        $g_singup_s = I("g_singup_s");
        $g_singup_e = I("g_singup_e");
        $g_address = I("g_address");
        $g_fee = I("g_fee");
        $g_amount = I("g_amount");
        $g_sponsor = I("g_sponsor");
        
        //$g_image = I("g_image");
        $g_image_file = I("g_image_file");
        // pp($_FILES);        
        // pp($g_image_file);die;

        //表单提交的文件数组，returnFlag=1返回上传成功以后url，0返回整个info,fileTagName表单中file标签的名称
        $imageUrl = Qiniu_Upload($g_image_file,1,"g_image_file");
        
        $gameData = array('g_name' => $g_name, 'g_event' => $g_event, 'g_location' => $locationStr, 'g_time_s' => strtotime($g_time_s), 'g_time_e' => strtotime($g_time_e), 'g_age' => $g_age, 'g_star' => $g_star, 'g_gps' => $g_gps, 'g_gender' => $g_gender, 'g_introduction' => $g_introduction,'g_image' => $imageUrl,"g_singup_s" => strtotime($g_singup_s),"g_singup_e" => strtotime($g_singup_e),"g_address" => $g_address,"g_fee" => $g_fee,"g_amount" => $g_amount,"g_sponsor" => $g_sponsor);
        // pp($gameData);
        // die;
        if (M("bsw_game")->add($gameData)) {
            $this->success("添加成功", U("/Admin/Bsw/Index/"));
        } else {
            E("添加失败");
        }

    }

    //修改赛事
    public function alterGame($id = 0) {
        if ($id > 0) {
            $gameModel = M("bsw_game")->find($id);
            $locationJson = json_decode(htmlspecialchars_decode($gameModel['g_location']));
            $parentStr = "";
            $id1 = $locationJson[0] ->{'id'};
            $id2 = $locationJson[1] ->{'id'};
            if (trim($id1) != "" && trim($id2) != "") {
                $parentStr = $id1 . ','  .$id2 . ","    ;          
            }
            // $locationJson[0] ->{'id'} ."," . $locationJson[1] ->{'id'} .",";
            $gameModel['province'] = $locationJson[0] ->{'id'};
            $gameModel['city'] = $locationJson[1] ->{'id'};
            $gameModel['area'] = $locationJson[2] ->{'id'};
            // pp(htmlspecialchars_decode($gameModel['g_location']));
            // pp($gameModel['g_location']);
            //  pp($gameModel);die;
            //location数据
            if (trim($parentStr) != "") {
                $locationList = M("bsw_location")->where(" parentid in (". $parentStr ." 100000) ")->select();                
            }else
            {
                E("地址出错了");
            }
            //  pp($locationList);die;
            
            $provinceList = array();
            $cityList = array();
            $townList = array();
            foreach($locationList as $item) {
                if ($item['leveltype'] == 1) {//省级列表
                    $provinceList[] = $item;
                }

                if ($item['leveltype'] == 2) {//市级列表
                    $cityList[] = $item;
                }

                if ($item['leveltype'] == 3) //市辖区列表
                {
                    $townList[] = $item;
                }
            }
            $this->provinceList = $provinceList;
            $this->cityList = $cityList;
            $this->townList = $townList;
            
            $this->gameModel = $gameModel;
            $this ->eventList = M("bsw_event") ->select();
        }
        $this->display("alterGame");
    }
    
    //处理修改赛事
    public function handleAlterGame() {
        $g_id = I("g_id");
        $g_name = I("g_name");
        $g_event = I("g_event");
        $g_location = I("g_location");
        $g_time_s = I("g_time_s");
        $g_time_e = I("g_time_e");
        $g_age = I("g_age");
        $g_star = I("g_star");
        $g_gps = I("g_gps");
        $g_gender = I("g_gender");
        $g_introduction = I("g_introduction");
        
        $g_singup_s = I("g_singup_s");
        $g_singup_e = I("g_singup_e");
        $g_address = I("g_address");
        $g_fee = I("g_fee");
        $g_amount = I("g_amount");
        $g_sponsor = I("g_sponsor");
        
        
        $g_image = I("g_image");
        $g_image_file = I("g_image_file");
        // pp($_FILES);
        // pp($_GET);
        // pp($_pos);
       
        $imageUrl = "";
        if (empty($_FILES['g_image_file']['name'])) {
            if(empty($g_image))
            {
                E("图片不能为空");
            }else
            {
                $imageUrl = $g_image;
            }
        }else
        {        
            //表单提交的文件数组，returnFlag=1返回上传成功以后url，0返回整个info,fileTagName表单中file标签的名称
            $imageUrl = Qiniu_Upload($g_image_file,1,"g_image_file");
        }
        
        $locationStr = I("g_location_str");
        $gameData = array("id"=> $g_id,'g_name' => $g_name, 'g_event' => $g_event, 'g_location' => $locationStr, 'g_time_s' => strtotime($g_time_s), 'g_time_e' => strtotime($g_time_e), 'g_age' => $g_age, 'g_star' => $g_star, 'g_gps' => $g_gps, 'g_gender' => $g_gender, 'g_introduction' => $g_introduction,'g_image' => $imageUrl,"g_singup_s" => strtotime($g_singup_s),"g_singup_e" => strtotime($g_singup_e),"g_address" => $g_address,"g_fee" => $g_fee,"g_amount" => $g_amount,"g_sponsor"=>$g_sponsor);
        // pp($gameData);die;
        
        if (M("bsw_game")->save($gameData)) {
            $this->success("修改成功", U("/Admin/Bsw/Index/"));
        } else {
            E("修改失败");
        }
    }


    //赛事项目列表
    public function eventIndex() {
        $eventData = M("bsw_event")->select();
        $this->eventList = $eventData;
        $this->display("eventIndex");
    }

    //添加赛事项目
    public function AddEvent() {
        //父级ID
        $this->e_pid = I("e_pid", 0, "intval");
        $this->display("addEvent");
    }

    //赛事项目表单处理
    public function AddEventHandle() {
        $eventName = I("e_name");
        $e_pid = I("e_pid", 0, "intval");
        $e_pyname = TranslateValue($eventName);
        $e_sort = I("e_sort");
        $eventData = array("e_name" => $eventName, "e_pid" => $e_pid, "e_pyname" => $e_pyname,"e_sort" => $e_sort);
        
        // pp($_POST);
        // pp($eventData);die;
        if (M("bsw_event")->add($eventData)) {
            $this->success("添加赛事项目成功", U("/Admin/Bsw/eventIndex/"));
        } else {
            $this->E("添加失败");
        }
    }
    
    //修改赛事项目
    public function alterEvent($id)
    {
        if ($id >0) {
            $this -> eventModel = M("bsw_event") ->find($id);
        }
       $this ->display("alterEvent");
    }
    //处理赛事项目
    public function handleAlterEvent()
    {
        $id = I("id");
        $eventName = I("e_name");
        $e_pid = I("e_pid", 0, "intval");
        $e_pyname = TranslateValue($eventName);
        $e_sort = I("e_sort");
        $eventData = array("id" =>$id,"e_name" => $eventName, "e_pid" => $e_pid, "e_pyname" => $e_pyname, "e_sort" => $e_sort);
        
        // pp($_POST);pp($eventData);die;
        if (M("bsw_event")->save($eventData)) {
            $this->success("修改赛事项目成功", U("/Admin/Bsw/eventIndex/"));
        } else {
            $this->E("修改失败");
        }
    }

    //赛事比赛场次列表
    public function matchIndex() {
        $match = M("bsw_match");
        $count = $match->count();
        $Page = new\Think\Page($count, 10);
        $limit = $Page->firstRow.','.$Page->listRows;
        $dataList = $match->field($field)->order('id desc')->limit($limit)->select();
        $show = $Page->Show();
        $this->dataList = $dataList;
        $this->show = $show;

        // pp($DataList);
        // die;
        $this->display("matchIndex");
    }

    //添加赛事比赛
    public function addMatch() {
        $g_id = I("g_id", 0, "intval");
        $g_name = I('g_name');

        // pp($g_name);
        // die;
        $this->g_id = $g_id;
        $this->g_name = $g_name;

        $this->display("addMatch");
    }

    //添加赛事比赛表单处理
    public function addMatchhHandle() {
        $g_id = I("g_id");
        $m_name = I("m_name");
        $m_time_s = I("m_time_s");
        $m_time_e = I("m_time_e");
        $m_gps = I("m_gps");
        $m_introdction = I("m_introduction");

        $data = array("g_id" => $g_id, "m_name" => $m_name, "m_time_s" => strtotime($m_time_s), "m_time_e" => strtotime($m_time_e), "m_gps" => $m_gps, "m_introduction" => $m_introdction);
        if (M("bsw_match")->add($data)) {
            $this->success("添加成功", U("/Admin/Bsw/matchIndex/"));
        } else {
            E("添加失败");
        }
    }
    
    //修改比赛
    public function alterMatch($id)
    {
        if ($id > 0) {
            $this ->matchModel = M("bsw_match") ->find($id);
            $this ->gameList = M('bsw_game') ->select();
        }
        $this ->display("alterMatch");
    }
    
    //处理修改比赛
    public function handleAlterMatch()
    {
        $id = I("id");
        $g_id = I("g_id");
        $m_name = I("m_name");
        $m_time_s = I("m_time_s");
        $m_time_e = I("m_time_e");
        $m_gps = I("m_gps");
        $m_introdction = I("m_introduction");

        $data = array("id" =>$id,"g_id" => $g_id, "m_name" => $m_name, "m_time_s" => strtotime($m_time_s), "m_time_e" => strtotime($m_time_e), "m_gps" => $m_gps, "m_introduction" => $m_introdction);
        if (M("bsw_match")->save($data)) {
            $this->success("修改成功", U("/Admin/Bsw/matchIndex/"));
        } else {
            E("修改失败");
        }
    }
    

    //赛事比赛文章列表
    public function articleIndex() {
        $article = M("bsw_article");
        $count = $article->count();
        $Page = new\Think\Page($count, 10);
        $limit = $Page->firstRow.','.$Page->listRows;
        $dataList = $article->field($field)->order('id desc')->limit($limit)->select();
        $show = $Page->Show();
        $this->dataList = $dataList;
        $this->show = $show;
        // pp($dataList);
        // die;
        $this->display("article");
    }

    //比赛文章添加
    public function addArticle() {
        $g_id = I("g_id");
        $m_id = I("m_id");
        $m_name = I('m_name');

        $this->g_id = $g_id;
        $this->m_id = $m_id;
        $this->m_name = $m_name;

        $this->display("addarticle");
    }

    //比赛文章添加表单处理
    public function addArticleHandle() {
        $g_id = I("g_id", 0, "intval");
        $m_id = I("m_id", 0, "intval");
        $a_title = I("a_title");
        $a_time = I("a_time");
        $a_content = I("a_content", "", "htmlspecialchars");

        $data = array("g_id" => $g_id, "m_id" => $m_id, "a_title" => $a_title, "a_time" => strtotime($a_time), "a_content" => $a_content);
        // pp($data);
        // die;
        if (M("bsw_article")->add($data)) {
            $this->success("添加成功!", U("/Admin/bsw/articleIndex/"));
        } else {
            E("添加失败");
        }
    }
    
    public function alterArticle($id)
    {
        if ($id > 0) {
            $this -> articleModel = M("bsw_article") ->find($id);
            $this ->matchList = M("bsw_match") ->select();
        }
        $this -> display("alterArticle");
    }
    
    public function handleAlterArticle()
    {
        $id = I("id");
        $g_id = I("g_id", 0, "intval");
        $m_id = I("m_id", 0, "intval");
        $a_title = I("a_title");
        $a_time = I("a_time");
        $a_content = I("a_content", "", "htmlspecialchars");

        $data = array("id" =>$id,"g_id" => $g_id, "m_id" => $m_id, "a_title" => $a_title, "a_time" => strtotime($a_time), "a_content" => $a_content);
        // pp($data);
        // die;
        if (M("bsw_article")->save($data)) {
            $this->success("修改成功!", U("/Admin/bsw/articleIndex/"));
        } else {
            E("修改失败");
        }
    }

}
?>