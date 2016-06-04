<?php
return array( 
    'WEBSITE_HOST' => "http://bisai.cn",
    'TMPL_PARSE_STRING' => array(
        '__STATIC__' => __ROOT__ . '/Public/Static',
        '__PUBLIC__' => __ROOT__ . '/Public/Home/default',
    ),
    
    
     /* 开启路由功能 */
    'URL_ROUTER_ON'   => true, 
    'URL_ROUTE_RULES'=>array(
        //'news/:year/:month/:day' => array('News/archive', 'status=1'),
        //'news/:id'               => 'News/read',
        // 'news/:action/:year\d/:month/:day'=>'news/read?year=:2&month=:3&day=:4',
        //         'news/:action^delete|update|insert/:year\d/:month/:day'=>array(
        //                 'news/read?extra=:2&status=1','year=:2&month=:3&day=:4'
        //                 ),
 
        //$url  = 'http://www.test.com/index.php/news/read/2012/2/21/extraparam/test.html';
        //http://www.test003.com/Home/Bsw/Index/type/橄榄球/province/湖南/city/长沙/year/2014/month/6
        //www.test003.com/saishi/橄榄球/湖南/长沙/2014/6        
        
        // 此顺序不能更改
        'matches$'  => 'Bsw/index',        
        'matches/:type/:province/:city/:year\d/:month\d$' => 'Bsw/index?type=:1&=province=:2&=city=:3&=year=:4&=month=:5',//包含赛事搜索所有url条件
        'matches/:type/:province/:city/:year$' => 'Bsw/index?type=:1&=province=:2&=city=:3&=year=:4',//类型省市年份
        'matches/:type/:province/:year\d$' => 'Bsw/index?type=:1&=province=:2&=year=:3',//类型省年份
        'matches/:type/:province/:city$' => 'Bsw/index?type=:1&=province=:2&=city=:3',//类型省市
        'matches/:province/:city$' => 'Bsw/index?province=:1&=city=:2',//类型省市
        'matches/:year\d$' => 'Bsw/index?year=:1&type=all',//年份        
        'matches/:type$' => 'Bsw/index?type=:1&=province=all',//类型,省份都是使用此   url，暂未找到单个参数匹配区分的正则，然后在读取页面通过先处理event如果有就确定为搜索event，如果没有就是判断为搜索省份
        
        'match/:id\d$'  => 'Home/Bsw/viewGame?id=:1',//赛事浏览，采用复数是为了减少与game/year/重复的几率
    ),

);

?>