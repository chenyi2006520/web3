<?php
namespace Admin\Model;
use Think\Model\RelationModel;

class UserRelationModel extends RelationModel {
    //定义主表名称
    protected $tableName = "user";
    
    //定义关联关系
    protected $_link = array(
        'rbac_role' => array(
          'mapping_type' => self::MANY_TO_MANY, //多对多关系
          'foreign_key' =>'user_id',            //主表在中间表中字段名称
          'relation_foreign_key' =>'role_id',   //副表在中间表中的字段
          'relation_table' =>'ktm_rbac_role_user',    //中间表名称
          'mapping_fields' =>'id,name,remark'   //副表中只需的字段
        )
    );
}