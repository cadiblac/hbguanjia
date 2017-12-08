<?php
namespace Website\Controller;
use Think\Controller;

/**
* Rbac控制器
*/
class RbacController extends CommonController{
	//用户列表
	public function index (){
		//实例化userModel(用户关联模型)
        $this->user = D('user')->relation('role')->field('password',true)->select();
		$this->role = M('role')->select();
        $this->display();
		}
	//锁定/解锁用户操作
	public function lock (){
		$id = I('id','','intval');
		$type = I('type',0,intval);
		$msg = $type ? '锁定' : '解锁';
		$data['lock'] = $type;
		$result = M('user')->where(array(id=>$id))->save($data);

		if($result){
			$this->success('该用户已'.$msg.'!',U(MODULE_NAME.'/Rbac/index'));
		}
		else{
			$this->error('锁定失败');
		}
	}
	
	//重置用户密码
	public function modify (){
		$id = I('id','','intval');
		$password = md5(123456);
		if (M('user')->where(array('id' => $id))->setField('password',$password)){
			$this->success('密码重置成功',U(MODULE_NAME.'/Rbac/index'));
		}else{
			$this->error('密码重置失败');
		}
	}
	
	//角色列表
	public function role (){
		$this->role=M('role')->select();
		$this->display();

	}
	//节点列表
	public function node (){
	  $field = array('id','name','title','pid');
      $node = M('node')->field($field)->order('sort')->select();
      $tnode = node_merge($node);
      $this->node = $tnode;
      $this->display();
	}
	//删除节点
	public function deleteNode () {
		$id = I('id','',intval);
		$field = array('id','pid');
		$node = M('node')->field($field)->order('sort')->select();
		$tnode = getNode($node,$id);
		if ($tnode){			
			$where = 'id in('.$id.','.implode(',',$tnode).')';
		}else{
			$where = array('id'=>$id);
		}
		if (M('node')->where($where)->delete()){
			$this->success('删除成功',U(MODULE_NAME.'/Rbac/node'));
		}else{
			$this->error('删除失败');
		}
	}
	//添加用户
	public function addUser (){
		$this->role = M('role')->select();
		$this->group = M('auth_group')->select();
        $this->display();
	}
	//添加用户表单处理
	public function addUserHandle () {
		$zh=I('username');
		$name=I('name');
		$mm=I('password','',md5);
		if($zh=='' || $name=='' || $mm==''){
			$this->error('请把账号信息填写网站');
		}
		//用户信息
		$user = array(
           'username' => $zh,
		   'name' => $name,
           'password' => $mm,  
           'logintime' => time(),
           'loginip' => get_client_ip()
			);
		//所属角色
		$role = array();
		//添加用户
		if($uid = M('user')->add($user)){
			foreach ($_POST['role_id'] as $v) {
				$role[] = array(
                  'role_id' => $v,
                  'user_id' => $uid
					);
			}
			/*$access = array('uid'=>$uid,'group_id'=>$_POST['group_id']);
			M('auth_group_access')->add($access);  Auth权限分配入库*/
			//添加用户角色
			M('role_user')->addAll($role);

			$this->success('添加成功',U(MODULE_NAME.'/Rbac/index'));
		}else{
			$this->error('添加失败');
		}
	}
	//添加角色
	public function addRole (){
		$this->display();

	}
	
	//添加角色表单处理
	public function addRoleHandle (){
		if (M('role')->add($_POST)){
			$this->success('添加成功',U(MODULE_NAME.'/Rbac/role'));
		}else{
			$this->error('添加失败');
		}
	}
	
	//角色关闭/开启
	public function lockRole () {
		$id = I('id','',intval);
		$type = I('type',0,intval);
		$msg = $type ? '开启' : '关闭';
		if (M('role')->where(array('id'=>$id))->setField('status',$type)){
			$this->success('该角色已设置为'.$msg,U(MODULE_NAME.'/Rbac/role'));
		}else{
			$this->error('设置失败');
		}
		
	}
	//添加节点
	public function addNode (){
      $this->pid = I('pid',0,'intval');
      $this->level = I('level',1,'intval');
      switch ($this->level) {
      	case '1':
      		$this->type='应用';
      		break;
      	
      	case '2':
      		$this->type='控制器';
      		break;
      	case '3':
      		$this->type='动作方法';
      		break;
      }
      $this->display();
	}

	//添加节点表单
	public function addNodeHande (){
		if (M('node')->add($_POST)){
			$this->success('添加成功',U(MODULE_NAME.'/Rbac/node'));
		}else{
			$this->error('添加失败');
		}
	}
    //权限控制
	public function access (){
		$rid = I('rid',0,intval);
        
        $field = array('id','name','title','pid');
		$node = M('node')->order('sort')->select();

		//原有权限
		$access = M('access')->where(array('role_id'=>$rid))->getField('node_id',true);
		
		$this->node = node_merge($node,$access);
		$this->rid = $rid;
		$this->display();
	}
	//修改权限
	public function setAccess () {
		$rid = I('rid',0,intval);
        $db = M('access');
        //清空原权限
        $db->where(array('role_id'=>$rid))->delete();
        //组合新权限
		$data = array();
		foreach ($_POST['access'] as $v){
			$tmp = explode('_', $v);
			$data[] = array(
              'role_id' => $rid,
              'node_id' => $tmp[0],
              'level' => $tmp[1]
				);
		}
        //写入新权限
        if($db->addAll($data)){
        	$this->success('修改成功',U(MODULE_NAME.'/Rbac/role'));
        }else{
        	$this->error('修改失败');
        }
	}

}
?>