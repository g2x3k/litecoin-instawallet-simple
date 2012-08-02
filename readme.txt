litecoin instawallet-simple public release
------------------------------------------
Forum Thread: https://bitcointalk.org/index.php?topic=55025.0
this is the simplest version of it, other might get released in time

made by g2x3k & someguy123 2011-2012 (c)


INSTALL:
put files in www dir, rename & edit config.example.php with proper values
and dont forget structure.sql for the db...

apache config {
<VirtualHost *:80>
        ServerName wallet.it.cx
        DocumentRoot /var/www/wallet
        <Directory /var/www/wallet>
                Options -Indexes
                RewriteEngine on
                RewriteCond %{REQUEST_FILENAME} !-d
                RewriteCond %{REQUEST_FILENAME}\.php -f
                RewriteRule ^(.*)$ $1.php
                AllowOverride none
        </Directory>
</VirtualHost>
}

with great powers come great resposibility.

// to use core/banned.php

just just put include ('core/banned.php'); on top of every page you want IP banned from.