<?php
// login.php

require 'vendor/autoload.php';
use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'dev-n6562r4d.auth0.com',
  'client_id' => 'wQy3h3WeckKrUHh9E4Tcv08c5JadCoeN',
  'client_secret' => '_-pljKGPUpULa1fzgfNAJeufnjx2m42Yg4x2k3hzAeUh9Vr48on-5xPFVkaRPbMN',
  'redirect_uri' => 'http://ec2-100-25-44-194.compute-1.amazonaws.com/launchpad/launch.php',
  'scope' => 'openid profile email',
  'persist_access_token' => true,
  'persist_id_token' => true
]);

/*$auth0 = new Auth0([
  'domain' => 'dev-n6562r4d.auth0.com',
  'client_id' => 'sPghXgXGxeXETzVRJ7WEmZFOba3EEfj1',
  'client_secret' => 'yQ7FyPIarNTuSCpPr7jNMv66xXk6FXhT5J6lEwFR3EUxlhxiGoH1jjIMDu1AXcGK',
  'redirect_uri' => 'http://ec2-100-25-44-194.compute-1.amazonaws.com/launchpad/test.php',
  'scope' => 'openid profile email',
  'persist_access_token' => true,
  'persist_id_token' => true
]);*/


//var_dump($userinfo);
$auth0->login();
?>
