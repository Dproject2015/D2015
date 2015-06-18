$(function(){
		$("#submit").hide();
		//radioを監視、値が変更されたら発火
		$(":radio").change(function(event) {
			/* Act on the event */
			if(checkForm()){
				showLink();
			}else{
				hideLink();
			}
		});
		//textを監視、keyupされたら発火
		$(":text").keyup(function(event) {
			/* Act on the event */
			if(checkForm()){
				showLink();
			}else{
				hideLink();
			}
		});
	});
	//submit要素を出現させる
	function showLink(){
			$("#submit").fadeIn('normal');
		}
	//submit要素を隠す
	function hideLink(){
			$("#submit").hide();
		}
	function checkForm(){
		var flag=true;
		//全てのテキストボックスをチェック
		$(":text").each(function(index, el) {
			if($(el).val() == ""){
				//空のテキストボックスがあればfalseにする
				flag=false;
			}
		});
		//全てのradioボタンをチェック
		//チェックされているラジオボタンの数をカウント
		var $checkedCount = $(".q").find('input[type="radio"]:checked').size();
		//ラジオボタンが入っているulの数をカウント
		var $radioCount = $(".q").size();
		if($checkedCount!=$radioCount){
			flag=false;
		}
		return flag;
	}