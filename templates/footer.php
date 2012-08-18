 <!-- BEGIN FOOTER.PHP -->
         </div>
      </div>
      <footer>
              
        <p style="font-size: 11px;">Someguy123 & g2x3k &copy; 2011-2012 source: <a href=https://github.com/g2x3k/litecoin-instawallet-simple>Github</a> - exec: <?=round(timer()-$start,5)?> sec - Donate to: <?=$btclient->getaccountaddress($don_account);?> (recv: <?=$btclient->getbalance($don_account,0)?> LTC)</p>
      </footer>

    </div> <!-- /container -->

  </body>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-631184-8']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</html>