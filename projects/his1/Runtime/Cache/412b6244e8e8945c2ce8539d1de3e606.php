<?php if (!defined('THINK_PATH')) exit(); echo ($css); ?>
<div id="right">
    <div class="title">
    	<span>帐号管理</span> — <span>修改密码</span>
    </div>
    <div class="content">
			<table id="updatepassword">
    	    	<tr>
    	    		<td><span class="">原密码</span></td>
    	    		<td>
    	    			<input class="inputEdit inputL" id="passwordOld" type="password" />
    	    		</td>
				</tr>
    	    	<tr>
    	    		<td><span class="">新密码</span></td>
    	    		<td>
    	    			<input class="inputEdit inputL" id="passwordNew" type="password" />
    	    		</td>
				</tr>
    	    	<tr>
    	    		<td><span class="">再次输入密码</span></td>
    	    		<td>
    	    			<input class="inputEdit inputL" id="passwordRe" type="password" />
    	    		</td>
				</tr>
			</table>
    	    <div class="edit ">
    	        <input id="btn_submit" type="button" class="btn" value="提交"  />
				<span id="tip"></span>
    	    </div>
	</div>
</div>
<?php echo ($js); ?>
<script type="text/javascript">
function model() {
    var passwordRe;
	var passwordNew;
	var passwordOld;
}
$(function (){
    $("#btn_submit").click(function (){
	    var m = new model();
		m.passwordRe  = $("#passwordRe").val();
		m.passwordNew = $("#passwordNew").val();
		m.passwordOld = $("#passwordOld").val();
		$.ajax({
				url: "<?php echo ($url); ?>/updatepassword",
				type: 'POST',
				data: m,
				success: function(result){
							switch (result) { 
								case '-1':
									$("#tip").text("不能为空！");
									$("#passwordNew").focus();
									break;	
								case '0':
									$("#tip").text("两次密码不一致！");
									$("#passwordRe").focus();
									break;	
								case '1':
									$("#tip").text("修改成功！");
									break;
								case '2':
									$("#tip").text("修改失败");
									break;
								case '3':
									$("#tip").text("原密码不正确！");
									$("#passwordOld").focus();
									break;									
							 }
						 }
				});
	})
})
</script>