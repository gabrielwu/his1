<?php if (!defined('THINK_PATH')) exit();?><title>患者随访系统</title>
<frameset rows="51, *, 40" cols="*" frameborder="no" border="0" framespacing="0">
    <frame src="<?php echo ($url); ?>/top" name="topFrame" scrolling="no" noresize="noresize" id="topFrame"/>
    <frameset cols="180,*" frameborder="no" border="0" framespacing="0">
        <frame src="<?php echo ($url); ?>/left"  name="leftFrame" id="leftFrame" scrolling="no" />
        <frame src="<?php echo ($url); ?>/right" name="main" id="main" title="main" scrolling="auto" />
    </frameset>
    <frame src="<?php echo ($url); ?>/bottom" name="bottomFrame" scrolling="no" noresize="noresize" id="bottomFrame"/>
</frameset>