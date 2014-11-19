<?php if (!defined('THINK_PATH')) exit(); echo ($css); ?>
<div id="right">
    <div class="title">
    	<span>患者信息</span> — <span>病历信息</span>
    </div>
	<div class="content">
		<form action="<?php echo ($url); ?>/indexResult" target="indexResult" method="post">
	        <table class=" tb2 tb100" id="tb_condition" >
	            <thead>
				    <tr class="">
						<th width="">病历号</th>
						<th width="">姓名</th>
						<th width="">年龄</th>
						<th width="">性别</th>
						<th width="">诊断</th>
						<th width="">主治医生</th>
						<th width="">入院时间</th>
						<th width="">用药</th>
						<?php if(is_array($listOperationFieldSearch)): $i = 0; $__LIST__ = $listOperationFieldSearch;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><th><?php echo ($data2["name"]); ?></th><?php endforeach; endif; else: echo "" ;endif; ?>
						<th width="" class="operate">
							<a id="aAdd" >添加</a>
							<a id="aRemove" >删除</a>
						</th>
					</tr>
				</thead>
	            <tbody>
	            	<tr id="tr_1">
						<td align="center">
							<input type="text" name="medical_id_1" value="<?php echo ($medical_id); ?>" class="input inputS" />
						</td>
						<td align="center">
							<input type="text" name="name_1" value="<?php echo ($name); ?>" class="input inputS" />
						</td>
						<td align="center">
							<input type="text" name="age_1" value="<?php echo ($age); ?>" class="input inputS" />
						</td>
						<td align="center">
							<select name="sex_1" title="<?php echo ($sex); ?>" class="input _select">
							    <option value="">全部</option>
							    <option value="男">男</option>
							    <option value="女">女</option>
							</select>
						</td>
						<td align="center">
							<select name="diagnosis_id_1" title="<?php echo ($diagnosis_id); ?>" class="input _select">
							    <option value="">全部</option>
								<?php if(is_array($listDiagnosis)): $i = 0; $__LIST__ = $listDiagnosis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
						<td align="center">
							<select name="doctor_id_1" title="<?php echo ($doctor_id); ?>" class="input _select">
							    <option value="">全部</option>
								<?php if(is_array($listDoctor)): $i = 0; $__LIST__ = $listDoctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
						<td align="center">
							<input type="text" name="admission_time_1" value="<?php echo ($admission_time); ?>" class="input inputS" />
						</td>
						<td align="center">
							<select name="medicine_id_1" title="<?php echo ($medicine_id); ?>" class="input _select">
							    <option value="">全部</option>
								<?php if(is_array($listMedicine)): $i = 0; $__LIST__ = $listMedicine;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
						<?php if(is_array($listOperationFieldSearch)): $i = 0; $__LIST__ = $listOperationFieldSearch;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><td>
								<?php if($data2['type'] == '1'): ?><input type="text" id="test" name="<?php echo ($data2["id"]); ?>_1" value="<?php echo ($data2["search"]); ?>" class="input inputS" />
								<?php else: ?> 
								    <select name="<?php echo ($data2["id"]); ?>_1" title="<?php echo ($data2["search"]); ?>" class="_select input">
										<option value="">全部</option>
								    	<?php if(is_array($data2["options"])): $i = 0; $__LIST__ = $data2["options"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data3): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data3); ?>"><?php echo ($data3); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
								    </select><?php endif; ?>
							</td><?php endforeach; endif; else: echo "" ;endif; ?>
						<td align="center" class="operate">
							<select name="operate_1" title="" class="input">
								<option value="0">并且</option>
								<option value="1">或者</option>
								<option value="2">不含</option>
							</select>
						</td>
					</tr>
				</tbody>
				</tfoot>
	        </table>
	        <div class="edit">
	        	<input type="hidden" id="cnt" name="cnt"> 
	        	<input type="submit" class="btn" value="查 询"/>
	        </div>
        </form><br>
        <iframe frameborder="0" name="indexResult" src="<?php echo ($url); ?>/indexResult"></iframe>
	</div>
</div>
<?php echo ($js); ?>
<script type="text/javascript">
function model() {
    var id;
}
function aRemoveInit() {
}
var cnt = 1;
$(function () {
	$("#cnt").val(cnt);
	aRemoveInit();
    var trClone = $("#tr_1").clone();
    $("#aAdd").click(function (){
        var trTmp = trClone.clone();
        cnt++;
        trTmp.find(".input").each(function () {
        	var nameLast = $(this).attr("name");
        	var nameThis = nameLast.substring(0, nameLast.lastIndexOf("_") + 1) + cnt;
        	$(this).attr("name", nameThis);
        });
        $("#tb_condition").append(trTmp);
        $("#cnt").val(cnt);
    });
    $("#aRemove").click(function (){
    	cnt--;
        $("#tb_condition tr:last").remove();
        $("#cnt").val(cnt);
    });
	$("select[name='diagnosis_id']").val("<?php echo ($diagnosis_id); ?>");
	$("select[name='status']").val("<?php echo ($status); ?>");
})
</script>