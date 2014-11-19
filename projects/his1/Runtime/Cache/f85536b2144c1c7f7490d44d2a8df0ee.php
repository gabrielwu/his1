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
                    <td><span>病历信息</span></td>
                </tr>
    	    	<tr>
                    <td><span class="">描述</span></td>
                    <td colspan="4">
                        <textarea id="description" class="inputEdit"><?php echo ($data[""]); ?></textarea>
                    </td>
                </tr>
    	    	<tr>
                    <td><span class="">希望医生解决的问题</span></td>
                    <td colspan="4">
                        <textarea id="expectation" class="inputEdit"><?php echo ($data[""]); ?></textarea>
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
					<tr id="tr_medicine_1" class="tr_medicine">
						<td align="center">
							<select name="medicine_id" class="medicine_id">
								<?php if(is_array($listMedicine)): $i = 0; $__LIST__ = $listMedicine;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
						<td align="center">
							<select name="medicine_frequency_id" class="medicine_frequency_id">
								<?php if(is_array($listMedicineFrequency)): $i = 0; $__LIST__ = $listMedicineFrequency;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["value"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
						<td align="center">
							<select name="medicine_usage_id" class="medicine_usage_id">
								<?php if(is_array($listMedicineUsage)): $i = 0; $__LIST__ = $listMedicineUsage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["value"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
						<td align="center">
							<input class="inputS medicine_dose" name="medicine_dose" type="text"  />
						</td>
						<td align="center">
							<select name="medicine_unit_id" class="medicine_unit_id">
								<?php if(is_array($listMedicineUnit)): $i = 0; $__LIST__ = $listMedicineUnit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</td>
                        <td align="center">
                            <input id="" class="inputS inputDate begin_time" name="" type="text"  />
                        </td>
                        <td align="center">
                            <input id="" class="inputS inputDate end_time" name="" type="text"  />
                        </td>
						<td align="center" class="operate">
							<a class="aRemove">删除</a>
						</td>
					</tr>
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
                        <td width="" class="operate">操作 <a id="aAddAttachment" >添加</a></td>
                    </tr>
                    <tr id="tr_attachment_1" class="tr_attachment">
                        <td align="center" class="td_file" >
                            <form name="" id="" action="<?php echo ($url); ?>/upload" method="post" enctype="multipart/form-data" target="iframe">
                                <input id="" class="inputS" name="medicine_dose" value="选择文件" type="file"  />
                                <input name="tr_id" class="tr_id" type="hidden"  value="tr_attachment_1"/>
                                <input type="button" onclick="uploadSubmit(event)" class="btn2" value="上 传" />
                            </form>
                        </td>
                        <td align="center">
                            <select name="" class="attachment_type_id">
                                <?php if(is_array($listFollowUpAttachmentType)): $i = 0; $__LIST__ = $listFollowUpAttachmentType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                        <td align="center">
                            <textarea class="description"></textarea>
                        </td>
                        <td align="center" class="operate">
                            <a class="aRemoveAttachment">删除</a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="edit">
                <input id="edit_basic" onclick="javascript:submit()" type="button" class="btn" value="提交"  /><span id="tip"></span>
            </div>  
<iframe name="iframe" id="iframe" style="display:none"></iframe> 
    	</div>
    </div>
</div>
<?php echo ($js); ?>
<script type="text/javascript" language="javascript" >
function FollowUpAttachment() {
    var tr_id;
}
function FollowUp() {
    var id;
    var description;
    var expectation;
    var attachmentStr;
    var medicineStr;
}
function uploadSubmit(event) {
    event = event ? event : window.event;
    var obj = event.srcElement ? event.srcElement : event.target;
    var $obj = $(obj);
    $obj.parent().submit()
}
function submit() {
    var data = new FollowUp();
    data.description = $("#description").val();
    data.expectation = $("#expectation").val();
    data.medicineStr = "";
    var canSubmit = true;
    $(".tr_medicine").each(function() {
        var s = $(this).find(".medicine_id").val();
        s += "," + $(this).find(".medicine_frequency_id").val();
        s += "," + $(this).find(".medicine_usage_id").val();
        s += "," + $(this).find(".medicine_dose").val();
        s += "," + $(this).find(".medicine_unit_id").val();
        s += "," + $(this).find(".begin_time").val();
        s += "," + $(this).find(".end_time").val();
        $(this).find("input").each(function (){
            if ($(this).val() == "" && canSubmit) {
                $("#tip").text("请填写！");
                $(this).focus();
                canSubmit = false;
                return;
            }
        });
        data.medicineStr += s + ";";
    });
    data.medicineStr = data.medicineStr.substr(0, data.medicineStr.length - 1);
    data.attachmentStr = "";
    $(".tr_attachment").each(function() {
        var s = $(this).attr("id");
        s += "," + $(this).find(".attachment_type_id").val();
        s += "," + $(this).find(".description").val();
        if ($(this).find(".td_file").has("a").length == 0 && canSubmit) {
            $("#tip").text("请填写！");
            $(this).find("input").focus();
            canSubmit = false;
            return;
        }
        data.attachmentStr += s + ";";
    });
    data.attachmentStr = data.attachmentStr.substr(0, data.attachmentStr.length - 1);
    if (canSubmit) {
        $("#tip").text("");
    } else {
        return;
    }
    if(confirm("您确定要执行操作？")) {
        $.ajax({
            url: "<?php echo ($url); ?>/add",
            type: 'POST',
            data: data,
            success: 
                function(result){
                    if (result == '1') {    
                        var msg = "操作成功！";
                        alert(msg);
                        window.location.href = "<?php echo ($url); ?>/index";
                    } else if (result == '-1') {
                        alert("没有权限！");
                    } else {
                        alert("操作失败！");
                    }
                }
        });
    }
}
function aRemoveInit() {
    $(".aRemove").click(function (){
        $(this).parent().parent().remove();
    });
}
function aRemoveAttachmentInit() {
    $(".aRemoveAttachment").click(function (){
        var data = new FollowUpAttachment();
        data.tr_id = $(this).parent().parent().attr("id");
        operate(data, "<?php echo ($url); ?>/removeAttachment", false);
        $(this).parent().parent().remove();
    });
}
$(function () {
    aRemoveInit();
    aRemoveAttachmentInit();
    var trMedicine = $("#tr_medicine_1").clone();
    $(".inputDate").addClass("datepicker");
    datepickerInit();
    $("#aAddMedicine").click(function (){
        var trMedicineTmp = trMedicine.clone();
        $("#tb_medicine").append(trMedicineTmp);
        aRemoveInit();
        $(".inputDate").addClass("datepicker");
        datepickerInit();  
    });
    var trAttachmentCnt = 1;
    var trAttachment = $("#tr_attachment_1").clone();
    $("#aAddAttachment").click(function (){
        var trAttachmentTmp = trAttachment.clone();
        trAttachmentCnt++;
        var id = "tr_attachment_" + trAttachmentCnt;
        trAttachmentTmp.attr("id", id);
        trAttachmentTmp.find("input.tr_id").val(id);
        $("#tb_attachment").append(trAttachmentTmp);
        aRemoveAttachmentInit();
    });
});
</script>