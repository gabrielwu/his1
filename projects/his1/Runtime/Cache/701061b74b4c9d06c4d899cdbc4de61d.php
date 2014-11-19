<?php if (!defined('THINK_PATH')) exit(); echo ($css); ?>
<div id="top">
    <div>
        <a href="<?php echo ($url); ?>/logout" target="_parent">退出</a>
        <span>您好，<?php echo ($department_name); ?> <?php echo ($userTypeCn); ?> <?php echo ($user_name); ?></span>
        <?php if(($level == 2)): ?><!--<a href="<?php echo ($root); ?>/index.php/Student/editConfirmList" target="main">信息审核</a>&nbsp;&nbsp;--><?php endif; ?>
    </div>
    <p>患者回访系统</p> 
</div>
<?php echo ($js); ?>