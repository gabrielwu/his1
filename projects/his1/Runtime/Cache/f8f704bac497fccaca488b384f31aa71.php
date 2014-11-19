<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登录</title>
<link href="<?php echo ($css); ?>/index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<script type="text/javascript">
$(function(){
	changeLevel('p');
	$("input[name='level']").change(function(){
		changeLevel('d');
	});   
})
function changeLevel(init) {
	var usernameTitle  = "用户名：病历号";
    var passwordTitle  = "密  码：初始为身份证号后6位";
    var usernameTitle0 = "用户名：工号";
    var passwordTitle0 = "密  码：初始为身份证号后6位";
	if (init == "d") {
		$("#username").val(usernameTitle);
		$("#password0").val(passwordTitle);
	} else {
		if ($("input[name='level'][checked='checked']").val() == 'd') {
			$("#l1").removeAttr("checked");
			$("#l2").attr("checked", "checked");
            var usernameTmp = usernameTitle0;
            var passwordTmp = passwordTitle0;
			var usernameTitle0 = usernameTitle;
			var passwordTitle0 = passwordTitle;    
			var usernameTitle = usernameTmp;
			var passwordTitle = passwordTmp;
		} else {
			$("#l2").removeAttr("checked");
			$("#l1").attr("checked", "checked");
		}
		if ($("#username").val() == usernameTitle0) {
			$("#username").val(usernameTitle);
		}
		if ($("#password0").val() == passwordTitle0) {
			$("#password0").val(passwordTitle);
		}
	}
	
	$("#username").click(function(){
		if ($("#username").val() == usernameTitle) {
			$("#username").val("");
		}
	});
	$("#username").blur(function(){
    	if ($("#username").val() == "") {
    		$("#username").val(usernameTitle);
    	}
	});
    $("#password0").click(function(){
        $(this).css("display", "none");
   	    $("#password").css("display", "inline-block");
	    $("#password").focus();
	});
	$("#password").blur(function(){
	    if ($(this).val() == "") {
	    	$("#password0").css("display", "inline-block");
	    	$(this).css("display", "none");
	    }
	});
}
function checksubmit() {
   var username =  $("#username").val();
   if (username == ""|| username == null) {
        alert("用户名不能为空！！！");
    } else {
        var password = $("#password").val();
        if(password == ""||password == null) { 
            alert("密码不能为空！！！");
        } else{
            $("#form").submit();
        }
    }
}
</script>
</head>
<body onkeydown= "if(event.keyCode==13){checksubmit()}">
	<div id="war">
	    <div id="middle">
	        <div id="box" class="bg">
	            <div class="title">患者回访系统<?php echo ($level); ?></div>
	            <form action="<?php echo ($url); ?>/index" method="post"  id="form">
                    <div id="" class="field-group">
                        <input id="username" name="username" type="text" class="reg_input">
                    </div>
                    <div id="" class="field-group">
                        <input id="password0"  name="password" type="text" class="reg_input">
                        <input id="password"  name="password" type="password" class="reg_input" style="display:none">
                    </div>
                    <div id="" class="field-group field-group-2">
                        <input type="radio" id="l1" name="level" value="p" class="radio" />
                        <label for="l1">患者</label>
                        <input type="radio" id="l2" name="level" value="d" class="radio"/>
                        <label for="l2">医生</label>
                        <span id="error"><?php echo ($errorTip); ?></span>
                    </div>
                    <div id="" class="field-group">
                        <input type="button" id="btn_submit" class="btn" onclick="checksubmit()"  value="登  录" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>