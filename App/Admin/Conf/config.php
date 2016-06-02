<?php
return array(
	//'配置项'=>'配置值'
        'RBAC_SUPERADMIN' => "admin",       //超级管理员名称
        'ADMIN_AUTH_KEY' => 'superadmin' ,  //超级管理员识别
        'USER_AUTH_ON' => TRUE,             //是否开启验证
        'USER_AUTH_TYPE' => 1,              //验证类型(1登陆验证，2时时验证)
        'USER_AUTH_KEY' =>'uid',             //用户认证识别号
        'NOT_AUTH_MODULE' => 'Index',            //无需验证的控制器
        'NOT_AUTH_ACTION' => '',            //无需验证的控制器方法
        'RBAC_ROLE_TABLE' =>'ktm_rbac_role',         //角色表名称
        'RBAC_USER_TABLE' => 'ktm_rbac_role_user',//角色与用户名的中间表名称
        'RBAC_ACCESS_TABLE' => 'ktm_rbac_access',    //权限表名称
        'RBAC_NODE_TABLE' => 'ktm_rbac_node',        //节点表名称
        
        'TMPL_PARSE_STRING' => array(
            '__STATIC__' => __ROOT__ . '/Public/Static',
            '__PUBLIC__' => __ROOT__ . '/Public/Admin',
        ),
        'URL_HTML_SUFFIX' => '',//URL路径是否带后缀名
);