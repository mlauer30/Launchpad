<?php
// logout.php
require 'vendor/autoload.php';
use Auth0\SDK\Auth0;

$auth0 = new Auth0([
  'domain' => 'dev-matthewlauer.auth0.com',
  'client_id' => 'Pef23VmWTXPjYTak0rPxMfTHs7MtCqMy',
  'client_secret' => 'jM-srxz7wRI05z7qGaKblUqfIH3_b460rzbtauDo07P8h3PwAIztmBG3KSP1qeoz',
  'redirect_uri' => 'http://0.0.0.0:8000/launchpad/launch.php',
  'scope' => 'openid profile email',
]);

// Log out of the local application.
$auth0->logout();
header('Location: login.php');
?>
