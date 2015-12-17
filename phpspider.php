<?php

	/**************************
	*
	*  用Snoopy.class.php进行抓取
	*  主要用来抓取百度搜索结果前三页共30条结果
	*  使用正则匹配
	*  需要处理一些问题：
	*	1. 常规结果
	*   2. 特殊结果
	*   3. 可能还有其它
	*
	**************************/

	$pattern = "/data-tools='{\"title\":\"(.*)\",\"url\":\"(.*)\"}/";
    $url = "./php.html";
	$html = file_get_contents($url);
	
	preg_match_all($pattern, $html, $matches);
	print_r($matches);
?>
