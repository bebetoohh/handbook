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
//列举当前目录下的文件夹,从wampserver的index.php中提取
function listFolder($handle = '.' , $class = "",$listIgnore = array ('.','..','public')){
	$handle = opendir($handle); //表示列举当前文件目录下
	$listContents = '';
	while ($file = readdir($handle)) {
		if(is_dir($file) && !in_array($file,$listIgnore))
		{
			$listContents .='<li><a href="'.$file.'" class="'.$class.'">'.$file.'</a></li>';
		}
	}
	closedir($handle);
	if(!isset($listContents)){
		$listContents = 'No Folder';
	}
	return $listContents;
}

// 随机密码生成
function generatePassword($length=8)
{
    $chars = array_merge(range(0,9),
                     range('a','z'),
                     range('A','Z'),
                     array('!','@','$','%','^','&','*'));
    shuffle($chars);
    $password = '';
    for($i=0; $i<8; $i++) {
        $password .= $chars[$i];
    }
    return $password;
}


// 以下为测试区

// echo randomColor();
// echo $color;
echo generatePassword();
?>

<!-- <div style="background-color: <?=$color;?>;width: 100px ;height:100px;"></div> -->