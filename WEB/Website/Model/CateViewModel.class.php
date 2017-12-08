<?php
namespace Website\MOdel;
use Think\Model\ViewModel;

class CateViewModel extends ViewModel{

	public $viewFields = array(
		'cate' => array('id','name','keywords','description'),
		'info' => array('title','content','_on'=>'cate.id=info.cid')

	);
}
?>