<?
include("core/wallet.php");
include('templates/header.php');

// index page
?>


        <div class="page-header">
          <h1>LTC instawallet <small>In progress...</small></h1>
        </div>
        <div class="row">
          <div class="span10">

            <?
            echo srsnot("The LTC InstaaWallet is currently under development, I am not responsible for any lost litecoins, failed transactions, or lost addresses. save your vault link and dont share it");

            if (isset($_SESSION["key"])) {
          ?>
          <form action="vault">
            <input type="hidden" name="key" value="<?=$_SESSION["key"]?>" />
            <button class="btn notice"/>Return to my wallet</button>
            </form>
          <?
            }
            else {
            ?>
            <form action="getaddress.php">
            <input type="hidden" name="iwantaddress" value="true" />
            <button class="btn danger"/>I don't care, just give me an address!</button>
            </form>
            <? } ?>


<?
echo '
             <center><h3>Recent transactions</h3></center>

            <table class=\'bordered-table condensed-table zebra-striped\'><tr><td>Confirms</td><td>Type</td><td>Amount</td><td>Fee</td></tr>';
              $dump = array_reverse($btclient->listtransactions());



              

           	foreach ($dump as $herp) {
           		if ($herp['category'] != "move") {
           			if ($herp['category'] == "send") {
           				$herp['category'] = '<span class="label important">'.$herp['category'].'</span>';
           				$herp['amount'] = $herp['amount'] * -1;
           				
           				$color = "maroon";
           			} else {
           				$herp['category'] = '<span class="label success">'.$herp['category'].'</span>';
           				$color = "green";
           			}
           			$herp["fee"] = $herp["fee"] * -1;
           			echo "<tr><td>" . $herp['confirmations'] . "</td><td>" . $herp['category'] .
           			"</td><td><font color='{$color}'>" . $herp['amount'] . "</font></td><td>" . ($herp['fee'] ?
           					$herp["fee"] : 0) . "</td></tr>";
           		}
           	}
              	
              	
              	              	
              
              echo "</table>";
?>
          </div>


<?
include("templates/sidebar.php");
include('templates/footer.php');
?>