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

/*$auth0 = new Auth0([
  'domain' => 'wQy3h3WeckKrUHh9E4Tcv08c5JadCoeN',
  'client_id' => 'sPghXgXGxeXETzVRJ7WEmZFOba3EEfj1',
  'client_secret' => 'yQ7FyPIarNTuSCpPr7jNMv66xXk6FXhT5J6lEwFR3EUxlhxiGoH1jjIMDu1AXcGK',
  'redirect_uri' => 'http://ec2-100-25-44-194.compute-1.amazonaws.com/launchpad/test.php',
  'scope' => 'openid profile email',
]);


$auth0->logout();
$return_to = 'http://ec2-100-25-44-194.compute-1.amazonaws.com/launchpad/test.php' . $_SERVER['HTTP_HOST'];
$logout_url = sprintf('http://%s/v2/logout?client_id=%s&returnTo=%s', 'dev-n6562r4d.auth0.com', 'sPghXgXGxeXETzVRJ7WEmZFOba3EEfj1', $return_to);
header('Location: ' . $logout_url);
die();*/
?>
