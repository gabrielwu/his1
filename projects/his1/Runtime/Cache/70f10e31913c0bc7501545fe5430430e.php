<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($css); ?>/index.css" rel="stylesheet" type="text/css" />    
<link href="<?php echo ($css); ?>/right.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/left.js"></script>
<script type="text/javascript">
function model() {
    var repassword;
	var newpassword;
	var oldpassword;
}
$(function (){
    $("#btn_submit").click(function (){
	    var m = new model();
		m.repassword = $("#repassword").val();
		m.newpassword = $("#newpassword").val();
		m.oldpassword = $("#oldpassword").val();
		$.ajax({
				url: "<?php echo ($url); ?>/updatepassword",
				type: 'POST',
				data: m,
				success: function(result){
							switch (result) { 
								case '-1':
									$("#tip").text("不能为空！");
									break;	
								case '0':
									$("#tip").text("两次密码不一致！");
									break;	
								case '1':
									$("#tip").text("修改密码成功！");
									break;
								case '2':
									$("#tip").text("修改失败");
									break;
								case '3':
									$("#tip").text("原密码不正确！");
									break;									
							 }
						 }
				});
	})
})
</script>
</HEAD>
<BODY>
<div id="right">
    <div class="title">
    	<span>帐号管理</span> — <span>修改密码</span>
    	<!--<a id="" class="current" href="#">修改密码</a>-->
    </div>
    <div class="content">
			<table id="updatepassword">
    	    	<tr>
    	    		<td><span class="">原密码</span></td>
    	    		<td>
    	    			<input class="inputEdit inputL" id="oldpassword" type="password" />
    	    		</td>
				</tr>
    	    	<tr>
    	    		<td><span class="">新密码</span></td>
    	    		<td>
    	    			<input class="inputEdit inputL" id="newpassword" type="password" />
    	    		</td>
				</tr>
    	    	<tr>
    	    		<td><span class="">再次输入密码</span></td>
    	    		<td>
    	    			<input class="inputEdit inputL" id="repassword" type="password" />
    	    		</td>
				</tr>
			</table>
    	    <div class="edit">
    	        <input id="btn_submit" type="button" class="btn" value="提交"  />
				<a id="tip"></span>
    	    </div>
	</div>
</div>
</BODY>
</HTML>