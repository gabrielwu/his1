<?php if (!defined('THINK_PATH')) exit(); echo ($css); ?>
<div id="right">
    <div class="title">
    	<span>医生信息</span>
    </div>
    <span>初始密码及重置密码均为工号</span>
	<div class="">
        <table class="tb1 tb2 tb100" id="tb_r" >
            <thead>
			    <tr class="">
					<th width="">工号</th>
					<th width="">姓名</th>
					<th width="">性别</th>
					<th width="">职称</th>
					<th width="">联系电话</th>
					<th width="">出生日期</th>
					<th width="">专长</th>
					<th width="">状态</th>
					<th  width="" class="operate">操作</th>
				</tr>
			</thead>
            <tbody>
				<tr>
					<td align="center">
						<input class="inputS" type="text" id="job_id" name="job_id" value="" />
					</td>
					<td align="center">
						<input class="inputS" type="text" id="name" name="name" value="" />
					</td>
					<td align="center">
						<select name="sex" id="sex" class="">
							<option value="男">男</option>
							<option value="女">女</option>
						</select>
					</td>
					<td align="center">
						<select name="title_id" id="title_id" class="">
							<?php if(is_array($listTitle)): $i = 0; $__LIST__ = $listTitle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</td>
					<td align="center">
						<input class="inputS" type="text" id="phone" name="phone" value="" />
					</td>
					<td align="center">
						<input class="datepicker inputS" type="text" id="birthday" name="birthday" value="" />
					</td>
					<td align="center">
						<input class="" type="text" id="speciality" name="speciality" value="" />
					</td>
					<td align="center" class="">
					    <select id="status" class="">
						    <option value="1">在职</option>
						    <option value="0">离职</option>
					    </select>
					</td>  
					<td align="center" class="operate">
						<a href="javascript:add('<?php echo ($url); ?>/add')" class="" >添加</a>
					</td>
				</tr>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
						<td align="center" class="">
						    <input id="job_id_<?php echo ($data["id"]); ?>" type="text" value="<?php echo ($data["job_id"]); ?>" class="inputS" />
						</td>  
						<td align="center" class="">
						    <input id="name_<?php echo ($data["id"]); ?>" type="text" value="<?php echo ($data["name"]); ?>" class="inputS" />
						</td>  
						<td align="center" class="">
							<select id="sex_<?php echo ($data["id"]); ?>" title="<?php echo ($data["sex"]); ?>" class="_select ">
								<option value="男">男</option>
								<option value="女">女</option>
							</select>							
						</td>  
						<td align="center">
							<select id="title_id_<?php echo ($data["id"]); ?>" title="<?php echo ($data["title_id"]); ?>" class="_select">
								<?php if(is_array($listTitle)): $i = 0; $__LIST__ = $listTitle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
						<td align="center" class="">
						    <input id="phone_<?php echo ($data["id"]); ?>" type="text" value="<?php echo ($data["phone"]); ?>" class="inputS" />
						</td>  
						<td align="center" class="">
						    <input id="birthday_<?php echo ($data["id"]); ?>" type="text" value="<?php echo ($data["birthday"]); ?>" class="datepicker inputS" />
						</td>  
						<td align="center" class="">
						    <input id="speciality_<?php echo ($data["id"]); ?>" type="text" value="<?php echo ($data["speciality"]); ?>" />
						</td>  
						<td align="center" class="">
						    <select id="status_<?php echo ($data["id"]); ?>" title="<?php echo ($data["status"]); ?>" class="_select">
							    <option value="1">在职</option>
							    <option value="0">离职</option>
						    </select>
						</td>  
						<td align="center" class="operate">
							<a href="javascript:edit(<?php echo ($data["id"]); ?>, '<?php echo ($url); ?>/edit')" class="" >编辑</a>
							<a href="javascript:resetPassword(<?php echo ($data["id"]); ?>, '<?php echo ($url); ?>/resetPassword')" class="" >密码重置</a>
							<a href="javascript:remove(<?php echo ($data["id"]); ?>, '<?php echo ($url); ?>/remove')" class="" >删除</a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
			<tfoot>
				<tr class="">
					<TD colSpan="20" align="center"><?php echo ($pageShow); ?></TD>
				</tr>
			</tfoot>
        </table>
	</div>
</div>
</body>
</html>
<?php echo ($js); ?>
<script type="text/javascript">
function model() {
    var id;
    var job_id;
    var name;
    var sex;
    var phone;
    var birthday;
    var speciality;
    var title_id;
    var status;
}
function add(url) {
	var data = new model();
	data.job_id        = $("#job_id").val();
	data.name          = $("#name").val();
	data.sex           = $("#sex").val();
	data.phone         = $("#phone").val();
	data.birthday      = $("#birthday").val();
	data.speciality    = $("#speciality").val();
	data.status        = $("#status").val();
	data.title_id      = $("#title_id").val();
	var canSubmit = true;
	canSubmit = isNonEmpty(data.job_id, "工号", $("#job_id"));
	if (canSubmit) canSubmit = isNonEmpty(data.name, "姓名", $("#name"));
	if (canSubmit) {
		operate(data, url);
	} 
}
function edit(id, url) {
	var data = new model();
	data.id = id;	
	data.job_id        = $("#job_id_" + id).val();
	data.name          = $("#name_" + id).val();
	data.sex           = $("#sex_" + id).val();
	data.phone         = $("#phone_" + id).val();
	data.birthday      = $("#birthday_" + id).val();
	data.speciality    = $("#speciality_" + id).val();
	data.status        = $("#status_" + id).val();
	data.title_id      = $("#title_id_" + id).val();
	var canSubmit = true;
	canSubmit = isNonEmpty(data.job_id, "工号", $("#job_id_" + id));
	if (canSubmit) canSubmit = isNonEmpty(data.name, "姓名", $("#name_" + id));
	if (canSubmit) {
		operate(data, url);
	} 
}
</script>