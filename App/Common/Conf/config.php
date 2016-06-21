<?php
return array(
	/* 默认设定 */
	'LANG_SWITCH_ON' => true,   // 开启语言包功能
	'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
	'LANG_LIST'        => 'zh-cn,en-us', // 允许切换的语言列表 用逗号分隔
	'VAR_LANGUAGE'     => 'l', // 默认语言切换变量

	'MODULE_ALLOW_LIST'     =>  array('Home','Admin'), // 配置你原来的分组列表
	'DEFAULT_MODULE'        =>  'Home', // 配置你原来的默认分组
    'SESSION_AUTO_START'    => TRUE,//是否开启session

	/*数据库配置*/
    'DB_TYPE'               => 'MYSQL',//数据库类型
	'DB_HOST'               =>  'localhost', // 服务器地址
	'DB_NAME'               =>  'mydbforcy',          // 数据库名
	'DB_USER'               =>  'root',      // 用户名
	'DB_PWD'                =>  '1988chenyi@',          // 密码
	'DB_PORT'               =>  '3306',        // 端口
	'DB_PREFIX'             =>  'ktm_',    // 数据库表前缀
	
	/*数据库配置*/
    // 'DB_TYPE'               => 'MYSQL',//数据库类型
	// 'DB_HOST'               =>  'localhost', // 服务器地址
	// 'DB_NAME'               =>  'bswdb',          // 数据库名
	// 'DB_USER'               =>  'bswroot',      // 用户名
	// 'DB_PWD'                =>  'bswrootUcloud003',          // 密码
	// 'DB_PORT'               =>  '3306',        // 端口
	// 'DB_PREFIX'             =>  'ktm_',    // 数据库表前缀
	
	'TMPL_CACHE_ON' => false,
	'TMPL_CACHE_TIME'=>0,

	'DEFAULT_CHARSET' => 'utf-8', // 默认输出编码
	// 'TMPL_TEMPLATE_SUFFIX' => '.html',//模板文件后缀名
	'URL_HTML_SUFFIX' => '',//URL路径是否带后缀名
	'URL_MODEL' => 2,//URL路径模型0、普通模式1、PATCH模式2、REWITE模式、3兼容模式
	'TMPL_VAR_IDENTIFY' => 'array',//模板只处理数组，提高编译效率
    'SESSION_TYPE' => 'Db',//自定义session数据库存储
    // 'SHOW_PAGE_TRACE' =>true, //显示页面读取数据库信息
	
	'APP_SUB_DOMAIN_DEPLOY'   =>    0, // 开启子域名配置
    'APP_SUB_DOMAIN_RULES'    =>    array(
        'www'        => 'Home',//使用www.bisai.cn访问
        'admin'        => 'Admin',//使用admin.bisai.cn访问
    ),
	
	'UPLOAD_SITEIMG_QINIU' => array ( 
                'maxSize' => 5 * 1024 * 1024,//文件大小
                'rootPath' => './',
                'saveName' => array ('uniqid', ''),
				'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),
				'autoSub'    =>    true,
				'subName'    =>    array('date','Ymd'),
                'driver' => 'Qiniu',
                'driverConfig' => array (
                        'secretKey' => 'GVAeJmZQ-OjL28pwGz_6QjsXyN9TWCR4bvMnW2BT', 
                        'accessKey' => '8WHj1wVSPnvUVUhlUwzHLfZDz2kl1WoBOZSoJW1X',
                        'domain' => 'img.bisai.cn',
                        'bucket' => 'bisai', 
	)),
	 
);