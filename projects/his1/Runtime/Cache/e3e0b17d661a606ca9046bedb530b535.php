<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="<?php echo ($css); ?>/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo ($css); ?>/index.css" rel="stylesheet" type="text/css" />    
<link href="<?php echo ($css); ?>/right.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo ($js); ?>/jquery-2.0.3.min.js"></script>
<title>学生详细信息</title>
<script type="text/javascript" language="javascript" >
$(function () {
    $(".inputEdit").css("display", "none");
});
</script>
</head>
<body>
<div id="right">
    <div class="title">
            <a>医生信息</a>>
            <a href=""><?php echo ($behave); ?></a>姓名、工号、性别、职称、科室、出生年月、联系电话、专长
    </div>
    <div class="content">
    	<div id="tab0" class="tab">
    	    <table>
    	    	<tr>
                    <td><span class="">工号</span></td>
                    <td>
                        <input class="inputlock"  name="" value="<?php echo ($data[""]); ?>" readonly="readonly" />
                        <input class="inputEdit"  name="" value="<?php echo ($data[""]); ?>" />
                    </td>
                </tr>
                <tr>
    	    		<td><span class="">姓名</span></td>
    	    		<td>
                        <input class="inputlock"  name="" value="<?php echo ($data[""]); ?>" readonly="readonly" />
                        <input class="inputEdit"  name="" value="<?php echo ($data[""]); ?>" />
    	    		</td>
                </tr>
                <tr>
    	    		<td><span class="">性别</span></td>
    	    		<td><span class="">
                        <input type="radio" name="sex" id="sex" value="男">男
                        <input type="radio" name="sex" id="sex" value="女">女</span>
    	    		</td>
                </tr>
                <tr>
    	    		<td><span class="">出生日期</span></td>
    	    		<td>
                        <input class="inputlock"  name="" value="<?php echo ($data[""]); ?>" readonly="readonly" />
                        <input class="inputEdit"  name="" value="<?php echo ($data[""]); ?>" />
    	    		</td>
                </tr>
                <tr>
                    <td><span class="">电话</span></td>
                    <td>
                        <input class="inputlock"  name="" value="<?php echo ($data[""]); ?>" readonly="readonly" />
                        <input class="inputEdit"  name="" value="<?php echo ($data[""]); ?>" />
                    </td>
                </tr>
                <tr>
                    <td><span class="">电子邮箱</span></td>
                    <td>
                        <input class="inputlock"  name="" value="<?php echo ($data[""]); ?>" readonly="readonly" />
                        <input class="inputEdit"  name="" value="<?php echo ($data[""]); ?>" />
                    </td>
                </tr>
                <tr>
                    <td><span class="">职称</span></td>
                    <td>
                        <select class="inputlock" disabled="disabled"  name="">
                            <option value=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                        <select class="inputEdit" name="">
                            <option value=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </td>
                    <td><span class="">住址</span></td>
                    <td>
                        <input class="inputlock"  name="" value="<?php echo ($data[""]); ?>" readonly="readonly" />
                        <input class="inputEdit"  name="" value="<?php echo ($data[""]); ?>" />
                    </td>
    	    		<td><span class="">邮编</span></td>
    	    		<td>
                        <input class="inputlock"  name="" value="<?php echo ($data[""]); ?>" readonly="readonly" />
                        <input class="inputEdit"  name="" value="<?php echo ($data[""]); ?>" />
    	    		</td>
    	    	</tr>
    	    </table>
            <div class="edit">
                <input id="edit_basic" type="button" class="btn" value="打开编辑"  />
                <input id="submit_basic" type="submit" class="btn btnLock" disabled="disabled" value="提交修改"  />
            </div>  
    	</div>
    </div>
</div>
<input type="hidden" name="stu_id" id="stu_id" value="<?php echo ($data["stu_id"]); ?>"/>
<div id="pictureDialog" title="照片">
	<p><img id="picture" src=""></p>
</div>

