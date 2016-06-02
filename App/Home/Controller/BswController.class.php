<?php 
namespace Home\Controller;

use Think\Controller;

class BswController extends Controller {
    // public function index($type="all",$province="all",$city="all",$year="all",$month="all") {
    public function index() {        
        //页面城市选择处理
        $locationModel = M("bsw_location");
        $provinceList = $locationModel ->where("parentid = 100000") ->select();
        $this -> provinceList =  $provinceList;
        $province = urldecode(I("province"));
        $city = urldecode(I("city"));
        $event = urldecode(I("type"));
        $year = I("year");
        $month = I("month");
        $cityParentId = "";        
        if ($province != "all" && !empty($province)) {//如果省份不为空或者all，就获取当前省份的id
            $listModel['province'] = $province;
            $listModel['showMore'] = "1" ;            
                            
            foreach ($provinceList as $value) {//获取id赋值
                if ($value['pinyin'] == strtolower($province)) {
                    $cityParentId = $value['id'];
                }
            }
            
            $cityList =  $locationModel ->where("parentid = '" . $cityParentId ."'") ->select();//获得当前省份的城市列表
            
            if (!empty($cityList)) {
                $listModel['showCityFlag'] = "0" ;//如果城市列表 不为空就要打开 more 样式
                $this ->cityList = $cityList;                                
            }else
            {
                $listModel['showCityFlag'] = "1" ;                
            } 
            
                        
            if (empty($city) || $city == "") {//如果城市为空 默认为当前省份所有城市
                $listModel['city'] = 'all';
            }else
            {
                //如果省份更换，还带有原来的city值，就要检查这个值是不是在city list里面，不在赋值为all
                if (!deep_in_array($city,$cityList)) {
                    $listModel['city'] = "all"; 
                    $city = "all";
                    // pp($cityList);die;                   
                }else
                {
                    $listModel['city'] = $city;                  
                }                 
            }
            
        }else
        {
            $listModel['province'] = 'all';
            $listModel['showCityFlag'] = '1';  //如果省份为all 关闭 more 样式
        } 
        
        
        
        if (empty($event)) {//赛事项目为空赋值为all
           $listModel['event'] = 'all' ;                         
        }else
        {
           $listModel['event'] = $event ;             
        }
        
        
        //年份数组 自动增长
        $thisYear = date("Y");
        $yearList = array();
        for ($i=2016; $i <= $thisYear; $i++) { 
            $yearList[] = $i;
        }
        $this -> yearList = $yearList;
        
        if (empty($year) || $year == "") {//时间为空则赋值all
            $listModel['year'] = "all";
        }else
        {
            $listModel['year'] = $year;            
        }
        
        if (empty($month) || $month == "") {//时间为空则赋值all
            $listModel['month'] = "all";
        }else
        {
            $listModel['month'] = $month;            
        }
        
        //赛事项目event
        $eventModel = M("bsw_event");
        $eventList = $eventModel ->select();
        $eventid = $eventModel -> where(array("e_name" => $event)) ->select()[0]['id'];

        $gameModel = M("bsw_game");
        // $eventid = array_filter($eventList, function($e) use ($event) { return $e['e_name'] == "排球"; })[0][id];
        $whereSQL = " 1 = 1";
        if ($eventid > 0) {//赛事项目的查询
            $whereSQL .= " and g_event = ".$eventid;
        }
        //比赛省市的查询
        if ($province != "all" && $city != "all") {
            $whereSQL .= " and (g_location like '%". $province ."%' and g_location like '%". $city ."%')"; 
        }      
        else if($province != "all")
        {
            $whereSQL .= " and g_location like '%". $province ."%'";             
        }
        
        $checkStartTime = "";
        $checkEndTime = "";
        // pp($year);
                
        if ($year != "all" && $month != "all" ) {
            //如果包含月份，那就需要查询这个月之内的所有数据从当月1日0点开始，到下个月1日0点之前,如果月份是12月的话，结束时间变为下一年的1月1日0点
            $checkStartTime = $year ."-". $month ."-01 00:00:01";
            
            if (0 < $month && $month < 12) {
                $checkEndTime = $year ."-". ($month+1) ."-01 00:00:00";  
            }else
            {
                $checkEndTime = ($year+1) ."-01-01 00:00:00";                
            }
            
        } else {//如果没有月份的，就是当年的1月月1日0点开始，
            $checkStartTime = $year ."-01-01 00:00:01";            
            $checkEndTime = $year ."-12-30 00:00:00";            
        }
        
        if ($checkStartTime != "" && $checkEndTime != "" && $year != "all" && $month != "all") {
            $whereSQL .= " and (g_time_s <= ".strtotime($checkStartTime) ." and ". strtotime($checkEndTime) ." <= g_time_e )";            
        }
        // pp($_GET);
        // pp($whereSQL);die;
        
        if (($type == "all" && $province == "all" && $city == "all" && $year == "all" && $month == "all") || empty($_GET)) {            
            $gameList = $gameModel ->select();
        }else
        {
            $gameList = $gameModel ->where($whereSQL) ->select();            
        }
        //pp($provinceList);DIE;        
        //pp($whereSQL);die;
        // pp(strtotime("2014")."\n".strtotime("2014-01")."\n".strtotime("2014-01-01 00:00:00")."\n".time());die;
        // $search1 = array('g_event' => $eventid);
        // $search2['g_location'] = array(array('LIKE','%'. $province .'%'),array('LIKE','%'. $city .'%'),"or");
        
        if (empty($gameList)) {
            //如果为空就给前台一个标识
            $listModel['NoGameData'] = '1';
        }
        
        
        // pp(getLocation($gameList[0]['g_location'],1,0,0));die;
        // pp($eventid);
        // pp($gameList);die;
        // pp($listModel);die;
        
        $this -> gameRanList = $gameModel -> order(" rand() ") ->limit(0,10) ->select();
        $this -> listModel = $listModel;
        $this -> eventList = $eventList;
        $this -> gameList = $gameList;              
        $this->display("index");
    }
    
    public function viewGame()
    {
        $g_id = I("id");
        $game =  M("bsw_game");
        $gameModel = $game ->find($g_id);
            if (!empty($gameModel)) {
            $this -> gameModel = $gameModel;            
        }else
        {
            E("没有找到呢");
        }
        
        $this -> gameRanList = $game ->order(" rand() ") ->limit(0,12) ->select();
        $this ->display("viewgame");
    }
    
    public function articleList()
    {
        $g_id = I("g_id");
        $m_id = I("m_id");
        
        $articleModel = M("bsw_article");
        if ($g_id > 0 && $m_id >0) {
            $articleList = $articleModel ->where(array('g_id' =>$g_id, 'm_id' => $m_id)) ->select();            
        }else {
            $articleList = $articleModel ->select();            
        }
        $this ->articleList = $articleList;
        
        $this -> display("articleList");
    }
    
   public function articleView()
   {
       $a_id = I('a_id');
       if ($a_id >0) {
            $articleModel = M("bsw_article")  ->find($a_id);
            $this ->articleModel = $articleModel;            
       }else {
           redirect(C("WEBSITE_HOST"));
       }
       
       $this ->display('articleView');
   }
}