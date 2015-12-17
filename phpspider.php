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

	include "Snoopy/Snoopy.class.php";
	$snoopy = new Snoopy();	
	
	class SnoopySpider {
		
		function spider($keyword) {
			// 函数外的变量不能在函数内直接使用，虽然其为全局变量
			// 需要将其显式地转换为全局变量后，方可使用
			global $snoopy;
			$url = "http://www.baidu.com/s?wd=".$keyword;
			$snoopy -> fetchtext($url);
			$r = $snoopy -> results;
			$this -> show($r);
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

	$test = new SnoopySpider();
	$test -> spider("php");

?>