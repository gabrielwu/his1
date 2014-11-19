<?php if (!defined('THINK_PATH')) exit(); echo ($css); ?>
<div id="right">
    <div class="title">
    	<span>数据字典</span> — <span><a href="<?php echo ($root); ?>/operationType/index">手术类型</a></span> — <span><?php echo ($operation_type["name"]); ?> 字段</span>
    </div>
	<div class="content">
		<table class="tb_invisible">
			<tr>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data2): $mod = ($i % 2 );++$i;?><td>
    	    			<input id="ck_<?php echo ($data2["operation_field_id"]); ?>" name="operation_field_id" type="checkbox" value="<?php echo ($data2["operation_field_id"]); ?>" title="<?php echo ($data2["id"]); ?>" />
    	    			<label for="ck_<?php echo ($data2["operation_field_id"]); ?>"><?php echo ($data2["name"]); ?></label>
    	    		</td><?php endforeach; endif; else: echo "" ;endif; ?>
			</tr>
		</table>
    	<div class="edit ">
            <input id="btn_submit" type="button" class="btn" value="提 交"  />
			<span id="tip"></span>
        </div>
	</div>
</div>
<?php echo ($js); ?>
<script type="text/javascript">
$(function () {
	$("input[name='operation_field_id']").each(function (){
		if ($(this).attr("title") != "") {
			$(this).attr("checked", "checked");
		}
	});
	$("#btn_submit").click(function () {
		var data = new model();
		var str = "";
		$("input:checkbox[name='operation_field_id']").each(function (){
			if (true == $(this).prop("checked")) {
				str += $(this).val() + ",";
			}
		});
		data.operation_field_id_str = str.substr(0, str.length - 1);
		operate(data, "<?php echo ($url); ?>/edit", true);
	})
});
function model() {
    var operation_field_id_str;
}
</script>