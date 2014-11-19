<?php if (!defined('THINK_PATH')) exit(); echo ($css); ?>
<div id="right">
    <div class="title">
            <span>患者信息</span> － <span href="">回访新建</span>
    </div>
    <div class="content">
    	<div id="tab0" class="tab">
    	    <table class="table4">
    	    	<tr>
                    <td><span class="">病历号：<?php echo ($patient["medical_id"]); ?></span></td>
                    <td><span class="">姓名：<?php echo ($patient["name"]); ?></span></td>
                    <td><span class="">诊断：<?php echo ($patient["diagnosis_name"]); ?></span></td>
                    <td><span class="">科室：<?php echo ($patient["department_name"]); ?></span></td>
                    <td><a href="<?php echo ($root); ?>/patient/view"><span>病历信息</span></a></td>
                </tr>
    	    	<tr>
                    <td><span class="">描述</span></td>
                    <td colspan="4">
                        <textarea class="inputlock" readonly="readonly"><?php echo ($data[""]); ?></textarea>
                    </td>
                </tr>
    	    	<tr>
                    <td><span class="">希望医生解决的问题</span></td>
                    <td colspan="4">
                        <textarea class="inputlock" readonly="readonly"><?php echo ($data[""]); ?></textarea>
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
						<td width="" class="operate">操作 <a id="aAddMedicine" >添加</a></td>
					</tr>
					<tr id="tr_medicine" class="">
						<td align="center">
							<select name="medicine_id" id="medicine_id">
								<?php if(is_array($listMedicine)): $i = 0; $__LIST__ = $listMedicine;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
						<td align="center">
							<select name="medicine_frequency_id" id="medicine_frequency_id">
								<?php if(is_array($listMedicineFrequency)): $i = 0; $__LIST__ = $listMedicineFrequency;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["value"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
						<td align="center">
							<select name="medicine_usage_id" id="medicine_usage_id">
								<?php if(is_array($listMedicineUsage)): $i = 0; $__LIST__ = $listMedicineUsage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["value"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
						<td align="center">
							<input id="medicine_dose" class="inputS" name="medicine_dose" type="text"  />
						</td>
						<td align="center">
							<select name="medicine_unit_id" id="medicine_unit_id">
								<?php if(is_array($listMedicineUnit)): $i = 0; $__LIST__ = $listMedicineUnit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
                        <td align="center">
                            <input id="" class="inputS start" name="medicine_dose" type="text"  />
                        </td>
                        <td align="center">
                            <input id="" class="inputS end" name="medicine_dose" type="text"  />
                        </td>
						<td align="center" class="operate">
							<a class="aRemove">删除</a>
						</td>
					</tr>
				</tbody>
	        </table>
<iframe name="iframe" id="iframe" style="display:block">4567</iframe> 
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
                        <td width="" class="operate">操作 <a id="aAddMedicine" >添加</a></td>
                    </tr>
                    <tr id="tr_attachment" class="">
                        <td align="center">
                            <form name="" id="" action="<?php echo ($url); ?>/upload" method="post" enctype="multipart/form-data" target="iframe">
                                <input id="" class="inputS" name="medicine_dose" value="选择文件" type="file"  /></br>
                                <input type="submit" class="uploadSubmit" value="上 传" />
                            </form>
                        </td>
                        <td align="center">
                            <select name="" id="">
                                <?php if(is_array($listFollowUpAttachmentType)): $i = 0; $__LIST__ = $listFollowUpAttachmentType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                        <td align="center">
                            <textarea class="description"></textarea>
                        </td>
                        <td align="center" class="operate">
                            <a class="aRemove">删除</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="edit">
                <input id="edit_basic" type="button" class="btn" value="提交"  />
            </div>  
    	</div>
    </div>
</div>
<?php echo ($js); ?>
<script type="text/javascript" language="javascript" >
function aRemoveInit() {
    $(".aRemove").click(function (){
        $(this).parent().parent().remove()
    });
}
$(function () {
    $("#iframe").html(123);
    alert($("#iframe").html());
    aRemoveInit();
    var trMedicine = $("#tr_medicine").clone();
    $(".start").addClass("datepicker");
    $(".end").addClass("datepicker");
    datepickerInit();
    $("#aAddMedicine").click(function (){
        var trMedicine1 = trMedicine.clone();
        $("#tb_medicine").append(trMedicine1);
        aRemoveInit();
        $(".start").addClass("datepicker");
        $(".end").addClass("datepicker");
        datepickerInit();  
    });

    $(".inputEdit").css("display", "none");

    $(".tab").css("display", "none");
    $("#tab0").css("display", "block");
    $(".a-tab").click(function(){
        var tabId = $(this).attr("id").split("-")[1];
        $(".a-tab").removeClass("current");
        $(".tab[id!='"+ tabId +"']").css("display", "none");
        $(this).addClass("current");
        $("#" + tabId).css("display", "block");
    });
	
	$("#edit_basic").bind("click",function(){ 
	    edit("basic", "<?php echo ($data["stu_id"]); ?>"); 
	});
	$("#submit_basic").bind("click",function(){ 
	    submitEdit("basic", "<?php echo ($data["stu_id"]); ?>"); 
	});	
	$("#edit_graduate").bind("click",function(){ 
	    edit("graduate", "<?php echo ($data["stu_id"]); ?>"); 
	});
	$("#submit_graduate").bind("click",function(){ 
	    submitEdit("graduate", "<?php echo ($data["stu_id"]); ?>"); 
	});

	$("select[name='roll']").val("<?php echo ($data["roll"]); ?>");
	$("select[name='exam_mode']").val("<?php echo ($data["exam_mode"]); ?>");
	$("select[name='degree']").val("<?php echo ($data["degree"]); ?>");
	$("select[name='graduate_type']").val("<?php echo ($data["graduate_type"]); ?>");
	$("select[name='stu_gender']").val("<?php echo ($data["stu_gender"]); ?>");
});
</script>