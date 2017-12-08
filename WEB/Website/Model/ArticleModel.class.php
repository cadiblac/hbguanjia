<?php
namespace Website\MOdel;
use Think\Model\RelationModel;

class ArticleModel extends RelationModel{
	Protected $tableName = 'article';
	Protected $_link = array(
		'attr' => array(
			'mapping_type' => self::MANY_TO_MANY,
			'mapping_name' => 'attr',
			'foreign_key' => 'artid',
			'relation_foreign_key' => 'attrid',
			'relation_table' => 'lj_article_attr',
			)
		);

	public function getArticle ($where) {
		$field = array('del','keywords','description','pic','content');
		return $this->field($field,true)->where($where)->relation(true)->order('id DESC');
	}


}


?>