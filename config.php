<?php
require 'vendor/autoload.php';
define('URL_SITIO', 'http://localhost:3000/');

$apiContext = new \PayPal\Rest\ApiContext(
        new \PayPal\Auth\OAuthTokenCredential(
                'AeBPuuEXrB-U_WvSIFAUZ2_OCey-TAf0-jrTndsQvV8zSF4k4I68kstpLH4k435N8tCIjrfx0K4rE1Hj',#id del cliente
                'EPuPFe5Z_i9hW25ismh-5iFUxb7rLQVzNtAf1j8viDuW_LBnGh3QF433Jm3lI4gSHkL-tLnj-DpkuOuU' #secret del cliente
        )
);

