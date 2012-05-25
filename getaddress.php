<?
include("core/wallet.php");

/*$resp = recaptcha_check_answer ($privatekey,
$_SERVER["REMOTE_ADDR"],
$_POST["recaptcha_challenge_field"],
$_POST["recaptcha_response_field"]);

if (!$resp->is_valid) {
// What happens when the CAPTCHA was entered incorrectly
die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
"(reCAPTCHA said: " . $resp->error . ")");
} else {
// Your code here to handle a successful verification
}*/


if (isset($_SESSION["key"])) {
  $address = "vault?key=" . $_SESSION["key"];
}
else {
  $addr->newAddr();
  $_SESSION["key"] = $addr->securl;
  $address = "vault?key=" . $_SESSION["key"];
}
header("Location: " . $address);

?>