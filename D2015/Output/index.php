<?php
	require_once('../accessInfo.php');
	require_once('CalcFunction.php');
		//$mid = $_POST['mid'];
		//コメント追加いずた
		//"○◯チーム！！"
		//"wearable2.png"
		
		/*$Answers = array(
			"q1" => $_POST['q1'],
			"q2" => $_POST['q2'],
			"q3" => $_POST['q3'],
			"q4" => $_POST['q4'],
			"q5" => $_POST['q5'],
			"q6" => $_POST['q6'],
			"q7" => $_POST['q7'],
			"q8" => $_POST['q8'],
			"q9" => $_POST['q9'],
			"q10" => $_POST['q10'],
			"q11" => $_POST['q11'],
			"q12" => $_POST['q12'],
			"q13" => $_POST['q13'],
			"q14" => $_POST['q14'],
			"q15" => $_POST['q15'],
			"q16" => $_POST['q16'],
		);*/
		//postされたデータを数値に変換
		$Answers = array(
			intval($_POST['q1']),
			intval($_POST['q2']),
			intval($_POST['q3']),
			intval($_POST['q4']),
			intval($_POST['q5']),
			intval($_POST['q6']),
			intval($_POST['q7']),
			intval($_POST['q8']),
			intval($_POST['q9']),
			intval($_POST['q10']),
			intval($_POST['q11']),
			intval($_POST['q12']),
			intval($_POST['q13']),
			intval($_POST['q14']),
			intval($_POST['q15']),
			intval($_POST['q16']),
		);
		//ダミーデータ
		$mid = 1;
		//$Answers = array(5,5,5,4,5,4,3,2,1,2,3,4,5,4,3,2);
		//		
			
		$Name = array("伊藤悠真", "沈瑞未", "土田修平", "渡邊拓貴", "菅家浩之", "出田怜", "双見京介");
		$mid = array(1,2,3,4,5,6,7);
		$pIto = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		$pShen = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		$pTsuchida = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		$pWatanabe = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		$pKanke = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		$pIzuta = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		$pFutami = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
		$D_Data = array($pIto, $pShen,$pTsuchida,$pWatanabe,$pKanke,$pIzuta,$pFutami);
		
		//SQL実行（midで検索して、pointを取得）
		for($i=0;$i<7;$i++) {
			$searchSQL[$i] = 'SELECT point FROM scores WHERE mid="'.$mid[$i].'"';
		}
				
		//dbに接続
		$conn = mysql_connect('localhost','s2pass','thepass203');
		if($conn){
			//データベース選択
			mysql_select_db($db_name,$conn);
			//回答をDBにinsert===========================================
			$insert = 'INSERT INTO scores (point,mid,eid) VALUES ';
			//$tmp = $Answers;
			//var_dump($answers);
			for($i=0;$i<count($Answers);$i++){
				$num = $i+1;
				$insert = $insert.'('.$Answers[$i].','.$mid.','.$num.')';
				if($i<15){
					$insert = $insert.',';//最後の要素でないとき
				}
			}
			//echo $insert;
			$q = mysql_query($insert,$conn);
			//=======================================================
			//データベースから値を取得
			//教師データの取得
			//SQL実行（midで検索して、pointを取得）
			for($i=0;$i<7;$i++) {
				$query = mysql_query($searchSQL[$i],$conn);
				$count = 0;
				while($row = mysql_fetch_assoc($query)){
					$D_Data[$i][$count] = $row["point"];
					$count +=1;
				}
			}
			//距離計算
			$Dis = CalcDistance($Answers, $D_Data);
			//var_dump($Dis[6]);
			//チーム決定
			$Min = $Dis[0];
			$TeamNum = 0;
			for($i=1;$i<count($Dis);$i++) {
				if($Min > $Dis[$i]) {
					$Min = $Dis[$i];
					$TeamNum = $i;
				}
			}
			//$TeamNum = 1;
			//$r = $mysql_fetch_array($query2,'MYSQL_ASSOC');
			//var_dump($r);
			//
			//$mysql_free_result($query2);*/
		}
		//echo $mid[0];
		//var_dump($mid);

	?>

