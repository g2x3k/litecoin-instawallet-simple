<?
function mnu_btn($link, $title, $preg = false) {
	if (! $preg)
		$preg = explode ( "?", $link );
	else
		$preg [0] = $preg;
	
	if (preg_match ( "/" . str_replace ( "/", "\/", $preg [0] ) . "/i", $_SERVER ['SCRIPT_FILENAME'] ))
		echo '<li class="active"><a href="' . $link . '">' . $title . '</a></li>';
	else
		echo '<li><a href="' . $link . '">' . $title . '</a></li>';
}
function timer() {
	$a = explode ( ' ', microtime () );
	return ( double ) $a [0] + $a [1];
}

function srsnot($srserror) {
	return '          <div class="alert-message alert" data-alert="alert" style="margin-right: 20px;"><p>' . $srserror . '</p></div>';
}
function srserr($srserror) {
	return '          <div class="alert-message error" data-alert="alert" style="margin-right: 20px;"><p>' . $srserror . '</p></div>';
}
?>