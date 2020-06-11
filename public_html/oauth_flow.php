<?php
require_once(__DIR__.'/../sq_config.php');
//phpinfo(INFO_ENVIRONMENT);

   function getAuthzCode($authorizationResponse) {

    // Extract the returned authorization code from the URL
    $authorizationCode = $authorizationResponse['code'];

    # If there is no authorization code, log the error and throw an exception
    if (!$authorizationCode) {
    echo "Authorization Failed";
    error_log('Authorization failed!');
      throw new \Exception("Error Processing Request: Authorization failed!", 1);
    }
    return $authorizationCode ;
  }

  function getOAuthToken($authorizationCode) {

    $credentialManager = new CredentialManager();
    //print getenv('USE_PROD');
    $credentialManager->setUseSandbox(!getenv("USE_PROD") == 'true');

    $connectV2Client = $credentialManager->getConnectClient();

    // Create an OAuth API client
    $oauthApi = new SquareConnect\Api\OAuthApi($connectV2Client);
    $body = new \SquareConnect\Model\ObtainTokenRequest();

    // Set the POST body
    $body->setClientId($credentialManager->getApplicationId());
    $body->setClientSecret($credentialManager->getAppSecret());
    $body->setGrantType("authorization_code");
    $body->setCode($authorizationCode);
    echo "got this far";
    try {
        $result = $oauthApi->obtainToken($body);
    } catch (Exception $e) {
        error_log  ($e->getMessage());
	echo "error in obtaining token: token exchange failed";
        throw new Exception("Error Processing Request: Token exchange failed!", 1);
    }

    $accessToken = $result->getAccessToken();
    $refreshToken = $result->getRefreshToken();

    // Return both the access token and refresh token
    echo "got a little extra further; after first try-catch";
    return array($accessToken, $refreshToken);
  }
  # Call the function
  echo "got one function farther";
  try {
    $authorizationCode = getAuthzCode($_GET);
    list($accessToken, $refreshToken) = getOAuthToken($authorizationCode);
    echo "Authorization Succeeded!";
    error_log('Authorization succeeded!');
  } catch (Exception $e) {
    echo "tried to catch an error";
    echo $e->getMessage();
    error_log($e->getMessage());
  }



?>
