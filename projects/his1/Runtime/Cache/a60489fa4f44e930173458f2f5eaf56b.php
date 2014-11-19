<?php if (!defined('THINK_PATH')) exit();?>﻿<?php echo ($css); ?>
<div id="right">
    <div class="title">
            <a>患者信息</a> — 
            <a href="<?php echo ($url); ?>/index">病历</a> — 
<?php if($operate == '新建'): ?><a href="<?php echo ($url); ?>/addIput">新建 (用户名病历号，密码证件号后6位)</a>
<?php else: ?>
            <a href=""><?php echo ($data["name"]); ?></a><?php endif; ?>
        <a id="a-tab2" class="a-tab" href="#">药物记录&住院信息</a>
        <a id="a-tab1" class="a-tab" href="#">病历信息</a>
    	<a id="a-tab0" class="a-tab current" href="#">基本信息&体格检查</a>
    </div>
    <div class="content">
    	<div id="tab0" class="tab">
            <h3>基本信息</h3>
    	    <table class="tb_area">
    	    	<tr>
    	    		<td><span class="">姓名</span></td>
    	    		<td><input class="inputEdit" value="<?php echo ($data["name"]); ?>" id="name" /></td>
    	    		<td><span class="">性别</span></td>
    	    		<td>
                        <select class="inputEdit _select" title="<?php echo ($data["sex"]); ?>" id="sex"  >
                            <option value=""></option>
                            <option value="男">男</option>
                            <option value="女">女</option>
                        </select>
    	    		</td>
    	    		<td><span class="">出生日期</span></td>
    	    		<td><input class="inputEdit datepicker" value="<?php echo ($data["birthday"]); ?>" id="birthday" /></td>
    	    		<td><span class="">年龄</span></td>
    	    		<td><input class="inputEdit" value="<?php echo ($data["age"]); ?>" id="age" /></td>
                </tr>
                <tr>
                    <td><span class="">电话</span></td>
                    <td><input class="inputEdit" value="<?php echo ($data["phone"]); ?>" id="phone" /></td>
                    <td><span class="">电子邮箱</span></td>
                    <td><input class="inputEdit" value="<?php echo ($data["email"]); ?>" id="email" /></td>
    	    		<td><span class="">证件类型</span></td>
    	    		<td>
                        <select class="inputEdit _select" title="<?php echo ($data["id_type"]); ?>" id="id_type" >
                            <?php if(is_array($id_type)): $i = 0; $__LIST__ = $id_type;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2); ?>"><?php echo ($data2); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
    	    		</td>
    	    		<td><span class="">证件号</span></td>
    	    		<td><input placeholder="后6位为密码" class="inputEdit" value="<?php echo ($data["id_number"]); ?>" id="id_number"  /></td>
                </tr>
                <tr>
                    <td><span class="">职业</span></td>
                    <td><input class="inputEdit" value="<?php echo ($data["job"]); ?>" id="job"  /></td>
                    <td><span class="">婚姻状况</span></td>
                    <td><input class="inputEdit" value="<?php echo ($data["marital_status"]); ?>" id="marital_status"  /></td>
    	    		<td><span class="">民族</span></td>
    	    		<td><input class="inputEdit" value="<?php echo ($data["nation"]); ?>" id="nation"  /></td>
    	    		<td><span class="">籍贯</span></td>
    	    		<td><input class="inputEdit" value="<?php echo ($data["native_place"]); ?>" id="native_place"  /></td>
                </tr>
                <tr>
                    <td><span class="">血型</span></td>
                    <td>
                        <select class="inputEdit _select" title="<?php echo ($data["blood_type"]); ?>" id="blood_type" >
                            <option value=""></option>
                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>
                        </select>
                    </td>
                    <td><span class="">住址</span></td>
                    <td><input class="inputEdit" value="<?php echo ($data["address"]); ?>" id="address"  /></td>
    	    		<td><span class="">邮编</span></td>
    	    		<td><input class="inputEdit" value="<?php echo ($data["postcode"]); ?>" id="postcode"  /></td>
    	    	</tr>
    	    </table>
            <h3>体格检查</h3>
            <table class="tb_area">
                <tr>
                    <td ><span class="">体温</span></td>
                    <td><input class="inputEdit" value="<?php echo ($data["temperature"]); ?>" id="temperature"  /></td>
                    <td><span class="">脉搏</span></td>
                    <td><input class="inputEdit" value="<?php echo ($data["pulse"]); ?>" id="pulse"  /></td>
                    <td><span class="">呼吸</span></td>
                    <td><input class="inputEdit" value="<?php echo ($data["breath"]); ?>" id="breath"  /></td>
                    <td><span class="">血压</span></td>
                    <td><input class="inputEdit" value="<?php echo ($data["blood_pressure"]); ?>" id="blood_pressure"  /></td>
                </tr>
                <tr>
                    <td><span class="">专科查体</span></td>
                    <td colspan="3">
                        <textarea class="inputEdit" id="specialized_examination" ><?php echo ($data["specialized_examination"]); ?></textarea>
                    </td>
                    <td><span class="">其他</span></td>
                    <td colspan="3"><textarea class="inputEdit" id="examination_remark" ><?php echo ($data["examination_remark"]); ?></textarea></td>
                </tr>
            </table>
            <div class="edit">
                <input title="-tab1" type="button" class="btn btn_" value="下一步"  /><span id="tip0" class="tip"></span>
            </div>  
    	</div>
    	<div id="tab1" class="tab">
            <h3>病历信息</h3>
    		<table class="tb_area">
    	    	<tr>
    	    		<td><span class="">病历号</span></td>
    	    		<td><input placeholder="患者登录用户名" class="inputEdit" value="<?php echo ($data["medical_id"]); ?>" id="medical_id"  /></td>
    	    		<td><span class="">科室</span></td>
    	    		<td>&nbsp;<?php echo ($department_name); ?></td>
    	    		<td><span class="">主治医生</span></td>
    	    		<td>
                        <select class="inputEdit _select" title="<?php echo ($data["attending_doctor_id"]); ?>" id="attending_doctor_id" >
                            <?php if(is_array($listDoctor)): $i = 0; $__LIST__ = $listDoctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
    	    		</td>
    	    		<td><span class="">诊断</span></td>
    	    		<td colspan="">
                        <select class="inputEdit _select" title="<?php echo ($data["diagnosis_id"]); ?>" id="diagnosis_id" >
                            <?php if(is_array($listDiagnosis)): $i = 0; $__LIST__ = $listDiagnosis;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
    	    		</td>
                </tr>
                <tr>
                    <td><span class="">入院时间</span></td>
                    <td colspan=""><input class="inputEdit datepicker" value="<?php echo ($data["admission_time"]); ?>" id="admission_time"  /></td>
                    <td><span class="">是否住院</span></td>
                    <td>
                        <select class="inputEdit _select" title="<?php echo ($data["inpatient"]); ?>" id="inpatient" >
                            <option value="是">是</option>
                            <option value="否">否</option>
                        </select>
                    </td>
                    <td><span class="">手术治疗</span></td>
                    <td>
                        <select class="inputEdit _select" title="<?php echo ($data["operation"]); ?>" id="operation" >
                            <option value="是">是</option>
                            <option value="否">否</option>
                        </select>
                    </td>
    	    	</tr>
    	    	<tr>
    	    		<td><span class="">主诉</span></td>
    	    		<td colspan="3"><textarea class="inputEdit" id="complaint" ><?php echo ($data["complaint"]); ?></textarea></td>
    	    		<td><span class="">过敏史</span></td>
                    <td colspan="3"><textarea class="inputEdit" id="history_allergy" ><?php echo ($data["history_allergy"]); ?></textarea></td>
                </tr>
                <tr>
    	    		<td><span class="">现病史</span></td>
                    <td colspan="3"><textarea class="inputEdit" id="history_present" ><?php echo ($data["history_present"]); ?></textarea></td>
                    <td><span class="">既往史</span></td>
                    <td colspan="3"><textarea class="inputEdit" id="history_previous" ><?php echo ($data["history_previous"]); ?></textarea></td>
                </tr>
                <tr>
                    <td><span class="">个人史</span></td>
                    <td colspan="3"><textarea class="inputEdit" id="history_personal" ><?php echo ($data["history_personal"]); ?></textarea></td>
                    <td><span class="">家族史</span></td>
                    <td colspan="3"><textarea class="inputEdit" id="history_family" ><?php echo ($data["history_family"]); ?></textarea></td>
                </tr>
                <tr>
                    <td><span class="">备注</span></td>
                    <td colspan="3"><textarea class="inputEdit" id="remark" ><?php echo ($data["remark"]); ?></textarea></td>
                </tr>
    	    </table>
            <div class="edit">
                <input title="-tab0" type="button" class="btn btn_" value="上一步"  />
                <input title="-tab2" type="button" class="btn btn_" value="下一步"  />
                <span id="tip1" class="tip"></span>
            </div>
    	</div>     
        <div id="tab2" class="tab">
            <h3>住院信息</h3>
            <table class="tb_area">
                <tr>
                    <td><span class="">病区</span></td>
                    <td>&nbsp;<?php echo ($inpatient_area["name"]); ?></td>
                    <td><span class="">病房</span></td>
                    <td><input class="inputEdit" value="<?php echo ($data["room"]); ?>" id="room"  /></td>
                    <td><span class="">床号</span></td>
                    <td><input class="inputEdit" value="<?php echo ($data["bed"]); ?>" id="bed"  /></td>
                    <td><span class="">住院号</span></td>
                    <td><input class="inputEdit"  value="<?php echo ($data["inpatient_id"]); ?>" id="inpatient_id"  /></td>
                </tr>
                <tr>
                    <td><span class="">住院时间</span></td>
                    <td><input class="inputEdit datepicker" value="<?php echo ($data["in_date"]); ?>" id="in_date"  /></td>
                    <td><span class="">出院时间</span></td>
                    <td><input class="inputEdit datepicker" value="<?php echo ($data["out_date"]); ?>" id="out_date"  /></td>
                </tr>
                <tr>
                    <td colspan="2" class="right">医疗组其他成员：</td>
                    <td><span class="">教授</span></td>
                    <td>
                        <select class="inputEdit _select" title="<?php echo ($data["professor_id"]); ?>" id="professor_id">
                            <?php if(is_array($listDoctor)): $i = 0; $__LIST__ = $listDoctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                    <td><span class="">经治医师</span></td>
                    <td>
                        <select class="inputEdit _select" title="<?php echo ($data["charge_doctor_id"]); ?>" id="charge_doctor_id">
                            <?php if(is_array($listDoctor)): $i = 0; $__LIST__ = $listDoctor;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                        </select>
                    </td>
                </tr>
            </table>
            <h3>药物记录</h3>
            <table class="tb1" id="tb_medicine" >
                <tbody id="">
                    <tr align="center" class="">
                        <td width="">药物</td>
                        <td width="">频度</td>
                        <td width="">用法</td>
                        <td width="">一次剂量</td>
                        <td width="">剂量单位</td>
                        <td width="">开始时间</td>
                        <td width="">结束时间</td>
                        <td width="">总时间</td>
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
                        <td align="center"><input class="inputS medicine_dose" name="medicine_dose" type="text"  /></td>
                        <td align="center">
                            <select name="medicine_unit_id" class="medicine_unit_id">
                                <?php if(is_array($listMedicineUnit)): $i = 0; $__LIST__ = $listMedicineUnit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </td>
                        <td align="center"><input id="" class="inputS inputDate begin_time" name="" type="text"  /></td>
                        <td align="center"><input id="" class="inputS inputDate end_time" name="" type="text"  /></td>
                        <td align="center"></td>
                        <td align="center" class="operate"><a class="aRemove">删除</a></td>
                    </tr>
                    <?php if(is_array($listPatientMedication)): $i = 0; $__LIST__ = $listPatientMedication;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr id="tr_medicine_<?php echo ($data["id"]); ?>" class="tr_medicine">
                            <td align="center">
                                <select class="medicine_id _select" title="<?php echo ($data["medicine_id"]); ?>">
                                    <?php if(is_array($listMedicine)): $i = 0; $__LIST__ = $listMedicine;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                            <td align="center">
                                <select  class="medicine_frequency_id _select" title="<?php echo ($data["medicine_frequency_id"]); ?>">
                                    <?php if(is_array($listMedicineFrequency)): $i = 0; $__LIST__ = $listMedicineFrequency;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["value"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                            <td align="center">
                                <select class="medicine_usage_id _select" title="<?php echo ($data["medicine_usage_id"]); ?>">
                                    <?php if(is_array($listMedicineUsage)): $i = 0; $__LIST__ = $listMedicineUsage;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["value"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                            <td align="center"><input class="inputS medicine_dose" name="medicine_dose" type="text" value=<?php echo ($data["medicine_dose"]); ?>></td>
                            <td align="center">
                                <select class="medicine_unit_id _select" title="<?php echo ($data["medicine_unit_id"]); ?>">
                                    <?php if(is_array($listMedicineUnit)): $i = 0; $__LIST__ = $listMedicineUnit;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><option value="<?php echo ($data2["id"]); ?>"><?php echo ($data2["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            </td>
                            <td align="center"><input class="inputS inputDate begin_time" type="text" value=<?php echo ($data["begin_time"]); ?>></td>
                            <td align="center"><input class="inputS inputDate end_time"  type="text" value=<?php echo ($data["end_time"]); ?>></td>
                            <td align="center"><?php echo ($data["days"]); ?></td>
                            <td align="center" class="operate"><a class="aRemove">删除</a></td>
                        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
            <div class="edit">
                <input title="-tab1" type="button" class="btn btn_" value="上一步"  />
                <input id="btn_submit" type="button" class="btn" value="保 存"  /><span id="tip2" class="tip"></span>
            </div>

        </div>
    </div>
</div>
<?php echo ($js); ?>
<script type="text/javascript">
function aRemoveInit() {
    $(".aRemove").click(function (){
        $(this).parent().parent().remove();
    });
}
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
    $("table tr td").has("span").each(function () {
        $(this).addClass("right");
    }); 
    $(".btn_").click(function (){
        var target = $(this).attr("title");
        $("#a" + target).trigger("click");
    });

    aRemoveInit();
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
    $("#btn_submit").click(function (){
        submit();
    })
});

function patient() {
    var medicineStr;
    var medical_id;
    var name;
    var sex;
    var birthday;
    var age;
    var phone;
    var email;
    var id_type;
    var id_number;
    var job;
    var marital_status;
    var nation;
    var native_place;
    var blood_type;
    var address;
    var postcode;
    var temperature;
    var pulse;
    var breath;
    var blood_pressure;
    var specialized_examination;
    var examination_remark;
    var department_id;
    var attending_doctor_id;
    var diagnosis_id;
    var admission_time;
    var inpatient;
    var operation;
    var complaint;
    var history_allergy;
    var history_present;
    var history_previous;
    var history_personal;
    var history_family;
    var remark;
    var room;
    var bed;
    var inpatient_id;
    var in_date;
    var out_date;
    var professor_id;
    var treating_doctor_id;
}
function submit() {
    var data = new patient();

    data.name           = $("#name").val();
    data.sex            = $("#sex").val();
    data.birthday       = $("#birthday").val();
    data.age            = $("#age").val();
    data.phone          = $("#phone").val();
    data.email          = $("#email").val();
    data.id_type        = $("#id_type").val();
    data.id_number      = $("#id_number").val();
    data.job            = $("#job").val();
    data.marital_status = $("#marital_status").val();
    data.nation         = $("#nation").val();
    data.native_place   = $("#native_place").val();
    data.blood_type     = $("#blood_type").val();
    data.address        = $("#address").val();
    data.postcode       = $("#postcode").val();
    if (data.name == "") {
        $("#a-tab0").trigger("click");
        $("#name").focus();
        $("#tip0").text("请填写！");
        return;
    }
    if (data.age == "") {
        $("#a-tab0").trigger("click");
        $("#age").focus();
        $("#tip0").text("请填写！");
        return;
    }
    if (data.id_number == "") {
        $("#a-tab0").trigger("click");
        $("#id_number").focus();
        $("#tip0").text("请填写！");
        return;
    }
    if (data.phone == "") {
        $("#a-tab0").trigger("click");
        $("#phone").focus();
        $("#tip0").text("请填写！");
        return;
    }

    data.temperature             = $("#temperature").val();
    data.pulse                   = $("#pulse").val();
    data.breath                  = $("#breath").val();
    data.blood_pressure          = $("#blood_pressure").val();
    data.specialized_examination = $("#specialized_examination").val();
    data.examination_remark      = $("#examination_remark").val();

    data.medical_id          = $("#medical_id").val();
    data.attending_doctor_id = $("#attending_doctor_id").val();
    data.diagnosis_id        = $("#diagnosis_id").val();
    data.admission_time      = $("#admission_time").val();
    data.inpatient           = $("#inpatient").val();
    data.operation           = $("#operation").val();
    data.complaint           = $("#complaint").val();
    data.history_allergy     = $("#history_allergy").val();
    data.history_present     = $("#history_present").val();
    data.history_previous    = $("#history_previous").val();
    data.history_personal    = $("#history_personal").val();
    data.history_family      = $("#history_family").val();
    data.remark              = $("#remark").val();
    if (data.medical_id == "") {
        $("#a-tab1").trigger("click");
        $("#medical_id").focus();
        $("#tip1").text("请填写！");
        return;
    }

    data.room               = $("#room").val();
    data.bed                = $("#bed").val();
    data.inpatient_id       = $("#inpatient_id").val();
    data.in_date            = $("#in_date").val();
    data.out_date           = $("#out_date").val();
    data.professor_id       = $("#professor_id").val();
    data.charge_doctor_id   = $("#charge_doctor_id").val();

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

        t1 = new Date($(this).find(".begin_time").val());
        t2 = new Date($(this).find(".end_time").val());
        var time= t2.getTime() - t1.getTime(); 
        var days = parseInt(time / (1000 * 60 * 60 * 24)) + 1;
        s += "," + days;
        $(this).find("input").each(function (){
            if ($(this).val() == "" && canSubmit) {
                $("#tip2").text("请填写！");
                $(this).focus();
                canSubmit = false;
                return;
            }
        });
        data.medicineStr += s + ";";
    });
    data.medicineStr = data.medicineStr.substr(0, data.medicineStr.length - 1);
    if (canSubmit) {
        operate(data, "<?php echo ($operate_url); ?>", true);
    }
    
}
</script>