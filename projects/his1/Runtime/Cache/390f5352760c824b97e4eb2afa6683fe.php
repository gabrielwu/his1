<?php if (!defined('THINK_PATH')) exit();?><head>
<title>登录</title>
<?php echo ($css); ?>
</head>
<body onkeydown= "if(event.keyCode==13){checksubmit()}">
	<div id="war">
	    <div id="middle">
	        <div id="box" class="bg">
	            <div class="title">患者回访系统—<?php echo ($userTypeCn); ?>登录</div>
	            <form action="<?php echo ($url); ?>/index" method="post"  id="form">
                    <div id="" class="field-group">
                        <input id="username"  class="reg_input" type="username" name="username" placeholder="<?php echo ($usernameTitle); ?>" />
                    </div>
                    <div id="" class="field-group">
                        <input id="password"  class="reg_input" type="password" name="password" placeholder="<?php echo ($passwordTitle); ?>" />
                    </div>
                    <div id="" class="field-group">
                        <input type="button" id="btn_submit" class="btn" onclick="checksubmit()"  value="登  录" />
                        <input type="hidden" name="userType" value=<?php echo ($userType); ?>>
                        <span id="error"><?php echo ($errorTip); ?></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<?php echo ($js); ?>
<script type="text/javascript">
function checksubmit() {
   var username =  $("#username").val();
   if (username == "" || username == null) {
        alert("用户名不能为空！！！");
    } else {
        var password = $("#password").val();
        if(password == "" || password == null) { 
            alert("密码不能为空！！！");
        } else{
            $("#form").submit();
        }
    }
}
</script>
</html>