<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php
	/**************************
	*
	*  用Snoopy.class.php进行抓取
	*  主要用来抓取百度搜索结果前三页共30条结果的标题和链接
	*  使用正则匹配
	*  百度搜索结果中的标题都放在了<h3></h3>标签中
	*  所以程序就只匹配百度搜索结果代码中的<h3></h3>部分的代码
	*  完成日期：2015年12月20日
	*
	**************************/
?>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>百度网页搜索结果抓取</title>
	<meta http="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<form action="./spider-1.php" method="post" >
	输入关键词：<input type="text" name="keyword" />
	<input type="submit" name="submit" value="提取" />
</form>
<br />

<?php

empty($_POST['keyword'])?"<javascript>alert('请输入关键词');</javascript>" : $keyword = $_POST['keyword'];
$arr = explode(';', $keyword);
foreach ($arr as $key => $value) {
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$r = new Spider($value);
	}
}


class Spider {

	function spider($value) {		
		$url = "http://www.baidu.com/s?wd=".$value."&rn=30";
		$con = file_get_contents($url);
		
		$pattern = '/<h3.*<\/h3>/sU';					// 使用模式修正符s，则模式中的点号元字符将匹配所有字符，包括换行符。U代表禁止贪婪
		preg_match_all($pattern, $con, $match);
		for ($i = 0; $i < 30; $i++) {
			echo $i.":".$match[0][$i];
		}
	}

	function show($v) {
		if (is_array($v)) {
			echo "<pre>";
			print_r($v);
			echo "</pre>";
		} else {
			echo $v;
		}
	}
}

?>