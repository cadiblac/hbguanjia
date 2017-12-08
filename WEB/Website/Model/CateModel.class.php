<?php
namespace Website\MOdel;
use Think\Model\RelationModel;

Class CateController extends RelationModel{

	Protected $tableName = 'cate';
	Protected $_link = array(
		'info' => array(
			'mapping_type' => self::ONE_TO_ONE,
			'mapping_name' => 'info',
			'foreign_key' => 'cid',
			'relation_foreign_key' => 'fid',
			'relation_table' => 'lj_cate_info',
			)
		);

}