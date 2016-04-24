<?php
// 黑名单过滤
function is_spam($text , $file , $split = ':' , $regex = flase){
	$handle = fopen($file,'rb');
	$contents = fread($handle ,filesize($file));
	fclose($handle);
	$lines = explode("n", $contents);
	$arr = array();
	foreach($lines as $line){
		list($word,$count) = explode($split, $line);
		if($regex)
			$arr[$word] = $count;
		else
			$arr[preg_quote($word)] = $count;
	}
	preg_match_all("~".implode('|', array_keys($arr))."~", $text, $matches);
	$temp = array();
	foreach($matches[0] as $match){
		if(!in_array($match, $temp)){
			$temp[$match] = $temp[$match]+1;
			if($temp[$match] >= $arr[$word])
				return ture;
		}
	}
	return flase;
}


// 随机颜色生成器
function randomColor(){
	$str = '#';
	for($i=0 ; $i<6 ; $i++){
		$randNum = rand(0,15);
		switch ($randNum) {
			case '10':	$randNum = 'A';	break;
			case '11': 	$randNum = 'B'; break;
			case '12':  $randNum = 'C'; break;
			case '13':  $randNum = 'D'; break;
			case '14':  $randNum = 'E'; break;
			case '15':  $randNum = 'F'; break;
		}
		$str .= $randNum;
	}
	return $str;
}


echo randomColor();
// echo $color;
?>

<div style="background-color: <?=$color;?>;width: 100px ;height:100px;"></div>