<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------


//echo '<pre>';
//print_r($_GET);

//$contorl = isset($_GET['m']) ? $_GET['m']:'Index';
//echo $contorl;
// phpinfo();
// die();


// 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
define('APP_DEBUG',True);

// 定义应用目录,绝对路径可以增加效率

//生成应用
define('APP_PATH','./App/');

////生成新的模块
//define('BIND_MODULE','Admin');
////生成多个Controller
//define('BUILD_CONTROLLER_LIST','Index,User,Menu');
//define('BUILD_MODEL_LIST','User,Menu');

//新版本添加这个会导致缺少冒号报错不提示
//define('THINK_PATH','./ThinkPHP/');

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';

// 亲^_^ 后面不需要任何代码了 就是如此简单