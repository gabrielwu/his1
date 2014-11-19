jQuery.fn.placeholder = function(){
	var i = document.createElement('input'),
		placeholdersupport = 'placeholder' in i;
	if(!placeholdersupport){
		var inputs = jQuery(this);
		inputs.each(function(){
			var input = jQuery(this),
				text = input.attr('placeholder'),
				pdl = 0,
				height = input.outerHeight(),
				width = input.outerWidth(),
				placeholder = jQuery('<span class="phTips">'+text+'</span>');
			try{
				pdl = input.css('padding-left').match(/\d*/i)[0] * 1;
			}catch(e){
				pdl = 5;
			}
			placeholder.css({'margin-left': -(width-pdl),'height':height,'line-height':height+"px",'position':'absolute', 'color': "#cecfc9", 'font-size' : "12px"});
			placeholder.click(function(){
				input.focus();
			});
			if(input.val() != ""){
				placeholder.css({display:'none'});
			}else{
				placeholder.css({display:'inline'});
			}
			placeholder.insertAfter(input);
			input.keyup(function(e){
				if(jQuery(this).val() != ""){
					placeholder.css({display:'none'});
				}else{
					placeholder.css({display:'inline'});
				}
			});
		});
	}
	return this;
};
jQuery('input[placeholder]').placeholder();
jQuery(function(){
	$("._select").each(function () {
		var val = $(this).attr("title");
		$(this).val(val);
	});
	datepickerInit();
});
function datepickerInit() {
	var date = new Date();
	var year = date.getFullYear();
	$.datepicker.regional['zh-CN']={
		closeText:'关闭',
		prevText:'&#x3C;上月',
		nextText:'下月&#x3E;',
		currentText:'今天',
		monthNames:['01','02','03','04','05','06','07','08','09','10','11','12'],
		monthNamesShort:['一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'],
		dayNames:['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],
		dayNamesShort:['周日','周一','周二','周三','周四','周五','周六'],
		dayNamesMin:['日','一','二','三','四','五','六'],
		weekHeader:'周',
		dateFormat:'yy-mm-dd',
		firstDay:1,
		isRTL:false,
		showMonthAfterYear:true,
		yearSuffix:'年',
		monthSuffix:'月',
		yearRange: "1900:" + year,
	};
	$.datepicker.setDefaults($.datepicker.regional['zh-CN']);
	$('.datepicker').datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'yy-MM-dd',
          showButtonPanel: true,
      });
}
String.prototype.endWith=function(s){
	if(s==null||s==""||this.length==0||s.length>this.length)
		return false;
	if(this.substring(this.length-s.length)==s)
		return true;
	else
		return false;
	return true;
}

String.prototype.startWith=function(s){
	if(s==null||s==""||this.length==0||s.length>this.length)
		return false;
	if(this.substr(0,s.length)==s)
		return true;
	else
		return false;
	return true;
}
function remove(id, url) {
	var data = new model();
	data.id = id;
	operate(data, url);
}
function resetPassword(id, url) {
	var data = new model();
	data.id = id;
	operate(data, url);
}
function isNonEmpty(value, msg, obj) {
	var flag = true;
	if (value == "") {
		alert(msg + "不能为空！");
		obj.focus();
		flag = false;
	}
	return flag;
}
function operate(data, url, next) {
    if(confirm("您确定要执行操作？")) {
		$.ajax({
			url: url,
			type: 'POST',
			data: data,
			success: 
				function(result){
					if (result == '1') {	
					    var msg = "操作成功！";
						alert(msg);
						if (typeof(next) == 'undefined' || next == true) {
							window.location.reload();
						} else {
							window.location.href = next;
						}
					} else if (result == '-1') {
						alert("没有权限！");
					} else {
						alert("操作失败！");
					}
				}
		});
    }
}
