<?php
	require_once('accessInfo.php');
	$db = $_POST['db'];
	$mem = array('mid','mname','myear','msex','mflag','mtime');
	$que = array('qid','qtitle','qflag');
	$tes = array('tid','answer','mid','qid','ttime');
	$ele = array('eid','etitle','eflag');
	$sco = array('sid','point','mid','eid','stime');
	$tableLabel = array(
		"members"=>$mem,
		"questions"=>$que,
		"tests"=>$tes,
		"elements"=>$ele,
		"scores"=>$sco,
		);
	//var_dump($tableLabel);
	if(is_null($db)){
		//初回アクセス時は$dbはnull
		$db = "members";
	}
	else{
	}
	$conn = mysql_connect('localhost','s2pass','thepass203');
		if($conn){
			//データベース選択
			mysql_select_db($db_name,$conn);
			//SQL作成
			$sql='SELECT ';
			$tmp = $tableLabel[$db];
			foreach($tableLabel[$db] as $value){
				$sql = $sql.' '.$value;
				if(next($tmp)){
					$sql = $sql.',';//最後でないなら
				}
			}
			$sql = $sql.' FROM '.$db;
			$query = mysql_query($sql,$conn);
		}
?>
<!DOCTYPE html>

<html>
<head>
	<title>dataviewer</title>
	<link rel="stylesheet" href="css/viewer.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="lib/checkform2.js"></script>
</head>

<body>
<div id = "container">
	<div id = "main">
		<form action = "dataviewer.php" method = "post">
			データベース選択：
			<select name = "db" id="dbselect">
				<option value="members" <?php if($db == "members"){ echo 'selected';}?>>members</option>
				<option value="questions" <?php if($db == "questions"){ echo 'selected';}?>>questions</option>
				<option value="tests" <?php if($db == "tests"){ echo 'selected';}?>>tests</option>
				<option value="elements" <?php if($db == "elements"){ echo 'selected';}?>>elements</option>
				<option value="scores" <?php if($db == "scores"){ echo 'selected';}?>>scores</option>
			</select>
			<br><br>
			<div id="additional">
				mid:<input type="number" name="mid" min = "1">
				eid:
				<select name="eid">
					<option value=""></option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
				</select>
			</div>
			<br>
			<input type = "submit" value="表示する">
		</form>
		<p id = "query">検索クエリ：　<span><?php echo $sql;?></span></p>
		<table border="1">
			<?php
				echo '<tr>';
				foreach($tableLabel[$db] as $value){
					echo '<th>';
					echo $value;
					echo '</th>';
				}
				echo '</tr>';
				while($row=mysql_fetch_assoc($query)){
					echo '<tr>';
					foreach($tableLabel[$db] as $value){
						echo '<td>';
						echo $row[$value];
						echo '</td>';
					}
					echo '</tr>';
				}
			?>
		</table>
	</div>
</div>
</body>
</html>
