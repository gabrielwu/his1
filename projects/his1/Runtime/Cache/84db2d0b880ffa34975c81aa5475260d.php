<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($css); ?>/index.css" rel="stylesheet" type="text/css" />    
<link href="<?php echo ($css); ?>/right.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
</head>
<body>
<div id="right">
    <div class="title">
    	<span>账户管理</span> — <span>管理员</span>
    </div>
	<div class="">
        <table class="tb1 tb2" id="tb_r" >
            <thead>
			    <tr class="">
					<th>用户名</th>
					<th>科室</th>
					<th class="operate">操作</th>
				</tr>
			</thead>
            <tbody>
				<tr>
					<td align="center">
						<input class="" type="text" id="username" name="username" value="" />
					</td>
					<td align="center">
						<select name="department_id" id="department_id" class="_select" title=<?php echo ($adminType); ?>>
							<option value="">全部</option>
							<option value="0">系统管理员</option>
							<?php if(is_array($listDepartment)): $i = 0; $__LIST__ = $listDepartment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data1): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data1["id"]); ?>"><?php echo ($data1["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</td>
					<td align="center" class="operate">
						<a href="javascript:query('<?php echo ($url); ?>/index')" class="" >查询</a>
						<a href="javascript:add('<?php echo ($url); ?>/add')" class="" >添加</a>
					</td>
				</tr>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
						<td align="center" class="">
						    <input id="name_<?php echo ($data["id"]); ?>" type="text" value="<?php echo ($data["username"]); ?>" />
						</td>  
						<td align="center" class="">
							<select id="department_id_<?php echo ($data["id"]); ?>" title="<?php echo ($data["department_id"]); ?>" class="_select">
								<option value="0">系统管理员</option>
								<?php if(is_array($listDepartment)): $i = 0; $__LIST__ = $listDepartment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>							
						</td>  
						<td align="center" class="operate">
							<a href="javascript:edit(<?php echo ($data["id"]); ?>, '<?php echo ($url); ?>/edit')" class="" >编辑</a>
							<a href="javascript:remove(<?php echo ($data["id"]); ?>, '<?php echo ($url); ?>/remove')" class="" >删除</a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
        </table>
	</div>
</div>
</body>
</html>
<script type="text/javascript">
function model() {
    var id;
    var username;
    var department_id;
}
function add(url) {
	var data = new model();
	data.username      = $("#username").val();
	data.department_id = $("#department_id").val();
	operate(data, url);
}
function query(url) {
	var data = new model();
	data.username      = $("#username").val();
	data.department_id = $("#department_id").val();
	window.location.href = url + "/" + data.username + "/" + data.department_id;
}
function edit(id, url) {
	var data = new model();
	data.id = id;
	data.username      = $("#username_" + id).val();
	data.department_id = $("#department_id_" + id).val();
	operate(data, url);
}
function remove(id, url) {
    if(confirm("您确定要执行操作？")) {
		var data = new model();
		data.id = id;
		operate(data, url);
    }
}
function operate(data, url) {
	$.ajax({
		url: url,
		type: 'POST',
		data: data,
		success: 
			function(result){
				if (result == '1') {	
					alert("操作成功！");
					window.location.reload();
				} else if (result == '-1') {
					alert("没有权限！");
				} else {
					alert("操作失败！");
				}
			}
	});
}
$(function() {
	$("._select").each(function () {
		var val = $(this).attr("title");
		$(this).val(val);
	});
});
</script>