<?php if (!defined('THINK_PATH')) exit(); echo ($css); ?>
<div id="right">
    <div class="title">
    	<span>数据字典</span> — <span>诊断</span>
    </div>
	<div class="">
        <table class="tb1 tb2" id="tb_r" >
            <thead>
			    <tr class="">
					<th width="">诊断名称</th>
					<th width="">状态</th>
					<th  width="" class="operate">操作</th>
				</tr>
			</thead>
            <tbody>
				<tr>
					<td align="center">
						<input class="" type="text" id="name" name="name" value="" />
					</td>
					<td align="center">
						<select name="status" id="status" class="_select" title='<?php echo ($status); ?>'>
						    <option value="-1">全部</option>
							<option value="1">正常</option>
							<option value="0">关闭</option>
						</select>
					</td>
					<td align="center" class="operate">
						<a href="javascript:query('<?php echo ($url); ?>/index')" class="" >查询</a>
						<a href="javascript:add('<?php echo ($url); ?>/add')" class="" >添加</a>
					</td>
				</tr>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
						<td align="center" class="">
						    <input id="name_<?php echo ($data["id"]); ?>" type="text" value="<?php echo ($data["name"]); ?>" />
						</td>  
						<td align="center" class="">
						    <select id="status_<?php echo ($data["id"]); ?>" title="<?php echo ($data["status"]); ?>" class="_select">
							    <option value="1">正常</option>
							    <option value="0">关闭</option>
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
<?php echo ($js); ?>
<script type="text/javascript">
function model() {
    var id;
    var name;
    var status;
}
function query(url) {
	var data = new model();
	data.name          = $("#name").val();
	data.status        = $("#status").val();
	window.location.href = url + "/" + data.status + "/" + data.name;
}
function add(url) {
	var data = new model();
	data.name          = $("#name").val();
	data.status        = $("#status").val();
	if (data.status == "-1") {
		alert("请选择！");
		$("#status").focus();
		return;
	} 
	operate(data, url);
}
function edit(id, url) {
	var data = new model();
	data.id = id;
	data.name          = $("#name_" + id).val();
	data.status        = $("#status_" + id).val();
	operate(data, url);
}
</script>