<?php if (!defined('THINK_PATH')) exit();?><!-- banner S -->
<div class="banner">
	
	<div class="bd">
		<ul>
			<?php
 $_link_data = M('banner')->where('type=1 and img is not null')->order("sort ASC,id DESC")->limit("5")->select(); foreach($_link_data as $_link_v) : extract($_link_v); ?><li style="background:url(<?php echo ($img); ?>) #BCE0FF center 0 no-repeat;"><a href="<?php if($url): echo ($url); else: ?>javascript:;<?php endif; ?>"></a></li><?php endforeach; ?>
		</ul>
	</div>

	<div class="hd"><ul></ul></div>
</div>

<script type="text/javascript">jQuery(".banner").slide({ titCell:".hd ul", mainCell:".bd ul", effect:"fold",  autoPlay:true, autoPage:true, trigger:"click" });</script>
<!-- banner E -->