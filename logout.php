<?php
// logout.php
require 'vendor/autoload.php';
use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'wQy3h3WeckKrUHh9E4Tcv08c5JadCoeN',
  'client_id' => '_-pljKGPUpULa1fzgfNAJeufnjx2m42Yg4x2k3hzAeUh9Vr48on-5xPFVkaRPbMN',
  'client_secret' => 'jM-srxz7wRI05z7qGaKblUqfIH3_b460rzbtauDo07P8h3PwAIztmBG3KSP1qeoz',
  'redirect_uri' => 'http://ec2-100-25-44-194.compute-1.amazonaws.com/launchpad/launch.php',
  'scope' => 'openid profile email',
]);

// Log out of the local application.
$auth0->logout();
header('Location: login.php');
?>
