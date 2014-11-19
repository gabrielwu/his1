<?php if (!defined('THINK_PATH')) exit();?>﻿<?php echo ($css); ?>
<div id="right">
    <div class="title">
            <a>手术信息</a>>
            <a href="<?php echo ($url); ?>/index">查询</a> — 
<?php if($operate == '新建'): ?><a href="<?php echo ($url); ?>/addInput/patient_id/<?php echo ($patient_id_add); ?>">新建</a> — 
            <a href="<?php echo ($url); ?>/addInput/patient_id/<?php echo ($patient_id_add); ?>">基本信息</a>
<?php else: endif; ?>
    </div>
    <div class="content">
        <div id="tab4" class="tab">
            <table class="tb_area">
                <tr>
                    <td><span class="">患者:</span></td>
                    <td><?php echo ($patient["name"]); ?></td>
                    <td><span class="">病历号:</span></td>
                    <td><?php echo ($patient["medical_id"]); ?></td>
                </tr>
                <tr>
                    <td><span class="">开始时间</span></td>
                    <td>
                        <input class="inputEdit"  id="begin_time" value="<?php echo ($data["begin_time"]); ?>" />
                    </td>
                    <td><span class="">结束时间</span></td>
                    <td>
                        <input class="inputEdit"  id="end_time" value="<?php echo ($data["end_time"]); ?>" />
                    </td>
                    <td><span class="">手术种类</span></td>
                    <td>
                        <select class="inputEdit " id="operation_type_id" title="<?php echo ($data["operation_type_id"]); ?>">
                            <option value="">请选择</option>
                            <?php if(is_array($listOperationType)): $i = 0; $__LIST__ = $listOperationType;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><span class="">主刀医生</span></td>
                    <td>
                        <select class="inputEdit " title="<?php echo ($data["operator_id"]); ?>" id="operator_id" >
                            <option value="">请选择</option>
                            <?php if(is_array($listDoctor)): $i = 0; $__LIST__ = $listDoctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td><span class="">助手1</span></td>
                    <td>
                        <select class="inputEdit " title="<?php echo ($data["assistant1_id"]); ?>" id="assistant1_id" >
                            <option>请选择</option>
                            <?php if(is_array($listDoctor)): $i = 0; $__LIST__ = $listDoctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td><span class="">助手2</span></td>
                    <td>
                        <select class="inputEdit " title="<?php echo ($data["assistant2_id"]); ?>" id="assistant2_id" >
                            <option>请选择</option>
                            <?php if(is_array($listDoctor)): $i = 0; $__LIST__ = $listDoctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                </tr>
            </table>
            <div class="edit">
                <input id="btn_submit" type="button" class="btn" style="width:150px" value="保存，下一步"  />
                <span id="tip0" class="tip"></span>
            </div>
        </div>
    </div>
</div>
<?php echo ($js); ?>
<script type="text/javascript">
$(function(){
    $("table tr td").has("span").each(function () {
        $(this).addClass("right");
    }); 
    $("#btn_submit").click(function (){
        submit();
    })
});

function operation() {
    var begin_time;
    var end_time;
    var operation_type_id;
    var operator_id;
    var assistant1_id;
    var assistant2_id;
}
function submit() {
    var data = new operation();
    data.begin_time        = $("#begin_time").val();
    data.end_time          = $("#end_time").val();
    data.operation_type_id = $("#operation_type_id").val();
    data.operator_id       = $("#operator_id").val();
    data.assistant1_id     = $("#assistant1_id").val();
    data.assistant2_id     = $("#assistant2_id").val();
    canSubmit = true;
    if (data.begin_time == "") {
        $("#begin_time").focus();
        $("#tip0").text("请填写！");
        canSubmit = false;
        return;
    }
    if (data.end_time == "") {
        $("#end_time").focus();
        $("#tip0").text("请填写！");
        canSubmit = false;
        return;
    }
    if (data.operation_type_id == "") {
        $("#operation_type_id").focus();
        $("#tip0").text("请填写！");
        canSubmit = false;
        return;
    }
    if (data.operator_id == "") {
        $("#operator_id").focus();
        $("#tip0").text("请填写！");
        canSubmit = false;
        return;
    }
    if (canSubmit) {
        operate(data, "<?php echo ($operate_url); ?>", "<?php echo ($redirect_url); ?>");
    }
}
</script>