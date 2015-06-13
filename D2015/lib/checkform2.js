$(function(){
	$("#additional").attr("disabled","disabled");
	$("#dbselect").change(function(event){
		var target = $(event.target);
		if($(target).val()=="scores"){
			$("#additional").removeAttr("disabled");
		}
	});
});