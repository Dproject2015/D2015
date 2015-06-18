<?php
	require_once('../accessInfo.php');
	require_once('CalcFunction.php');
		//$mid = $_POST['mid'];
		
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
		<!--フォント-->
		<link href='http://fonts.googleapis.com/css?family=Cinzel+Decorative:400,700,900' rel='stylesheet' type='text/css'>
	
		<!--スクリプト-->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type= "text/javascript" src = "../lib/footerFixed.js"></script>
		<script src="../lib/jquery.fademover.js"></script>
		<script src = "../lib/modernizr.custom.js"></script>
	
		<!--Adobe Edge Runtime-->
		<!--チーム決定-->
		<script type= "text/javascript">
			var Team = {Num: <?php echo $TeamNum; ?>};
			var txt = new Array();
    			txt[0] = "ライフチーム！！";
    			txt[1] = "IHCIチーム！！";
    			txt[2] = "環境メディアチーム！！";
    			txt[3] = "ウェアラブルチーム！！";
    			txt[4] = "環境メディアチーム！！";
    			txt[5] = "認識チーム！！";
    			txt[6] = "ウェアラブルチーム！！";
			var sfileName = new Array();
				sfileName[0] = "tokyokansei_arranged.mp3";
				sfileName[1] = "doraemon.mp3";
				sfileName[2] = "soccer_kansei.mp3";
				sfileName[3] = "wa_o.mp3";		
		</script>
		<!--チーム決定 End-->	
    	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
    	<script type="text/javascript" charset="utf-8" src="edge_includes/edge.5.0.1.min.js"></script>
    	<script type="text/javascript" charset="utf-8" src="./OutputTest_edge.js"></script>
    
   
    
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
	</div>
	<div id = "footer">
		&copy; TSUKAMOTO TERADA LABORATORY
	</div>
</div>
	
</body>
</html>
