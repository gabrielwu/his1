<?php if (!defined('THINK_PATH')) exit();?>﻿<?php echo ($css); ?>
<div id="right">
    <div class="title">
            <a href="<?php echo ($url); ?>/index">手术查询</a> — 
<?php if($operate == '新建'): ?><a href="<?php echo ($url); ?>/addInput/patient_id/<?php echo ($patient_id_add); ?>">新建</a> — 
            <a href="<?php echo ($url); ?>/addInput2/patient_id/<?php echo ($patient_id_add); ?>">具体信息</a>
<?php else: endif; ?>
    </div>
    <div class="content">
        <div id="tab4" class="tab">
            <table class="tb_area">
                <tr>
                    <td><span>患者:</td>
                    <td><?php echo ($patient["name"]); ?></td>
                    <td><span>病历号:</td>
                    <td><?php echo ($patient["medical_id"]); ?></td>
                </tr>
                <tr>
                    <td><span>开始时间:</span></td>
                    <td><?php echo ($operation["begin_time"]); ?></td>
                    <td><span>结束时间:</span></td>
                    <td><?php echo ($operation["end_time"]); ?></td>
                    <td><span>手术种类:</span></td>
                    <td><?php echo ($operation["operation_type_name"]); ?></td>
                </tr>
                <tr>
                    <td><span>主刀医生:</span></td>
                    <td><?php echo ($operation["operator_name"]); ?></td>
                    <td><span>助手1:</span></td>
                    <td><?php echo ($operation["assistant1_name"]); ?></td>
                    <td><span>助手2:</span></td>
                    <td><?php echo ($operation["assistant2_name"]); ?></td>
                </tr>
            </table>

            <p id="operation_type_fields_<?php echo ($operationType["id"]); ?>">
                <?php if(is_array($operationType["field"])): $i = 0; $__LIST__ = $operationType["field"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data3): $mod = ($i % 2 );++$i; if(sizeof($data3['sons']) == '0'): ?><table class="tb1 tb2 tb80 tb_nosons" id="tb_<?php echo ($data3["id"]); ?>" title="<?php echo ($data3["id"]); ?>">
                        <tr class="tr_name">
                            <td class="td_name" title="<?php echo ($data3["id"]); ?>"><?php echo ($data3["name"]); ?></td>
    <?php if($data3['multiple'] == '1'): ?><td>操作 <a class="aAdd" >添加</a></td><?php endif; ?>
                        </tr>
                        <tr class="tr_input">
                            <td class="td_input">
    <?php if($data3['type'] == '1'): ?><input class="inputEdit inputEdit2" placeholder="<?php echo ($data3["format"]); ?>" id="" value="" />
    <?php elseif($data3['type'] == '2'): ?> 
                                <select class="inputEdit inputEdit2"  id="" >
                                    <?php if(is_array($data3["value_options"])): $i = 0; $__LIST__ = $data3["value_options"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data4): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data4); ?>"><?php echo ($data4); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
    <?php elseif($data3['type'] == '3'): ?> 
                                <?php if(is_array($data3["value_options"])): $i = 0; $__LIST__ = $data3["value_options"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data4): $mod = ($i % 2 );++$i;?><label>
                                        <input class="inputEdit2 checkbox" type="checkbox" value="<?php echo ($data4); ?>" /><?php echo ($data4); ?>&nbsp;&nbsp;
                                    </label><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            </td>
    <?php if($data3['multiple'] == '1'): ?><td><a class="aRemove">删除</a></td><?php endif; ?>
                        </tr>
                    </table>
                </br>
