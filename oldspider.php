<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<title>百度网页搜索结果抓取</title>
	<meta http="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<form action="./spider.php" method="post" >
	输入关键词：<input type="text" name="keyword" />
	<input type="submit" name="submit" value="提取" />
</form>
<br />
<?php

	$keyword = $_POST['keyword'];
	$arr = explode(';', $keyword);
	
	echo '<table border="1">';
	echo "<tr height=500px>";	// 使所有结果都在同一行显示，所以行标签tr在此处布置，高为500px，刚好为30条记录时的高度
	
	foreach( $arr as $word => $w) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			
			$url = "http://www.baidu.com/s?wd=".$w."&rn=30";
			
			$con = file_get_contents($url);
			
			// $pattern = '#(data-tools=\'{\"title\":\"(.*)\",\"url\":\"(.*)\"}\'|data-tools=\"{title:\'(.*)\',url:\'(.*)\'}\")#';
			$pattern = '#data-tools=[\'|"]{"?title"?:[\'|"](.*)[\'|"],"?url"?:[\'|"](.*)[\'|"]}["|\']#U';	// 必须在后面使用模式修正符U，用以取消贪婪匹配！
			preg_match_all($pattern,$con,$match);
			//print_r($match);
			echo "<td>$w</td><td>";
			for( $j = 0; $j < 30; $j++) {
				echo '<a href="'.$match[2][$j].'">'.$match[1][$j].'</a><br />';
			}
			echo "</td>";
			
		}
	}
	echo '</tr></table>';	// 行结束，表格结束
?>
</body>
</html>