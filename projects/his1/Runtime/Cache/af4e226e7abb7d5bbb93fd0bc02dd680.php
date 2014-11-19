<?php if (!defined('THINK_PATH')) exit(); echo ($css); ?>

        <table class="tb1 tb2 tb100" id="tb_r" >
            <thead>
			    <tr class="">
					<th width="">病历号</th>
					<th width="">姓名</th>
					<th width="">年龄</th>
					<th width="">性别</th>
					<th width="">诊断</th>
					<th width="">主治医生</th>
					<th width="">入院时间</th>
					<th width="" class="operate">操作</th>
				</tr>
			</thead>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
						<td align="center" class=""><?php echo ($data["medical_id"]); ?></td> 
						<td align="center" class=""><?php echo ($data["name"]); ?></td> 
						<td align="center" class=""><?php echo ($data["age"]); ?></td> 
						<td align="center" class=""><?php echo ($data["sex"]); ?></td>  
						<td align="center" class=""><?php echo ($data["diagnosis_name"]); ?></td>
						<td align="center" class=""><?php echo ($data["doctor_name"]); ?></td>  
						<td align="center" class=""><?php echo ($data["admission_time"]); ?></td>  
						<td align="center" class="operate">
							<a href="<?php echo ($url); ?>/view/<?php echo ($data["id"]); ?>" class="" target="main" >详细信息</a> 
							<a href="javascript:resetPassword(<?php echo ($data["id"]); ?>, '<?php echo ($url); ?>/resetPassword')" class="" >重置密码</a>
							<a href="<?php echo ($root); ?>/operation/index/medical_id/<?php echo ($data["medical_id"]); ?>" class="" >手术信息</a>
							<a href="<?php echo ($root); ?>/operation/addInput/patient_id/<?php echo ($data["id"]); ?>" class="" >新建手术</a>
							<a href="javascript:remove(<?php echo ($data["id"]); ?>, '<?php echo ($url); ?>/remove')" class="" >删除</a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
			<tfoot>
				<tr class="">
					<td colSpan="20" align="center"><?php echo ($pageShow); ?></td>
				</tr>
			</tfoot>
        </table>
<?php echo ($js); ?>
<script type="text/javascript">
$(function () {
})
</script>