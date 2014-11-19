<?php if (!defined('THINK_PATH')) exit(); echo ($css); ?>
<div id="right">
    <div class="title">
    	<span>患者信息</span> — <span>随访信息</span>
    </div>
	<div class="">
		<form action="<?php echo ($url); ?>/index" method="post">
        <table class="tb1 tb2 tb80" id="tb_r" >
<?php if(($userType == 'p')): ?><thead>
			    <tr class="">
					<th width="">回访时间</th>
					<th width="">状态</th>
					<th  width="" class="operate">操作</th>
				</tr>
			</thead>
            <tbody>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
						<td align="center" class=""><?php echo ($data["create_time"]); ?></td>  
						<td align="center" class=""><?php echo ($data["status_val"]); ?></td>  
						<td align="center" class="operate">
							<a href="<?php echo ($url); ?>/view/<?php echo ($data["id"]); ?>" class="" >详细信息</a>
<?php if(($data["status"] == '0')): ?><a href="javascript:remove(<?php echo ($data["id"]); ?>, '<?php echo ($url); ?>/remove')" class="" >删除</a><?php endif; ?>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
<?php elseif(($userType == 'd')): ?>
            <thead>
			    <tr class="">
					<th width="">病历号</th>
					<th width="">患者</th>
					<th width="">诊断</th>
					<th width="">回访时间</th>
					<th width="">状态</th>
					<th  width="" class="operate">操作</th>
				</tr>
			</thead>
            <tbody>
            	<tr>
					<td align="center">
						<input type="text" name="medical_id" value="<?php echo ($medical_id); ?>" />
					</td>
					<td align="center">
						<input type="text" name="name" value="<?php echo ($name); ?>" />
					</td>
					<td align="center">
						<select name="diagnosis_id" value="<?php echo ($diagnosis_id); ?>">
						    <option value="">全部</option>
							<?php if(is_array($listDiagnosis)): $i = 0; $__LIST__ = $listDiagnosis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
						</select>
					</td>
					<td align="center">
						<input type="text" name="create_time" value="<?php echo ($creat_time); ?>" />
					</td>
					<td align="center" class="">
					    <select name="status" value="<?php echo ($status); ?>">
						    <option value="">全部</option>
						    <option value="1">已阅</option>
						    <option value="0">未阅</option>
					    </select>
					</td>  
					<td align="center" class="operate">
						<input type="submit" class="btn2" value="查  询"/>
					</td>
				</tr>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
						<td align="center" class=""><?php echo ($data["medical_id"]); ?></td> 
						<td align="center" class=""><?php echo ($data["name"]); ?></td> 
						<td align="center" class=""><?php echo ($data["diagnosis"]); ?></td> 
						<td align="center" class=""><?php echo ($data["create_time"]); ?></td>  
						<td align="center" class=""><?php echo ($data["status_val"]); ?></td>  
						<td align="center" class="operate">
							<a href="<?php echo ($url); ?>/view/<?php echo ($data["id"]); ?>" class="" >详细信息</a>
<?php if(($data["status"] == '0')): ?><a href="javascript:remove(<?php echo ($data["id"]); ?>, '<?php echo ($url); ?>/remove')" class="" >删除</a><?php endif; ?>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
<?php else: endif; ?>
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