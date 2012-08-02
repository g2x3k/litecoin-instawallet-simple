<?php

/**
 * @author Greedi
 * @copyright 2012
 */

$banlist = array("123.456.789");
$myip = $_SERVER['REMOTE_ADDR'];
if (in_array($myip, $banlist)) {
    exit("<center>You are banned sucka!<br>
    #Litecoin @ FreeNode</center>");
}
?>