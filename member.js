
/*
**************************
(C)2010-2014 phpMyWind.com
update: 2012-10-16 14:31:32
person: Feng
**************************
*/


$(function(){
	$(".input").focus(function(){
		$(this).attr("class","inputon");
	}).blur(function(){
		$(this).attr("class","input");
	});
	
	$(".sub").mouseover(function(){
		$(this).attr("class","subon");
	}).mouseout(function(){
		$(this).attr("class","sub");
	}).mousedown(function(){
		$(this).attr("class","subdown");
	});
	
	$("#username").focus();
	
	
	$(".class_input").focus(function(){
		$(this).attr("class","class_input_on");
	}).blur(function(){
		$(this).attr("class","class_input");
	});
	
	$(".class_areatext").focus(function(){
		$(this).attr("class","class_areatext_on");
	}).blur(function(){
		$(this).attr("class","class_areatext");
	});
	
});

function CheckReg()
{
	var ckuname = /^[0-9a-zA-Z_@\.-]+$/;
	var mobile = document.getElementById("username").value;
	var checkbox = document.getElementById("checkbox"); 
	if($("#username").val() == "")
	{
		alert("手机号不能为空！");
		$("#username").focus();
		return false;
	}
	
	 if((!(/^[1]([3][0-9]{1}|59|58|88|89)[0-9]{8}$/.test(mobile)))){
						  alert("手机号码格式不正确！")
						   return false; 
					  }
					  
					 

	//else if($("#username").val().length < 6 || $("#username").val().length > 16)
//	{
//		alert("用户名长度为6~16位字符！");
//		$("#username").focus();
//		return false;
//	}
//	else if(!ckuname.test($("#username").val()))
//	{
//		alert("请使用[数字/字母/中划线/下划线/@.]！");
//		$("#username").focus();
//		return false;
//	}
	


	var ckupwd = /^[0-9a-zA-Z_-]+$/;
	if($("#password").val() == "")
	{
		alert("密码不能为空！");
		$("#password").focus();
		return false;
	}
	else if($("#password").val().length < 6 || $("#password").val().length > 16)
	{
		alert("密码长度为6~16位字符！");
		$("#password").focus();
		return false;
	}
	else if(!ckupwd.test($("#password").val()))
	{
		alert("请使用[数字/字母/中划线/下划线]！");
		$("#password").focus();
		return false;
	}


	if($("#repassword").val() == "")
	{
		alert("确认密码不能为空！");
		$("#repassword").focus();
		return false;
	}
	else if($("#password").val() != $("#repassword").val())
	{
		alert("两次输入的密码不相同！");
		$("#repassword").focus();
		return false;
	}

	if($("#validate").val() == "")
	{
		alert("验证码不能为空！");
		$("#validate").focus();
		return false;
	}
	
					   if(!checkbox.checked){
						  alert("还未同意客户协议！")
						   return false; 
					  }
	
	 if($("#t_name").val() == "")
	{
		alert("真实姓名不能为空！");
		$("#t_name").focus();
		return false;
	}
			
			 if($("#card").val() == "")
	{
		alert("身份证号不能为空！");
		$("#card").focus();
		return false;
	}		 
	
	
	var 
aCity={11:"北京",12:"天津",13:"河北",14:"山西",15:"内蒙古",21:"辽宁",22:"吉林",23:"黑龙江",31:"上海",32:"江苏",33:"浙江",34:" 安徽",35:"福建",36:"江西",37:"山东",41:"河南",42:"湖北",43:"湖南",44:"广东",45:"广西",46:"海南",50:"重庆",51:"四川",52:"贵州" ,53:"云南",54:"西藏",61:"陕西",62:"甘肃",63:"青海",64:"宁夏",65:"新疆",71:"台湾",81:"香港",82:"澳门",91:"国外"} 

var sId = document.getElementById("card").value;
var iSum=0 
var info="" 
if(!/^\d{17}(\d|x)$/i.test(sId))
{
	alert("身份证号格式不正确！");
		$("#card").focus();
		return false;
		}
var sId=sId.replace(/x$/i,"a"); 
if(aCity[parseInt(sId.substr(0,2))]==null){
	alert("非法地区！");
		$("#card").focus();
		return false;
	
	}
 var sBirthday=sId.substr(6,4)+"-"+Number(sId.substr(10,2))+"-"+Number(sId.substr(12,2)); 
var d=new Date(sBirthday.replace(/-/g,"/")) 
if(sBirthday!=(d.getFullYear()+"-"+ (d.getMonth()+1) + "-" + d.getDate())){
		alert("非法生日！");
		$("#card").focus();
		return false;
	
	}
for(var i = 17;i>=0;i --) iSum += (Math.pow(2,i) % 11) * parseInt(sId.charAt(17 - i),11) 
if(iSum%11!=1){
		alert("非法证号！");
		$("#card").focus();
		return false;

	}

	//var ckmail = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
//	if($("#email").val() == "")
//	{
//		alert("E-mail不能为空！");
//		$("#email").focus();
//		return false;
//	}
//	else if(!ckmail.test($("#email").val()))
//	{
//		alert("E-mail格式不正确！");
//		$("#email").focus();
//		return false;
//	}

if($("#province").val() == 0)
	{
		alert("地区不能为空！");
		$("#province").focus();
		return false;
	}
	
	
if($("#city").val() == 0)
	{
		alert("地区不能为空！");
		$("#city").focus();
		return false;
	}
	
	
if($("#area").val() == 0)
	{
		alert("地区不能为空！");
		$("#area").focus();
		return false;
	}


	
}

