<?php
// login.php

require 'vendor/autoload.php';
use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'dev-matthewlauer.auth0.com',
  'client_id' => 'Pef23VmWTXPjYTak0rPxMfTHs7MtCqMy',
  'client_secret' => 'YOUR_CLIENT_SECRET',
  'redirect_uri' => 'http://0.0.0.0:8000/launchpad/test.php',
  'scope' => 'openid profile email',
]);

$auth0->login();
?>
