$(function(){
		hideLink();
		setTimeout("showLink()", 25000);
		
	});
	function check(){
		if(checkForm()){
			showLink();
		}else{
			hideLink();
		}
	}
	//submit要素を出現させる
	function showLink(){
			$("#links").animate({
				opacity:'show'
			},500);
		}
	//submit要素を隠す
	function hideLink(){
			$("#links").animate({
				opacity:'hide'
			},500);
		}