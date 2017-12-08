<?php
namespace Website\Model;
use Think\Model\RelationModel;
/**
* 用户与角色关联模型
*/
class UserModel extends RelationModel{
	
	/*定义主表名称
	Protected $tableName = 'user';
    */
	//定义关联关系
	Protected $_link = array(
       'role' => array(
       	  //关联关系MANY_TO_MANY多对多，HAS_ONE一对一，HAS_MANY一对多
          'mapping_type' => self::MANY_TO_MANY,
          //要关联的模型类名
          'class_name' => 'role', 
          //主表外键
          'foreign_key' => 'user_id',
          //关联表外键
          'relation_foreign_key' => 'role_id',
          //中间表名
          'relation_table' => 'lj_role_user',
          //关联表读取字段名
          'mapping_fields' => 'id,name,remark'
       	  )
		);
}
?>