function send(){
var b1 = document.getElementById("inpt1").value;
var b2 = document.getElementById("inpt2").value;
var b3 = document.getElementById("inpt3").value;
var b4 = document.getElementById("inpt4").value;
var b5 = document.getElementById("inpt5").value;
var b6 = document.getElementById("inpt6").value;
var b7 = document.getElementById("inpt7").value;
var b8 = document.getElementById("inpt8").value;
var b9 = document.getElementById("inpt9").value;
$.post("/index.php/Index/member/yanz",{'tel':b2,'code':b3},function(result){
    if(result==0){
		$("#label7").html("验证码错误");
		return false;
	}else if(result==1){
		$("#label7").html("验证码超时请重新获取");
		return false;
	}else{
		$("#label7").html("√");
	}
});

if(b1 == "" || b2 == "" || b3 == "" || b7 == ""){
alert("请填写完整必填项！");
return false;
}else{
$.post("/index.php/Index/member/fab",{'realname':b1,'tel':b2,'code':b3,'address':b4,'QQ':b5,'email':b6,'company':b7,'position':b8,'birthday':b9},function(result){
alert(result);
});
}

}

var countdown=60; 
function settime() {
    if (countdown == 0) { 
       document.getElementById("hq").removeAttribute("disabled");    
       document.getElementById("hq").value="获取验证码"; 
        countdown = 60; 
        return;
    } else { 
        document.getElementById("hq").setAttribute("disabled", true); 
        document.getElementById("hq").value="重新发送(" + countdown + ")"; 
        countdown--; 
    }
	setTimeout(function(){ 
    settime() }
    ,1000) 
}

function yzm(){
	var b3 = document.getElementById("inpt2").value;
	if(!(/^1[3|4|5|7|8]\d{9}$/.test(b3))){ 
	$("#label6").html("手机号码错误！");
    }else{
	$.post("/index.php/Index/Dxin/sendMsg",{'mobile':b3},function(result){
    $("#label6").html(result);
	});
	setTimeout(function(){ 
    settime() }
    ,1000)}
}




