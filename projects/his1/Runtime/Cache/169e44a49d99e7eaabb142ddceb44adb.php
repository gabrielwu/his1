<?php if (!defined('THINK_PATH')) exit(); echo ($css); ?>
<div id="left">
<?php if($adminType < '0'): ?><div>
	    <h3>患者信息</h3>
	    <p class="">
<?php if($userType != 'p'): ?><a href="<?php echo ($root); ?>/patient/index"   target="main">病历查询</a>
			<a href="<?php echo ($root); ?>/patient/addInput"     target="main">病历新建</a>
	        <a href="<?php echo ($root); ?>/operation/index" target="main">手术查询</a><?php endif; ?>
	        <a href="<?php echo ($root); ?>/followUp/index" target="main">回访查询</a>
<?php if($userType == 'p'): ?><a href="<?php echo ($root); ?>/followUp/addInput"   target="main">回访新建</a><?php endif; ?>
	    </p>
    </div><?php endif; ?>
<?php if(($userType == 'd') OR ($adminType > '0')): ?><div>
    	<h3>医生信息</h3>
	    <p class="">
<?php if($adminType > '0'): ?><a href="<?php echo ($root); ?>/doctor/index" target="main">医生列表</a><?php endif; ?>
<?php if($userType == 'd'): ?><a href="<?php echo ($root); ?>/doctor/view" target="main">个人信息</a><?php endif; ?>
	    </p>
    </div><?php endif; ?>
<?php if($adminType >= '0'): ?><div>
	    <h3>数据字典</h3>
	    <p class="">
<?php if($adminType == '0'): ?><a href="<?php echo ($root); ?>/title/index" target="main">职称</a>
	        <a href="<?php echo ($root); ?>/inpatientArea/index" target="main">病区</a>
	        <a href="<?php echo ($root); ?>/department/index"    target="main">科室</a>
			<a href="<?php echo ($root); ?>/medicineUnit/index"      target="main">药物剂量单位</a>
			<a href="<?php echo ($root); ?>/medicineFrequency/index" target="main">药物服用频度</a>
			<a href="<?php echo ($root); ?>/medicineUsage/index"     target="main">给药方式</a>
			<a href="<?php echo ($root); ?>/followUpAttachmentType/index"     target="main">回访附件类型</a><?php endif; ?>
<?php if($adminType > '0'): ?><a href="<?php echo ($root); ?>/diagnosis/index"      target="main">诊断</a>
			<a href="<?php echo ($root); ?>/medicine/index"       target="main">药物</a>
			<a href="<?php echo ($root); ?>/operationType/index"  target="main">手术类型</a>
			<a href="<?php echo ($root); ?>/operationField/index" target="main">手术字段</a><?php endif; ?>		
	    </p>
    </div><?php endif; ?>
    <div>
	    <h3>帐号管理</h3>
	    <p class="">
	        <a href="<?php echo ($url); ?>/changePassword" target="main">修改密码</a>
<?php if($adminType == '0'): ?><a href="<?php echo ($root); ?>/Admin/index"   target="main">管理员</a><?php endif; ?>
	    </p>
    </div>
</if>
</div>
<?php echo ($js); ?>
<script type="text/javascript" language="javascript">
function editConfirmView(){
	window.showModalDialog('<?php echo ($root); ?>/Student/editConfirmView', window, 'dialogWidth:900px;dialogHeight:600px');      
}
</script>