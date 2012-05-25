<?
include("core/wallet.php");
include('templates/header.php');

// index page
?>

<div class="page-header">
<?
if($_GET['key'] && $addr->verKey($_GET['key'])) {
  $ltcaddr = $addr->verKey($_GET['key']);
}
else $ltcaddr = "FAiL...";

?>
          <h2 align="center"><? echo "{$ltcaddr}"; ?><small></small></h2>
        </div>
        <div class="row">
          <div class="span10">
            <?php
            if($_GET['key']) {
              if($addr->verKey($_GET['key'])) {
                $ltcaddr = $addr->verKey($_GET['key']);
                $_SESSION["key"] = $_GET["key"]; // sets/updates session_key with valid provided ...
                if($_POST['amount'] && $_POST['address']) {
                  try {
                    $addr->sanitizedSend($_POST['address'], $ltcaddr, $_GET['key'], str_replace(",",".",$_POST['amount']));
                    echo '<div class="alert-message success" data-alert="alert"><a class="close" onclick="\$().alert()" href="#">&times</a><p>Successfully sent ' . $_POST['amount'] . " LTC to" . $_POST['address'] . '</p></div>';
                  }
                  catch(Exception $erar) {
                    switch($erar->getMessage()) {

                      case "INVALID_AMT":
                        echo srserr("What sort-of amount is that!? Trying to exploit?");
                        break;
                      case "INVALID_ADDR":
                        echo srserr("Sending {$_POST['amount']} to {$_POST['address']} failed: Invalid litecoin address");
                        break;
                      case "SEND_FAILED":
                        echo srserr("Sending {$_POST['amount']} to {$_POST['address']} failed: Not enough funds in your account, if you are SURE you have enough money, please contact an admin");
                        break;
                      case "LOW_BALANCE":
                        echo srserr("Sending {$_POST['amount']} to {$_POST['address']} failed: Not enough funds in your account, Remember some transactions requires a 0.1 minimum fee, if you are SURE you have enough money, please contact an admin");
                        break;
                      default:
                        echo srserr("Well fuck, something bad happened...and my script hasn't detected why, please contact an admin IMMEDIETLY");
                    }
                  }
                }

                echo srsnot("<strong>IMPORTANT!</strong> DO <strong>NOT</strong> LOSE THIS LINK, IT IS LINKED TO YOUR ACCOUNT, IF YOU LOSE THIS LINK, YOU HAVE LOST ACCESS TO YOUR ACCOUNT AND WE WILL NOT BE ABLE TO RETRIEVE IT FOR YOU... <br>
<br>
<center><a href=http://wallet.it.cx/vault?key={$_GET['key']} style=\"font-size: 12px;\">http://wallet.it.cx/vault?key={$_GET['key']}</a> (ctrl+b to bookmark)</center>");
                //echo "<h4>Address: <input type='text' value='{$ltcaddr}' style='width: 260px; text-align: center;' readonly=readonly /></h4>";
                echo "<p><h2>Balance: " . $addr->ltc->getbalance($_GET['key'], 5) . "</h2><i style='font-size: 9px; padding-top:0px;margin-top:0px;'>Deposits updated after 5 confirms, 0.1 LTC reserved for fee</i></p>";
                echo "<h4>Send LTC:</h4>";
                echo "<form class='form-stacked' action='{$_SERVER['PHP_SELF']}?{$_SERVER['QUERY_STRING']}' method='POST'><label for='address'>Address to send to</label><input type='text' id='address' name='address' style='width: 260px; text-align: center;'/>
                <br /><label for='amount'>Amount of LTC to send</label><input type='text' id='amount' name='amount' style='width: 180px; text-align: right;' /> &nbsp; <input type='submit' class='btn info'value='SEND'/></form>";
                echo "<br><h4>Your last 15 transactions:</h4>";

                echo "<div style=\"margin-right: 20px;\"><table class='bordered-table condensed-table zebra-striped'><tr><td>Confirms</td><td>Transaction ID</td><td>Amount</td><td>Fee</td></tr>";

                $dump = array_reverse($addr->ltc->listtransactions($_GET['key'], "15"));

                foreach ($dump as $herp) {
                  if ($herp['account'] == $_GET['key']) {
                    echo "<tr><td>" . $herp['confirmations'] . "</td><td><input type='text' value='" . $herp['txid'] . "' style='margin: 0px;'/></td><td>". $herp['amount'] . "</td><td>" . ($herp['fee'] ? $herp['fee'] : 0) . "</td></tr>";
                  }
                }
                echo "</table></div>";
                $addr->PDO_Conn = NULL;

              } else {
                echo srserr("INVALID KEY...");
              }
            } else {
              echo srserr("Why are you on this page? You haven't even set a key...");
            }
            ?>
          </div>


<?

include("templates/sidebar.php");
include('templates/footer.php');
?>