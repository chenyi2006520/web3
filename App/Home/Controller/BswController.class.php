<?php 
namespace Home\Controller;

use Think\Controller;

class BswController extends Controller {
    public function index() {        
        //matches/zuqiu
        //matches/anhui
        //类型,省份都是使用此   url，暂未找到单个参数匹配区分的正则，然后在读取页面通过先处理event如果有就确定为搜索event，如果没有就是判断为搜索省份
        
        $listModel = array();
        
        $search = I("search");
        if (trim($search) != "") {
            $dataArray = explode('-',$search);
            if(sizeof($dataArray) ==5 )
            {
                $listModel['event'] = $event = $dataArray[0];
                $listModel['province'] = $province = $dataArray[1];
                $listModel['city'] = $city = $dataArray[2];
                $listModel['year'] = $year = $dataArray[3];
                $listModel['month'] = $month = $dataArray[4];
            }
        }else
        {
            $listModel['event'] = $listModel['province'] = $listModel['city'] = $listModel['year'] =  $listModel['month'] = "all";
        }
        
        //页面城市选择处理
        $locationModel = M("bsw_location");
        $locationField = array('id','parentid','name','mergername','shortname','mergershortname','leveltype','citycode','zipcode','replace(lower(pinyin)," ","") as pinyin','jianpin','firstchar','lng','lat','remarks');
        $provinceList = $locationModel ->field($locationField) ->where("parentid = 100000") ->select();
        $this -> provinceList =  $provinceList;
        
        
        //赛事项目event
        $eventModel = M("bsw_event");
        $eventList = $eventModel  ->order('e_sort asc') ->select();
        $eventid = 0;
        if (trim($event) != "") {
            $eventid = $eventModel -> where(array("e_pyname" => $event)) ->select()[0]['id'];
        }
        
        
        // $eventid = array_filter($eventList, function($e) use ($event) { return $e['e_name'] == "排球"; })[0][id];
        $whereSQL = " 1 = 1";
        if ($eventid > 0) {//赛事项目的查询
            $whereSQL .= " and g_event = ".$eventid;
            
        }
        
        if ($province != "all" && !empty($province) && trim($province) != "") {//如果省份不为空或者all，就获取当前省份的id
            // $listModel['province'] = $province;
            $listModel['showMore'] = "1" ;            
                            
            foreach ($provinceList as $value) {//获取id赋值
                if (strtolower($value['pinyin']) == strtolower($province)) {
                    $cityParentId = $value['id'];
                }
            }         
            
            
            $cityList =  $locationModel -> field($locationField) ->where("parentid = '" . $cityParentId ."'") ->select();//获得当前省份的城市列表
            // pp($cityList);die;
            if (!empty($cityList)) {
                $listModel['showCityFlag'] = "0" ;//如果城市列表 不为空就要打开 more 样式
                $this ->cityList = $cityList;                                
            }else
            {
                $listModel['showCityFlag'] = "1" ;                
            } 
            
            //如果省份更换，还带有原来的city值，就要检查这个值是不是在city list里面，不在赋值为all
            if (!deep_in_array(strtolower($city),$cityList)) {
                $listModel['city'] = "all"; 
                $city = "all";
                // pp($cityList);die;                   
            }
                        
            
        }else
        {
            $listModel['province'] = 'all';
            $listModel['showCityFlag'] = '1';  //如果省份为all 关闭 more 样式
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
        
        $gameModel = M("bsw_game");
        //比赛省市的查询
        if ($province != "all" && $city != "all" && trim($province) != "" && trim($city) != "") {
            $whereSQL .= " and (g_location like '%". $province ."%' and g_location like '%". $city ."%')"; 
        }      
        else if($province != "all" && trim($province) != "")
        {
            $whereSQL .= " and g_location like '%". $province ."%'";             
        }
        
        $checkStartTime = "";
        $checkEndTime = "";
                
        if ($year != "all" && $month != "all" && !empty($year) && trim($year) != "" && !empty($month) && trim($month) != "" ) {
            //如果包含月份，那就需要查询这个月之内的所有数据从当月1日0点开始，到下个月1日0点之前,如果月份是12月的话，结束时间变为下一年的1月1日0点
            $checkStartTime = $year ."-". $month ."-01 00:00:01";
            
            if (0 < $month && $month < 12) {
                $checkEndTime = $year ."-". ($month+1) ."-01 00:00:00";  
            }else
            {
                $checkEndTime = ($year+1) ."-01-01 00:00:00";                
            }
            
        } elseif (!empty($year) && trim($year) != "") {//如果没有月份的，就是当年的1月月1日0点开始，
            $checkStartTime = $year ."-01-01 00:00:01";            
            $checkEndTime = $year ."-12-30 00:00:00";            
        }
              
              
        //如果时间相等好像没有数据出来，需要考虑怎么处理????????????????????????????????
        if ($checkStartTime != "" && $checkEndTime != "" && $year != "all" && $month != "all"  && !empty($year) && trim($year) != "" && !empty($month) && trim($month) != "") {
            $whereSQL .= " and (g_time_s <= ".strtotime($checkStartTime) ." and ". strtotime($checkEndTime) ." <= g_time_e )";            
        }
        
        if (($type == "all" && $province == "all" && $city == "all" && $year == "all" && $month == "all") || empty($_GET)) {            
            $gameList = $gameModel ->select();
        }else
        {
            $gameList = $gameModel ->where($whereSQL) ->select();            
        }
        
        // pp(getMatchUrl(1,$listModel,'all'));
        // pp($whereSQL);DIE;        
        // pp($listModel);die;
        // pp(strtotime("2014")."\n".strtotime("2014-01")."\n".strtotime("2014-01-01 00:00:00")."\n".time());die;
        // $search1 = array('g_event' => $eventid);
        // $search2['g_location'] = array(array('LIKE','%'. $province .'%'),array('LIKE','%'. $city .'%'),"or");
        
        if (empty($gameList)) {
            //如果为空就给前台一个标识
            $listModel['NoGameData'] = '1';
        }
        
        // pp($_GET);die;
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