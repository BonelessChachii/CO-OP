<?php
// Discord OAuth2 login redirect
$client_id = ''; // client ID
$redirect_uri = urlencode('http://localhost/CO-OP/discord-callback.php');
$scope = 'identify email';
$response_type = 'code';

$auth_url = "";

header("Location: $auth_url");
exit();
