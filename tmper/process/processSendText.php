<?php
//http://fe80::2e8f:cab2:241a:9994%rmnet0:7737/sendsms?phone=17275489517&text=ner&password=

	$reply_utf8 = mb_strtoupper('http://2607:fb90:2544:f0c4:0:b:c19:6a01/sendsms?phone=17274828242&text=ner&password=');
	$reply_header = rawurlencode($reply_utf8);
	header('Content-Type: text/html; charset=utf-8');
	header("text: $reply_header");
?>