function CheckLog()
{
	if($("#username").val() == "")
	{
		alert("请输入用户名！");
		$("#username").focus();
		return false;
	}


	if($("#password").val() == "")
	{
		alert("请输入密码！");
		$("#password").focus();
		return false;
	}
	
	if($("#validate").val() == "")
	{
		alert("请输入验证码！");
		$("#validate").focus();
		return false;
	}
}

function CheckFind()
{
	if($("#username").val() == "")
	{
		alert("请输入用户名！");
		$("#username").focus();
		return false;
	}
	
	if($("#validate").val() == "")
	{
		alert("请输入验证码！");
		$("#validate").focus();
		return false;
	}
}

function CheckFindQues()
{
	if($("#question").val() == "-1")
	{
		alert("请选择验证问题！");
		$("#question").focus();
		return false;
	}
	if($("#answer").val() == "")
	{
		alert("请输入问题答案！");
		$("#answer").focus();
		return false;
	}
}

function CheckFindMail()
{
	var ckmail = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	if($("#email").val() == "")
	{
		alert("请输入E-mail！");
		$("#email").focus();
		return false;
	}
	else if(!ckmail.test($("#email").val()))
	{
		alert("E-mail格式不正确！");
		$("#email").focus();
		return false;
	}
}

function CheckNewPwd()
{
	var ckupwd = /^[0-9a-zA-Z_=]+$/;
	if($("#password").val() == "")
	{
		alert("密码不能为空！");
		$("#password").focus();
		return false;
	}
	else if($("#password").val().length < 6 || $("#password").val().length > 16)
	{
		alert("密码长度为6~16位字符！");
		$("#password").focus();
		return false;
	}
	else if(!ckupwd.test($("#password").val()))
	{
		alert("请使用[数字/字母/中划线/下划线]！");
		$("#password").focus();
		return false;
	}


	if($("#repassword").val() == "")
	{
		alert("确认密码不能为空！");
		$("#repassword").focus();
		return false;
	}
	else if($("#password").val() != $("#repassword").val())
	{
		alert("两次输入的密码不相同！");
		$("#repassword").focus();
		return false;
	}
}

function cfm_upmember()
{
	if($("#password").val() != "")
	{
		var ckupwd = /^[0-9a-zA-Z_-]+$/;
		if($("#password").val() == "")
		{
			alert("密码不能为空！");
			$("#password").focus();
			return false;
		}
		else if($("#password").val().length < 6 || $("#password").val().length > 16)
		{
			alert("密码长度为6~16位字符！");
			$("#password").focus();
			return false;
		}
		else if(!ckupwd.test($("#password").val()))
		{
			alert("请使用[数字/字母/中划线/下划线]！");
			$("#password").focus();
			return false;
		}

		if($("#repassword").val() == "")
		{
			alert("确认密码不能为空！");
			$("#repassword").focus();
			return false;
		}
		else if($("#password").val() != $("#repassword").val())
		{
			alert("两次输入的密码不相同！");
			$("#repassword").focus();
			return false;
		}

		var ckmail = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
		if($("#email").val() == "")
		{
			alert("E-mail不能为空！");
			$("#email").focus();
			return false;
		}
		else if(!ckmail.test($("#email").val()))
		{
			alert("E-mail格式不正确！");
			$("#email").focus();
			return false;
		}
	}
	else
	{
		var ckmail = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
		if($("#email").val() == "")
		{
			alert("E-mail不能为空！");
			$("#email").focus();
			return false;
		}
		else if(!ckmail.test($("#email").val()))
		{
			alert("E-mail格式不正确！");
			$("#email").focus();
			return false;
		}
	}
}



