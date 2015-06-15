$(function(){
		$("#submit").hide();
		//radioを監視、値が変更されたら発火
		$(":radio").change(function(event) {
			/* Act on the event */
			check()
		});
		//textを監視、keyupされたら発火
		$(":text").keyup(function(event) {
			/* Act on the event */
			check();
		});
		//numberを監視、keyupで発火
		$("#num").keyup(function(event) {
			/* Act on the event */
			check();
		});
		$("#num").change(function(event) {
			/* Act on the event */
			check();
		});
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
			$("#submit:after").fadeIn(500);
			$("#submit:before").fadeIn(700);
			$("#submit").fadeIn(900);
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
		if($("#num").val()==""){
			//空白ならfalse;
			flag = false;
		}
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