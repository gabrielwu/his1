<?php if (!defined('THINK_PATH')) exit(); echo ($css); ?>
<div id="right">
    <div class="title">
    	<span>患者信息</span> — <span><a href="<?php echo ($url); ?>/index">回访信息</a></span> — <span>详细信息</span>
    </div>
	<div class="content">
	    <div id="tab0" class="tab">
    	    <table class="table4 tb1 tb2 tb80">
    	    	<tr>
                    <td><span><a href="<?php echo ($root); ?>/patient/view" title="查看病历" target="_blank">病历号：<?php echo ($follow_up["medical_id"]); ?></span></a></td>
                    <td><span>姓名：<?php echo ($follow_up["patient_name"]); ?></span></td>
                    <td><span>诊断：<?php echo ($follow_up["diagnosis_name"]); ?></span></td>
                    <td><span>科室：<?php echo ($follow_up["department_name"]); ?></span></td>
                    <td><span>回访状态：<?php echo ($follow_up["status_val"]); ?></span></td>
                </tr>
    	    	<tr>
                    <td colspan="2"><span class="">回访时间：<?php echo ($follow_up["create_time"]); ?></span></td>
                    <td colspan="2"><span>反馈时间：<?php echo ($follow_up["check_out_time"]); ?></span></td>
                    <td><span>反馈医生：<?php echo ($follow_up["doctor_name"]); ?></span></td>
                </tr>
    	    	<tr>
                    <td><span class="">描述</span></td>
                    <td colspan="4">
                        <textarea id="description" class="inputLock" readonly="readonly"><?php echo ($follow_up["description"]); ?></textarea>
                    </td>
                </tr>
    	    	<tr>
                    <td><span class="">希望医生解决的问题</span></td>
                    <td colspan="4">
                        <textarea id="expectation" class="inputLock" readonly="readonly"><?php echo ($follow_up["expectation"]); ?></textarea>
                    </td>
                </tr>
    	    </table>

	        <table class="tb1 tb2 tb80"  id="tb_medicine" >
	            <thead>
				    <tr class="">
						<th colspan="8" width="">目前用药</th>
					</tr>
				</thead>
	            <tbody id="">
				    <tr align="center" class="">
						<td width="">药物</td>
						<td width="">频度</td>
						<td width="">用法</td>
                        <td width="">一次剂量</td>
                        <td width="">剂量单位</td>
                        <td width="">开始时间</td>
                        <td width="">结束时间</td>
					</tr>
					<?php if(is_array($listMedicine)): $i = 0; $__LIST__ = $listMedicine;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr id="tr_medicine_1" class="tr_medicine">
							<td align="center"><?php echo ($data["medicine_name"]); ?></td>
							<td align="center"><?php echo ($data["frequency_value"]); ?></td>
							<td align="center"><?php echo ($data["usage_value"]); ?></td>
							<td align="center"><?php echo ($data["medicine_dose"]); ?></td>
							<td align="center"><?php echo ($data["unit_name"]); ?></td>
	                        <td align="center"><?php echo ($data["begin_time"]); ?></td>
	                        <td align="center"><?php echo ($data["end_time"]); ?></td>
						</tr><?php endforeach; endif; else: echo "" ;endif; ?>
				</tbody>
	        </table>
            <table class="tb1 tb2 tb80"  id="tb_attachment" >
                <thead>
                    <tr class="">
                        <th colspan="4" width="">附件</th>
                    </tr>
                </thead>
                <tbody id="">
                    <tr align="center" class="">
                        <td width="">文件</td>
                        <td width="">类型</td>
                        <td width="">描述</td>
                    </tr>
					<?php if(is_array($listAttachment)): $i = 0; $__LIST__ = $listAttachment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr id="tr_attachment_1" class="tr_attachment">
	                        <td align="center"><a href='<?php echo ($url); ?>/download/<?php echo ($data["file_name"]); ?>'>下载查看</a></td>
	                        <td align="center"><?php echo ($data["attachment_type_name"]); ?></td>
	                        <td align="center"><?php echo ($data["description"]); ?></td>
	                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
<?php if(($userType == 'd')): ?><br>
    	    <table class="table4 tb1 tb2 tb80">
    	    	<tr>
                    <td><span class="">医生反馈</span></td>
                    <td colspan="4">
                        <textarea id="feedback" class="inputEdit"><?php echo ($follow_up["feedback"]); ?></textarea>
                    </td>
                </tr>
    	    </table>
            <div class="edit">
                <input id="edit_basic" onclick="javascript:submit()" type="button" class="btn" value="提交"  /><span id="tip"></span>
            </div><?php endif; ?>
    	</div>
	</div>
</div>
<?php echo ($js); ?>
<script type="text/javascript">
function model() {
    var id;
    var feedback;
}
function submit() {
	var data = new model();
	data.feedback = $("#feedback").val();
	operate(data, "<?php echo ($url); ?>/check", true);
}
</script>