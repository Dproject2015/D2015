$(function(){
	$("#additional").attr("disabled","disabled");
	$("select").change(function(event){
		var target = $(event.target);
		if($(target).val()=="scores"){
			$("#additional").removeAttr("disabled");
		}
	});
});