/*
 * 级联获取城市
 *
 * @access   public
 * @val      string  选择的省枚举值
 * @input    string  返回的select
 * @return   string  返回的option
 */

function SelProv(val,input)
{
	$("#"+input+"_country").html("<option>--</option>");

	$.ajax({
		url : "?a=getarea&datagroup=area&level=1&areaval="+val,
		type:'get',
		dataType:'html',
		success:function(data){
			$("#"+input+"_city").html(data);
		}
	});
}


/*
 * 级联选择区县
 *
 * @access   public
 * @val      string  选择的市枚举值
 * @input    string  返回的select
 * @return   string  返回的option
 */

function SelCity(val,input)
{
	$.ajax({
		url : "?a=getarea&datagroup=area&level=2&areaval="+val,
		type:'get',
		dataType:'html',
		success:function(data){
			$("#"+input+"_country").html(data);
		}
	});
}


//选择所有
function CheckAll(value)
{
	$("input[type='checkbox'][name^='checkid']").attr("checked",value);
}


//删除选中提示
function ConfDelAll(i)
{
	var tips = Array();
	tips[0] = "确定要删除选中的信息吗？";
	tips[1] = "系统会自动删除类别下所有子类别以及信息，确定删除吗？";
	tips[2] = "系统会自动删除类别下所有子类别，确定删除吗？";

	if($("input[type='checkbox'][name!='checkid'][name^='checkid']:checked").size() > 0)
	{
		if(confirm(tips[i])) return true;
		else return false;
	}
	else
	{
		alert('没有任何选中信息！');
		return false;
	}
}

//删除所有(不包含子分类)
function DelAllNone(url)
{
	$("#form").attr("action", url).submit();
}


//绑定账号
function cfm_binding()
{
	var ckuname = /^[0-9a-zA-Z_@\.-]+$/;
	if($("#username").val() == "")
	{
		alert("用户名不能为空！");
		$("#username").focus();
		return false;
	}
	else if($("#username").val().length < 6 || $("#username").val().length > 16)
	{
		alert("用户名长度为6~16位字符！");
		$("#username").focus();
		return false;
	}
	else if(!ckuname.test($("#username").val()))
	{
		alert("请使用[数字/字母/中划线/下划线/@.]！");
		$("#username").focus();
		return false;
	}

	var ckupwd = /^[0-9a-zA-Z_-]+$/;
	if($("#password").val() == "")
	{
		alert("密码不能为空！");
		$("#password").focus();
		return false;
	}
	else if($("#password").val().length < 6 || $("#password").val().length > 16)
	{
		alert("密码长度为6~16位字符！");
		$("#password").focus();
		return false;
	}
	else if(!ckupwd.test($("#password").val()))
	{
		alert("请使用[数字/字母/中划线/下划线]！");
		$("#password").focus();
		return false;
	}
}


function cfm_perfect()
{
	var ckuname = /^[0-9a-zA-Z_@\.-]+$/;
	if($("#username").val() == "")
	{
		alert("用户名不能为空！");
		$("#username").focus();
		return false;
	}
	else if($("#username").val().length < 6 || $("#username").val().length > 16)
	{
		alert("用户名长度为6~16位字符！");
		$("#username").focus();
		return false;
	}
	else if(!ckuname.test($("#username").val()))
	{
		alert("请使用[数字/字母/中划线/下划线/@.]！");
		$("#username").focus();
		return false;
	}
	


	var ckupwd = /^[0-9a-zA-Z_-]+$/;
	if($("#password").val() == "")
	{
		alert("密码不能为空！");
		$("#password").focus();
		return false;
	}
	else if($("#password").val().length < 6 || $("#password").val().length > 16)
	{
		alert("密码长度为6~16位字符！");
		$("#password").focus();
		return false;
	}
	else if(!ckupwd.test($("#password").val()))
	{
		alert("请使用[数字/字母/中划线/下划线]！");
		$("#password").focus();
		return false;
	}


	if($("#repassword").val() == "")
	{
		alert("确认密码不能为空！");
		$("#repassword").focus();
		return false;
	}
	else if($("#password").val() != $("#repassword").val())
	{
		alert("两次输入的密码不相同！");
		$("#repassword").focus();
		return false;
	}

	

	var ckmail = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;
	if($("#email").val() == "")
	{
		alert("E-mail不能为空！");
		$("#email").focus();
		return false;
	}
	else if(!ckmail.test($("#email").val()))
	{
		alert("E-mail格式不正确！");
		$("#email").focus();
		return false;
	}
}