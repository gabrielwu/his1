<?php if (!defined('THINK_PATH')) exit();?>﻿<?php echo ($css); ?>
<div id="right">
    <div class="title">
            <a>医生信息</a> — 
            <a href="<?php echo ($url); ?>/personal">个人信息</a>
    </div>
    <div class="content">
        <div id="tab4" class="tab">
            <table class="tb_area">
                <tr>
                    <td><span>工号：</span></td>
                    <td><input id="job_id" type="text" value="<?php echo ($data["job_id"]); ?>" class="inputEdit" /></td>  
                    <td><span>姓名：</span></td>
                    <td><input id="name" type="text" value="<?php echo ($data["name"]); ?>" class="inputEdit" /></td> 
                    <td><span>性别：</span></td>
                    <td>
                        <select id="sex" title="<?php echo ($data["sex"]); ?>" class="_select ">
                            <option value="男">男</option>
                            <option value="女">女</option>
                        </select>                           
                    </td> 
                </tr>
                <tr> 
                    <td><span>职称：</span></td>
                    <td>
                        <select id="title_id" title="<?php echo ($data["title_id"]); ?>" class="_select">
                            <?php if(is_array($listTitle)): $i = 0; $__LIST__ = $listTitle;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td><span>联系电话：</span></td>
                    <td><input id="phone" type="text" value="<?php echo ($data["phone"]); ?>" class="inputEdit" /></td>  
                    <td><span>出生日期：</span></td>
                    <td><input id="birthday" type="text" value="<?php echo ($data["birthday"]); ?>" class="datepicker inputEdit" /></td> 
                </tr>  
                <tr>
                    <td><span>专长：</span></td> 
                    <td><input id="speciality" type="text" value="<?php echo ($data["speciality"]); ?>" class="inputEdit" /></td>  
                </tr>
            </table>
            <div class="edit">
                <input type="button" id="btn_submit" class="btn" value="保 存" />
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
    $("table tr td").each(function () {
        $(this).css("padding-left", "20px");
    }); 
    $("#btn_submit").click(function (){
        edit("<?php echo ($url); ?>/editPersonal");
    });
});

function model() {
    var job_id;
    var name;
    var sex;
    var phone;
    var birthday;
    var speciality;
    var title_id;
}
function edit(url) {
    var data = new model();
    data.job_id        = $("#job_id").val();
    data.name          = $("#name").val();
    data.sex           = $("#sex").val();
    data.phone         = $("#phone").val();
    data.birthday      = $("#birthday").val();
    data.speciality    = $("#speciality").val();
    data.title_id      = $("#title_id").val();
    var canSubmit = true;
    canSubmit = isNonEmpty(data.job_id, "工号", $("#job_id"));
    if (canSubmit) canSubmit = isNonEmpty(data.name, "姓名", $("#name"));
    if (canSubmit) {
        operate(data, url);
    } 
}
</script>