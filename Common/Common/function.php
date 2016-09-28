<?php 
function getMD5password($password){
	$pre = C('PASS_PRE');
	
	return md5($password.$pre);
}
function getStatusValue($i){
	switch ($i) {
		case '-1':
			echo '<span style="color:red">垃圾留言</span>';
			break;
		case '0':
			echo '<span style="color:gray">未回复</span>';
			break;
		case '1':
			echo '<span style="color:green">已回复</span>';
			break;
		default:
			return false;
			break;
		}
	}
?>