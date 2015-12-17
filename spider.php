<?php

	include("Snoopy/Snoopy.class.php");
	
	$snoopy = new Snoopy();

	$sourceURL = "http://www.zhihu.com/question/38175361";
	$snoopy -> fetchtext($sourceURL);

	$r = $snoopy -> results;
	show($r);

	function show($v) {
		if (is_array($v)) {
			print "<pre>";
			print_r($v);
			print "</pre>";
		} else {
			echo $v;
		}
	}

	echo '<br />';
	echo '<br />';
?>