<!DOCTYPE html>
<html lang = "ja">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Team Decision</title>
		<!--スタイルシート-->
		<!--<link rel = "stylesheet" href = "css/animsition.min.css">-->
		<!--<link rel = "stylesheet" type ="text/css" href = "css/mycss.css" media = "all">
		<link rel = "stylesheet" href = "css/textform.css">
		<link rel = "stylesheet" href = "css/component.css">-->
		<link rel="stylesheet" href="../css/main.css">
		<!--ファビコン-->
		<link rel="shortcut icon" href="http://cse.eedept.kobe-u.ac.jp/wp-content/uploads/2012/05/eigoUri1.png" type="image/x-icon">
		<!--フォント-->
		<link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900' rel='stylesheet' type='text/css'>
	
		<!--スクリプト-->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type= "text/javascript" src = "../lib/footerFixed.js"></script>
		<script src="../lib/jquery.fademover.js"></script>
		<script src = "../lib/modernizr.custom.js"></script>
		<!--フェードイン-->
		<script src="../lib/fade.js"></script>
		<!--ボタンを隠す-->
		<script src="lib/checkAnime.js"></script>
	
		<!--Adobe Edge Runtime-->
		<!--チーム決定-->
		<script type= "text/javascript">
			var Team = {Num: <?php echo $TeamNum; ?>};
			var txt = new Array();
    			txt[0] = "ライフチーム！！";
    			txt[1] = "IHCIチーム！！";
    			txt[2] = "ダンサーよりの<br>環境メディアチーム！！";
    			txt[3] = "超音波erよりの<br>ウェアラブルチーム！！";
    			txt[4] = "ドラマーよりの<br>環境メディアチーム！！";
    			txt[5] = "認識チーム！！";
    			txt[6] = "セルフカッターよりの<br>ウェアラブルチーム！";
    			
    		var res_img = new Array();
    			res_img[0] = "life.png";
    			res_img[1] = "ihci.png";
    			res_img[2] = "media.png";
    			res_img[3] = "wearable.png";
    			res_img[4] = "media.png";
    			res_img[5] = "awareness.png";
    			res_img[6] = "wearable.png";
    			
			var sfileName = new Array();
				sfileName[0] = "tokyokansei_arranged.mp3";
				sfileName[1] = "doraemon.mp3";
				sfileName[2] = "soccer_kansei.mp3";
				sfileName[3] = "wa_o.mp3";	
				
			var TeamName = new Array();
			var TeamNameEng = new Array();	
				
				TeamName[0] = 'ライフ';
				TeamName[1] = 'IHCI';
				TeamName[2] = 'ダンサーよりの環境メディア';
				TeamName[3] = '超音波erよりのウェアラブル';
				TeamName[4] = 'ドラマーよりの環境メディア';
				TeamName[5] = '認識';
				TeamName[6] = 'セルフカッターよりのウェアラブル';
				TeamNameEng[0] = 'life/';
				TeamNameEng[1] = 'ihci/';
				TeamNameEng[2] = 'media/';
				TeamNameEng[3] = 'wearable/';
				TeamNameEng[4] = 'media/';
				TeamNameEng[5] = 'awareness/';
				TeamNameEng[6] = 'wearable/';
			/*
			var link_teamName = new Array();
				link_teamName[0] = 'ライフ';
				link_teamName[1] = 'IHCI';
				link_teamName[2] = '土田よりの環境メディア';
				link_teamName[3] = '渡邊よりのウェアラブル';
				link_teamName[4] = '菅家よりの環境メディア';
				link_teamName[5] = '認識';
				link_teamName[6] = '双見よりのウェアラブル';
			var link_teamNameEng = new Array();
				link_teamNameEng[0] = 'life/';
				link_teamNameEng[1] = 'ihci/';
				link_teamNameEng[2] = 'media/';
				link_teamNameEng[3] = 'wearable/';
				link_teamNameEng[4] = 'media/';
				link_teamNameEng[5] = 'awareness/';
				link_teamNameEng[6] = 'wearable/';
			*/
		</script>
		<!--チーム決定 End-->	
    	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
    	<script type="text/javascript" charset="utf-8" src="edge_includes/edge.5.0.1.min.js"></script>
    	<script type="text/javascript" charset="utf-8" src="./OutputTest_edge.js"></script>
    	
    	<!--リンク生成系-->
	<script>
	window.onload=function(){
			var teamName = TeamName[6];
			var teamNameEng = TeamNameEng[6];
			var linktext = 'あなたのチームは'+TeamName+'チームに決まりました。-神戸大学塚本・寺田研究室-';
			var pagelink = 'http://cse.eedept.kobe-u.ac.jp/ito/D2015/inputTest/';
			//チームリンク生成
			document.getElementById("teamLink").href='http://cse.eedept.kobe-u.ac.jp/portfolio/'+teamNameEng;
			//twitterリンク生成
			document.getElementById("twitterLink").href='https://twitter.com/intent/tweet?hashtags=S2SortingHat&text='+encodeURIComponent(linktext)+'&url='+pagelink;
			//facebookリンク生成
			document.getElementById("facebookLink").href='https://www.facebook.com/sharer/sharer.php?u='+pagelink;
			//Lineリンク生成
			document.getElementById("lineLink").href='http://line.me/R/msg/text/?'+encodeURIComponent(linktext);
		}
	</script>
    
   
    
   		 <style>
       	 .edgeLoad-EDGE-116503079 { visibility:hidden; }
    	</style>
		<script>
   			AdobeEdge.loadComposition('OutputTest', 'EDGE-116503079', {
    		scaleToFit: "none",
    		centerStage: "both",
    		minW: "0",
    		maxW: "undefined",
    		width: "800px",
    		height: "594px"
			}, {dom: [ ]}, {dom: [ ]});
		</script>
	
		<!--Adobe Edge Runtime End-->
	</head>

<body>
<div id = "contents">
	<div id = "main">
		<div id="Stage" class="EDGE-116503079">
		</div>
		<div id="links">
			<div class="widerLink">
				<!--リンク先を動的に変更-->
				<a id = "teamLink" href="#" class="normal_button team_link" target="_blank">このチームについて</a>
			</div>
			<ul id="snsLinks">
				<!--リンク先を動的に変更-->
				<!--中身は上のjsで自動的に変更してくれるので上のjsを参照されたし-->
				<li><a id = "twitterLink" href="#" class="normal_button twitter_color" onclick="window.open(this.href,'','width=650,height=450,menubar=no,toolbar=no,scrollbars=yes');return false;">ツイートする</a></li>
				<li><a id="facebookLink" href="#" class="normal_button facebook_color" onclick="window.open(this.href,'','width=650,height=450,menubar=no,toolbar=no,scrollbars=yes');return false;">シェアする</a></li>
				<li><a id = "lineLink" href="#" class="normal_button line_color" target="_blank">LINEで送る</a></li>
				<!--<li><a href="#" class="normal_button team_link">このチームについて</a></li>-->
			</ul>
		</div>
	</div>
	<div id = "footer">
		&copy; TSUKAMOTO TERADA LABORATORY
	</div>
</div>
	
</body>
</html>
