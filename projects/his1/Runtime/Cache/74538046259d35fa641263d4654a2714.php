<?php if (!defined('THINK_PATH')) exit(); echo ($css); ?>
<div id="right">
    <div class="title">
    	<span>数据字典</span> — <span>手术字段</span>
    </div>
	<div class="">
        <table class="tb1 tb2 tb100" id="tb_r" >
            <thead>
			    <tr class="">
					<th width="">名称</th>
					<th width="">格式举例</th>
					<th width="">输入方式</th>
					<th width="">可取值(逗号隔开,v1,v2,...,vn)</th>
					<th width="">父级字段</th>
					<th width="">多值</th>
					<th width="">状态</th>
					<th width="">为查询条件</th>
					<th  width="" class="operate">操作</th>
				</tr>
			</thead>
            <tbody>
				<tr>
					<td align="center">
						<input class="" type="text" id="name" name="name" value="" />
					</td>
					<td align="center">
						<input class="" type="text" id="format" name="format" value="" />
					</td>
					<td align="center">
						<select name="type" id="type">
							<option value="3">复选框</option>
							<option value="2">下拉菜单</option>
							<option value="1">手动输入</option>
						</select>
					</td>
					<td align="center">
						<textarea id="value_options" name="value_options" value="" ></textarea>
					</td>
					<td align="center">
						<select name="father_id" id="father_id">
							<option value="0">无</option>							
							<?php if(is_array($listFather)): $i = 0; $__LIST__ = $listFather;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</td>
					<td align="center">
						<select name="multiple" id="multiple">
							<option value="0">否</option>
							<option value="1">是</option>
						</select>
					</td>
					<td align="center">
						<select name="status" id="status">
							<option value="1">正常</option>
							<option value="0">关闭</option>
						</select>
					</td>
					<td align="center">
						<select name="search" id="search">
							<option value="1">是</option>
							<option value="0">否</option>
						</select>
					</td>
					<td align="center" class="operate">
						<a href="javascript:add('<?php echo ($url); ?>/add')" class="" >添加</a>
					</td>
				</tr>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
						<td align="center">
							<input class="" type="text" id="name_<?php echo ($data["id"]); ?>" name="name" value="<?php echo ($data["name"]); ?>" />
						</td>
						<td align="center">
							<input class="" type="text" id="format_<?php echo ($data["id"]); ?>" name="format" value="<?php echo ($data["format"]); ?>" />
						</td>
						<td align="center">
							<select name="type" id="type_<?php echo ($data["id"]); ?>" title="<?php echo ($data["type"]); ?>" class="_select">
								<option value="3">复选框</option>
								<option value="2">下拉菜单</option>
								<option value="1">手动输入</option>
							</select>
						</td>
						<td align="center">
							<textarea id="value_options_<?php echo ($data["id"]); ?>" name="value_options" value="" ><?php echo ($data["value_options"]); ?></textarea>
						</td>
						<td align="center">
							<select name="father_id" id="father_id_<?php echo ($data["id"]); ?>" title="<?php echo ($data["father_id"]); ?>" class="_select">
								<option value="0">无</option>							
								<?php if(is_array($listFather)): $i = 0; $__LIST__ = $listFather;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
						<td align="center">
							<select name="multiple" id="multiple_<?php echo ($data["id"]); ?>" title="<?php echo ($data["multiple"]); ?>" class="_select">
								<option value="1">是</option>
								<option value="0">否</option>
							</select>
						</td>
						<td align="center">
							<select name="status" id="status_<?php echo ($data["id"]); ?>" title="<?php echo ($data["status"]); ?>" class="_select">
								<option value="1">正常</option>
								<option value="0">关闭</option>
							</select>
						</td>
						<td align="center">
							<select name="search" id="search_<?php echo ($data["id"]); ?>" title="<?php echo ($data["search"]); ?>" class="_select">
								<option value="1">是</option>
								<option value="0">否</option>
							</select>
						</td>
						<td align="center" class="operate">
							<a href="javascript:edit(<?php echo ($data["id"]); ?>, '<?php echo ($url); ?>/edit')" class="" >编辑</a>
							<a href="javascript:remove(<?php echo ($data["id"]); ?>, '<?php echo ($url); ?>/remove')" class="" >删除</a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
			<tfoot>
				<tr><td align="center" colspan="20"><?php echo ($pageShow); ?></td></tr>
			</tfoot>
        </table>
	</div>
</div>
<?php echo ($js); ?>
<script type="text/javascript">
function model() {
    var id;
    var name;
    var format;
    var type;
    var status;
    var multiple;
    var value_options;
    var father_id;
    var search;
}
function add(url) {
	var data = new model();
	data.name          = $("#name").val();
	data.format        = $("#format").val();
	data.type          = $("#type").val();
	data.value_options = $("#value_options").val();
	data.multiple      = $("#multiple").val();
	data.status        = $("#status").val();
	data.father_id     = $("#father_id").val();
	data.search        = $("#search").val();

	var canSubmit = true;
	canSubmit = isNonEmpty(data.name, "字段名称", $("#name"));
	if (canSubmit) {
		operate(data, url);
	} 
}
function edit(id, url) {
	var data = new model();
	data.id            = id;
	data.name          = $("#name_" + id).val();
	data.format        = $("#format_" + id).val();
	data.type          = $("#type_" + id).val();
	data.value_options = $("#value_options_" + id).val();
	data.multiple      = $("#multiple_" + id).val();
	data.status        = $("#status_" + id).val();
	data.father_id     = $("#father_id_" + id).val();
	data.search        = $("#search_" + id).val();

	var canSubmit = true;
	canSubmit = isNonEmpty(data.name, "字段名称", $("#name_" + id));
	if (canSubmit) {
		operate(data, url);
	} 
}
</script>