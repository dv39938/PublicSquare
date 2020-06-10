<?php
echo "Hello There";
require_once('sq_config.php');
require 'vendor/autoload.php';
echo __DIR__;
phpinfo(INFO_ENVIRONMENT);
$length = count($_ENV);
echo $length;
foreach($_ENV as $key=>$value){
     print "$key holds $value\n";
     print "hi";
 }
//APPPATH = 'phpdotenv/src/Repository/RepositoryInterface';
//$path = 'phpdotenv/src/Repository/RepositoryInterface';
$dotenv = Dotenv\Dotenv::create(__DIR__,'sample.env.php');
echo "part 2";
/*if(file_exists(".env")) {
    $dotenv->load();
}*/
$dotenv->load();
$dotenv->required('USE_PROD')->isBoolean();
  //...
  // Set the permissions
  $permissions = urlencode(
                  "PAYMENTS_WRITE ".
                  "PAYMENTS_READ"
               );
  echo $permissions;
  $useProd = $_ENV["USE_PROD"] == 'true';
  echo "\n".$_ENV['USE_PROD']."\n";
  $credentialManager = new CredentialManager();
  $credentialManager->setUseSandbox(!$useProd);
  // Display the OAuth link
  // Use _SQ_DOMAIN if you want to authorize in the production environment
  $connectV2Client = $credentialManager->getConnectClient();
  $appId = $credentialManager->getApplicationId();
  echo _SQ_AUTHZ_URL." this is the authorize url";
  echo _SQ_SANDBOX_DOMAIN;
  echo $useProd;
  echo ($useProd == true) ? "<a href=\"https://"._SQ_DOMAIN._SQ_AUTHZ_URL
  ."?client_id=$appId&scope=$permissions\">Click here</a> to authorize the application."
  : "<a href=\"https://"._SQ_SANDBOX_DOMAIN._SQ_AUTHZ_URL
  ."?client_id=$appId&scope=$permissions\">Click here</a> to authorize the application in the sandbox.";

?>
