<?php
	$Connect = pg_connect("localhost","root","","salomon") or die("Lỗi".pg_error($Connect));
	pg_query($Connect,'SET NAMES "utf8"');
	//pg_close($Connect);
?>