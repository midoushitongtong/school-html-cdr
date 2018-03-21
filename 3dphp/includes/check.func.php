<?php




if(!defined('IN_TG')){
	exit ('Access Defined!');
}

function _check_content($_string){
	if(mb_strlen($_string) < 3 || mb_strlen($_string) > 200){
		_alert_back('短息内容内容不的小于3位或大于200位');
	}
	return _mysql_string($_string);
}
?>