<?php else: ?>   
                    <table class="tb1 tb2 tb80 tb_sons" title="<?php echo ($data3["id"]); ?>" >
                        <tr class="tr_name">
                            <td><?php echo ($data3["name"]); ?></td>
                            <?php if(is_array($data3["sons"])): $i = 0; $__LIST__ = $data3["sons"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data4): $mod = ($i % 2 );++$i;?><td class="td_name" title="<?php echo ($data4["id"]); ?>"><?php echo ($data4["name"]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php if($data3['multiple'] == '1'): ?><td>操作 <a class="aAdd" >添加</a></td><?php endif; ?>
                        </tr>
                        <tr class="tr_input">
                            <td></td>
                            <?php if(is_array($data3["sons"])): $i = 0; $__LIST__ = $data3["sons"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data4): $mod = ($i % 2 );++$i;?><td class="td_input">
    <?php if($data4['type'] == '1'): ?><input class="inputEdit inputEdit2" placeholder="<?php echo ($data4["format"]); ?>" id="" value="" />
    <?php elseif($data4['type'] == '2'): ?> 
                        <select class="inputEdit inputEdit2"  id="" >
                            <?php if(is_array($data4["value_options"])): $i = 0; $__LIST__ = $data4["value_options"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data5): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data5); ?>"><?php echo ($data5); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
    <?php elseif($data4['type'] == '3'): ?>
                        <?php if(is_array($data4["value_options"])): $i = 0; $__LIST__ = $data4["value_options"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data5): $mod = ($i % 2 );++$i;?><label>
                                <input class="inputEdit2 checkbox" type="checkbox" name="" value="<?php echo ($data5); ?>" /><?php echo ($data5); ?>&nbsp;&nbsp;
                            </label><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                                </td><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php if($data3['multiple'] == '1'): ?><td><a class="aRemove">删除</a></td><?php endif; ?>
                    </table>
                </br><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                </p> 
            <div class="edit">
                <input id="btn_submit" type="button" class="btn" value="保 存"  /><span id="tip0" class="tip"></span>
            </div>
        </div>
    </div>
</div>
<?php echo ($js); ?>
<script type="text/javascript">
$(function(){
    $(".tb80 tr td").each(function () {
        $(this).css("text-align", "center");
    }); 
    $("table tr td").has("span").each(function () {
        $(this).addClass("right");
    }); 

    aRemoveInit();
    $(".inputDate").addClass("datepicker");
    datepickerInit();

    $(".aAdd").click(function (){
        var trTmp = $(this).closest("table").find("tr:nth-child(2)").clone();
        $(this).closest("table").append(trTmp);
        aRemoveInit();
        $(".inputDate").addClass("datepicker");
        datepickerInit();  
    });
    $("#btn_submit").click(function (){
        submit();
    })
});

function operation_detail() {
    var str;
}
function aRemoveInit() {
    $(".aRemove").click(function (){
        if ($(this).closest("table").find("tr").length > 2) {
            $(this).parent().parent().remove();
        }
    });
}
function submit() {
    var canSubmit = true;
    $(".inputEdit2").each(function () {
        if ($(this).val() == "") {
            $(this).focus();
            canSubmit = false;
            $("#tip0").text("请填写！");
        }
    });
    var data = new operation_detail();
    data.str = "";
    $(".tb80").each(function () {
        var id = $(this).attr("title") + ";";
        $(this).find(".td_name").attr("title");
        var field = "";
        var value = "";

        $(this).find(".td_name").each(function () {
            field += $(this).attr("title") + ",";
        });
        field = field.substring(0, field.length - 1) + ";";

        $(this).find(".tr_input").each(function () {
            $(this).find(".td_input").each(function () {
                var flag = $(this).find(".inputEdit2").hasClass("checkbox");
                $(this).find(".inputEdit2").each(function(){
                    if (flag) {
                        if (true == $(this).prop("checked")) {
                            value += $(this).val() + ",";
                        }
                    } else {
                        value += $(this).val() + ",";
                    }
                });
            });
            data.str += id + field + value.substring(0, value.length - 1) + "|";
        });
    });
    data.str = data.str.substring(0, data.str.length - 1);
alert(data.str);
    if (canSubmit) {
        operate(data, "<?php echo ($operate_url); ?>", "<?php echo ($redirect_url); ?>");
    }
    
}
</script>