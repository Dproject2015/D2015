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
</head>

<body>
<div id = "container">
	<div id = "main">
		<form action = "dataviewer.php" method = "post">
			データベース選択：
			<select name = "db">
				<option value="members" <?php if($db == "members"){ echo 'selected';}?>>members</option>
				<option value="questions" <?php if($db == "questions"){ echo 'selected';}?>>questions</option>
				<option value="tests" <?php if($db == "tests"){ echo 'selected';}?>>tests</option>
				<option value="elements" <?php if($db == "elements"){ echo 'selected';}?>>elements</option>
				<option value="scores" <?php if($db == "scores"){ echo 'selected';}?>>scores</option>
			</select>
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
