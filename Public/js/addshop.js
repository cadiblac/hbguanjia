var t = $(".join-money");
var g = $("#gid");
var c = $("#cid");
$(function(){
$(".add").click(function() {
	t.val(parseInt(t.val()) + 1); //点击加号输入框数值加1
});
$(".min").click(function(){
	t.val(parseInt(t.val())-1); //点击减号输入框数值减1
	if(t.val()<=0){
		t.val(parseInt(t.val())+1); //最小值为1
	}
});
});

function addcart(){
	$.post("/index.php/Index/goods/cart",{'cid':c.val(),'id':g.val(),'num':t.val()},function(result){
	if(result==1){			
		window.location.reload();		
	}else{
		alert("加入购物车失败！");			
	}
	});
}

function buy(){
	$.post("/index.php/Index/goods/buy",{'cid':c.val(),'id':g.val(),'num':t.val()},function(result){
	console.log(result);
	if(result.code==1){	
		window.location.href="/index.php/Index/Orders/index/id/"+result.rs; 		
	}else{
		alert(result.msg);
	}
	},"json");
}