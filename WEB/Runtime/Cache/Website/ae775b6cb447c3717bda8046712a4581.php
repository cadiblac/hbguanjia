<?php if (!defined('THINK_PATH')) exit();?><script language="javascript"> 
	var zTree;
	var setting = {
		view: {
			dblClickExpand: false,
			showLine: true,
			selectedMulti: false
		},
		data: {
			simpleData: {
				enable:true,
				idKey: "id",
				pIdKey: "pId",
				rootPId: ""
			}
		},
		callback: {
			beforeClick: function(treeId, treeNode) {
				var zTree = $.fn.zTree.getZTreeObj("tree");
				if (treeNode.isParent) {
					zTree.expandNode(treeNode);
					return false;
				} else {
					self.location=treeNode.file +'.htm';
					return true;
				}
			}
		}
	};

	var zNodes =[
	    <?php if(is_array($cate)): foreach($cate as $key=>$v): if($v['html']): ?>{id:<?php echo ($v["id"]); ?>, pId:<?php echo ($v["pid"]); ?>, name:"<?php echo ($v["name"]); ?>", file:<?php if($v['model'] == 'Slink'): ?>"javascript:void(0)"<?php else: ?>"<?php echo U(MODULE_NAME.'/'.$v['model'].'/index',array('id' => $v['id']));?>"<?php endif; ?>},
		<?php else: ?>
		{id:<?php echo ($v["id"]); ?>, pId:<?php echo ($v["pid"]); ?>, name:"<?php echo ($v["name"]); ?>", open:true, file:<?php if($v['model'] == 'Slink'): ?>"javascript:void(0)"<?php else: ?>"<?php echo U(MODULE_NAME.'/'.$v['model'].'/index',array('id' => $v['id']));?>"<?php endif; if($v['model'] != 'Info'): ?>,icon:"/WEB/Website/public/Css/zTreeStyle/img/diy/12.png"<?php endif; ?>},<?php endif; endforeach; endif; ?>
	];

	$(document).ready(function(){
		var t = $("#tree");
		t = $.fn.zTree.init(t, setting, zNodes);
		var zTree = $.fn.zTree.getZTreeObj("tree");
	});
</script>
<aside class="mail-nav mail-nav-bg-color">
	<header class="header"> <h4>内容管理</h4> </header>
	<div class="mail-nav-body">
		<div class="text-center">
			<a class="btn btn-compose" href="javascript:;">
				栏目菜单
			</a>
			<ul id="tree" class="ztree"></ul>
		</div>
	</div>
	<footer class="text-center">
		<div class="btn-group">
			<a href="<?php echo U(MODULE_NAME.'/Article/trash');?>" title="回收站" class="btn mini btn-default">
				<i class="fa fa fa-trash-o"></i>
			</a>
		</div>
	</footer>
</aside>