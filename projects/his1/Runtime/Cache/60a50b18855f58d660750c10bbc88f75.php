<?php if (!defined('THINK_PATH')) exit();?>﻿<?php echo ($css); ?>
<div id="right">
    <div class="title">
            <a>手术信息</a> — 
            <a href="<?php echo ($url); ?>/index">查询</a>
    </div>
    <div class="content">
        <div id="tab4" class="tab">
            <table class="tb_area ">
                <tr>
                    <td><span>患者：</span></td>
                    <td><?php echo ($patient["name"]); ?></td>
                    <td><span>病历号：</span></td>
                    <td><?php echo ($patient["medical_id"]); ?></td>
                </tr>
                <tr>
                    <td><span>开始时间：</span></td>
                    <td><?php echo ($data["begin_time"]); ?></td>
                    <td><span>结束时间：</span></td>
                    <td><?php echo ($data["end_time"]); ?></td>
                    <td><span>手术种类：</span></td>
                    <td><?php echo ($data["operation_type_name"]); ?></td>
                </tr>
                <tr>
                    <td><span>主刀医生：</span></td>
                    <td><?php echo ($data["operator_name"]); ?></td>
                    <td><span>助手1：</span></td>
                    <td><?php echo ($data["assistant1_name"]); ?></td>
                    <td><span>助手2：</span></td>
                    <td><?php echo ($data["assistant2_name"]); ?></td>
                </tr>
            </table>
            <?php if(is_array($details)): $i = 0; $__LIST__ = $details;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data1): $mod = ($i % 2 );++$i;?><table class="tb1 tb2 tb80">
                    <thead>
                        <tr class="">
                            <th colspan="80" width=""><?php echo ($data1["father_field"]["name"]); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php if(is_array($data1["field_names"])): $i = 0; $__LIST__ = $data1["field_names"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><td><?php echo ($data2["name"]); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tr>
                        <?php if(is_array($data1["field_values"])): $i = 0; $__LIST__ = $data1["field_values"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data3): $mod = ($i % 2 );++$i;?><tr>
        <?php if($data1['father_field']['type'] == '3'): ?><td>
                                    <?php if(is_array($data3)): $i = 0; $__LIST__ = $data3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data4): $mod = ($i % 2 );++$i; echo ($data4); ?>,<?php endforeach; endif; else: echo "" ;endif; ?>
                                </td>
        <?php else: ?> 
                                <?php if(is_array($data3)): $i = 0; $__LIST__ = $data3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data4): $mod = ($i % 2 );++$i;?><td><?php echo ($data4); ?></td><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
                <br><?php endforeach; endif; else: echo "" ;endif; ?>
            <div class="edit">
                <input type="button" id="btn_submit" class="btn" value="返回查询" />
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
        window.location.href = "<?php echo ($url); ?>/index";
    })
});

</script>