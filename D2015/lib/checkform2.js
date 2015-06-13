$(function(){
	$(":number").attr("disabled","disabled");
	$("select").change(function(event){
		var target = $(event.target);
		if($(target).val()=="scores"){
			$(":number").removeAttr("disabled");
		}
	});
});