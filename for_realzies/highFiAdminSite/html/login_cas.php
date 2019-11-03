<?php
require_once 'config.php';

require_once $phpcas_path . '/CAS.php';

phpCAS::client(CAS_VERSION_2_0, $cas_host, $cas_port, $cas_context);

phpCAS::setCasServerCACert($cas_server_ca_cert_path);

phpCAS::forceAuthentication();

// $user = phpCAS::getUser();
$user = "";
$name = "";
$admin = "";
?>
