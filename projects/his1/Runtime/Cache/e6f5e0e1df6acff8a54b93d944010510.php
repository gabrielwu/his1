<?php if (!defined('THINK_PATH')) exit(); echo ($css); ?>
<div id="right">
    <div class="title">
    	<span>患者信息</span> — <span>手术信息</span>
    </div>
	<div class="">
		<form action="<?php echo ($url); ?>/index" method="post">
        <table class="tb1 tb2 tb100" id="tb_r" >
            <thead>
			    <tr class="">
					<th width="">病历号</th>
					<th width="">姓名</th>
					<th width="">年龄</th>
					<th width="">性别</th>
					<th width="">诊断</th>
					<th width="">主治医生</th>
					<th width="">主刀医生</th>
					<th width="">手术类型</th>
					<th width="">手术时间</th>
					<th width="" class="operate">操作</th>
				</tr>
			</thead>
            <tbody>
            	<tr>
					<td align="center">
						<input type="text" name="medical_id" value="<?php echo ($medical_id); ?>" class="inputS" />
					</td>
					<td align="center">
						<input type="text" name="name" value="<?php echo ($name); ?>" class="inputS" />
					</td>
					<td align="center">
						<input type="text" name="age" value="<?php echo ($age); ?>" class="inputS" />
					</td>
					<td align="center">
						<select name="sex" title="<?php echo ($sex); ?>" class="_select">
						    <option value="">全部</option>
						    <option value="男">男</option>
						    <option value="女">女</option>
						</select>
					</td>
					<td align="center">
						<select name="diagnosis_id" title="<?php echo ($diagnosis_id); ?>" class="_select">
						    <option value="">全部</option>
							<?php if(is_array($listDiagnosis)): $i = 0; $__LIST__ = $listDiagnosis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</td>
					<td align="center">
						<select name="doctor_id" title="<?php echo ($doctor_id); ?>" class="_select">
						    <option value="">全部</option>
							<?php if(is_array($listDoctor)): $i = 0; $__LIST__ = $listDoctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</td>
					<td align="center">
						<select name="operator_id" title="<?php echo ($operator_id); ?>" class="_select">
						    <option value="">全部</option>
							<?php if(is_array($listDoctor)): $i = 0; $__LIST__ = $listDoctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</td>
					<td align="center">
						<select name="operation_type_id" title="<?php echo ($operation_type_id); ?>" class="_select">
						    <option value="">全部</option>
							<?php if(is_array($listOperationType)): $i = 0; $__LIST__ = $listOperationType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</td>
					<td align="center">
						<input type="text" name="begin_time" value="<?php echo ($begin_time); ?>" class="inputS" />
					</td>
					<td align="center" class="operate">
						<input type="submit" class="btn2" value="查  询"/>
					</td>
				</tr>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
						<td align="center" class=""><?php echo ($data["medical_id"]); ?></td> 
						<td align="center" class=""><?php echo ($data["name"]); ?></td> 
						<td align="center" class=""><?php echo ($data["age"]); ?></td> 
						<td align="center" class=""><?php echo ($data["sex"]); ?></td>  
						<td align="center" class=""><?php echo ($data["diagnosis_name"]); ?></td>
						<td align="center" class=""><?php echo ($data["doctor_name"]); ?></td>  
						<td align="center" class=""><?php echo ($data["operator_name"]); ?></td>  
						<td align="center" class=""><?php echo ($data["operation_type_name"]); ?></td>  
						<td align="center" class=""><?php echo ($data["begin_time"]); ?></td>  
						<td align="center" class="operate">
							<a href="<?php echo ($url); ?>/view/<?php echo ($data["operation_id"]); ?>" class="" >详细信息</a> 
							<a href="javascript:remove(<?php echo ($data["operation_id"]); ?>, '<?php echo ($url); ?>/remove')" class="" >删除</a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
			<tfoot>
				<tr class="">
					<TD colSpan="20" align="center"><?php echo ($pageShow); ?></TD>
				</tr>
			</tfoot>
        </table>
        </form>
	</div>
</div>
<?php echo ($js); ?>
<script type="text/javascript">
function model() {
    var id;
}
$(function () {
	$("select[name='diagnosis_id']").val("<?php echo ($diagnosis_id); ?>");
	$("select[name='status']").val("<?php echo ($status); ?>");
})
</script>