</body>
<script type="text/javascript">
$(function(){
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
/*function student() {
    var stu_id;
	var stu_num;
	var stu_grade;
	var stu_class;
			
	var stu_major;
	var degree;
	var tutor;
	var research;
			
	var exam_mode;
	var edu_time;
	var directed;
	var roll;
			
	var last_school;
	var last_major;
	var last_date;
	var stu_indate;
			
	var politics;
	var stu_gender;
	var stu_nation;
	var hometown;
	var birthday;
			
	var stu_idnum;
	var stu_mobile;
	var stu_qqnum;
	var stu_email;
	var homepage;
			
	var train;
	var home_addr;
	var dad_name;
	var mom_name;
	var dad_phone;
	var mom_phone;
	var dad_unit;
	var mom_unit;
	var stu_photo;
	
	var graduate_date;
	var graduate_type;
	var post_info;
			
	var work_unit;
	var wu_email;
	var wu_address;
			
	var present_city;
	var present_addr;
}
function edit(module, id){
	$("#" + module + " .inputlock").css("display","none");
	$("#" + module + " .inputEdit").css("display","inline");
	$("#" + module + " span").attr("class","span2");
	$("#edit_"+ module).attr("value","取消编辑");
	$("#edit_"+ module).unbind("click");
	$("#edit_"+ module).bind("click",function(){ 
		cancelEdit(module, id); 
	});
	$("#submit_"+ module).removeClass("btnLock");
	$("#submit_"+ module).removeAttr("disabled");
}
function cancelEdit(module, id){
	$("#" + module + " .inputlock").css("display","inline");
	$("#" + module + " .inputEdit").css("display","none");
	$("#" + module + " span").attr("class","");
	$("#edit_"+ module).attr("value","打开编辑");
	$("#edit_"+ module).unbind("click");
	$("#edit_"+ module).bind("click",function(){ 
		edit(module, id); 
	});
	$("#submit_"+ module).addClass("btnLock");
	$("#submit_"+ module).attr("disabled", "disabled");
}
function submitEdit(module, id) {
	var model = new student();
	model.stu_num     = $("#basic .inputEdit[name='stu_num']").val();
	model.stu_grade   = $("#basic .inputEdit[name='stu_grade']").val();
	model.stu_class   = $("#basic .inputEdit[name='stu_class']").val();
	
	model.stu_major   = $("#basic .inputEdit[name='stu_major']").val();
	model.degree      = $("#basic .inputEdit[name='degree']").val();
	model.tutor       = $("#basic .inputEdit[name='tutor']").val();
	model.research    = $("#basic .inputEdit[name='research']").val();
	
	model.exam_mode   = $("#basic .inputEdit[name='exam_mode']").val();
	model.edu_time    = $("#basic .inputEdit[name='edu_time']").val();
	model.directed    = $("#basic .inputEdit[name='directed']").val();
	model.roll        = $("#basic .inputEdit[name='roll']").val();
	
	model.last_school = $("#basic .inputEdit[name='last_school']").val();
	model.last_major  = $("#basic .inputEdit[name='last_major']").val();
	model.last_date   = $("#basic .inputEdit[name='last_date']").val();
	model.stu_indate  = $("#basic .inputEdit[name='stu_indate']").val();
	
	model.politics    = $("#basic .inputEdit[name='politics']").val();
	model.stu_gender  = $("#basic .inputEdit[name='stu_gender']").val();
	model.stu_nation  = $("#basic .inputEdit[name='stu_nation']").val();
	model.hometown    = $("#basic .inputEdit[name='hometown']").val();
	model.birthday    = $("#basic .inputEdit[name='birthday']").val();
	
	model.stu_idnum   = $("#basic .inputEdit[name='stu_idnum']").val();
	model.stu_mobile  = $("#basic .inputEdit[name='stu_mobile']").val();
	model.stu_qqnum   = $("#basic .inputEdit[name='stu_qqnum']").val();
	model.stu_email   = $("#basic .inputEdit[name='stu_email']").val();
	model.homepage    = $("#basic .inputEdit[name='homepage']").val();
	
	model.train       = $("#basic .inputEdit[name='train']").val();
	model.home_addr   = $("#basic .inputEdit[name='home_addr']").val();
	model.dad_name    = $("#basic .inputEdit[name='dad_name']").val();
	model.mom_name    = $("#basic .inputEdit[name='mom_name']").val();
	model.dad_phone   = $("#basic .inputEdit[name='dad_phone']").val();
	model.mom_phone   = $("#basic .inputEdit[name='mom_phone']").val();
	model.dad_unit    = $("#basic .inputEdit[name='dad_unit']").val();
	model.mom_unit    = $("#basic .inputEdit[name='mom_unit']").val();
	model.stu_photo   = $("#photoHidden").val();
	
	model.graduate_date = $("#graduate .inputEdit[name='graduate_date']").val();
	model.graduate_type = $("#graduate .inputEdit[name='graduate_type']").val();
	model.post_info     = $("#graduate .inputEdit[name='post_info']").val();
	
	model.work_unit     = $("#graduate .inputEdit[name='work_unit']").val();
	model.wu_email      = $("#graduate .inputEdit[name='wu_email']").val();
	model.wu_address    = $("#graduate .inputEdit[name='wu_address']").val();
	
	model.present_city  = $("#graduate .inputEdit[name='present_city']").val();
	model.present_addr  = $("#graduate .inputEdit[name='present_addr']").val();
    switch (module) {
	    case 'basic':
			//model.    = $("#basic .inputEdit[name='']").val();
			break;
		case 'graduate':
			//model.      = $("#graduate .inputEdit[name='']").val();
			break;
		}
		model.stu_id = <?php echo ($data["stu_id"]); ?>;
		$.ajax({
            url: "<?php echo ($url); ?>/edit",
			type: 'POST',
			data: model,
            success: 
				function(result){
                    switch (result) { 
						case '0':
                            alert("申请提交失败！");	
							cancelEdit(module, id);
                            break;	
				        case '1':
						    alert("申请提交成功！");
							cancelEdit(module, id);
							break;
						case '2':
							alert("修改成功！");
							window.location.reload();
							break;
						case '3':
                            alert("修改失败！");	
							cancelEdit(module, id);
                            break;									
					}
                }
        });
}
var a = 0;
function changePhoto(){
       	var stu_id = $("#stu_id").val();
   		window.showModalDialog('<?php echo ($url); ?>/changePhoto/stu_id/'+stu_id,window,'dialogWidth:400px;dialogHeight:150px');

}
function changePicture(module, id){
    var obj = new Object();
	window.showModalDialog('<?php echo ($url); ?>/changePicture/module/'+module+"/id/"+id,obj,'dialogWidth:400px;dialogHeight:150px');
}
function viewPicture(url) {
    $("#picture").attr("src", url);
	$("#picture").css("display", "block");
	$( "#pictureDialog" ).dialog({
		height: 450,
		width: 540,
		modal: true
	});
}*/
</script>
</html>